<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ApiRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new BadRequestHttpException(response()->json([
            'errors' => $validator->getMessageBag(),
        ]));
    }
}
