/*
 * jQuery File Upload Plugin JS Example
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */

/* global $, window */

$(function () {
    'use strict';

    // Initialize the jQuery File Upload widget:
 // Initialize the jQuery File Upload widget:
    $('#fileupload').fileupload({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: $('span#file_url').attr('url'),
            sequentialUploads:true,
            stop:function (e) {
                    $.blockUI({ 
                        message: '<h1>Adding Thumbnails, Completing.</h1>', 
                        timeout: 5000 
                    }); 

                setInterval(location.reload(),4000);
            },
            destroy: function (e, data) {
                    var that  = $(this).data('fileupload');
                    if ( typeof e.originalEvent.originalEvent == "undefined" ) {
                        // Click on the "Delete All Button"
                    } else {
                        // Click on the file delete button
                    }
                }
    });

    // Enable iframe cross-domain access via redirect option:
    $('#fileupload').fileupload(
        'option',
        'redirect',
        window.location.href.replace(
            /\/[^\/]*$/,
            '/cors/result.html?%s'
        )
    );
        // Load existing files:
        $('#fileupload').addClass('fileupload-processing');
        $.ajax({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: $('#fileupload').fileupload('option', 'url'),
            dataType: 'json',
            context: $('#fileupload')[0]
        }).always(function () {
            $(this).removeClass('fileupload-processing');
        }).done(function (result) {
            $(this).fileupload('option', 'done').call(this, $.Event('done'), {result: result});
        });

});
