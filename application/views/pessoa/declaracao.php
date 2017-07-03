<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
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
	<style type="text/css">
		@page { margin-left: 3cm; margin-right: 3cm; margin-top: 2.5cm; margin-bottom: 1.25cm }
		p { margin-bottom: 0.25cm; direction: ltr; line-height: 100%; text-align: left; orphans: 2; widows: 2 }
		a:link { so-language: zxx }
		p.um {
 font-size: 8px;
 line-height: 1.5}
	</style>
</head>
<body lang="pt-BR" dir="ltr"><p align="center"><?php echo '<img width="60" height="60" src="'.base_url($dadosColonia['foto']).'"/>';?></p>
<p align="center" class="um"><font face="Times New Roman, serif"><font size="3" style="font-size: 12pt"><font face="Arial, serif"><font size="2" style="font-size: 9pt"><b>
<?php
echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", "CONFEDERAÇÃO
NACIONAL DOS PESCADORES E AQUICULTORES");
?>

</b></font></font></font></font></p>
<p align="center" class="um"><font face="Times New Roman, serif"><font size="3" style="font-size: 12pt"><font face="Arial, serif"><font size="2" style="font-size: 9pt"><b>
	<?php
	echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", "FEDERAÇÃO
DOS PESCADORES DO ESTADO DE ALAGOAS - FEPEAL");
	?>

	</b></font></font></font></font></p>
<p align="center" class="um"><font face="Times New Roman, serif"><font size="3" style="font-size: 12pt"><font face="Arial, serif"><font size="2" style="font-size: 9pt"><b>
	<?php
echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", $dadosColonia['nome_colonia']);
?></b></font></font></font></font></p>
<p align="center" class="um"><font face="Times New Roman, serif"><font size="3" style="font-size: 12pt"><font face="Arial, serif"><font size="2" style="font-size: 9pt"><b>FUNDADA
EM <?php echo date('d/m/Y', strtotime($dadosColonia['data_fundacao'])); ?></b></font></font></font></font></p>
<p align="center" class="um"><font face="Times New Roman, serif"><font size="3" style="font-size: 12pt"><font face="Arial, serif"><font size="2" style="font-size: 9pt"><b>CNPJ:
<?php echo strtoupper($dadosColonia['cnpj']);?></font></font></font></font></p>

<p align="center" class="um"><br/>

</p>
<p align="center" class="um"><br/>

</p>

<p align="center" class="um"><font size="4" style="font-size: 14pt"><u><b>
	<?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", "DECLARAÇÃO");?>
</b></u></font></p>

