<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Invoices</title>

    </head>
    <body>

        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>View</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->dateString() }}</td>
                        <td>{{ $invoice->dollars() }}</td>
                        <td>
                            <a href="/invoice/{{ $invoice->id }}">View</a>
                        </td>
                        <td>
                            <a href="/invoice/{{ $invoice->id }}/download">Download</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </body>
</html>
