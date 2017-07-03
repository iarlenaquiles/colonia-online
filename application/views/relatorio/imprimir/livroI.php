  <head>

    <title>Livro</title>
    <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/fullcalendar.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/blue.css" class="skin-color" />
    <script type="text/javascript"  src="<?php echo base_url();?>js/jquery-1.10.2.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

  <body style="background-color: transparent">



      <div class="container-fluid">

          <div class="row-fluid">
              <div class="span12">

                  <div class="widget-box">
                    <p align="center"><?php echo '<img width="61" height="60" src="'.base_url($dadosColonia['foto_federacao']).'"/>';?></p>

                    <p align="center" class="header" style="line-height: 100%">  <font size="3" style="font-size: 12pt">CONFEDERAÇÃO NACIONAL DOS PESCADORES E AQUICULTORES</font></p>
                    <p align="center" class="header" style="line-height: 100%">           <font size="3" style="font-size: 12pt">  <?php echo $dadosColonia['nome_federacao']." - ".$dadosColonia['sigla_federacao']; ?></font>

                      </p>
                    <p align="center" class="header" style="line-height: 100%">          <font size="3" style="font-size: 12pt">           	<?php
                    echo $dadosColonia['nome_colonia'];
                    ?></font></p>
                    <p align="center" class="header" style="line-height: 100%">  <font size="3" style="font-size: 12pt">FUNDADA
                    EM <?php echo date('d/m/Y', strtotime($dadosColonia['data_fundacao'])); ?></font></p>
                    <p align="center" class="header" style="line-height: 100%">  <font size="3" style="font-size: 12pt">CNPJ:
                    <?php echo strtoupper($dadosColonia['cnpj']);?></font></p>
                    <p align="center"><?php echo '<img width="60" height="60" src="'.base_url($dadosColonia['foto']).'"/>';?></p>
                      <div class="widget-title">
                          <h4 style="text-align: center">Livro</h4>
                      </div>
                      <div class="widget-content nopadding">

                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th style="font-size: 1.2em; padding: 5px;">Mat</th>
                              <th style="font-size: 1.2em; padding: 5px;">Nome</th>
                              <th style="font-size: 1.2em; padding: 5px;">CPF</th>
                              <th style="font-size: 1.2em; padding: 5px;">Filiação</th>
                              <th style="font-size: 1.2em; padding: 5px;">Li/Fo</th>

                          </tr>
                      </thead>
                      <?php if($livros > 0){?>
                      <tbody>
                          <?php

                            foreach ($livros as $a) {

                              echo '<tr>';
                              echo '<td>' . $a['numero_carteira'] . '</td>';
                              echo '<td>' . $a['nome_pessoa'] . '</td>';
                              echo '<td>' . $a['cpf_cnpj'] . '</td>';
                              echo '<td>' . date('d/m/Y', strtotime($a['data_filiacao'])). '</td>';
                              echo '<td>' . $a['numero_livro_filiacao']."-". $a['numero_folha_filiacao'].'</td>';

                              echo '</tr>';
                          }

                          ?>
                      </tbody>
                  </table>
                  Total: <?php echo count($livros);?>
                  <? }else{
                    echo "Nenhum aniversariante encontrado no mês selecionado";
                  } ?>
                  </div>

              </div>
                  <h5 style="text-align: right">Data do Relatório: <?php echo date('d/m/Y');?></h5>
                  <p class="um" align="center" style="margin-bottom: 0cm; line-height: 100%"><font size="3" style="font-size: 12pt">
                  __________________________________________________________</font></p><br>
                  <p align="center" class="um" style="line-height: 100%">
                  <font size="3" style="font-size: 12pt"><b>                        <?php
                      foreach($cargos as $cargo){
                        if(!empty($dadosColonia['id_pessoa_presidente']) && $cargo['id_pessoa'] == $dadosColonia['id_pessoa_presidente']){

                       echo strtoupper($cargo['nome_pessoa']." - RGP:".$cargo['carteira_mpa']);

                    }
                    }
                      ?></b></font></p>
                  <p align="center" class="um" style="line-height: 100%"><font size="3" style="font-size: 12pt">PRESIDENTE DA 	<?php echo $dadosColonia['nome_colonia']; ?></font></p>
                  <div title="footer">
                    <p align="center" style="margin-top: 1.1cm; margin-bottom: 0cm; line-height: 100%">
                    <font size="3" style="font-size: 12pt"><?php echo ($dadosColonia['endereco_rua']);?>, <?php echo strtoupper($dadosColonia['endereco_numero']);?>, <?php echo strtoupper($dadosColonia['endereco_bairro']);?>,
                      <?php
                      foreach($cidades as $cidade){

                           if(!empty($dadosColonia['id_municipio']) && $cidade['id_cidade'] == $dadosColonia['id_municipio']) echo $cidade['nome_cidade'];

                      }
                      ?>,
                      <?php
                    foreach($estados as $estado){

                         if(!empty($dadosColonia['id_estado']) && $estado['id_estado'] == $dadosColonia['id_estado']) echo $estado['nome_estado'];

                    }
                    ?>, CEP: <?php echo $dadosColonia['cep'];?></font></p>
                    <p align="center" class="um" style="line-height: 100%"><font size="3" style="font-size: 12pt">Fone: <?php echo ($dadosColonia['telefones']);?></font></p>
          </div>



      </div>
</div>




            <!-- Arquivos js-->

            <script src="<?php echo base_url();?>js/excanvas.min.js"></script>
            <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
            <script src="<?php echo base_url();?>js/jquery.flot.min.js"></script>
            <script src="<?php echo base_url();?>js/jquery.flot.resize.min.js"></script>
            <script src="<?php echo base_url();?>js/jquery.peity.min.js"></script>
            <script src="<?php echo base_url();?>js/fullcalendar.min.js"></script>
            <script src="<?php echo base_url();?>js/sosmc.js"></script>
            <script src="<?php echo base_url();?>js/dashboard.js"></script>
  </body>
</html>
