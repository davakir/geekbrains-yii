<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Photos;

/**
 * PhotosSearch represents the model behind the search form about `app\models\Photos`.
 */
class PhotosSearch extends Photos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ya_photo_id', 'album_id'], 'integer'],
            [['author', 'date_created', 'date_updated', 'title', 'summary', 'access', 'img_href', 'link_album'], 'safe'],
            [['hide_original', 'visible'], 'boolean'],
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
        $query = Photos::find();

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
            'id' => $this->id,
            'ya_photo_id' => $this->ya_photo_id,
            'album_id' => $this->album_id,
            'date_created' => $this->date_created,
            'date_updated' => $this->date_updated,
            'hide_original' => $this->hide_original,
            'visible' => $this->visible,
        ]);

        $query->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'summary', $this->summary])
            ->andFilterWhere(['like', 'access', $this->access])
            ->andFilterWhere(['like', 'img_href', $this->img_href])
            ->andFilterWhere(['like', 'link_album', $this->link_album]);

        return $dataProvider;
    }
}
