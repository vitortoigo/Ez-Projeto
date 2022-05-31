<?php 

    function preco($price)
    {
        $valor = preg_replace("/[^0-9,]+/i","", $price);
        $valor = str_replace(",",".", $valor);
        return $valor;
    }