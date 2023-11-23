<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConsultCpfController extends Controller
{
    private $urlCredito = "https://dev.gosat.org/api/v1/simulacao/credito";
    private $urlOferta = "https://dev.gosat.org/api/v1/simulacao/oferta";
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $allInstituicoes = $this->getDataByCpf($request->cpf);
        $data['instituicoes'] = $allInstituicoes['instituicoes'];
        $data['cpf'] = $request->cpf;
        return view('cpf-consult', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $info = $this->getDataByCpf($request->cpf);
        $modalidades = $this->getAllModalityCodes($info, $request->id_instituicao);
        $offers = [];
        foreach ($modalidades as $key=>$modalidade) {
            $response = $this->getOffers($request->cpf, $request->id_instituicao, $modalidade['id']);
            array_push($offers, [
                "position" =>$key,
                "QntParcelaMin" => $response['QntParcelaMin'],
                "QntParcelaMax" => $response['QntParcelaMax'],
                "valorMin" => $response['valorMin'],
                "valorMax" => $response['valorMax'],
                "jurosMes" => $response['jurosMes'],
                'nomeModalidade' => $modalidade['nome']
            ]);
        }
        $offers = collect($offers);
        $data['collection'] = $offers->sortBy('jurosMes');
        return view('offers', $data);
    }

    private function getDataByCpf(string $cpf)
    {
        $response = Http::post($this->urlCredito, [
            'cpf' => $cpf,
        ]);
        return json_decode($response->body(), true);
    }

    private function getOffers(string $cpf, int $id_instituicao, int|string $id_modalidade)
    {
        $response = Http::post($this->urlOferta, [
            'cpf' => $cpf,
            "instituicao_id" => $id_instituicao,
            "codModalidade" => $id_modalidade
        ]);
        return json_decode($response->body(), true);
    }

    private function getAllModalityCodes(array $info, int $id_instituicao)
    {
        $codesModalidade = [];
        foreach ($info['instituicoes'] as $instituicao) {
            if ($instituicao['id'] == $id_instituicao) {
                foreach ($instituicao['modalidades'] as $modalidade) {
                    array_push($codesModalidade, [
                        'id' => $modalidade['cod'],
                        'nome' => $modalidade['nome']
                    ]);
                }
            }
        }
        return $codesModalidade;
    }
}
