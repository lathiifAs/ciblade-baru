<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nixon : Admin Kit</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="<?php  echo base_url('assets/fontAwesome/css/fontawesome-all.min.css')  ?>" rel="stylesheet">
    <link href="<?php  echo base_url('assets/css/lib/themify-icons.css')  ?>" rel="stylesheet">
    <link href="<?php  echo base_url('assets/css/lib/mmc-chat.css')  ?>" rel="stylesheet" />
    <link href="<?php  echo base_url('assets/css/lib/sidebar.css')  ?>" rel="stylesheet">
    <link href="<?php  echo base_url('assets/css/lib/bootstrap.min.css')  ?>" rel="stylesheet">
    <link href="<?php  echo base_url('assets/css/lib/nixon.css')  ?>" rel="stylesheet">
    
    <link href="<?php  echo base_url('assets/css/style.css')  ?>" rel="stylesheet">

    <?php if(!empty($css)): ?>
        <?php $__currentLoopData = $css; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url_css): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <link href="<?php  echo base_url($url_css)  ?>" rel="stylesheet">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

</head>


