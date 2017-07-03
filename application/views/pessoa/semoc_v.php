<style type="text/css">
  @page { margin-left: 0.5cm; margin-right: 0.5cm; margin-bottom: 1.27cm }
  p { margin-bottom: 0cm; direction: ltr; text-align: justify; }
  p.western { font-family: "Times New Roman", serif; font-size: 12pt }
  p.cjk { font-size: 12pt }
</style>
<section class="wrapper site-min-height">
    <!-- page start-->
    <section class="panel">
        <header class="panel-heading">
          Semoc de <?php echo $registro['nome_pessoa'];?>
        </header>
        <div class="panel-body">
          <form id="formDeclaracao">

          <div class="row" id="modeloPdf" style="">
              <div class="col-lg-12">
                  <div class="form-group">
                      <label for="">Semoc:</label>
                      <textarea class="ckeditor form-control" id="editor1" name="normativa" rows="18" style="height:600px"><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
                        <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
                        <html>
                        <head>
                        	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
                        	<title></title>
                        	<meta name="generator" content="LibreOffice 5.0.6.2 (Linux)"/>
                        	<meta name="author" content="Deptº de Pesca e Agricultura"/>
                        	<meta name="created" content="2012-08-06T12:47:00"/>
                        	<meta name="changedby" content="claudio.sousa"/>
                        	<meta name="changed" content="2015-03-05T16:59:00"/>
                        	<meta name="AppVersion" content="12.0000"/>
                        	<meta name="Company" content="Ministério da Agricultura"/>
                        	<meta name="DocSecurity" content="0"/>
                        	<meta name="HyperlinksChanged" content="false"/>
                        	<meta name="LinksUpToDate" content="false"/>
                        	<meta name="ScaleCrop" content="false"/>
                        	<meta name="ShareDoc" content="false"/>

                        </head>
                        <body lang="pt-BR" dir="ltr">
                        <div title="header">

                        <p style="text-indent: 1cm; padding-top: 0.04cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0cm; line-height: 90%; margin-bottom: 0cm">
                        	 <img src="data:image/png;base64,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" name="Figura1" align="left" hspace="11" width="43" height="48" border="0"/>

                        	<font size="4" style="font-size: 14pt"><font face="Verdana, serif"><font size="2" style="font-size: 10pt">
                        	   MINISTERIO DA PESCA E AQUICULTURA</font></font></font></p>
                        	<p style="text-indent: 1cm; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0cm; line-height: 90%; margin-top: 0cm; margin-bottom: 0cm">
                        	      <font size="4" style="font-size: 14pt"><font face="Verdana, serif"><font size="2" style="font-size: 10pt">SECRETARIA
                        	DE MONITORAMENTO E CONTROLE DA PESCA E AQUICULTURA</font></font></font></p>
                        	<p class="western" align="left" style="text-indent: 1cm; margin-top: 0%; margin-bottom: 0cm; line-height: 100%">
                        	<font face="Arial, serif"><font size="1" style="font-size: 8pt"><font face="Verdana, serif"><font size="2" style="font-size: 10pt">
                        	    </font></font><font face="Verdana, serif"><font size="2" style="font-size: 10pt"><b>FORMULÁRIO
                        	DE </b></font></font><font face="Verdana, serif"><font size="2" style="font-size: 10pt"><b>REQUERIMENTO
                        	DE LICENÇA DE PESCADOR PROFISSIONAL</b></font></font></font></font></p>
                        	<p class="western" align="left" style="margin-left: 0.75cm; margin-bottom: 0.04cm">
                        	<br/>
                        	</p>
                          <table width="267" align="right" cellpadding="6" cellspacing="0">

    												<tr valign="top">
    													<td width="18" style="border: none; padding: 0.1cm">
    														<p style="margin-left: -0.28cm; margin-right: -1.25cm"><font face="Verdana, sans-serif"><font size="2" style="font-size: 10pt"><b>NUP: </b></font></font></p>
    													</td>
    													<td width="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.19cm; padding-right: 0cm">
    														<p style="margin-right: -1.25cm"><br/>

    														</p>
    													</td>
    													<td width="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.19cm; padding-right: 0cm">
    														<p style="margin-right: -1.25cm"><br/>

    														</p>
    													</td>
    													<td width="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.19cm; padding-right: 0cm">
    														<p style="margin-right: -1.25cm"><br/>

    														</p>
    													</td>
    													<td width="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.19cm; padding-right: 0cm">
    														<p style="margin-right: -1.25cm"><br/>

    														</p>
    													</td>
    													<td width="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.19cm; padding-right: 0cm">
    														<p style="margin-right: -1.25cm"><br/>

    														</p>
    													</td>
    													<td width="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.19cm; padding-right: 0cm">
    														<p style="margin-right: -1.25cm"><br/>

    														</p>
    													</td>
    													<td width="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.19cm; padding-right: 0cm">
    														<p style="margin-right: -1.25cm"><br/>

    														</p>
    													</td>
    													<td width="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.19cm; padding-right: 0cm">
    														<p style="margin-right: -1.25cm"><br/>

    														</p>
    													</td>
    													<td width="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.19cm; padding-right: 0cm">
    														<p style="margin-right: -1.25cm"><br/>

    														</p>
    													</td>
    													<td width="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.19cm; padding-right: 0cm">
    														<p style="margin-right: -1.25cm"><br/>

    														</p>
    													</td>
    													<td width="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.19cm; padding-right: 0cm">
    														<p style="margin-right: -1.25cm">
    														</p>
    													</td>
    													<td width="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.19cm; padding-right: 0cm">
    														<p style="margin-right: -1.25cm"><br/>

    														</p>
    													</td>
    													<td width="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.19cm; padding-right: 0cm">
    														<p style="margin-right: -1.25cm"><br/>

    														</p>
    													</td>
    													<td width="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.19cm; padding-right: 0cm">
    														<p style="margin-right: -1.25cm"><br/>

    														</p>
    													</td>
    													<td width="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.19cm; padding-right: 0cm">
    														<p style="margin-right: -1.25cm"><br/>

    														</p>
    													</td>
    													<td width="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.19cm; padding-right: 0cm">
    														<p style="margin-right: -1.25cm"><br/>

    														</p>
    													</td>
    													<td width="2" style="border: 1px solid #000000; padding: 0cm 0.19cm">
    														<p style="margin-right: -1.25cm"><br/>

    														</p>
    													</td>
    												</tr>
    											</table>
                        	<p class="western" align="left" style="margin-left: 0.75cm; margin-bottom: 0.04cm">
                        	<font face="Arial, serif"><font size="1" style="font-size: 8pt"><font face="Verdana, serif"><font size="2" style="font-size: 10pt"><b>				</b></font></font></font></font></p>

                        </div>
                        <table width="100%" cellpadding="4" cellspacing="0" >

                        	<tbody>
                        		<tr>
                        			<td width="53" height="9" valign="bottom" bgcolor="#d8d8d8" style="border: 1px solid #00000a; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt"><b>A</b></font></font></font></font></font></p>
                        			</td>
                        			<td colspan="9" width="481" valign="bottom" bgcolor="#d8d8d8" style="border-top: 1.00pt solid #00000a; border-bottom: 1.00pt solid #00000a; border-left: 1px solid #00000a; border-right: none; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt"><b>IDENTIFICAÇÃO
                        				DO INTERESSADO</b></font></font></font></font></font></p>
                        			</td>
                        			<td rowspan="5" colspan="1" width="125" height="170" bgcolor="#ffffff" style="border-top: 1.00pt solid #00000a; border-bottom: 1.00pt solid #000001; border-left: 1.00pt solid #00000a; border-right: 1.00pt solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="center"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">Foto</font></font></font></font></font></p>
                        				<p class="western" align="center"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">3
                        				x 4</font></font></font></font></font></p>
                        			</td>
                        		</tr>


                        		<tr>
                              <td colspan="9" width="534" valign="bottom" bgcolor="#d8d8d8" style="border-top: 1.00pt solid #00000a; border-bottom: 1.00pt solid #00000a; border-left: 1px solid #00000a; border-right: none; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">01-
                        				Nome do Interessado:</font></font></font></font></font></p>
                        			</td>
                        		</tr>


                        		<tr>
                        			<td colspan="9" width="481" height="9" valign="bottom" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: none; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0cm">
                        				<p class="western" align="left"><font color="#000000">&nbsp;</font><?php echo strtoupper($registro['nome_pessoa']); ?></p>
                        			</td>
                        		</tr>


                        		<tr>
                        			<td colspan="4" width="211" height="9" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Verdana, serif">02-
                        				CPF (Somente números):</font></font></font></font></p>
                        			</td>
                        			<td colspan="5" width="323" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Verdana, serif">03-
                        				Nacionalidade</font></font></font></font></p>
                        			</td>
                        		</tr>


                        		<tr>
                        			<td colspan="4" width="211" height="43" valign="bottom" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><?php echo strtoupper($registro['cpf_cnpj']); ?>

                        				</p>
                        			</td>
                        			<td colspan="5" width="323" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: none; padding: 0cm">
                        				<p class="western" align="right"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Verdana, serif">(
                        				 ) Brasileira (  ) Naturalizado (  ) Estrangeiro  </font></font><font color="#000000"><font face="Verdana, serif"><font size="1" style="font-size: 6pt">(DATA
                        				VALIDADE VISTO)</font></font></font><font color="#000000"><font face="Verdana, serif">
                        				                      ___/___/____</font></font></font></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr>
                        			<td colspan="5" width="211" height="23" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Verdana, serif">04-
                        				N° do Doc. Oficial de Identificação</font></font></font></font></p>
                        			</td>
                        			<td colspan="2" width="211" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Verdana, serif">05-
                        				Órgão Emissor/UF:</font></font></font></font></p>
                        			</td>
                        			<td colspan="3" width="104" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Verdana, serif">06-
                        				Data emissão:</font></font></font></font></p>
                        			</td>
                        			<td width="99" bgcolor="#d8d8d8" style="border-top: none; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Verdana, serif">07-
                        				Data de Nascimento:</font></font></font></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr valign="bottom">
                        			<td colspan="5" width="211" height="9" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font color="#000000">&nbsp;</font><?php echo strtoupper($registro['numero_rg']); ?></p>
                        			</td>
                        			<td colspan="2" width="211" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font color="#000000">&nbsp;</font><?php echo ($registro['orgao_expedicao_rg']);?>/<?php
                                foreach($estados as $estado) {
                                  if(!empty($registro['estado_expedicao_rg']) && $estado['id_estado'] == $registro['estado_expedicao_rg']) echo ($estado['uf']); } ?></p>
                        			</td>
                        			<td colspan="3" width="104" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="center"><font color="#000000">&nbsp;</font><?php if($registro['data_expedicao_rg'] == '0000-00-00'){echo "00/00/0000"; }else{echo date('d/m/Y', strtotime($registro['data_expedicao_rg']));} ?></p>
                        			</td>
                        			<td width="99" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="center"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Verdana, serif"><?php echo $registro['data_nascimento']; ?></font></font></font></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr>
                        			<td colspan="2" width="70" height="9" valign="bottom" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Verdana, serif">08-
                        				Sexo:</font></font></font></font></p>
                        			</td>
                        			<td colspan="2" width="132" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Verdana, serif">09-
                        				Nome Pai:</font></font></font></font></p>
                        			</td>
                        			<td colspan="7" width="430" valign="bottom" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font color="#000000">&nbsp;</font><?php echo strtoupper($registro['nome_pai']);?></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr>
                        			<td colspan="2" width="70" height="9" valign="bottom" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Verdana, serif">(
                        				 ) F  (  ) M</font></font></font></font></p>
                        			</td>
                        			<td colspan="2" width="132" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Verdana, serif">10-
                        				Nome da Mãe:</font></font></font></font></p>
                        			</td>
                        			<td colspan="7" width="430" valign="bottom" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font color="#000000">&nbsp;</font><?php echo strtoupper($registro['nome_mae']);?></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr valign="bottom">
                        			<td colspan="2" width="70" height="10" bgcolor="#d9d9d9" style="border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">11-
                        				Apelido:</font></font></font></font></font></p>
                        			</td>
                        			<td colspan="2" width="132" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font color="#000000">&nbsp;</font><?php echo strtoupper($registro['apelido']);?></p>
                        			</td>
                        			<td colspan="2" width="141" bgcolor="#d9d9d9" style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">12-
                        				N°PIS/PASEP/NIT/NIS:</font></font></font></font></font></p>
                        			</td>
                        			<td colspan="5" width="281" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font color="#000000">&nbsp;</font><?php echo $registro['numero_pis'].'/'.$registro['numero_nit'];?></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr valign="bottom">
                        			<td width="53" colspan="2" height="10" bgcolor="#d8d8d8" style="border: 1.00pt solid #00000a; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt"><b>B</b></font></font></font></font></font></p>
                        			</td>
                        			<td colspan="10" width="588" bgcolor="#d8d8d8" style="border-top: 1.00pt solid #00000a; border-bottom: 1.00pt solid #00000a; border-left: none; border-right: 1.00pt solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt"><b>ENDEREÇO
                        				RESIDENCIAL:</b></font></font></font></font></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr>
                        			<td colspan="11" width="649" height="9" valign="bottom" bgcolor="#d9d9d9" style="border-top: 1.00pt solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">13-
                        				Endereço completo (Rua, Avenida, número, etc.):</font></font></font></font></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr>
                        			<td colspan="11" width="649" height="9" valign="bottom" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font color="#000000">&nbsp;</font><?php echo strtoupper($registro['endereco_logradouro'].', '.$registro['endereco_numero']);?></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr valign="bottom">
                        			<td colspan="3" width="131" height="9" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">14-
                        				CEP:</font></font></font></font></font></p>
                        			</td>
                        			<td colspan="2" width="72" bgcolor="#d8d8d8" style="border-top: none; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">15-UF:</font></font></font></font></font></p>
                        			</td>
                        			<td colspan="2" width="211" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">16-
                        				Município: </font></font></font></font></font>
                        				</p>
                        			</td>
                        			<td colspan="4" width="211" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">17-
                        				Bairro: </font></font></font></font></font>
                        				</p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr valign="bottom">
                        			<td colspan="3" width="131" height="9" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font color="#000000"><?php echo $registro['cep']; ?></font></p>
                        			</td>
                        			<td colspan="2" width="72" bgcolor="#ffffff" style="border-top: none; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font color="#000000">	<?php
                              	foreach($estados as $estado){

                              			 if(!empty($registro['id_estado']) && $estado['id_estado'] == $registro['id_estado']) echo $estado['nome_estado'];

                              	}
                              	?></font></p>
                        			</td>
                        			<td colspan="2" width="211" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font color="#000000"><?php
                            		foreach($cidades as $cidade){

                            				 if(!empty($registro['id_cidade']) && $cidade['id_cidade'] == $registro['id_cidade']) echo $cidade['nome_cidade'];

                            		}
                            		?></font></p>
                        			</td>
                        			<td colspan="4" width="211" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font color="#000000"><?php echo $registro['endereco_bairro']; ?></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr valign="bottom">
                        			<td colspan="4" width="131" height="9" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">18-
                        				Telefone:</font></font></font></font></font></p>
                        			</td>
                        			<td colspan="8" width="510" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">19-
                        				E-mail:</font></font></font></font></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr valign="bottom">
                        			<td colspan="4" width="131" height="10" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1.00pt solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt"><?php echo $registro['telefones'];?></font>
                                </font></font></font></font></p>
                        			</td>
                        			<td colspan="8" width="510" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1.00pt solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="center"><font color="#000000"><?php echo $registro['email'];?></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr valign="bottom">
                        			<td width="53" height="9" bgcolor="#d8d8d8" style="border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: 1.00pt solid #00000a; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt"><b>C</b></font></font></font></font></font></p>
                        			</td>
                        			<td colspan="10" width="588" bgcolor="#d8d8d8" style="border-top: 1.00pt solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt"><b>CLASSIFICAÇÃO
                        				DA CATEGORIA DO PESCADOR PROFISSIONAL: </b></font></font></font></font></font>
                        				</p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr>
                        			<td colspan="11" width="649" height="9" valign="bottom" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">20-
                        				Categoria:</font></font></font></font></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr>
                        			<td colspan="11" width="649" height="10" valign="bottom" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1.00pt solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="center"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">( ) Artesanal                            ( )Industrial</font></font></font></font></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr valign="bottom">
                        			<td width="53" height="10" bgcolor="#d8d8d8" style="border-top: none; border-bottom: 1.00pt solid #00000a; border-left: 1px solid #00000a; border-right: 1.00pt solid #00000a; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt"><b>D</b></font></font></font></font></font></p>
                        			</td>
                        			<td colspan="10" width="588" bgcolor="#d8d8d8" style="border-top: 1.00pt solid #00000a; border-bottom: 1.00pt solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt"><b>QUALIFICAÇÃO
                        				DA FORMA DE ATUAÇÃO PRETENDIDA:</b></font></font></font></font></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr valign="bottom">
                        			<td colspan="5" width="211" height="9" bgcolor="#d8d8d8" style="border-top: 1.00pt solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">21-
                        				Forma:</font></font></font></font></font></p>
                        			</td>
                        			<td colspan="3" width="231" bgcolor="#d8d8d8" style="border-top: 1.00pt solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">22-
                        				Nome Embarcação </font></font></font></font></font>
                        				</p>
                        			</td>
                        			<td colspan="2" width="85" bgcolor="#d8d8d8" style="border-top: 1.00pt solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">23-
                        				N° RGP:</font></font></font></font></font></p>
                        			</td>
                        			<td width="99" bgcolor="#d8d8d8" style="border-top: none; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">24-
                        				AB:</font></font></font></font></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr>
                        			<td colspan="5" width="211" height="26" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">(
                        				  )Embarcado   (   )Desembarcado     </font></font></font><font color="#000000"><font face="Calibri, serif"><font size="1" style="font-size: 6pt">(PREENCHER
                        				22,23 e 24)         (PULAR 22, 23 e 24)</font></font></font></font></font></p>
                        			</td>
                        			<td colspan="3" width="231" valign="bottom" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font color="#000000"><?php echo $registro['nome_embarcacao'];?></font></p>
                        			</td>
                        			<td colspan="2" width="85" valign="bottom" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font color="#000000"><?php echo $registro['numero_carteira'];?></font></p>
                        			</td>
                        			<td width="99" valign="bottom" bgcolor="#ffffff" style="border-top: none; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font color="#000000">&nbsp;</font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr>
                        			<td colspan="11" width="649" height="9" valign="bottom" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">25-
                        				Produtos de Pesca Pretendidos:</font></font></font></font></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr>
                        			<td colspan="11" width="649" height="9" valign="bottom" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">(
                        				  ) Peixes   (   )Crustáceos   (   )Mariscos   (   )Algas   (
                        				)Outros</font></font></font></font></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr valign="bottom">
                        			<td colspan="5" width="211" height="9" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">26-
                        				Área que pretende realizar a pesca:</font></font></font></font></font></p>
                        			</td>
                        			<td colspan="6" width="430" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">27-
                        				Local de pesca:</font></font></font></font></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr>
                        			<td colspan="5" width="211" height="28" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1.00pt solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">(
                        				  )Mar               (   )Estuário        (   )Rio       (
                        				)Lago/Lagoa (   )Reservatório(   )Açude </font></font></font></font></font>
                        				</p>
                        			</td>
                        			<td colspan="6" width="430" valign="bottom" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1.00pt solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font color="#000000">&nbsp;</font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr valign="bottom">
                        			<td width="53" height="10" bgcolor="#d8d8d8" style="border-top: none; border-bottom: 1.00pt solid #00000a; border-left: 1px solid #00000a; border-right: 1.00pt solid #00000a; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt"><b>E</b></font></font></font></font></font></p>
                        			</td>
                        			<td colspan="10" width="588" bgcolor="#d8d8d8" style="border-top: 1.00pt solid #00000a; border-bottom: 1.00pt solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt"><b>DECLARAÇÃO
                        				DE VÍNCULO EMPREGATICIO OU OUTRA FONTE DE RENDA:</b></font></font></font></font></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr valign="bottom">
                        			<td colspan="5" width="211" height="9" bgcolor="#d8d8d8" style="border-top: 1.00pt solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">28-
                        				Vínculo Empregatício:</font></font></font></font></font></p>
                        			</td>
                        			<td colspan="6" width="430" bgcolor="#d8d8d8" style="border-top: 1.00pt solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">29-
                        				Aposentado:</font></font></font></font></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr>
                        			<td colspan="5" width="211" height="10" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1.00pt solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">(
                        				  ) Sim   (   )Não</font></font></font></font></font></p>
                        			</td>
                        			<td colspan="6" width="430" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1.00pt solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">(
                        				  ) Sim   (   ) Não</font></font></font></font></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr valign="bottom">
                        			<td width="53" height="9" bgcolor="#d8d8d8" style="border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: 1.00pt solid #00000a; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt"><b>F</b></font></font></font></font></font></p>
                        			</td>
                        			<td colspan="10" width="588" bgcolor="#d8d8d8" style="border-top: 1.00pt solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt"><b>ESCOLARIDADE:</b></font></font></font></font></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr>
                        			<td colspan="11" width="649" height="9" valign="bottom" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">30-
                        				Classificação: </font></font></font></font></font>
                        				</p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr>
                        			<td colspan="11" width="649" height="9" valign="bottom" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: none; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Verdana, serif">(
                        				  ) 1ª à 4ª Série incompleta/Ensino Fundamental       (   )
                        				2º Grau Completo/Ensino Médio</font></font></font></font></p>
                        			</td>
                        		</tr>
                        		<tr>
                        			<td colspan="11" width="649" height="9" valign="bottom" bgcolor="#ffffff" style="border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Verdana, serif">(
                        				  ) 1ª à 4ª Série completa/Ensino Fundamental         (   )
                        				Ensino Técnico Incompleto</font></font></font></font></p>
                        			</td>
                        		</tr>
                        		<tr>
                        			<td colspan="11" width="649" height="9" valign="bottom" bgcolor="#ffffff" style="border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Verdana, serif">(
                        				  ) 5ª à 9ª Série incompleta/Ensino Fundamental      (   )
                        				Ensino Técnico Completo</font></font></font></font></p>
                        			</td>
                        		</tr>
                        		<tr>
                        			<td colspan="11" width="649" height="9" valign="bottom" bgcolor="#ffffff" style="border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Verdana, serif">(
                        				  )5ª à 9ª Série completa/Ensino Fundamental          (   )
                        				Ensino Superior incompleto</font></font></font></font></p>
                        			</td>
                        		</tr>
                        		<tr>
                        			<td colspan="11" width="649" height="9" valign="bottom" bgcolor="#ffffff" style="border-top: none; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Verdana, serif">(
                        				  ) 2° Grau Incompleto/Ensino Médio                        (
                        				) Ensino Superior completo</font></font></font></font></p>
                        				<p class="western" align="left"><br/>

                        				</p>

                        			</td>
                        		</tr>
                        	</tbody>
                        </table>
