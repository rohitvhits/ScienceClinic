<!DOCTYPE html>
<html>
<head>
    <title>Science Clinic</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/img/favicon.ico')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    
<div class="container">
    
    
    
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                        <h3 class="panel-title" >Payment Details</h3>
                </div>
                <div class="panel-body">
    
                    @if (Session::has('error'))
                        <div class="alert alert-error text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('error') }}</p>
                        </div>
                    @endif
    
                    <form 
                            role="form" 
                            action="{{ route('redirectPayment') }}" 
                            method="post" 
                            class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="pk_test_51Hf1hEDhoJZw9YjJBx5EBDEbLlV5XZiGAPszzwf7Jt3kwS98f5AhiIKya1vOGz57HmaOaiSYkSLh3by5H6cBF4Uh00qNUm2Qfd"
                            id="payment-form">
                        @csrf
                        <input type="hidden" name="parent_token" value="{{$id}}" />
                        <input type="hidden" name="pay_amount" value="{{$total}}" />
                        <input type="hidden" name="total_commision" value="{{$total_commision}}" />
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control charCls' name="name" size='4' type='text'>
                            </div>
                        </div>
    
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' id="card-number" class='form-control card-number' size='20'
                                    type='text'>
                            </div>
                        </div>
    
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>
    
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now (£{{$total}})</button>
                            </div>
                        </div>
                            
                    </form>
                </div>
            </div>        
        </div>
    </div>
        
</div>
    
</body>
    
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
<script type="text/javascript">
  
$(function() {
  
    /*------------------------------------------
    --------------------------------------------
    Stripe Payment Code
    --------------------------------------------
    --------------------------------------------*/
    $(".charCls").keypress(function(event) {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');
    
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
     
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
    
    });
      
    /*------------------------------------------
    --------------------------------------------
    Stripe Response Handler
    --------------------------------------------
    --------------------------------------------*/
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
                 
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
    input_credit_card = function(input) {
            var format_and_pos = function(char, backspace) {
            var start = 0;
            var end = 0;
            var pos = 0;
            var separator = " ";
            var value = input.value;
            if (char !== false) {
                start = input.selectionStart;
                end = input.selectionEnd;
                if (backspace && start > 0) // handle backspace onkeydown
                {
                    start--;
                    if (value[start] == separator) {
                        start--;
                    }
                }
                // To be able to replace the selection if there is one
                value = value.substring(0, start) + char + value.substring(end);
                pos = start + char.length; // caret position
            }
            var d = 0; // digit count
            var dd = 0; // total
            var gi = 0; // group index
            var newV = "";
            var groups = /^\D*3[47]/.test(value) ? // check for American Express
                [4, 6, 5] : [4, 4, 4, 4];
            for (var i = 0; i < value.length; i++) {
                if (/\D/.test(value[i])) {
                    if (start > i) {
                        pos--;
                    }
                } else {
                    if (d === groups[gi]) {
                        newV += separator;
                        d = 0;
                        gi++;

                        if (start >= i) {
                            pos++;
                        }
                    }
                    newV += value[i];
                    d++;
                    dd++;
                }
                if (d === groups[gi] && groups.length === gi + 1) // max length
                {
                    break;
                }
            }
            input.value = newV;
            if (char !== false) {
                input.setSelectionRange(pos, pos);
            }
        };
        input.addEventListener('keypress', function(e) {
            var code = e.charCode || e.keyCode || e.which;
            if (code !== 9 && (code < 37 || code > 40) &&
                !(e.ctrlKey && (code === 99 || code === 118))) {
                e.preventDefault();
                var char = String.fromCharCode(code);
                if (/\D/.test(char) || (this.selectionStart === this.selectionEnd &&
                        this.value.replace(/\D/g, '').length >=
                        (/^\D*3[47]/.test(this.value) ? 15 : 16)))
                {
                    return false;
                }
                format_and_pos(char);
            }
        });
        input.addEventListener('keydown', function(e) {
            if (e.keyCode === 8 || e.keyCode === 46) // backspace or delete
            {
                e.preventDefault();
                format_and_pos('', this.selectionStart === this.selectionEnd);
            }
        });
        input.addEventListener('paste', function() {
            setTimeout(function() {
                format_and_pos('');
            }, 50);
        });
        input.addEventListener('blur', function() {
            format_and_pos(this, false);
        });
    };
    input_credit_card(document.getElementById('card-number'));
     
});
</script>
</html>