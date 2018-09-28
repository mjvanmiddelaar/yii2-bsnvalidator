<?php

namespace mahkali\validators;

use yii\web\JqueryAsset;

/**
 * @author Martinus van Middelaar <mahkali@gmail.com>
 */
class BsnValidatorAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/mahkali/yii2-bsnvalidator/src/assets';
    public $js = [
        YII_DEBUG ? 'mahkali.bsnvalidation.js' : 'mahkali.bsnvalidation.min.js',
    ];
    public $depends = [
        JqueryAsset::class,
    ];
}