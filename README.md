yii2-bsnvalidator
=============

This extension provides BSN (Burger Service Nummer) validation for Yii Framework 2.0.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require mahkali/yii2-bsnvalidator
```

or add

```
"mahkali/yii2-bsnvalidator": "^1.1"
```

to the ```require``` section of your `composer.json` file.

## Usage

```php
// add this in your model
use mahkali\validators\BsnValidator;

// use the validator in your model rules
public function rules() 
{
    return [
       	['bsn', BsnValidator::class],
    ];
}
```

## Translations

You could set the message attribute. Or - add your language to the package:

Edit:

`@vendor/mahkali/yii2-bsnvalidator/src/messages/config.php`

Add your language.

Run:

```bash
./yii message @vendor/mahkali/yii2-bsnvalidator/src/messages/config.php
```

Edit your message file in

`@vendor/mahkali/yii2-bsnvalidator/src/messages/xx/bsnvalidator.php`

And make a PR :) Thank you very much.

## License

**yii2-bsnvalidator** is released under the MIT License. See the bundled `LICENSE.md` for details.
