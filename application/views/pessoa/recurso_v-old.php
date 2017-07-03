<style type="text/css">
  @page { margin-left: 1.27cm; margin-right: 1.27cm; margin-top: 0.75cm; margin-bottom: 0.5cm }
  p { margin-bottom: 0.25cm; direction: ltr; color: #00000a; line-height: 120%; text-align: left; orphans: 2; widows: 2 }
  p.western { font-family: "Calibri", serif; font-size: 11pt; so-language: pt-BR }
  p.cjk { font-family: "DejaVu Sans"; font-size: 11pt; so-language: pt-BR }
  p.ctl { font-family: "DejaVu Sans"; font-size: 11pt; so-language: ar-SA }
</style>
<section class="wrapper site-min-height">
    <!-- page start-->
    <section class="panel">
        <header class="panel-heading">
          Recurso de <?php echo $registro['nome_pessoa'];?>
        </header>
        <div class="panel-body">
          <form id="formDeclaracao">

          <div class="row" id="modeloPdf" style="">
              <div class="col-lg-12">
                  <div class="form-group">
                      <label for="">Recurso:</label>
                      <textarea class="ckeditor form-control" id="editor1" name="recurso" rows="18" style="height:600px">
                        <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
                        <html>
                        <head>
                        	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
                        	<title></title>
                        	<meta name="generator" content="LibreOffice 5.0.6.2 (Linux)"/>
                        	<meta name="author" content="leivan.souza"/>
                        	<meta name="created" content="2016-11-08T15:23:00"/>
                        	<meta name="changed" content="2017-01-02T23:14:32.867137156"/>
                        	<meta name="AppVersion" content="16.0000"/>
                        	<meta name="DocSecurity" content="0"/>
                        	<meta name="HyperlinksChanged" content="false"/>
                        	<meta name="LinksUpToDate" content="false"/>
                        	<meta name="ScaleCrop" content="false"/>
                        	<meta name="ShareDoc" content="false"/>

                        </head>
                        <body lang="pt-BR" text="#00000a" dir="ltr">

                          <p align="center"><?php echo '<img width="75.590551181" height="113.385826772" src="'.base_url("uploads/temp/logo_republica.png").'"/>';?></p>

                          <p align="center" class="header" style="line-height: 30%">  <font size="3" style="font-size: 12pt"><b>MINISTÉRIO DA PESCA E AQUICULTURA</b></font></p>
                          <p align="center" class="header" style="line-height: 30%">           <font size="3" style="font-size: 12pt"><b>SUPERINTENDÊNCIA FEDERAL DA PESCA E AQUICULTURA DE <?php
                          foreach($estados as $estado){

                          	 if(!empty($registro['id_estado']) && $estado['id_estado'] == $registro['id_estado']) echo (strtoupper($estado['nome_estado']));

                          }
                          ?> – SFPA/<?php
                          foreach($estados as $estado){

                          	 if(!empty($registro['id_estado']) && $estado['id_estado'] == $registro['id_estado']) echo ($estado['uf']);

                          }
                          ?></b></font>

                            </p>
                            <br>
                          <p align="center" class="header" style="line-height: 30%">          <font size="3" style="font-size: 14pt"><b>RELATÓRIO DE EXERCÍCIO DE ATIVIDADE PESQUEIRA
PESCADOR PROFISSIONAL ARTESANAL</b></font></p>




                        <center>
                        	<table width="100%" cellpadding="5" cellspacing="0">
                        		<col width="47">
                        		<col width="48">
                        		<col width="4363">
                        		<col width="3">
                        		<col width="1">
                        		<col width="20">
                        		<col width="4365">
                        		<col width="42">
                        		<col width="4366">
                        		<col width="38">
                        		<col width="4359">
                        		<col width="4367">
                        		<col width="53">
                        		<col width="4359">
                        		<col width="53">
                        		<col width="4367">
                        		<col width="4359">
                        		<col width="38">
                        		<col width="4366">
                        		<col width="4359">
                        		<col width="43">
                        		<col width="4364">
                        		<col width="20">
                        		<col width="4359">
                        		<col width="14">
                        		<col width="4363">
                        		<col width="48">
                        		<col width="47">

                        		<tr>
                        			<td colspan="28" width="704" valign="top" bgcolor="#ffffff" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western" align="center" style="margin-top: 0.11cm"><font size="2" style="font-size: 10pt"><b>IDENTIFICAÇÃO
                        				DO(A) PESCADOR(A)</b></font></p>
                        			</td>
                        		</tr>
                        		<tr>
                        			<td colspan="28" width="704" valign="top" bgcolor="#ffffff" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><font size="2" style="font-size: 9pt"><b>Nome:</b> <?php echo $registro['nome_pessoa'];
                                ?></font></p>
                        			</td>
                        		</tr>
                        		<tr>
                        			<td colspan="28" width="704" valign="top" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western">

                        				</p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="8" width="220" height="20" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><font size="2" style="font-size: 9pt"><b>CPF:</b> <?php echo $registro['cpf_cnpj'];
                                ?></font></p>
                        			</td>
                        			<td colspan="9" width="243" bgcolor="#ffffff" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><font size="2" style="font-size: 9pt"><b>Dt.
                        				Nascimento:</b> <?php echo $registro['data_nascimento'];
                                ?></font></p>
                        			</td>
                        			<td colspan="9" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><font size="2" style="font-size: 9pt"><b>NIT:</b> <?php echo $registro['numero_nit'];
                                ?></font></p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="19" width="474" height="20" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1.50pt solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><font size="2" style="font-size: 9pt"><b>Município
                        				de Residência:</b><?php
                                foreach($cidades as $cidade){

                                		 if(!empty($registro['id_cidade']) && $cidade['id_cidade'] == $registro['id_cidade']) echo $cidade['nome_cidade'];

                                }
                                ?></font></p>
                        			</td>
                        			<td colspan="9" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1.50pt solid #00000a; border-left: 1px solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><font size="2" style="font-size: 9pt"><b>UF:</b>  <?php
                                foreach($estados as $estado){

                                	 if(!empty($registro['id_estado']) && $estado['id_estado'] == $registro['id_estado']) echo (strtoupper($estado['uf']));

                                }
                                ?></font></p>
                        			</td>
                        		</tr>
                        		<tr>
                        			<td colspan="28" width="704" valign="top" bgcolor="#f2f2f2" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western" align="center" style="margin-top: 0.11cm"><font size="2" style="font-size: 10pt"><b>FORMA
                        				DE ATUAÇÃO NA ATIVIDADE DE PESCA NO PERÍODO</b></font></p>
                        			</td>
                        		</tr>
                        		<tr>
                        			<td colspan="28" width="704" valign="top" bgcolor="#ffffff" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><font size="2" style="font-size: 9pt"><b>Relação
                        				de Trabalho:</b></font></p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="8" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Individual</b></font></p>
                        			</td>
                        			<td colspan="11" width="243" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				   ) Regime de Parceria</b></font></p>
                        			</td>
                        			<td colspan="9" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Regime de Economia Familiar</b></font></p>
                        			</td>
                        		</tr>
                        		<tr>
                        			<td colspan="28" width="704" valign="top" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1.50pt solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><font size="2" style="font-size: 9pt"><b>Método/Petrecho
                        				de Pesca:</b></font></p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="5" width="132" bgcolor="#ffffff" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Arrasto</b></font></p>
                        			</td>
                        			<td colspan="5" width="133" bgcolor="#ffffff" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Cerco</b></font></p>
                        			</td>
                        			<td colspan="6" width="133" bgcolor="#ffffff" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Puçá</b></font></p>
                        			</td>
                        			<td colspan="7" width="133" bgcolor="#ffffff" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Linha</b></font></p>
                        			</td>
                        			<td colspan="5" width="132" bgcolor="#ffffff" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Covos</b></font></p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="5" width="132" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Espinhel</b></font></p>
                        			</td>
                        			<td colspan="5" width="133" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Emalhe</b></font></p>
                        			</td>
                        			<td colspan="6" width="133" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Tarrafa</b></font></p>
                        			</td>
                        			<td colspan="7" width="133" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Arpão</b></font></p>
                        			</td>
                        			<td colspan="5" width="132" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Outros</b></font></p>
                        			</td>
                        		</tr>
                        		<tr>
                        			<td colspan="28" width="704" valign="top" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1.50pt solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><font size="2" style="font-size: 9pt"><b>Local
                        				onde pratica a Pesca:</b></font></p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="3" width="108" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Mar</b></font></p>
                        			</td>
                        			<td colspan="6" width="109" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Lago ou Lagoa</b></font></p>
                        			</td>
                        			<td colspan="4" width="109" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Represa</b></font></p>
                        			</td>
                        			<td colspan="5" width="109" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Rio</b></font></p>
                        			</td>
                        			<td colspan="7" width="109" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Estuário</b></font></p>
                        			</td>
                        			<td colspan="3" width="108" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Açude</b></font></p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="19" width="474" height="20" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1.50pt solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><font size="2" style="font-size: 9pt"><b>Município
                        				onde pratica a Pesca:</b></font></p>
                        			</td>
                        			<td colspan="9" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1.50pt solid #00000a; border-left: 1px solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><font size="2" style="font-size: 9pt"><b>UF:</b></font></p>
                        			</td>
                        		</tr>
                        		<tr>
                        			<td colspan="28" width="704" valign="top" bgcolor="#f2f2f2" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western" align="center" style="margin-top: 0.11cm"><font size="2" style="font-size: 10pt"><b>RESULTADOS
                        				DAS OPERAÇÕES DE PESCA</b></font></p>
                        			</td>
                        		</tr>
                        		<tr>
                        			<td colspan="28" width="704" valign="top" bgcolor="#ffffff" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><font size="2" style="font-size: 9pt"><b>Qual(is)
                        				Grupos Alvo da Pescaria:</b></font></p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="7" width="168" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western" align="center" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Peixes</b></font></p>
                        			</td>
                        			<td colspan="6" width="169" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" align="center" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Crustáceos</b></font></p>
                        			</td>
                        			<td colspan="8" width="169" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" align="center" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Moluscos</b></font></p>
                        			</td>
                        			<td colspan="7" width="168" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" align="center" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Algas</b></font></p>
                        			</td>
                        		</tr>
                        		<tr>
                        			<td colspan="28" width="704" valign="top" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1.50pt solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><font size="2" style="font-size: 9pt"><b>Meses
                        				em que pescou:</b></font></p>
                        			</td>
                        		</tr>
                          </table>
                            </center>
                              <center>
                              	<table width="100%" cellpadding="5" cellspacing="0">

                              		<tr valign="top">
                              			<td width="47" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                              				<p style="margin-top: 0.11cm; margin-bottom: 0cm"><font size="2" style="font-size: 9pt"><b>(
                              				    ) </b></font>
                              				</p>
                              				<p style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>Jan</b></font></p>
                              			</td>
                              			<td width="48" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                              				<p style="margin-top: 0.11cm; margin-bottom: 0cm"><font size="2" style="font-size: 9pt"><b>(
                              				    ) </b></font>
                              				</p>
                              				<p style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>Fev</b></font></p>
                              			</td>
                              			<td width="48" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                              				<p style="margin-top: 0.11cm; margin-bottom: 0cm"><font size="2" style="font-size: 9pt"><b>(
                              				   )</b></font></p>
                              				<p style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>Mar</b></font></p>
                              			</td>
                              			<td width="48" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                              				<p style="margin-top: 0.11cm; margin-bottom: 0cm"><font size="2" style="font-size: 9pt"><b>(
                              				    )</b></font></p>
                              				<p style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>Abr</b></font></p>
                              			</td>
                              			<td width="53" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                              				<p style="margin-top: 0.11cm; margin-bottom: 0cm"><font size="2" style="font-size: 9pt"><b>(
                              				    ) </b></font>
                              				</p>
                              				<p style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>Mai</b></font></p>
                              			</td>
                              			<td width="53" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                              				<p style="margin-top: 0.11cm; margin-bottom: 0cm"><font size="2" style="font-size: 9pt"><b>(
                              				    ) </b></font>
                              				</p>
                              				<p style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>Jun</b></font></p>
                              			</td>
                              			<td width="53" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                              				<p style="margin-top: 0.11cm; margin-bottom: 0cm"><font size="2" style="font-size: 9pt"><b>(
                              				    ) </b></font>
                              				</p>
                              				<p style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>Jul</b></font></p>
                              			</td>
                              			<td width="53" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                              				<p style="margin-top: 0.11cm; margin-bottom: 0cm"><font size="2" style="font-size: 9pt"><b>(
                              				    ) </b></font>
                              				</p>
                              				<p style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>Ago</b></font></p>
                              			</td>
                              			<td width="48" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                              				<p style="margin-top: 0.11cm; margin-bottom: 0cm"><font size="2" style="font-size: 9pt"><b>(
                              				    )</b></font></p>
                              				<p style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>Set</b></font></p>
                              			</td>
                              			<td width="48" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                              				<p style="margin-top: 0.11cm; margin-bottom: 0cm"><font size="2" style="font-size: 9pt"><b>(
                              				    )</b></font></p>
                              				<p style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>Out</b></font></p>
                              			</td>
                              			<td width="48" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                              				<p style="margin-top: 0.11cm; margin-bottom: 0cm"><font size="2" style="font-size: 9pt"><b>(
                              				   ) </b></font>
                              				</p>
                              				<p style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>Nov</b></font></p>
                              			</td>
                              			<td width="47" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                              				<p style="margin-top: 0.11cm; margin-bottom: 0cm"><font size="2" style="font-size: 9pt"><b>(
                              				    ) </b></font>
                              				</p>
                              				<p style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>Dez</b></font></p>
                              			</td>
                              		</tr>
                              	</table>
                              </center>


                              <center>
                              <table width="100%" cellpadding="5" cellspacing="0">



                        		<tr valign="top">
                        			<td colspan="13" width="347" height="20" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1.50pt solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><font size="2" style="font-size: 9pt"><b>Quantidade
                        				pescada por ano (kg): </b></font>
                        				</p>
                        			</td>
                        			<td colspan="15" width="347" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1.50pt solid #00000a; border-left: 1px solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><font size="2" style="font-size: 9pt"><b>Quantidade
                        				dias que pescou por mês (média):</b></font></p>
                        			</td>
                        		</tr>
                        		<tr>
                        			<td colspan="28" width="704" valign="top" bgcolor="#f2f2f2" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western" align="center" style="margin-top: 0.11cm"><font size="2" style="font-size: 10pt"><b>SISTEMA
                        				DE COMERCIALIZAÇÃO/DESTINO DA PRODUÇÃO</b></font></p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="19" width="474" height="21" bgcolor="#ffffff" style="border-top: 1.50pt solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><font size="2" style="font-size: 9pt"><b>Município
                        				de Comercialização:</b></font></p>
                        			</td>
                        			<td colspan="9" width="220" bgcolor="#ffffff" style="border-top: 1.50pt solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><font size="2" style="font-size: 9pt"><b>UF:</b></font></p>
                        			</td>
                        		</tr>
                        		<tr>
                        			<td colspan="28" width="704" valign="top" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1.50pt solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><font size="2" style="font-size: 9pt"><b>Informar
                        				comprador da Produção:</b></font></p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="4" width="121" bgcolor="#ffffff" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Consumidor direto</b></font></p>
                        			</td>
                        			<td colspan="7" width="145" bgcolor="#ffffff" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Intermediário/Pombeiro</b></font></p>
                        			</td>
                        			<td colspan="6" width="133" bgcolor="#ffffff" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Cooperativa</b></font></p>
                        			</td>
                        			<td colspan="7" width="133" bgcolor="#ffffff" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Feira</b></font></p>
                        			</td>
                        			<td colspan="4" width="132" bgcolor="#ffffff" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Colônia</b></font></p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="5" width="132" bgcolor="#ffffff" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Supermercado</b></font></p>
                        			</td>
                        			<td colspan="5" width="133" bgcolor="#ffffff" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Entreposto</b></font></p>
                        			</td>
                        			<td colspan="6" width="133" bgcolor="#ffffff" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Associação</b></font></p>
                        			</td>
                        			<td colspan="7" width="133" bgcolor="#ffffff" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) Outros Pescadores</b></font></p>
                        			</td>
                        			<td colspan="5" width="132" bgcolor="#ffffff" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.15cm; padding-right: 0.19cm">
                        				<p class="western" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>(
                        				    ) outros</b></font></p>
                        			</td>
                        		</tr>
                        		<tr>
                        			<td colspan="28" width="704" valign="top" bgcolor="#f2f2f2" style="border: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western" align="center"><font size="2" style="font-size: 10pt"><b>PRINCIPAIS
                        				ESPÉCIES</b></font></p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="8" width="220" bgcolor="#ffffff" style="border-top: 1.50pt solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western" align="center" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>Nome
                        				da Espécie</b></font></p>
                        			</td>
                        			<td colspan="11" width="243" bgcolor="#ffffff" style="border-top: 1.50pt solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.18cm; padding-right: 0.19cm">
                        				<p class="western" align="center" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>Quantidade
                        				Média Mensal (Kg)</b></font></p>
                        			</td>
                        			<td colspan="9" width="220" bgcolor="#ffffff" style="border-top: 1.50pt solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.18cm; padding-right: 0.19cm">
                        				<p class="western" align="center" style="margin-top: 0.11cm"><font size="2" style="font-size: 9pt"><b>Preço
                        				Médio por Quilo (R$)</b></font></p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="8" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="11" width="243" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="9" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="8" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="11" width="243" bgcolor="#ffffff" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="9" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="8" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="11" width="243" bgcolor="#ffffff" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="9" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="8" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="11" width="243" bgcolor="#ffffff" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="9" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="8" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="11" width="243" bgcolor="#ffffff" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="9" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="8" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="11" width="243" bgcolor="#ffffff" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="9" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="8" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="11" width="243" bgcolor="#ffffff" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="9" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="8" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="11" width="243" bgcolor="#ffffff" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="9" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="8" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="11" width="243" bgcolor="#ffffff" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="9" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="8" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="11" width="243" bgcolor="#ffffff" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="9" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="8" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="11" width="243" bgcolor="#ffffff" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="9" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="8" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="11" width="243" bgcolor="#ffffff" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="9" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="8" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="11" width="243" bgcolor="#ffffff" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="9" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="8" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="11" width="243" bgcolor="#ffffff" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="9" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        		</tr>
                        		<tr valign="top">
                        			<td colspan="8" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1.50pt solid #00000a; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="11" width="243" bgcolor="#ffffff" style="border: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        			<td colspan="9" width="220" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1.50pt solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.17cm; padding-right: 0.19cm">
                        				<p class="western"><br/>

                        				</p>
                        			</td>
                        		</tr>
                        	</table>
                        </center>

                        


                        <p class="western" align="justify" style="margin-right: 11.04cm; margin-top: 0.14cm; margin-bottom: 0cm; line-height: 115%; page-break-before: always">
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
    <input type="hidden" name="tipo_relatorio" value="Recurso" id="tipo_relatorio">
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
