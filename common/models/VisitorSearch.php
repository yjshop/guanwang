<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Visitor;

/**
 * VisitorSearch represents the model behind the search form about `common\models\Visitor`.
 */
class VisitorSearch extends Visitor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tel', 'app_id', 'qq', 'created_at', 'updated_at', 'status'], 'integer'],
            [['admin', 'company', 'domain', 'class', 'weixin', 'email'], 'safe'],
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
        $query = Visitor::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'tel' => $this->tel,
            'app_id' => $this->app_id,
            'qq' => $this->qq,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'admin', $this->admin])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'domain', $this->domain])
            ->andFilterWhere(['like', 'class', $this->class])
            ->andFilterWhere(['like', 'weixin', $this->weixin])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
