<?php 

class ProductosController
{
    public function listaProductos()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer 98|Y7p5S0SxqgO5yGXbhi9h3HSdSZVFa93LctFPwKaL'
        ),
    ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response);
        return $response->data;
    }
}

?>