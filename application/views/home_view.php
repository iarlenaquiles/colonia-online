<section class="wrapper">
    <!--state overview start-->
    <div class="row state-overview">


        <div class="col-lg-3 col-sm-6">
            <section class="panel">
                <div class="symbol green">
                    <i class="fa fa-user"></i>
                </div>
                <div class="value">
                    <h1 >
                      <?php echo $quantidade_pessoas;?>
                    </h1>
                    <a href="<?php echo base_url('index.php/pessoa/listar')?>"><p>Pescadores</p></a>
                </div>
            </section>

        </div>


    </div>
    <!--state overview end-->






</section>
<!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url("tema/flatlab/js/jquery.js"); ?>"></script>
<script src="<?php echo base_url("tema/flatlab/js/jquery-1.8.3.min.js"); ?>"></script>
<script src="<?php echo base_url("tema/flatlab/js/bootstrap.min.js"); ?>"></script>
<script class="include" type="text/javascript"
        src="<?php echo base_url("tema/flatlab/js/jquery.dcjqaccordion.2.7.js"); ?>"></script>
<script src="<?php echo base_url("tema/flatlab/js/jquery.scrollTo.min.js"); ?>"></script>
<script src="<?php echo base_url("tema/flatlab/js/jquery.nicescroll.js"); ?>" type="text/javascript"></script>
<script src="<?php echo base_url("tema/flatlab/js/jquery.sparkline.js"); ?>" type="text/javascript"></script>
<script src="<?php echo base_url("tema/flatlab/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"); ?>"></script>
<script src="<?php echo base_url("tema/flatlab/js/owl.carousel.js"); ?>"></script>
<script src="<?php echo base_url("tema/flatlab/js/jquery.customSelect.min.js"); ?>"></script>
<script src="<?php echo base_url("tema/flatlab/js/respond.min.js"); ?>"></script>

<!--common script for all pages -->
<script src="<?php echo base_url("tema/flatlab/js/common-scripts.js"); ?>"></script>

<!--script for this page -->
<script src="<?php echo base_url("tema/flatlab/js/sparkline-chart.js"); ?>"></script>
<!--<script src="<?php echo base_url("tema/flatlab/js/easy-pie-chart.js"); ?>"></script>
-->
<script src="<?php echo base_url("tema/flatlab/js/count.js"); ?>"></script>
<script type="text/javascript"
        src="<?php echo base_url("tema/flatlab/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/bootstrap-daterangepicker/date.js"); ?>"></script>

<script type="text/javascript"
        src="<?php echo base_url("tema/flatlab/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"); ?>"></script>

<script type="text/javascript"
        src="<?php echo base_url("tema/flatlab/assets/bootstrap-daterangepicker/daterangepicker.js"); ?>"></script>

<script type="text/javascript"
        src="<?php echo base_url("tema/flatlab/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"); ?>"></script>

<!--this page  script only-->
<script src="<?php echo base_url("tema/flatlab/js/individual/datepicker.js"); ?>"></script>

<script>
    //owl carousel
    $(document).ready(function () {
        countUp(<?php if (!empty($quantidade_processos)) echo $quantidade_processos; else echo "0";?>);
        countUp2(<?php if (!empty($quantidade_pessoas)) echo $quantidade_pessoas; else echo "0";?>);
        countUp3(<?php if (!empty($quantidade_pendencias)) echo $quantidade_pendencias; else echo "0";?>);
        countUp4(<?php if (!empty($quantidade_anexos)) echo $quantidade_anexos; else echo "0";?>);
    });

    //custom select box

    $(function () {
        $('select.styled').customSelect();
    });

</script>
