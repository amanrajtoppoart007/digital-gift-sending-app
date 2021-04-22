@if(!empty($template))
<div class="card">
    <div class="card-header">
        <h6>Template</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userOrders">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Payment Url
                        </th>
                        <th>
                            Banner Image
                        </th>
                        <th>
                            Banner Title
                        </th>
                        <th>
                            Payment Type
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>

                        <tr data-entry-id="{{ $template->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $template->username ?? '' }}
                            </td>
                            <td>
                                {{ $template->banner_image->url ?? '' }}
                            </td>
                            <td>
                                {{ $template->banner_title ?? '' }}
                            </td>
                            <td>
                                {{ $template->payment_type ?? '' }}
                            </td>
                            <td>
                                    <a class="btn btn-xs btn-primary" href="{{route('admin.template.show',$template->username)}}">
                                        {{ trans('global.view') }}
                                    </a>

                                    <a class="btn btn-xs btn-info" href="{{route('admin.template.edit',$template->id)}}">
                                        {{ trans('global.edit') }}
                                    </a>

                                    <form action="{{route('admin.template.delete',$template->id)}}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>

                            </td>

                        </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
@else
<div class="card-header">
        <div class="row">
            <div class="col">
                <h6>Template</h6>
            </div>
            <div class="col">
                <a class="btn btn-success" href="{{route('admin.template.create',$user->id)}}">Add Template</a>
            </div>
        </div>
    </div>
@endif