<p align="justify" class="um">
<font size="3" style="font-size: 12pt">DECLARAMOS PARA OS DEVIDOS
FINS, JUNTO AO <?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", "MINISTÉRIO");?> DA <?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", "PREVIDÊNCIA");?>                        E
<?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", "ASSISTÊNCIA");?> SOCIAL.
QUE O SR.(A) <b><u><?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", strtoupper($registro['nome_pessoa']));?></u></b>, ESTADO CIVIL <b><?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", strtoupper($registro['estado_civil']));?></b>,
PORTADOR DO RG SOB O <?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", "N°");?>: <b><?php echo strtoupper($registro['numero_rg']);?></b>
<?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", "ÓRGÃO");?> EXPEDIDOR <b><?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", strtoupper($registro['orgao_expedicao_rg']));?></b>, E PORTADOR DO RGP SOB O <?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", "N°");?>: <b><?php echo strtoupper($registro['numero_carteira']);?></b>,
PORTADOR DO CPF: <b><?php echo strtoupper($registro['cpf_cnpj']); ?></b>, RESIDENTE E
DOMICILIADO NA <b><?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", strtoupper($registro['endereco_logradouro']));?></b>, <?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", "N°");?>
<b><?php echo strtoupper($registro['endereco_numero']);?></b>, BAIRRO: <b><?php echo iconv("UTF-8","ISO-8859-1", strtoupper($registro['endereco_bairro']));?></b>, E FILIADO
NESTA <b>	<?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", $dadosColonia['nome_colonia']);?></b> COMO  PROFISSIONAL
ARTESANAL, DESDE <b><?php echo date('d/m/Y', strtotime($registro['data_filiacao'])); ?></b>,
LIVRO DE <?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", "N°");?>: <b><?php echo strtoupper($registro['numero_livro_filiacao']);?></b>,
FOLHA DE <?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", "N°");?>: <b><?php echo strtoupper($registro['numero_folha_filiacao']);?></b> NO
REGISTRO SOB <?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", "N°");?> <b><?php echo strtoupper($registro['numero_carteira']);?></b>
<?php $texto="QUE FAZ DA PESCA SUA PROFISSÃO E SEU PRINCIPAL MEIO DE VIDA E JÁ SE
ENCONTRA QUITE COM SUAS CONTRIBUIÇÕES E DOCUMENTAÇÃO LEGALIZADA
.ESTA DECLARAÇÃO FOI BASEADA POR ESTES DOCUMENTOS PARA EMITIR A
DECLARACAO FOI FEITA COM BASE NAS INFORMAÇÕES PRESTADAS PELO
SEGURADO, <b>CART.
SEAP, CART. DA COLONIA, CART. PROFISSIONAL, RG, CPF, CERT. DO
TÍTULO, CERT. CASAMENTO OU NASCIMENTO, DECLARAÇÃO DE
PESCADOR/MARISQUERA COLONIZADO, CARNE DO INSS, ATESTADO MÉDICO E
COMPROVANTE DE RESIDÊNCIA."; echo iconv("UTF-8","ISO-8859-1",$texto);?></b></font></p>
<p class="um">   <font size="3" style="font-size: 12pt"></font></p>

<p align="right" class="um"><font size="3" style="font-size: 12pt"><?php
foreach($cidades as $cidade){

		 if(!empty($dadosColonia['id_municipio']) && $cidade['id_cidade'] == $dadosColonia['id_municipio']) echo iconv("UTF-8","ISO-8859-1",$cidade['nome_cidade']);

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

<p class="um" align="center" style="margin-bottom: 0cm; line-height: 100%">
<b>________________________________________________________________________________________</b></p>
<p align="center" class="um"><a name="_GoBack"></a>
<font size="1" style="font-size: 8pt"><b><?php echo iconv("UTF-8","ISO-8859-1",strtoupper($dadosColonia['presidente_colonia']));?></b></font></p>
<p align="center" class="um"><font size="1" style="font-size: 8pt"><b>PRESIDENTE DA 	<?php echo iconv("UTF-8", "ISO-8859-1//TRANSLIT", $dadosColonia['nome_colonia']); ?></b></font></p>
<div title="footer">
	<p align="center" style="margin-top: 1.1cm; margin-bottom: 0cm; line-height: 90%">
	<font size="2" style="font-size: 8pt"><b><?php echo iconv("utf-8","ISO-8859-1",strtoupper($dadosColonia['endereco_rua']));?>, <?php echo iconv("utf-8","ISO-8859-1",strtoupper($dadosColonia['endereco_numero']));?>, <?php echo iconv("utf-8","ISO-8859-1",strtoupper($dadosColonia['endereco_bairro']));?>,
		<?php
		foreach($cidades as $cidade){

				 if(!empty($dadosColonia['id_municipio']) && $cidade['id_cidade'] == $dadosColonia['id_municipio']) echo iconv("utf-8","ISO-8859-1",$cidade['nome_cidade']);

		}
		?>,
		<?php
	foreach($estados as $estado){

			 if(!empty($dadosColonia['id_estado']) && $estado['id_estado'] == $dadosColonia['id_estado']) echo iconv("utf-8","ISO-8859-1",$estado['nome_estado']);

	}
	?>, CEP: <?php echo $registro['cep'];?></b></font></p>
	<p align="center" class="um"><font size="2" style="font-size: 8pt"><b>Fone: <?php echo strtoupper($dadosColonia['telefones']);?></b></font></p>


</div>
</body>
</html>
