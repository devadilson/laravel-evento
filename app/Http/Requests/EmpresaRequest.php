<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'name' => 'required|unique:empresas,name,'.$this->id,'id',
           'slug_name' => 'required|unique:empresas,slug_name,'.$this->id,'id',
           'slug' => 'required|unique:empresas,slug,'.$this->id,'id',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Nome da Empresa é obrigatório.',
            'name.unique' => 'Nome da Empresa deve ser única, já existe uma Empresa com esse nome.',
            'slug_name.required' => 'A URL da Empresa é obrigatório.',
            'slug_name.unique' => 'A URL da Empresa deve ser única, já existe uma URL com esse nome.',
            'slug.required' => 'Abreviação da Empresa é obrigatório.',
            'slug.unique' => 'Abreviação da Empresa deve ser única, já existe uma abreviação com esse nome.',
        ];
    }
}
