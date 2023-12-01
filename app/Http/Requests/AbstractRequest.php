<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class AbstractRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        if (request()->header('accept') === 'application/json') {
            throw new HttpResponseException(response()->json([
                'errors' => $validator->getMessageBag(),
            ], 422));
        }

        parent::failedValidation($validator);
    }
}
