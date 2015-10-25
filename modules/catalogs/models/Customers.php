<?php

namespace app\modules\catalogs\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property string $Id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property integer $status
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'phone', 'email', 'status'], 'required'],
            [['status'], 'integer'],
            [['name', 'address', 'phone', 'email'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'phone' => 'Phone',
            'email' => 'Email',
            'status' => 'Status',
        ];
    }
}
