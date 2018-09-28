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

### BsnValidator
```php
// add this in your model
use mahkali\validators\BsnValidator;

// use the validator in your model rules
public function rules() {
    return [
       	['bsn', BsnValidator::class],
    ];
}
```


## License

**yii2-bsnvalidator** is released under the MIT License. See the bundled `LICENSE.md` for details.
