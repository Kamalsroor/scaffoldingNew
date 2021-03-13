<button class="btn btn-outline-info btn-sm ml-2"
        data-form="import-form"
        data-toggle="modal"
        data-target="#import-model">
    <i class="fas fa fa-fw fa-file-import"></i>
    @lang('excel.actions.import')
</button>

<!-- Modal -->
<div class="modal fade" id="import-model" tabindex="-1" role="dialog"
     aria-labelledby="selected-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selected-modal-title">
                    @lang('excel.dialogs.import.title')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-danger">


                @lang('excel.dialogs.import.info', ['type' => $resource ?? ''])



                <x-export-excel-example
                model="{{ $model ?? '' }}"
                export="{{ \App\Exports\Export::class }}"
                resource="{{ $exportResource ?? '' }}"
                fileName="{{ $resource ?? '' }}"
                ></x-export-excel-example>

                @include('dashboard.errors')
                <form action="{{ route('dashboard.excel.import') }}"
                      id="import-form"
                      enctype = "multipart/form-data"
                      method="post">
                    @csrf
                    {{-- accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"  --}}
                    <div class="form-group">
                        <label for="file">@lang('excel.attributes.file')</label>
                        <input name="file" type="file" id="file" class="form-control" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" >
                        <small class="form-text text-muted"></small>
                    </div>
                    <input type="hidden" name="model" value="{{ $model ?? '' }}">
                    <input type="hidden" name="import" value="{{ $import ?? '' }}">
                    <input type="hidden" name="resource" value="{{ $resource ?? '' }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    @lang('excel.dialogs.import.cancel')
                </button>
                <button type="submit" class="btn btn-danger btn-sm" form="import-form">
                    @lang('excel.dialogs.import.confirm')
                </button>
            </div>
        </div>
    </div>
</div>
