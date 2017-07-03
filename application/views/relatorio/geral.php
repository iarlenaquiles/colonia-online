<section class="wrapper" style="background:#f1f2f7">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Relatório</b></header>
                <div class="panel-body">
                    <form id="formEditarProcesso" method="post" class="formProcesso" target="_blank" action="<?php echo base_url('relatorio/gerar_dinamico');?>">
                        <fieldset>
                            <legend>Gerar</legend>

<!-- <p><font color="#FF0000"><b>ATENÇÃO: Estes relatórios são os que mais consomem recursos do servidor, portanto, apenas gere relatórios quando necessário e tente gerá-los nos horários em que o sistema não esteja com muitos usuários, como por exemplo fora do expediente, à noite ou antes de começar a atender o público.</b></font></p> -->

                                <script>
                                  function Redireciona(obj) {
                                     //window.location.href = obj.value;
                                     window.open(obj.value);
                                  }

                                </script>

                                <select class="form-control m-bot15" name="pessoas" id="pessoas" onchange="Redireciona(this)">
                                  <option value="">Selecione</option>
                                  <option value="<?php echo base_url('relatorio/gerar_aposentados');?>">Aposentados</option>
                                  <option value="<?php echo base_url('relatorio/gerar_bairros');?>">Bairros</option>
                                  <option value="<?php echo base_url('relatorio/gerar_catadores');?>">Catadores de Caranguejo</option>
                                  <option value="<?php echo base_url('relatorio/gerar_nit_cpf_nasc');?>">CPF, NIT e NASCIMENTO</option>                                  
                                  <option value="<?php echo base_url('relatorio/gerar_cpf_seap_mpa');?>">CPF, SEAP e MPA</option> 
                                  <option value="<?php echo base_url('relatorio/gerar_falecidos');?>">Falecidos</option>
                                  <option value="<?php echo base_url('relatorio/gerar_pis_seap_mpa');?>">PIS, SEAP e MPA</option>
                                  <option value="<?php echo base_url('relatorio/gerar_telefones');?>">Telefones</option>
                                  <option value="<?php echo base_url('relatorio/gerar_titulo_zona_secao');?>">Título Zona e Seção</option>
                                  <option value="<?php echo base_url('relatorio/todos_colonizados');?>">Todos os Colonizados</option>
                                </select>



                             <!-- <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                      <a href="<?php echo base_url('relatorio/todos_colonizados');?> "  title="Visualizar/Editar" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-pencil">Todos os colonizados</i></a>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                  <a href="<?php echo base_url('relatorio/gerar_aposentados');?> "  title="Visualizar/Editar" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-pencil">Aposentados</i></a>
                                </div>
                                <div class="col-lg-2" style="padding-right:0px;">
                                    <a href="<?php echo base_url('relatorio/gerar_catadores');?> "  title="Visualizar/Editar" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-pencil">Catadores</i></a>
                                </div>
                                <div class="col-lg-2" style="padding-left:0px;">
                                  <a href="<?php echo base_url('relatorio/gerar_falecidos');?> "  title="Visualizar/Editar" target="_blank" class="btn btn-warning btn-sm"><i class="fa fa-pencil">Falecidos</i></a>
                                </div>

                                <div class="col-lg-2" style="padding-left:0px;">
                                  <a href="<?php echo base_url('relatorio/gerar_pis_seap_mpa');?> "  title="Visualizar/Editar" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-pencil">PIS, SEAP, MPA</i></a>
                                </div>
                            </div>

                            <div class="row">
                                  <div class="col-lg-2" style="padding-left:15px;">
                                    <a href="<?php echo base_url('relatorio/gerar_cpf_seap_mpa');?> "  title="Visualizar/Editar" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-pencil">CPF, SEAP, MPA</i></a>
                                  </div>
                                  <div class="col-lg-3" style="padding-left:0px;">
                                    <a href="<?php echo base_url('relatorio/gerar_titulo_zona_secao');?> "  title="Visualizar/Editar" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-pencil">TÍTULO, SEÇÃO E ZONA</i></a>
                                  </div>
                                  <div class="col-lg-2" style="padding-left:0px;">
                                    <a href="<?php echo base_url('relatorio/gerar_telefones');?> "  title="Visualizar/Editar" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-pencil">TELEFONES</i></a>
                                  </div>
                                  <div class="col-lg-2" style="padding-left:0px;">
                                    <a href="<?php echo base_url('relatorio/gerar_enderecos');?> "  title="Visualizar/Editar" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-pencil">Endereços</i></a>
                                  </div>
                                  <div class="col-lg-2" style="padding-left:0px;">
                                    <a href="<?php echo base_url('relatorio/gerar_bairros');?> "  title="Visualizar/Editar" target="_blank" class="btn btn-warning btn-sm"><i class="fa fa-pencil">Bairro</i></a>
                                  </div>
                                  <div class="col-lg-2" style="padding-left:0px;">
                                    <a href="<?php echo base_url('relatorio/gerar_nit_cpf_nasc');?> "  title="Visualizar/Editar" target="_blank" class="btn btn-warning btn-sm"><i class="fa fa-pencil">NIT CPF e NASC</i></a>
                                  </div>
                            </div> -->







                        </fieldset>

                    </form>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url("tema/flatlab/js/jquery.js");?>"></script>