<div style="page-break-before: always;"></div>
                        <table width="100%" cellpadding="6" cellspacing="0">
                        	<tbody>

                        		<tr>
                        			<td colspan="11" width="649" height="9" valign="bottom" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">31-
                        				Você se considera:</font></font></font></font></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr>
                        			<td colspan="11" width="649" height="10" valign="bottom" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1.00pt solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">(
                        				  ) Completamente Alfabetizado   (   ) Capaz apenas de assinar
                        				seu nome   (   ) Não alfabetizado</font></font></font></font></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr valign="bottom">
                        			<td width="53" height="9" bgcolor="#d8d8d8" style="border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: 1.00pt solid #00000a; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt"><b>G</b></font></font></font></font></font></p>
                        			</td>
                        			<td colspan="10" width="588" bgcolor="#d8d8d8" style="border-top: 1.00pt solid #00000a; border-bottom: none; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt"><b>IDENTIFICAÇÃO
                        				DA ENTIDADE REPRESENTATIVA DE CLASSE</b></font></font></font></font></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr valign="bottom">
                        			<td colspan="5" width="211" height="9" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">32-
                        				Filiado a entidade representativa:</font></font></font></font></font></p>
                        			</td>
                        			<td colspan="6" width="430" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">33-
                        				Tipo de entidade:</font></font></font></font></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr valign="bottom">
                        			<td colspan="5" width="211" height="9" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="center"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">(
                        				  ) Sim   (   )Não</font></font></font></font></font></p>
                        			</td>
                        			<td colspan="6" width="430" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #000001; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">(
                        				  ) Colônia (   )Sindicato (   )Associação  (   ) Outros </font></font></font></font></font>
                        				</p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr valign="bottom">
                        			<td colspan="5" width="211" height="9" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">34-
                        				Nome da entidade à qual é filiada:</font></font></font></font></font></p>
                        			</td>
                        			<td colspan="5" width="323" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">35-
                        				CNPJ da Entidade:</font></font></font></font></font></p>
                        			</td>
                        			<td width="99" bgcolor="#d8d8d8" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">36-
                        				UF Entidade:</font></font></font></font></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr valign="bottom">
                        			<td colspan="5" width="211" height="8" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font color="#000000"><?php echo $dadosColonia['nome_colonia'];?></font></p>
                        			</td>
                        			<td colspan="5" width="323" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm">
                        				<p class="western" align="left"><font color="#000000"><?php echo $dadosColonia['cnpj'];?></font></p>
                        			</td>
                        			<td width="99" bgcolor="#ffffff" style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: 1px solid #00000a; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0.12cm; line-height: 50%">
                        				<p class="western" align="left" style="line-height: 50%; margin-bottom: 0cm"><font color="#000000">	<?php
                              	foreach($estados as $estado){

                              			 if(!empty($dadosColonia['id_estado']) && $estado['id_estado'] == $dadosColonia['id_estado']) echo $estado['nome_estado'];

                              	}
                              	?></font></p>
                        			</td>
                        		</tr>
                        	</tbody>
                        </table>

                        <p class="western" align="center" style="line-height: 90%; margin-bottom: 0cm; margin-top: 0cm"><font face="Arial, serif"><font size="1" style="font-size: 8pt">DECLARAÇÃO:</font></font></p>
                        <p class="western" align="justify" style="line-height: 90%; margin-top: 0cm; margin-bottom: 0cm"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font face="Verdana, serif">Declaro,
                        sob-responsabilidade civil e penal, que as informações declaradas
                        no “Formulário de Requerimento de Licença de Pescador
                        Profissional” são verdadeiras e que estou ciente que a informações
                        não verídicas declaradas, implicarão em penalidades previstas no
                        Artigo 299 do Código Penal (Falsidade ideológica), além de sansões
                        civis e administrativas cabíveis.</font></font></font></p>
                        <p class="western" align="justify" style="margin-left: 2.5cm; line-height: 90%; margin-top: 0cm; margin-bottom: 0cm">“<font face="Arial, serif"><font size="1" style="font-size: 8pt"><font face="Verdana, serif"><i>Art.
                        299 do Código Penal Brasileiro -Omitir, em documento público ou
                        particular, declaração que dele devia constar, ou nele inserir ou
                        fazer inserir declaração falsa ou diversa da que devia ser escrita,
                        com fim de prejudicar direito, criar obrigação ou alterar a verdade
                        sobre fato juridicamente relevante:</i></font></font></font></p>
                        <p class="western" align="justify" style="margin-left: 2.5cm; line-height: 90%; margin-top: 0cm; margin-bottom: 0cm"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font face="Verdana, serif"><i>Pena-
                        reclusão, de um a cinco anos, e multa, se o documento é público, e
                        reclusão de 1 a 3 anos, e multa, se o documento é particular.”</i></font></font></font></p>

                        <p class="western" align="center" style= "line-height: 90%; margin-bottom: 0cm"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font face="Verdana, serif">______________________________,
                        ________de______________________de____________.</font></font></font></p>
                        <p class="western" align="left" style="margin-left: 3.75cm; text-indent: 1.25cm; line-height: 90%; margin-top: 0cm; margin-bottom: 0cm">
                           <font face="Arial, serif"><font size="1" style="font-size: 8pt"><font face="Verdana, serif">Local
                                                                              Data</font></font></font></p>

                        <p class="western" align="center" style= "line-height: 90%; margin-bottom: 0cm"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font face="Verdana, serif">______________________________________________________</font></font></font></p>
                        <p class="western" align="center"style="line-height: 90%; margin-top: 0cm; margin-bottom: 0cm"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font face="Verdana, serif">ASSINATURA
                        DO INTERESSADO </font></font></font>
                        </p>

                        <p class="western" align="center" style="line-height: 100%; margin-top: 0,5cm; margin-bottom: 0cm"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font face="Verdana, serif">ASSINATURA
                        A ROGO EM CASO DO INTERESSADO ANALFABETO E TESTEMUNHAS:</font></font></font></p>

                        <table width="100%" align="right" cellpadding="3" cellspacing="0" style="page-break-before: auto">

                        	<tr valign="top" align="center">
                        		<td rowspan="7" width="27%" style="border-top: 0px solid #000000; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">

                        				<img src="http://www.coloniaonline.com.br/uploads/temp/foto_colonia/polegar.png" />


                        		</td>
                        		<td width="73%" style="border: 0px solid #000000; padding: 0.1cm">
                        			<p align="right"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font face="Verdana, serif">NOME:___________________________________________________________</font></font></font></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="73%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 0px solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0cm">
                        			<p align="right"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font face="Verdana, serif">CARTEIRA DE
                        			IDENTIDADE:________________CPF:__________________________</font></font></font></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="73%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 0px solid #000000; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0cm">
                        			<p align="right"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font face="Verdana, serif">ASSINATURA
                        			_____________________________________________________</font></font></font></p>
                        		</td>

                        	</tr>
                          <tr>
                            <td><br><br></td>
                          </tr>
                        	<tr valign="top">
                        		<td width="73%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 0px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
                        			<p align="right"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font face="Verdana, serif">NOME:___________________________________________________________</font></font></font></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="73%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 0px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
                        			<p align="right"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font face="Verdana, serif">CARTEIRA DE
                        			IDENTIDADE:_____________CPF:__________________________</font></font></font></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="73%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 0px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
                        			<p align="right"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font face="Verdana, serif">ASSINATURA
                        			_____________________________________________________</font></font></font></p>
                        		</td>
                        	</tr>
                        </table>


                        <p class="western" align="left" style="text-indent: 1.25cm" style="line-height: 90%; margin-bottom: 0cm"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Verdana, serif">O
                        requerente apresentou a documentação completa em </font></font><font face="Verdana, serif">____/____/____
                        ,</font><font color="#000000"><font face="Verdana, serif"> de acordo
                        com a Instrução Normativa MPA N°6/2012.</font></font></font></font></p>

                        <p class="western" align="center" style="line-height: 90%; margin-bottom: 0cm"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font face="Verdana, serif">_________________________________________________</font></font></font></p>
                        <p class="western" align="center" style="line-height: 90%; margin-top: 0cm; margin-bottom: 0cm"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font face="Verdana, serif">ASSINATURA
                        E CARIMBO DO RESPONSÁVEL NO MPA</font></font></font></p>

                        <p class="western" align="center" style="line-height: 80%; margin-top: 0cm; margin-bottom: 0cm"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#ff0000"><font size="1" style="font-size: 6pt">DESTACAR
                        E ENTREGAR AO INTERESSADO</font></font></font></font></p>
                        <p class="western" align="center" style="line-height: 80%; margin-top: 0cm; margin-bottom: 0cm"><font face="Arial, serif"><font size="1" style="font-size: 8pt">-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</font></font></p>
                        <p align="center" style="text-indent: 1cm; padding-top: 0.04cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0cm; line-height: 90%; margin-top: 0cm; margin-bottom: 0cm"><img src="data:image/png;base64,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" name="Imagem 2" align="left" hspace="11" width="43" height="48" border="0"/>
