@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Payment Detail
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.payments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                           Transaction Number
                        </th>
                        <td>
                            {{ $payment->txn_number }}
                        </td>
                        <th>
                            Paid To
                        </th>
                        <td>
                            {{ $payment->user->name }}
                        </td>
                    </tr>

                     <tr>
                        <th>
                           Amount
                        </th>
                        <td>
                            {{ $payment->amount }}
                        </td>
                        <th>
                            Payment Status
                        </th>
                        <td>
                            <strong>{{ $payment->payment_status }}</strong>

                        </td>
                    </tr>

                    <tr>
                        <th>
                           Payment Date
                        </th>
                        <td>
                           {{$payment->created_at}}
                        </td>
                        <th>
                           Payment Type
                        </th>
                        <td>
                           {{$payment->payment_type}}
                        </td>
                    </tr>

                    <tr>
                        <th>
                           Payee Name
                        </th>
                        <td>
                           {{$payment->name}}
                        </td>
                        <th>
                           Payee Email
                        </th>
                        <td>
                           {{$payment->email}}
                        </td>
                    </tr>
                     <tr>
                        <th>
                           Payee Mobile
                        </th>
                        <td>
                           {{$payment->mobile}}
                        </td>
                        <th>
                           Payee Address
                        </th>
                        <td>
                           {{$payment->address}}
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.payments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
