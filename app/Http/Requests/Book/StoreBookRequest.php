<?php

namespace App\Http\Requests\Book;

use App\Enums\BookStatus;
use App\Http\Requests\ApiRequest;
use Illuminate\Validation\Rules\Enum;

class StoreBookRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'page_number' => 'integer',
            'annotation' => ['string'],
            'author_id' => ['required'],
            'status' => new Enum(BookStatus::class),
            'images.*' => ['image'],
        ];
    }
}
