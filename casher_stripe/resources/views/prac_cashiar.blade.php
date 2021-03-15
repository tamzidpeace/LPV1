<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<input id="card-holder-name" type="text">

<!-- Stripe Elements Placeholder -->
<div id="card-element"></div>

<button id="card-button" data-secret="{{ $intent->client_secret }}">
    Update Payment Method
</button>

<!--scripts-->

<script src="{{ asset('js/app.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script src="https://js.stripe.com/v3/"></script>

<script>
    //card-initialized
    const stripe = Stripe('pk_test_zNc5tquatSbXljddf76ksHaF00mTm5lWhM');
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    //rest code
    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;

    cardButton.addEventListener('click', async (e) => {
        const {setupIntent, error} = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {name: cardHolderName.value}
                }
            }
        );

        if (error) {
            // Display "error.message" to the user...
            console.log(error)
        } else {
            // The card has been verified successfully...
            console.log('verified')
            console.log(setupIntent)

            //sending confirmed result to controller
            $.ajax({
                url: '{{ route('cashier.process') }}',
                method: 'post',
                dataType: 'text',
                data: {pm: setupIntent.payment_method},
                success: function (result) {
                    console.log(result)
                },
                error: function (error) {
                    console.log(error)
                }
            })
        }
    });

</script>

</body>
</html>
