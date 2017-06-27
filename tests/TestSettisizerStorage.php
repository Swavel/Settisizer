<?php

class TestSettisizerStorage extends TestCase
{
    //Start PHPUnit with ../../../vendor/bin/phpunit

    private $settingKey = 'setting2';

    public function testGetSettingNotExists() {
        $u = \App\User::all()->first();
        $this->assertNull($u->getSetting('blabla'));
    }

    public function testSetAndRetrieveSetting()
    {
        $u = \App\User::all()->first();
        $u->setSetting('settingname', 'testtest');
        $this->assertTrue($u->getSetting('settingname') === 'testtest');
    }

    public function testSettingNotExists() {
        $u = \App\User::all()->first();
        $this->assertFalse($u->settingExists($this->settingKey));
    }

    public function testSetSetting() {
        $u = \App\User::all()->first();

        $u->setSetting($this->settingKey, 'test2');

        $filePath = storage_path(
            'app/settisizer/eloquentmodel/'
            . $u->getTable()
            . '/' . $u->{$u->getKeyName()}
            . '/' . $this->settingKey
        );

        $this->assertFileExists($filePath);
        File::delete($filePath);
    }
}
