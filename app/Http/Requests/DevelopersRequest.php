<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DevelopersRequest extends BaseFormRequest
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
            'hobby' => 'required|string|max:150',
            'birthDate' => 'required|date_format:Y-m-d'
        ];

    }

    public function messages()
    {

        return [
            'name.required' => 'O nome é obrigatório.',
            'sex.required' => 'O sexo é obrigatório',
            'age.required' => 'A idade é obrigatória.',
            'hobby.required' => 'O HOBBY é obrigatório.',
            'hobby.max' => 'O HOBBY precisa ter no máximo 150 caracters.',
            'birthDate.required' => 'Data de nascimento é obrigatória',
            'birthDate.date_format' => 'A data de nascimento está em formato incorreto'
        ];

    }

    public function response(array $errors)
    {
        return response()->json($errors, 422);
    }
}
