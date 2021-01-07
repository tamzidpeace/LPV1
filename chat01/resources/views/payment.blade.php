<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>


<script src="{{ asset('js/app.js') }}"></script>

<div class="content">
    <div class="title m-b-md">
        Stripe Payment
    </div>
</div>

<div class="links">
    <form action="/api/payment" method="post">
        <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="pk_test_zNc5tquatSbXljddf76ksHaF00mTm5lWhM"
            data-amout="100"
            data-name="arafat"
            data-description="example charge"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto"
            data-currency="usd">

        </script>
    </form>
</div>

</body>
</html>
