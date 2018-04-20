<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%reserv}}".
 *
 * @property int $id
 * @property string $email
 * @property string $name
 * @property string $phone
 * @property string $comment
 * @property string $booking_date
 * @property int $state
 * @property int $created_at
 * @property int $updated_at
 */
class Reserv extends \common\models\Reserv
{
    public $agreement = 1;

    public function behaviors()
    {
        return [
            '\yii\behaviors\TimestampBehavior',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment'], 'string'],
            ['phone','required',
                'message' => 'Необходимо заполнить номер телефона',
                'when'=> function($model) {return empty($model->email);},
                'whenClient' => 'function(attribute, value) { return $("#reserv-email").val() == ""}'
            ],
            ['email','required',
                'message' => 'Необходимо указать email',
                'when'=> function($model) {return empty($model->phone);},
                'whenClient' => 'function(attribute, value) { return $("#reserv-phone").val() == ""}'
            ],
            [['email','name', 'phone','booking_date','restoran'], 'string', 'max' => 255],
            ['email','email'],
            ['agreement','integer'],
            [['restoran','booking_date'],'required'],
            ['agreement','required','requiredValue' => 1,'message'=>'Необходимо принять соглашение'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'name' => 'Name',
            'phone' => 'Phone',
            'comment' => 'Comment',
            'agreement'=>'Согласен с политикой конфедициальности',
            'state' => 'State',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
    }
}
