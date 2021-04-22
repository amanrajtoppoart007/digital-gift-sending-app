@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Transaction Detail
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transactions.index') }}">
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
                            {{ $transaction->txnid }}
                        </td>
                        <th>
                            Paid To
                        </th>
                        <td>
                            {{ $transaction->payment->user->name }}
                        </td>
                    </tr>

                     <tr>
                        <th>
                           Amount
                        </th>
                        <td>
                            {{ $transaction->amount }}
                        </td>
                        <th>
                            Payment Status
                        </th>
                        <td>
                            <strong>{{ $transaction->status }}</strong>

                        </td>
                    </tr>

                    <tr>
                        <th>
                           Payment Date
                        </th>
                        <td>
                           {{$transaction->created_at}}
                        </td>
                        <th>

                        </th>
                        <td>

                        </td>
                    </tr>

                    <tr>
                        <th>
                           Payee Name
                        </th>
                        <td>
                           {{$transaction->firstname}}
                        </td>
                        <th>
                           Payee Email
                        </th>
                        <td>
                           {{$transaction->email}}
                        </td>
                    </tr>
                     <tr>
                        <th>
                           Payee Mobile
                        </th>
                        <td>
                           {{$transaction->phone}}
                        </td>
                        <th>
                          Moda
                        </th>
                        <td>
                           {{$transaction->mode}}
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transactions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
