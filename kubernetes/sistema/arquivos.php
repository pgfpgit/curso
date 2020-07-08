<?php

session_start();


?>

<?php

include "uploadClass.php";

if($_FILES){
  $file = $_FILES["myfile"];
  $tmp = time();
  $width = 500;
  $height = 500;
  $diretorio = "uploads/";
  $thumb = false;


  $uploadService = new UploadService();

    $arquivo = $uploadService->Envia_Arquivo($file,$tmp,$width,$height,$diretorio,$thumb );

}


?>

<html>
<head>
  <title>Alura| Log in</title>
  <meta charset="utf-8" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="theme/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="theme/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="theme/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="theme/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="theme/plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="theme/index2.html"><b>Alura</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">login</p>


    <p class="login-box-msg"><?php echo "SERVIDOR: <b>".$_SERVER["SERVER_ADDR"];?></b></p>
    <p class="login-box-msg"><?php echo "SESSÃO: <b>".$_SESSION["TESTE"];?></b></p>



    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
      <input type="file" class="form-control" name="myfile" /><br />
    </div>
<p><input type="submit" class="btn btn-primary" value="Entrar"> <a href="index.php" class="pull-right"> recarregar</a></p>
</form>


<?php

$files = scandir("uploads");
$files = array_diff(scandir("uploads"), array('.', '..'));

?>

<?php foreach($files as $file):?>
<img src="uploads/<?php echo $file?>" width="200px" />
<?php endforeach?>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="theme/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="theme/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="theme/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
