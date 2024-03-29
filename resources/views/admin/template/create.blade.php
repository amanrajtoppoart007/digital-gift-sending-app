@extends("layouts.admin")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Create Page
                </div>
                <div class="card-body" style="min-height:450px">
                    <form  id="create_template_form" method="POST"  action="{{route('admin.template.store')}}"  enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}">

                         <div class="form-group">
                            <label for="username"><strong>Page Url </strong> <span class="text-danger">*</span></label>

                             <div class="input-group">
                                 <div class="input-group-prepend">
                                     <span class="input-group-text">{!! route('template',['username'=>'&nbsp;']) !!}</span>
                                 </div>
                                 <input type="text" class="form-control" id="username" name="username"
                                        aria-describedby="username_help">
                             </div>
                            <small id="username_help" class="form-text text-muted">Create your custom username for viewing your profile.</small>
                        </div>
                        <div class="form-group">
                            <label for="banner_image"> <strong>Banner Image</strong> <span class="text-danger">*</span></label>
                            <div class="needsclick  dropzone {{ $errors->has('banner_image') ? 'is-invalid' : '' }}"
                                 id="banner_image-dropzone">
                            </div>
                            @if($errors->has('banner_image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('banner_image') }}
                                </div>
                            @endif
                            <span class="form-text text-muted">Select image file in jpg or png format. Recommended (970×250)</span>
                        </div>

                        <div class="form-group">
                            <label for="banner_title"><strong>Banner Title </strong> <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="banner_title" name="banner_title"
                                   aria-describedby="banner_title_help">
                            <small id="banner_title_help" class="form-text text-muted">Enter title for the banner.</small>
                        </div>
                        <div class="form-group">
                            <label for="description"><strong>Short note for your page visitors </strong> <span class="text-danger">*</span></label>
                            <textarea  class="form-control" id="description" name="description"
                                       aria-describedby="description_help"></textarea>
                            <small id="description_help" class="form-text text-muted">Enter the detail of the event for you want to collect the blessings.</small>
                        </div>
                        <div class="form-group">
                            <h6> <strong>Receive payment with</strong></h6>
                            <div class="row col-md-6">
                               <div class="col">
                                   <div class="form-check">
                                       <input class="form-check-input" type="radio" name="payment_type"
                                              id="payment_type_sender_detail"
                                              value="with_sender_detail" checked>
                                       <label class="form-check-label" for="payment_type_sender_detail">
                                           Sender detail required
                                       </label>
                                   </div>
                               </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_type"
                                               id="payment_type_anonymous"
                                               value="without_sender_detail">
                                        <label class="form-check-label" for="payment_type_anonymous">
                                            Anonymous sender detail not required
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="form-group m-3" id="checkbox-group-container">
                            @foreach($inputs as $input)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input c-input-group-checkbox" type="checkbox" name="inputs[]" id="checkbox-input-{{$input['id']}}" value="{{$input['value']}}">
                                    <label class="form-check-label" for="checkbox-input-{{$input['id']}}">{{$input['title']}}</label>
                                </div>
                            @endforeach
                        </div>

                         <button type="submit" class="btn btn-primary">Create Page</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
            });
    </script>
        <script>
        $(document).ready(function(){
            $("input[name='payment_type']").on("change",function(){
                if($(this).val()==='without_sender_detail')
                {
                    $(".c-input-group-checkbox").each(function(){
                        $(this).prop({'checked':false});
                    });

                    $("#checkbox-group-container").hide();

                }
                else
                {
                    $("#checkbox-group-container").show();
                }
            });
        });
    </script>
    <script>
    Dropzone.options.bannerImageDropzone = {
    url: '{{ route('upload.media') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="banner_image"]').remove()
      $('form').append('<input type="hidden" name="banner_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="banner_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($template) && $template->banner_image)
      let file = {!! json_encode($template->banner_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="banner_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            let message = response //dropzone sends it's own error messages in string
        } else {
            let message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
    <script>
        $(document).ready(function(){
            $("#create_template_form").on('submit',function(e){
                e.preventDefault();
                 $.ajax({
                    url: "{{route('admin.template.store')}}",
                    type: 'POST',
                    data: $('#create_template_form').serialize(),
                    dataType: 'json',
                    beforeSend: function () {
                        $("#overlay").show();
                    },
                    success: function (res) {
                        if (res.response === "success")
                        {

                            $.notify(res.message,'success','top-right');
                            window.open(res.url, '_self');
                        } else
                            {

                             $.notify(res.message,'error','top-right');
                        }
                    },
                    error: function (jqXhr) {

                        let data = jqXhr.responseJSON;
                        if (data.errors)
                        {
                            let error = '';
                            $.each(data.errors, function (index, item) {
                               error += item[0]+"\n";
                            });

                             $.notify(error,'error','top-right');
                        }

                    },

                    complete: function () {
                        $("#overlay").hide();
                    }
                });
            })
        });
    </script>
    @endsection
