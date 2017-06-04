<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>ADWAYS</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="http://adways.kr/wordpress/wp-content/uploads/2014/01/favicon.png" />

    <link href="/static/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>static/css/common.css" rel="stylesheet">
    <link href="<?php echo base_url()?>static/css/library.css" rel="stylesheet">
    <link href="<?php echo base_url()?>static/css/loader.css" rel="stylesheet">
    <link href="/static/lib/animation/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/static/lib/owlcarousel/css/owl.carousel.css" />

    <!-- FONT -->
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Oswald:700,300,400'>
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700,700italic'>
<!--    <link rel="stylesheet" type="text/css" href="--><?//=site_url('static/font/nanumbarungothic.css')?><!--">-->
    <?php
    $total_url = $_SERVER['PHP_SELF'];
    $arr_splitted_url = explode('/', $total_url);

    if ($arr_splitted_url[count($arr_splitted_url) - 1] === "") {
        unset($arr_splitted_url[count($arr_splitted_url) - 1]);
    }

    $ctrl_name = $arr_splitted_url[count($arr_splitted_url) - 2];
    $view_name = $arr_splitted_url[count($arr_splitted_url) - 1];
    $filename = "";

    if ($ctrl_name == 'index.php') {
        $filename = 'static/css/'.strtolower($view_name).'/index.css';
    } else {
        $filename = 'static/css/'.strtolower($ctrl_name).'/'.strtolower($view_name).'.css';
    }

    if(file_exists($filename)) {
        ?>
        <link href="<?php echo base_url()?><?php echo $filename; ?>" rel="stylesheet">
        <?php
    }
    if (strpos($filename, 'index.php')) {
        ?>
        <link href="<?php echo base_url()?>/static/css/home/index.css" rel="stylesheet">
        <?php
    }
    if(strpos($filename, 'contact')) {
    ?>
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?v=3.exp&region=KR"></script>
    <?php
    }
    ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="animation-legacy-support.js"></script>
    <![endif]-->
</head>
<body>
<input type="hidden" id="aw-lang" value="<?php if($lang) echo $lang ?>">
<div class="loader">
    <div class="load-title">
        <span>Loading...</span>
    </div>
    <div class="contain">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>


<div class="body-container">
    <?php
        $flashdata = $this->session->flashdata('message');
        if ($flashdata != null) {
    ?>

        <script type="text/javascript">
            alert('<?=$this->session->flashdata('message')?>');
        </script>
    <?php
    }
    ?>