<?php

require __DIR__."/vendor/autoload.php";

use App\WebService\ViaCEP;

$dadosCep = ViaCep::consultarCep("63033320");

print_r($dadosCep);

