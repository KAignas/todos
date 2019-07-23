/*======================================================================================
*
*
*    Event Create Controller
*
*
======================================================================================*/

import datepicker from 'air-datepicker';
import EN from 'air-datepicker/dist/js/i18n/datepicker.en';
import autosize from "autosize";
import selectize from 'selectize';

export default (function (w, d, $) {

    function EventCreate() {
        this.form           = d.getElementsByTagName('form')[0];
        this.submit         = d.getElementsByClassName('nav-btn--submit')[0];
        this.textarea       = this.form.querySelector('textarea');
        this.$datepicker    = $(this.form.querySelector('[name="date"]'));
        this.$start         = $(this.form.querySelector('[name="start"]'));
        this.$end           = $(this.form.querySelector('[name="end"]'));
        this.$label         = $(this.form.querySelector('[name="label_id"]'));

        this.setup();
    }

    EventCreate.prototype.setup = function(){
        // Init event date picker
        this.$datepicker.datepicker({
            language    : 'en',
            dateFormat  : 'M d, yyyy'
        });


        // Init event "start" time picker
        this.$start.datepicker({
            dateFormat: ' ', // Do not show date on input
            timepicker : true,
            timeFormat: 'hh:ii',
            classes: 'only-timepicker', // this class hides calendar
            minutesStep : 10,
            onSelect : this.onStartChange.bind(this) // Set end time picker min time
        });

        // Init event "end" time picker
        this.$end.datepicker({
            dateFormat: ' ', // Do not show date on input
            timepicker : true,
            timeFormat: 'hh:ii',
            classes: 'only-timepicker', // this class hides calendar
            minutesStep : 10,
            position : 'bottom right',
            onSelect : this.onEndChange.bind(this) // Set end time picker min time
        });

        // Init auto resizer for textarea
        autosize(this.textarea);

        // Init label autocomplete
        this.selectize = this.$label.selectize({
            placeholder : 'Enter label name...',
            onFocus : this.clearLabelValue.bind(this),
            render: {
                option  : this.renderSelectizeOption.bind(this),
                item    : this.renderSelectizeItem.bind(this)
            },
        })[0].selectize;

        // Fix height problem
        this.selectize.close();

        // Submit form on click "submit" button
        this.submit.addEventListener('click', this.form.submit.bind(this.form), false);
    }


    // Set end time [min hour]
    EventCreate.prototype.onStartChange = function(text, date, inst){
        this.$end.data('datepicker').update({
            minHours : date.getHours()
        });
    }

    // Set start time [max hour]
    EventCreate.prototype.onEndChange = function(text, date, inst){
        this.$start.data('datepicker').update({
            maxHours : date.getHours()
        });
    }


    // Need to clear becouse selectize plugin has bug with search function
    EventCreate.prototype.clearLabelValue = function(){
        this.selectize.clear(true);
    }


    EventCreate.prototype.renderSelectizeOption = function(item, escape) {
        return [
            '<div class="flex w-full items-center px-2 py-2">',
            '<span>' + escape(item.text) + '</span>',
            '<i class="w-1/4 h-3 ml-auto rounded" style="background-color: ' + item.color + '"></i>',
            '</div>'
        ].join('');
    }


    EventCreate.prototype.renderSelectizeItem = function(item, escape) {
        return [
            '<div class="flex w-full items-center pr-10">',
            '<span>' + escape(item.text) + '</span>',
            '<i class="w-1/4 h-3 ml-auto rounded" style="background-color: ' + item.color + '"></i>',
            '</div>'
        ].join('');
    }

    return EventCreate;
})(window, document, jQuery);
