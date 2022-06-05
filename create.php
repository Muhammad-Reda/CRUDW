<?php

    include_once 'koneksi.php';
    header('Content-Type: application/json');
    $method = $_SERVER['REQUEST_METHOD'];

    $result = array();
    if($method=='POST'){

        //cek parameter
        if( isset($_POST['isbn']) AND isset($_POST['judul']) AND isset($_POST['pengarang']) AND isset($_POST['jumlah']) AND isset($_POST['tanggal']) AND isset($_POST['abstrak']) ){

            //parameter
            $isbn = $_POST['isbn'];
            $judul = $_POST['judul'];
            $pengarang = $_POST['pengarang'];
            $jumlah = $_POST['jumlah'];
            $tanggal = $_POST['tanggal'];
            $abstrak = $_POST['abstrak'];

            $result['status']=[
                'code' => 200,
                'description' => '1 Data Inserted'
            ];

            $query = "INSERT INTO buku (isbn, judul, pengarang, jumlah, tanggal, abstrak)
                        VALUES ('$isbn', '$judul', '$pengarang', '$jumlah', '$tanggal', '$abstrak')" ;
            $connection->query($query);

            $result['results'] =[
                'isbn' => $isbn,
                'judul' => $judul,
                'pengarang' => $pengarang,
                'jumlah' => $jumlah,
                'tanggal' => $tanggal,
                'abstrak' => $abstrak
            ];
        }else{
            $result['status']=[
                'code' => 400,
                'description' => 'parameter invalid'
            ];
        }

    }else{
        $result['status']=[
            'code' => 400,
            'description' => 'Method invalid'
        ];
    }

echo json_encode($result);