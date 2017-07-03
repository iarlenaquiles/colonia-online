<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="CRAB SOLUTIONS - DESENVOLVIMENTO DE SISTEMAS WEB | Tássio Neri Santos">
    <meta http-equiv="refresh" content="500">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="<?php echo base_url("tema/flatlab/img/favicon.png");?>">

    <title>OFICIAL CSP - PAINEL</title>


    <!-- Custom styles for this template -->
    <link href="<?php echo base_url("tema/flatlab/css/style.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("tema/flatlab/css/style-responsive.css");?>" rel="stylesheet" />

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url("css/bootstrap.min.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("css/bootstrap-reset.css");?>" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url("tema/flatlab/assets/font-awesome/css/font-awesome.css");?>" rel="stylesheet" />
    <link href="<?php echo base_url("tema/flatlab/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css");?>" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?php echo base_url("tema/flatlab/css/owl.carousel.css");?>" type="text/css">


    <link rel="stylesheet" type="text/css" href="<?php echo base_url("tema/flatlab/assets/bootstrap-datepicker/css/datepicker.css");?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("tema/flatlab/assets/bootstrap-colorpicker/css/colorpicker.css");?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("tema/flatlab/assets/bootstrap-daterangepicker/daterangepicker.css");?>" />

    <link href="<?php echo base_url("tema/flatlab/assets/advanced-datatable/media/css/demo_page.css");?>" rel="stylesheet" />
    <link href="<?php echo base_url("tema/flatlab/assets/advanced-datatable/media/css/demo_table.css");?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url("tema/flatlab/assets/data-tables/DT_bootstrap.css");?>" />


    <!-- Custom styles for this template -->
    <link href="<?php echo base_url("tema/flatlab/css/style.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("tema/flatlab/css/style-responsive.css");?>" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url("tema/flatlab/js/html5shiv.js");?>" type="text/javascript"></script>
    <script src="<?php echo base_url("tema/flatlab/js/respond.min.js");?>" type="text/javascript"></script>
    <![endif]-->

    <script src="<?php echo base_url("tema/flatlab/js/jquery.js");?>"></script>

    <!-- JS PERSONALIZADOS -->
    <script src="<?php echo base_url('tema/flatlab/js/geral.js'); ?>"></script>



    <!-- MASK MONKEY -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

    <script src="<?php echo base_url("tema/flatlab/js/jquery-ui-1.9.2.custom.min.js");?>"></script>

    <script type="text/javascript">
        // Wait for window load
        $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });



        $(document).ready(function() {


            $(document).ajaxStart(function(){
                $(".se-preajax-con").show();
            });
            $(document).ajaxStop(function(){
                $(".se-preajax-con").hide();
            });

            // $(".telefone").mask("(00) 0000-00009");
            //$(".cpf").mask("999.999.999-99");
            //$(".cep").mask("99.999-999");

        });

    </script>

</head>

<body>
<div class="se-pre-con"><span>...Carregando</span></div>
<div class="se-preajax-con" style="display:none;"><span >...Carregando</span></div>
<section id="container" >
    <!--header start-->
    <header class="header white-bg">
        <!--logo start-->
        <!--<a href="index.html" class="logo">Flat<span>lab</span></a>-->
        <a href="<?php echo base_url("painel_cliente");?>" style="margin-top:10px;"class="logo"><img src="<?php echo base_url("tema/flatlab/img/logo.png");?>" style="width:150px;" /></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu" >
            <!--  notification start -->
            <ul class="nav top-menu">

            </ul>
            <!--  notification end -->
        </div style=>
        <div class="top-nav ">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <!--<li>
                    <input type="text" class="form-control search" placeholder="Search">
                </li>-->
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="username"><?php echo $this->session->userdata('nome_usuario');?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li><a href="<?php echo base_url("login/cliente_sair");?>"><i class="fa fa-key"></i> Sair</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content" style="margin-left:0px;">
        <?php $this->load->view($view); ?>
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            &copy; OficialCSP |
            <?php
$dataDesenv = '2012';
$dataAtual = date('Y');
echo $dataDesenv;
if($dataDesenv != $dataAtual)
    echo " - ".$dataAtual;?>
            <a href="#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>


</body>
</html>