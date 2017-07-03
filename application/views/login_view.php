<?php
session_start();
?>
<!DOCTYPE html>
<html lang-"pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="UniAdv, Advogado, Correspondente">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Colônia - PAINEL</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('tema/flatlab/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('tema/flatlab/css/bootstrap-reset.css'); ?>" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url('tema/flatlab/assets/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('tema/flatlab/css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('tema/flatlab/css/style-responsive.css'); ?>" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url('tema/flatlab/js/html5shiv.js'); ?>"></script>
    <script src="<?php echo base_url('tema/flatlab/js/respond.min.js'); ?>"></script>
    <![endif]-->

<!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('tema/flatlab/js/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('tema/flatlab/js/bootstrap.js'); ?>"></script>

    <!-- JS PERSONALIZADOS -->

    <script src="<?php echo base_url('tema/flatlab/js/geral.js'); ?>"></script>

    <!--
<script type="text/javascript" src="<?php echo base_url('tema/flatlab/js/jquery-ui.js'); ?>"></script>


-->


    <script src="<?php echo base_url("js/jquery.mask.min.js");?>"></script>

    <script type="text/javascript">
        // Wait for window load
        $(window).load(function () {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");
        });


        $(document).ready(function () {

            $(document).ajaxStart(function () {
                $(".se-preajax-con").show();
            });
            $(document).ajaxStop(function () {
                $(".se-preajax-con").fadeOut(500);
            });

            $(".telefone").mask("(00) 0000-00009");
            $(".cpf").mask("999.999.999-99");
            //$(".hora").mask("99:99:99");

        });

    </script>
    <script>
        $(document).ready(function() {


            //GERANDO CÓDIGO CAPTCHA LOGIN
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: '<?php echo base_url("login/geraNumero");?>',
                success: function (numero) {
                    var url = '<?php echo base_url('login/captcha'); ?>/'+numero;
                    $("#imgCodigo").attr('src',url);
                    $("#imgCodigo").attr('numeroGerado',numero);
                }
            });

            //GERANDO CÓDIGO CAPTCHA ESQUECEU A SENHA
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: '<?php echo base_url("login/geraNumero");?>',
                success: function (numero) {
                    var url = '<?php echo base_url('login/captcha'); ?>/'+numero;
                    $("#imgCodigoEsqueceuSenha").attr('src',url);
                    $("#imgCodigoEsqueceuSenha").attr('numeroGerado',numero);
                }
            });

        });
    </script>
    <![endif]-->
</head>



<body class="login-body">
<div class="se-pre-con"><span>...Carregando</span></div>
<div class="se-preajax-con" style="display:none;"><span>...Carregando</span></div>

<div class="container">
    <form class="form-signin" id="formLogin" name="contactform" method="post" onsubmit="return submitForm();">
        <h2 class="form-signin-heading" ><!--<img src="<?php echo base_url("tema/flatlab/img/logo.png");?>" style="width:150px;" />-->Colônia</h2>
        <div class="login-wrap">
            <div class="row">
                <div class="col-md-12">
                    <input type="email" class="form-control" required placeholder="Login" autofocus name="usuario" value="<?php if(!empty($usuario)) echo $usuario;?>">

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="password" class="form-control" placeholder="Senha" name="senha" required value="<?php if(!empty($senha)) echo $senha;?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>Digite o conteúdo da imagem:</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="captcha" id="captcha" required />
                    </div>
                    <div class="col-md-6">
                        <a href="<?php echo base_url('login');?>"><img src="" id="imgCodigo" style="width:80px" /></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label class="checkbox">
                        <input type="checkbox" value="1" name="lembrar-me" <?php if(!empty($lembrarMe )) echo 'checked';?>> Lembrar-me
                    <span class="pull-right">
                        <a data-toggle="modal" href="#myModal"> Esqueceu a Senha?</a>
                    </span>
                    </label>
                </div>
            </div>
            <button class="btn btn-lg btn-login btn-block" style="" type="submit">Logar</button>
		<p><font color="#000000">Idealizador do Sistema: <b>Jal da Colônia Z-06 – Marechal Deodoro - Alagoas</b> – 82 - 98723-6346.</font></p>
		<p><font color="#000000">Suporte Técnico: Leandro – 82 – 99646-8999 (whatsapp)</font></p>
            <!-- <div class="registration">
                Não tem uma conta ainda?
                <a class="" id="criarConta" href="">
                    <b>Crie uma conta</b>
                </a>
            </div> -->


        </div>
