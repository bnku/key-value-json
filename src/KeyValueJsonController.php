<?php

namespace KeyValueJson;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class KeyValueJsonController extends VoyagerBaseController
{
    function encodeJSON(Request $request){
        $new_parameters = array();
        foreach ($request->{$request->keyvaluejson} as $key => $value) {
            if($request->{$request->keyvaluejson}[$key]['key']){
                $new_parameters[] = $request->{$request->keyvaluejson}[$key];
            }
        }
        return json_encode($new_parameters);        
    }
        
    public function update(Request $request, $id)
    {   
        if(isset($request->keyvaluejson)){
            $request->merge(
                ["$request->keyvaluejson" => $this->encodeJSON($request)]
            );   
        }
        VoyagerBaseController::update($request, $id);
        return redirect($request->path());

    }

    public function store(Request $request)
    {   
        if(isset($request->keyvaluejson)){
            $request->merge(
                ["$request->keyvaluejson" => $this->encodeJSON($request)]
            );   
        }
        VoyagerBaseController::store($request);
        return redirect($request->path());

    }
}
