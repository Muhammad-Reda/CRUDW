<?php

include_once 'koneksi.php';
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];

$result = array();
if($method=='GET'){
    //cek parameter
    if(isset($_GET['isbn'])){
        //parameter
        $isbn = $_GET['isbn'];
        $result['status']=[
            'code' => 200,
            'description' => 'request valid'
        ];

        $query = "select * from buku WHERE isbn='$isbn'" ;
        $statement = $connection->query($query);

        $statement -> setFetchMode(PDO::FETCH_OBJ);
        $result['results'] = $statement->fetchAll();
    }else{
        $result['status']=[
            'code' => 400,
            'description' => 'parameter invalid'
        ];
    }

}else{
    $result['status']=[
        'code' => 400,
        'description' => 'request invalid'
    ];
}

echo json_encode($result);