<!DOCTYPE html>
<html>
<head>
    <title>Invoice {{ $invoice->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { padding: 20px; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 10px; text-align: left; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Invoice {{ $invoice->id }}</h1>

        <p><strong>Company:</strong> {{ $company->name }}</p>
        <p><strong>Customer:</strong> {{ $customer->name }}</p>
        <p><strong>Total Amount:</strong> ${{ $invoice->total_amount }}</p>
        <p><strong>Issue Date:</strong> {{ $invoice->issue_date }}</p>
        <p><strong>Due Date:</strong> {{ $invoice->due_date }}</p>

        <h2>Invoice Details:</h2>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice->invoiceItems as $item)
                    <tr>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ $item->unit_price }}</td>
                        <td>${{ $item->quantity * $item->unit_price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>