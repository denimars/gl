
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Abu Hurairah Mataram</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<%%asset('adminlte/bootstrap/css/bootstrap.min.css')%%>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<%%asset('font/css/font-awesome.min.css')%%>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<%%asset('icon/css/ionicons.min.css')%%>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<%%asset('adminlte/dist/css/AdminLTE.min.css')%%>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<%%asset('adminlte/plugins/iCheck/square/blue.css')%%>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">

  <!-- /.login-logo -->
  <div class="login-box-body">
    <h4><p class="login-box-msg">
    <b>Abu Hurairah Mataram</b>

  </p></h4>

    <form action="<%%url('/login')%%>" method="post">
      <%%csrf_field()%%>
      <div class="form-group has-feedback">
        <input type="text" name="user" class="form-control" placeholder="Nama Pengguna" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Kata Sandi" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<%%asset('adminlte/plugins/jQuery/jquery-2.2.3.min.js')%%>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<%%asset('adminlte/bootstrap/js/bootstrap.min.js')%%>"></script>
<!-- iCheck -->
<script src="<%%asset('adminlte/plugins/iCheck/icheck.min.js')%%>"></script>
</script>
</body>
</html>
