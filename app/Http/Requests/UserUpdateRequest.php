<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            "email" => "sometimes|email",
            "password" => "sometimes",
            "phone" => "sometimes",
            "location_id" => "sometimes",
            "project_id" => "sometimes"
        ];
    }
}
