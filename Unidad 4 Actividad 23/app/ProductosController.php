<?php

include_once "config.php";

if (isset($_POST['action'])) 
{
    switch ($_POST['action']) 
    {
        case 'create':
            $name = strip_tags($_POST['name']);
            $slug = strip_tags($_POST['slug']);
            $description = strip_tags($_POST['description']);
            $features = strip_tags($_POST['features']);
            $brand_id = strip_tags($_POST['brand_id']);
            $img_producto = $_FILES['img_producto']['tmp_name'];

            $productController = new ProductosController();
            $productController -> createProduct($name, $slug, $description, $features, $brand_id, $img_producto);

        break;

        case 'delete':
            $id = strip_tags($_POST['id']);

            $productController = new ProductosController();
            $productController -> deleteProduct($id);
        break;

    }
}

Class ProductosController
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
            'Authorization: Bearer '.$_SESSION['token'],

        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);


        $response = json_decode($response);

        if( isset($response->code) &&  $response->code > 0) 
        {
            return $response -> data;
        } 
        else 
        {
            return array();
        }
    }

    public function createProduct($name, $slug, $description, $features, $brand_id, $img_producto) 
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
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
        'name' => $name,
        'slug' => $slug,
        'description' => $description,
        'features' => $features,
        'brand_id' => $brand_id,
        'cover'=> new CURLFILE($img_producto)),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' .$_SESSION['token'],
            //'Cookie: XSRF-TOKEN=eyJpdiI6Im9vY1IzRHVTcXpwM0o2Zk9JSWtXcGc9PSIsInZhbHVlIjoiTFUzaFE3emg5QmQ2dE5mRlkzTGFtbXB2emwzTW00Qy82cFFsOE02SWNvUldUamFRVnVndzJTTWFOcDFWMkkwTG5MWmF0TjV3N1dpc3NiOFB6dTVpTE5ZZzczZW9WQSt5eTBjVEtucmNoRVpTSXBFYXdjM004ZmdrNXI2SkRSMDMiLCJtYWMiOiJiZWQyNjU4ODU5ZGUxZjY5Nzk2NDViZjlkZTYxODA3ZGM1ZGZjNGIxOGQ1OTExOGNhNmQ2Mzc5OTQ5MGIzZmU5IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IlNVVjBNeGNVc2RuSkVyOGxrWFZMYkE9PSIsInZhbHVlIjoiRDVaNU9LOHVseExvY2RuUVA3MHcwMTRra0JSNnp2WTVCRWtBWEZxc3Yyem9TWXl0b2JScTdFUng4WkthTUdhYlY4UE50dllCWGVTcmREOFJmeXg1TmRJeGlaVEpWOVhQek5qdVFnS09NOS9yZXFFUk1vUlpUZDJvRUhuVzFYNVUiLCJtYWMiOiJkODU0OGZiYmVjMWY2NmUyNWQ5ZGVlNzMwMjdlZjNiNzNkZjBmMWE2MTFkN2FjMTFlN2EyNWFiMzY2MmVkMWYxIiwidGFnIjoiIn0%3D'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);



        $response = json_decode($response);

        if( isset($response->code) &&  $response->code > 0) 
        {
            header ("Location:../products?success=true");
        } 
        else
        {
            header ("Location:../products?error=true");
        }
    }

    public function getBrands()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' .$_SESSION['token'],
        ),
        ));


        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);
        if (isset($response->code) && $response->code > 0) 
        {
            return $response -> data;
        }
        else
        {
            return array();
        }
    }

    public function getDetail($slug)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/'.$slug,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token'],

        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        if (isset($response->code) && $response->code > 0) 
        {
            return $response -> data;
        }
        else
        {
            return array();
        }
    }

    public function deleteProduct($id) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/'.$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token']
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response);

        if( isset($response->code) &&  $response->code > 0) 
        {
            return true;
        }
         else 
         {
            return false;
        }

    }
}





?>