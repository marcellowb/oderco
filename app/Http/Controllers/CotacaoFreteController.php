<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculoImpostoRequest;
use App\Http\Requests\CotacaoRequest;
use App\Models\CotacaoFrete;
use Illuminate\Http\JsonResponse;

class CotacaoFreteController extends Controller
{

    const LIMITE_COTACOES = 3;

    private $listaCotacoes = [];

    public function index(): JsonResponse
    {
        return response()->json(CotacaoFrete::with([
            'transportadora'
        ])->get(), 200);
    }

    public function store(CotacaoRequest $request) : JsonResponse
    {
        $data = $request->all();

        CotacaoFrete::create($data);

        return response()->json(["Sucesso"], 200);
    }

    public function calculoImposto(CalculoImpostoRequest $request) : JsonResponse
    {
        $data = $request->all();

        $this->calculaCotacoes($data['uf'], $data['valor_pedido']);

        $this->ordenaMelhoresCotacoes();

        $this->selecionaLimiteCotacoes($data);

        return response()->json($this->listaCotacoes, 200);

    }

    private function calculaCotacoes($uf, $valorPedido)
    {
        $cotacaoFrete = CotacaoFrete::with([
            'transportadora'
        ])->where('uf', $uf)->get();

        $listaCotacoes = [];
        foreach ($cotacaoFrete as $item) {

            $valorCotacao = (($valorPedido / 100) * $item->percentual_cotacao);
            $valorCotacao += $item->valor_extra;

            $cotacao = [
                "uf" => $item->uf,
                "valor_pedido" => $valorPedido,
                "transportadora_id" => $item->transportadora_id,
                "transportadora_nome" => $item->transportadora->nome,
                "valor_cotacao" => round($valorCotacao,2),
            ];

            $listaCotacoes[] = $cotacao;
        }

        $this->listaCotacoes = $listaCotacoes;
    }

    private function ordenaMelhoresCotacoes()
    {
        usort($this->listaCotacoes, function($a,$b){
            return ($a["valor_cotacao"] <= $b["valor_cotacao"]) ? -1 : 1;
        });
    }

    private function selecionaLimiteCotacoes()
    {
        $this->listaCotacoes = array_slice($this->listaCotacoes, 0, self::LIMITE_COTACOES);
    }

}
