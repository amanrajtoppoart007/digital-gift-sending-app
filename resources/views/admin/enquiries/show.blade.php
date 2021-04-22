@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Enquiry Detail
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.enquiries.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                            {!! $enquiry->first_name.'&nbsp;'.$enquiry->last_name !!}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Email
                        </th>
                        <td>
                            {{$enquiry->email}}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Category
                        </th>
                        <td>
                            {{$enquiry->category}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Subject
                        </th>
                        <td>
                            {{$enquiry->subject}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Message
                        </th>
                        <td>
                            {{$enquiry->description}}
                        </td>
                    </tr>


                    </tbody>
                </table>

                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.enquiries.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
