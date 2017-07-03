
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Atendimento ao Pescador</header>

                <div class="panel-body">


                    <form id="formCadastro" class="formProcesso">

<fieldset>
  <legend>Dados</legend>
                        <div class="row">
                          <div class="col-lg-2">
                              <div class="form-group">

                              </div>
                          </div>
                          <div class="col-lg-5">
                              <div class="form-group">
                                  <label for="">Nome do Pescador:</label>
                                  <div>
                                      <div id="boxAjaxAutoComplete" style="float:left;margin:7px;float:left;display:none;"><img src="<?php echo base_url('tema/flatlab/img/ajax-loader-autocomplete.gif')?>"></div>
                                      <input type="hidden" name="id_pessoa" id="id_pessoa" />
                                      <input type="text" placeholder="" id="nome_pescador" name="nome_pescador" style="width:82%;margin-right:4px ; float:left;" class="form-control">
                                  </div>
                              </div>
                          </div>

                          <div class="col-lg-4">
                              <div class="form-group">
                                  <label for="">Descrição</label>
                                  <input type="text" class="form-control" name="descricao_historico" id="descricao_historico" placeholder="">
                              </div>
                          </div>



                        </div>

</fieldset>





                        <div class="row" style="margin-top:10px;">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <button class="btn btn-info" type="submit">Salvar</button>
                                </div>
                            </div>
                        </div>
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



<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/bootstrap-datepicker/js/bootstrap-datepicker.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/bootstrap-daterangepicker/date.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/bootstrap-daterangepicker/daterangepicker.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/bootstrap-timepicker/js/bootstrap-timepicker.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/ckeditor/ckeditor.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/bootstrap-inputmask/bootstrap-inputmask.min.js");?>"></script>
<script src="<?php echo base_url("tema/flatlab/js/respond.min.js");?>" ></script>


<!--common script for all pages-->
<script src="<?php echo base_url("tema/flatlab/js/common-scripts.js");?>"></script>


<script src="<?php echo base_url("js/jquery.form.js");?>"></script>


<!--script for this page-->
<script src="<?php echo base_url("tema/flatlab/js/form-component.js");?>"></script>

<script src="<?php echo base_url("tema/flatlab/js/jquery.maskedinput.min.js");?>"></script>

<!--this page  script only-->
<script src="<?php echo base_url("tema/flatlab/js/individual/datepicker.js");?>"></script>


<script type="text/javascript">
    $(document).ready(function(){

      // Dispara o Autocomplete a partir do terceiro caracter
      $( "#nome_pescador" ).autocomplete({
              minLength: 2,
              source: function( request, response ) {
                  $("#boxAjaxCliente").show();
                  $.ajax({
                      url: '<?php echo base_url('pessoa/ajax');?>',
                      dataType: "json",
                      data: {
                          acao: 'listar',
                          term: $('#nome_pescador').val()
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
                  $("#nome_pescador").val( ui.item.nome_pessoa );
                  $("#id_pessoa").val( ui.item.id_pessoa);

                  return false;
              },
          })
          .autocomplete().data("uiAutocomplete")._renderItem =  function( ul, item ) {
          $("#boxAjaxAutoComplete").hide();
          return $( "<li>" )
              .append( "<a>" + item.nome_pessoa+"</a>" )
              .appendTo( ul );
      };


        $(".cep").mask("99999-999");
        $(".data").mask("99/99/9999");
        $("#cpf_cnpj").mask("99.999.999/9999-99");
        $(".cpf_cnpj_tipo").click(function(e){
        $(".telefone_colonia").mask("(99)99999-9999");








        });

        $('#spinner1').spinner({value:1, min: 1});



        $("#formCadastro").submit(function(e){
            $("input[type=submit]").attr('disabled','disabled');
            e.preventDefault();
            $('#loader-wrapper').show();
            var dadosForm = $(this).serialize();
            //Envia Dados via Ajax
            $.ajax({type:'POST',
                dataType: "json",url:'<?php echo base_url("atendimento/salvar");?>', data: dadosForm, success: function(response) {
                    if('erro' == response.classe) {
                        $('#loader-wrapper').fadeOut(500);
                        alertaVModal(response.msg, response.classe);
                        return false;
                    }
                    else if('acerto' == response.classe)
                    {
                        var url = "'"+response.url+"'";
                        $('#loader-wrapper').fadeOut(500);
                        <?php
if(!empty($id_processo))
                        {
                        ?>
                        alertaVModal(response.msg, response.classe, response.url);
<?php
}else{
                        ?>
                        confirmContinuoNaoModal(response.msg + "<br/><b>Deseja cadastrar um Novo?</b><br/>", url);
<?php
}?>
                    }

                    return false;
                }});
        });
    });

</script>
