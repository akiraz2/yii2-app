<?php
/**
 * Copyright (c) 2018
 * cms Smetana
 * project: alt-money
 *
 */

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EmailForm;

/**
 * EmailFormSearch represents the model behind the search form about `common\models\EmailForm`.
 */
class EmailFormSearch extends EmailForm
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'status'], 'integer'],
            [['setToEmail', 'setToName', 'setFromEmail', 'setFromName', 'subject', 'textBody', 'created_at', 'status_text', 'send_at'], 'safe'],
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
        $query = EmailForm::find();

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
            'user_id' => $this->user_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'send_at' => $this->send_at,
        ]);

        $query->andFilterWhere(['like', 'setToEmail', $this->setToEmail])
            ->andFilterWhere(['like', 'setToName', $this->setToName])
            ->andFilterWhere(['like', 'setFromEmail', $this->setFromEmail])
            ->andFilterWhere(['like', 'setFromName', $this->setFromName])
            ->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'textBody', $this->textBody])
            ->andFilterWhere(['like', 'status_text', $this->status_text]);

        return $dataProvider;
    }
}
