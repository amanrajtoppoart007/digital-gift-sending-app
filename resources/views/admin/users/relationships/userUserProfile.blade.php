@if(!empty($userProfile))
<div class="card">
    <div class="card-header">
        {{ trans('cruds.userProfile.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userUserProfile">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.userProfile.fields.id') }}
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Bank Name
                        </th>
                        <th>
                            Account Number
                        </th>
                        <th>
                            IFSC CODE
                        </th>
                        <th>
                            Created at
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>

                        <tr data-entry-id="{{ $userProfile->id??'' }}">
                            <td>

                            </td>
                            <td>
                                {{ $userProfile->id ?? '' }}
                            </td>
                            <td>
                                {{ $userProfile->name?? '' }}
                            </td>
                            <td>
                                {{ $userProfile->bank_name ?? '' }}
                            </td>
                            <td>
                                {{ $userProfile->account_number ?? '' }}
                            </td>
                            <td>
                                {{ $userProfile->ifsc_code ?? '' }}
                            </td>
                            <td>
                                {{ $userProfile->created_at ?? '' }}
                            </td>

                            <td>
                                @if(!empty($userProfile))
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.userProfile.edit', $userProfile->id??0) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endif
                                @if(!empty($userProfile))
                                    <form action="{{ route('admin.userProfile.destroy', $userProfile->id??0) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endif
                            </td>

                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@else
<div style="margin: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.userProfile.create',$user->id) }}">
                {{ trans('global.add') }} {{ trans('cruds.userProfile.title_singular') }}
            </a>
        </div>
    </div>
@endif

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('user_profile_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-userUserProfile:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
