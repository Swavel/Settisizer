<?php

class TestSettisizer extends TestCase
{
    //Start PHPUnit with ../../../vendor/bin/phpunit
    public function testSettingNotExists() {
        //TODO: mock this
        $u = \App\User::all()->first();
        $this->assertNull($u->getSetting('blabla'));
    }

    public function testSetAndRetrieveSetting()
    {
        $u = \App\User::all()->first();
        $u->setSetting('settingname', 'testtest');
        $this->assertTrue($u->getSetting('settingname') === 'testtest');
    }

    public function testSetSetting() {

    }

    public function testGetSetting() {

    }
}
