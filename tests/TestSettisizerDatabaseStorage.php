<?php

class TestSettisizerDatabaseStorage extends TestCase
{
    //Start PHPUnit with ../../../vendor/bin/phpunit

    public function testHasManyThrough() {
        Eloquent::unguard();

        $tuple = \Settisizer\SettisizerTuple::create([
            'model_type' => \App\User::class,
            'model_id' => \App\User::first()->id
        ]);

        $setting = \Settisizer\SettisizerSetting::create([
            'name' => 'BackgroundColor'
        ]);

        $value = \Settisizer\SettisizerValue::create([
            'settisizer_setting_id' => $setting->id,
            'settisizer_tuple_id' => $tuple->id,
            'data' => 'blue'
        ]);

        Eloquent::reguard();

        dd($tuple->settings()->get());
    }
}
