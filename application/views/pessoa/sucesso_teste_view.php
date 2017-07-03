<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="CRAB SOLUTIONS - DESENVOLVIMENTO DE SISTEMAS WEB | Tássio Neri Santos">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>OFICIAL CSP</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url("tema/flatlab/css//bootstrap.min.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("tema/flatlab/css/bootstrap-reset.css");?>" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url("tema/flatlab/assets/font-awesome/css/font-awesome.css");?>" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url("tema/flatlab/css/style.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("tema/flatlab/css/style-responsive.css");?>" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url('tema/flatlab/js/html5shiv.js');?>"></script>

    <script src="<?php echo base_url('tema/flatlab/js/respond.min.js');?>"></script>



    <![endif]-->
    <script src="<?php echo base_url('tema/flatlab/js/jquery.js');?>"></script>
    <script type="text/javascript">

        $(document).ready(function() {


            setTimeout(function() {
                history.back()
            }, 5000);

        });

    </script>
</head>




<body class="body-404" style="background:white;">

<div class="container">

    <section class="error-wrapper" style="color:#000;">
        <?php
        if(!empty($logo))
        {
        ?>
        <img style="width:500px;" src="<?php echo base_url($logo);?>" />
        <?php
        }
        ?>
        <h3>SEU LOGIN FOI SOLICITADO COM SUCESSO!</h3>
        <h2>Os dados foram enviados para seu Email.</h2>

    </section>

</div>


</body>
</html>
