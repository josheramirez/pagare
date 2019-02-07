<?php

function formatoRut($rut)
{
    if ($rut != null){
        return \Freshwork\ChileanBundle\Rut::set($rut)->fix()->format();
    }else {
        return '__________';
    }
}

function formatoFecha($fecha)
{
    if ($fecha != null){
        return \Carbon\Carbon::parse($fecha)->format('d-m-Y');
    }else {
        return '__________';
    }
}

function formatoFechaHora($fechaHora)
{
    return \Carbon\Carbon::parse($fechaHora)->format('d-m-Y H:i:s');
}


function formatoNull($variable)
{
    if ($variable == null){
        return '_______________';
    }else{
        return $variable;
    }

}

function formatoDpto($depa)
{
    if ($depa == null){
        return'';
    }else{
        return "Dpto <strong>$depa</strong>";
    }
}