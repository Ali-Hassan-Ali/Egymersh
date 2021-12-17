$(document).ready(function() {
	
    $(document).on('change','#select-governorate',function(e) {
        e.preventDefault();

        var $option      = $(this).find(":selected");
        var id           = $option.data('id');
        var method       = 'get';
        var url          = 'governorate_shipping/'+id;

        $.ajax({
            url: url,
            method: method,
            success: function (data) {
                
                $('.shipping-price').empty('');
                
                if ($('#loca').text() == 'ar') {

                    name = 'ج م';

                } else {

                    name = 'LE';
                }

                if (data.length < 0) {

                    $('.shipping-price').html('0');

                } else {
                    $('.cart-subtotal').html(data.total_price + ' ' + name);

                    $('.shipping-price').html(data.price);

                }//end of if

            }//end of success
        });//end of ajax

    });//end of change governorate

    $('#profil-submit').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        var url      = $(this).attr('action');
        var method   = $(this).attr('method');
        var data     = $(this).serialize();
        var items    = $(this).serializeArray();


        $.each(items, function(index,item) {

            $('#' + item.name + '-prfile').removeClass('is-invalid');
            $('#' + item.name + '-prfile-error').text('');

        });//end of each

        $.ajax({
            url: url,
            method: method,
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {

               if (data.success == true) {

                 swal('update success', {
                    type: "success",
                    icon: "success",
                    buttons: false,
                    timer: 3000,
                });

               }

            }, error: function(data) {

                $.each(data.responseJSON.errors, function(name,message) {

                    $('#' + name + '-prfile').addClass('is-invalid');
                    $('#' + name + '-prfile-error').text(message);

                });//end of each

            },//end of success

        });//end of ajax

    });//end of submit profil

    $('#edit-prfile-image').on('change', function (e) {
        e.preventDefault();

        if(this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {

                $('.main-profile-img').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }

    });//end of change image

    $("#printing_field_no").on("click",function() {
        $(".ans").addClass('answer');
    });

    $("#printing_field_yes").on("click",function() {
        $(".ans").removeClass('answer');
    });

    $('#sellersRegister').on('submit', function(e) {
        e.preventDefault();

        $('#seller-image-country').val($('.niceCountryInputMenuCountryFlag').attr('src'));
        $('#seller-country').val($('.country-setting').text());

        var url    = $(this).attr('action');
        var method = $(this).attr('method');
        var data   = $(this).serialize();
        var items  = $(this).serializeArray();
        var redircte  = "myStore/";

        $("textarea[name='about_yourself']").removeClass('error');

        $.each(items, function(index,item) {

            if (index == 1) {

                $('#make_designs_use-error').text('');
            }

            $("input[name="+item.name+"]").removeClass('is-invalid');
            $('#' + item.name + '-error').text('');

        });//end of each

        $.ajax({
            url: url,
            method: method,
            data: data,
            success: function(data) {

                location.reload();
                window.location.href = redircte;

            }, error: function(data) {

                $.each(data.responseJSON.errors, function(name,message) {

                    if (name == 'about_yourself') {
                        $("textarea[name="+name+"]").addClass('error');
                    }

                    $("input[name="+name+"]").addClass('is-invalid');
                    $('#' + name + '-error').text(message);

                });//end of each
            },
        });//end of ajax

    });//end of create acount seller


    // niceCountryInput js
    function onChangeCallback(ctr){
        console.log("The country was changed: " + ctr);
        //$("#selectionSpan").text(ctr);
    }

    // niceCountryInput js
    $(".niceCountryInputSelector").each(function(i,e){
        new NiceCountryInput(e).init();
    });

});//end of document redy function