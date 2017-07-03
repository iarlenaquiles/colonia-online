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
                      <label for="">Declaração de atividade pesqueira:</label>
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
<p></p><p></p><p></p>
<p align="center" class="um">
                      	  <font size="3" style="font-size: 12pt; font-weight:bold; text-decoration: underline">DECLARAÇÃO DE ATIVIDADE PESQUEIRA</font>
</p><p></p>

                      <p align="justify" class="um" style="line-height: 1.5;  text-indent: 80px">
                      <font size="3" style="font-size: 12pt;">Eu, <b><u><?php echo ($testemunha['nome_pessoa']);?></u></b>, estado civil <b><?php echo ($testemunha['estado_civil']);?></b>,
                      portador(a) do RG sob n°: <b><?php echo ($testemunha['numero_rg']);?></b>,
                      órgão expedidor <b><?php echo ($testemunha['orgao_expedicao_rg']);?>/<?php foreach($estados as $estado) { if(!empty($testemunha['estado_expedicao_rg']) && $estado['id_estado'] == $testemunha['estado_expedicao_rg']) echo ($estado['uf']); } ?></b>,
                      matrícula no MPA de n°: <b><?php echo ($testemunha['carteira_mpa']);?></b>,
                      CPF de nº <b><?php echo ($testemunha['cpf_cnpj']); ?></b>, residente e
                      domiciliado(a) <b><?php echo ($testemunha['endereco_logradouro']);?></b>, n°
                      <b><?php echo ($testemunha['endereco_numero']);?></b>, bairro: <b><?php echo ($testemunha['endereco_bairro']);?>, <?php
                        				foreach($cidades as $cidade){

                        						 if(!empty($testemunha['id_cidade']) && $cidade['id_cidade'] == $testemunha['id_cidade']) echo $cidade['nome_cidade'];

                        				}
                        				?> - <?php
                        			foreach($estados as $estado){

                        					 if(!empty($testemunha['id_estado']) && $estado['id_estado'] == $testemunha['id_estado']) echo $estado['nome_estado'];

                        			}
                        			?></b>, CEP: <b><?php echo strtoupper($testemunha['cep']);?></b>
		       e filiado(a)
                      na <b><?php echo $dadosColonia['nome_colonia'];?></b> como pescador(a) profissional
                      artesanal, desde <b><?php echo date('d/m/Y', strtotime($testemunha['data_filiacao'])); ?></b>,
                      livro de n°: <b><?php echo ($testemunha['numero_livro_filiacao']);?></b>,
                      folha de n°: <b><?php echo ($testemunha['numero_folha_filiacao']);?></b>, no
                      registro sob o n°: <b><?php echo ($testemunha['numero_carteira']);?>. <u>DECLARO PARA OS DEVIDOS FINS</u> que conheço o(a) sr(a)</b> <b><u><?php echo strtoupper($registro['nome_pessoa']);?></u></b>, estado civil <b><?php echo ($registro['estado_civil']);?></b>,
                      portador(a) do RG sob n°: <b><?php echo ($registro['numero_rg']);?></b>,
                      órgão expedidor <b><?php echo ($registro['orgao_expedicao_rg']);?>/<?php foreach($estados as $estado) { if(!empty($registro['estado_expedicao_rg']) && $estado['id_estado'] == $registro['estado_expedicao_rg']) echo ($estado['uf']); } ?></b>,
                      matrícula no MPA de n°: <b><?php echo ($registro['carteira_mpa']);?></b>,
                       CPF de nº: <b><?php echo ($registro['cpf_cnpj']); ?></b>, residente e
                      domiciliado(a) <b><?php echo ($registro['endereco_logradouro']);?></b>, n°
                      <b><?php echo ($registro['endereco_numero']);?></b>, bairro: <b><?php echo ($registro['endereco_bairro']);?>, <?php
                        				foreach($cidades as $cidade){

                        						 if(!empty($registro['id_cidade']) && $cidade['id_cidade'] == $registro['id_cidade']) echo $cidade['nome_cidade'];

                        				}
                        				?> - <?php
                        			foreach($estados as $estado){

                        					 if(!empty($registro['id_estado']) && $estado['id_estado'] == $registro['id_estado']) echo $estado['nome_estado'];

                        			}
                        			?></b>, CEP: <b><?php echo ($registro['cep']);?></b>,
                        			filiado(a) na <b><?php echo $dadosColonia['nome_colonia']; ?></b> desde <b><?php echo date('d/m/Y', strtotime($registro['data_filiacao'])); ?></b>, registrado no livro de n°: <b><?php echo ($registro['numero_livro_filiacao']);?></b>,
                      folha de n°: <b><?php echo ($registro['numero_folha_filiacao']);?></b> com a matrícula de n°: <b><?php echo ($registro['numero_carteira']);?></b>
                        			e que o(a) mesmo(a) é <b><?php echo ($registro['profissao_atual']);?>, <u>EM REGIME DE ECONOMIA FAMILIAR HÁ APROXIMADAMENTE XX ANOS, FAZENDO DA PESCA SEU PRINCIPAL MEIO DE VIDA.</u></b></font></p>
<p align="justify" class="um" style="line-height: 1.5;  text-indent: 80px"><font size="3">Declaro sob-responsabilidade civil e penal, que as informações prestadas acima são verdadeiras e que estou ciente que as  informações não verídicas declaradas, implicarão em penalidades previstas no Artigo 299 do Código Penal (falsidade ideológica), além de sanções civis e administrativas cabíveis.</font></p>
                      <p align="justify" style="margin-left:100px"><font size="2"><i>
                      Art. 299 - Omitir, em documento público ou particular, declaração que dele devia constar, ou nele inserir ou fazer inserir declaração falsa ou diversa da que devia ser escrita, como fim de prejudicar direito, criar obrigação ou alterar a verdade sobre fato juridicamente relevante:
                      Pena - reclusão, de um a cinco anos, e multa, se o documento é público, e reclusão de um a três anos, e multa, se o documento é particular.
</i></font></p>


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
                      <p align="right" class="um"><br/>

                      </p>

<table align='center'>
<tr valign="top" style="text-align:center">
                        		<td  bgcolor="#FFFFFF"  style="border: 0px solid #00000a; text-align:center"> ___________________________________________&nbsp;
                        			<p class="um" style="margin-top: 0cm; text-align:center"><b>

<?php echo ($testemunha['nome_pessoa']);?>
</b></p>
                        		</td>
                        		<td  bgcolor="#ffffff" style="border: 0px solid #00000a; text-align:center">&nbsp;___________________________________________
                       			  <p class="um" style="margin-top: 0cm; text-align:center"><b><?php echo ($registro['nome_pessoa']);?></b></p>
	</td>
  </tr>
</table>


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
    <input type="hidden" name="tipo_relatorio" value="Declaração de testemunha" id="tipo_relatorio">
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
