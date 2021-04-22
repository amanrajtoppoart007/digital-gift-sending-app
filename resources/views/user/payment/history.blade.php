@extends('user.layout.app')
@section('content')
    <div class="content" style="background-color: green">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Payment list
                    </div>

                    <div class="card-body" style="min-height:450px">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Pincode</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                            <tr>
                                <td>{{ $payment->name }}</td>
                                <td>{{ $payment->mobile }}</td>
                                <td>{{ $payment->email }}</td>
                                <td>{{ $payment->address }}</td>
                                <td>{{ $payment->city }}</td>
                                <td>{{ $payment->pin_code }}</td>
                                <td>{{ $payment->created_at }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->payment_status }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    @if ($payments->lastPage() > 1)
                        <div class="text-center">
                            <ul class="pagination text-center">

                                <li class="nav-item {{ ($payments->currentPage() == 1) ? ' disabled' : '' }}">
                                    <a class="nav-link" href="{{ $payments->url($payments->currentPage()-1) }}">Previous</a>
                                </li>
                                @for ($i = 2; $i <= $payments->lastPage(); $i++)
                                    <li class="nav-link {{ ($payments->currentPage() == $i) ? ' active' : '' }}">
                                        <a href="{{ $payments->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="nav-link {{ ($payments->currentPage() == $payments->lastPage()) ? ' disabled' : '' }}">
                                    <a href="{{ $payments->url($payments->currentPage()+1) }}" >Next</a>
                                </li>
                            </ul>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

