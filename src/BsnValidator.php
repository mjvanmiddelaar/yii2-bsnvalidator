<?php

namespace mahkali\validators;

use yii\validators\Validator;

/**
 * BsnValidator validates that the attribute value is a valid BSN number
 *
 * @see https://nl.wikipedia.org/wiki/Burgerservicenummer#11-proef
 *
 * @package mahkali\validators
 * @author Martinus van Middelaar <mahkali@gmail.com>
 */
class BsnValidator extends Validator
{

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();


        if ($this->message === null) {
            $i18n = \Yii::$app->i18n;
            $i18n->translations['bsnvalidator'] = [
                'class' => '\yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en',
                'basePath' =>  '@vendor/mahkali/yii2-bsnvalidator/src/messages',
            ];

            $this->message = \Yii::t('bsnvalidator', 'The supplied BSN is not a valid BSN number');
        }
    }

    public function clientValidateAttribute($model, $attribute, $view)
    {
        BsnValidatorAsset::register($view);
        $options = $this->getClientOptions($model, $attribute);

        return 'mahkali.bsnvalidation.bsn(value, messages, ' . json_encode($options, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . ');';
    }

    /**
     * {@inheritdoc}
     */
    public function getClientOptions($model, $attribute)
    {
        $options = [
            'message' => $this->formatMessage($this->message, [
                'attribute' => $model->getAttributeLabel($attribute),
            ]),
        ];
        if ($this->skipOnEmpty) {
            $options['skipOnEmpty'] = 1;
        }

        return $options;
    }

    protected function validateValue($value)
    {
        if (!$this->checkBsn($value)) {
            return [$this->message, []];
        }
        return null;
    }

    protected function checkBsn($input)
    {
        if (strlen($input) != 9 && strlen($input) != 8) {
            return false;
        }
        $numbers = str_split(str_pad($input, 9, '0', STR_PAD_LEFT));
        $total = 0;
        foreach ($numbers as $i => $number) {
            $value = $number * (9 - $i) * ((9 - $i) === 1 ? -1 : 1);
            $total += $value;
        }
        return ($total % 11) === 0;
    }


}