<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tarefas */

$this->title = 'Tarefa: '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tarefas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tarefas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'data:date',
            'descricao:ntext',
            'usuario',
        ],
    ]) ?>

</div>
