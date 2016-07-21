<?php
/**
 * Created by PhpStorm.
 * User: ignatenkovnikita
 * Date: 21/07/16
 * Time: 01:05
 */

namespace ignatenkovnikita\validators;


use Yii;
use yii\validators\Validator;

class PhoneValidator extends Validator
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = \Yii::t('common', '{attribute} is not a valid Phone. Must be 7XXXZZYYYY.');
        }
    }

    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;


        $result = $this->validateValue($value);

        if (is_array($result)) {
            $this->addError($model, $attribute, $this->message);
        } else {
            $model->$attribute = $result;
        }
    }

    public function validateValue($value)
    {
        $value = preg_replace('/[^0-9]/', '', $value);
        if (strlen($value) == 11 && substr($value, 0, 1) == 8) {
            substr_replace($value, '7', 0, 1);
        }

        if(strlen($value) == 10) {
            $value = '7' . $value;
        }

        if (preg_match('/^7\d{10}$/', $value)) {
            return $value;
        }

        return [];


    }

}