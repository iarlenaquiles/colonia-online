<style type="text/css">
  @page { margin-left: 3cm; margin-right: 3cm; margin-top: 2.5cm; margin-bottom: 1.25cm }
  p { margin-bottom: 0.25cm; direction: ltr; line-height: 100%; text-align: left; orphans: 2; widows: 2 }
  a:link { so-language: zxx }
  p.um {
font-size: 12px;
line-height: 1.5;}
p.header {
font-size: 8px;
line-height: 50%;
}
</style>
<section class="wrapper site-min-height">
    <!-- page start-->
    <section class="panel">
        <header class="panel-heading">
          Declaração de <?php echo $registro['nome_pessoa'];?>
        </header>
        <div class="panel-body">
          <form id="formDeclaracao">

          <div class="row" id="modeloPdf" style="">
              <div class="col-lg-12">
                  <div class="form-group">
                      <label for="">Declaração:</label>
                      <textarea class="ckeditor form-control" id="editor1" name="declaracao" rows="18" style="height:600px"><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
                      <html>
                      <head>
                      	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
                      	<title>DECLARACAO</title>
                      	<meta name="generator" content="LibreOffice 5.0.6.2 (Linux)"/>
                      	<meta name="author" content="Colonia"/>
                      	<meta name="created" content="2016-08-31T14:05:00"/>
                      	<meta name="changed" content="2016-09-07T17:27:53.978136848"/>
                      	<meta name="AppVersion" content="15.0000"/>
                      	<meta name="DocSecurity" content="0"/>
                      	<meta name="HyperlinksChanged" content="false"/>
                      	<meta name="LinksUpToDate" content="false"/>
                      	<meta name="ScaleCrop" content="false"/>
                      	<meta name="ShareDoc" content="false"/>

                      </head>
                      <body lang="pt-BR" dir="ltr">
                      <p align="center"><?php echo '<img width="61" height="60" src="'.base_url($dadosColonia['foto_federacao']).'"/>';?></p>

                      <p align="center" class="header" style="line-height: 30%">  <font size="3" style="font-size: 12pt">CONFEDERAÇÃO NACIONAL DOS PESCADORES E AQUICULTORES</font></p>
                      <p align="center" class="header" style="line-height: 30%">           <font size="3" style="font-size: 12pt">  <?php echo $dadosColonia['nome_federacao']." - ".$dadosColonia['sigla_federacao']; ?></font>

                      	</p>
                      <p align="center" class="header" style="line-height: 30%">          <font size="3" style="font-size: 12pt">           	<?php
                      echo $dadosColonia['nome_colonia'];
                      ?></font></p>
                      <p align="center" class="header" style="line-height: 30%">  <font size="3" style="font-size: 12pt">FUNDADA
                      EM <?php echo date('d/m/Y', strtotime($dadosColonia['data_fundacao'])); ?></font></p>
                      <p align="center" class="header" style="line-height: 30%">  <font size="3" style="font-size: 12pt">CNPJ:
                      <?php echo strtoupper($dadosColonia['cnpj']);?></font></p>
                      <p align="center"><?php echo '<img width="60" height="60" src="'.base_url($dadosColonia['foto']).'"/>';?></p>

                      <p align="center" class="um"><br/>

                      </p>


                      <p align="center" class="um">
                      	  <font size="3" style="font-size: 12pt">DECLARAÇÃO</font>
                      </p>

                      <p align="justify" class="um" style="line-height: 1.5;  text-indent: 80px">
                      <font size="3" style="font-size: 12pt;">Declaramos para os devidos
                      fins, junto ao Ministério da Previdência                        e
                      Assistência Social.
                      que o sr(a). <b><u><?php echo ($registro['nome_pessoa']);?></u></b>, estado civil <b><?php echo ($registro['estado_civil']);?></b>,
                      portador(a) do RG sob n°: <b><?php echo ($registro['numero_rg']);?></b>
                      ógão expedidor <b><?php echo ($registro['orgao_expedicao_rg']);?>/<?php foreach($estados as $estado) { if(!empty($registro['estado_expedicao_rg']) && $estado['id_estado'] == $registro['estado_expedicao_rg']) echo ($estado['uf']); } ?></b>
                      e portador(a) da matrícula no MPA de n°: <b><?php echo ($registro['carteira_mpa']);?></b>,
                      portador(a) do CPF: <b><?php echo ($registro['cpf_cnpj']); ?></b>, residente e
                      domiciliado(a) <b><?php echo ($registro['endereco_logradouro']);?></b>, n°
                      <b><?php echo ($registro['endereco_numero']);?></b>, bairro: <b><?php echo ($registro['endereco_bairro']);?></b> e filiado(a)
                      nesta <b>	<?php echo $dadosColonia['nome_colonia'];?></b> como pescador(a) profissional
                      artesanal, desde <b><?php echo date('d/m/Y', strtotime($registro['data_filiacao'])); ?></b>,
                      livro de n°: <b><?php echo ($registro['numero_livro_filiacao']);?></b>,
                      folha de n°: <b><?php echo ($registro['numero_folha_filiacao']);?></b> no
                      registro sob o n°: <b><?php echo ($registro['numero_carteira']);?></b>
                      que faz da pesca sua profissão e seu principal meio de vida e já se
                      encontra quite com suas contribuições e documentação legalizada.
                      Esta declaração foi emitida com base nas informações prestadas pelo colonizado e
                      nos seguintes documentos: <b>CART.
                      SEAP, CART. DA COLONIA, CART. PROFISSIONAL, RG, CPF, CERT. DO
                      TÍTULO, CERT. CASAMENTO OU NASCIMENTO, DECLARAÇÃO DE
                      PESCADOR/MARISQUERA COLONIZADO, CARNE DO INSS, ATESTADO MÉDICO E
                      COMPROVANTE DE RESIDÊNCIA.</b></font></p>
                      <p class="um">   <font size="3" style="font-size: 12pt"></font></p>

                      <p align="right" class="um"><font size="3" style="font-size: 12pt"><?php
                      foreach($cidades as $cidade){

                      		 if(!empty($dadosColonia['id_municipio']) && $cidade['id_cidade'] == $dadosColonia['id_municipio']) echo $cidade['nome_cidade'];

                      }
                      ?>/<?php
                      foreach($estados as $estado){

                      	 if(!empty($dadosColonia['id_estado']) && $estado['id_estado'] == $dadosColonia['id_estado']) echo strtoupper($estado['uf']);

                      }
                      ?>
                       &minus; <?php setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );

                      date_default_timezone_set( 'America/Sao_Paulo' ); echo strftime( '%d de %B de %Y', strtotime( date( 'Y-m-d' ) ) );
                      ?>.</font></p>
                      <p align="right" class="um"><br/>

                      </p>

                      <p class="um" align="center" style="margin-bottom: 0cm; line-height: 30%"><font size="3" style="font-size: 12pt">
                      __________________________________________________________</font></p>
                      <p align="center" class="um" style="line-height: 30%">
                      <font size="3" style="font-size: 12pt"><b>                        <?php
                          foreach($cargos as $cargo){
                            if(!empty($dadosColonia['id_pessoa_presidente']) && $cargo['id_pessoa'] == $dadosColonia['id_pessoa_presidente']){

                           echo strtoupper($cargo['nome_pessoa']." - RGP: ".$cargo['carteira_mpa']);

                        }
                        }
                          ?></b></font></p>
                      <p align="center" class="um" style="line-height: 30%"><font size="3" style="font-size: 12pt">PRESIDENTE DA 	<?php echo $dadosColonia['nome_colonia']; ?></font></p>
                      <div title="footer">
                      	<p align="center" style="margin-top: 1.1cm; margin-bottom: 0cm; line-height: 30%">
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
                      	?>, CEP: <?php echo $registro['cep'];?></font></p>
                      	<p align="center" class="um" style="line-height: 30%"><font size="3" style="font-size: 12pt">Fone: <?php echo ($dadosColonia['telefones']);?></font></p>


                      </div>
                      </body>
                      </html>
