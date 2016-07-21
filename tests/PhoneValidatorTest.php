<?php
use ignatenkovnikita\validators\FakeModel;
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

    public function testMethod()
    {
        $validator = new \ignatenkovnikita\validators\PhoneValidator();
        $valuesTrue = [
            '+7 905 190 88 92',
            '79051908892',
            '+7 (905) 190 8892',
            '9051908892'
        ];
        foreach ($valuesTrue as $item)
        {
            $this->assertEquals('79051908892', $validator->validateValue($item));
        }

        $valueFalse = [
            '+77 905 190 88 92',
            '790519088'
        ];

        foreach ($valueFalse as $item)
        {
            $this->assertInternalType('array', $validator->validateValue($item));
        }
    }


}