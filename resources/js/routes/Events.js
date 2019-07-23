/*======================================================================================
*
*
*    Events routes
*
*
======================================================================================*/


import EventCreateController from './../controllers/EventCreate'

export default {
    create : function(){
        return new EventCreateController();
    },
}
