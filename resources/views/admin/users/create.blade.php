@extends('layouts.admin')
@section('content')

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            $.ajaxSetup({headers:{'X-CSRF-TOKEN': '{{ csrf_token() }}' }});

           $("#state_id").on("change",function(){

               $("#district_id").empty();
                $.ajax({
            url: "{{route('ajax.district.list')}}",
            type: 'POST',
            data: {'state_id': $(this).val() },
            dataType: 'json',
            success: function (res)
            {
                if (res.response === "success")
                {
                    let option = $($.parseHTML(`<option value="">Select District</option>`));
                    $("#district_id").append(option);
                    $.each(res.data, function (key, item)
                    {
                        let $option = $($.parseHTML(`<option value="${item.id}">${item.name}</option>`));
                        $("#district_id").append($option);
                    });
                }


            },
            error: function (jqXHR, textStatus, errorThrown) {
               console.log(textStatus);
            }
        });
           });

            $("#district_id").on("change",function(){

               $("#block_id").empty();
                $.ajax({
            url: "{{route('ajax.block.list')}}",
            type: 'POST',
            data: {'district_id': $(this).val() },
            dataType: 'json',
            success: function (res)
            {
                if (res.response === "success")
                {
                    let option = $($.parseHTML(`<option value="">Select Block</option>`));
                    $("#block_id").append(option);
                    $.each(res.data, function (key, item)
                    {
                        let $option = $($.parseHTML(`<option value="${item.id}">${item.name}</option>`));
                        $("#block_id").append($option);
                    });
                }


            },
            error: function (jqXHR, textStatus, errorThrown) {
               console.log(textStatus);
            }
        });
           });
        });
    </script>
@endsection

