<?php
/*
   DEVELOPER: SURENDRA GUPTA
   Date : 10-FEB-2020
   
*/

namespace app\models;

use Yii;
use \app\classes\utility;
use \app\components;

/**
 * This is the model class for table "Users".
 *
 * @property integer $userId
 * @property string $firstName
 * @property string $lastName
 * @property string $email
 * @property integer $personalCode
 * @property integer $phone
 * @property boolean $active
 * @property boolean $isDead
 * @property string $lang
 * @property boolean $isDeleted
 *
 * @property Loans[] $loans
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'email', 'personalCode', 'phone'], 'required'],
            [['firstName', 'lastName', 'email', 'lang'], 'string'],
            [['personalCode', 'phone'], 'integer'],
            [['email'], 'email'],
            [['active', 'isDead', 'isDeleted'], 'boolean'],
            [['isDeleted'], 'safe'],
            [['personalCode'], 'validatePersonalCode'],
            [['personalCode'], 'unique', 'targetAttribute' => 'personalCode'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userId'        => 'User ID',
            'firstName'     => 'First Name',
            'lastName'      => 'Last Name',
            'email'         => 'Email',
            'personalCode'  => 'Personal Code',
            'phone'         => 'Phone',
            'active'        => 'Active',
            'isDead'        => 'Is Dead',
            'lang'          => 'Lang',
            'isDeleted'     => 'Is Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoans()
    {
        return $this->hasMany(Loan::className(), ['userId' => 'userId'])->inverseOf('user');
    }

    /**
     * @inheritdoc
     */
    public function validatePersonalCode($attribute, $params)
    {
        if (utility\Common::validatePersonalCode($this->$attribute) !== true)
        {
            $this->addError($attribute, 'Personal code is not valid');
        }
    }

    /**
     * @inheritdoc
     */
    public function getUserAge()
    {
        return utility\Common::getAgeByPersonalCode($this->personalCode);
    }

}
