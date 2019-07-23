/*======================================================================================
*
*
*    Authentication routes
*
*
======================================================================================*/

import SignupController from './../controllers/Signup';

export default {
    login : function(){
        /* Focus on first input */
        document.querySelector('[name="email"]').focus();
    },

    signup : function(){
        return new SignupController();
    }
}
