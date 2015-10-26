<?php

namespace app\modules\sales\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sales\models\InvoiceDetail;

/**
 * InvoiceDetailSearch represents the model behind the search form about `app\modules\sales\models\InvoiceDetail`.
 */
class InvoiceDetailSearch extends InvoiceDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'invoice_id', 'id_product', 'count'], 'integer'],
            [['price'], 'number'],
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
        $query = InvoiceDetail::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'invoice_id' => $this->invoice_id,
            'id_product' => $this->id_product,
            'count' => $this->count,
            'price' => $this->price,
        ]);

        return $dataProvider;
    }
}
