<?php

namespace app\controllers;

use Yii;
use app\models\Tarefas;
use app\models\TarefasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TarefasController implements the CRUD actions for Tarefas model.
 */
class TarefasController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tarefas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TarefasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // Veririca se há o atributo data na busca para conversão
        if ($searchModel->data != null) {
            $searchModel->data = Yii::$app->util->converteData($searchModel->data, 'date');
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tarefas model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tarefas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tarefas();

        if ($model->load(Yii::$app->request->post())) {
            // Converte data para formato do banco antes de salvar
            $model->data = Yii::$app->util->converteDataSQL($model->data . ' 00:00:00', 'datetime');
            if($model->save())
                return 1;
            else
                return 2;
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tarefas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            // Converte data para formato do banco antes de atualizar
            $model->data = Yii::$app->util->converteDataSQL($model->data . ' 00:00:00', 'datetime');
            if($model->save())
                return 1;
            else
                return 2;
        }

        $model->data = Yii::$app->util->converteData($model->data, 'date');
        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tarefas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tarefas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tarefas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tarefas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
