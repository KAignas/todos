/*======================================================================================
*
*
*    Image Uploader
*
*
======================================================================================*/

import _ from './../vendor/_.js';

const ImageReader = (function(w, d, _){

    function ImageReader(el){
        this.el     = el;
        this.types  = ['image/jpg', 'image/png', 'image/gif', 'image/jpeg'];
        this.image  = null;
        this.input  = el.getElementsByTagName('input')[0];
        this.image  = el.getElementsByTagName('img')[0];
        this.file   = null;
        this.reader = new FileReader();

        this.reader.onload = render.bind(this);
        this.input.addEventListener('change', onChange.bind(this), false);
    }

    ImageReader.prototype.delete = function(){
        if(!this.image){ return; }
        this.el.removeChild(this.image);
        this.image = null;
    }


    /* On input change */

    function onChange(e){
        e = e || w.event;
        e.preventDefault();

        if(!this.input.files.length){
            this.delete();
            return;
        }

        this.file = this.input.files[0];
        if(this.types.indexOf(this.file.type) == -1){
            return;
        }

        this.reader.readAsDataURL(this.file);
    }


    /* Getting reader data and output image */

    function render(e){
        if(!this.image){
            this.image = d.createElement('img');
            this.el.appendChild(this.image);
        }
        this.image.src = e.target.result;
    }

    return ImageReader;
}(window, document, _));

export default ImageReader;