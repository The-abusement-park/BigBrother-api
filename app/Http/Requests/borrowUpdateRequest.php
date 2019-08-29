<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class borrowUpdateRequest extends FormRequest
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
            "description" => "sometimes",
            "quantity" => "sometimes",
            "borrowedFrom" => "sometimes"
        ];
    }
}
