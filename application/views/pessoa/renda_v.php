<style type="text/css">
  @page { margin-left: 3cm; margin-right: 3cm; margin-top: 1.25cm; margin-bottom: 1.25cm }
  p { margin-bottom: 0.25cm; direction: ltr; line-height: 120%; text-align: left; orphans: 2; widows: 2 }
  p.western { font-family: "Arial", serif; font-size: 12pt }
  p.cjk { font-size: 12pt }
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
          Declaração de renda de <?php echo $registro['nome_pessoa'];?>
        </header>
        <div class="panel-body">
          <form id="formDeclaracao">

          <div class="row" id="modeloPdf" style="">
              <div class="col-lg-12">
                  <div class="form-group">
                      <label for="">Renda:</label>
                      <textarea class="ckeditor form-control" id="editor1" name="renda" rows="18" style="height:600px">
                        <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
                        <html>
                        <head>
                        	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
                        	<title></title>
                        	<meta name="generator" content="LibreOffice 5.0.6.2 (Linux)"/>
                        	<meta name="author" content="Colonia Z6 - Note"/>
                        	<meta name="created" content="2016-03-10T12:17:00"/>
                        	<meta name="changedby" content="ColoniaServer"/>
                        	<meta name="changed" content="2016-09-22T15:35:00"/>
                        	<meta name="AppVersion" content="14.0000"/>
                        	<meta name="DocSecurity" content="0"/>
                        	<meta name="HyperlinksChanged" content="false"/>
                        	<meta name="LinksUpToDate" content="false"/>
                        	<meta name="ScaleCrop" content="false"/>
                        	<meta name="ShareDoc" content="false"/>

                        </head>
                        <body lang="pt-BR" dir="ltr">
                          <p align="center"><?php echo '<img width="61" height="60" src="'.base_url($dadosColonia['foto_federacao']).'"/>';?></p>

                          <p align="center" class="header" style="line-height: 30%">  <font size="3" style="font-size: 12pt">CONFEDERAÇÃO NACIONAL DOS PESCADORES E AQUICULTORES</font></p>
                          <p align="center" class="header" style="line-height: 30%">           <font size="3" style="font-size: 12pt"><?php echo $dadosColonia['nome_federacao']." - ".$dadosColonia['sigla_federacao']; ?></font>

                          	</p>
                          <p align="center" class="header" style="line-height: 30%">          <font size="3" style="font-size: 12pt">           	<?php
                          echo $dadosColonia['nome_colonia'];
                          ?></font></p>
                          <p align="center" class="header" style="line-height: 30%">  <font size="3" style="font-size: 12pt">FUNDADA
                          EM <?php echo date('d/m/Y', strtotime($dadosColonia['data_fundacao'])); ?></font></p>
                          <p align="center" class="header" style="line-height: 30%">  <font size="3" style="font-size: 12pt">CNPJ:
                          <?php echo ($dadosColonia['cnpj']);?></font></p>
                          <p align="center"><?php echo '<img width="60" height="60" src="'.base_url($dadosColonia['foto']).'"/>';?></p>

                          <p align="center" class="um"><br/>

                          </p>


                        <p class="western" align="center" style="margin-bottom: 0cm; line-height: 1.5">
                        <font face="Calibri, serif"><font size="5" style="font-size: 18pt"><b><u>DECLARAÇÃO DE RENDA</u></b></font></font></p>
                        <p class="western" align="justify" style="margin-bottom: 0cm; text-indent: 2.25cm;line-height: 1.5">
                        <font size="3" style="font-size: 12pt">Declaro para os devidos fins, junto a
                        Receita Federal que o(a) sr(a). </font><font size="3" style="font-size: 12pt"><b><u><?php echo ($registro['nome_pessoa']);?></u></b></font><font size="3" style="font-size: 12pt">, portador do
                        RG sob o nº </font><font size="3" style="font-size: 12pt"><b><?php echo $registro['numero_rg'];?></b>, </font><font size="3" style="font-size: 12pt">
                        Órgão Expedidor <b><?php echo ($registro['orgao_expedicao_rg']);?>/<?php
                        foreach($estados as $estado){

                        	 if(!empty($registro['estado_expedicao_rg']) && $estado['id_estado'] == $registro['estado_expedicao_rg']) echo ($estado['uf']);

                        }
                        ?></b>, portador(a) do CPF sob o n°</font><font size="3" style="font-size: 12pt"><b>: <?php echo ($registro['cpf_cnpj']); ?></b></font><font size="3" style="font-size: 12pt">, residente e
                        domiciliado(a) </font><font size="3" style="font-size: 12pt"><b><?php echo ($registro['endereco_logradouro']);?>, </b></font><font size="3" style="font-size: 12pt">nº </font><font size="3" style="font-size: 12pt"><b>
                        <?php echo ($registro['endereco_numero']);?></b></font><font size="3" style="font-size: 12pt">, bairro: </font><font size="3" style="font-size: 12pt"><b><?php echo strtoupper($registro['endereco_bairro']);?>,</b></font><font size="3" style="font-size: 12pt"><b>  </b></font><font size="3" style="font-size: 12pt">
                          CEP: </font><font size="3" style="font-size: 12pt"><b>
                        <?php echo $registro['cep'];?></b></font><font size="3" style="font-size: 12pt">, cidade: <b><?php
                        foreach($cidades as $cidade){

                        		 if(!empty($registro['id_cidade']) && $cidade['id_cidade'] == $registro['id_cidade']) echo $cidade['nome_cidade'];

                        }
                        ?></b>, estado: <b><?php
                        foreach($estados as $estado){

                           if(!empty($registro['id_estado']) && $estado['id_estado'] == $registro['id_estado']) echo ($estado['nome_estado']);

                        }
                        ?></b>, tem sua renda ao mês variável no valor
                        de R$ </font><font size="3" style="font-size: 12pt"><b>1.500,00 </b></font><font size="3" style="font-size: 12pt">a
                        R$ </font><font size="3" style="font-size: 12pt"><b>2.500,00</b></font>. <font size="3" style="font-size: 12pt">
                        É filiado na <b><?php echo ($dadosColonia['nome_colonia']);?></b> como <b><?php echo ($registro['profissao_atual']);?></b> com a matrícula de nº </font><font size="3" style="font-size: 12pt"><b><?php echo ($registro['numero_carteira']);?></b></font><font size="3" style="font-size: 12pt">,
                        no livro de nº </font><font size="3" style="font-size: 12pt"><b><?php echo ($registro['numero_livro_filiacao']);?></b></font><font size="3" style="font-size: 12pt">,
                        na folha de nº </font><font size="3" style="font-size: 12pt"><b> <?php echo ($registro['numero_folha_filiacao']);?></b></font><font size="3" style="font-size: 12pt">,
                        desde </font><font size="3" style="font-size: 12pt"><b><?php setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );

                       date_default_timezone_set( 'America/Sao_Paulo' ); echo strtoupper(strftime( '%d de %B de %Y', strtotime($registro['data_filiacao']) ));
                       ?></b></font><font size="3" style="font-size: 12pt">
                        e que faz da pesca sua profissão e seu principal meio de vida.  </font>
                        </p>
                        <p class="western" align="justify" style="margin-bottom: 0cm; line-height: 1.5">


                        </p>
                        <p align="right" class="um"><font size="3" style="font-size: 12pt"><?php
                        foreach($cidades as $cidade){

                        		 if(!empty($dadosColonia['id_municipio']) && $cidade['id_cidade'] == $dadosColonia['id_municipio']) echo $cidade['nome_cidade'];

                        }
                        ?>/<?php
                        foreach($estados as $estado){

                        	 if(!empty($dadosColonia['id_estado']) && $estado['id_estado'] == $dadosColonia['id_estado']) echo ($estado['uf']);

                        }
                        ?>
                         &minus; <?php setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );

                        date_default_timezone_set( 'America/Sao_Paulo' ); echo strftime( '%d de %B de %Y', strtotime( date( 'Y-m-d' ) ) );
                        ?>.</font></p>
                        <p class="western" align="justify" style="margin-bottom: 0cm; line-height: 1.5">
                        <br/>

                        </p>



                        <p class="um" align="center" style="margin-bottom: 0cm; line-height: 30%"><font size="3" style="font-size: 12pt">
                        __________________________________________________________</font></p>
                        <p align="center" class="um" style="line-height: 30%">
                        <font size="3" style="font-size: 12pt"><b>

                          <?php
                            foreach($cargos as $cargo){
                              if(!empty($dadosColonia['id_pessoa_presidente']) && $cargo['id_pessoa'] == $dadosColonia['id_pessoa_presidente']){

                                  echo strtoupper($cargo['nome_pessoa']." - RGP: ".$cargo['carteira_mpa']);

                                }
                              }
                            ?></b></font></p>
                        <p align="center" class="um" style="line-height: 30%"><font size="3" style="font-size: 12pt">PRESIDENTE DA 	<?php echo $dadosColonia['nome_colonia']; ?></font></p>



                        <div title="footer">
                        	<p align="center" style="margin-top: 1.1cm; margin-bottom: 0cm; line-height: 30%">
                        	<font size="3" style="font-size: 12pt"><?php echo ($dadosColonia['endereco_rua']);?>, <?php echo ($dadosColonia['endereco_numero']);?>, <?php echo strtoupper($dadosColonia['endereco_bairro']);?>,
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
                        	<p align="center" class="um" style="line-height: 30%"><font size="3" style="font-size: 12pt">Fone: <?php echo strtoupper($dadosColonia['telefones']);?></font></p>

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
    <input type="hidden" name="tipo_relatorio" value="Declaração de renda" id="tipo_relatorio">
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
