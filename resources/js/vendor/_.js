/*======================================================================================
*
*
*    Helpers
*    - extend object params (object, object)
*    - assign object params
*    - add class (DOM, class)
*    - remove class (DOM, class)
*    - toggle class (DOM, class)
*    - has class (DOM, class),
*    - random string (length)
*
*
======================================================================================*/
const _ = (function(){
    var CHARS = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789",
        o, key, cls, index, ev, key, x, value,

        _ = (function (w) {
            return {
                extend: function (o1, o2) {
                    o = o1;
                    if (!o2) {
                        return o;
                    }
                    for (key in o1) {
                        o[key] = typeof o2[key] != 'undefined' ? o2[key] : o1[key];
                    }
                    return o;
                },

                assign: function (o1, o2) {
                    for (key in o1) {
                        o2[key] = o1[key];
                    }
                    return o2;
                },

                addClass: function (el, cl) {
                    if (!el) {
                        return;
                    }
                    cls = el.className.split(' ');
                    index = cls.indexOf(cl);
                    if (index != -1) {
                        return;
                    }
                    cls.push(cl);
                    el.className = cls.join(' ');
                },

                removeClass: function (el, cl) {
                    if (!el) {
                        return;
                    }
                    cls = el.className.split(' ');
                    index = cls.indexOf(cl);
                    if (index == -1) {
                        return;
                    }
                    cls.splice(index, 1);
                    el.className = cls.join(' ');
                },

                toggleClass: function (el, cl) {
                    if (!el) {
                        return;
                    }
                    this[(this.hasClass(el, cl)) ? 'removeClass' : 'addClass'](el, cl);
                },

                hasClass: function (el, cl) {
                    if (!el || typeof el.className == 'undefined') {
                        return false;
                    }
                    cls = el.className.split(' ');
                    return cls.indexOf(cl) != -1;
                },

                randString: function (length) {
                    length = length ? length : 5;
                    value = ''; x = 0;
                    for (; x < length; x++){
                        value += CHARS.charAt(Math.floor(Math.random() * CHARS.length));
                    }
                    return value;
                },

                parent : function(el, classname){
                    while(el){
                        if(!el){ return null; }
                        if(_.hasClass(el, classname)){
                            return el;
                        }
                        el = el.parentNode;
                    }
                },

                toArray : function(dom){
                    return Array.prototype.slice.call(dom);
                }
            }
        }(window));

    return _;
}());

export default _;