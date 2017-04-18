<?php

class TestSettisizer extends TestCase
{
    //Start PHPUnit with ../../../vendor/bin/phpunit
    public function testSettingNotExists() {
        //TODO: mock this
        $u = \App\User::all()->first();
        $this->assertFalse($u->settingExists('blabla'));
    }

    public function testSetAndRetrieveSetting()
    {
        //TODO: next time!
        $this->assertTrue(true);
    }

    public function testSetSetting() {

    }

    public function testGetSetting() {

    }
}
