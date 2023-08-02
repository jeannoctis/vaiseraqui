<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjetoModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'projeto';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'titulo', 'identificador', 'descricao', 'valor', 'parcelas', 'areautil', 'dimensoes', 'loteminimo',
        'quartos', 'suites', 'banheiros', 'vagas', 'incluso', 'churrasqueira', 'piscina', 'escritorio', 'pavimento',
        'arquivo', 'pdf', 'ordem', 'impressao', 'comprimento', 'altura', 'largura', 'peso',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'dtCriacao';
    protected $updatedField = 'dtAlteracao';
    protected $deletedField = 'excluido';
    protected $validationRules = [
        'titulo' => 'required',
    ];
    protected $validationMessages = [
        'titulo' => [
            'required' => 'Nome do Projeto obrigatório'
        ],
    ];
    protected $skipValidation = false;

    public function calcularFrete($medidas, $cep, $total) {

        $configModel = model('App\Models\ConfigModel', false);
        $configModel->select('cep');
        $configs = $configModel->find(1);

        $frenetToken = FRENETTOKEN;

        $configs->cep = str_replace('.', '', $configs->cep);
        $configs->cep = str_replace('-', '', $configs->cep);
        $cep = str_replace('.', '', $cep);
        $cep = str_replace('-', '', $cep);

        $objeto = array();

        $objeto['SellerCEP'] = $configs->cep;
        $objeto['RecipientCEP'] = $cep;

        $objeto['ShippingServiceCode'] = '03336';

        if ($medidas) {
            foreach ($medidas as $med) {
                $objeto['ShippingItemArray'][] = $med;
            }
        }
       
     

        $objeto['ShipmentInvoiceValue'] = $total;

        $objeto['RecipientCountry'] = 'BR';

        $ch = curl_init();

        //     curl_setopt($ch, CURLOPT_URL, "https://private-anon-c3c140ef70-frenetapi.apiary-mock.com/shipping/quote");
        // curl_setopt($ch, CURLOPT_URL, FRENETURL);
        curl_setopt($ch, CURLOPT_URL, 'https://api.frenet.com.br/shipping/quote');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($objeto));

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Accept: application/json",
            "Content-Type: application/json",
            "token: {$frenetToken}"
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        $decode = json_decode($response);

        $fretes = $decode->ShippingSevicesArray;

        return $fretes;
    }
}
