var PSF = {
    inline_dialog:{
        settings:{
            dialog_wraper:'#message_wrap',
            error_class:'alert-error',
            warning_class:'alert-warning',
            success_class:'alert-success',
            timeout:3000
        },
        showError: function (message, autohide){
            var settings = this.settings;
            $(settings.dialog_wraper).html(message);
            this.removeStyles();
            $(settings.dialog_wraper).addClass(settings.error_class);
            $(settings.dialog_wraper).slideDown(300);
            autohide && this.autoHide();
        },
        showWarning: function (message, autohide){
            var settings = this.settings;
            $(settings.dialog_wraper).html(message);
            this.removeStyles();
            $(settings.dialog_wraper).addClass(settings.warning_class);
            $(settings.dialog_wraper).slideDown(300);
            autohide && this.autoHide();
        },
        showSuccess: function (message, autohide){
            var settings = this.settings;
            $(settings.dialog_wraper).html(message);
            this.removeStyles();
            $(settings.dialog_wraper).addClass(settings.success_class);
            $(settings.dialog_wraper).slideDown(300);
            autohide && this.autoHide();
        },
        removeStyles:function(){
            var settings = this.settings;
            $(settings.dialog_wraper).removeClass(settings.error_class).removeClass(settings.warning_class).removeClass(settings.success_class);
        },
        autoHide:function(){
            var settings = this.settings;
            window.setTimeout(function(){
                $(settings.dialog_wraper).slideUp(300);
            }, settings.timeout);
        }
    },
    blockui:{
        settings:{
            loader_html:$('<div id="loader_wrap"><img src="images/loader.gif"/></div>')
        },
        showLoader:function(container){
            $(container).css('position','relative');
            var settings = this.settings;
            $(container).append(settings.loader_html);
            $(settings.loader_html).fadeIn(300);
        },
        hideLoader:function(){
            var settings = this.settings;
            $(settings.loader_html).fadeOut(300).remove();
        }
    },
    emailValidate:function(email) {
        
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        if(reg.test(email) == false) {
            return false;
        }
        else
        {
            return true;
        }
    },
    number_format :function(number, decimals, dec_point, thousands_sep) {

        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');}
        return s.join(dec);
    },
    crud_nav:{
        settings:{
            slider_wrapper:$('#slider-container')
        },
        show_home:function(){
            var margin = 0;
            this.settings.slider_wrapper.animate({marginLeft:margin}, 800, 'easeOutBack');
        },
        show_add:function(){
            var margin = -1920;
            this.settings.slider_wrapper.animate({marginLeft:margin}, 800, 'easeOutBack');
        },
        show_edit:function(){
            var margin = -960;
            this.settings.slider_wrapper.animate({marginLeft:margin}, 600, 'easeInBack');
        }
    },
    validate:function(elements){
        var numreg = /^\d+$/,
        errors = '<ul>',
        is_success = true;
        elements.each(function(){
            var name = $(this).data('name'),
            type = $(this).data('type'),
            canempty = $(this).data('canempty'),
            compare = $(this).data('compare'),
            value = $(this).val();
            if(type == 'text' && !canempty){
                if(compare){
                    var compare_value = elements.parent().find('#' + compare).val();
                    if(value != compare_value ){
                        is_success = false;
                        errors += '<li>' + PSF.ucfirst(name.replace('_', ' ')) + ' doesn\'t match</li>';
                    }
                }
                else if(value == ""){
                    is_success = false;
                    errors += '<li>Please enter ' + PSF.ucfirst(name.replace('_', ' ')) + '</li>';
                }
            }
            else if(type == 'email'){
                if(!PSF.emailValidate(value)){
                    is_success = false;
                    errors += '<li>Please enter ' + PSF.ucfirst(name.replace('_', ' ')) + ' field as a valid email</li>';
                }
            }
            else if(type == 'number'){
                if(!numreg.test(Math.abs(value) ) ){
                    is_success = false;
                    errors += '<li>Please enter ' + PSF.ucfirst(name.replace('_', ' ')) + ' field should be a number</li>';
                }
            }
        });
        errors += '</ul>';
        return {errors:errors, is_success:is_success};
    },
    resetInputs:function(inputs){
        inputs.each(function(){
            var nodefault = $(this).data('nodefault');
            nodefault || $(this).val('');
            $(this).removeAttr('checked');
        });
    },
    setValuesToInput:function(inputs, data){
        inputs.each(function(){
            var name = $(this).data('name'),
            nodefault = $(this).data('nodefault');
            if(!$(this).is(':checkbox'))
                nodefault || $(this).val(data[name]) ;
            else
                nodefault || (~~data[name]) ? $(this).attr('checked', true): $(this).removeAttr('checked') ;
        });
    },
    setupInputForRequest:function(elements){
        var postvalues = {};
        elements.each(function(){
            var name = $(this).data('name'),
            value = (!$(this).is(":checkbox") ) ? $(this).val() : ~~( $(this).is(":checked"));
            postvalues[name] = value;
        });
        return postvalues;
    },
    ucfirst : function(str) {
         
        str += '';
        var f = str.charAt(0).toUpperCase();
        return f + str.substr(1);
    },
    removeHighlight: function(elements, delay){
        elements.each(function(i){
            if($(this).hasClass('highlightrow'))
            {
                $(this).animate({backgroundColor:'#FBFBFB'}, delay, function(){
                    $(this).removeClass('highlightrow');
                    $(this).removeAttr('style');
                });
            }

        });
    }
}

