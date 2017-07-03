
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Cadastro da Colônia</header>

                <div class="panel-body">

                    <div style="display:none">
                        <form id="frmFoto" method="post" action="<?php echo base_url("colonia/upload_foto"); ?>" enctype="multipart/form-data">
                            <input id="uploadfoto" name="uploadfoto" type="file" onchange="$('.foto-avatar').prepend('<div class=\'load\'></div>');$('#frmFoto').submit()" />
                        </form>

                    </div>
                    <form id="formCadastro" class="formProcesso">

<fieldset>
  <legend>Dados</legend>
                        <div class="row">

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <div class="foto-avatar arredonda-100 " onclick="$('#uploadfoto').trigger('click')" style="position: absolute;margin: 0px 20px 0px 20px;background-size: auto 100%; background-position: center center;" >
                                        <input type='hidden' name='foto' value="" id="avatar_cadastros" required>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="">Nome da Colônia:</label>
                                    <input type="text" class="form-control" name="nome_colonia" placeholder="Informe o Nome" >
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">Data Fundação:</label>
                                    <input type="text" class="form-control data" name="data_fundacao" id="data_fundacao" placeholder="" >
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                  <label for="">CNPJ:</label>
                                    <input type="text" class="form-control" name="cpf_cnpj" id="cpf_cnpj" placeholder="" >
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    &ensp;
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="">Telefone Colônia:</label>
                                    <input type="text" class="form-control" name="telefone_colonia" id="telefone_colonia" placeholder="">
                                </div>
                            </div>




                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="">Federação:</label>
                                    <div>
                                        <div id="boxAjaxAutoComplete" style="float:left;margin:7px;float:left;display:none;"><img src="<?php echo base_url('tema/flatlab/img/ajax-loader-autocomplete.gif')?>"></div>
                                        <input type="hidden" name="id_federacao" id="id_federacao" />
                                        <input type="text" placeholder="" id="federacao" name="federacao" class="form-control">

                                    </div>

                                </div>
                            </div>

                        </div>






</fieldset>


