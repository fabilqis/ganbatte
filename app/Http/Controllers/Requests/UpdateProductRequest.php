<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{

    public function authorize():bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|string|max:50|unique:books,id',
            'book_title' => 'required|string',
            'detail' => 'required|string',
        ];
    }
}