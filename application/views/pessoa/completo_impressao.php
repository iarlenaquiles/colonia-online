<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
	<title></title>
	<meta name="generator" content="LibreOffice 5.0.6.2 (Linux)"/>
	<meta name="author" content="notebook"/>
	<meta name="created" content="2016-09-13T23:12:00"/>
	<meta name="changedby" content="notebook"/>
	<meta name="changed" content="2016-09-13T23:39:00"/>
	<meta name="AppVersion" content="15.0000"/>
	<meta name="DocSecurity" content="0"/>
	<meta name="HyperlinksChanged" content="false"/>
	<meta name="LinksUpToDate" content="false"/>
	<meta name="ScaleCrop" content="false"/>
	<meta name="ShareDoc" content="false"/>
	<style type="text/css">
		@page { margin: 2cm }
		p { margin-bottom: 0.25cm; direction: ltr; color: #00000a; line-height: 100%; text-align: justify; orphans: 2; widows: 2 }
		p.western { font-family: "Times New Roman", serif; font-size: 12pt; so-language: pt-BR }
		p.cjk { font-family: "Calibri"; font-size: 12pt; so-language: en-US }
		p.ctl { font-family: ; font-size: 11pt; so-language: ar-SA }
		p.um {
 font-size: 14px;
 line-height: 1.5}
	</style>
</head>
<body lang="pt-BR" text="#00000a" dir="ltr">
<p class="um" align="center" style="margin-bottom: 0cm; line-height: 100%">
<br/>

</p>
<p class="um" align="center" style="margin-bottom: 0cm; line-height: 30%"><?php echo '<img width="61" height="60" src="'.base_url("uploads/temp/foto_colonia/federacao.jpg").'"/>';?></p>

<p align="center" class="um" style="line-height: 30%"><font size="3" style="font-size: 12pt">
CONFEDERA&Ccedil;&Atilde;O NACIONAL DOS PESCADORES E AQUICULTORES
</font></p>
<p align="center" class="um" style="line-height: 30%"><font size="3" style="font-size: 12pt">
FEDERA&Ccedil;&Atilde;O
DOS PESCADORES DO ESTADO DE ALAGOAS - FEPEAL
</font></p>

<p class="um" align="center" style="margin-bottom: 0cm; line-height: 30%">
<?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", $dadosColonia['nome_colonia']); ?></p>
<p class="um" align="center" style="margin-bottom: 0cm; line-height: 30%">
Fundada em <?php if($dadosColonia['data_fundacao'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($dadosColonia['data_fundacao'])); }?></p>
<p class="um" align="center" style="margin-bottom: 0cm; line-height: 30%">
CNPJ: <?php echo strtoupper($dadosColonia['cnpj']);?></p>
<p class="um" align="center" style="margin-bottom: 0cm; line-height: 30%">
<?php echo '<img width="60" height="60" src="'.base_url($dadosColonia['foto']).'"/>';?></p>

<p class="um" style="margin-bottom: 0cm; line-height: 100%"><br/>

</p>
<p class="um" align="center" style="margin-bottom: 0cm; line-height: 100%">
<b>FICHA DO ASSOCIADO</b></p>
<p class="um" style="margin-bottom: 0cm; line-height: 100%"><span style="display: inline-block; border: 1px solid #00000a; padding: 0cm">
 <?php echo '<img width="100" height="100" src="'.base_url($registro['foto']).'"/>';?></span></p>
<p class="um" style="margin-bottom: 0cm; line-height: 100%"><br/>

</p>
<table width="610" cellpadding="6" cellspacing="0">
	<col width="292">
	<col width="292">
	<tr>
		<td align="center" colspan="2" width="596" valign="top" bgcolor="#ffff00" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um" align="center"><b>DADOS PESSOAIS E DA FAM&Iacute;LIA</b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Nome:<b><?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", strtoupper($registro['nome_pessoa']));?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Nome do pai: <b><?php echo iconv("UTF-8","ISO-8859-1",strtoupper($registro['nome_pai']));?></b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Endere&ccedil;o: <b><?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", strtoupper($registro['endereco_logradouro']));?>, <?php echo strtoupper($registro['endereco_numero']);?>, <?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", strtoupper($registro['endereco_bairro']));?></b>,
			<b>	<?php
				foreach($cidades as $cidade){

						 if(!empty($registro['id_cidade']) && $cidade['id_cidade'] == $registro['id_cidade']) echo iconv("utf-8","ISO-8859-1",$cidade['nome_cidade']);

				}
				?></b>,
			<b><?php
			foreach($estados as $estado){

					 if(!empty($registro['id_estado']) && $estado['id_estado'] == $registro['id_estado']) echo iconv("utf-8","ISO-8859-1",$estado['nome_estado']);

			}
			?></b>, <b><?php echo strtoupper($registro['cep']);?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Nome da m&atilde;e: <b><?php echo iconv("UTF-8","ISO-8859-1",strtoupper($registro['nome_mae']));?></b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Data de nascimento: <b><?php echo strtoupper($registro['data_nascimento']);?></b>, <b><?php
					// Declara a data! :P
					$data = date('d/m/Y', strtotime($registro['data_nascimento']));

					// Separa em dia, mês e ano
					list($dia, $mes, $ano) = explode('/', $data);

					// Descobre que dia é hoje e retorna a unix timestamp
					$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
					// Descobre a unix timestamp da data de nascimento do fulano
					$nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

					// Depois apenas fazemos o cálculo já citado :)
					$idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

					echo $idade.' anos';

			?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Estado civil: <b><?php echo iconv("UTF-8","ISO-8859-1",strtoupper($registro['estado_civil']));?></b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Registro de nascimento: <b><?php echo strtoupper($registro['reg_nasc_numero']);?></b>,
			<b><?php echo strtoupper($registro['reg_nasc_folha']);?>, <?php echo strtoupper($registro['reg_nasc_livro']);?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Profiss&atilde;o: <b><?php echo iconv("UTF-8","ISO-8859-1",strtoupper($registro['profissao_atual']));?></b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Naturalidade: <b><?php echo iconv("UTF-8","ISO-8859-1",strtoupper($registro['naturalidade']));?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Telefones: <b><?php echo strtoupper($registro['telefones']);?></b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Nacionalidade: <b><?php echo iconv("UTF-8","ISO-8859-1",strtoupper($registro['nacionalidade']));?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Nome do(a) esposo(a)/companheiro(a): <b><?php echo iconv("UTF-8","ISO-8859-1",strtoupper($registro['nome_esposa']));?></b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um"><br/>

			</p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Nome dos filhos: <b><?php echo iconv("UTF-8","ISO-8859-1",strtoupper($registro['nome_filhos']));?></b></p>
		</td>
	</tr>
