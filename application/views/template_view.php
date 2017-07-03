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
  <!-- <meta http-equiv="refresh" content="600"> -->
  <link rel="shortcut icon" href="<?php echo base_url("tema/flatlab/img/favicon.png"); ?>">
  <title>Colônia - PAINEL</title>
  <!-- Custom styles for this template
  <link href="<?php echo base_url("tema/flatlab/css/style.min.css"); ?>" rel="stylesheet"> -->
  <!-- ANTIGOO <link href="<?php echo base_url("tema/flatlab/css/style.min.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url("tema/flatlab/css/style-responsive.css"); ?>" rel="stylesheet"/> -->

  <link href="<?php echo base_url("tema/flatlab/css/style.css"); ?>" rel="stylesheet">
  <!--<link href="<?php echo base_url("tema/flatlab/css/style.min.css"); ?>" rel="stylesheet">-->
  <link href="<?php echo base_url("tema/flatlab/css/style-responsive.css"); ?>" rel="stylesheet"/>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url("tema/flatlab/css/bootstrap.min.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url("tema/flatlab/css/bootstrap-reset.css"); ?>" rel="stylesheet">


  <!--external css-->
  <link href="<?php echo base_url("tema/flatlab/assets/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet"/>
  <link href="<?php echo base_url("tema/flatlab/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css"); ?>" rel="stylesheet"
  type="text/css" media="screen"/>
  <link rel="stylesheet" href="<?php echo base_url("tema/flatlab/css/owl.carousel.css"); ?>" type="text/css">


  <link rel="stylesheet" type="text/css"
  href="<?php echo base_url("tema/flatlab/assets/bootstrap-datepicker/css/datepicker.css"); ?>"/>
  <link rel="stylesheet" type="text/css"
  href="<?php echo base_url("tema/flatlab/assets/bootstrap-colorpicker/css/colorpicker.css"); ?>"/>
  <link rel="stylesheet" type="text/css"
  href="<?php echo base_url("tema/flatlab/assets/bootstrap-daterangepicker/daterangepicker.css"); ?>"/>

  <link href="<?php echo base_url("tema/flatlab/assets/advanced-datatable/media/css/demo_page.css"); ?>" rel="stylesheet"/>
  <link href="<?php echo base_url("tema/flatlab/assets/advanced-datatable/media/css/demo_table.css"); ?>" rel="stylesheet"/>
  <link rel="stylesheet" href="<?php echo base_url("tema/flatlab/assets/data-tables/DT_bootstrap.css"); ?>"/>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('tema/flatlab/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css'); ?>"/>



  <!-- Custom styles for this template-->
  <link href="<?php echo base_url("css/jquery.mCustomScrollbar.min.css"); ?>" rel="stylesheet"/>


  <link href="<?php echo base_url("tema/flatlab/css/custom.css"); ?>" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
  <!--[if lt IE 9]>
  <script src="<?php echo base_url("tema/js/html5shiv.js");?>" type="text/javascript"></script>
  <script src="<?php echo base_url("tema/js/respond.min.js");?>" type="text/javascript"></script>
  <![endif]-->

  <!-- <script src="<?php echo base_url("tema/flatlab/js/jquery.js"); ?>"></script> -->
  <script src="<?php echo base_url("tema/flatlab/js/jquery.min.js"); ?>"></script>

  <!-- JS PERSONALIZADOS -->
  <script src="<?php echo base_url('tema/flatlab/js/geral.js'); ?>"></script>

  <!--
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>-->
  <script src="<?php echo base_url('tema/flatlab/js/modernizr.js'); ?>"></script>

  <script src="<?php echo base_url("tema/flatlab/js/jquery-ui-1.9.2.custom.min.js"); ?>"></script>
  <script src="<?php echo base_url("js/jquery.mCustomScrollbar.concat.min.js"); ?>"></script>


  <!-- AUTOCOMPLETE --><!--
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("css/autocomplete.css"); ?>">-->
  <style type="text/css">
  .ui-helper-hidden-accessible{
    display:none;
  }
  /* http://docs.jquery.com/UI/Autocomplete#theming*/
  .ui-autocomplete { position: absolute; cursor: default; background:#CCC }

  /* workarounds */
  html .ui-autocomplete { width:1px;padding-right:0px; } /* without this, the menu expands to 100% in IE6 */
  .ui-menu {
    list-style:none;
    padding: 2px;
    margin: 0;
    display:block;
    float: left;
  }
  .ui-menu .ui-menu {
    margin-top: -3px;
  }
  .ui-menu .ui-menu-item {
    margin:0;
    padding: 0;
    zoom: 1;
    float: left;
    clear: left;
    width: 100%;
  }
  .ui-menu .ui-menu-item a {
    text-decoration:none;
    display:block;
    padding:.2em .4em;
    line-height:1.5;
    zoom:1;
    background: #fff;
  }
  .ui-menu .ui-menu-item a.ui-state-hover,
  .ui-menu .ui-menu-item a.ui-state-active {
    font-weight: normal;
    margin: -1px;
    background:#ccc;
  }
  .ui-menu .ui-menu-item a:hover{
    background:#ccc;
  }
  </style>
  <script type="text/javascript">
  // Wait for window load
  $(window).load(function () {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");
  });

  (function ($) {
    $(window).load(function () {
      $(".scrolltable").mCustomScrollbar();
    });
  })(jQuery);

  $(document).ready(function () {

    $(document).ajaxStart(function () {
      $(".se-preajax-con").show();
    });
    $(document).ajaxStop(function () {
      $(".se-preajax-con").hide();
    });

    // $(".telefone").mask("(00) 0000-00009");
    //$(".cpf").mask("999.999.999-99");
    //$(".hora").mask("99:99:99");

  });

  </script>
  <style type="text/css">
  .foto-avatar {
    position: relative;
    width: 124px;
    height: 124px;
    background-image: url(<?php echo base_url("images/selecione-sua-foto.png")?>);
    background-repeat: no-repeat;
    margin-top: 4px;
    cursor: pointer;
  }
  .foto-avatar > .load {
    position: absolute;
    width: 40px;
    height: 40px;
    background: url(<?php echo base_url("images/load.gif")?>) no-repeat center center;
    background-size: 100% 100%;
    z-index: 2;
    left: 50%;
    margin-left: -20px;
    top: 50%;
    margin-top: -20px;
  }
  </style>
</head>

<body>
  <div class="se-pre-con"><span>...Carregando</span></div>
  <div class="se-preajax-con" style="display:none;"><span>...Carregando</span></div>
  <?php
  if (!empty($mensagens_news)) {
    //Percorre as mensagens
    foreach ($mensagens_news as $mensagem) {
      ?>
      <div class="modal fade" id="myModalMsg<?php echo $mensagem['id_mensagem'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
        <div class="modal-dialog" style="width:600px;">
          <div class="modal-content">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button"
              onclick="window.location.reload();">×
            </button>
            <h4 class="modal-title"><?php echo $mensagem['nome_revenda_remetente'] ?> -
              ASSUNTO: <?php echo $mensagem['assunto_mensagem'] ?></h4></div>
              <div class="modal-body">
                <div class="col-lg-14">
                  <div class="row" style="word-wrap: break-word;">
                    <?php echo $mensagem['mensagem'] ?>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <input type="submit" value="Fechar" onclick="window.location.reload();" class="btn btn-danger"/>
              </div>
            </div>
          </div>
        </div>
        <?php

      }
    }


    if (!empty($faturas_news)) {
      foreach ($faturas_news as $registro) {
        ?>
        <div class="modal fade" id="myModalFatura<?php echo $registro['id_revenda_fatura']; ?>" tabindex="-1"
          role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
          <div class="modal-dialog" style="width:760px;">
            <div class="modal-content">
              <form action="">
                <input type="hidden" name="id_revenda_fatura" id="id_revenda"
                value="<?php echo $registro['id_revenda_fatura']; ?>"/>
                <input type="hidden" name="id_revenda" id="id_revenda"
                value="<?php echo $registro['id_revenda']; ?>"/>
                <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button"
                  onclick="window.location.reload();">×
                </button>
                <h4 class="modal-title">Visualizar Fatura
                  N°: <?php echo $registro['id_revenda_fatura']; ?></h4></div>
                  <div class="modal-body">
                    <div class="col-lg-14">
                      <div class="row">
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label for="">Data Vencimento:</label>
                            <input type="text" required="" name="data_vencimento" class="form-control"
                            readonly value="<?php echo $registro['data_vencimento']; ?>">
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label for="">Logins Ativos:</label>
                            <input type="text" required="" id="" name="logins_ativos"
                            class="form-control"
                            value="<?php echo $registro['logins_ativos']; ?>" readonly>
                          </div>
                        </div>
                        <div style="" class="col-lg-3">
                          <div class="form-group">
                            <label for="">Valor por Login:</label>

                            <input type="text" readonly required=""
                            value="<?php echo $this->funcoes->formataMoedaFloat($registro['valor_login'] / 100); ?>"
                            size="16" name="valor_revenda"
                            class="form-control form-control-inline input-medium moeda">
                          </div>
                        </div>
                        <div style="" class="col-lg-3">
                          <div class="form-group">
                            <label for="">Valor Total Fatura:</label>

                            <input type="text" readonly required=""
                            value="<?php echo $this->funcoes->formataMoedaFloat(($registro['logins_ativos'] * $registro['valor_login']) / 100); ?>"
                            size="16" name="valor_total_fatura"
                            class="form-control form-control-inline input-medium moeda">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div style="" class="col-lg-3">
                          <div class="form-group">
                            <label for="">Situação:</label>
                            <select class="form-control m-bot15" name="situacao_pagamento" required>
                              <option
                              value="Aberto" <?php if (!empty($registro['situacao_pagamento']) && 'Aberto' == $registro['situacao_pagamento']) echo 'selected="selected"'; ?>>
                              Aberto
                            </option>
                            <option
                            value="Cancelado" <?php if (!empty($registro['situacao_pagamento']) && 'Cancelado' == $registro['situacao_pagamento']) echo 'selected="selected"'; ?>>
                            Cancelado
                          </option>
                          <option
                          value="Pago" <?php if (!empty($registro['situacao_pagamento']) && 'Pago' == $registro['situacao_pagamento']) echo 'selected="selected"'; ?>>
                          Pago
                        </option>
                      </select>

                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-12"><label for="">Observação:</label>
                      <textarea class="wysihtml5 form-control" name="observacao" required
                      rows="5"><?php if (!empty($registro['observacao'])) echo $registro['observacao']; ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" id="botaoAcao" value="Fechar" onclick="window.location.reload();"
              class="btn btn-danger"/>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php
  }
}
?>
<section id="container">
  <!--header start-->
  <header class="header white-bg">
    <div class="sidebar-toggle-box">
      <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <!--logo start-->
    <!--<a href="index.html" class="logo">Flat<span>lab</span></a>-->

    <!-- Logo do sistema aqui -->
    <a href="<?php echo base_url("painel"); ?>" style="margin-top:10px;" class="logo"><img
      src="<?php echo base_url("tema/flatlab/img/logooooo.png"); ?>" style="width:150px;"/></a>
      <!--logo end-->

      <script type="text/javascript">
      $(document).ready(function () {

        $(".visualizarFatura").click(function (e) {
          e.preventDefault();
          var nomeModalV = "#myModalFatura" + $(this).attr('codigoRegistro');

          $(nomeModalV + " textarea").attr("disabled", "disabled");
          $(nomeModalV + " select").attr("disabled", "disabled");
          $(nomeModalV).modal({backdrop: 'static', keyboard: false});
        });

        $(".visualizarMsgTopo").click(function (e) {
          e.preventDefault();
          var nomeModal = "#myModalMsg" + $(this).attr('codigoRegistro');
          var id = $(this).attr('codigoRegistro');
          var idRevendaLogada = <?php echo $this->session->userdata("id_usuario");?>;
          var idRevendaDestinatario = $(this).attr('idRevendaDestinatario');
          var dataVisualizacao = $(this).attr('dataVisualizacao');

          if (('' == dataVisualizacao || '0000-00-00 00:00:00' == dataVisualizacao ) && (idRevendaLogada == idRevendaDestinatario)) {
            //Envia Dados via Ajax
            $.ajax({
              type: 'POST',
              dataType: "json",
              url: '<?php echo base_url("mensagem/marcar_visualizada");?>/' + id,
              success: function (response) {
                return true;
              }
            });
          }
          $(nomeModal).modal({backdrop: 'static', keyboard: false});
        });
      });
      </script>
      <div class="nav notify-row" id="top_menu">
      <!--  notification start -->
      <ul class="nav top-menu">
      <!-- settings start -->
      <!--
      <li class="dropdown">
      <a data-toggle="dropdown" class="dropdown-toggle" href="#" title="Faturas Abertas">
      <i class="fa fa-tasks"></i>
      <?php if (!empty($faturas_news)) { ?><span
        class="badge bg-success"><?php echo count($faturas_news); ?></span><?php } ?>
        </span>
        </a>

        <?php if (!empty($faturas_news)) { ?>
          <ul class="dropdown-menu extended tasks-bar">
          <div class="notify-arrow notify-arrow-green"></div>
          <li>
          <p class="green">Você tem <?php echo count($faturas_news); ?> faturas(s) aberta(s)</p>
          </li>
          <?php
          foreach ($faturas_news as $registro) {
            ?>

            <li>
            <a href="" title="Visualizar Fatura" class="visualizarFatura"
            codigoRegistro="<?php echo $registro['id_revenda_fatura']; ?>">

            <div class="task-info">
            <div class="desc">
            Vencimento: <?php echo $registro['data_vencimento']; ?></div>
            <div class="percent"><?php echo $registro['situacao_pagamento']; ?></div>
            </div>
            Valor
            Total: <?php echo $this->funcoes->formataMoedaFloat(($registro['logins_ativos'] * $registro['valor_login']) / 100); ?>
            </a>
            </li>

            <?php
          }
          ?>
          <li>
          <a href="<?php echo base_url("revenda/listar_faturas"); ?>?id_revenda=<?php echo $this->session->userdata("id_revenda"); ?>">Ver
          todas Faturas</a>
          </li>
          </ul>
          <?php
        }
        ?>
        </li>-->
        <!-- settings end -->
        <!-- inbox dropdown start-->

        <!--
        <li id="header_inbox_bar" class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#" title="Novas Mensagens">
        <i class="fa fa-envelope-o"></i>
        <?php if (!empty($mensagens_news)) { ?><span class="badge bg-important"
        style="margin-left:5px;"><?php echo count($mensagens_news); ?></span><?php } ?>
        </a>
        <?php if (!empty($mensagens_news)) { ?>
          <ul class="dropdown-menu extended inbox">
          <div class="notify-arrow notify-arrow-red"></div>
          <li>
          <p class="red">Você tem <?php echo count($mensagens_news); ?> nova(s) mensagen(s)</p>
          </li>
          <?php
          //Percorre as mensagens
          foreach ($mensagens_news as $mensagem) {
            $d_start = new DateTime($mensagem['data_envio_original']);
            $d_end = new DateTime(date('Y-m-d H:i:s'));
            $diff = $d_start->diff($d_end);

            $envio = '';
            //Se conter dias
            $dias = $diff->format('%d');
            if (!empty($dias)) {
              $envio .= $dias . 'd ';
            }
            //Se conter horas
            $horas = $diff->format('%h');
            if (!empty($horas))
            $envio .= $horas . 'h ';

            //Se conter horas
            $min = $diff->format('%i');
            if (!empty($min))
            $envio .= $min . 'm ';


            //se houver segundos
            $min = $diff->format('%s');
            if (empty($envio) && $min)
            $envio .= 'Agora';


            ?>

            <li>
            <a href="" title="Visualizar Mensagem" class="visualizarMsgTopo"
            idRevendaDestinatario="<?php echo $mensagem['id_revenda_destinatario']; ?>"
            dataVisualizacao="<?php if (!empty($mensagem['data_visualizacao_destinatario'])) echo $mensagem['data_visualizacao_destinatario']; ?>"
            codigoRegistro="<?php echo $mensagem['id_mensagem']; ?>">
            <span class="photo"><img alt="avatar"
            src="<?php echo base_url("tema/flatlab/img/avatar-mini.jpg") ?>"></span>
            <span class="subject">
            <span class="from"><?php echo $mensagem['nome_revenda_remetente'] ?></span>
            <span class="time"><?php echo $envio; ?></span>
            </span>
            <span class="message">
            <?php echo $mensagem['assunto_mensagem'] ?>
            </span>
            </a>
            </li>
            <?php
          }
          ?>
          <li>
          <a href="<?php echo base_url("mensagem/listar"); ?>">Ver todas Mensagens</a>
          </li>
          </ul>
          <?php } ?>
          </li>
          <li class="dropdown" onclick=" window.open('<?php echo base_url("login/cliente"); ?>'); ">
          <a id="areacliente" data-toggle="dropdown" class="dropdown-toggle"
          href="<?php echo base_url("login/cliente"); ?>" target="_blank" title="Área do Cliente">
          <i class="fa fa-users"></i><font style="font-size:12px;"> Área do Cliente</font>
          </a>
          </li>-->
          </ul>

          <!--  notification end -->
          </div style=>
          <div class="top-nav ">
          <!--search & user info start-->
          <ul class="nav pull-right top-menu">
          <!--<li>
          <input type="text" class="form-control search" placeholder="Search">
          </li>-->
          <!-- user login dropdown start-->
          <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
          <img alt=""
          src="<?php if (!empty($dadosUsuario['foto'])) echo base_url($dadosUsuario['foto']); else echo base_url('images/logo/user.jpg') ?>"
          style="width: 29px;height:29px;">
          <span class="username"><?php echo $this->session->userdata('nome_usuario'); ?></span>
          <b class="caret"></b>
          </a>
          <ul class="dropdown-menu extended logout">
          <div class="log-arrow-up"></div>
          <li style="margin:0 auto;width:100%;"><a
          href="<?php echo base_url("usuario/minhaconta"); ?>"><i
          class="fa fa-cog"></i> Configurações</a></li>
          <li><a href="<?php echo base_url("login/sair"); ?>"><i class="fa fa-key"></i>Sair</a></li>
          </ul>
          </li>
          <!-- user login dropdown end -->
          </ul>
          <!--search & user info end-->
          </div>
          </header>
          <!--header end-->
          <!--sidebar start-->
          <aside>
          <?php
          $url_atual = base_url(substr($_SERVER['REDIRECT_QUERY_STRING'], 1, 100));
          ?>
          <div id="sidebar" class="nav-collapse ">
          <!-- sidebar menu start-->

          <!-- Menu da página principal -->
          <ul class="sidebar-menu" id="nav-accordion">
          <li>
          <a href="<?php echo base_url("painel"); ?>" <?php if ($url_atual == base_url("painel")) echo 'class="active"'; ?> >
          <i class="fa fa-dashboard"></i>
          <span>Principal</span>
          </a>
          </li>

          <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vColonia')){ ?>
            <li class="sub-menu">
            <a href="javascript:;" <?php if ($url_atual == base_url("colonia/listar") || $url_atual == base_url("colonia/listar")) echo 'class="active"'; ?> >
            <i class="fa fa-home"></i>
            <span>Colônia</span>
            </a>
            <ul class="sub">
            <li <?php if ($url_atual == base_url("colonia/listar")) echo 'class="active"'; ?>><a href="<?php echo base_url("colonia/listar"); ?>">Listar</a></li>

            </ul>
            </li>

            <?php } ?>

            <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vColonias')){ ?>
              <li class="sub-menu">
              <a href="javascript:;" <?php if ($url_atual == base_url("colonia/listarTodas") || $url_atual == base_url("colonia/listarTodas")) echo 'class="active"'; ?> >
              <i class="fa fa-home"></i>
              <span>Colônias</span>
              </a>
              <ul class="sub">
              <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aColonias')){ ?>
                <li <?php if ($url_atual == base_url("colonia/cadastrar")) echo 'class="active"'; ?>><a href="<?php echo base_url("colonia/cadastrar"); ?>">Cadastrar</a></li>
                <?php } ?>
                <li <?php if ($url_atual == base_url("colonia/listarTodas")) echo 'class="active"'; ?>><a href="<?php echo base_url("colonia/listarTodas"); ?>">Listar</a></li>

                </ul>
                </li>

                <?php } ?>

                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vPescador')){ ?>
                  <li class="sub-menu">
                  <a href="javascript:;" <?php if ($url_atual == base_url("pessoa/cadastrar") || $url_atual == base_url("pessoa/listar")) echo 'class="active"'; ?> >
                  <i class="fa fa-users"></i>
                  <span>Pescador</span>
                  </a>
                  <ul class="sub">
                  <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aPescador')){ ?>
                    <li <?php if ($url_atual == base_url("pessoa/cadastrar")) echo 'class="active"'; ?>><a href="<?php echo base_url("pessoa/cadastrar"); ?>">Cadastrar</a></li>
                    <?php } ?>

                    <li <?php if ($url_atual == base_url("pessoa/listar")) echo 'class="active"'; ?>><a href="<?php echo base_url("pessoa/listar"); ?>">Listar</a></li>

                    </ul>
                    </li>
                    <?php } ?>

                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vPescadores')){ ?>
                      <li class="sub-menu">
                      <a href="javascript:;" <?php if ($url_atual == base_url("pessoa/listarTodos") || $url_atual == base_url("pessoa/listarTodos")) echo 'class="active"'; ?> >
                      <i class="fa fa-users"></i>
                      <span>Pescadores</span>
                      </a>
                      <ul class="sub">
                      <li <?php if ($url_atual == base_url("pessoa/listarTodos")) echo 'class="active"'; ?>><a href="<?php echo base_url("pessoa/listarTodos"); ?>">Listar</a></li>
                      </ul>
                      </li>
                      <?php } ?>

                      <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vAgendamento')){ ?>

                        <li class="sub-menu">
                        <a href="javascript:;" <?php if ($url_atual == base_url("agendamento/cadastrar") || $url_atual == base_url("agendamento/listar")) echo 'class="active"'; ?> >
                        <i class="fa fa-calendar-o"></i>
                        <span>Agendamento</span>
                        </a>
                        <ul class="sub">
                        <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aAgendamento')){ ?>
                          <li <?php if ($url_atual == base_url("agendamento/cadastrar")) echo 'class="active"'; ?>><a href="<?php echo base_url("agendamento/cadastrar"); ?>">Cadastrar</a></li>
                          <?php } ?>
                          <li <?php if ($url_atual == base_url("agendamento/listar")) echo 'class="active"'; ?>><a href="<?php echo base_url("agendamento/listar"); ?>">Listar</a></li>
                          </ul>
                          </li>
                          <?php } ?>


                          <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vAtendimento')){ ?>
                            <li class="sub-menu">
                            <a href="javascript:;" <?php if ($url_atual == base_url("atendimento/cadastrar") || $url_atual == base_url("atendimento/meusatendimentos")) echo 'class="active"'; ?> >
                            <i class="fa fa-user"></i>
                            <span>Atendimento</span>
                            </a>
                            <ul class="sub">
                            <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aAtendimento')){ ?>
                              <li <?php if ($url_atual == base_url("atendimento/cadastrar")) echo 'class="active"'; ?>><a href="<?php echo base_url("atendimento/cadastrar"); ?>">Cadastrar</a></li>
                              <?php } ?>
                              <li <?php if ($url_atual == base_url("atendimento/meusatendimentos")) echo 'class="active"'; ?>><a href="<?php echo base_url("atendimento/meusatendimentos"); ?>">Listar</a></li>
                              </ul>
                              </li>

                              <?php } ?>


                              <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vAtendimentos')){ ?>
                                <li class="sub-menu">
                                <a href="javascript:;" <?php if ($url_atual == base_url("atendimento/listar")) echo 'class="active"'; ?> >
                                <i class="fa fa-user"></i>
                                <span>Atendimentos</span>
                                </a>
                                <ul class="sub">
                                <li <?php if ($url_atual == base_url("atendimento/listar")) echo 'class="active"'; ?>><a href="<?php echo base_url("atendimento/listar"); ?>">Listar</a></li>
                                </ul>
                                </li>

                                <?php } ?>

                                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vRelatorio')){ ?>
                                  <li class="sub-menu">
                                  <a href="javascript:;" <?php if ($url_atual == base_url("relatorio/aniversariantes")) echo 'class="active"'; ?> >
                                  <i class="fa fa-print"></i>
                                  <span>Relatório</span>
                                  </a>
                                  <ul class="sub">
                                  <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vAniversariantes')){ ?>
                                    <li <?php if ($url_atual == base_url("relatorio/aniversariantes")) echo 'class="active"'; ?>><a href="<?php echo base_url("relatorio/aniversariantes"); ?>">Aniversariantes</a></li>
                                    <?php } ?>

                                    </ul>

                                    <ul class="sub">
                                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vGerados')){ ?>
                                      <li <?php if ($url_atual == base_url("relatorio/gerados")) echo 'class="active"'; ?>><a href="<?php echo base_url("relatorio/gerados"); ?>">Gerados</a></li>
                                      <?php } ?>

                                      </ul>
                                      <ul class="sub">
                                      <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vGeral')){ ?>
                                        <li <?php if ($url_atual == base_url("relatorio/geral")) echo 'class="active"'; ?>><a href="<?php echo base_url("relatorio/geral"); ?>">Geral</a></li>
                                        <?php } ?>

                                        </ul>

                                        <ul class="sub">
                                        <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vLivro')){ ?>
                                          <li <?php if ($url_atual == base_url("relatorio/livro")) echo 'class="active"'; ?>><a href="<?php echo base_url("relatorio/livro"); ?>">Livro</a></li>
                                          <?php } ?>

                                          </ul>

                                          <ul class="sub">
                                          <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vImpostoSindical')){ ?>
                                            <li <?php if ($url_atual == base_url("relatorio/imposto_sindical")) echo 'class="active"'; ?>><a href="<?php echo base_url("relatorio/imposto_sindical"); ?>">Imposto Sindical</a></li>
                                            <?php } ?>

                                            </ul>
                                            </li>

                                            <?php } ?>

                                            <li class="sub-menu">
                                            <a href="<?php echo base_url("usuario/listar"); ?>" <?php if ($url_atual == base_url("usuario/cadastrar") || $url_atual == base_url("usuario/listar")) echo 'class="active"'; ?> >
                                            <i class="fa fa-user"></i>
                                            <span>Usuários</span>
                                            </a>

                                            <ul class="sub">

                                            <li <?php if ($url_atual == base_url("usuario/minhaconta")) echo 'class="active"'; ?>>
                                            <a href="<?php echo base_url("usuario/minhaconta"); ?>">Minha conta</a></li>
                                            <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vUsuarios')){ ?>
                                              <li <?php if ($url_atual == base_url("usuario/listar")) echo 'class="active"'; ?>><a href="<?php echo base_url("usuario/listar"); ?>">Listar</a></li>c
                                              <?php } ?>
                                              </ul>
                                              </li>


                                              <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vPermissoes')){ ?>

                                                <li class="sub-menu">
                                                <a href="javascript:;" <?php if ($url_atual == base_url("permissoes/cadastrar") || $url_atual == base_url("permissoes/listar")) echo 'class="active"'; ?> >
                                                <i class="fa fa-users"></i>
                                                <span>Permissões</span>
                                                </a>
                                                <ul class="sub">
                                                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aPermissoes')){ ?>
                                                  <li <?php if ($url_atual == base_url("permissoes/cadastrar")) echo 'class="active"'; ?>><a href="<?php echo base_url("permissoes/cadastrar"); ?>">Cadastrar</a></li>
                                                  <?php } ?>
                                                  <li <?php if ($url_atual == base_url("permissoes/listar")) echo 'class="active"'; ?>><a href="<?php echo base_url("permissoes/listar"); ?>">Listar</a></li>

                                                  </ul>
                                                  </li>

                                                  <?php } ?>
                                                  <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vLink')){ ?>
                                                    <li class="sub-menu">
                                                    <a href="javascript:;" <?php if ($url_atual == base_url("links/cadastrar") || $url_atual == base_url("links/listar")) echo 'class="active"'; ?> >
                                                    <i class="fa fa-link"></i>
                                                    <span>Links</span>
                                                    </a>
                                                    <ul class="sub">
                                                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aLink')){ ?>
                                                      <li <?php if ($url_atual == base_url("links/cadastrar")) echo 'class="active"'; ?>><a href="<?php echo base_url("links/cadastrar"); ?>">Cadastrar</a></li>
                                                      <?php } ?>
                                                      <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aLink')){ ?>
                                                        <li <?php if ($url_atual == base_url("links/listar")) echo 'class="active"'; ?>><a href="<?php echo base_url("links/listar"); ?>">Listar</a></li>
                                                        <?php } ?>
                                                        </ul>
                                                        </li>
                                                        <?php } ?>

                                                        </ul>
                                                        <!-- sidebar menu end-->
                                                        </div>
                                                        </aside>
                                                        <br><br>
                                                        <!--sidebar end-->
                                                        <!--main content start-->
                                                        <section id="main-content">
                                                        <?php $this->load->view($view); ?>
                                                        </section>
                                                        <!--main content end-->
                                                        <!--footer start-->
                                                        <footer class="site-footer" style="bottom:0;left:0px;position:fixed;width:100%;z-index:3000;">
                                                        <div class="text-center">
                                                        &copy; Colônia |
                                                        <?php
                                                        $dataDesenv = '2016';
                                                        $dataAtual = date('Y');
                                                        echo $dataDesenv;
                                                        if ($dataDesenv != $dataAtual)
                                                        echo " - " . $dataAtual; ?>

                                                        <a href="#" target="_blank">
                                                        </a>
                                                        <a class="go-top" href="#">
                                                        <i class="fa fa-angle-up"></i>
                                                        </a>
                                                        </div>

                                                        <!--End of Zopim Live Chat Script-->
                                                        </div>
                                                        </footer>
                                                        <!--footer end-->
                                                        </section>
                                                        </body>
                                                        </html>
