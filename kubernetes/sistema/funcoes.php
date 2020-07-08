<?php
include "bancodedados.php";
include "uploadClass.php";


try{
    $pdo = new PDO('mysql:host='.$host.';dbname='.$banco, $usuario, $senha);

}catch(PDOException $e){
    print_r($e);

}



function getNoticias(){
    global $pdo;
    $listar = ("SELECT * FROM noticias");

    $prepare = $pdo->prepare($listar);

    $prepare->execute();


    return $retorno = $prepare->fetchAll(PDO::FETCH_OBJ);


}

function login($usuario,$senha){
    global $pdo;

    $sql = ("SELECT * FROM usuario where login = :usuario and senha = :senha");

    $prepare = $pdo->prepare($sql);

    $prepare->execute(array("usuario" => $usuario,"senha" => $senha));


    return $retorno = $prepare->fetchAll(PDO::FETCH_OBJ);

}

function inserirNoticia($post,$file){

    global $pdo;

    $uploadService = new UploadService();
    $file = $file["myfile"];
    $tmp = time();
    $width = 500;
    $height = 500;
    $diretorio = "uploads/";
    $thumb = false;

    $arquivo = $uploadService->Envia_Arquivo($file,$tmp,$width,$height,$diretorio,$thumb );
    $sql = "INSERT INTO noticias (titulo, foto, noticia) VALUES (?,?,?)";


    $prepare = $pdo->prepare($sql);

    $prepare->execute(array(
        $post['titulo'],$arquivo,$post['noticia']
    ));



}


function excluir($id){
    global $pdo;

    $sql = "DELETE FROM  noticias WHERE idnoticias = ?";


    $prepare = $pdo->prepare($sql);

    $prepare->execute(array(
        $id
    ));
}

?>
