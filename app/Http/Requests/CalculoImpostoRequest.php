<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculoImpostoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'uf'                  => 'required|string|min:2|max:2|exists:cotacao_frete,uf',
            'valor_pedido'        => 'required|numeric|min:0|not_in:0',
        ];
    }

    public function messages()
    {
        return [
            'uf.required'              => "O campo UF é obrigatório",
            'uf.exists'                => "Cotação não cadastrada o UF",
            'valor_pedido.not_in'      => "O campo Valor do Pedido precisa ser maior que zero",
            'valor_pedido.min'         => "O campo Valor do Pedido precisa ser menor que :max",
            'valor_pedido.required'    => "O campo Valor do Pedido é obrigatório",
            'valor_pedido.numeric'     => "O campo Valor do Pedido precisa ser numérico",
        ];
    }
}
