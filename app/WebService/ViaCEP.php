<?php

namespace App\WebService;

class ViaCEP{

    /**
     * Método para consultar um CEP no ViaCEP
     * @param string $cep
     * @return array
     */

    public static function consultarCep(string $cep){
        
     
        // Valida o formato do CEP
        if(strlen($cep) != 8){
            throw new \Exception('CEP inválido. Digite 8 números.');
        }

        // Inicializa o cURL
        $curl = curl_init();

        // Configura as opções do cURL
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://viacep.com.br/ws/'.$cep.'/json/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_SSL_VERIFYPEER => false
        ]);

        // Executa a requisição
        $response = curl_exec($curl);

        curl_close($curl);

        // Decodifica a resposta JSON
        $array = json_decode($response, true);

        // Retorna o array
        return isset($array['cep']) ? $array : null;

    }

}
