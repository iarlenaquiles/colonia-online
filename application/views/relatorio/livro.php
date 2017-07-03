<section class="wrapper" style="background:#f1f2f7">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Relatório - Livro</b></header>
                <div class="panel-body">
                    <form id="formEditarProcesso" method="post" class="formProcesso" target="_blank" action="<?php echo base_url('relatorio/gerar_livro/');?>">
                        <fieldset>
                            <legend>Livro</legend>

                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="tipo_processo">Livro*:</label>
                                          <input type="text" class="form-control" required name="livro" placeholder="Informe o Livro" >
                                    </div>
                                </div>



                            </div>
                            <div class="row" style="margin-top:10px;">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <button class="btn btn-info" type="submit">Gerar</button>
                                    </div>
                                </div>
                            </div>
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
    $(document).ready(function(){

        $(".camposPeriodo").attr('required','required');
//Verifica qual tipo de pauta foi escolhida
        $("#tipo_pauta").change(function(){

            if('Pendência' == $(this).val())
            {
                $(".camposPeriodo").removeAttr('required');
                $("#filtroPeriodo").hide();
                $("#filtroTipoJustica").hide();
            }else{
                $(".camposPeriodo").attr('required','required');
                $("#filtroPeriodo").show();
                $("#filtroTipoJustica").show();
            }
        });
        if('Pendência' == $("#tipo_pauta").val())
        {
            $(".camposPeriodo").removeAttr('required');
            $("#filtroPeriodo").hide();
            $("#filtroTipoJustica").hide();
        }else{
            $(".camposPeriodo").attr('required','required');
            $("#filtroPeriodo").show();
            $("#filtroTipoJustica").show();
        }

        $("#formAddForum").submit(function (e) {
            e.preventDefault();
            $('#loader-wrapper').show();
            var dadosForm = $(this).serialize();
            //Envia Dados via Ajax
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: '<?php echo base_url("forum/salvar");?>',
                data: dadosForm,
                success: function (response) {
                    if ('erro' == response.classe) {
                        $('#loader-wrapper').fadeOut(500);
                        alertaVModal(response.msg, response.classe);
                        return false;
                    }
                    else if ('acerto' == response.classe) {
                        $('#loader-wrapper').fadeOut(500);
                        $("#myModalFormAddForum").modal('hide');
                        $("#addNovoForum").hide();
                        $("#addNovoLocal").hide();
                        alertaVModal(response.msg, response.classe);
                        $("#id_forum").val(response.id_forum);
                        $("#id_local_evento").val(response.id_forum);
                        $("#forum").attr('readonly','readonly');
                        $("#forum").val(response.nome_forum+response.endereco_forum);
                        $("#local_evento").attr('readonly','readonly');
                        $("#local_evento").val(response.nome_forum+response.endereco_forum);
                    }

                    return false;
                }
            });
        });

        // Dispara o Autocomplete a partir do terceiro caracter
        $( "#pessoa" ).autocomplete({
                minLength: 3,
                source: function( request, response ) {
                    $("#boxAjaxPessoaC").show();
                    $.ajax({
                        url: '<?php echo base_url('pessoa/ajax');?>',
                        dataType: "json",
                        data: {
                            acao: 'listar',
                            term: $("#pessoa").val()
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                html: true, // optional (jquery.ui.autocomplete.html.js required)
                // optional (if other layers overlap autocomplete list)
                open: function(event, ui) {
                    $(".ui-autocomplete").css("z-index", 99000);
                },
                select: function( event, ui ) {
                    $("#pessoa").val( ui.item.nome_pessoa );
                    $("#id_pessoa").val( ui.item.id_pessoa );
                    return false;
                },
            })
            .autocomplete().data("uiAutocomplete")._renderItem =  function( ul, item ) {
            $("#boxAjaxPessoaC").hide();
            return $( "<li>" )
                .append( "<a>" +item.nome_pessoa +" - CPF/CNPJ:"+item.cpf_cnpj+"</a>" )
                .appendTo( ul );
        };


    });
</script>
