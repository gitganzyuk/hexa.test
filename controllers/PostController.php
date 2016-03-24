<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Post;
use yii\web\UploadedFile;
use yii\helpers\Url;

class PostController extends Controller
{
    public function actionIndex()
    {
        $post = new Post();
        return $this->render('index', [
            'model' => $post->getPosts(),
        ]);
    }

    public function actionView($id)
    {
        $post = new Post();
        return $this->render('view_one', [
            'model' => $post->getPost($id),
        ]);
    }

    public function actionAdd()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->date = Yii::$app->formatter->asTimestamp($model->date);
            $model->image->name = $model->image->baseName . time() . '.' . $model->image->extension;
            if ($model->save() && $model->image->saveAs('uploads/' . $model->image->name)) {
                return $this->redirect(Url::home());
            }
        }

        return $this->render('add', [
            'model' => $model,
        ]);
    }
}