</form>
    <form class="form-signin" id="formLoginRecuperarSenha" name="contactform" method="post" onsubmit="return submitFormRecuperarSenha();">
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog"  tabindex="-1" id="myModal" class="modal fade" data-backdrop="static" >
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Esqueceu a Senha ?</h4>
                    </div>
                    <div class="modal-body">
                        <p>Infome o Email para recuperar sua senha.</p>
                        <input type="email" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix" required>
                        <label>Digite o conteúdo da imagem:</label>
                        <input type="text" name="captcha" id="captchaEsqueceuSenha" required />
                        <a href="<?php echo base_url('login');?>"><img src="" id="imgCodigoEsqueceuSenha" /></a>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                        <button class="btn btn-success" type="submit">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->
    </form>

</div>

<div class="modal fade" id="myModalFormCadastroUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false"
     style="display: none;">
    <div class="modal-dialog" style="width:400px;">
        <div class="modal-content">
            <form action="" id="formAddNovoUsuario">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Nova Conta</h4></div>
                <input type="hidden" name="administrador_escritorio" value="1" />
                <div class="modal-body" style="padding-bottom:4px;">
                    <div class="col-lg-14">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Nome Completo*:</label>
                                    <input type="text" required="" name="nome_usuario" class="form-control "value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">CPF*:</label>
                                    <input type="text" required="" name="cpf_usuario" class="form-control cpf" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Telefone/Celular*:</label>
                                    <input type="text" required="" name="telefone_usuario" class="form-control telefone" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Email*:</label>
                                    <input type="email" required="" name="email" id="" class="form-control camposNovoUsuario" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="margin-top:0px;">
                    <b style="margin-right:10px;">* 30 dias de avaliação gratuita. </b>
                    <input type="submit" value="Criar" class="btn btn-success"/>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">


    $(document).ready(function () {


        $("#formAddNovoUsuario").submit(function (e) {
            e.preventDefault();
            $('#loader-wrapper').show();
            var dadosForm = $(this).serialize();
            //Envia Dados via Ajax
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: '<?php echo base_url("login/nova_conta");?>',
                data: dadosForm,
                success: function (response) {
                    if ('erro' == response.classe) {
                        $('#loader-wrapper').fadeOut(500);
                        alertaVModal(response.msg, response.classe);
                        return false;
                    }
                    else if ('acerto' == response.classe) {
                        $('#loader-wrapper').fadeOut(500);
                        $("#myModalFormCadastroUsuario").hide();
                        alertaVModal(response.msg, response.classe);
                    }

                    return false;
                }
            });
        });

        $("#criarConta").click(function (e) {
            e.preventDefault();
            $(".camposNovoUsuario").val("");
            $("#myModalFormCadastroUsuario").modal({backdrop: 'static', keyboard: false});
        });
    });

    function submitFormRecuperarSenha(e) {

        //$('#loader-wrapper').show();
        var captcha_original = $("#imgCodigoEsqueceuSenha").attr('numeroGerado');
        var captcha_informado = $("#captchaEsqueceuSenha").val();

        if(captcha_original == captcha_informado) {
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: '<?php echo base_url("login/valida_recuperar_senha");?>',
                data: $('#formLoginRecuperarSenha').serialize(),
                success: function (response) {
                    if ('erro' == response.classe) {
                        //$('#loader-wrapper').fadeOut(500);
                        alertaVModal(response.msg, "erro");
                        $("#email").val("");
                        return false;

                    }
                    else if ('acerto' == response.classe) {
                        // $('#loader-wrapper').fadeOut(500);
                        alertaVModal(response.msg, "acerto", response.url);
                    }
                    //$('.submit').html('sent');
                    //$('.success').html('Your message was sent successfully');
                    //document.contactform.reset();
                }
            });
            return false;
        }else{
            alertaVModal("Conteúdo da Imagem Inválido", "erro", '<?php echo base_url("login");?>');
            return false;
        }
    }




    function submitForm(e) {

       // $('#loader-wrapper').show();
        var captcha_original = $("#imgCodigo").attr('numeroGerado');
        var captcha_informado = $("#captcha").val();
            if(captcha_original == captcha_informado) {
                $.ajax({
                    type: 'POST',
                    dataType: "json",
                    url: '<?php echo base_url("login/entrar");?>',
                    data: $('#formLogin').serialize(),
                    success: function (response) {
                        if ('erro' == response.classe) {
                           // $('#loader-wrapper').fadeOut(500);
                            alertaVModal(response.msg, "erro");
                            $("#email").val("");
                            $("#senha").val("");
                            return false;

                        }
                        else if ('acerto' == response.classe) {
                            //$('#loader-wrapper').fadeOut(500);

                            window.location.href = response.url;
                            //EXIBE MENSAGEM DE LOGADO COM SUCESSO alertaVModal(response.msg, "acerto", response.url);

                        }
                        //$('.submit').html('sent');
                        //$('.success').html('Your message was sent successfully');
                        //document.contactform.reset();
                    }
                });
                return false;
            }else{
               alertaVModal("Conteúdo da Imagem Inválido", "erro", '<?php echo base_url("login");?>');
                return false;
            }
    }
</script>
</body>
</html>
