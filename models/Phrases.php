<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phrases".
 *
 * @property integer $ID
 * @property string $phrase
 * @property string $likes
 * @property string $dislikes
 * @property string $created
 */
class Phrases extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phrases';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phrase'], 'string'],
            [['likes', 'dislikes'], 'integer'],
            [['created'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'phrase' => Yii::t('app', 'Phrase'),
            'likes' => Yii::t('app', 'Likes'),
            'dislikes' => Yii::t('app', 'Dislikes'),
            'created' => Yii::t('app', 'Created'),
        ];
    }
}
