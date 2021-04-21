@if(!empty($template))
<div class="card">
    <div class="card-header">
        Template
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
                                    <a class="btn btn-xs btn-primary" href="">
                                        {{ trans('global.view') }}
                                    </a>

                                    <a class="btn btn-xs btn-info" href="">
                                        {{ trans('global.edit') }}
                                    </a>

                                    <form action="" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@endif
