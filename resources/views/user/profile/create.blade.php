@extends("user.layout.app")
@section("content")
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h6 class="font-weight-bold text-white">Bank Account Detail</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('profile.store')}}">
                    <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="name"><strong>Name </strong> <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="bank_name"><strong>Name Of Bank </strong> <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="bank_name" name="bank_name" required>
                        </div>
                        </div>

                </div>
                     <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="account_number"><strong>A/C -No. </strong> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="account_number" name="account_number" required>
                                </div>
                            </div>
                          <div class="col-md-8">
                                <div class="form-group">
                                    <label for="ifsc_code"><strong>IFSC Code </strong> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="ifsc_code" name="ifsc_code" required>
                                </div>
                            </div>

                        </div>
                </form>

            </div>
        </div>
    </div>
@endsection
