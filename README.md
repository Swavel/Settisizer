# Settisizer

A nice little package to set and get settings on different scopes. In the current state, you can
define settings for a eloquent model (which defines the scope) and general settings (which are
always in always in the global scope). There are, or at least will be, different drivers, so
your settings can be stored everywhere you want. Yay!


## Installation

```
composer require swavel/settisizer 
```

Holy shit, that was easy! Now let's go

## Usage

### In a model

The only thing you have to do to use the settisizer in a model (besides to include it in your
composer dependencies) is to use the trait in the class like this:


```
<?php namespace Your\Awesome\Proiject

class Fu extends Model {

    use Settisizable;
    [...]
```

with that given, you just can use it in every instance of that class:

```
$u = User::find(42);
$u->setSetting([settingname], [settingvalue]);
[...]
$u->getSetting([settingname]);
```

should there be no value stored for the requested setting, don't you worry child, we cover you
there! No errors, just a sober null which will be returned. Yay again!

### Globaly

In the status quo, one have to have a instance of a concretion of a Settisizer Class, which
is, at the moment, always is one of the SettisizerStorage class. 

```
$settisizer = new SettisizerStorage();
$settisizer->setSetting([globalsettingname], [settingvalue]);
[...]
$settisizer->getSetting([globalsettingname]);
```

To manage your own config. Run this command.

```
php artisan vendor:publish --provider=Settisizer\SettisizerServiceProvider
```



# Developer hints

Run phpUnit tests with ../../../vendor/bin/phpunit

# Roadmap 

## Next steps

 - Integrate publish function to write standard config file (to select different drivers)
 - Comment the whole thing
 - Write a second driver (mysql, redis)
 - Facade to access global Settisizer with 
 - name the settings-table for driver mysql

``` 
<?php
Settisizer::getSetting('setting_name')
```