</table>
<p class="um" style="margin-bottom: 0cm; line-height: 100%"><br/>

</p>
<p class="um" style="margin-bottom: 0cm; line-height: 100%"><br/>

</p>
<table width="610" cellpadding="6" cellspacing="0">
	<col width="292">
	<col width="292">
	<tr>
		<td colspan="2" align="center" width="596" valign="top" bgcolor="#ffff00" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um" align="center"><b>DADOS PESSOAIS E DA FAM&Iacute;LIA</b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">CPF: <b><?php echo strtoupper($registro['cpf_cnpj']);?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">CTPS: <b><?php echo strtoupper($registro['numero_ctps']);?>,
				<?php echo strtoupper($registro['serie_ctps']);?>,
				<?php
				foreach($estados as $estado){

						 if(!empty($registro['estado_emissao_ctps']) && $estado['id_estado'] == $registro['estado_emissao_ctps']) echo iconv("UTF-8","ISO-8859-1",$estado['nome_estado']);

				}
				?></b>
				</p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">RG: <b><?php echo strtoupper($registro['numero_rg']);?>,
				<?php echo strtoupper($registro['orgao_expedicao_rg']);?>,
			<?php if($registro['data_expedicao_rg'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_expedicao_rg'])); }?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">T&iacute;tulo: <b><?php echo strtoupper($registro['num_titulo']);?>,
				<?php echo strtoupper($registro['zona_titulo']);?>,
				<?php echo strtoupper($registro['secao_titulo']);?></b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Reservista: <b><?php echo strtoupper($registro['num_reservista']);?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um"><br/>

			</p>
		</td>
	</tr>
</table>
<p class="um" style="margin-bottom: 0cm; line-height: 100%"><br/>

</p>
<p class="um" style="margin-bottom: 0cm; line-height: 100%"><br/>

</p>
<table width="610" cellpadding="6" cellspacing="0">
	<col width="292">
	<col width="292">
	<tr valign="top">
		<td width="292" bgcolor="#ffff00" align="center" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um" align="center"><b>CADASTRO NA COL&Ocirc;NIA</b></p>
		</td>
		<td width="292" bgcolor="#ffff00" align="center" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um" align="center"><b>ESCOLARIDADE</b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">N&uacute;mero da Carteira na col&ocirc;nia: <b><?php echo strtoupper($registro['numero_carteira']);?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Alfabetizado: <b><?php echo strtoupper($registro['alfabetizado']);?></b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Data da filia&ccedil;&atilde;o: <b><?php if($registro['data_filiacao'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_filiacao'])); }?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Estudou at&eacute; que s&eacute;rie:<b><?php echo iconv("UTF-8","ISO-8859-1",strtoupper($registro['grau_estudo']));?></b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">&Eacute; filiado h&aacute;: <b><?php
					// Declara a data! :P
					$data = date('d/m/Y', strtotime($registro['data_filiacao']));

					// Separa em dia, mês e ano
					list($dia, $mes, $ano) = explode('/', $data);

					// Descobre que dia é hoje e retorna a unix timestamp
					$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));


					// Descobre a unix timestamp da data de nascimento do fulano
					$nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);




					// Depois apenas fazemos o cálculo já citado :)
					$idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

					$mes = floor((((((($hoje - $nascimento) / 60) / 60) / 24)) - ($idade * 365.25))/30);

					$dias = floor(((((($hoje - $nascimento)/60)/ 60)/ 24) - ($idade * 365.25)) - ($mes * 30));

					echo $idade.' anos, '.$mes.' m&ecirc;s(es), '.$dias.' dias';

			?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um"><br/>

			</p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">N&uacute;mero do livro da filia&ccedil;&atilde;o: <b><?php echo strtoupper($registro['numero_livro_filiacao']);?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um"><br/>

			</p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">N&uacute;mero da folha: <b><?php echo strtoupper($registro['numero_folha_filiacao']);?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um"><br/>

			</p>
		</td>
	</tr>
</table>
<p class="um" style="margin-bottom: 0cm; line-height: 100%"><br/>

</p>
<p class="um" style="margin-bottom: 0cm; line-height: 100%"><br/>

</p>
<table width="610" cellpadding="6" cellspacing="0">
	<col width="292">
	<col width="292">
	<tr>
		<td colspan="2" width="596" valign="top" align="center" bgcolor="#ffff00" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um" align="center"><b>DADOS PESSOAIS E DA FAM&Iacute;LIA</b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Carteira da SUDEPE: <b><?php echo strtoupper($registro['numero_carteira_sudepe']);?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Inscri&ccedil;&atilde;o no NIT: <b><?php echo strtoupper($registro['numero_nit']);?></b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Data de expedi&ccedil;&atilde;o SUDEPE: <b><?php if($registro['data_expedicao_supede'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_expedicao_supede'])); }?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Data da inscri&ccedil;&atilde;o no NIT: <b><?php if($registro['data_expedicao_nit'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_expedicao_nit'])); }?></b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Carteira da SEAP/PR: <b><?php echo strtoupper($registro['numero_seap']);?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Pescador aposentado: <b><?php echo strtoupper($registro['aposentado']);?></b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Data de expedi&ccedil;&atilde;o SEAP: <b><?php if($registro['data_expedicao_seap'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_expedicao_seap'])); }?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Data da aposentadoria:<b><?php if($registro['data_aposentadoria'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_aposentadoria'])); }?></b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Matr&iacute;cula CEI: <b><?php echo strtoupper($registro['numero_cei']);?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Inscr. Cap. Dos Portos: <b><?php echo strtoupper($registro['numero_capitania_portos']);?></b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Data da Matr&iacute;cula CEI: <b><?php if($registro['data_expedicao_cei'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_expedicao_cei'])); }?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Data da Inscr. Cap. Dos Portos: <b><?php if($registro['data_inscricao_capitania'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_inscricao_capitania'])); }?></b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Pescador amador: <b><?php echo strtoupper($registro['amador']);?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Nome da embarca&ccedil;&atilde;o: <b><?php echo iconv("UTF-8","ISO-8859-1",strtoupper($registro['nome_embarcacao']));?></b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<!-- <p class="um">Data da expedi&ccedil;&atilde;o: </b><?php echo strtoupper($registro['']);?></p> -->
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um"><?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", "N°");?> da embarca&ccedil;&atilde;o: <b><?php echo strtoupper($registro['numero_embarcacao']);?></b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Inscri&ccedil;&atilde;o no PIS: <b><?php echo strtoupper($registro['numero_pis']);?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Tamanho da embarca&ccedil;&atilde;o: <b><?php echo strtoupper($registro['tamanho_embarcacao']);?></b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Data de inscri&ccedil;&atilde;o no PIS: <b><?php if($registro['data_expedicao_pis'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_expedicao_pis'])); }?></b></p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Largura da embarca&ccedil;&atilde;o: <b><?php echo strtoupper($registro['largura_embarcacao']);?></b></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um"><br/>

			</p>
		</td>
		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a; padding: 0cm 0.19cm">
			<p class="um">Carteira do MPA: <b><?php echo strtoupper($registro['carteira_mpa']);?></b></p>
		</td>
	</tr>
</table>
<p class="um" style="margin-bottom: 0cm; line-height: 100%"><?php setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );

date_default_timezone_set( 'America/Sao_Paulo' ); echo strftime( '%d de %B de %Y', strtotime( date( 'Y-m-d' ) ) );
?>, <?php
foreach($cidades as $cidade){

		 if(!empty($dadosColonia['id_municipio']) && $cidade['id_cidade'] == $dadosColonia['id_municipio']) echo iconv("utf-8","ISO-8859-1",$cidade['nome_cidade']);

}
?>, <?php
foreach($estados as $estado){

	 if(!empty($dadosColonia['id_estado']) && $estado['id_estado'] == $dadosColonia['id_estado']) echo iconv("utf-8","ISO-8859-1",$estado['nome_estado']);

}
?>.</p>
<p class="um" style="margin-bottom: 0cm; line-height: 100%"><br/>

</p>
<p class="um" style="margin-bottom: 0cm; line-height: 100%"><br/>

</p>
<p class="um" align="center" style="margin-bottom: 0cm; line-height: 100%">
<b>_______________________________________________________________________</b></p>
<p class="um" align="center" style="margin-bottom: 0cm; line-height: 100%">
<b><?php echo iconv("UTF-8","ISO-8859-1",strtoupper($dadosColonia['presidente_colonia']));?></b></p>
<p class="um" align="center" style="margin-bottom: 0cm; line-height: 100%">
<b><?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", $dadosColonia['nome_colonia']); ?></b></p>
<p class="um" align="center" style="margin-bottom: 0cm; line-height: 100%">
<b><?php echo iconv("utf-8","ISO-8859-1",strtoupper($dadosColonia['endereco_rua']));?>, <?php echo iconv("utf-8","ISO-8859-1",strtoupper($dadosColonia['endereco_numero']));?>, <?php echo iconv("utf-8","ISO-8859-1",strtoupper($dadosColonia['endereco_bairro']));?>,
	<?php
	foreach($cidades as $cidade){

			 if(!empty($dadosColonia['id_municipio']) && $cidade['id_cidade'] == $dadosColonia['id_municipio']) echo iconv("utf-8","ISO-8859-1",$cidade['nome_cidade']);

	}
	?>,
	<?php
foreach($estados as $estado){

		 if(!empty($dadosColonia['id_estado']) && $estado['id_estado'] == $dadosColonia['id_estado']) echo iconv("utf-8","ISO-8859-1",$estado['nome_estado']);

}
?></b></p>
<p class="um" align="center" style="margin-bottom: 0cm; line-height: 100%">
<b><?php echo strtoupper($dadosColonia['telefones']);?></b></p>
</body>
</html>
