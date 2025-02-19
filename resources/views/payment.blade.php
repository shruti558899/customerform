<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Stripe Payment</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>

    <h2>Stripe Payment Form</h2>

    <form action="{{ route('stripe.payment') }}" method="POST" id="payment-form">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <br>

        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <br>

        <label for="card-element">Credit or debit card</label>
        <div id="card-element">
            <!-- Stripe Element will be inserted here -->
        </div>

        <div id="card-errors" role="alert"></div>

        <button type="submit" id="submit-button">Submit Payment</button>
    </form>

    <script>
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            stripe.createToken(cardElement).then(function (result) {
                if (result.error) {
                    // Display error in #card-errors div
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Add token to hidden input and submit form
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', result.token.id);
                    form.appendChild(hiddenInput);

                    // Submit the form
                    form.submit();
                }
            });
        });
    </script>


</body>

</html>