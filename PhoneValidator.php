<?php
/**
 * Created by PhpStorm.
 * User: ignatenkovnikita
 * Date: 21/07/16
 * Time: 01:05
 */

namespace ignatenkovnikita\validators;


use yii\validators\Validator;

class PhoneValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        $model->$attribute = preg_replace('/[^0-9]/','', $model->$attribute);

        if (!preg_match('/^\d{11}$/', $model->$attribute)) {
            $this->addError($model, $attribute, 'Telephone is not valid');
        } else {
            $model->$attribute = substr_replace($model->$attribute, '7', 0, 1);
        }
    }

}