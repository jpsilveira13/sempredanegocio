<?php

namespace sempredanegocio\Http\Requests;

use sempredanegocio\Http\Requests\Request;

class LeadsSaveRequest extends Request
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
            'nome' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'celular' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'sexo' => 'required',
            'mensagem' => 'required',
            'data_retorno' => 'required',

        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'nome.required'         => 'Complete o nome',
            'email.required'         => 'Complete o email',
            'telefone.required'         => 'Complete o telefone',
            'celular.required'         => 'Complete o celular',
            'cidade.required'         => 'Complete a cidade',
            'estado.required'         => 'Complete o estado',
            'sexo.required'         => 'Complete o sexo',
            'mensagem.required'         => 'Complete a mensagem',
            'data_retorno.required'         => 'Complete a data de retorno',

        ];
    }
}