</textarea>
                      <script>
                          CKEDITOR.replace( 'editor1' );
                      </script>
                      <!--<div contenteditable="true" id="modeloPeticao">

                      </div>-->
                      <!--<textarea class="form-control" id="modelo_peticao" name="modelo_peticao" ></textarea>-->
                  </div>
              </div>


          </div>



</form>


        </div>
    </section>

    <form id="tipo">
    <input type="hidden" name="tipo_relatorio" value="Declaração INSS" id="tipo_relatorio">
      <input type="hidden" name="id_pessoa" value="<?php echo $registro['id_pessoa']?>" id="id_pessoa">
      <button type="submit" class="btn btn-info" onclick="printTextArea()">Gerar</button>
    </form>
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
<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/ckeditor/ckeditor.js");?>"></script>
<script src="<?php echo base_url("tema/flatlab/js/common-scripts.js"); ?>"></script>

<!--custom switch-->
<script src="<?php echo base_url("tema/flatlab/js/bootstrap-switch.js"); ?>"></script>
<script type="text/javascript">
CKEDITOR.config.height = 400;
function printTextArea() {

var editorText = CKEDITOR.instances.editor1.getData();

//alert(editorText);
        childWindow = window.open('','childWindow','location=yes, menubar=yes, toolbar=yes');
        childWindow.document.open();
        //childWindow.document.write('<html><head></head><body>');
        childWindow.document.write(editorText);
        //childWindow.document.write('</body></html>');
        childWindow.print();
        childWindow.document.close();
        childWindow.close();
      }
$(document).ready(function(){
  $("#tipo").submit(function (e) {
      e.preventDefault();
      $('#loader-wrapper').show();
      var dadosForm = $(this).serialize();
      //Envia Dados via Ajax
      $.ajax({
          type: 'POST',
          dataType: "json",
          url: '<?php echo base_url("pessoa/salvar_tipo_relatorio");?>',
          data: dadosForm,
          success: function (response) {
              if ('erro' == response.classe) {
                  $('#loader-wrapper').fadeOut(500);
                  alertaVModal(response.msg, response.classe);
                  return false;
              }
              else if ('acerto' == response.classe) {
                  $('#loader-wrapper').fadeOut(500);

                  alertaVModal(response.msg, response.classe);

              }

              return false;
          }
      });
  });
    });
</script>
