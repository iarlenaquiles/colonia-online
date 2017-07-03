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

                          <p align="center"><?php echo '<img width="100" height="114" src="'.base_url("uploads/temp/logo_republica.png").'"/>';?></p>

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
                          <p align="center" class="header" style="line-height: 100%">          <font size="3" style="font-size: 14pt"><b>RELATÓRIO DE EXERCÍCIO DE ATIVIDADE PESQUEIRA
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
                        <p style="margin-bottom: 0cm; line-height: 100%"><b>V – DECLARAÇÃO
                        DE RESPONSABILIDADE</b></p>
                        <center>

                          <table width="100%" cellpadding="4" cellspacing="0">
                          	<col width="43*">
                          	<col width="43*">
                          	<col width="43*">
                          	<col width="43*">
                          	<col width="43*">
                          	<col width="43*">
                          	<tr>
                          		<td colspan="6" width="100%" valign="top" style="border: 1px solid #000000; padding: 0.1cm; border-bottom: 0px;">
                          			<p>20 - Declaro, sob-responsabilidade civil e penal, que as
                          			informações prestadas neste Relatório são verdadeiras e que
                          			estou ciente que as informações não verídicas declaradas
                          			implicarão em penalidades previstas no Artigo 299 do Código
                          			Penal (Falsidade Ideológica), além de sansões civis e
                          			administrativas cabíveis.</p>
                          		</td>
                          	</tr>
                          	<tr>
                          		<td colspan="6" width="100%" valign="top" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
                          			<p>___________________________________________________________________, _____ de
                          			________________ de _____.</p>
                          		</td>
                          	</tr>



                          	<tr valign="top">
                          		<td colspan="2" width="50%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 0px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                          			<p align="center">Local</p>
                          		</td>
                          		<td colspan="2" width="33%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 0px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                          			<p align="center">Data</p>
                          		</td>
                          		<td width="17%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 0px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
                          			<p><br/>

                          			</p>
                          		</td>
                              <td width="17%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
                          			<p><br/>

                          			</p>
                          		</td>
                          	</tr>



                          	<tr valign="top">
                          		<td width="17%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 0px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                          			<p><br/>

                          			</p>
                          		</td>
                          		<td width="17%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 0px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                          			<p><br/>

                          			</p>
                          		</td>
                          		<td width="17%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 0px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                          			<p><br/>

                          			</p>
                          		</td>
                          		<td width="17%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 0px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                          			<p><br/>

                          			</p>
                          		</td>
                          		<td width="17%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 0px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                          			<p><br/>

                          			</p>
                          		</td>
                          		<td width="17%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
                          			<p><br/>

                          			</p>
                          		</td>
                          	</tr>



                          	<tr valign="top">
                          		<td colspan="4" width="67%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                          			<p align="center">___________________________________________________</p>
                          		</td>
                          		<td align="right" rowspan="3" colspan="2" width="33%" style="border-bottom: 1px solid #000000; border-left: 0px solid #000000; border-right: 1px solid #000000; padding: 0.1cm">
                          			<p><img src="data:image/png;base64,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" name="Figura1" align="left" width="114" height="119" border="0"/>
                          <br/>

                          			</p>
                          		</td>
                          	</tr>
                          	<tr valign="top">
                          		<td colspan="4" width="67%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                          			<p align="center">ASSINATURA DO (A) PESCADOR (A)</p>
                          		</td>
                          	</tr>
                          	<tr valign="top">
                          		<td width="17%" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                          			<p><br/>

                          			</p>
                          		</td>
                          		<td width="17%" style="border-top: none; border-bottom: 1px solid #000000; border-left: 0px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                          			<p><br/>

                          			</p>
                          		</td>
                          		<td width="17%" style="border-top: none; border-bottom: 1px solid #000000; border-left: 0px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                          			<p><br/>

                          			</p>
                          		</td>
                          		<td width="17%" style="border-top: none; border-bottom: 1px solid #000000; border-left: 0px solid #000000; border-right: 0px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                          			<p><br/>

                          			</p>
                          		</td>
                          	</tr>
                          </table>

                      </center>
                      <p style="margin-bottom: 0cm; line-height: 100%"><b>VI – HOMOLOGAÇÃO
                      PELA ENTIDADE REPRESENTATIVA DA CATEGORIA OU DOIS PESCADORES
                      PROFISSIONAIS</b></p>
                      <center>

                        <table width="100%" cellpadding="4" cellspacing="0">
                        	<col width="192*">
                        	<col width="64*">
                        	<tr>
                        		<td colspan="2" width="100%" valign="top" style="border-top: 1px solid #000000; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;  padding: 0.1cm">
                        			<p>21 - NOME DA ENTIDADE: <?php echo $dadosColonia['nome_colonia'];?>
                        			</p>
                        		</td>
                        	</tr>
                        	<tr>
                        		<td colspan="2" width="100%" valign="top" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
                        			<p>22 - CNPJ DA ENTIDADE: <?php echo $dadosColonia['cnpj'];?></p>
                        		</td>
                        	</tr>
                        	<tr>
                        		<td colspan="2" width="100%" valign="top" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
                        			<p>23 - NOME DO PRESIDENTE DA ENTIDADE: <?php
                                foreach($cargos as $cargo){
                                  if(!empty($dadosColonia['id_pessoa_presidente']) && $cargo['id_pessoa'] == $dadosColonia['id_pessoa_presidente']){

                                      echo strtoupper($cargo['nome_pessoa']);

                                    }
                                  }
                                ?></p>
                        		</td>
                        	</tr>
                        	<tr>
                        		<td colspan="2" width="100%" valign="top" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
                        			<p>24 - CPF DO PRESIDENTE DA ENTIDADE: <?php
                                foreach($cargos as $cargo){
                                  if(!empty($dadosColonia['id_pessoa_presidente']) && $cargo['id_pessoa'] == $dadosColonia['id_pessoa_presidente']){

                                      echo strtoupper($cargo['cpf_cnpj']);

                                    }
                                  }
                                ?>
                        			</p>
                        		</td>
                        	</tr>
                        	<tr>
                        		<td colspan="2" width="100%" valign="top" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
                        			<p>Declaro, sob-responsabilidade civil e penal, que as informações
                        			prestadas neste Relatório, são verdadeiras e que estou ciente
                        			que as informações não verídicas declaradas, implicarão em
                        			penalidades previstas no Artigo 299 do Código Penal (Falsidade
                        			Ideológica), além de sansões civis e administrativas cabíveis.</p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="75%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.1cm; padding-right: 0cm">
                        			<p align="center">_________________________________________________</p>
                        		</td>
                        		<td rowspan="5" width="25%" style="border-top: none; border-bottom: 1px solid #000000; border-left: 0px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
                        			<p align="center"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHMAAAB0CAIAAAA5JJoJAAAKmklEQVR4nO2deVgT1xrGE4SIbIIWBKWgWEFZ1IIbi7hUIaKgVQQUaBEFF6qidlWryG3VPrXiVq1asb2CG7ggqAGtC3oFN7SgICiugIiyCCqLkvRLDp3mTIKVMGSeZ+75PfPHy+Ek8/KS+ZJMzjfRlEgkPEIboCn/w6vy0t3jLMWvG0A7TI10XhgD4o5o96mlgWiC16ZU8yEeIE4vC759LA6Elo5+cFqppraORCyOE5rVVpTBoIXbWOG6FBBlNy8d/nQwuq3rl5vs/CJAXN224uq2KBB8jXZ+iXkdLXqBPjzNuSwnE4ShpY3fgVs0M/ZT5rssWkc3s1Fk7uyJm9ELTi3V7KCLmXH1Eq4/CuJp7uVDnwz628xGO7/PQGRtj76ydbnMjIbMjDXopFCXJ9kZIOBH/4P5IGornoCZxoZ6qZmAeS6fr5eaSd1zaslUdIdjNhx/30XYbLI6nU1nZNTTsv9AOBU22uCI6F2wyY+As+C0J7RpJnaDwq/Qjwmn8OWw0QYn7MygjTBuxth2oKIZx7BlsNEGx8deoI106NRl+oU6uhnPKbDJj5yJChke9RvSmjwCcxSk/K482QQ/u8n7b7LgiItgyVbezWXLBzeAZx1Kk2rAJJ+cLKM0lqxpP1e1m+EU7QTalMaS9dlxXu1mOAupBkwS52kWlPoYaSzZmpJ7+l17sGGJI8C7G0pjye6baDMjs0HtfrgJlqz4zWu2fHADi6HjKE3qLJMIY5IpjSU7YOYKtZvhLFiyiucmCC2i7MZFE/umc3ukGjBJUqhL2KVGpLFkcxO32PrOZsMSR5CIxZTGkj2/eg5JlilINWAS1y83UhpLlq+hoXYznAJ9AoTAz8j8Ss7IMAaWbJe+zmz54AZZO75znL4UaVJnmeTKlm+VJ5u6cLzn2iQ2LHEQLNkH6UfY8sENNNr9kyepBkziuzeb0liyHTqZqN0MpzDs0YfSWLKK60oIKkOqAZMcCXP32Z6ONJZsY0Od/Oe6hJZSeu0cpbFkd3mYhpypaundVdzOvpmwmSdbVmYfMFfb8L2ynMyCo7v4fL71uE+N7QaWXj+vqa3zXm9HmFOefz33wC/oht0GjrQa7fckOyM/KZbHk1h7h5j2d+NJzxg1XlgT6ThjKdxhZeHNG/ukb8a1O3bu6eHfqVdfdFvqfjpaWNv6znr1tKTqYYG+qSVtMm134AGmleVcrK1oqnvdBo2yGuVLM9zSBJSCJdvw4rkKd/Gi9KGRlV3vj2c8TE++uOErO7+I7Li17t9u50kkZ6OnO4Uvr7p/S6BniJKteXwfJveZGMaTrfKsupeXEx/jvnRb4+v600uD3RZvMTDvWXz5FCRSmLbPPmDeiyePDC1tbCfPfvm0JDXSe3JC07IzuJ/O1v0gCPi3pX8XDuE+y8vi8zVok2m7K7txEaZ9GLoY/n2iSG/humQYfHYri2aY+v+1FMPuvZUnqzIamlqaAm14YIpfN9w69OugeasFeh1hfGDE93kHthr1tJOfXFdZ9vzRHZ5sHeft4/GO4csE+obw4+g1B9EpoULRnuFRO8+tmg3J/nMziUTPzJK+U20d8yEeuQlb6J+Nyk2W3x0aaSdoz5MFjUqfomHnRTGq5eCXmEdpLNleXsGq3WNByu9wQMEfMzjyx4w1kR2Mml69weFc97ycNrnybm7RBREIM8dhteWl2gadQGf8tKC6+C7EZOMzreJODmTxpvZldVEh/OreHweqHuS/evbYzNFd6d61dPQa65sWtypOlt+d0pvXV1e83bBqYMmOiP6vavcCRyUcj0ib2A8uykjt8dEk0CC69HWhTe42eDQ1GY7ERxmpkCY8TAqSf6uvqXqQntylnys8l1q4jb0j2mNsO6CnZ4Cdv/TsnGj+OF4IfdeNDfW1FWVauk2LABUny+8OSoei+X81/O7AfwVKPNLMv+qCMnd2RSj8DRKxGB4Ow6J2QmQ39296eE66vt7c2QM9wEFDoYSifCYqpDz/GhyYcETDo74wde/QJVvhPYuFq1fyzBHGfZzk77y+urK9gRHS8Lz3OCu9oaZKVjeVAJN5fx9PaHdKn50UDav8t8ePMZ9+oRZpLNmizDTUhtAi5Jcv8GTr8UZ+v7uu8qlY3IhKW+8JM2CjJtCWw8NkeKaGWwl0DeAmDlMj0biGlmB87P/kZwrXp1C6+/AJsMn/Fr2uoE1+yzSvTaLmDKsMHGqUxpI9NlcYflmsMF8VtI2M330yVDck5M9oqJkWGX4X8L+EdDC1Dvsp8ylN3t0yCWqtQmDJjvxPnLq9cBcs2Q/GBLLlgxvA+0Z4V400qQZM8sfiAOXJZsYsGrLgJzYscRAs2ez4tSTZVsHnU5JUAyYZI2udRmDJopNABJV532UMpbFkpyTdVbsZzoJ34Rt3ZcsHNzgbHTpsWSzSpM4ySf6RncqTTfCzn7z/BhuWOAitC59c3KBVkC78tiLweBGlyfpZJhHoGlAaS1bxyjQElSHVgEnihF2DRCVIky58Jnn17DGlSRd+W0G68JnEwm0spUmdZRJ0zUIElqxTeJS6vXAXWrL0yxUSWkR5wfXO1v2RJtWASQ4GDQi79AZpvAv/wC+2k2axYYkjSMSNlMa78FfNJskyBakGTOLyxQZKky58JrH3n0tp0oXfVpCziExyLXYltUya1Fkmubx5ifJk0z7/2GPNITYscRAs2ftnDrNkgyOQLvy2YtKePymNJcv4Wv3/N4ysbCmNJRt0rEhhMkFFsGQ1tARs+eAGb+nCryfLEVtD8134nqYhpyvV7oeb4F34NVUs2eAIhpY2lCavupgEff8WgtaFH6R2M5yF1oW/q7l5hHehvrqivexyDTxSDZglTthNeRd+ydUzXZ2Gs+CIKzTbhZ8yayRTXfgE0oXPJPKXFCJ1lknQd4oiyGuDtoK8nmWSuyf2W432Q5pUAyY5+Y1/uNJkM9d/MWT+j2xY4iB4F/6uNSTZVkG68NuIZlcmk9PercTC1YvSWLIBhwvVboazYMnqmnRjywc3OBs9fdiyHUiTOssk+UdilSeb6O/guy+HDUscBEu2opBc3KBVaOnoUZpUAyYJlFsKgyVr4jBE7WY4BbpYOAJLdsLODLWb4SykGjBJvJc5VRBoXfj39bt2Z8ERV3hZVkxpWhe+NenCZwrShc8kzZ43ILQSYXNXnCS94gxCrm/AJOUFf3a27oc0qQZMcjDISXkXft7BrX0mzmTDEkdotgv/3MpZJFmmwJIV6BtuGyD9jMzM0d1721me7BqUiQF9JWLpYq9Bn63qH/I1T3Y58MyYRdIb8PmT4rPQ9T2OzhldfOkkT3YRW2mPDp/f8LI6ztPsTd0rGLTxCUUnLh+kJ6cu9EG7G/VDgtVHviDOr56Tm7iFJ/sKmSBRMVooucfHqqbkHm4mNzHAgWYmZ3dMxtqFNDPHIjyKLp74VzMPz6WIFnjTzfwQkSv7ij4wE3i8CH130t7xPauLpZc9Nv1wKOrxwMxErOw/7RveW9bIKDYpGFnZhV1qpA32DVwIG21w7OYTtBGBrkHo+Ze0QUt37/Ar9NVjbl9vho02OOUI/QLORla2imYcpi6AjTbo9XPau5ixGDpOiZmvfoaNNhiQRP8cS6kZsq5LHfwFF4IjrW2HYSoAAAAASUVORK5CYII=" name="Figura1" align="left" width="115" height="116" border="0"/>
                        <br/>

                        			</p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="75%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                        			<p align="center">LOCAL/DATA</p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="75%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                        			<p><br/>

                        			</p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="75%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                        			<p align="center">___________________________________________________________</p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="75%" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                        			<p align="center">ASSINATURA DO PRESIDENTE DA</p>
                        			<p align="center">ENTIDADE REPRESENTATIVA DA CATEGORIA DO PESCADOR</p>
                        		</td>
                        	</tr>
                        </table>
                        <table width="100%" cellpadding="4" cellspacing="0">
                        	<col width="32*">
                        	<col width="96*">
                        	<col width="32*">
                        	<col width="32*">
                        	<col width="64*">
                        	<tr>
                        		<td colspan="5" width="100%" valign="top" style="border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; border-top: 1px solid #000000;    padding: 0.1cm">
                        			<p>25 - Os Pescadores Profissionais abaixo identificados e
                        			assinados, DECLARA, sob-responsabilidade civil e penal, que as
                        			informações prestadas neste Relatório, são verdadeiras e que
                        			estão cientes de que as informações não verídicas declaradas,
                        			implicarão em penalidades previstas no Artigo 299 do Código
                        			Penal (Falsidade Ideológica), além de sansões civis e
                        			administrativas cabíveis.</p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td colspan="4" width="75%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                        			<p>1o NOME: _________________________________________________</p>
                        		</td>
                        		<td width="25%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
                        			<p><br/>

                        			</p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="50%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                        			<p>CPF: _____________________________</p>
                        		</td>
                        		<td width="0%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                        			<p></p>
                        		</td>
                        		<td width="50%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                        			<p>No RGP: ____________________________</p>
                        		</td>
                        		<td colspan="2" width="0%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
                        			<p></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td colspan="4" width="75%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                        			<p>ASSINATURA:______________________________________________</p>
                        		</td>
                        		<td rowspan="4" width="25%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
                        			<p><img src="data:image/png;base64,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" name="Figura2" align="left" width="115" height="116" border="0"/>
                        <br/>

                        			</p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td colspan="4" width="75%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                        			<p><br/>

                        			</p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td colspan="4" width="75%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                        			<p align="center">_________________________________________________</p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td colspan="4" width="75%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                        			<p align="center">LOCAL/DATA</p>
                        		</td>
                        	</tr>
                        	<tr>
                        		<td colspan="5" width="100%" valign="top" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
                        			<p><br/>

                        			</p>
                        		</td>
                        	</tr>
                        </table>
                        <table width="100%" cellpadding="4" cellspacing="0">
                        	<col width="32*">
                        	<col width="96*">
                        	<col width="32*">
                        	<col width="32*">
                        	<col width="64*">
                        	<tr valign="top">
                        		<td colspan="4" width="75%" style="border-top: 0px solid #000000; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                        			<p>2o NOME: _________________________________________________</p>
                        		</td>
                        		<td width="25%" style="border-top: 0px solid #000000; border-left: 0px solid #000000; border-bottom: 0px solid #000000; border-right: 1px solid #000000; padding: 0.1cm">
                        			<p><br/>

                        			</p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="50%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                        			<p>CPF: _____________________________</p>
                        		</td>
                        		<td width="0%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                        			<p></p>
                        		</td>
                        		<td width="50%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                        			<p>No RGP: ____________________________</p>
                        		</td>
                        		<td colspan="2" width="0%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
                        			<p></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td colspan="4" width="75%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                        			<p>ASSINATURA:______________________________________________</p>
                        		</td>
                        		<td rowspan="4" width="25%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
                        			<p><img src="data:image/png;base64,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" name="Figura3" align="left" width="115" height="116" border="0"/>
                        <br/>

                        			</p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td colspan="4" width="75%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                        			<p><br/>

                        			</p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td colspan="4" width="75%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                        			<p align="center">_________________________________________________</p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td colspan="4" width="75%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                        			<p align="center">LOCAL/DATA</p>
                        		</td>
                        	</tr>
                        	<tr>
                        		<td colspan="5" width="100%" valign="top" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
                        			<p><br/>

                        			</p>
                        		</td>
                        	</tr>
                        </table>

                      </center>

                      <p style="margin-bottom: 0cm; line-height: 100%"><b>VII - USO EXCLUSIVO
                      DO MPA</b></p>
                      <center>
                      <table width="100%" cellpadding="4" cellspacing="0">
                      	<col width="205*">
                      	<col width="26*">
                      	<col width="26*">
                      	<tr valign="top">
                      		<td width="80%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                      			<p align="center">RELAÇÃO DA DOCUMENTAÇÃO ENTREGUE</p>
                      		</td>
                      		<td width="10%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                      			<p>SIM</p>
                      		</td>
                      		<td width="10%" style="border: 1px solid #000000; padding: 0.1cm">
                      			<p>NÃO</p>
                      		</td>
                      	</tr>
                      	<tr valign="top">
                      		<td width="80%" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                      			<p>1. Cópia do Número de Inscrição do Trabalhador (NIT) como
                      			segurado especial.</p>
                      		</td>
                      		<td width="10%" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                      			<p><br/>

                      			</p>
                      		</td>
                      		<td width="10%" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
                      			<p><br/>

                      			</p>
                      		</td>
                      	</tr>
                      	<tr valign="top">
                      		<td width="80%" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                      			<p>2. 01(uma) foto 3X4 cm recente, com foco nítido e limpo.</p>
                      		</td>
                      		<td width="10%" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                      			<p><br/>

                      			</p>
                      		</td>
                      		<td width="10%" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
                      			<p><br/>

                      			</p>
                      		</td>
                      	</tr>
                      	<tr valign="top">
                      		<td width="80%" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                      			<p>3.outros:________________________________________________________</p>
                      		</td>
                      		<td width="10%" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
                      			<p><br/>

                      			</p>
                      		</td>
                      		<td width="10%" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
                      			<p><br/>

                      			</p>
                      		</td>
                      	</tr>
                      </table>
                    </center>
<br>
                    <center>
                      <?php echo '<img width="100%" src="'.base_url("uploads/background/mpa.png").'"/>';?>
                    </center>






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
