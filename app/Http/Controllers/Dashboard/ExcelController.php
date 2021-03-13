<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Excel\ImportRequest;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Jobs\SaveExcelImportingJob;
use Illuminate\Support\Arr;

class ExcelController extends Controller
{
    /**
     * import the given items of the given model type.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function import(ImportRequest $request)
    {


        try {
            if (class_exists($modelClass = $request->input('model'))) {
                if (class_exists($importClass = $request->input('import'))) {


                    $array = (new $importClass)->toArray( request()->file('file'));
                    $request->request->add(['data' => $array[0]]); //add request
                    $validator = Validator::make($request->all(), (new $importClass)->rules());

                    // Check validation failure
                    if ($validator->fails()) {
                        flash(trans('excel.messages.import_failed', [
                            'type' => $request->input('resource'),
                        ]))->error();

                        return redirect()->back();
                    }

                    // Check validation success
                    if ($validator->passes()) {
                        if (count($request->data) > 50) {
                            $datas = array_chunk($request->data , 10);
                            foreach ($datas as $key => $data) {
                                dispatch(new SaveExcelImportingJob($data ,$modelClass ));
                            }
                        }else{
                            foreach ($request->data as $key => $value) {
                                $modelClass::create(Arr::except($value , ['created_at' , 'id' , 'created_at_formatted' , 'avatar']));
                            }
                        }




                    }
                }
            }
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            flash(trans('excel.messages.import_failed', [
                'type' => $request->input('resource'),
            ]))->error();
            return redirect()->back();
        }

        flash(trans('excel.messages.imported', [
            'type' => $request->input('resource'),
        ]));

        return back();
    }

    /**
     * export the given items of the given model type.
     *
     * @param \Illuminate\Http\Request $request
     * @return file
     */
    public function export(Request $request)
    {

        if (class_exists($modelClass = $request->input('model'))) {

            if ($request->example_excel) {
                $models = $modelClass::factory(2)->make();
            }else{
                $models = $modelClass::filter()->get();
            }
            $Resource =  $this->getResource($models , $resourceClass = $request->input('resource'));

            if (class_exists($exportClass = $request->input('export'))) {
                return Excel::download(new $exportClass($Resource),($request->example_excel ? 'example-' : "") .  $request->file_name.'-'.date('d-m-Y-h-i').'.xlsx');
            }
        }

        return back();
    }

     /**
     * get Resource Data By data Given .
     *
     * @param \Illuminate\Http\Request $request
     * @return data Collection
     */
    public function getResource($models , $resourceClass)
    {
        if (count($models) && class_exists($resourceClass) ) {
            return $resourceClass::collection($models);
        }
        return null;
    }




}
