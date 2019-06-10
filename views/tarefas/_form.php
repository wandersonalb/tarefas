<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dianakaal\DatePickerMaskedWidget\DatePickerMaskedWidget;
use yii\helpers\Url;
?>

<div class="tarefas-form">

    <?php $form = ActiveForm::begin([
    	'id' => $model->formName(),
    ]); ?>


    <?= $form->field($model, 'data')->widget(DatePickerMaskedWidget::className(), Yii::$app->util->configDate()) ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'usuario')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 
$script = <<< JS

    // Função para enviar o formulário via ajax
    $("body").on("beforeSubmit", "form#{$model->formName()}", function () {
		
        var \$form = $(this);

        $.ajax({
            url: \$form.attr("action"),
            data: \$form.serialize(),
            type: "POST",
            dataType: "json",
            
            success: function(result){
                
                if(result == 1){
                    
                    // caso registro seja criado, limpa o formulário e carrega tabela com novo registro
                    $('.modal').modal('toggle');
                    location.reload();

                } else {
                    console.log('erro ao salvar');
                }
            },
            error: function(e){
                console.log('server error');
            }
        });
		return false;
	});

JS;
$this->registerJS($script);
