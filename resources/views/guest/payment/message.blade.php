@extends("guest.layout.app")
@section("head")
    <script type='text/javascript'
            src='https://platform-api.sharethis.com/js/sharethis.js#property=6081b96b1c703400184e0d6d&product=sop'
            async='async'></script>
@endsection
@section("content")
    <main id="main">
        <section id="second-section" class="py-2">
            <div class="container">
        <div class="card my-5">
            <div class="card-header bg-success">
                <h6 class="font-weight-bold text-white">Payment Response</h6>
            </div>
            <div class="card-body">
                <div class="alert alert-success" role="alert">
                    <table class="table">
                        <tbody>
                        <tr>
                              <th>Transaction Number</th>
                              <td>{{$payment->txn_number}}</td>
                              <th>Payment Status</th>
                              <td>{{$payment->payment_status}}</td>
                          </tr>
                        <tr>
                              <th>Paid To</th>
                              <td>{{$payment->user->name}}</td>
                              <th>User Email</th>
                              <td>{{$payment->user->email}}</td>
                          </tr>
                          <tr>
                              <th>Payee Name</th>
                              <td>{{$payment->name}}</td>
                              <th>Payee Email</th>
                              <td>{{$payment->email}}</td>
                          </tr>
                           <tr>
                               <th>Message</th>
                               <td colspan="3">
                                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                       Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                       when an unknown printer
                                       took a galley of type and scrambled it to make a type specimen book
                                   </p>
                               </td>
                           </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="card-footer">
              <div class="sharethis-inline-share-buttons"></div>
            </div>
        </div>
    </div>
        </section>
    </main>
@endsection
