/*======================================================================================
*
*
*    Main Navigation
*
*
======================================================================================*/

import $ from 'jquery';

export default (function(w,d){
    function Navigation(){
        this.$nav = $('.nav');
        if(!this.$nav.length){ return; }

        this.hamburger = this.$nav[0].getElementsByClassName('nav-btn--hamburger')[0];
        if(!this.hamburger){ return; }

        this.menu_close = this.$nav[0].getElementsByClassName('nav-menu-close')[0];
        this.setup();
    }

    Navigation.prototype.setup = function(){
        this.hamburger.addEventListener('click', this.toggleMenu.bind(this), false);
        this.menu_close.addEventListener('click', this.toggleMenu.bind(this), false);
    }

    Navigation.prototype.toggleMenu = function(){
        this.$nav.toggleClass('active');
    }

    return Navigation;
}(window, document));
