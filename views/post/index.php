<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Post */
?>
<?php
foreach($model as $post): ?>
<div class="col-sm-8 post-index">

    <h1><?= Html::a(Html::encode($post->title),\yii\helpers\Url::to(['post/view','id'=> $post->id])) ?></h1>
    <div class="meta">
        <p>Date: <?= Yii::$app->formatter->asDate($post->date, 'medium') ?></p>
    </div>
    <?php
    if ($post->image){
       echo Html::img('uploads/'.$post->image,['width' => '200px']);
    }
    ?>
    <div>
        <?=$post->post; ?>
    </div>
    <div class="tags">
      Tags: <?=$post->tags ?>
    </div>
    <hr/>
</div>
<?php endforeach ?>

