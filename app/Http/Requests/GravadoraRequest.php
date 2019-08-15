<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GravadoraRequest extends FormRequest
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

        //dd($this->route('gravadora'));

        return [
            'nome' => ['required', 'min:3', 'max:50'],
            'cnpj' => ['required', 'min:14', 'max:14', 'unique:gravadora,cnpj,'.$this->route('gravadora')]
            // 'email' => ['required', 'email', 'unique:usuario,email,'.$this->route('id')],
            // 'data_nascimento' => ['required'],
            // 'nivel_id' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório!',
            'unique'   => 'O :attribute digitado já está em uso!',
            'min'      => 'O campo :attribute deve conter no mínimo :min caracteres!',
            'max'      => 'O campo :attribute deve conter no máximo :max caracteres!',
        ];
    }
}
