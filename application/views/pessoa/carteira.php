<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title>Carteira</title>
	<meta name="generator" content="LibreOffice 5.0.6.2 (Linux)"/>
	<meta name="created" content="2016-09-08T13:51:50.970096248"/>
	<meta name="changed" content="2016-09-08T14:48:29.607126270"/>
	<style type="text/css">
		@page { margin: 1cm }
		p { margin-bottom: 0.25cm; line-height: 50% }
		td p { margin-bottom: 0cm }
		td.um{font-size: 7pt}
		#direita{
margin-left: 355px;
height:255px;
padding-top: -225px;

padding-right: 15px;

vertical-align: top;
}
	</style>

</head>
<body lang="pt-BR" dir="ltr">
<div style="float:left">
<table width="347.716535433px" height="226.771653543px" cellpadding="3" cellspacing="0" align="left" bgcolor="LightBlue">
	<tr valign="top">
		<td rowspan="4" width="33%" style="border-top: 1px solid #000000; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0.1cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
			<p><?php echo '<img width="60" height="60" src="'.base_url($dadosColonia['foto']).'"/>';?></p>
		</td>
		<td align="center" colspan="2" width="67%" style="font-weight: bold; border-top: 1px solid #000000; border-bottom: 0px solid #000000; border-right: 1px solid #000000; padding: 0.1cm">
			<p><font size="2" style="font-size: 9pt"><?php echo strtoupper($dadosColonia['nome_colonia']);?></font></p>
		</td>
	</tr>
	<tr valign="top">
		<td align="center" colspan="2" width="67%" class="um" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
			<p>CNPJ: <?php echo strtoupper($dadosColonia['cnpj']);?></p>
		</td>
	</tr>
	<tr valign="top">
		<td align="center" colspan="2" class="um" width="67%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
			<p>FUNDADA EM <?php echo date('d/m/Y', strtotime($dadosColonia['data_fundacao'])); ?></p>
		</td>
	</tr>
	<tr valign="top">
		<td align="center" colspan="2" class="um" width="67%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
			<p><?php echo strtoupper($dadosColonia['endereco_rua']);?>, <?php echo strtoupper($dadosColonia['endereco_numero']);?>, <?php echo strtoupper($dadosColonia['endereco_bairro']);?></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="33%" class="um" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
			<p>SÓCIO:</p>
		</td>
		<td colspan="2" class="um" width="67%" style="font-weight: bold; border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
			<p><?php echo strtoupper($registro['nome_pessoa']); ?></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="33%" class="um" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
			<p>RG: <?php echo strtoupper($registro['numero_rg']); ?></p>
		</td>
		<td width="33%" class="um" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
			<p>Matrícula nº <b><?php echo strtoupper($registro['numero_carteira']);?></b></p>
		</td>
		<td width="33%" class="um" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
			<p><br/>

			</p>
		</td>
	</tr>
	<tr valign="top">
		<td width="33%" class="um" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
			<p>CPF: <?php echo strtoupper($registro['cpf_cnpj']); ?></p>
		</td>
		<td width="33%" class="um" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
			<p>Livro: <?php echo strtoupper($registro['numero_livro_filiacao']); ?></p>
		</td>
		<td width="33%" class="um" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
			<p>Folha: <?php echo strtoupper($registro['numero_folha_filiacao']); ?></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="33%" class="um" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
			<p><br/>

			</p>
		</td>
		<td width="33%" class="um" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
			<p><br/>

			</p>
		</td>
		<td width="33%" class="um" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
			<p>	</p>
		</td>
	</tr>
	<tr valign="top">
		<td align="center" colspan="2" class="um" width="67%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
			<p>______________________________________________________</p>
		</td>
		<td align="right" rowspan="4" class="um" width="33%" style="border-top: none; border-bottom: 1px solid #000000; border-left: 0px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
			<p><?php echo '<img width="60" height="60" src="'.base_url($registro['foto']).'"/>';?></p>
		</td>
	</tr>
	<tr valign="top">
		<td align="center" colspan="2" class="um" width="67%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
			<p >Assinatura presidente</p>
		</td>
	</tr>
	<tr valign="top">
		<td align="center" colspan="2" class="um" width="67%" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
			<p>______________________________________________________</p>
		</td>
	</tr>
	<tr valign="top">
		<td colspan="2" align="center" class="um" width="67%" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
			<p align="center">Assinatura emitente</p>
		</td>
	</tr>

