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
<section class="wrapper site-min-height">
    <!-- page start-->
    <section class="panel">
        <header class="panel-heading">
          Todos os dados de <?php echo $registro['nome_pessoa'];?>
        </header>
        <div class="panel-body">
          <form id="formDeclaracao">

          <div class="row" id="modeloPdf" style="">
              <div class="col-lg-12">
                  <div class="form-group">
                      <textarea class="ckeditor form-control" id="editor1" name="normativa" rows="18" style="height:600px"><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
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

                        </head>
                        <body lang="pt-BR" text="#00000a" dir="ltr">

                        <p class="um" align="center" style="margin-bottom: 0cm; line-height: 30%"><?php echo '<img width="61" height="60" src="'.base_url($dadosColonia['foto_federacao']).'"/>';?></p>

                        <p align="center" class="um" style="line-height: 30%"><font size="3" style="font-size: 12pt">
                        CONFEDERAÇÃO NACIONAL DOS PESCADORES E AQUICULTORES
                        </font></p>
                        <p align="center" class="um" style="line-height: 30%"><font size="3" style="font-size: 12pt">
                        <?php echo $dadosColonia['nome_federacao']." - ".$dadosColonia['sigla_federacao']; ?>
                        </font></p>

                        <p class="um" align="center" style="margin-bottom: 0cm; line-height: 30%"><font size="3" style="font-size: 12pt">
                        <?php echo $dadosColonia['nome_colonia']; ?></font></p>
                        <p class="um" align="center" style="margin-bottom: 0cm; line-height: 30%"><font size="3" style="font-size: 12pt">
                        Fundada em <?php if($dadosColonia['data_fundacao'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($dadosColonia['data_fundacao'])); }?></font></p>
                        <p class="um" align="center" style="margin-bottom: 0cm; line-height: 30%"><font size="3" style="font-size: 12pt">
                        CNPJ: <?php echo ($dadosColonia['cnpj']);?></font></p>
                        <p class="um" align="center" style="margin-bottom: 0cm; line-height: 30%">
                        <?php echo '<img width="60" height="60" src="'.base_url($dadosColonia['foto']).'"/>';?></p>

                        <p class="um" style="margin-bottom: 0cm; line-height: 20%"><br/>

                        </p>
                        <p class="um" align="center" style="margin-bottom: 0cm; line-height: 100%">
                        <b>FICHA DO ASSOCIADO</b></p>
                        <p class="um" style="margin-bottom: 0cm; line-height: 30%"><span style="display: inline-block; border: 1px solid #00000a; padding: 0cm">
                         <?php echo '<img width="100" height="100" src="'.base_url($registro['foto']).'"/>';?></span></p>
                        <p class="um" style="margin-bottom: 0cm; line-height: 30%"><br/>

                        </p>
                        <table width="100%" cellpadding="2" cellspacing="0">

                        	<tr>
                        		<td align="center" colspan="2" width="596" valign="top" class="um" bgcolor="#ffff00" style="border: 1px solid #00000a">
                        			<p class="um" align="center"><b>DADOS PESSOAIS E DA FAM&Iacute;LIA</b></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff"  style="border: 1px solid #00000a">
                        			<p class="um">Nome: <b><?php echo ($registro['nome_pessoa']);?></b></p>
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Nome do pai: <b><?php echo ($registro['nome_pai']);?></b></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Endere&ccedil;o: <b><?php echo ($registro['endereco_logradouro']);?>, <?php echo strtoupper($registro['endereco_numero']);?>, <?php echo strtoupper($registro['endereco_bairro']);?></b>,
                        			<b>	<?php
                        				foreach($cidades as $cidade){

                        						 if(!empty($registro['id_cidade']) && $cidade['id_cidade'] == $registro['id_cidade']) echo $cidade['nome_cidade'];

                        				}
                        				?></b>,
                        			<b><?php
                        			foreach($estados as $estado){

                        					 if(!empty($registro['id_estado']) && $estado['id_estado'] == $registro['id_estado']) echo $estado['nome_estado'];

                        			}
                        			?></b>, <b><?php echo ($registro['cep']);?></b></p>
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Nome da m&atilde;e: <b><?php echo ($registro['nome_mae']);?></b></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Data de nascimento: <b><?php echo ($registro['data_nascimento']);?></b>, <b><?php
                        					// Declara a data! :P
                        					$data = $registro['data_nascimento'];

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
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Estado civil: <b><?php echo ($registro['estado_civil']);?></b></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Registro de nascimento: <b><?php echo ($registro['reg_nasc_numero']);?></b>,
                        			<b><?php echo ($registro['reg_nasc_folha']);?>, <?php echo strtoupper($registro['reg_nasc_livro']);?></b></p>
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Profiss&atilde;o: <b><?php echo ($registro['profissao_atual']);?></b></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Naturalidade: <b><?php echo ($registro['naturalidade']);?></b></p>
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Telefones: <b><?php echo ($registro['telefones']);?></b></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Nacionalidade: <b><?php echo ($registro['nacionalidade']);?></b></p>
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Nome do(a) esposo(a)/companheiro(a): <b><?php echo ($registro['nome_esposa']);?></b></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um"><br/>

                        			</p>
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Nome dos filhos: <b><?php echo ($registro['nome_filhos']);?></b></p>
                        		</td>
                        	</tr>
                        </table>
