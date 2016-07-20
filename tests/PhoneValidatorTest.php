<?php
use ignatenkovnikita\helpers\StringHelper;
use ignatenkovnikita\validators\PhoneValidator;

/**
 * Created by PhpStorm.
 * User: Ignatenkov Nikita
 * Site: http://ignatenkovnikita.ru/
 * Date: 28.03.2016
 * Time: 18:55
 */
class PhoneValidatortest extends PHPUnit_Framework_TestCase
{

    public function testMethod(){
        $val = new PhoneValidator();
        $this->assertTrue($val->validate(true));
    }



}