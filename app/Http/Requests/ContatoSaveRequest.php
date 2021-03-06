<?php

namespace sempredanegocio\Http\Requests;

use sempredanegocio\Http\Requests\Request;

class ContatoSaveRequest extends Request
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
        return [
            'name' =>'required',
            'email' => 'required',
            'estado' => 'required',
            'cidade' => 'required',
            'assunto' => 'required|min:5'
        ];
    }
}
