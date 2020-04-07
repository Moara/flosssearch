<?php 
defined('BASEPATH') or exit('No direct script access allowed'); 
header("Cache-Control: private, max-age=3600");
date_default_timezone_set('America/Bahia');
?>

<!DOCTYPE html>
<html class="ls-theme-royal-blue <?php if($pre_panel){echo 'ls-pre-panel';} ?> ls-html-nobg ls-browser-chrome ls-window-sm ls-screen-lg">
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
</head>
<body>