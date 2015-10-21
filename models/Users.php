<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $username
 * @property string $birthday
 * @property string $createdAt
 * @property string $updatedAt
 * @property string $password
 * @property integer $status
 * @property string $email
 * @property string $authKey
 * @property string $accessToken
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'createdAt', 'password', 'status', 'email', 'authKey', 'accessToken'], 'required'],
            [['birthday', 'createdAt', 'updatedAt'], 'safe'],
            [['status'], 'integer'],
            [['username'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 25],
            [['authKey', 'accessToken'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'birthday' => 'Birthday',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
            'password' => 'Password',
            'status' => 'Status',
            'email' => 'Email',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }
}
