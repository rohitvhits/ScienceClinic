<html>

<body>
    Redirecting For Payment...
    <br>
    Please do not Close this Window or press Back Button

    <input type="hidden" name="parent_token" id="parent_token" value="{{$id}}" />
    <input type="hidden" name="pay_amount" id="pay_amount" value="{{$total}}" />
    <input type="hidden" name="total_commision" id="total_commission" value="{{$total_commision}}" />


    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        let stripe = Stripe('{{env("STRIPE_KEY")}}');
        let parent_token = $('#parent_token').val();
        let pay_amount = $('#pay_amount').val();
        let total_commission = $('#total_commission').val();


        let data = {
            _token: '{{csrf_token()}}',
            parent_token: parent_token,
            pay_amount: pay_amount,
            total_commission: total_commission
        };
        fetch("{{route('create-payment-session')}}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(session) {
                return stripe.redirectToCheckout({
                    sessionId: session.id
                });
            })
            .then(function(result) {
                if (result.error) {
                    alert(result.error.message);
                }
            })
            .catch(function(error) {
                console.error('Error:', error);
            });
    </script>

</body>

</html>