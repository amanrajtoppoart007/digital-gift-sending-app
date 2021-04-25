@extends("user.layout.app")
@section("content")
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h6><strong>Account Detail</strong></h6>

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
                                <p class="text-danger">Please double check the bank details. We won’t be responsible for
                                    any
                                    transfer made to wrong
                                    bank account shared by you.</p>
            </div>
        </div>
    </div>
@endsection
