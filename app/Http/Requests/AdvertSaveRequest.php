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
            'estado' => 'required',
            'cidade' => 'required',
            'bairro' => 'required',
            'rua' => 'required',
            'numero' => 'numeric',
            'numero_quarto' => 'required',
            'numero_garagem' => 'required',
            'numero_suite' => 'required',
            'area_construida' => 'required',
            'valor_condominio' => 'required',
            'valor_iptu' => 'required',
            'anuncio_titulo' => 'required|min:6|max:200',
            'anuncio_descricao' => 'required|min:10',
            'preco' => 'required',
            'nome-usuario' => 'required',
            'telefone-usuario' => 'required',

        ];

        $nbr = count($this->input('anuncio_images')) - 1;
        foreach(range(0, $nbr) as $index) {
            $rules['anuncio_images.' . $index] = 'image|mimes:jpeg,jpg,bmp,png,gif|max:3000';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'tipo_anuncio.required'      => 'Seleciona o campo Alugo ou Vendo',
            'estado.required'            => 'O campo estado não pode ser vazio',
            'cidade.required'            => 'O campo cidade não pode ser vazio',
            'bairro.required'            => 'O campo bairro não pode ser vazio',
            'rua.required'               => 'O campo rua não pode ser vazio',
            'numero.numeric' => 'O campo rua tem que ser números',
            'numero_quarto.required' => 'O campo números de quartos não pode ser vazio',
            'numero_garagem.required' => 'O campo números de garagem não pode ser vazio',
            'numero_suite.required' => 'O campo número de banheiros não pode ser vazio',
            'area_construida.required' => 'O campo área construída não pode ser vazio',
            'valor_condominio.required' => 'O campo condomínio não pode ser vazio',
            'valor_iptu.required' => 'O campo iptu não pode ser vazio',
            'anuncio_images.required' => "Não houve upload de imagem",
            'anuncio_images.max' => "Imagem tem que ter no máximo 3 mb de tamanho",
            'anuncio_images.mimes' => "Isso não é um formato de imagem."

        ];
    }
}
