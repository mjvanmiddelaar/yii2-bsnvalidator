<?php

class BsnValidatorCest
{
    // tests
    public function tryEmpty(UnitTester $I)
    {
        $input = '';
        $validator = new \mahkali\validators\BsnValidator();
        $result = $validator->validate($input);
        $I->assertFalse($result);
    }

    public function tryShort(UnitTester $I)
    {
        $input = '5827863';
        $validator = new \mahkali\validators\BsnValidator();
        $result = $validator->validate($input);
        $I->assertFalse($result);
    }

    public function tryWordLongEnough(UnitTester $I)
    {
        $input = 'abcdefghk';
        $validator = new \mahkali\validators\BsnValidator();
        $result = $validator->validate($input);
        $I->assertFalse($result);
    }

    public function tryTooLongNumber(UnitTester $I)
    {
        $input = '582786393123';
        $validator = new \mahkali\validators\BsnValidator();
        $result = $validator->validate($input);
        $I->assertFalse($result);
    }

    public function tryValidBsn(UnitTester $I)
    {
        /** @see https://testnummers.nl/ */
        $input = '582786393';
        $validator = new \mahkali\validators\BsnValidator();
        $result = $validator->validate($input);
        $I->assertTrue($result);
    }
}
