<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Albums;

/**
 * AlbumsSearch represents the model behind the search form about `app\models\Albums`.
 */
class AlbumsSearch extends Albums
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['album_id', 'ya_album_id', 'image_count', 'visible'], 'integer'],
            [['author', 'title', 'summary', 'img_href', 'link_self', 'link_edit', 'link_photos', 'link_cover', 'link_ymapsml', 'link_alternate', 'date_edited', 'date_updated', 'date_published'], 'safe'],
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
        $query = Albums::find();

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
            'album_id' => $this->album_id,
            'ya_album_id' => $this->ya_album_id,
            'image_count' => $this->image_count,
            'visible' => $this->visible,
        ]);

        $query->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'summary', $this->summary])
            ->andFilterWhere(['like', 'img_href', $this->img_href])
            ->andFilterWhere(['like', 'link_self', $this->link_self])
            ->andFilterWhere(['like', 'link_edit', $this->link_edit])
            ->andFilterWhere(['like', 'link_photos', $this->link_photos])
            ->andFilterWhere(['like', 'link_cover', $this->link_cover])
            ->andFilterWhere(['like', 'link_ymapsml', $this->link_ymapsml])
            ->andFilterWhere(['like', 'link_alternate', $this->link_alternate])
            ->andFilterWhere(['like', 'date_edited', $this->date_edited])
            ->andFilterWhere(['like', 'date_updated', $this->date_updated])
            ->andFilterWhere(['like', 'date_published', $this->date_published]);

        return $dataProvider;
    }
}
