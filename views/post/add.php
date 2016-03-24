<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;

/* @var $model app\models\Post */
/* @var $form ActiveForm */
?>
<div class="post-add">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'title') ?>

    <?= $form->field($model,'date')->widget(DatePicker::className(),[
        'name' => 'date',
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'value' => Yii::$app->formatter->asDate($model->date,'small'),
        'pluginOptions' => [
            'autoclose'=>true,
        ]
    ])->label('Date')
    ;?>
        <?= $form->field($model, 'post')->textarea() ?>
        <?= $form->field($model, 'tags')->textarea() ?>
        <?= $form->field($model, 'image')->fileInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- post-add -->
