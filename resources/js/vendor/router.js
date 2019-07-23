import _ from './_.js';

var that, key, len, x, value, k, path, arr,
    Router = (function (w) {

        function Router(options) {
            this.options = _.extend({
                prefix: '/',
                routes: {},
            }, options);
            this.args = {};
            this.route = null;
            that = this;

            this.getRoute();
            this.getUrlParams();
        }


        /* Setup router */

        Router.prototype.getRoute = function () {
            path = w.location.href;
            path = path.replace(w.location.origin, '');
            path = path.split('?')[0];
            path = path.replace(this.options.prefix, '').split('/');
            for (key in this.options.routes) {
                k = key.split('/');
                k.splice(0, 1);
                len = k.length;

                if (len != path.length) {
                    continue;
                }

                this.route = this.options.routes[key];

                x = 0;
                for (; x < len; x++) {
                    value = k[x];

                    if (value.match(/^[{].+[}]$/)) {
                        this.args[value.replace(/[{}]/g, '')] = path[x];
                    } else if(value == path[x]) {
                        break;
                    } else if (value !== path[x]) {
                        this.route = null;
                        this.args = {};
                        break;
                    }
                }

                if (this.route) {
                    break;
                }
            }
        }

        /* $_GET url parameters */

        Router.prototype.getUrlParams = function () {
            path = w.location.href.split('?');
            if (path.length == 1) {
                return;
            }
            path = path[1];
            path = path.split('&');
            len = path.length;
            x = 0;
            for (; x < len; x++) {
                value = path[x].split('=');
                this.args[value[0]] = value[1];
            }
        }


        /* Initation of application */

        Router.prototype.init = function () {
            if (typeof this.route == 'function') {
                this.route.call(null, this.args);
            }
        }

        return Router;
    }(window));

export default Router;