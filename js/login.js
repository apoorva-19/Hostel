$(document).ready(function(){

    $('#staffLink').on('click', function(event) {
        event.preventDefault();
        $('#student-login').slideToggle( 500, function() {
            $('#staff-login').fadeIn('fast');
        });
    });

    $('#studentLink').on('click', function(event) {
        event.preventDefault();
        $('#staff-login').slideToggle( 500, function() {
            $('#student-login').fadeIn('fast');
        });
    });

    $('#studentSignIn').submit(function(event) {
        event.preventDefault();
        studentFormSubmit();
    });

    $('#staffSignIn').submit(function(event) {
        event.preventDefault();
        staffFormSubmit();
    });

    function studentFormSubmit() {

        $('#studentSignIn').validate({
            highlight: function(input) {
                $(input).parents('.form-line').addClass('error');
            },
            unhighlight: function(input) {
                $(input).parents('.form-line').removeClass('error');
            },
            errorPlacement: function(error, element) {
                $(element).parents('.input-group').append(error);
            },
            submitHandler: function(form) {
                $.ajax({
                    type: "POST",
                    url: $(form).attr('action'),
                    data: $(form).serialize()
                })
                .done(function(response) {
                    var JSONresponse = JSON.parse(response);
                    if(JSONresponse.status == "success")
                        window.location.href = JSONresponse.url;
                    else {
                        swal({
                            title: JSONresponse.status,
                            text: JSONresponse.message,
                            type: 'error'
                        });
                    }
                });
                return false;
            }
        });

        $("#misID").rules("add", {
            required: true,
            pattern: /^[ICE]{1}2K[0-9]{8}$/,
            messages: {
                required: "This field is required",
                pattern: "Please enter a valid MIS ID"
            }
        });

        $("#studentPassword").rules("add", {
            required: true,
            rangelength: [8, 72],
            messages: {
                required: "This field is required",
                rangelength: "Password must be between 8 and 72 characters long"
            }
        });

    }

    function staffFormSubmit() {

        $('#staffSignIn').validate({
            highlight: function(input) {
                $(input).parents('.form-line').addClass('error');
            },
            unhighlight: function(input) {
                $(input).parents('.form-line').removeClass('error');
            },
            errorPlacement: function(error, element) {
                $(element).parents('.input-group').append(error);
            },
            submitHandler: function(form) {
                $.ajax({
                    type: "POST",
                    url: $(form).attr('action'),
                    data: $(form).serialize()
                })
                .done(function(response) {
                    var JSONresponse = JSON.parse(response);
                    if(JSONresponse.status == "success")
                        window.location.href = JSONresponse.url;
                    else {
                        swal({
                            title: JSONresponse.status,
                            text: JSONresponse.message,
                            type: 'error'
                        });
                    }
                });
                return false;
            }
        });        

        $("#username").rules("add", {
            required: true,
            messages: {
                required: "This field is required"
            }
        });

        $("#staffPassword").rules("add", {
            required: true,
            rangelength: [8, 72],
            messages: {
                required: "This field is required",
                rangelength: "Password must be between 8 and 72 characters long"
            }
        });

    }

});