<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <aside class="profile-nav col-lg-3">
            <section class="panel">
                <div class="user-heading round">
                    <a href="#">
                        <img src="<?php if(!empty($dadosRevenda['foto_revenda'])) echo base_url($dadosRevenda['foto_revenda']);else echo base_url('images/logo/user.jpg'); ;?>" alt="">
                    </a>
                    <h1><?php echo $dadosRevenda['nome_revenda'];?></h1>
                    <p><?php echo $dadosRevenda['email'];?></p>
                </div>

            </section>
        </aside>
        <aside class="profile-info col-lg-9">
            <section>
                <div class="panel panel-primary">
                    <div class="panel-heading"> Alterar Foto</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="<?php echo base_url("painel/upload_foto");?>" id="formFoto" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Foto</label>
                                <div class="col-lg-6">
                                    <input type="file" id="uploadfoto" required name="uploadfoto" class="file-pos" id="exampleInputFile">
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

    <!-- page end-->
</section>



<!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url("site/js/jquery.js");?>"></script>
<script src="<?php echo base_url("site/js/jquery-1.8.3.min.js");?>"></script>
<script src="<?php echo base_url("site/js/bootstrap.min.js");?>"></script>
<script class="include" type="text/javascript" src="<?php echo base_url("site/js/jquery.dcjqaccordion.2.7.js");?>"></script>
<script src="<?php echo base_url("site/js/jquery.scrollTo.min.js");?>"></script>
<script src="<?php echo base_url("site/js/jquery.nicescroll.js");?>" type="text/javascript"></script>
<script src="<?php echo base_url("site/js/jquery.sparkline.js");?>" type="text/javascript"></script>
<script src="<?php echo base_url("site/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js");?>"></script>
<script src="<?php echo base_url("site/js/owl.carousel.js");?>" ></script>
<script src="<?php echo base_url("site/js/jquery.customSelect.min.js");?>" ></script>
<script src="<?php echo base_url("site/js/respond.min.js");?>" ></script>


<!--common script for all pages -->
<script src="<?php echo base_url("site/js/common-scripts.js");?>"></script>


<script>

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
                    dataType: "json",url:'<?php echo base_url("painel/alterar_senha");?>', data: dadosForm, success: function(response) {
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



        $("#formsFoto").submit(function(e){

            var foto = $("#uploadfoto").val();

            if('' == foto){
                e.preventDefault();
                alertaVModal("Por favor, selecione a Foto!", "erro", null);
            }else{
                e.preventDefault();
                $('#loader-wrapper').show();
                //Envia Dados via Ajax
                $.ajax({type:'POST',
                    dataType: "json",url:'<?php echo base_url("index.php/painel/upload_foto");?>/', success: function(response) {
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


    });


</script>
