<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            "cpf" => ["required", "max:11"],
            "name" => ["required", "max:150"],
            "email" => ["required", "email", "max:150"],
            "role" => "required",
            "role" => ['string', 'max:1'],
            "is_admin" => 'integer',
            "buyer" => 'integer',
            "deliver" => 'integer',
            "comissionado" => 'integer',
            "salario" => 'numeric',
            "periodicidade" => ['string', 'max:1'],

        ];

        if($this->method() == 'POST') {
            $rules += [
                "cpf" => ["unique:users,cpf"],
                "email" => ["unique:users,email"]
            ];
        }

        return $rules;
    }
}