<font size="4" style="font-size: 14pt"><font face="Verdana, serif"><font size="2" style="font-size: 10pt"><b>MINISTERIO
                        DA PESCA E AQUICULTURA</b></font></font></font></font></p>
                        <p class="western" align="center" style="line-height: 90%; margin-top: 0cm; margin-bottom: 0cm">
                        <font face="Arial, serif"><font size="1" style="font-size: 8pt"><font face="Verdana, serif"><font size="2" style="font-size: 10pt"><b>PROTOCOLO
                        DE RECEBIMENTO DO FORMULÁRIO DE SOLICITAÇÃO DA</b></font></font></font></font></p>
                        <p class="western" align="center" style="line-height: 90%; margin-top: 0cm; margin-bottom: 0cm">
                        <font face="Arial, serif"><font size="1" style="font-size: 8pt"><font face="Verdana, serif"><font size="2" style="font-size: 10pt"><b>Licença
                        de Pescador Profissional</b></font></font></font></font></p>
                        <table width="100%" cellpadding="4" cellspacing="0">
                        	<col width="351">
                        	<col width="216">
                        	<tbody>
                        		<tr valign="bottom">
                        			<td width="351" height="8" bgcolor="#d8d8d8" style="border-top: 1.00pt solid #00000a; border-bottom: none; border-left: 1.00pt solid #00000a; border-right: 1px solid #00000a; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">01-
                        				NOME:</font></font></font></font></font></p>
                        			</td>
                        			<td rowspan="5" width="216" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font color="#000000">&nbsp;</font>

                                </p>
                        			</td>
                        		</tr>

                        		<tr>
                        			<td width="351" height="9" valign="bottom" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.12cm">
                        				<p class="western" align="center"><font color="#000000">&nbsp;</font></p>
                        			</td>
                        		</tr>

                        		<tr>
                        			<td width="351" height="14" valign="bottom" bgcolor="#d8d8d8" style="border: 1px solid #00000a; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">02-
                        				CPF:</font></font></font></font></font></p>
                        			</td>
                        		</tr>

                        		<tr>
                        			<td width="351" valign="bottom" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.12cm">
                        				<p class="western" align="left"><br/>

                        				</p>
                        			</td>
                        		</tr>

                        		<tr>
                        			<td width="351" height="10" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.12cm">

                        				<p class="western" align="right"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif"><font size="2" style="font-size: 11pt">Recebido:______________________________Em
                        				___/___/______</font></font></font></font></font></p>

                        			</td>
                        		</tr>
                        	</tbody>
                        	<tbody>
                        		<tr>
                        			<td rowspan="2" colspan="2" width="575" height="9" valign="bottom" bgcolor="#ffffff" style="border: none; padding: 0cm">
                        				<p class="western" align="left" style="line-height: 90%; margin-top: 0cm; margin-bottom: 0cm"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#000000"><font face="Calibri, serif">
                        *
                        				Este documento servirá unicamente como instrumento comprobatório
                        				da entrega da documentação e, se deferido o pedido de
                        				inscrição, para comprovação da data de 1º registro, nos
                        				termos do Parágrafo 1º do Incisos I, II e III do Art. 4º da
                        				Instrução Normativa nº6 /2012. </font></font></font></font>
                        				</p>
                        			</td>
                        		</tr>
                        		<tr>
                        		</tr>
                        	</tbody>
                        </table>

                        <p class="western" align="center" style="line-height: 90%; margin-top: 0cm; margin-bottom: 0cm"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font color="#282526"><font face="Times New Roman, serif"><font size="1" style="font-size: 7pt">PORTARIA
                        No- 39, DE 23 DE JULHO DE 2012</font></font></font></font></font></p>
                        <p class="western" align="center" style="line-height: 90%; margin-top: 0cm; margin-bottom: 0cm"><font face="Arial, serif"><font size="1" style="font-size: 8pt"><font face="Times New Roman, serif"><font size="1" style="font-size: 7pt">D.O.U
                        de 06/08/2012 - Página:37               </font></font></font></font>
                        </p>

                        </body>
                        </html>
                      </textarea>
                      <script>
                          CKEDITOR.replace( 'editor1' );
                      </script>

                  </div>
              </div>


          </div>

</form>
        </div>
    </section>

    <form id="tipo">
    <input type="hidden" name="tipo_relatorio" value="Semoc" id="tipo_relatorio">
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