<br>
                        <table width="100%" cellpadding="2" cellspacing="0">

                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffff00" align="center" style="border: 1px solid #00000a">
                        			<p class="um" align="center"><b>CADASTRO NA COL&Ocirc;NIA</b></p>
                        		</td>
                        		<td width="292" bgcolor="#ffff00" align="center" style="border: 1px solid #00000a">
                        			<p class="um" align="center"><b>ESCOLARIDADE</b></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">N&uacute;mero da Carteira na col&ocirc;nia: <b><?php echo strtoupper($registro['numero_carteira']);?></b></p>
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Alfabetizado: <b><?php echo ($registro['alfabetizado']);?></b></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Data da filiação: <b><?php if($registro['data_filiacao'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_filiacao'])); }?></b></p>
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Estudou at&eacute; que s&eacute;rie:<b> <?php echo ($registro['grau_estudo']);?></b></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
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
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um"><br/>

                        			</p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">N&uacute;mero do livro da filia&ccedil;&atilde;o: <b><?php echo ($registro['numero_livro_filiacao']);?></b></p>
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um"><br/>

                        			</p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">N&uacute;mero da folha: <b><?php echo ($registro['numero_folha_filiacao']);?></b></p>
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um"><br/>

                        			</p>
                        		</td>
                        	</tr>
                        </table>
<div style="page-break-before: always;"> </div>
                        <table width="100%" cellpadding="2" cellspacing="0">

                        	<tr>
                        		<td colspan="2" align="center" width="596" valign="top" bgcolor="#ffff00" style="border: 1px solid #00000a">
                        			<p class="um" align="center"><b>DOCUMENTOS PESSOAIS</b></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">CPF: <b><?php echo ($registro['cpf_cnpj']);?></b></p>
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">CTPS: <b><?php echo ($registro['numero_ctps']);?>,
                        				<?php echo ($registro['serie_ctps']);?>,
                        				<?php
                        				foreach($estados as $estado){

                        						 if(!empty($registro['estado_emissao_ctps']) && $estado['id_estado'] == $registro['estado_emissao_ctps']) echo $estado['nome_estado'];

                        				}
                        				?></b>
                        				</p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">RG: <b><?php echo ($registro['numero_rg']);?>,
                        				<?php echo ($registro['orgao_expedicao_rg']);?>,
                        			<?php if($registro['data_expedicao_rg'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_expedicao_rg'])); }?></b></p>
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">T&iacute;tulo: <b><?php echo strtoupper($registro['num_titulo']);?>,
                        				<?php echo ($registro['zona_titulo']);?>,
                        				<?php echo ($registro['secao_titulo']);?></b></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Reservista: <b><?php echo ($registro['num_reservista']);?></b></p>
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">

                        		</td>
                        	</tr>
                        </table>
<br>
                        <table width="100%" cellpadding="2" cellspacing="0">

                        	<tr>
                        		<td colspan="2" width="596" valign="top" align="center" bgcolor="#ffff00" style="border: 1px solid #00000a">
                        			<p class="um" align="center"><b>OUTROS REGISTROS</b></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Carteira da SUDEPE: <b><?php echo ($registro['numero_carteira_sudepe']);?></b></p>
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Inscri&ccedil;&atilde;o no NIT: <b><?php echo ($registro['numero_nit']);?></b></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Data de expedi&ccedil;&atilde;o SUDEPE: <b><?php if($registro['data_expedicao_supede'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_expedicao_supede'])); }?></b></p>
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Data da inscri&ccedil;&atilde;o no NIT: <b><?php if($registro['data_expedicao_nit'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_expedicao_nit'])); }?></b></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Carteira da SEAP/PR: <b><?php echo ($registro['numero_seap']);?></b></p>
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Pescador aposentado: <b><?php echo ($registro['aposentado']);?></b></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Data de expedi&ccedil;&atilde;o SEAP: <b><?php if($registro['data_expedicao_seap'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_expedicao_seap'])); }?></b></p>
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Data da aposentadoria:<b><?php echo $registro['data_aposentadoria'];?></b></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Matr&iacute;cula CEI: <b><?php echo ($registro['numero_cei']);?></b></p>
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Inscr. Cap. Dos Portos: <b><?php echo ($registro['numero_capitania_portos']);?></b></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Data da Matr&iacute;cula CEI: <b><?php if($registro['data_expedicao_cei'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_expedicao_cei'])); }?></b></p>
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Data da Inscr. Cap. Dos Portos: <b><?php if($registro['data_inscricao_capitania'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_inscricao_capitania'])); }?></b></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Pescador amador: <b><?php echo ($registro['amador']);?></b></p>
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Nome da embarca&ccedil;&atilde;o: <b><?php echo ($registro['nome_embarcacao']);?></b></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<!-- <p class="um">Data da expedi&ccedil;&atilde;o: </b><?php echo ($registro['']);?></p> -->
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">N° da embarca&ccedil;&atilde;o: <b><?php echo ($registro['numero_embarcacao']);?></b></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Inscri&ccedil;&atilde;o no PIS: <b><?php echo ($registro['numero_pis']);?></b></p>
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Tamanho da embarca&ccedil;&atilde;o: <b><?php echo ($registro['tamanho_embarcacao']);?></b></p>
                        		</td>
                        	</tr>
                        	<tr valign="top">
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Data de inscri&ccedil;&atilde;o no PIS: <b><?php if($registro['data_expedicao_pis'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_expedicao_pis'])); }?></b></p>
                        		</td>
                        		<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
                        			<p class="um">Largura da embarca&ccedil;&atilde;o: <b><?php echo ($registro['largura_embarcacao']);?></b></p>
                        		</td>
                        	</tr>
				<tr valign="top">
					<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
						<p class="um">Carteira do MPA: <b><?php echo ($registro['carteira_mpa']);?></b></p>
					</td>
					<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
				<p class="um">Carteira do MAPA: <b><?php echo ($registro['carteira_mapa']);?></b></p>
					</td>
				</tr>
			<tr valign="top">
					<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
						<p class="um">Data de expedição MPA: <b><?php if($registro['data_expedicao_mpa'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_expedicao_mpa'])); }?></b></p>
					</td>
					<td width="292" bgcolor="#ffffff" style="border: 1px solid #00000a">
					<p class="um">Data de expedição MAPA: <b><?php if($registro['data_mapa'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_mapa'])); }?></b></p>
					</td>
				</tr>
                        </table>

                        <p class="um" style="margin-bottom: 0cm; line-height: 100%"><?php setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );

                        date_default_timezone_set( 'America/Sao_Paulo' ); echo strftime( '%d de %B de %Y', strtotime( date( 'Y-m-d' ) ) );
                        ?>, <?php
                        foreach($cidades as $cidade){

                        		 if(!empty($dadosColonia['id_municipio']) && $cidade['id_cidade'] == $dadosColonia['id_municipio']) echo $cidade['nome_cidade'];

                        }
                        ?>, <?php
                        foreach($estados as $estado){

                        	 if(!empty($dadosColonia['id_estado']) && $estado['id_estado'] == $dadosColonia['id_estado']) echo $estado['nome_estado'];

                        }
                        ?>.</p>
                        <p class="um" style="margin-bottom: 0cm; line-height: 100%"><br/>

                        </p>
                        <p class="um" style="margin-bottom: 0cm; line-height: 100%"><br/>

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
                          ?>
                      </b></font></p>
                      <p align="center" class="um" style="line-height: 30%"><font size="3" style="font-size: 12pt">PRESIDENTE DA 	<?php echo $dadosColonia['nome_colonia']; ?></font></p>
                      <div title="footer">
                      	<p align="center" style="margin-top: 1.1cm; margin-bottom: 0cm; line-height: 30%">
                      	<font size="3" style="font-size: 12pt"><?php echo ($dadosColonia['endereco_rua']);?>, <?php echo strtoupper($dadosColonia['endereco_numero']);?>, <?php echo ($dadosColonia['endereco_bairro']);?>,
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
    <input type="hidden" name="tipo_relatorio" value="Impressão de todos os dados do pescador" id="tipo_relatorio">
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
CKEDITOR.addCss('td.um {bgcolor: #ffff00; }');
function printTextArea() {

var editorText = CKEDITOR.instances.editor1.getData();
//alert(editorText);
        childWindow = window.open('','childWindow','location=yes, menubar=yes, toolbar=yes');
        childWindow.document.open();
        //childWindow.document.write('<style>td.header { bgcolor: #ffff00;}</style>');
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
