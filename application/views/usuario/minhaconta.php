
<section class="wrapper site-min-height">
    <!-- page start-->
    <section class="panel">
        <header class="panel-heading">
            Minha conta
        </header>
        <div class="panel-body">
          <div style="display:none">
              <form id="frmFoto" method="post" action="<?php echo base_url("pessoa/upload_foto"); ?>" enctype="multipart/form-data">
                  <input id="uploadfoto" name="uploadfoto" type="file" onchange="$('.foto-avatar').prepend('<div class=\'load\'></div>');$('#frmFoto').submit()" />
                    <input type="hidden" name="id" value="<?php echo $minhaconta['id'];?>" />
              </form>
          </div>
          <aside class="profile-nav col-lg-3">
              <section class="panel">
                  <div class="user-heading round">
                      <a href="#">
                          <img src="<?php if(!empty($minhaconta['foto'])) echo base_url($minhaconta['foto']);else echo base_url('images/logo/user.jpg'); ;?>" alt="">
                      </a>
                      <h1><?php echo $minhaconta['nome_usuario'];?></h1>
                      <p><?php echo $minhaconta['usuario'];?></p>


                  </div><br><br>
                    <a href="<?php echo base_url('usuario/editar')."/".$minhaconta['id'];?> " style="float:left;margin-left:4px;" title="Visualizar/Editar" class="btn btn-primary btn-sm"><i class="fa fa-pencil">Editar meus dados</i></a>
              </section>
          </aside>
          <aside class="profile-info col-lg-9">
              <section>

                  <div class="panel panel-primary">
                      <div class="panel-heading"> Alterar Senha</div>
                      <div class="panel-body">
                          <form class="form-horizontal" role="form" id="formSenha" method="POST">
                              <div class="form-group">
                                  <label  class="col-lg-2 control-label">Senha Atual</label>
                                  <div class="col-lg-6">
                                      <input type="password" name="senha_atual" class="form-control" id="c-pwd" placeholder=" " required>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label  class="col-lg-2 control-label">Nova Senha</label>
                                  <div class="col-lg-6">
                                      <input type="password" id="NovaSenha" name="nova_senha" class="form-control" id="n-pwd" placeholder=" " required>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label  class="col-lg-2 control-label">Confirme a Nova Senha</label>
                                  <div class="col-lg-6">
                                      <input type="password" id="confirmacaoNovaSenha" name="confirmacao_nova_senha" class="form-control" id="rt-pwd" placeholder=" " required>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-10">
                                      <button type="submit" class="btn btn-info">Alterar</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </section>
          </aside>
        </div>
    </section>
    <!-- page end-->
</section>
<script src="<?php echo base_url("tema/flatlab/js/bootstrap.min.js"); ?>"></script>
<script class="include" type="text/javascript"
        src="<?php echo base_url("tema/flatlab/js/jquery.dcjqaccordion.2.7.js"); ?>"></script>
<script src="<?php echo base_url("tema/flatlab/js/jquery.scrollTo.min.js"); ?>"></script>
<script src="<?php echo base_url("tema/flatlab/js/jquery.nicescroll.js"); ?>" type="text/javascript"></script>
<script src="<?php echo base_url("tema/flatlab/js/respond.min.js"); ?>"></script>
<script type="text/javascript" language="javascript"
        src="<?php echo base_url("tema/flatlab/assets/advanced-datatable/media/js/jquery.dataTables.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/data-tables/DT_bootstrap.js"); ?>"></script>
<!--common script for all pages-->
<script src="<?php echo base_url("tema/flatlab/js/common-scripts.js"); ?>"></script>

<!--custom switch-->
<script src="<?php echo base_url("tema/flatlab/js/bootstrap-switch.js"); ?>"></script>
<script type="text/javascript">

    //owl carousel

    $(document).ready(function() {


        $("#formSenha").submit(function(e){

            var novaSenha = $("#NovaSenha").val();
            var confirmacaoNovaSenha = $("#confirmacaoNovaSenha").val();

            if(novaSenha != confirmacaoNovaSenha){
                e.preventDefault();
                alertaVModal("A confirmação da nova Senha não confere!", "erro", null);
                $("#NovaSenha").val("");
                $("#confirmacaoNovaSenha").val("");
            }else{
                e.preventDefault();
                $('#loader-wrapper').show();
                var dadosForm = $(this).serialize();
                //Envia Dados via Ajax
                $.ajax({type:'POST',
                    dataType: "json",url:'<?php echo base_url("usuario/alterar_senha");?>', data: dadosForm, success: function(response) {
                        if('erro' == response.classe) {
                            $('#loader-wrapper').fadeOut(500);
                            alertaVModal(response.msg, response.classe);
                            return false;
                        }
                        else if('acerto' == response.classe)
                        {
                            $('#loader-wrapper').fadeOut(500);
                            alertaVModal(response.msg, response.classe, response.url);
                        }

                        return false;
                    }});

            }
        });



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
