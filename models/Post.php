<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use \yii\db\ActiveRecord;


/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $date
 * @property string $post
 * @property string $tags
 * @property string $image
 */
class Post extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        //var_dump(Yii::$app->getFormatter());
        return [
            [['title', 'date', 'post'], 'required'],
            //[['date'], 'default', 'value' => time()],
            [['date'], 'safe' ],
            [['post', 'tags'], 'string', 'max' => 32*1024],
            [['title'], 'string', 'max' => 200],
            [['image'], 'file', 'extensions' => 'gif, jpg, png']
        ];
    }
    /**
     * @inheritdoc
     */
    public function getPost()
    {
            return Post::find()->all();
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'date' => 'Date',
            'post' => 'Post',
            'tags' => 'Tags',
            'image' => 'Image',
        ];
    }
}
