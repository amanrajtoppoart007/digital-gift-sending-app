@extends("guest.layout.app")
@section("content")
    <!-- ======= Contact Section ======= -->
    <!-- Main (Start) -->
    <main data-aos="fade-in">

        <!-- Section First (Start) -->
        <section class="bg-light" id="contact-section">
            <br>
            <div class="container">


                <!-- Introduction Title (Start) -->
                <div class="text-left page-title">
                    <h1 class="font-weight-bold display-4 text-theme-1 ml-3">Contact us</h1>
                    <p class="description-1 ml-3 text-secondary">Please fill the below form and our representative will contact you, or you may call us or write us a email, we will contact you.
                    </p>
                </div>
                <!-- Introduction Title (End) -->

                <div class="row mt-5">

                    <!-- Left Side (Start) -->
                    <div class="col-lg-7 col-md-12 col-sm-12">

                        <!-- Contact From (Start) -->
                        <div class="card border-0 shadow" id="contact-from-card">
                            <div class="card-body">
                                <form id="enquiry_form" class="form-group" action="{{route('store.guest.enquiry')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                                            <label class="font-weight-bolder" for="first_name">First Name</label>
                                            <label class="text-danger ml-2 font-weight-bolder">*</label>
                                            <input type="text" name="first_name" id="first_name"
                                                   class="input-group-text bg-transparent w-100 text-left" required>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                                            <label class="font-weight-bolder" for="last_name">Last Name</label>
                                            <label class="text-danger ml-2 font-weight-bolder">*</label>
                                            <input type="text" name="last_name" id="last_name"
                                                   class="input-group-text bg-transparent w-100 text-left" required>
                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                                            <label class="font-weight-bolder" for="email">Email Address</label>
                                            <label class="text-danger ml-2 font-weight-bolder">*</label>
                                            <input type="email" name="email" id="email"
                                                   class="input-group-text bg-transparent w-100 text-left" required>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                                            <label class="font-weight-bolder" for="category">Category</label>
                                            <label class="text-danger ml-2 font-weight-bolder">*</label>
                                            <select class="custom-select select2 w-100" name="category" id="category"
                                                    required>
                                                <option value="" disabled selected>Select Category</option>
                                                <option value="user">User (who wants to register or website)</option>
                                                <option value="sender">Sender (who wants to send the gift)</option>
                                                <option value="other">Other</option>

                                            </select>
                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="font-weight-bolder" for="subject">Subject</label>
                                            <label class="text-danger ml-2 font-weight-bolder">*</label>
                                            <input type="text" name="subject" id="subject"
                                                   class="input-group-text w-100 bg-transparent text-left" required>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label class="font-weight-bolder" for="description">Description</label>
                                            <label class="text-danger ml-2 font-weight-bolder">*</label>
                                            <textarea rows="5" name="description" id="description"
                                                      class="input-group-text w-100 bg-transparent text-left" required></textarea>
                                        </div>
                                    </div>
                                    <button class="btn btn-lg btn-theme-1 w-100 rounded mt-3">Send Message<img
                                            src="{{ asset('assets/assets/icons/circle-arrow.svg') }}" class="btn-icon"
                                            alt="arrow-right">
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- Contact From (End) -->

                        <!-- Map (Start) -->
                        <div class="card border-0 shadow mt-3">
                            <div class="card-body">
                                <div class="card">
                                    <iframe class="map-iframe"
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1859.796696388102!2d81.35160357087418!3d21.20830559887367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjHCsDEyJzI5LjkiTiA4McKwMjEnMDguMCJF!5e0!3m2!1sen!2sin!4v1613104881088!5m2!1sen!2sin"
                                            frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <!-- Map (End) -->

                        <br>
                    </div>
                    <!-- Left Side (End) -->


                    <!-- Right Side (Start) -->
                    <div class="col-lg-5 col-md-12 col-sm-12">

                        <!-- Location Card (Start) -->
                        <a target="_blank"
                           href="https://www.google.com/maps?ll=21.208306,81.352222&z=17&t=m&hl=en&gl=IN&mapclient=embed"
                           class="card-link">
                            <div class="card border-0 shadow contact-card" align="center">
                                <div class="card-body">
                                    <div class="contact-img-div">
                                        <img src="{{asset('assets/assets/icons/location.svg')}}" alt="location"
                                             class="img-fluid contact-img">
                                    </div>
                                    <h4 class="font-weight-bolder mt-2 text-theme-1">Location</h4>
                                    <p class="text-secondary">
                                        Company name
                                        Company Address
                                    </p>
                                </div>
                            </div>
                        </a>
                        <!-- Location Card (End) -->

                        <!-- Mail Card (Start) -->
                        <a href="mailto: info@krishakvikas.com" class="card-link">
                            <div class="card border-0 shadow contact-card" align="center">
                                <div class="card-body">
                                    <div class="contact-img-div">
                                        <img src="{{asset('assets/assets/icons/mail.svg')}}" alt="mail"
                                             class="img-fluid contact-img">
                                    </div>
                                    <h4 class="font-weight-bolder mt-2 text-theme-1">E-Mail</h4>
                                    <p class="text-secondary">
                                        demo@exmpale.com
                                    </p>
                                </div>
                            </div>
                        </a>
                        <!-- Mail Card (End) -->

                        <!-- Phone Card (Start) -->
                        <a href="tel: +918815752022" class="card-link">
                            <div class="card border-0 shadow contact-card" align="center">
                                <div class="card-body">
                                    <div class="contact-img-div">
                                        <img src="{{asset('assets/assets/icons/call.svg')}}" alt="call"
                                             class="img-fluid contact-img">
                                    </div>
                                    <h4 class="font-weight-bolder mt-2 text-theme-1">Phone</h4>
                                    <p class="text-secondary">
                                        +1234567890
                                    </p>
                                </div>
                            </div>
                        </a>
                        <!-- Phone Card (End) -->

                    </div>
                    <!-- Right Side (End) -->

                </div>


            </div>
            <br>
        </section>
        <!-- Section First (End) -->

    </main>
    <!-- Main (End) -->
    <!-- End Contact Section -->
@endsection
@section("script")
    <script>
        $(document).ready(function(){
            $("#enquiry_form").on("submit", function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{route('store.guest.enquiry')}}",
                    type: 'POST',
                    data: $('#enquiry_form').serialize(),
                    dataType: 'json',
                    beforeSend: function () {
                        $("#overlay").show();
                    },
                    success: function (res) {
                        if (res.response === "success")
                        {

                            $.notify(res.message,'success','top-right');
                            $("#enquiry_form")[0].reset();
                        } else
                            {

                             $.notify(res.message,'error','top-right');
                        }
                    },
                    error: function (jqXhr) {
                        let data = jqXhr.responseJSON;

                        if (data.errors) {
                            let error = '';
                            $.each(data.errors, function (index, item) {
                                $(`#${index}`).addClass("is-invalid").tooltip({title: item[0]});
                               error += item[0]+"\n";
                            });

                             $.notify(error,'error','top-right');
                        }

                    },

                    complete: function () {
                        $("#overlay").hide();
                    }
                });
            });
        });
    </script>
@endsection