<fieldset>
  <legend>Endereço</legend>
                        <div class="row">
                          <div class="col-lg-2">
                              <div class="form-group">

                              </div>
                          </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">CEP:</label>
                                    <input type="text" class="form-control cep"  name="endereco_cep" id="Cep" placeholder="" >
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Estado:</label>

                                    <select class="form-control m-bot15" name="id_estado" id="id_estado" >
                                        <option value="">SELECIONE ESTADO</option>
                                        <?php
                                        foreach($estados as $estado){
                                            ?>
                                            <option value="<?php echo $estado['id_estado'];?>"><?php echo $estado['nome_estado'];?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Cidade:</label>
                                    <select class="form-control m-bot15" id="cidades" name="id_cidade" style="background:#fff;opacity:0.65;" >
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-2">
                              <div class="form-group">

                              </div>
                          </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Rua:</label>
                                    <input type="text" class="form-control" name="endereco_rua" id="endereco_rua" placeholder="" >
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group">
                                    <label for="">Número:</label>
                                    <input type="text" class="form-control" name="endereco_numero" id="endereco_numero" placeholder="" >
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">Bairro:</label>
                                    <input type="text" class="form-control" name="endereco_bairro" id="endereco_bairro" placeholder="" >
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Complemento:</label>
                                    <input type="text" class="form-control" name="endereco_complemento" id="endereco_complemento" placeholder="" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-2">
                              <div class="form-group">

                              </div>
                          </div>
                          <div class="col-lg-3">
                              <div class="form-group">
                                  <label for="">Ponto de referência:</label>
                                  <input type="text" class="form-control" name="ponto_referencia" id="ponto_referencia" placeholder="" >
                              </div>
                          </div>
                        </div>

</fieldset>

<fieldset>
  <legend>Cargos</legend>
                        <div class="row">
                          <div class="col-lg-2">
                              <div class="form-group">

                              </div>
                          </div>
                          <div class="col-lg-5">
                              <div class="form-group">
                                  <label for="">Presidente:</label>
                                  <div>
                                      <div id="boxAjaxAutoComplete" style="float:left;margin:7px;float:left;display:none;"><img src="<?php echo base_url('tema/flatlab/img/ajax-loader-autocomplete.gif')?>"></div>
                                      <input type="hidden" name="id_pessoa_presidente" id="id_pessoa_presidente" />
                                      <input type="text" placeholder="" id="presidente_colonia" name="presidente_colonia" class="form-control">
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-5">
                              <div class="form-group">
                                  <label for="">Vice-Presidente:</label>
                                  <div>
                                      <div id="boxAjaxAutoComplete" style="float:left;margin:7px;float:left;display:none;"><img src="<?php echo base_url('tema/flatlab/img/ajax-loader-autocomplete.gif')?>"></div>
                                      <input type="hidden" name="id_pessoa_vice_presidente" id="id_pessoa_vice_presidente" />
                                      <input type="text" placeholder="" id="vice_presidente_colonia"  name="vice_presidente_colonia" class="form-control">
                                  </div>

                              </div>
                          </div>


                        </div>


                        <div class="row">
                          <div class="col-lg-2">
                              <div class="form-group">

                              </div>
                          </div>
                          <div class="col-lg-5">
                              <div class="form-group">
                                  <label for="">1° Secretário:</label>
                                  <div>
                                      <div id="boxAjaxAutoComplete" style="float:left;margin:7px;float:left;display:none;"><img src="<?php echo base_url('tema/flatlab/img/ajax-loader-autocomplete.gif')?>"></div>
                                      <input type="hidden" name="id_pessoa_secretario" id="id_pessoa_secretario" />
                                      <input type="text" placeholder="" id="secretario_colonia"  name="secretario_colonia" class="form-control">
                                  </div>


                              </div>
                          </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="">2° Secretário:</label>
                                <div>
                                    <div id="boxAjaxAutoComplete" style="float:left;margin:7px;float:left;display:none;"><img src="<?php echo base_url('tema/flatlab/img/ajax-loader-autocomplete.gif')?>"></div>
                                    <input type="hidden" name="id_pessoa_segundo_secretario" id="id_pessoa_segundo_secretario" />
                                    <input type="text" placeholder="" id="segundo_secretario_colonia"  name="segundo_secretario_colonia" class="form-control">
                                </div>

                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">

                            </div>
                        </div>
                      <div class="col-lg-5">
                          <div class="form-group">
                              <label for="">1° Tesoureiro:</label>
                              <div>
                                  <div id="boxAjaxAutoComplete" style="float:left;margin:7px;float:left;display:none;"><img src="<?php echo base_url('tema/flatlab/img/ajax-loader-autocomplete.gif')?>"></div>
                                  <input type="hidden" name="id_pessoa_tesoureiro" id="id_pessoa_tesoureiro" />
                                  <input type="text" placeholder="" id="tesoureiro_colonia"  name="tesoureiro_colonia" class="form-control">
                              </div>

                          </div>
                      </div>
                      <div class="col-lg-5">
                          <div class="form-group">
                              <label for="">2° Tesoureiro:</label>
                              <div>
                                  <div id="boxAjaxAutoComplete" style="float:left;margin:7px;float:left;display:none;"><img src="<?php echo base_url('tema/flatlab/img/ajax-loader-autocomplete.gif')?>"></div>
                                  <input type="hidden" name="id_pessoa_segundo_tesoureiro" id="id_pessoa_segundo_tesoureiro" />
                                  <input type="text" placeholder="" id="segundo_tesoureiro_colonia"  name="segundo_tesoureiro_colonia" class="form-control">
                              </div>

                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                          <div class="form-group">

                          </div>
                      </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="">Presidente do conselho:</label>
                            <div>
                                <div id="boxAjaxAutoComplete" style="float:left;margin:7px;float:left;display:none;"><img src="<?php echo base_url('tema/flatlab/img/ajax-loader-autocomplete.gif')?>"></div>
                                <input type="hidden" name="id_pessoa_presidente_conselho" id="id_pessoa_presidente_conselho" />
                                <input type="text" placeholder="" id="presidente_conselho"  name="presidente_conselho" class="form-control">
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="">Vice-Presidente do conselho:</label>
                            <div>
                                <div id="boxAjaxAutoComplete" style="float:left;margin:7px;float:left;display:none;"><img src="<?php echo base_url('tema/flatlab/img/ajax-loader-autocomplete.gif')?>"></div>
                                <input type="hidden" name="id_pessoa_vice_presidente_conselho" id="id_pessoa_vice_presidente_conselho" />
                                <input type="text" placeholder="" id="vice_presidente_conselho"  name="vice_presidente_conselho" class="form-control">
                            </div>

                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">

                        </div>
                    </div>
                  <div class="col-lg-5">
                      <div class="form-group">
                          <label for="">1° Suplente:</label>
                          <div>
                              <div id="boxAjaxAutoComplete" style="float:left;margin:7px;float:left;display:none;"><img src="<?php echo base_url('tema/flatlab/img/ajax-loader-autocomplete.gif')?>"></div>
                              <input type="hidden" name="id_pessoa_suplente1" id="id_pessoa_suplente1" />
                              <input type="text" placeholder="" id="suplente1"  name="suplente1" class="form-control">
                          </div>

                      </div>
                  </div>
                  <div class="col-lg-5">
                      <div class="form-group">
                          <label for="">2° Suplente:</label>
                          <div>
                              <div id="boxAjaxAutoComplete" style="float:left;margin:7px;float:left;display:none;"><img src="<?php echo base_url('tema/flatlab/img/ajax-loader-autocomplete.gif')?>"></div>
                              <input type="hidden" name="id_pessoa_suplente2" id="id_pessoa_suplente2" />
                              <input type="text" placeholder="" id="suplente2"  name="suplente2" class="form-control">
                          </div>

                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-2">
                      <div class="form-group">

                      </div>
                  </div>
                  <div class="col-lg-5">
                      <div class="form-group">
                          <label for="">3° Suplente:</label>
                          <div>
                              <div id="boxAjaxAutoComplete" style="float:left;margin:7px;float:left;display:none;"><img src="<?php echo base_url('tema/flatlab/img/ajax-loader-autocomplete.gif')?>"></div>
                              <input type="hidden" name="id_pessoa_suplente3" id="id_pessoa_suplente3" />
                              <input type="text" placeholder="" id="suplente3"  name="suplente3" class="form-control">
                          </div>

                      </div>
                  </div>
                  <div class="col-lg-5">
                      <div class="form-group">
                          <label for="">4° Suplente:</label>
                          <div>
                              <div id="boxAjaxAutoComplete" style="float:left;margin:7px;float:left;display:none;"><img src="<?php echo base_url('tema/flatlab/img/ajax-loader-autocomplete.gif')?>"></div>
                              <input type="hidden" name="id_pessoa_suplente4" id="id_pessoa_suplente4" />
                              <input type="text" placeholder="" id="suplente4"  name="suplente4" class="form-control">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-lg-2">
                    <div class="form-group">

                    </div>
                </div>



                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Data início do mandato:</label>
                        <input type="text" class="form-control data" name="data_inicio_mandato" id="data_inicio_mandato" placeholder="" >
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Data fim do mandato:</label>
                        <input type="text" class="form-control data" name="data_fim_mandato" id="data_fim_mandato" placeholder="" >
                    </div>
                </div>
            </div>

                        </fieldset>

<fieldset>
  <legend>Contatos</legend>
                        <div class="row">
                          <!-- div para espacamento  -->
                          <div class="col-lg-2">
                              <div class="form-group">

                              </div>
                          </div>


                            <div class="col-lg-10">
                                <div class="form-group">
                                  <div class="col-md-8"><label for="">Telefones:</label>
                                      <textarea class="wysihtml5 form-control" name="telefones"  rows="2"></textarea>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">

                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="form-group">
                                  <div class="col-md-8"><label for="">Vizinhos:</label>
                                      <textarea class="wysihtml5 form-control" name="vizinhos"  rows="2"></textarea>
                                  </div>
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

<div class="modal fade" id="myModalFormAddFederacao" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
    <div class="modal-dialog" style="width:400px;">
        <div class="modal-content">
            <form action="" id="formAddFederacao">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×
                    </button>
                    <h4 class="modal-title">Adicionar Nova Federação</h4></div>


                <div class="modal-body">

                    <div class="col-lg-14">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Nome da Federação:</label>
                                    <input type="text" required name="nome_federacao" class="form-control" required value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-14">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Sigla da Federação:</label>
                                    <input type="text" required name="sigla_federacao" class="form-control" required value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-14">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Foto:</label>

                            <a href="" class="btn btn-primary selecione"
                               id="botaoUploadFederacao"
                               style="background-size: auto 100%; background-position: center center;">Selecione</a>
                            <input type='hidden' name='foto_federacao' id="foto_federacao"
                                   required></button>
                            <div id="msgUpload"></div>
                            <br/>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" id="botaoFederacao" value="Adicionar" class="btn btn-success"/>
                </div>
            </form>
        </div>
    </div>
</div>
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

<script src="<?php echo base_url("tema/flatlab/js/valida_cpf_cnpj.js");?>"></script>
<script src="<?php echo base_url("js/jquery.form.js");?>"></script>


<!--script for this page-->
<script src="<?php echo base_url("tema/flatlab/js/form-component.js");?>"></script>

<script src="<?php echo base_url("tema/flatlab/js/jquery.maskedinput.min.js");?>"></script>

<!--this page  script only-->
<script src="<?php echo base_url("tema/flatlab/js/individual/datepicker.js");?>"></script>


<script type="text/javascript">
    $(document).ready(function(){
      $( "#federacao" ).autocomplete({
              minLength: 2,
              source: function( request, response ) {
                  $("#boxAjaxCliente").show();
                  $.ajax({
                      url: '<?php echo base_url('federacao/ajax');?>',
                      dataType: "json",
                      data: {
                          acao: 'listar',
                          term: $('#federacao').val()
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
                  $("#federacao").val( ui.item.nome_federacao);
                  $("#id_federacao").val( ui.item.id_federacao);

                  return false;
              },
          })
          .autocomplete().data("uiAutocomplete")._renderItem =  function( ul, item ) {
          $("#boxAjaxAutoComplete").hide();
          return $( "<li>" )
              .append( "<a>" + item.nome_federacao+"</a>" )
              .appendTo( ul );
      };

      // Dispara o Autocomplete a partir do terceiro caracter
      $( "#presidente_colonia" ).autocomplete({
              minLength: 2,
              source: function( request, response ) {
                  $("#boxAjaxCliente").show();
                  $.ajax({
                      url: '<?php echo base_url('pessoa/ajax');?>',
                      dataType: "json",
                      data: {
                          acao: 'listar',
                          term: $('#presidente_colonia').val()
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
                  $("#presidente_colonia").val( ui.item.nome_pessoa );
                  $("#id_pessoa_presidente").val( ui.item.id_pessoa);

                  return false;
              },
          })
          .autocomplete().data("uiAutocomplete")._renderItem =  function( ul, item ) {
          $("#boxAjaxAutoComplete").hide();
          return $( "<li>" )
              .append( "<a>" + item.nome_pessoa +" "+ item.numero_carteira+"</a>" )
              .appendTo( ul );
      };

      // Dispara o Autocomplete a partir do terceiro caracter
      $( "#vice_presidente_colonia" ).autocomplete({
              minLength: 2,
              source: function( request, response ) {
                  $("#boxAjaxCliente").show();
                  $.ajax({
                      url: '<?php echo base_url('pessoa/ajax');?>',
                      dataType: "json",
                      data: {
                          acao: 'listar',
                          term: $('#vice_presidente_colonia').val()
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
                  $("#vice_presidente_colonia").val( ui.item.nome_pessoa );
                  $("#id_pessoa_vice_presidente").val( ui.item.id_pessoa);

                  return false;
              },
          })
          .autocomplete().data("uiAutocomplete")._renderItem =  function( ul, item ) {
          $("#boxAjaxAutoComplete").hide();
          return $( "<li>" )
              .append( "<a>" + item.nome_pessoa+" "+ item.numero_carteira+"</a>" )
              .appendTo( ul );
      };

      // Dispara o Autocomplete a partir do terceiro caracter
      $( "#secretario_colonia" ).autocomplete({
              minLength: 2,
              source: function( request, response ) {
                  $("#boxAjaxCliente").show();
                  $.ajax({
                      url: '<?php echo base_url('pessoa/ajax');?>',
                      dataType: "json",
                      data: {
                          acao: 'listar',
                          term: $('#secretario_colonia').val()
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
                  $("#secretario_colonia").val( ui.item.nome_pessoa );
                  $("#id_pessoa_secretario").val( ui.item.id_pessoa);

                  return false;
              },
          })
          .autocomplete().data("uiAutocomplete")._renderItem =  function( ul, item ) {
          $("#boxAjaxAutoComplete").hide();
          return $( "<li>" )
              .append( "<a>" + item.nome_pessoa+" "+ item.numero_carteira+"</a>" )
              .appendTo( ul );
      };


      // Dispara o Autocomplete a partir do terceiro caracter
      $( "#segundo_secretario_colonia" ).autocomplete({
              minLength: 2,
              source: function( request, response ) {
                  $("#boxAjaxCliente").show();
                  $.ajax({
                      url: '<?php echo base_url('pessoa/ajax');?>',
                      dataType: "json",
                      data: {
                          acao: 'listar',
                          term: $('#segundo_secretario_colonia').val()
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
                  $("#segundo_secretario_colonia").val( ui.item.nome_pessoa );
                  $("#id_pessoa_segundo_secretario").val( ui.item.id_pessoa);

                  return false;
              },
          })
          .autocomplete().data("uiAutocomplete")._renderItem =  function( ul, item ) {
          $("#boxAjaxAutoComplete").hide();
          return $( "<li>" )
              .append( "<a>" + item.nome_pessoa+" "+ item.numero_carteira+"</a>" )
              .appendTo( ul );
      };

////////////////////////
      $( "#tesoureiro_colonia" ).autocomplete({
              minLength: 2,
              source: function( request, response ) {
                  $("#boxAjaxCliente").show();
                  $.ajax({
                      url: '<?php echo base_url('pessoa/ajax');?>',
                      dataType: "json",
                      data: {
                          acao: 'listar',
                          term: $('#tesoureiro_colonia').val()
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
                  $("#tesoureiro_colonia").val( ui.item.nome_pessoa );
                  $("#id_pessoa_tesoureiro").val( ui.item.id_pessoa);

                  return false;
              },
          })
          .autocomplete().data("uiAutocomplete")._renderItem =  function( ul, item ) {
          $("#boxAjaxAutoComplete").hide();
          return $( "<li>" )
              .append( "<a>" + item.nome_pessoa+" "+ item.numero_carteira+"</a>" )
              .appendTo( ul );
      };


      $( "#segundo_tesoureiro_colonia" ).autocomplete({
              minLength: 2,
              source: function( request, response ) {
                  $("#boxAjaxCliente").show();
                  $.ajax({
                      url: '<?php echo base_url('pessoa/ajax');?>',
                      dataType: "json",
                      data: {
                          acao: 'listar',
                          term: $('#segundo_tesoureiro_colonia').val()
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
                  $("#segundo_tesoureiro_colonia").val( ui.item.nome_pessoa );
                  $("#id_pessoa_segundo_tesoureiro").val( ui.item.id_pessoa);

                  return false;
              },
          })
          .autocomplete().data("uiAutocomplete")._renderItem =  function( ul, item ) {
          $("#boxAjaxAutoComplete").hide();
          return $( "<li>" )
              .append( "<a>" + item.nome_pessoa+" "+ item.numero_carteira+"</a>" )
              .appendTo( ul );
      };


      $( "#presidente_conselho" ).autocomplete({
              minLength: 2,
              source: function( request, response ) {
                  $("#boxAjaxCliente").show();
                  $.ajax({
                      url: '<?php echo base_url('pessoa/ajax');?>',
                      dataType: "json",
                      data: {
                          acao: 'listar',
                          term: $('#presidente_conselho').val()
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
                  $("#presidente_conselho").val( ui.item.nome_pessoa );
                  $("#id_pessoa_presidente_conselho").val( ui.item.id_pessoa);

                  return false;
              },
          })
          .autocomplete().data("uiAutocomplete")._renderItem =  function( ul, item ) {
          $("#boxAjaxAutoComplete").hide();
          return $( "<li>" )
              .append( "<a>" + item.nome_pessoa+" "+ item.numero_carteira+"</a>" )
              .appendTo( ul );
      };



      $( "#vice_presidente_conselho" ).autocomplete({
              minLength: 2,
              source: function( request, response ) {
                  $("#boxAjaxCliente").show();
                  $.ajax({
                      url: '<?php echo base_url('pessoa/ajax');?>',
                      dataType: "json",
                      data: {
                          acao: 'listar',
                          term: $('#vice_presidente_conselho').val()
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
                  $("#vice_presidente_conselho").val( ui.item.nome_pessoa );
                  $("#id_pessoa_vice_presidente_conselho").val( ui.item.id_pessoa);

                  return false;
              },
          })
          .autocomplete().data("uiAutocomplete")._renderItem =  function( ul, item ) {
          $("#boxAjaxAutoComplete").hide();
          return $( "<li>" )
              .append( "<a>" + item.nome_pessoa+" "+ item.numero_carteira+"</a>" )
              .appendTo( ul );
      };



      $( "#suplente1" ).autocomplete({
              minLength: 2,
              source: function( request, response ) {
                  $("#boxAjaxCliente").show();
                  $.ajax({
                      url: '<?php echo base_url('pessoa/ajax');?>',
                      dataType: "json",
                      data: {
                          acao: 'listar',
                          term: $('#suplente1').val()
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
                  $("#suplente1").val( ui.item.nome_pessoa );
                  $("#id_pessoa_suplente1").val( ui.item.id_pessoa);

                  return false;
              },
          })
          .autocomplete().data("uiAutocomplete")._renderItem =  function( ul, item ) {
          $("#boxAjaxAutoComplete").hide();
          return $( "<li>" )
              .append( "<a>" + item.nome_pessoa+" "+ item.numero_carteira+"</a>" )
              .appendTo( ul );
      };





            $( "#suplente2" ).autocomplete({
                    minLength: 2,
                    source: function( request, response ) {
                        $("#boxAjaxCliente").show();
                        $.ajax({
                            url: '<?php echo base_url('pessoa/ajax');?>',
                            dataType: "json",
                            data: {
                                acao: 'listar',
                                term: $('#suplente2').val()
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
                        $("#suplente2").val( ui.item.nome_pessoa );
                        $("#id_pessoa_suplente2").val( ui.item.id_pessoa);

                        return false;
                    },
                })
                .autocomplete().data("uiAutocomplete")._renderItem =  function( ul, item ) {
                $("#boxAjaxAutoComplete").hide();
                return $( "<li>" )
                    .append( "<a>" + item.nome_pessoa+" "+ item.numero_carteira+"</a>" )
                    .appendTo( ul );
            };




                        $( "#suplente3" ).autocomplete({
                                minLength: 2,
                                source: function( request, response ) {
                                    $("#boxAjaxCliente").show();
                                    $.ajax({
                                        url: '<?php echo base_url('pessoa/ajax');?>',
                                        dataType: "json",
                                        data: {
                                            acao: 'listar',
                                            term: $('#suplente3').val()
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
                                    $("#suplente3").val( ui.item.nome_pessoa );
                                    $("#id_pessoa_suplente3").val( ui.item.id_pessoa);

                                    return false;
                                },
                            })
                            .autocomplete().data("uiAutocomplete")._renderItem =  function( ul, item ) {
                            $("#boxAjaxAutoComplete").hide();
                            return $( "<li>" )
                                .append( "<a>" + item.nome_pessoa+" "+ item.numero_carteira+"</a>" )
                                .appendTo( ul );
                        };



                                                $( "#suplente4" ).autocomplete({
                                                        minLength: 2,
                                                        source: function( request, response ) {
                                                            $("#boxAjaxCliente").show();
                                                            $.ajax({
                                                                url: '<?php echo base_url('pessoa/ajax');?>',
                                                                dataType: "json",
                                                                data: {
                                                                    acao: 'listar',
                                                                    term: $('#suplente4').val()
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
                                                            $("#suplente4").val( ui.item.nome_pessoa );
                                                            $("#id_pessoa_suplente4").val( ui.item.id_pessoa);

                                                            return false;
                                                        },
                                                    })
                                                    .autocomplete().data("uiAutocomplete")._renderItem =  function( ul, item ) {
                                                    $("#boxAjaxAutoComplete").hide();
                                                    return $( "<li>" )
                                                        .append( "<a>" + item.nome_pessoa +" "+ item.numero_carteira+"</a>" )
                                                        .appendTo( ul );
                                                };


        function getCidades(idEstado) {
            $("#cidades").html("");
            if(idEstado != '')
            {
                $.ajax('<?php echo /*"http://".$_SERVER['SERVER_NAME']."/ajax/getCidades";*/ base_url("ajax/getCidades");?>', {
                    data: { idEstado: idEstado },
                    dataType: "json",
                    success: function(data){
                        $("#cidades").html('<option value="">SELECIONE A CIDADE</option>');

                        $.each(data, function(i, item) {
                            $("#cidades").append('<option value="'+item.id_cidade+'" >'+item.nome_cidade+'</option>');
                        });

                    },
                    error: function(){
                        console.log('Erro ao buscar cidades.');
                    }
                });
            }

        }
        $("#id_estado").change(function(){
            getCidades($(this).val());
        });
        getCidades($("#id_estado").val());

        $(".cep").mask("99999-999");
        $(".data").mask("99/99/9999");
        $("#cpf_cnpj").mask("99.999.999/9999-99");
        $(".cpf_cnpj_tipo").click(function(e){
        $(".telefone_colonia").mask("(99)99999-9999");








        });

        // Aciona a validação a cada tecla pressionada

        $('#cpf_cnpj').blur(function(){

            // O CPF ou CNPJ
            var cpf_cnpj = $(this).val();

            // Testa a validação
            if ( valida_cpf_cnpj( cpf_cnpj ) ) {
                //alertaVModal('OK',"acerto");
            } else {
                alertaVModal('CNPJ inválido!','erro');
                $(this).val("");
            }

        });

        $('#spinner1').spinner({value:1, min: 1});


        $('#frmFoto').ajaxForm({
            success : function(data) {
                if (data != 'false') {
                    $(".foto-avatar").css("background","url('<?php echo base_url();?>"+data+"') no-repeat center","background-size","150%","border","solid 3px #c2c2c2");
                    $(".foto-avatar").css("border","solid 5px #c2c2c2");
                    $(".foto-avatar").css("background-size","150%");
                    $("input[name='foto']").val("");
                    var data = data.replace("	","");
                    $("input[name='foto']").val(data);
                    $('.load').hide();
                    $(".conteudo-modal,.escurece-tela").show();
                    $("#titulo").html("Sucesso");
                    $("#msg").html("Upload feito com sucesso !");

                } else {
                    $(".escurece-tela,.escurece-tela").show();
                    $("#titulo").html("Ops");
                    $("#msg").html("Ocorreu um erro ao realizar o upload da foto!");
                }
            }
        });

        $("#formCadastro").submit(function(e){
            $("input[type=submit]").attr('disabled','disabled');
            e.preventDefault();
            $('#loader-wrapper').show();
            var dadosForm = $(this).serialize();
            //Envia Dados via Ajax
            $.ajax({type:'POST',
                dataType: "json",url:'<?php echo base_url("colonia/salvar");?>', data: dadosForm, success: function(response) {
                    if('erro' == response.classe) {
                        $('#loader-wrapper').fadeOut(500);
                        alertaVModal(response.msg, response.classe);
                        return false;
                    }
                    else if('acerto' == response.classe)
                    {
                        var url = "'"+response.url+"'";
                        $('#loader-wrapper').fadeOut(500);


                        confirmContinuoNaoModal(response.msg + "<br/><b>Deseja cadastrar um Novo?</b><br/>", url);

                    }

                    return false;
                }});
        });
    });

</script>
