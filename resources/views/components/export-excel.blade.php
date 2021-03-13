<a href="{{ route('dashboard.excel.export' , ['export' => $export , 'model' => $model   , 'resource' => $resource , 'file_name' => $fileName]) }}" class="btn btn-outline-info btn-sm ml-2 export-btn" id="export-btn">
    <i class="fas fa fa-fw fa-download"></i>
    @lang('excel.actions.export')
</a>




