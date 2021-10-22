<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDevelopersRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'sex' => 'required|string',
            'age' => 'required|integer',
            'birthDate' => 'required|date_format:Y-m-d'
        ];

    }

    public function messages()
    {

        return [
            'name.required' => 'O nome é obrigatório.',
            'sex.required' => 'O campo sexo é obrigatório',
            'age.required' => 'A idade é obrigatória.',
            'birthDate.required' => 'Data de nascimento é obrigatória',
            'birthDate.date_format' => 'A data de nascimento está em formato incorreto'
        ];

    }

    public function response(array $errors)
    {
        // return response($errors);
        return response()->json($errors, 422);
    }
}
