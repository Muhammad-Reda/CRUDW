<?php
    include_once 'koneksi.php';
    header('Content-Type: application/json');
    $method = $_SERVER['REQUEST_METHOD'];

    $result = array();
    if($method=='DELETE'){

        parse_str(file_get_contents("php://input"), $_DELETE);
        echo $_DELETE['isbn'];

        //cek parameter
        if( isset($_DELETE['isbn'])){

            //parameter
            $isbn = $_DELETE['isbn'];

            $result['status']=[
                'code' => 200,
                'description' => "1 data Deleted"
            ];

            $query = "DELETE FROM buku WHERE isbn = '$isbn'";

            $connection->query($query);

            $result['results'] =[
                'isbn' => $isbn,
            ];
        }else{
            $result['status']=[
                'code' => 400,
                'description' => 'parameter invalid',
            ];
        }

    }else{
        $result['status']=[
            'code' => 400,
            'description' => 'Method invalid'
        ];
    }

    echo json_encode($result);