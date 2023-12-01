<?php

namespace App\Http\Requests\Book;

use App\Enums\BookStatus;
use App\Http\Requests\AbstractRequest;
use App\Services\Book\CreateBookData;
use Illuminate\Validation\Rules\Enum;

class StoreBookRequest extends AbstractRequest
{
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

    public function data(): CreateBookData
    {
        return CreateBookData::from(
            $this->validated()
        );
    }
}
