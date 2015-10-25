<?php

namespace app\modules\sales\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sales\models\Invoice;

/**
 * InvoiceSearch represents the model behind the search form about `app\modules\sales\models\Invoice`.
 */
class InvoiceSearch extends Invoice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'invoice_no', 'id_user'], 'integer'],
            [['companyName', 'date', 'address'], 'safe'],
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
        $query = Invoice::find();

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
            'invoice_no' => $this->invoice_no,
            'date' => $this->date,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'companyName', $this->companyName])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
