<style type="text/css">
  @page { margin-left: 2cm; margin-right: 2cm; margin-top: 2cm; margin-bottom: 2cm }
  p { margin-bottom: 0.25cm; direction: ltr; line-height: 100%; text-align: left; orphans: 2; widows: 2 }
</style>
<section class="wrapper site-min-height">
    <!-- page start-->
    <section class="panel">
        <header class="panel-heading">
          Normativa INSS de <?php echo $registro['nome_pessoa'];?>
        </header>
        <div class="panel-body">
          <form id="formDeclaracao">

          <div class="row" id="modeloPdf" style="">
              <div class="col-lg-12">
                  <div class="form-group">
                      <label for="">Normativa:</label>
                      <textarea class="ckeditor form-control" id="editor1" name="normativa" rows="18" style="height:600px"><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
                      <html>
                      <head>
                      	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
                      	<title></title>
                      	<meta name="generator" content="LibreOffice 5.0.6.2 (Linux)"/>
                      	<meta name="author" content="Colonia"/>
                      	<meta name="created" content="2016-08-31T14:06:00"/>
                      	<meta name="changedby" content="Escritório"/>
                      	<meta name="changed" content="2016-08-31T14:06:00"/>
                      	<meta name="AppVersion" content="15.0000"/>
                      	<meta name="DocSecurity" content="0"/>
                      	<meta name="HyperlinksChanged" content="false"/>
                      	<meta name="LinksUpToDate" content="false"/>
                      	<meta name="ScaleCrop" content="false"/>
                      	<meta name="ShareDoc" content="false"/>

                      </head>
                      <body>
                      <p class="um" align="center" style="margin-bottom: 0cm; line-height: 30%"><?php echo '<img width="149,291338583" height="86,929133858" src="'.base_url("uploads/temp/foto_colonia/previdencia.png").'"/>';?></p>
                      <p align="center" class="um">
                      <font size="4" style="font-size: 14pt"><b>ANEXO XII</b></font></p>
                      <p align="center" style="margin-bottom: 0.35cm; line-height: 115%">
                      <font size="4" style="font-size: 14pt"><b>INSTRUÇÃO NORMATIVA Nº 77/PRES/INSS, DE 21 DE JANEIRO DE 2015.</b></font></p>
                      <table width="100%" cellpadding="6" cellspacing="0" style="line-height: 180%">

                      	<tr valign="top">
                      		<td colspan="2" width="182" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="center"><?php echo '<img width="65" height="54" src="'.base_url($dadosColonia['foto']).'"/>';?></p>
                      		</td>

                      		<td colspan="9" width="420" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="center" style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">DECLARAÇÃO DE EXERCICIO DE ATIVIDADE RURAL</font></p>
                      			<p align="center"><font size="3" style="font-size: 12pt">N°</font><font size="3" style="font-size: 12pt"><b>:
                      			___________/<?php setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );

                      		 date_default_timezone_set( 'America/Sao_Paulo' ); echo strftime( '%Y', strtotime( date( 'Y' ) ) );
                      		 ?>
                      			</b></p>
                      		</td>
                      	</tr>


                      	<tr>
                      		<td colspan="11" width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p><font size="3" style="font-size: 12pt">I &minus; DADOS DO SEGURADO:</font></p>
                      		</td>
                      	</tr>
                      	<tr valign="top">
                      		<td colspan="7" width="336" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #000001; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">



                      <p>		1 &minus; <font size="3" style="font-size: 12pt"> NOME:  </font><font size="3" style="font-size: 12pt"><b><?php echo strtoupper($registro['nome_pessoa']);?></b></font></p>


                      		</td>
                      		<td colspan="3" width="125" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p>2 &minus; <font size="3" style="font-size: 12pt">APELIDO: </font><font size="3" style="font-size: 12pt"><b><?php echo strtoupper($registro['apelido']);?></b></font></p>
                      		</td>
                      		<td width="129" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      	<p><font size="3" style="font-size: 12pt">3 - DN: </font><font size="3" style="font-size: 12pt"><b><?php echo $registro['data_nascimento']; ?></b></font></p>
                      		</td>
                      	</tr>
                      	<tr valign="top">
                      		<td colspan="4" width="254" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #000001; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p style="margin-bottom: 0cm">
                      			<font size="3" style="font-size: 12pt">4 &minus; RG: </font><font size="3" style="font-size: 12pt"><b><?php echo strtoupper($registro['numero_rg']);?></b></font></p>

                      		</td>
                      		<td colspan="4" width="164" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #000001; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p><font size="3" style="font-size: 12pt">5
                      			&minus; CPF: </font><span style="text-transform: uppercase"><font size="3" style="font-size: 12pt"><b><?php echo strtoupper($registro['cpf_cnpj']);?></b></font></span></p>
                      		</td>
                      		<td colspan="3" width="172" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p><font size="3" style="font-size: 12pt">6 &minus; ESTADO:</font><font size="3" style="font-size: 12pt"><b>
                      			<?php echo strtoupper($registro['estado_civil']);?></b></font></p>
                      		</td>
                      	</tr>
                      	<tr>
                      		<td colspan="11" width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">7
                      			&minus; ENDERE&Ccedil;O DE RESID&Ecirc;NCIA:</font><font size="3" style="font-size: 12pt"><b>
                      			<?php echo strtoupper($registro['endereco_logradouro']);?>, <?php echo strtoupper($registro['endereco_numero']);?></b></font></p>

                      		</td>
                      	</tr>
                      	<tr valign="top">
                      		<td colspan="3" width="227" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #000001; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p><font size="3" style="font-size: 12pt">8 &minus; BAIRRO: </font><font size="3" style="font-size: 12pt"><b><?php echo strtoupper($registro['endereco_bairro']);?></b></font></p>
                      		</td>
                      		<td colspan="6" width="226" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p><font size="3" style="font-size: 12pt">9 &minus;</font><font size="3" style="font-size: 12pt"><b>
                      			</b></font><font size="3" style="font-size: 12pt">MUNIC&Iacute;PIO: </font><font size="3" style="font-size: 12pt"><b><?php
                      			foreach($cidades as $cidade){

                      					 if(!empty($dadosColonia['id_municipio']) && $cidade['id_cidade'] == $dadosColonia['id_municipio']) echo $cidade['nome_cidade'];

                      			}
                      			?></b></font></p>
                      		</td>
                      		<td colspan="2" width="137" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">10
                      			&minus;</font><font size="3" style="font-size: 12pt"><b> </b></font><font size="3" style="font-size: 12pt">UF:
                      			</font><font size="3" style="font-size: 12pt"><b><?php
                      			foreach($estados as $estado){

                      				 if(!empty($dadosColonia['id_estado']) && $estado['id_estado'] == $dadosColonia['id_estado']) echo strtoupper($estado['uf']);

                      			}
                      			?></b></font></p>

                      		</td>
                      	</tr>
                      	<tr valign="top">
                      		<td colspan="6" width="327" height="25" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #000001; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">11
                      			&minus;</font><font size="3" style="font-size: 12pt"><b> </b></font><font size="3" style="font-size: 12pt">TITULO
                      			ELEITORAL N°: </font><font size="3" style="font-size: 12pt"><b><?php echo strtoupper($registro['num_titulo']);?></b></font></p>

                      		</td>
                      		<td colspan="5" width="276" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p><font size="3" style="font-size: 12pt">12 &minus;</font><font size="3" style="font-size: 12pt"><b>
                      			</b></font><font size="3" style="font-size: 12pt">CTPS/CP </font><font size="3" style="font-size: 12pt"><b><?php echo strtoupper($registro['numero_ctps']);?>,
                      			</b></font><font size="3" style="font-size: 12pt">S&Eacute;RIE</font><font size="3" style="font-size: 12pt"><b>:
                      			<?php echo strtoupper($registro['serie_ctps']);?> - <?php
                      			foreach($estados as $estado){

                      				 if(!empty($registro['estado_emissao_ctps']) && $estado['id_estado'] == $registro['estado_emissao_ctps']) echo strtoupper($estado['uf']);

                      			}
                      			?></b></font></p>
                      		</td>
                      	</tr>
                      	<tr>
                      		<td colspan="11" width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">13
                      			&minus;</font><font size="3" style="font-size: 12pt"><b> </b></font><font size="3" style="font-size: 12pt">PONTO
                      			DE REFER&Ecirc;NCIA: </font><font size="3" style="font-size: 12pt"><b><?php echo strtoupper($registro['endereco_complemento']);?></b></font></p>



                      		</td>
                      	</tr>
                      	<tr>
                      		<td colspan="11" width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">14</font><font size="3" style="font-size: 12pt"><b>
                      			&minus; </b></font><font size="3" style="font-size: 12pt">CONFRONTANTES
                      			OU VIZINHOS: </font><font size="3" style="font-size: 12pt"><b><?php echo strtoupper($registro['vizinhos']);?></b></font></p>

                      		</td>
                      	</tr>
                      	<tr>
                      		<td colspan="11" width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">15
                      			&minus;</font><font size="3" style="font-size: 12pt"><b> </b></font><font size="3" style="font-size: 12pt">N°
                      			DA FILIA&Ccedil;&Atilde;O NO SINDICATO (SE HOUVER): </font><font size="3" style="font-size: 12pt"><b><?php echo strtoupper($registro['numero_carteira']);?></b></font></p>

                      		</td>
                      	</tr>
                      	<tr>
                      		<td colspan="11" width="614" height="23" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">16
                      			&minus;</font><font size="3" style="font-size: 12pt"><b> </b></font><font size="3" style="font-size: 12pt">DATA
                      			DA FILIA&Ccedil;&Atilde;O ( QUANDO FILIADO): </font><font size="3" style="font-size: 12pt"><b><?php echo date('d/m/Y', strtotime($registro['data_filiacao'])); ?></b></font></p>

                      		</td>
                      	</tr>
                      	<tr>
                      		<td colspan="11" width="614" height="24" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p><font size="3" style="font-size: 12pt">17 &minus;</font><font size="3" style="font-size: 12pt"><b>
                      			</b></font><font size="3" style="font-size: 12pt">PROFISS&Atilde;O
                      			ATUAL</font><font size="3" style="font-size: 12pt"><b>: <?php echo strtoupper($registro['profissao_atual']);?></b></font><font size="3" style="font-size: 12pt">
                      			</font>
                      			</p>
                      		</td>
                      	</tr>
                      	<tr>
                      		<td colspan="11" width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p><font size="3" style="font-size: 12pt">18 &minus;</font><font size="3" style="font-size: 12pt"><b>
                      			</b></font><font size="3" style="font-size: 12pt">CATEGORIA DO
                      			TRABALHADOR RURAL OU PESCADOR ARTESANAL: </font><font size="3" style="font-size: 12pt"><b><?php echo strtoupper($registro['profissao_atual']);?></b></font><font size="3" style="font-size: 12pt">
                      			</font><font size="3" style="font-size: 12pt"><b> </b></font>
                      			</p>
                      		</td>
                      	</tr>
                      	<tr>
                      		<td colspan="11" width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">19
                      			&minus;</font><font size="3" style="font-size: 12pt"><b> </b></font><font size="3" style="font-size: 12pt">REGIME
                      			DE TRABALHO: (  ) INDIVIDUALMENTE  ( </font><font size="3" style="font-size: 12pt"><b>X</b></font><font size="3" style="font-size: 12pt">
                      			) REGIME DE ECONOMIA FAMILIAR</font><font size="3" style="font-size: 12pt"><b>
                      			</b></font>
                      			</p>

                      		</td>
                      	</tr>
                      	<tr>
                      		<td colspan="11" width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p><font size="3" style="font-size: 12pt"><b>II &minus; </b></font><font size="3" style="font-size: 12pt">DADOS
                      			DA PROPRIEDADE EM QUE FOI EXERCIDA A ATIVIDADE RURAL:</font></p>
                      		</td>
                      	</tr>
                      	<tr valign="top">
                      		<td width="152" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #000001; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="center"><font size="3" style="font-size: 12pt">NOME DO
                      			PROPRIET&Aacute;RIO</font></p>
                      		</td>
                      		<td colspan="4" width="157" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="center"><font size="3" style="font-size: 12pt">ENDERE&Ccedil;O</font></p>
                      		</td>
                      		<td colspan="4" width="132" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="center"><font size="3" style="font-size: 12pt">PER&Iacute;ODO</font></p>
                      		</td>
                      		<td colspan="2" width="137" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="center">CATEGORIA DO TRABALHADOR RURAL</p>
                      		</td>
                      	</tr>
                      	<tr valign="top">
                      		<td width="152" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #000001; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p><?php echo strtoupper($registro['nome_pessoa']);?></p>
                      		</td>
                      		<td colspan="4" width="157" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p><font size="3" style="font-size: 12pt">BAIRRO</font><font size="3" style="font-size: 12pt"><b>:<?php echo strtoupper($registro['endereco_bairro']);?></b></font></p>
                      		</td>
                      		<td colspan="4" width="132" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="center"><?php echo date('d/m/Y', strtotime($registro['data_filiacao'])); ?> <font size="3" style="font-size: 12pt">a
                      				<?php setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );

                      			 date_default_timezone_set( 'America/Sao_Paulo' ); echo strftime( '%d/%m/%Y', strtotime( date( 'Y-m-d' ) ) );
                      			 ?></font></p>
                      		</td>
                      		<td colspan="2" width="137" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="center"><?php echo strtoupper($registro['profissao_atual']);?>
                      			</p>
                      		</td>
                      	</tr>



                      	<tr valign="top">
                      		<td width="152" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #000001; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="center"><br/>

                      			</p>
                      		</td>
                      		<td colspan="4" width="157" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="center"><br/>

                      			</p>
                      		</td>
                      		<td colspan="4" width="132" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p>
                      			</p>
                      		</td>
                      		<td colspan="2" width="137" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="center"><br/>

                      			</p>
                      		</td>
                      	</tr>



                      	<tr valign="top">
                      		<td width="152" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #000001; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="center"><br/>

                      			</p>
                      		</td>
                      		<td colspan="4" width="157" style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="center"><br/>

                      			</p>
                      		</td>
                      		<td colspan="4" width="132" style="border-top: 1px solid #000001; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="center"><br/>

                      			</p>
                      		</td>
                      		<td colspan="2" width="137" style="border-top: 1px solid #000001; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="center"><br/>

                      			</p>
                      		</td>
                      	</tr>
                      	<tr>
                      		<td colspan="11" width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt"><b>III
                      			– INFORMAMO(S) ATIVIDADE(S) DESENVOLVIDA(S) PELO SEGURADO E
                      			DESCREVER, CLARA E OBJETIVAMENTE, A FORMA EM QUE ESTA ATIVIDADE É
                      			OU FOI EXERCIDA, DISCRIMINANDO OS PERÍODOS, SE FOI EXERCIDA EM
                      			PARTE OU EM TODA A SAFRA:</b></font></p>
                      			<p style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">Exemplo:
                      			em relação ás terras trabalhadas pelo segurado: eram de sua
                      			propriedade; estavam sob sua posse ou foi-lhe permitido o
                      			usufruto; ou se pertenciam a um terceiro, a mesma foi explorada
                      			pelo trabalhador por meio de contratos de: arrendamento, parceira,
                      			comodato, meação ( informar quando esse evento ocorreu, ou seja,
                      			o contrato de arrendamento, de parceria). Mesma situação no caso
                      			de pescadores. Em relação ás tarefas: se foram desempenhadas
                      			juntos ou por meio de emprego (s), em regime de economia familiar,
                      			individualmente, como bóia-fria, temporário, safrista, etc.).</font></p>

                      		</td>
                      	</tr>
                      </table>
