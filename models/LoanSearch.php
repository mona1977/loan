<?php
/*
   DEVELOPER: SURENDRA GUPTA
   Date : 10-FEB-2020
   
*/

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Loan;

/**
 * LoanSearch represents the model behind the search form about `app\models\Loan`.
 */
class LoanSearch extends Loan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loanId', 'userId', 'duration', 'campaign', 'status'], 'integer'],
            [['amount', 'interest'], 'number'],
            [['dateApplied', 'dateLoanEnds'], 'safe'],
            [['isDeleted'], 'boolean'],
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
        $query = Loan::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => [
                'defaultOrder' => [
                    'dateApplied' => SORT_DESC
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'loanId'        => $this->loanId,
            'userId'        => $this->userId,
            'amount'        => $this->amount,
            'interest'      => $this->interest,
            'duration'      => $this->duration,
            'dateApplied'   => !empty($this->dateApplied) ? date("Y-m-d", strtotime($this->dateApplied)) : null,
            'dateLoanEnds'  => !empty($this->dateLoanEnds) ? date("Y-m-d", strtotime($this->dateLoanEnds)) : null,
            'isDeleted'     => false
        ]);

        return $dataProvider;
    }
}
