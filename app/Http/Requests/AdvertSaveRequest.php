<?php

namespace sempredanegocio\Http\Requests;

use sempredanegocio\Http\Requests\Request;

class AdvertSaveRequest extends Request
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
            'tipo_anuncio' => 'required',
            'numero_quarto' => 'numeric',
            'numero_garagem' => 'numeric',
            'numero_suite' => 'numeric',
            'anuncio_titulo' => 'required|min:6|max:252',
            'anuncio_descricao' => 'required|min:10',
            'nome-usuario' => 'required',
            'telefone-usuario' => 'required',

        ];

        $nbr = count($this->input('anuncio_images')) - 1;
        foreach(range(0, $nbr) as $index) {
            $rules['anuncio_images.' . $index] = 'image|mimes:jpeg,jpg,bmp,png,gif|max:100000';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'tipo_anuncio.required'         => 'Seleciona o campo Alugo ou Vendo',
            'numero_quarto.numeric'         => 'O campo números de quartos tem que ser números',
            'numero_garagem.numeric'        => 'O campo números de garagem tem que ser números',
            'numero_suite.numeric'          => 'O campo número de banheiros tem que ser números',
            'anuncio_images.required'       => "Não houve upload de imagem",
            'anuncio_images.max'            => "Imagem tem que ter no máximo 3 mb de tamanho",
            'anuncio_images.mimes'          => "Isso não é um formato de imagem."

        ];
    }
}
