<?php

namespace App\Http\Requests\api\v1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class CommentsUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

        public function failedValidation(Validator $validator)
    {
    throw new HttpResponseException(response()->json($validator->errors(), 
    422));
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "mensaje" => "min:3",
            "autor" => "min:2",
            "fechapublicacion" => "min:2",
            "n_id" => "exists:users,id"
        ];
    }
}
