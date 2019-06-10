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
        <?= Html::button('Criar Tarefa', ['value' => Url::to('index.php?r=tarefas/create'), 'class' => 'btn btn-success modalButton']) ?>
    </p>

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
                                'class' => 'modalButton',
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
                                'class' => 'modalButton',
                                'value' => Url::to(['tarefas/update', 'id' => $model->id])
                            ]

                        );
                    },
                ],
            ]
        ],
    ]); ?>

    <!-- Modal para criar/visualizar/editar tarefa -->
    <?php
        Modal::begin([
            'header' => '<h4>Tarefas</h4>',
            'class' => 'modal',
            'size' => 'modal-lg'
        ]);
    ?>
    <div class='modalContent'></div>
    <?php Modal::end(); ?>
</div>
