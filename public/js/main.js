$(document).ready(function () {
    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test($email);
    }

    function validateInput(input) {
        if (input == '') {
            $(".error-message").text('Email address is required');
            $('.input-wrapper :input[type="submit"]').prop('disabled', true).removeClass('validated');
        } else if (!validateEmail(input)) {
            $(".error-message").text('Please provide a valid e-mail address');
            $('.input-wrapper :input[type="submit"]').prop('disabled', true).removeClass('validated');
        } else {
            var extention = input.split(".");
            var country_code = extention[extention.length - 1];

            if (country_code == 'co') {
                $(".error-message").text('We are not accepting subscriptions from Colombia emails');
                $('.input-wrapper :input[type="submit"]').prop('disabled', true).removeClass('validated');
            } else {
                $(".error-message").text('');

                if ($('.checkbox-container input').prop('checked')) {
                    $('.input-wrapper :input[type="submit"]').prop('disabled', false).addClass('validated');
                }
            }
        }
    }

    function validateCheckbox() {
        if (!$('.checkbox-container input').prop('checked')) {
            $(".terms-error").text('You must accept the terms and conditions');
            $('.input-wrapper :input[type="submit"]').prop('disabled', true).removeClass('validated');
        } else {
            $(".terms-error").text('');

            if ($(".error-message").text() == '') {
                $('.input-wrapper :input[type="submit"]').prop('disabled', false).addClass('validated');
            }
        }
    }

    validateInput($("#email").val());
    validateCheckbox();

    $("#email").on('input', function () {
        validateInput(this.value);
    });

    $('.checkbox-container input').click(function () {
        validateCheckbox();
    });
});