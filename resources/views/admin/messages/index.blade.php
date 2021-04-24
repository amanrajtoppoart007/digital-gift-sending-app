@extends('layouts.admin')
@section('content')
    @can('user_alert_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <button class="btn btn-success" id="addButton">
                    {{ trans('global.add') }} Message
                </button>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            Message {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-UserAlert">
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.userAlert.fields.id') }}
                    </th>
                    <th>
                        Type
                    </th>
                    <th>
                        Message
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="modal fade" id="addModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add/Edit Message</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form id="userAlertForm">
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="required"
                                   for="type">type</label>
                            <input class="form-control" type="text"
                                   name="type" id="type" required>
                        </div>
                        <div class="form-group">
                            <label class="required"
                                   for="message">Message</label>
                            <input class="form-control" type="text"
                                   name="message" id="message" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-danger" type="submit">{{ trans('global.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.messages.index') }}",
                columns: [
                    {data: 'placeholder', name: 'placeholder'},
                    {data: 'id', name: 'id'},
                    {data: 'type', name: 'type'},
                    {data: 'message', name: 'message'},
                    {data: 'actions', name: '{{ trans('global.actions') }}'},
                ],
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 100,
            };
            let table = $('.datatable-UserAlert').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

            jQuery.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let isUpdate = false;
            $('#addButton').click(() => {
                isUpdate == false;
                $('#addModal').modal('show');
            });
            $('#userAlertForm').submit(function (event) {
                event.preventDefault();
                let url = isUpdate ? "{{ route('admin.messages.update') }}" : "{{ route("admin.messages.store") }}";
                $.post(url, $(this).serialize(), result => {
                    alert(result.msg)
                    if (result.status) {
                        location.reload()
                    }
                }, 'json');
            });

            $(document).on('click','.editButton', function (){
                let id = $(this).data('id');
                isUpdate = true;
                $.get("{{ route('admin.messages.edit') }}", {id}, result => {
                    if (result.status) {
                        $('#type').val(result.data.type);
                        $('#message').val(result.data.message);
                        $('#id').val(result.data.id);
                        $('#addModal').modal('show');
                    }
                }, 'json');
            });

            $('.editButton').click(function () {

            });

        });

    </script>
@endsection
