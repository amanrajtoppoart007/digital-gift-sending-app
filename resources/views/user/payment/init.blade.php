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
                   <th>Paying to </th>
                   <td>{{}}</td>
               </tr>
              </tbody>
          </table>
       </div>
   </div>
 </div>
@endsection

