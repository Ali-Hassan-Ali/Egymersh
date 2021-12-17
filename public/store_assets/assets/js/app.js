$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    
    var locale = $('#getLocale').text();

    if (locale == 'ar') {

         var addmessage = 'تم الاضافه بنجاح';
         var updatemessage = 'تم التعديل بنجاح';

    } else {

         var addmessage = 'added successfully';
         var updatemessage = 'updated successfully';

    }//end of if

    $('.delete').click(function (e) {

        var locale = $('#getLocale').text();

        var that = $(this)

        e.preventDefault();

        if (locale == 'ar') {

            var n = new Noty({
                text: "الاستمرار بلحذف",
                type: "warning",
                killer: true,
                buttons: [
                    Noty.button("نعم", 'btn btn-success mx-2 text-light', function () {
                        that.closest('form').submit();
                    }),

                    Noty.button("لا", 'btn btn-primary mx-2 text-light', function () {
                        n.close();
                    })
                ]
            });

        } else {

            var n = new Noty({
                text: "confirm delete",
                type: "warning",
                killer: true,
                buttons: [
                    Noty.button("yes", 'btn btn-success mx-2 text-light', function () {
                        that.closest('form').submit();
                    }),

                    Noty.button("no", 'btn btn-primary mx-2 text-light', function () {
                        n.close();
                    })
                ]
            });

        }//end of get locale

        n.show();

    });//end of delete

    $('#storeActive').on('change', function(e) {
        e.preventDefault();
        
        var $option = $(this).find(":selected");
        var active  = $option.data('value');
        var id      = $option.data('id');
        var url     = $option.data('url');
        var method  = 'post';

        $.ajax({
            url: url,
            method: method,
            data: {
                id : id,
                active : active,
            },
            success: function(data) {

               if (data.success == true) {

                     new Noty({
                        layout: 'topRight',
                        text: addmessage,
                        killer: true,
                        timeout: 2000,
                    }).show();
               }

            },

        });//end of ajax

    });//end of change storeActive

    $('#save-seeting-password').on('submit', function (e) {
        e.preventDefault();

        var url      = $(this).attr('action');
        var method   = $(this).attr('method');
        var date     = $(this).serialize();
        var items    = $(this).serializeArray();

        $.each(items, function(index,item) {

            $('#' + item.name).removeClass('is-invalid');
            $('#' + item.name + '-error').text('');

        });//end of each

        $.ajax({
            url: url,
            method: method,
            data: date,
            success: function(data) {

               if (data.success == true) {

                    new Noty({
                        layout: 'topRight',
                        text: updatemessage,
                        killer: true,
                        timeout: 2000,
                    }).show();

                    $.each(items, function(index,item) {

                        $('#' + item.name).val('');

                    });//end of each

               }//end of data success

            }, error: function(data) {

                $.each(data.responseJSON.errors, function(name,message) {

                    $('#' + name).addClass('is-invalid');
                    $('#' + name + '-error').text(message);

                });//end of each

            },//end of success

        });//end of ajax

    });//end of change image

    $(window).on("load", function () {

        var country = $('#seller-country').text();
        var imgCoun = $('#seller-imageCountry').text();

        $('.text-light-country').text('');
        $('.text-light-country').append(country);

        $('#image-country').attr('src',imgCoun);

    });/*end of loading*/

    $('#profile-image').on('change', function () {

        if(this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {

                var aa = $('.img-avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }

    });//end of change image

    $('#save-seeting').on('submit', function (e) {
        e.preventDefault();

        $('#profile-image-country').val($('.niceCountryInputMenuCountryFlag').attr('src'));
        var formData = new FormData(this);
        var url      = $(this).attr('action');
        var method   = $(this).attr('method');
        var items    = $(this).serializeArray();


        $.each(items, function(index,item) {

            $('#' + item.name + '-setting').removeClass('is-invalid');
            $('#' + item.name + '-setting-error').text('');

        });//end of each

        $.ajax({
            url: url,
            method: method,
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {

               if (data.success == true) {

                     new Noty({
                        layout: 'topRight',
                        text: addmessage,
                        killer: true,
                        timeout: 2000,
                    }).show();
               }

            }, error: function(data) {

                $.each(data.responseJSON.errors, function(name,message) {

                    $('#' + name + '-setting').addClass('is-invalid');
                    $('#' + name + '-setting-error').text(message);

                });//end of each

            },//end of success

        });//end of ajax

    });//end of change image

});//end of document ready

function onChangeCallback(ctr){
    console.log("The country was changed: " + ctr);
    //$("#selectionSpan").text(ctr);
}

$(document).ready(function () {
    $(".niceCountryInputSelector").each(function(i,e){
        new NiceCountryInput(e).init();
    });
});

interact('.resize-drag').draggable({
    onmove(event) {
      // console.log(event.pageX, event.pageY)
    },
})

var inputElm = document.querySelector('input[name=tag]')

new Tagify(inputElm, {
    // whitelist: ['abb', 'cbb', 'bb', 'bb1', 'aaabb', 'bbb', 'aa', 'bba'],
    // whitelist: ["ac", "aab", "aaa", "b", "bb", "ccc"],
    enforceWhitelist: false,
    dropdown: {
        enabled: 0,
        // sortby: 'startsWith',
        // sortby(suggestions, query){
        //     console.log(suggestions, query)
        //     return suggestions;
        // }
    }
})