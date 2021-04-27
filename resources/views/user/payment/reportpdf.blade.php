<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
            padding: 120px;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        tfoot>tr>td{
            text-align: right;
        }
    </style>
</head>
<body>
<div class="center">
    <h3>{{trans('panel.site_title')}} Payment Report</h3>
    <table class="styled-table">
        <thead>
        <tr>
            <th>Txn Number</th>
            <th>Amount</th>
            <th>Payment Status</th>
            <th>Payment Date</th>
            <th>Payee Name</th>
            <th>Payee Email</th>
            <th>Payee Mobile</th>
            <th>Payee Address</th>
        </tr>
        </thead>
        <tbody>
        @php $total = 0 @endphp
        @foreach($payments as $payment)
            @php $total += $payment->amount @endphp
            <tr>
                <td>{{$payment->txn_number}}</td>
                <td>{{$payment->amount}}</td>
                <td>{{$payment->payment_status}}</td>
                <td>{{$payment->created_at}}</td>
                <td>{{$payment->name}}</td>
                <td>{{$payment->email}}</td>
                <td>{{$payment->mobile}}</td>
                <td>{{$payment->address}}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="">Total:</td>
            <td colspan="">{{$total}}</td>
            <td colspan="6"></td>
        </tr>
        </tfoot>
    </table>
</div>

</body>
</html>
