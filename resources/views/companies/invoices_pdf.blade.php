<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $company->name }} - Invoices Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table, .table th, .table td { border: 1px solid black; }
        .table th, .table td { padding: 8px; text-align: left; }
        .table th { background-color: #f2f2f2; }
        .year-heading { margin-top: 20px; font-size: 18px; font-weight: bold; }
    </style>
</head>
<body>

    <h2>Invoices for {{ $company->name }}</h2>

    @foreach($invoicesByYear as $year => $invoices)
        <div class="year-heading">Year: {{ $year }}</div>
        <table class="table">
            <thead>
                <tr>
                    <th>Invoice Number</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                @php $yearTotal = 0; @endphp
                @foreach($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->invoice_number }}</td>
                        <td>€{{ number_format($invoice->total_amount, 2) }}</td>
                    </tr>
                    @php $yearTotal += $invoice->total_amount; @endphp
                @endforeach
                <tr>
                    <td><strong>Total for {{ $year }}</strong></td>
                    <td><strong>€{{ number_format($yearTotal, 2) }}</strong></td>
                </tr>
            </tbody>
        </table>
    @endforeach

</body>
</html>