<script src="<?php echo base_url("tema/flatlab/js/bootstrap.min.js");?>"></script>
<script src="<?php echo base_url("tema/flatlab/js/jquery.scrollTo.min.js");?>"></script>
<script src="<?php echo base_url("tema/flatlab/js/jquery.nicescroll.js");?>" type="text/javascript"></script>

<script src="<?php echo base_url("tema/flatlab/js/jquery-ui-1.9.2.custom.min.js");?>"></script>
<script class="include" type="text/javascript" src="<?php echo base_url("tema/flatlab/js/jquery.dcjqaccordion.2.7.js");?>"></script>

<!--custom switch-->
<script src="<?php echo base_url("tema/flatlab/js/bootstrap-switch.js");?>"></script>


<!--custom tagsinput-->
<script src="<?php echo base_url("tema/flatlab/js/jquery.tagsinput.js");?>"></script>
<!--custom checkbox & radio-->
<script type="text/javascript" src="<?php echo base_url("tema/flatlab/js/ga.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/fuelux/js/spinner.min.js");?>"></script>
<!---->
<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/bootstrap-datepicker/js/bootstrap-datepicker.js");?>"></script>
<!--<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/bootstrap-daterangepicker/date.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/bootstrap-daterangepicker/daterangepicker.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/bootstrap-timepicker/js/bootstrap-timepicker.js");?>"></script>
--><script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/ckeditor/ckeditor.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url('tema/flatlab/js/jquery.maskMoney.js'); ?>"></script>

<script src="<?php echo base_url("tema/flatlab/js/jquery.maskedinput.min.js");?>"></script>

<script src="<?php echo base_url("tema/flatlab/js/respond.min.js");?>" ></script>


<script type="text/javascript"
        src="<?php echo base_url('tema/flatlab/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js'); ?>"></script>
<script type="text/javascript"
        src="<?php echo base_url('tema/flatlab/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js'); ?>"></script>


<!--common script for all pages-->
<script src="<?php echo base_url("tema/flatlab/js/common-scripts.js");?>"></script>

<script src="<?php echo base_url("js/jquery.form.js");?>"></script>

<!--script for this page-->
<script src="<?php echo base_url("tema/flatlab/js/form-component.js");?>"></script>

<!--this page  script only-->
<script src="<?php echo base_url("tema/flatlab/js/individual/datepicker.js");?>"></script>

<!-- jQuery-UI Stylesheet-->
<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url("tema/flatlab/jui/css/jquery.ui.all.css");?>" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("tema/flatlab/jui/jquery-ui.custom.css");?>" media="screen">
-->
<style type="text/css">
    /* highlight results */
    .ui-autocomplete span.hl_results {
        background-color: #ffff66;
    }

    /* loading - the AJAX indicator */
    .ui-autocomplete-loading {
        background: white url('<?php echo base_url('tema/flatlab/img/ajax-loader-autocomplete.gif')?>') right center no-repeat;
    }

    /* scroll results */
    .ui-autocomplete {
        max-height: 250px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
        /* add padding for vertical scrollbar */
        padding-right: 5px;
    }

    .ui-autocomplete li {
        font-size: 16px;
    }

    /* IE 6 doesn't support max-height
    * we use height instead, but this forces the menu to always be this tall
    */
    * html .ui-autocomplete {
        height: 250px;
    }
</style>
<script type="text/javascript">

</script>
