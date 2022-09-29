<?php 
session_start();


if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'create':
            $name = strip_tags($_POST['name']);
            $slug = strip_tags($_POST['slug']);
            $description = strip_tags($_POST['description']);
            $features = strip_tags($_POST['features']);
            $brand_id = strip_tags($_POST['brand_id']);

            $productController = new ProductosController();
            $productController -> createProduct($name, $slug, $description, $features, $brand_id);
            echo "Entra a isset create";
        break;

    }
}
class ProductosController {
    public function getProducts(){
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
            'Authorization: Bearer '.$_SESSION['token']
            //'Cookie: XSRF-TOKEN=eyJpdiI6ImJBaUMvNExtS0J0aG9vRlV0NVBsQ0E9PSIsInZhbHVlIjoiYmt1SndyYmpQVFRQd2wzYXJ0cHFKRVlKc29ndklTVXB1WHh3VHd4M2IxcW56dVZPTERzWDFqK2JPWFdVN3FTVHM1ZHpUSHhxRFRwT01zaExzUWErYWdiaGR2VnI2aFBlMXBKY2lLOG9YWFNSUUJZYUx6K3lzcjNGOWdSZkt2bHkiLCJtYWMiOiIyZDUwNGQ4ZWU0MGM0NThkOTI0MDVhZTE3NmQwNWRhMDM1ZjEyNDQ4YWE3MjBhZDBmZmJkNDg0NzQwYTBlZWEyIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6ImwySVp6SUVGVUJJSk9tWWdQUm10RGc9PSIsInZhbHVlIjoiM0x2QkJMRWVqQis2Q1oycjNlb3EzRUZ5R0VPMC9sbFkwU3pCUzJNK1pGd3JORUt5NnpVY09qbXRtb201TWRkVm5RYkE5T3Y1MmxCRzVNVWF0RldtV3psNVgwRFArdlBwSTVsNThlZEdpa244VTN5bFliZnB4ODVQTy9MUDZrVzIiLCJtYWMiOiI5MWJkOGY0NDBkMjU2NWE5YzQ0NzlmOWRmZGYzYWNiZDY5YWVlZmVlNmRkYTJmYWE1MjliODIwNmMxNzIyMTU5IiwidGFnIjoiIn0%3D'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //echo $response;

        $response = json_decode($response);

        if( isset($response->code) &&  $response->code > 0) {
            return $response -> data;
        } else {
            return array();
        }
    }

    public function createProduct($name, $slug, $description, $features, $brand_id) {
        echo "Entra a create";
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('name' => $name,'slug' => $slug,'description' => $description,'features' => $features,'brand_id' => '1','cover'=> ''),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token']
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //echo $response;


        $response = json_decode($response);

        if( isset($response->code) &&  $response->code > 0) {
            header ("Location:../products?success=true");
        } else {
            header ("Location:../products?error=true");
        }
    }

}



?>