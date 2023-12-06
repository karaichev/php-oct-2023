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
            'status' => ['required', new Enum(BookStatus::class)],
            'images.*' => ['image'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => __('validation.attributes.book.title'),
            'page_number' => __('validation.attributes.book.page_number'),
        ];
    }

    public function data(): CreateBookData
    {
        return CreateBookData::from(
            $this->validated()
        );
    }
}
