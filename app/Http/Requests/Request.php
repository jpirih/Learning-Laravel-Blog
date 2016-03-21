<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

abstract class Request extends FormRequest
{
    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }

    public function messages()
    {
        return [
            'title.required' => 'Vnos naslova je obvezen.',
            'content.required' => 'Vnos vsebine objave je obvezen.',
            'name.required' => 'Vnos zadeve je obvezen.',
            'body.required' => 'Prosim vnesi vsebino komentarja.',
            'category_name.required' => 'Vnos imena kategorije je obvezen.'
        ];
    }
}
