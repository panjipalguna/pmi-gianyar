<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url("assets/layout") ?>/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url("assets/layout") ?>/plugins/custom/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url("assets/layout") ?>/plugins/custom/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url("assets/layout") ?>/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url("assets/layout") ?>/dist/css/custom.css">
  <link rel="stylesheet" href="<?= base_url("assets/layout") ?>/plugins/iCheck/square/blue.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page" style="background:#B22222 !important">
<div class="login-box">
  <div class="login-box-body" style="background:#f0a6a1; border-radius:10px">
    <div class="login-logo">
      <img src="<?= base_url("assets/layout/dist/img") ?>/PMI.png" style="width:300px" />
    </div>
    <form action="<?= site_url("login") ?>/doLogin" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="txtusername" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="txtpassword" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
        
      <span style="font-size:12px">Prove us you are not a robot</span>
      <div class="row">
        <div class="col-xs-8">
          <input type="text" name="txtl" class="form-control" readonly="" value="<?= $question ?>">
          <input type="hidden" name="txtprovequestion" class="form-control" readonly="" value="<?= $answer ?>">
        </div>
        <div class="col-xs-4">
          <input type="text" name="txtproveanswer" class="form-control" placeholder="Result">
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div style="clear:both; height:25px"></div>
          <button type="submit" class="btn btn-success btn-block btn-flat">Sign In</button>
          <div style="clear:both; height:45px"></div>
          <span style="text-decoration:underline"><strong>Login Demo</strong></span>
          <div style="clear:both; height:5px"></div>
          <span>Username: <strong>demo</strong></span>
          <div style="clear:both; height:1px"></div>
          <span>Password: <strong>112233</strong></span>
        </div>
      </div>
    </form>

    <?php
      if(isset($_GET['msg'])) {
    ?>
        <div style="clear:both; height:40px"></div>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?= $_GET['msg'] ?>
        </div>
    <?php
      }
    ?>

</div>

<script src="<?= base_url("assets/layout") ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?= base_url("assets/layout") ?>/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url("assets/layout") ?>/plugins/iCheck/icheck.min.js"></script>
</body>
</html>
