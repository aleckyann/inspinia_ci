<?php

use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

/*
1) Cria a transação.
2) JS pega o payment_token da transação.
3) Usa o paymment_token, charge_id para completar a transação.
*/

function criar_transacao($clientId, $clientSecret, $especialidade, $valor)
{
    $options = [
      'client_id' => $clientId,
      'client_secret' => $clientSecret,
      'sandbox' => true // altere conforme o ambiente (true = desenvolvimento e false = producao)
    ];

    $item= [
        'name' => $especialidade, // nome do item, produto ou serviço
        'amount' => 1, // quantidade
        'value' => intval($valor) // valor (1000 = R$ 10,00)
    ];

    $items =  [
        $item
    ];

    $body  =  [
        'items' => $items
    ];

    try {
        $api = new Gerencianet($options);
        $charge = $api->createCharge([], $body);

        return $charge;
    } catch (GerencianetException $e) {
        pre($e->code);
        pre($e->error);
        pre($e->errorDescription);
    } catch (Exception $e) {
        pre($e->getMessage());
    }
}



function pagar_com_cartao($clientId = 'Client_Id_1608ec023f16cf070fe6d9f0207afa1d9a3d3d1b', $clientSecret = 'Client_Secret_6498974d91d5adc4e037f08f1206fd4ed5fb4adf')
{

    $options = [
      'client_id' => $clientId,
      'client_secret' => $clientSecret,
      'sandbox' => true // altere conforme o ambiente (true = desenvolvimento e false = producao)
    ];

    //RECEBER VIA POST
    $params = [
      'id' => 240067
    ]; // $charge_id refere-se ao ID da transação gerada anteriormente

    //RECEBER VIA POST
    $paymentToken = "4cf36b0c6da830bd6bf6b0ca0f14a89c42dabae6"; // payment_token obtido na 1ª etapa (através do Javascript único por conta Gerencianet)

    //Dados do cliente
    $customer = [
      'name' => 'Aleck Yann Mattos', // nome do cliente
      'cpf' => '10631226605', // cpf do cliente
      'email' => 'aleckyann@gmail.com', // endereço de email do cliente
      'phone_number' => '38999034451', // telefone do cliente
      'birth' => '1994-03-01' // data de nascimento do cliente
    ];

    //Dados de frete
    $billingAddress = [
      'street' => 'Street 3',
      'number' => 10,
      'neighborhood' => 'Bauxita',
      'zipcode' => '35400000',
      'city' => 'Ouro Preto',
      'state' => 'MG',
    ];

    //Dados da transação
    $creditCard = [
      'installments' => 1, // número de parcelas em que o pagamento deve ser dividido
      'billing_address' => $billingAddress,
      'payment_token' => $paymentToken,
      'customer' => $customer
    ];

    $payment = [
        'credit_card' => $creditCard // forma de pagamento (credit_card = cartão)
    ];

    $body = [
      'payment' => $payment
    ];


    try {
        $api = new Gerencianet($options);
        $charge = $api->payCharge($params, $body);

        pre($charge);
    } catch (GerencianetException $e) {
        pre($e->code);
        pre($e->error);
        pre($e->errorDescription);
    } catch (Exception $e) {
        pre($e->getMessage());
    }
}






 ?>
