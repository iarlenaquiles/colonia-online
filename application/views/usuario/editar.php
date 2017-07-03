<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Editar Usuário</header>

                <div class="panel-body">

                  <div style="display:none">
                      <form id="frmFoto" method="post" action="<?php echo base_url("usuario/upload_foto"); ?>" enctype="multipart/form-data">
                          <input id="uploadfoto" name="uploadfoto" type="file" onchange="$('.foto-avatar').prepend('<div class=\'load\'></div>');$('#frmFoto').submit()" />
                      </form>
                  </div>
                    <form id="formCadastro" class="formProcesso">

<fieldset>
  <legend>Dados</legend>
  <input type="hidden" name="id" value="<?php echo $registro['id']; ?>" />
                        <div class="row">
                          <div class="col-lg-2">

<?php if(empty($registro['foto'])) {
  ?>
  <div class="form-group">
      <div class="foto-avatar arredonda-100 " onclick="$('#uploadfoto').trigger('click')"
           style="position: absolute;margin: 0px 20px 0px 20px;background-size: auto 100%; background-position: center center;">

          <input type='hidden' name='foto' value="" id="avatar_cadastros" >
      </div>
  </div>
  <?php
}else{
  ?>
                              <div class="form-group">
  <div style="position: absolute; margin: 0px 20px; background: transparent url(<?php echo base_url($registro['foto']);?>) no-repeat scroll center center / 150% auto; border: 5px solid rgb(194, 194, 194);"  class="foto-avatar arredonda-100 " title="Trocar Foto" >
      <input type="hidden" id="avatar_cadastros" value="<?php echo $registro['foto'];?>" name="foto">
      <div class="btn-info" style="text-align:center;margin-top:95px" onclick="$('#uploadfoto').trigger('click')">Trocar Foto</div>
  </div>

                              </div>
  <?php
}
?>


                              </div>

                              <div class="col-lg-4">
                                  <div class="form-group">
                                      <label for="">Nome Usuário*:</label>
                                      <input type="text" required="" name="nome_usuario" value="<?php echo $registro['nome_usuario']; ?>"class="form-control "value="">
                                  </div>
                              </div>
                              <div class="col-lg-4">
                                  <div class="form-group">
                                      <label for="">Login*:</label>
                                      <input type="email" required="" name="usuario" id="" value="<?php echo $registro['usuario']; ?>" class="form-control camposNovoUsuario" value="">
                                  </div>
                              </div>


                        </div>
                        <div class="row">
                          <div class="col-lg-2">
                              <div class="form-group">

                              </div>
                          </div>
                          <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'eUsuarios')){ ?>
                          <div class="col-lg-4">
                              <div class="form-group">
                                  <label for="">Permissão*:</label>
                                  <input type='hidden' name="permissao_id" value="<?php echo $registro['permissoes_id']?>" id="permissao_id" required>
                                  <select class="form-control m-bot15" name="permissao_id" >
                                      <option value="">SELECIONE PERMISSÃO</option>
                                      <?php
                                          foreach ($permissoes as $permissao) {
                                          ?>
                                          <option value="<?php echo $permissao['idPermissao'];?>" <?php if(!empty($registro['permissoes_id']) && $permissao['idPermissao'] == $registro['permissoes_id']) echo "selected"; ?>><?php echo $permissao['nome'];?></option>
                                          <?php } ?>
                                  </select>
                              </div>
                          </div>
                          <?php }else{ ?>
                              <input type='hidden' name="permissao_id" value="<?php echo $registro['permissoes_id']?>" id="permissao_id" required>
                            <?
                          } ?>
                            <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'eUsuarios')){ ?>
                          <div class="col-lg-4">
                              <div class="form-group">
                                  <label for="">Colônia*:</label>
                                  <input type='hidden' name="colonia_id" value="<?php echo $registro['colonia_id']?>" id="colonia_id" required>
                                  <select class="form-control m-bot15" name="colonia_id" >
                                      <option value="">SELECIONE COLÔNIA</option>
                                      <?php
                                      foreach($colonias as $colonia){
                                          ?>
                                          <option value="<?php echo $colonia['id_colonia'];?>" <?php if(!empty($registro['colonia_id']) && $colonia['id_colonia'] == $registro['colonia_id']) echo "selected"; ?>><?php echo $colonia['nome_colonia'];?></option>
                                          <?php
                                      }
                                      ?>
                                  </select>
                              </div>
                          </div>
                            <?php }else{ ?>

                              <input type='hidden' name="colonia_id" value="<?php echo $registro['colonia_id']?>" id="colonia_id" required>
                            <? } ?>
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
                dataType: "json",url:'<?php echo base_url("usuario/atualizar");?>', data: dadosForm, success: function(response) {
                    if('erro' == response.classe) {
                        $('#loader-wrapper').fadeOut(500);
                        alertaVModal(response.msg, response.classe);
                        return false;
                    }
                    else if('acerto' == response.classe)
                    {
                        var url = "'"+response.url+"'";
                        $('#loader-wrapper').fadeOut(500);
                        alertaVModal(response.msg, response.classe, response.url);
                        //confirmContinuoNaoModal(response.msg+"<br/><b>Deseja cadastrar um Novo?</b><br/>", url)
                    }

                    return false;
                }});
        });
    });

</script>
