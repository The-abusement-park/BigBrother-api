<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "sometimes",
            "serialcode" => "sometimes",
            "note" => "sometimes",
            "user_id" => "sometimes",
        ];
    }
}
