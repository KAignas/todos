/*======================================================================================
*
*
*    Events listener
*    - Add new event (name, callback)
*    - Remove event (name)
*    - Emit event (name, arguments)
*
*
======================================================================================*/

'use strict';
var ev,
    list = Object.create(null),
    args,
    evt = {
        emit: function (name, fn) {
            if (!list[name]) {
                list[name] = [];
            }
            list[name].push(fn);
        },
        call: function (name) {
            if (!list[name]) {
                return;
            }
            args = Array.prototype.slice.call(arguments);
            ev = list[args[0]];
            args.splice(0,1);
            ev.forEach(function (fn) {
                fn.apply(null, args);
            });
        },

        remove: function (name) {
            if (!list[name]) {
                return;
            }
            list[name] = [];
        }
    };

export default evt;