<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Subscribe</title>

    </head>
    <body>

        <h3>Manage Your Subscription</h3>

        <form action="/subscribe" method="POST">
          <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="pk_test_7ryw57dRlToy5rZGl9JO9gcs"
            data-name="My Cool Store"
            data-description="Premium Monthly Subscription"
            data-amount="999"
            data-email="{{ $user->email }}"
            data-locale="auto">
          </script>
        </form>

    </body>
</html>
