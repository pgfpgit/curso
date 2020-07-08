<?php


class UploadService
{
    var $arquivo = "";
    var $tmp = "";
    var $erro = array (
        "0" => "upload execultado com sucesso!",
        "1" => "O arquivo Ã© maior que o permitido pelo Servidor",
        "2" => "O arquivo Ã© maior que o permitido pelo formulario",
        "3" => "O upload do arquivo foi feito parcialmente",
        "4" => "Nao foi feito o upload do arquivo"
   );

    function Verifica_Upload($file)
    {
        $this->arquivo = ($file) ? $file : FALSE;



        if(!is_uploaded_file($this->arquivo['tmp_name'])) {
            return false;
        }
        $get = getimagesize($this->arquivo['tmp_name']);
        if($get["mime"] == "image/png")
        {
            return 'png';
        }
        if($get["mime"] == "image/jpg" || $get["mime"] == "image/jpeg" )
            return 'jpeg';
        if($get["mime"] == "image/jpg" && $get["mime"] == "image/jpeg" && $get["mime"] == "image/png")
        {
           // echo "<span style=\"color: white; border: solid 1px; background: red;\">Esse foto nao ï¿½ uma imagem valida</span>";
            exit;
        }
    }
	public function sanitize($file){
		$arquivo = array();
		foreach($file as $key => $value){
			foreach($value as $v){
				$arquivo[$key] = $v;
			}
		}
		return $arquivo;
	}
	/**
	 *
	 */

    function Envia_Arquivo($file,$tmp,$width,$height,$diretorio,$thumb = null)
    {

		$this->tmp = $tmp;
        $ext = $this->Verifica_Upload($file);
        if($ext){
            $foto = $this->gera_fotos($width,$height,$ext,$diretorio,$thumb);
            return $foto;
        } else {
                echo "error";
            //echo "<span style=\"color: white; border: solid 1px; background: red;\">".$this->erro[$this->arquivo['error']]."</span>";
        }
    }

    function gera_fotos($width,$height,$ext,$diretorio,$thumb)
    {
        $nome_foto  = "img".$this->tmp.".".$ext;

        if($thumb != 1)
        {
            $this->reduz_imagem($ext,$this->arquivo['tmp_name'], $width, $height, $diretorio.$nome_foto);
            //passo o tamanho da thumbnail
           // echo "<span style=\"color: white; border: solid 1px; background: blue;\">".$this->erro[$this->arquivo['error']]."</span>";
        }
        else if($thumb == 1)
        {
            $thumbDir = $diretorio.'thumbs/';
            $this->reduz_imagem($ext,$this->arquivo['tmp_name'], $width, $height, $diretorio.$nome_foto);
            $this->reduz_imagem($ext,$this->arquivo['tmp_name'], 150,$height, $thumbDir.$nome_foto);
        }
        return $nome_foto;
    }

    function reduz_imagem($ext,$img, $max_x, $max_y, $nome_foto)
    {
        if($max_x == 0)
        {
            move_uploaded_file($img,$nome_foto);
            return true;
        }
        //move_uploaded_file($img,$nome_foto);
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width, $height) = getimagesize($img);
        $original_x = $width;
        $original_y = $height;
        // se a largura for maior que altura
        if($original_x > $original_y) {
           $porcentagem = (100 * $max_x) / $original_x;
        }
        else {
           $porcentagem = (100 * $max_y) / $original_y;
        }

         $tamanho_x = $original_x * ($porcentagem / 100);
         $tamanho_y = $original_y * ($porcentagem / 100);
         $image_p = imagecreatetruecolor($tamanho_x, $tamanho_y);

         if($ext == 'png')
         {
            $image   = imagecreatefrompng($img);
            imagealphablending($image_p, false);
            imagesavealpha($image_p,true);
            imagecopyresized($image_p, $image, 0, 0, 0, 0, $tamanho_x, $tamanho_y, $width, $height);
            return imagepng($image_p, $nome_foto);
         }

         if($ext == 'jpeg')
         {
            $image   = @imagecreatefromjpeg($img);
            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $tamanho_x, $tamanho_y, $width, $height);
            return imagejpeg($image_p, $nome_foto,100);
         }
    }

}

?>
