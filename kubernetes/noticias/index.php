<?php include "configuracao.php" ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Alura  | Notícias</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="theme/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="noticias.php" class="navbar-brand"><b>Alura</b> Notícias</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li> <a href="<?php echo urlnoticias?>/inserir_noticias.php" target="_blank">Painel</a></li>

            <!-- Messages: style can be found in dropdown.less-->
            <!-- /.messages-menu -->

            <!-- Notifications Menu -->

            <!-- Tasks Menu -->
            <!-- User Account Menu -->

          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">

      </section>

      <!-- Main content -->
      <section class="content noticias align-self-baseline">


        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">



    </div>
    <!-- /.container -->
  </footer>
</div>

<div class="content-noticia" style="display:none">
  <div class="col-md-6 align-self-baseline">
    <!-- Box Comment -->
    <div class="box box-widget">
      <div class="box-header with-border">
        <div class="user-block">
          <span class="username"><a href="#" class="conteudo-titulo">##TITULO##</a></span>
          <span class="description conteudo-data">##DATA##</span>
        </div>
        <!-- /.user-block -->
        <div class="box-tools">
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <img class="img-responsive pad conteudo-foto" src="##FOTO##" alt="Photo">

        <p class="conteudo-noticia">##NOTICIA##</p>
        <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-share"></i> Compartilhar</button>
        <button type="button" class="btn btn-success pull-right btn-xs"><i class="fa fa-thumbs-o-up"></i> Curtir</button>
      </div>

    </div>
    <!-- /.box -->
  </div>

</div>

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="theme/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="theme/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="theme/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="theme/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="theme/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="theme/dist/js/demo.js"></script>

<script>

$(function(){
  var url = '<?php echo urlnoticias ?>'
  var endereco = url+"/noticias.php";
  $.get(endereco,function(data){

    var template = $(".content-noticia");

    data = $.parseJSON(data);

    var divConteudo = $(".noticias");
    divConteudo.html("");
    $(data).each(function(index,data){

      var conteudo = template.html().toString();

      conteudo = conteudo.replace("##TITULO##",data.titulo);
      conteudo = conteudo.replace("##DATA##","20-12-2020");

      conteudo = conteudo.replace("##FOTO##",url+"/uploads/"+data.foto);
      conteudo = conteudo.replace("##NOTICIA##",data.noticia);

      divConteudo.append(conteudo);


    })


  })

})
</script>
</body>
</html>
