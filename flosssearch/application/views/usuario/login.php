
<!DOCTYPE html>
<html class="ls-theme-gray">
<head>
  
  <title>FlossSearch.Edu</title>
  <meta charset="utf-8">
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-title" content="floss search.edu">

  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('assets/images/apple-icon-57x57.png'); ?>">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('assets/images/apple-icon-60x60.png'); ?>">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('assets/images/apple-icon-72x72.png'); ?>">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/images/apple-icon-76x76.png'); ?>">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('assets/images/apple-icon-114x114.png'); ?>">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('assets/images/apple-icon-120x120.png'); ?>">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('assets/images/apple-icon-144x144.png'); ?>">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('assets/images/apple-icon-152x152.png'); ?>">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/images/apple-icon-180x180.png'); ?>">
  <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('assets/images/android-icon-192x192.png'); ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/images/favicon-32x32.png'); ?>">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/images/favicon-96x96.png'); ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/favicon-16x16.png'); ?>">
  <link rel="manifest" href="<?php echo base_url('assets/images/manifest.json'); ?>">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?php echo base_url('assets/images/ms-icon-144x144.png'); ?>">
  <meta name="theme-color" content="#ffffff">

  <script src="<?php echo base_url('assets/js/mediaqueries-ie.js'); ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/js/html5shiv.js'); ?>" type="text/javascript"></script>
  <link href="<?php echo base_url('assets/css/locastyle.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/css/floss.css'); ?>" rel="stylesheet" type="text/css" />
  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>" type="text/javascript"></script>

  <link href="<?php echo base_url('assets/css/toastr.min.css'); ?>" rel="stylesheet" />
  <script src="<?php echo base_url('assets/js/toastr.min.js'); ?>"></script>

</head>
<body class="documentacao documentacao_exemplos documentacao_exemplos_login-screen documentacao_exemplos_login-screen_index">

<div class="ls-login-parent">
  <div class="ls-login-inner">
    <div class="ls-login-container">
      <div class="ls-login-box">
  <h1 class="ls-login-logo"><img src="<?php echo base_url('assets/images/detective.svg'); ?>" class=" img-fluid" width="100"></h1>
  
  <!-- <form role="form" class="ls-form ls-login-form" action="#"> -->
    <?php echo form_open("", array('role'=>'form', 'class' => 'ibox-body')); ?>
    <fieldset>

      <h3 style="text-align: center;"><strong>Sign in to FlossSearch.Edu</strong></h3>

      <label class="ls-label">
        <b class="ls-label-text ls-hidden-accessible">E-mail address</b>
        <input class="ls-login-bg-user ls-field-lg" type="email" placeholder="E-mail" required autofocus name="login">
      </label> 

      <label class="ls-label">
        <b class="ls-label-text ls-hidden-accessible">Password</b>
        <div class="ls-prefix-group ls-field-lg">
          <input id="password_field" class="ls-login-bg-password" type="password" placeholder="Password" required name="senha">
          <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_field" href="#"></a>
        </div>
      </label>

      <!-- <p><a class="ls-login-forgot" href="forgot-password">Esqueci minha senha</a></p> -->

      <input type="submit" value="Entrar" name="btn_login" class="ls-btn-primary ls-btn-block ls-btn-lg">
      <p class="ls-txt-center ls-login-signup">New to FlossSearch.Edu? <a href="<?php echo base_url('usuario/cadastrar'); ?>">Create an account.</a></p>

    </fieldset>
  <!-- </form> -->
  <?php echo form_close(); ?>

</div>

    </div>
  </div>
</div>

<script src="<?php echo base_url('assets/js/locastyle.js'); ?>" type="text/javascript"></script>

<script type="text/javascript">
    <?php if ($msg == 'invalido') { ?>
        toastr["error"]("<?php echo $this->session->flashdata('invalido'); ?>", "ERRO!");
    <?php } ?>
</script>

</body>
</html>
