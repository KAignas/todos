/*======================================================================================
*
*
*    Application
*
*
======================================================================================*/

window.$ = window.jQuery = require('jquery');
import _ from './_.js';
import evt from './events.js';
import Router from './router.js';

var token,
    App = (function(w,d){

        function App(options){
            this.setup(options);
            $(d).ajaxError(this.on.ajaxError)
                .ajaxComplete(this.on.ajaxComplete)
                .ready(this.init.bind(this));
        }

        App.prototype.setup = function (options) {
            this.options = _.extend({
                prefix: '/',
                routes: {},
                headers: {},
                on: {}
            }, options);

            this.on = _.extend({
                ready: null,
                ajaxError: null,
                ajaxComplete: null
            }, this.options.on);

            /* Find CSRF token */
            token = d.querySelector('[name="csrf-token"]');
            if(token){
                this.options.headers['X-CSRF-TOKEN'] = token.getAttribute('content');
            }

            $.ajaxSetup({ headers: this.options.headers });
            this.router = new Router(this.options);
        }

        App.prototype.init = function () {
            if (typeof this.on.ready == 'function') {
                this.on.ready();
            }

            this.router.init();
            return this;
        }

        return App;
    }(window, document));

export default App;
