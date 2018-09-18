<?php

namespace mahkali\validators;

use yii\validators\Validator;

class BsnValidator extends Validator
{

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = \Yii::t('app', '{attribute} must be a valid BSN number.');
        }
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