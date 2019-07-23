/*======================================================================================
*
*
*    Application
*
*
======================================================================================*/

import Navigation from "./components/Navigation";
import App from './vendor/app.js';
import Auth from "./routes/Auth";
import Events from "./routes/Events";

new App({
    on : {
        ready : function(){
            new Navigation();
        }
    },
    routes : {
        '/login' : Auth.login,
        '/signup' : Auth.signup,
        '/create' : Events.create
    }
});
