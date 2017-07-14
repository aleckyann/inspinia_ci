<?php

function active($segment_uri, $uri)
{
    if($segment_uri == $uri){
        return 'class="active"';
    }
}


function titulo($pagina)
{
    switch ($pagina) {
        case 'perfil':
            return 'Dados do seu Perfil';
            break;
        case 'atendimentos':
            return 'Registro de suas consultas';
            break;
        case 'solicitar-atendimento':
            return 'Solicitação de novas consultas';
            break;
    }
}


function select($select, $selected)
{
    if($select == $selected){
        return 'selected';
    }
}

//00/00/0000 -> 0000-00-00
function data_db($data)
{
    $data = explode("/", $data);
    return $data[2]. '-' .$data[1]. '-' .$data[0];
}


//0000-00-00 -> 00/00/0000
function data_normal($data)
{
    $data = explode("-", $data);
    return $data[2]. '/' .$data[1]. '/' .$data[0];
}

//0000-00-00 00:00:00 -> 00/00/0000 00:00:00
function datetime_normal($data)
{
    $data = explode(' ', $data);
    $horas = $data[1];
    $data = explode("-", $data[0]);
    $data = $data[2]. '/' .$data[1]. '/' .$data[0] .' ás: '. $horas;
    return $data;
}

//0000-00-00 00:00:00 -> 00/00/0000 00:00:00
function datetime_db($data)
{
    $data = explode(' ', $data);
    $horas = $data[1];
    $data = explode("-", $data[0]);
    $data = $data[2]. '/' .$data[1]. '/' .$data[0] .' '. $horas;
    return $data;
}

function use_uri_segment($uri)
{
    return ucfirst(str_replace('-', ' ', $uri));
}

function status_atendimento($status_code)
{
    switch($status_code) {
        case 1:
            return '<i class="text-warning">Processando</i>';
            break;

        case 2:
            return '<i class="text-primary">Aguardando atendimento</i>';
            break;

        case 3:
            return '<i class="green">Finalizado</i>';
            break;
    }
}

function pre($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

?>