<div style="page-break-before: always;"> </div>
                      <table width="100%" cellpadding="6" cellspacing="0" style="line-height: 180%">
                      	<tr>
                      		<td colspan="11" width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p><font size="3" style="font-size: 12pt"><b>DECLARA QUE TRABALHA
                      			COMO PESCADOR/MARISQUEIRA, EM REGIME DE ECONOMIA FAMILIAR, </b></font>
                      			</p>
                      		</td>
                      	</tr>
                      	<tr>
                      		<td colspan="11" width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p><font size="3" style="font-size: 12pt"><b>DESDE <?php echo date('d/m/Y', strtotime($registro['data_filiacao'])); ?></b></font></p>
                      		</td>
                      	</tr>
                      	<tr>
                      		<td colspan="11" width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="center"><br/>

                      			</p>
                      		</td>
                      	</tr>


                      	<tr>
                      		<td width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      		<p align="justify" style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt"><b>IV
                      			– DESCREVER QUAIS OS PRODUTOS CULTIVADOS, EXTRAÍDOS OU
                      			CAPTURADOS PELO SEGURADO OU UNIDADE FAMILIAR, OU TIPO DE
                      			ARTESANATO PRODUZIDO, BEM COMO, OS FINS A QUE SE DESTINA:</b></font></p>
                      			<p><font size="3" style="font-size: 12pt">(Subsistência;
                      			comercialização; industrialização; artesanato; quantificar a
                      			produção e informar qual cultura foi explorada).</font>
                      			</p>
                      		</td>
                      	</tr>
                      	<tr>
                      		<td width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="justify" style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt"><b>PEIXE, CAMARÃO E
                      			SIRI</b></font></p>
                      		</td>
                      	</tr>
                      	<tr>
                      		<td width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="center" style="margin-bottom: 0cm"><br/>

                      			</p>
                      		</td>
                      	</tr>
                      	<tr>
                      		<td width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="center" style="margin-bottom: 0cm"><br/>

                      			</p>
                      		</td>
                      	</tr>
                      	<tr>
                      		<td width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="center" style="margin-bottom: 0cm"><br/>

                      			</p>
                      		</td>
                      	</tr>
                      	<tr>
                      		<td width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="center" style="margin-bottom: 0cm"><br/>

                      			</p>
                      		</td>
                      	</tr>
                      	<tr>
                      		<td width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="center" style="margin-bottom: 0cm"><br/>

                      			</p>
                      		</td>
                      	</tr>
                      	<tr>
                      		<td width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="center" style="margin-bottom: 0cm"><br/>

                      			</p>
                      		</td>
                      	</tr>

                        <tr>
                          <td width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                            <p align="justify" style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt"><b>V - DOCUMENTOS EM QUE SE BASEOU PARA EMITIR A DECLARAÇÃO:</b></font></p>
                          </td>
                        </tr>
                        <tr>
                          <td width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">

                            <p align="justify" style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">Apresentar cópia e original ou se a declaração foi feita com	base
                              nas informações	prestadas pelo segurado, informar qual o instrumento que o sindicato utilizou para confrontar	as informações prestadas pelo	trabalhador: declarações
                              prestadas por	terceiros (anexá-las junto à declaração); documentos pertencentes a
                            entidades ou órgãos oficiais (informar qual o documento e	qual a entidade ou órgão para que seja confrontada essa informação).</font></p>
                            <p align="justify" style="margin-bottom: 0cm"><font size="3" style="font-size: 11pt">____________________________________________________________________________________________________________________________________<br>____________________________________________________________________________________________________________________________________<br>____________________________________________________________________________________________________________________________________<br>____________________________________________________________________________________________________________________________________<br>____________________________________________________________________________________________________________________________________<br></font></p>

                          </td>
                        </tr>
                      	<tr>
                      		<td width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p align="justify" style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt"><b>VI &minus; IDENTIFICA&Ccedil;&Atilde;O
                      			DA ENTIDADE:</b></font></p>
                      		</td>
                      	</tr>
                      	<tr>
                      		<td width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      		<p align="justify" style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">Sindicato/
                      			Col&ocirc;nia ( nome do sindicato ou col&ocirc;nia de pescadores )</font></p>
                      			<p align="justify" style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt"><?php echo $dadosColonia['nome_colonia']; ?> </font><font size="3" style="font-size: 12pt"><b>CNPJ:
                      			<?php echo $dadosColonia['cnpj']; ?></b></font></p>
                      			<p align="justify" style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">Endereço
                      			<?php echo $dadosColonia['endereco_rua']; ?> N° <?php echo $dadosColonia['endereco_numero']; ?>, <?php echo $dadosColonia['endereco_bairro']; ?>,</font></p>
                      			<p style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">Fundado
                      			em <?php echo date('d/m/Y', strtotime($dadosColonia['data_fundacao'])); ?>.</font></p>
                      			<p style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">Registro
                      			no órgão federal competente ( se houver ). Registro n° MTE/SEAP/IBAMA ______________ .</font><br><br></p>

                      		</td>
                      	</tr>
                      </table>

                      <table width="100%" cellpadding="6" cellspacing="0" style="line-height: 180%">
                      	<col width="614">
                      	<tr>
                      		<td width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p><font size="3" style="font-size: 12pt"><b>VII &minus; DADOS DO
                      			REPRESENTANTE SINDICAL:</b></font></p>
                      		</td>
                      	</tr>
                      	<tr>
                      		<td width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">Eu,
                      			</font><font size="3" style="font-size: 12pt"><b>JAILSON DA SILVA
                      			SANTOS</b></font></p>
                      			<p style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">RG
                      			N°: 2.538.792, CPF N°: 712.330.671-68,</font></p>
                      			<p style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">Residente
                      			Rua S&atilde;o Pedro N° 96</font></p>
                      			<p style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">Munic&iacute;pio
                      			de Marechal Deodoro, AL. Declaro sob as penas da Lei que todas as
                      			informa&ccedil;&otilde;es por mim prestadas s&atilde;o express&atilde;o da verdade e estou
                      			ciente de que qualquer declara&ccedil;&atilde;o falsa implica nas penalidades
                      			previstas no art. 171 e/ ou no art. 299 do C&oacute;digo Penal.</font></p>

                      			<p style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">Per&iacute;odo
                      			de mandato, cart&oacute;rio e n&uacute;mero de registro da respectiva ata em
                      			que foi eleito 18/04/2016 &agrave; 18/04/2019</font></p>

                      			<p style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">Data:  <?php setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );

                      		 date_default_timezone_set( 'America/Sao_Paulo' ); echo strftime( '%d/%m/%Y', strtotime( date( 'Y-m-d' ) ) );
                      		 ?>.</font></p>

                      			<p style="margin-bottom: 0cm"><br/>

                      			</p>
                      			<p style="margin-bottom: 0cm"><br/>

                      			</p>
                      			<p align="center" style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">______________________________________</font></p>
                      			<p align="center"><font size="3" style="font-size: 12pt">Assinatura
                      			e carimbo</font></p>
                      		</td>
                      	</tr>
                      	<tr>
                      		<td width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p><font size="3" style="font-size: 12pt"><b>VIII &minus; CI&Ecirc;NCIA DO
                      			SEGURADO</b></font></p>
                      		</td>
                      	</tr>
                      	<tr>
                      		<td width="614" valign="top" style="border: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.2cm; padding-right: 0.19cm">
                      			<p style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">Declaro
                      			que estou ciente das informa&ccedil;&otilde;es aqui prestadas.</font></p>

                      			<p align="center" style="margin-bottom: 0cm"><br/>

                      			</p>
                      			<p align="justify" style="margin-bottom: 0cm"><font size="3" style="font-size: 12pt">Eu, ________________________________________________________________, acima qualificado, declaro estar ciente das informações constantes desta declaração e que as mesmas são verdadeiras.


<br><br>Data: ____________________ Assinatura: _______________________________________________<br>


Observação: caso os campos acima não forem suficientes para dispor as informações, poderá ser anexado complemento a este formulário.</font>
                      			<p style="margin-bottom: 0cm"><br/>

                      			</p>

                      			<p><font size="3" style="font-size: 12pt">Observa&ccedil;&atilde;o: caso os
                      			campos acima n&atilde;o forem suficientes para dispor as informa&ccedil;&otilde;es,
                      			poder&aacute; ser.</font></p>
                      		</td>
                      	</tr>
                      </table>
                      <p align="center" style="margin-bottom: 0.35cm; line-height: 115%"><br/>
                      <br/>

                      </p>
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
    <input type="hidden" name="tipo_relatorio" value="Normativa INSS" id="tipo_relatorio">
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
