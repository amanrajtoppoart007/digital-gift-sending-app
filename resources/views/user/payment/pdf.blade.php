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
    </style>
</head>
<body>
<div class="center">
    <h3>{{trans('panel.site_title')}} Payment Receipt</h3>
    <table class="styled-table">
        <tr>
            <th>Txn Number</th>
            <td>{{$payment->txn_number}}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{$payment->name}}</td>
        </tr>
        <tr>
            <th>Paid To</th>
            <td>{{$payment->user->name}}</td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>{{$payment->amount}}</td>

        </tr>
        <tr>
            <th>Payment Status</th>
            <td>{{$payment->payment_status}}</td>

        </tr>
        <tr>
            <th>Payment Date</th>
            <td>{{$payment->created_at}}</td>

        </tr>
        <tr>
            <th>Payee Name</th>
            <td>{{$payment->name}}</td>

        </tr>
        <tr>
            <th>Payee Email</th>
            <td>{{$payment->email}}</td>

        </tr>
        <tr>
            <th>Payee Mobile</th>
            <td>{{$payment->mobile}}</td>

        </tr>
        <tr>
            <th>Payee Address</th>
            <td>{{$payment->address}}</td>

        </tr>

    </table>
</div>

</body>
</html>
