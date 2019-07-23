/*======================================================================================
*
*
*    Sign up Controller
*
*
======================================================================================*/

import ImageReader from './../vendor/ImageReader.js';

export default (function (w, d, $) {

    function Signup() {
        this.avatar = d.getElementsByClassName('avatar')[0]
        this.$birthday = $('[name="birthday"]');
        this.setup();
    }

    Signup.prototype.setup = function(){
        /* Init image reader */
        new ImageReader(this.avatar);

        /* Init date picker on birth input */
        this.$birthday.datepicker({
            language    : 'en',
            view        : 'years',
            dateFormat  : 'M d, yyyy',
            position    : 'top left'
        });
    }

    return Signup;
})(window, document, jQuery);
