<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Cool Store</title>

    </head>
    <body>

        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->cart as $cart)
                    <tr>
                        <td>{{ $cart->product->name }}</td>
                        <td>${{ $cart->product->price }}</td>
                        <td>{{ $cart->quantity }}</td>
                        <td>${{ $cart->product->price * $cart->quantity }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" align="right"><strong>Sub Total</strong></td>
                    <td>${{ $subTotal = $user->cart->sum(function ($cart) {
                        return $cart->product->price * $cart->quantity;
                    }) }}</td>
                </tr>
            </tbody>
        </table>

        <form action="/" method="POST">
          <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="pk_test_7ryw57dRlToy5rZGl9JO9gcs"
            data-name="My Cool Store"
            data-amount="{{ $subTotal * 100 }}"
            data-email="{{ $user->email }}"
            data-locale="auto">
          </script>
        </form>

    </body>
</html>
