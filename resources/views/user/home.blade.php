@extends('user.layout.app')
@section('content')
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>

                    <div class="card-body" style="min-height:450px">

                        <h6><strong>User Detail</strong></h6>

                        <table class="table">
                            <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{auth()->user()->name}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{auth()->user()->email}}</td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td>{{auth()->user()->mobile}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <h6><strong>Account Detail</strong></h6>
                        <p class="text-danger">Please double check the bank details. We won’t be responsible for any transfer made to wrong
                            bank account shared by you.</p>
                        <table class="table">
                            <tbody>
                            <tr>
                                <th class="w-25">Name</th>
                                <td>{{ $account->name ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Bank Name</th>
                                <td>{{ $account->bank_name ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Account Number</th>
                                <td>{{ $account->account_number ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>IFSC Code</th>
                                <td>{{ $account->ifsc_code ?? '' }}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

