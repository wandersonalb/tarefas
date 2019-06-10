<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use dianakaal\DatePickerMaskedWidget\DatePickerMaskedWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TarefasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tarefas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarefas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- Botão para carregar modal com form de criação de novo registro -->
        <?= Html::button('Criar Tarefa', ['value' => Url::to('index.php?r=tarefas/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) ?>
    </p>


    <!-- Pjax é responsável por carregar dados na tabela GridView via ajax -->
    <?php Pjax::begin(['id' => 'tarefasGrid']) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'data',
                'value' => 'data',
                'format' => ['datetime', 'php:d/m/Y'],
                'filter'=> DatePickerMaskedWidget::widget([
                    'model' => $searchModel,
                    'attribute' => 'data',
                    'name'=>'data',
                    'mask' => '99/99/9999',
                    'language' => 'pt',
                    'clientOptions' => [
                        'autoclose' => true,
                        'clearBtn' => true,
                        'format' => 'dd/mm/yyyy',
                        'todayBtn' => 'linked',
                        'todayHighlight' => 'true',
                        'weekStart' => '1',
                        'calendarWeeks' => 'true',
                        'orientation' => 'top left',
                        'hourFormat' => "24"
                    ],
                ]),
            ],
            'descricao:ntext',
            'usuario',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-eye-open"></span>',
                            null,
                            [
                                'title' => 'Visualizar Tarefa',
                                'id' => 'modalViewButton',
                                'value' => Url::to(['tarefas/view', 'id' => $model->id])
                            ]

                        );
                    },
                    'update' => function ($url, $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-pencil"></span>',
                            null,
                            [
                                'title' => 'Visualizar Tarefa',
                                'class' => 'modalEditButton',
                                'value' => Url::to(['tarefas/update', 'id' => $model->id])
                            ]

                        );
                    },
                ],
            ]
        ],
    ]); ?>
    <?php Pjax::end(); ?>

    <!-- Modal para criar nova tarefa -->
    <?=
        Modal::begin([
            'header' => '<h4>Tarefas</h4>',
            'id' => 'modalNovaTarefa',
            'size' => 'modal-lg'
        ]);
    ?>
    <div id='modalNovaTarefaContent'></div>
    <?=
        Modal::end();
    ?>

    <!-- Modal para visualizar tarefa -->
    <?=
        Modal::begin([
            'header' => '<h4>Visualiza Tarefa</h4>',
            'id' => 'modalViewTarefa',
            'size' => 'modal-lg'
        ]); 
    ?>
    <div id='modalViewTarefaContent'></div>
    <?= Modal::end(); ?>

    <!-- Modal para editar tarefa -->
    <?= Modal::begin([
            'header' => '<h4>Edita Tarefa</h4>',
            'id' => 'modalEditTarefa',
            'size' => 'modal-lg'
        ]);
    ?>
    <div id='modalEditTarefaContent'></div>
    <?= Modal::end(); ?>

</div>
