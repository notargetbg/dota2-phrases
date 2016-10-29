<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Phrases;

/**
 * PhrasesSearch represents the model behind the search form about `app\models\Phrases`.
 */
class PhrasesSearch extends Phrases
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'likes', 'dislikes'], 'integer'],
            [['phrase', 'created'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Phrases::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'likes' => $this->likes,
            'dislikes' => $this->dislikes,
            'created' => $this->created,
        ]);

        $query->andFilterWhere(['like', 'phrase', $this->phrase]);

        return $dataProvider;
    }
}
