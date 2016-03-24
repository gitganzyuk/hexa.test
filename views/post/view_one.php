<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Post */
?>

<div class="col-sm-8 post-index">

    <h1><?= Html::encode($model->title) ?></h1>
    <div class="meta">
        <p>Date: <?= Yii::$app->formatter->asDate($model->date, 'medium') ?></p>
    </div>
    <?php
    if ($model->image){
       echo Html::img('uploads/'.$model->image,['width' => '200px']);
    }
    ?>
    <div>
        <?=$model->post; ?>
    </div>
    <div class="tags">
      Tags: <?=$model->tags ?>
    </div>
    <hr/>
</div>
