<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CotacaoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'transportadora_id'      => 'required|exists:transportadora,id|unique:cotacao_frete,transportadora_id,null,id,uf,'.$this->uf,
            'uf'                     => 'required|string|min:2|max:2',
            'percentual_cotacao'     => 'required|numeric|min:0|not_in:0|max:100',
            'valor_extra'            => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'transportadora_id.required'      => "O campo Transportadora é obrigatório",
            'transportadora_id.exists'        => "A Transportadora não foi encontrada ",
            'transportadora_id.unique'        => "Já existe uma transportadora vinculada a esta UF",
            'uf.required'                     => "O campo UF é obrigatório",
            'percentual_cotacao.required'     => "O campo Percentual Cotação é obrigatório",
            'percentual_cotacao.not_in'       => "O campo Percentual Cotação precisa ser maior que zero",
            'percentual_cotacao.max'          => "O campo Percentual Cotação precisa ser menor que :max",
            'valor_extra.required'            => "O campo Valor Extra é obrigatório",
            'valor_extra.numeric'             => "O campo Valor Extra precisa ser numérico",
        ];
    }

}
