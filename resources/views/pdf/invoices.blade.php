<!DOCTYPE html>
<html>
<head>
    <title>Invoices for {{ $company->name }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
    </style>
</head>
<body>

    <h2>Invoices for {{ $company->name }}</h2>

    @foreach($invoices as $year => $yearInvoices)
        <h3>Year: {{ $year }}</h3>
        <table>
            <thead>
                <tr>
                    <th>Invoice Number</th>
                    <th>Total Amount (€)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($yearInvoices as $invoice)
                    <tr>
                        <td>{{ $invoice->invoice_number }}</td>
                        <td>{{ number_format($invoice->total_amount, 2, ',', ' ') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Total for {{ $year }}</th>
                    <th>{{ number_format($totals[$year], 2, ',', ' ') }} €</th>
                </tr>
            </tfoot>
        </table>
    @endforeach

</body>
</html>
