<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body id="app-layout">
<div class="container">
    <div class="row" style="margin-top: 100px;">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table">
                    <div class="row display-tr">
                        <h3 class="panel-title display-td">Payment Details</h3>
                        <div class="display-td">
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form action="{{ route('order-post') }}" method="post" data-parsley-validate="" id="payment-form" novalidate="">

                            @csrf

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="plane">Select Plan:</label>
                                <select class="form-control" required="required"
                                        data-parsley-class-handler="#product-group" id="plane"
                                        name="plane">
                                    <option value="price_1ITpB5FOGLyEH2rNHrxmFfeP">Game ($50)</option>
                                    <option value="movie">Movie ($100)</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div id="card-element"></div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <button type="submit" id="card-button" class="btn btn-lg btn-block btn-success btn-order">Place
                                    order!
                                </button>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                <span class="payment-errors" id="card-errors"
                                      style="color: red;margin-top:10px;"></span>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<!-- PARSLEY -->


<script src="http://parsleyjs.org/dist/parsley.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="https://js.stripe.com/v3/"></script>

<script>
    var style = {
        base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    const stripe = Stripe('pk_test_zNc5tquatSbXljddf76ksHaF00mTm5lWhM', {locale: 'en'}); // Create a Stripe client.
    const elements = stripe.elements(); // Create an instance of Elements.
    const card = elements.create('card', {style: style}); // Create an instance of the card Element.

    card.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

    card.on('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');


    form.addEventListener('submit', function (event) {
        event.preventDefault();

        stripe.createToken(card).then(function (result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });
    

    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }


</script>
</body>
</html>