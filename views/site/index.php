<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = Yii::$app->name;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bem vindo ao sistema de tarefas!</h1>

        <?= Html::a('Ir para tarefas', ['tarefas/index'], ['class' => 'btn btn-success']) ?>
    </div>

</div>
