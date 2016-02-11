(function (window, document) {
    $('#loading').hide();
    $('#theform').show();

    console.log('starting up');
    'use strict';
    
    $(document).ready(function () {
        console.log('document ready');
      // auto numeric with no commas, the form submit will fail
        $('#donation-amount').autoNumeric('init', {aSep: ''});

      
    // validate the form
        $('#Edit').validate({
          // initialize the plugin
            rules: {
                first_name: {
                    required: true,
                    minlength: 1
                },
                last_name: {
                    required: true,
                    minlength: 1
                },
                'email': {
                    required: true,
                    email: true
                },
                'phone-Primary-1': {
                    required: true,
                    minlength: 11,
                    digits: true
                },
                amountngn: {
                    required: true,
                    number: true
                }
            },
            validClass: "green-border",
            submitHandler: function (form) {
                console.log('submit handler');
      // Submit to the iframe a sspecified for this form
                form.submit();
              // set a timeout on the proceed function
              // we do not want to wait more than a half minute
                setTimeout(proceed, 30000);
                $('#loading').show();
                $('#theform').hide();
            },
            messages: {
                first_name: {
                    required: "Please specify your first name",
                    minlength: "Your first name must be at least 1 character."
                },
                last_name: {
                    required: "Please specify your last name",
                    minlength: "Your last name must be at least 1 character."
                },
                'email': {
                    required: "Please enter a valid email address",
                    email: "The email address must be in the format of name@domain.tld"
                },
                'phone-Primary-1': {
                    required: "Please enter a valid phone number",
                    minlength: "The phone number must be at least 11 characters"
                },
                amountngn: {
                    required: "Please tell us the total amount you want to give each time.",
                    number: "Please enter only a valid number e.g. 1000.00"
                },
                
            }
        });
    });
    
  

    
})(window, document);