</table>
<p><br/>

</p>
</div>
<div style="float:right" id="direita">
<table width="347.716535433px" height="226.771653543px" cellpadding="3" cellspacing="0" bgcolor="LightBlue">
	<col width="128*">
	<col width="128*">
	<tr>
		<td colspan="2" class="um" width="100%" valign="top" style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; border-bottom: 0px solid #000000; padding: 0.1cm">
			<p>Pai: <?php echo strtoupper($registro['nome_pai']); ?>
			</p>
		</td>
	</tr>

	<tr>
		<td colspan="2" class="um" width="100%" valign="top" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
			<p>Mãe: <?php echo strtoupper($registro['nome_mae']); ?>
			</p>
		</td>
			
	<tr>
		<td colspan="2" class="um" width="100%" valign="top" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
			<p>Nasc.: <?php echo strtoupper($registro['data_nascimento']); ?>. Naturalidade: <?php echo strtoupper($registro['naturalidade']); ?>
			</p>
		</td>
	</tr>

	<tr>
		<td colspan="2" class="um" width="100%" valign="top" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
			<p><div style="text-transform: capitalize">Estado civil: <?php echo strtoupper($registro['estado_civil']); ?></div></p>
		</td>
	</tr>
	<tr>
		<td colspan="2" class="um" width="100%" valign="top" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
			<p>Profissão: <?php echo strtoupper($registro['profissao_atual']); ?>
			</p>
		</td>
	</tr>
	<tr>
		<td colspan="2" class="um" width="100%" valign="top" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
			<p>End.: <?php echo strtoupper($registro['endereco_logradouro']); ?>, <?php echo strtoupper($registro['endereco_bairro']); ?>, <?php echo strtoupper($registro['endereco_numero']); ?>
			</p>
		</td>
	</tr>
	<tr>
		<td colspan="2" class="um" width="100%" valign="top" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
			<p>Cadastrado em: <?php if($registro['data_filiacao'] == '0000-00-00'){echo "00/00/0000";}else{echo date('d/m/Y', strtotime($registro['data_filiacao']));} ?></p>
		</td>
	</tr>
	<tr valign="top">
		<td width="50%" class="um" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
			<p>Carteira SEAP: <?php echo strtoupper($registro['numero_seap']); ?>
			</p>
		</td>
		<td width="50%" class="um" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
			<p>Exp em: <?php if($registro['data_expedicao_seap'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_expedicao_seap'])); }?></p>
		</td>
	</tr>
	<tr>
		<td colspan="2" class="um" width="100%" valign="top" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
			<p>Impresso em: <?php date_default_timezone_set( 'America/Sao_Paulo' ); echo date('d/m/Y'); ?>
			</p>
		</td>
	</tr>
	<tr valign="top">
		<td width="50%" class="um" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0cm">
			<p>

			</p>
		</td>
		<td width="50%" class="um" style="border-top: none; border-bottom: 0px solid #000000; border-left: 0px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
			<p>

			</p>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center" height="33px" class="um" width="100%" valign="top" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
			<p align="center"><br><br><br></p>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center" class="um" width="100%" valign="top" style="border-top: none; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
			<p align="center">________________________________________________________________</p>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center" class="um" width="100%" valign="top" style="border-top: none; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; padding-top: 0cm; padding-bottom: 0.1cm; padding-left: 0.1cm; padding-right: 0.1cm">
			<p align="center">Assinatura do sócio</p>
		</td>
	</tr>
</table>
<p><br/>

</p>
<p style="margin-bottom: 0cm; line-height: 100%"><br/>

</p>
</div>

</body>
</html>
