<?php

namespace KeyValueJson;

use TCG\Voyager\FormFields\AbstractHandler;

class KeyValueJsonFormField extends AbstractHandler
{
    protected $codename = 'Key-Value to JSON';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('keyvaluejson::key_value_json', [
            'row'             => $row,
            'options'         => $options,
            'dataType'        => $dataType,
            'dataTypeContent' => $dataTypeContent,
        ]);
    }

}
