/**
 * BSN validation module.
 *
 * Credits to author of Yii2 framework Qiang Xue <qiang.xue@gmail.com>
 *
 * @author Martinus van Middelaar <mahkali@gmail.com>
 * @copyright Copyright (c) 2018
 * @link https://github.com/mahkali/yii2-bsnvalidator/
 * @license https://github.com/mahkali/yii2-bsnvalidator/blob/master/LICENSE.md
 */
if(!window.hasOwnProperty('mahkali')) {
    window.mahkali = {};
}
window.mahkali.bsnvalidation = (function ($) {
    var pub = {
        isEmpty: function (value) {
            return value === null || value === undefined || ($.isArray(value) && value.length === 0) || value === '';
        },

        addMessage: function (messages, message, value) {
            messages.push(message.replace(/\{value\}/g, value));
        },
        bsn: function (value, messages, options) {
            if (options.skipOnEmpty && pub.isEmpty(value)) {
                return;
            }

            numbers = value.split("");

            if(numbers.length === 8) {
                numbers.unshift(0);
            }
            if(numbers.length !== 9) {
                pub.addMessage(messages, options.message, value);
                return;
            }

            var check = (parseInt(numbers[0],10)*9) +
                (parseInt(numbers[1],10)*8) +
                (parseInt(numbers[2],10)*7) +
                (parseInt(numbers[3],10)*6) +
                (parseInt(numbers[4],10)*5) +
                (parseInt(numbers[5],10)*4) +
                (parseInt(numbers[6],10)*3) +
                (parseInt(numbers[7],10)*2) +
                (parseInt(numbers[8],10)*-1);

            if (check % 11 !== 0) {
                pub.addMessage(messages, options.message, value);
            }
        },
    }
    return pub;
})(jQuery);
