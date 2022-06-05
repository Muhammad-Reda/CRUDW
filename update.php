<?php
    include_once 'koneksi.php';
    header('Content-Type: application/json');
    $method = $_SERVER['REQUEST_METHOD'];

    $result = array();
    if($method=='PUT'){

        parse_str(file_get_contents("php://input"), $_PUT);
        echo $_PUT['isbn'];

        //cek parameter
        if( isset($_PUT['isbn']) AND isset($_PUT['judul']) AND isset($_PUT['pengarang']) AND isset($_PUT['jumlah']) AND isset($_PUT['tanggal']) AND isset($_PUT['abstrak']) ){

            //parameter
            $isbn = $_PUT['isbn'];
            $judul = $_PUT['judul'];
            $pengarang = $_PUT['pengarang'];
            $jumlah = $_PUT['jumlah'];
            $tanggal = $_PUT['tanggal'];
            $abstrak = $_PUT['abstrak'];

            $query = "UPDATE buku SET isbn = '$isbn', judul = '$judul', pengarang = '$pengarang', jumlah = '$jumlah', tanggal = '$tanggal', abstrak = '$abstrak'
                        WHERE isbn = '$isbn'";

            $update = $connection->query($query);
            $count = $update -> rowCount();

            $result['status']=[
                'code' => 200,
                'description' => "$count data Updated"
            ];


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
                'description' => 'parameter invalid',
                'Tips' => 'Masukkan seluruh data kolom, jangan kosongkan data lain jika ingin mengubah 1 atau beberapa data'
            ];
        }

    }else{
        $result['status']=[
            'code' => 400,
            'description' => 'Method invalid'
        ];
    }

    echo json_encode($result);