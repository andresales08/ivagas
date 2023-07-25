<?php

namespace App\Http\Requests\Companies;

use Illuminate\Foundation\Http\FormRequest;

class EditCompaniesRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'cnpj' => 'required|integer|unique:companies',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser uma string.',
            'name.max' => 'O campo nome deve ter no máximo :max caracteres.',
            'cnpj.required' => 'O campo CNPJ é obrigatório.',
            'cnpj.integer' => 'O campo CNPJ deve ser um número inteiro.',
            'cnpj.unique' => 'Este CNPJ já está em uso por outra empresa.',
            // Outras mensagens personalizadas podem ser adicionadas aqui
        ];
    }
}
