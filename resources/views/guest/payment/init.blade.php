@extends("user.layout.app")
@section('content')
 <div class="container">
   <div class="card">
       <div class="card-header bg-info">
           <h6 class="font-weight-bold text-white">Payment Detail</h6>
       </div>
       <div class="card-body">
          <table class="table">
              <tbody>
              <tr>
                        <th>Amount</th>
                        <td>
                            <input type="text" name="amount" id="amount" class="form-control" value="" required>
                        </td>
                        <th></th>
                        <td></td>
                    </tr>
               <tr>
                   <th>Paying to </th>
                   <td>{{$template->user->name}}</td>
                   <th>Address </th>
                   <td>{{str_replace(',,',',',$template->user->address.','.$template->user->city.','.$template->user->state->name??null)}}</td>
               </tr>
                @if($template->payment_type==='with_sender_detail')
                    <tr>
                        <th>Name</th>
                        <td>
<input type="text" name="name" id="name" class="form-control" value="" placeholder="Enter your name" required>
                        </td>
                        <th>Email</th>
                        <td>
                            <input type="email" name="email" id="email" class="form-control" value="" placeholder="Enter your email" required>
                        </td>
                    </tr>
                     <tr>
                        <th>Mobile No</th>
                        <td>
                            <input type="text" name="mobile_no" id="mobile_no" class="form-control" value="" placeholder="Enter your mobile number"  required>
                        </td>
                        <th>Address</th>
                        <td>
                            <textarea name="address" id="address" class="form-control" placeholder="Enter your address"  required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>State</th>
                        <td>
                            <select class="form-control" name="state" id="state">
                                <option value="" disabled selected>Select State</option>
                                            @foreach($states as $state)
                                                <option value="{{$state->id}}">{{$state->name}}</option>
                                            @endforeach
                            </select>
                        </td>
                        <th>City</th>
                        <td>
                               <input type="text" name="city" id="city" class="form-control" value="" placeholder="Enter your city"  required>
                        </td>
                    </tr>
                    <tr>
                        <th>Pincode</th>
                        <td>
                            <input type="text" name="pin_code" id="pin_code" class="form-control" value="" placeholder="Enter your pincode"  required>
                        </td>
                        <th></th>
                        <td></td>
                    </tr>
                @endif

              </tbody>
          </table>
           <button type="submit" class="btn btn-success">Pay Now</button>
       </div>
   </div>
 </div>
@endsection

