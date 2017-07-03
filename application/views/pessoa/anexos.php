<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-13">
            <section class="panel">
                <header class="panel-heading">Editar Pescador n° <?php echo $registro['id_pessoa']; ?></header>
                <div class="panel-body">
                    <div style="display:none">
                        <form id="frmFoto" method="post" action="<?php echo base_url("pessoa/upload_foto"); ?>" enctype="multipart/form-data">
                            <input id="uploadfoto" name="uploadfoto" type="file" onchange="$('.foto-avatar').prepend('<div class=\'load\'></div>');$('#frmFoto').submit()" />
                        </form>
                    </div>
                    <form id="formCadastro" class="formProcesso">
                      <header class="panel-heading tab-bg-dark-navy-blue">
                          <ul class="nav nav-tabs nav-justified ">
                              <li class="active">
                                  <a href="#audiencias" data-toggle="tab">

                                      <a href="<?php echo base_url('pessoa/editar')."/".$registro['id_pessoa'];?>" >
                                        Dados Pessoais
                                      </a>
                                  </a>
                              </li>
                              <li>
                                  <a href="#pericia" data-toggle="tab">

                                      <a href="<?php echo base_url('pessoa/editar')."/".$registro['id_pessoa'];?>" >
                                        Documentos
                                      </a>
                                  </a>
                              </li>
                              <li>
                                  <a href="#compromisso" data-toggle="tab">

                                    <a href="<?php echo base_url('pessoa/editar')."/".$registro['id_pessoa'];?>" >
                                      Dados na Colônia
                                    </a>
                                  </a>
                              </li>
                              <li>
                                  <a href="#emenda_laudo" data-toggle="tab">

                                    <a href="<?php echo base_url('pessoa/editar')."/".$registro['id_pessoa'];?>" >
                                      Embarcação
                                    </a>
                                  </a>
                              </li>
                              <li>
                                  <a href="#recurso_contestacao" data-toggle="tab">

                                    <a href="<?php echo base_url('pessoa/editar')."/".$registro['id_pessoa'];?>" >
                                        Outros Dados
                                    </a>
                                  </a>
                              </li>
                              <li>
                                  <a href="#agendamento" data-toggle="tab">

                                    <a href="<?php echo base_url('pessoa/editar')."/".$registro['id_pessoa'];?>" >
                                      Agendamento
                                    </a>
                                  </a>
                              </li>
                              <li>
                                  <a href="#atendimento" data-toggle="tab">

                                    <a href="<?php echo base_url('pessoa/editar')."/".$registro['id_pessoa'];?>" >
                                      Atendimento
                                    </a>
                                  </a>
                              </li>

                              <li>
                                  <a href="#anexos" data-toggle="tab">
                                    Anexos
                                  </a>
                              </li>


                          </ul>
                      </header>

               <div class="tab-content">
                   <div class="tab-pane active" id="audiencias">
                      <fieldset>
                        <legend>Dados Pessoais</legend>
                        <input type="hidden" name="id_pessoa" value="<?php echo $registro['id_pessoa'];?>" />
                        <div class="row">

                            <div class="col-lg-2">

<?php if(empty($registro['foto'])) {
    ?>
    <div class="form-group">
        <div class="foto-avatar arredonda-100 " onclick="$('#uploadfoto').trigger('click')"
             style="position: absolute;margin: 0px 20px 0px 20px;background-size: auto 100%; background-position: center center;">

            <input type='hidden' name='foto' value="" id="avatar_cadastros" >
        </div>
    </div>
    <?php
}else{
    ?>
                                <div class="form-group">
    <div style="position: absolute; margin: 0px 20px; background: transparent url(<?php echo base_url($registro['foto']);?>) no-repeat scroll center center / 150% auto; border: 5px solid rgb(194, 194, 194);"  class="foto-avatar arredonda-100 " title="Trocar Foto" >
        <input type="hidden" id="avatar_cadastros" value="<?php echo $registro['foto'];?>" name="foto">
        <div class="btn-info" style="text-align:center;margin-top:95px" onclick="$('#uploadfoto').trigger('click')">Trocar Foto</div>
    </div>

                                </div>
    <?php
}
?>


                                </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">CPF*:</label>
                                    <input type="text" class="form-control" name="cpf_cnpj" value="<?php echo $registro['cpf_cnpj'];?>" id="cpf_cnpj" placeholder="" >
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Nome*:</label>
                                    <input type="text" class="form-control" name="nome" value="<?php echo $registro['nome_pessoa']; ?>" placeholder="Informe o Nome" required>
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">Apelido:</label>
                                    <input type="text" class="form-control" name="apelido" value="<?php echo $registro['apelido']; ?>" placeholder="Informe o Apelido" >
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">Data Nascimento:</label>
                                        <input type="text" class="form-control data" name="data_nascimento" value="<?php if(!empty($registro['data_nascimento']) && '00/00/0000' != $registro['data_nascimento']) echo $registro['data_nascimento']; ?>" id="data_nascimento" placeholder="" />
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    &ensp;
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estado Civil:</label>
                                    <select class="form-control m-bot15" name="estado_civil" id="estado_civil" >
                                        <option value="">Selecione</option>
                                        <option value="Solteiro" <?php if(!empty($registro['estado_civil']) && "Solteiro" == $registro['estado_civil']) echo "selected"; ?>>Solteiro</option>
                                        <option value="Casado" <?php if(!empty($registro['estado_civil']) && "Casado" == $registro['estado_civil']) echo "selected"; ?>>Casado</option>
                                        <option value="Separado" <?php if(!empty($registro['estado_civil']) && "Separado" == $registro['estado_civil']) echo "selected"; ?>>Separado</option>
                                        <option value="Divorciado" <?php if(!empty($registro['estado_civil']) && "Divorciado" == $registro['estado_civil']) echo "selected"; ?>>Divorciado</option>
                                        <option value="União Estável" <?php if(!empty($registro['estado_civil']) && "União Estável" == $registro['estado_civil']) echo "selected"; ?>>União Estável</option>
                                        <option value="Viúvo" <?php if(!empty($registro['estado_civil']) && "Viúvo" == $registro['estado_civil']) echo "selected"; ?>>Viúvo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Nome da Mãe:</label>
                                    <input type="text" class="form-control" name="nome_mae" value="<?php echo $registro['nome_mae']; ?>" id="nome_mae" placeholder="" >
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Nome do Pai:</label>
                                    <input type="text" class="form-control" name="nome_pai" value="<?php echo $registro['nome_pai']; ?>" id="nome_pai" placeholder="" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-2">
                              <div class="form-group">
                                <a href="<?php echo base_url('pessoa/gerar_carteira')."/".$registro['id_pessoa'];?> " style="float:left;margin-left:4px;" title="Visualizar/Editar" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-pencil">Gerar Carteira</i></a>
                                <a href="<?php echo base_url('pessoa/declaracao_view')."/".$registro['id_pessoa'];?> " style="float:left;margin-left:4px;" title="Visualizar/Editar" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-archive">Gerar Declaração</i></a>
                                <a href="<?php echo base_url('pessoa/impressao_view')."/".$registro['id_pessoa'];?> " style="float:left;margin-left:4px;" title="Visualizar/Editar" target="_blank" class="btn btn-warning btn-sm"><i class="fa fa-print">Imprimir todos os dados</i></a>
                                <a href="<?php echo base_url('pessoa/normativa_view')."/".$registro['id_pessoa'];?> " style="float:left;margin-left:4px;" title="Visualizar/Editar" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-print">Instrução normativa INSS</i></a>
                                <a href="<?php echo base_url('pessoa/pesca_view')."/".$registro['id_pessoa'];?> " style="float:left;margin-left:4px;" title="Visualizar/Editar" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print">Autorização de Pesca</i></a>
                                <a href="<?php echo base_url('pessoa/renda_view')."/".$registro['id_pessoa'];?> " style="float:left;margin-left:4px;" title="Visualizar/Editar" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-print">Declaração de Renda</i></a>
				<a href="<?php echo base_url('pessoa/cancelamento_view')."/".$registro['id_pessoa'];?> " style="float:left;margin-left:4px;" title="Visualizar/Editar" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-print">Pedido de Cancelamento</i></a>
				<a href="<?php echo base_url('pessoa/segunda_via_view')."/".$registro['id_pessoa'];?> " style="float:left;margin-left:4px;" title="Visualizar/Editar" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print">Pedido de Segunda via</i></a>
                              </div>
                          </div>
                          <div class="col-lg-3">
                              <div class="form-group">
                                  <label for="">Nome da esposa*:</label>
                                <input type="text" class="form-control" name="nome_esposa" id="nome_esposa" value="<?php echo $registro['nome_esposa']; ?>" placeholder="" >
                              </div>
                          </div>
                          <div class="col-lg-4">
                              <div class="form-group">
                                  <label for="">E-mail*:</label>
                                  <input type="text" class="form-control" name="email" value="<?php echo $registro['email']?>" id="email" placeholder="" >
                              </div>
                          </div>
                          <div class="col-lg-3">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Grau de estudo*:</label>
                              <select class="form-control m-bot15" name="grau_estudo" id="grau_estudo">
                                  <option value="">Selecione</option>

                                  <option value="Fundamental - Incompleto" <?php if(!empty($registro['grau_estudo']) && "Fundamental - Incompleto" == $registro['grau_estudo']) echo "selected"; ?>>Fundamental - Incompleto</option>
                                  <option value="Fundamental - Completo" <?php if(!empty($registro['grau_estudo']) && "Fundamental - Completo" == $registro['grau_estudo']) echo "selected"; ?>>Fundamental - Completo</option>
                                  <option value="Médio - Incompleto" <?php if(!empty($registro['grau_estudo']) && "Médio - Incompleto" == $registro['grau_estudo']) echo "selected"; ?>>Médio - Incompleto</option>
                                  <option value="Médio - Completo" <?php if(!empty($registro['grau_estudo']) && "Médio - Completo" == $registro['grau_estudo']) echo "selected"; ?>>Médio - Completo</option>
                                  <option value="Superior - Incompleto" <?php if(!empty($registro['grau_estudo']) && "Superior - Incompleto" == $registro['grau_estudo']) echo "selected"; ?>>Superior - Incompleto</option>
                                  <option value="Superior - Completo" <?php if(!empty($registro['grau_estudo']) && "Superior - Completo" == $registro['grau_estudo']) echo "selected"; ?>>Superior - Completo</option>
                              </select>
                          </div>
                        </div>

                        </div>

                        <div class="row">
                          <div class="col-lg-2">
                              <div class="form-group">

                              </div>
                          </div>

                          <div class="col-lg-3">
                              <div class="form-group">
                                  <label for="">Alfabetizado:</label>

                                  <input type="radio" name="alfabetizado" value="Nao" <?php if('Nao' == $registro['alfabetizado']) echo "checked"; ?> /> Não
                                  <input type="radio" name="alfabetizado" value="Sim" <?php if('Sim' == $registro['alfabetizado']) echo "checked"; ?>  /> Sim
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-md-7"><label for="">Filhos:</label>
                                  <textarea class="wysihtml5 form-control" name="nome_filhos" rows="5"><?php echo $registro['nome_filhos']; ?></textarea>
                              </div>
                          </div>
                        </div>

                        <div class="row">

                          <div class="col-lg-2">
                              <div class="form-group">

                              </div>
                          </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Nacionalidade*:</label>
                                    <input type="text" class="form-control" name="nacionalidade" value="<?php echo $registro['nacionalidade']; ?>" id="nacionalidade" placeholder="" >
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Naturalidade*:</label>
                                    <input type="text" class="form-control " name="naturalidade" value="<?php echo $registro['naturalidade']; ?>" id="naturalidade" placeholder="" >
                                </div>
                            </div>

                        </div>
</fieldset>

<fieldset>
  <legend>Endereço</legend>
                        <div class="row">
                          <div class="col-lg-2">
                              <div class="form-group">

                              </div>
                          </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">CEP:</label>
                                    <input type="text" class="form-control cep" value="<?php echo $registro['cep']; ?>" name="endereco_cep" id="Cep" placeholder="" >
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Estado:</label>

                                    <select class="form-control m-bot15" name="id_estado" id="id_estado" >
                                      <option value="">SELECIONE ESTADO</option>
                                      <?php
                                      foreach($estados as $estado){
                                          ?>
                                          <option value="<?php echo $estado['id_estado'];?>" <?php if(!empty($registro['id_estado']) && $estado['id_estado'] == $registro['id_estado']) echo "selected"; ?>><?php echo $estado['nome_estado'];?></option>
                                          <?php
                                      }
                                      ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Cidade:</label>
                                    <select class="form-control m-bot15" id="cidades" name="id_cidade" style="background:#fff;opacity:0.65;" >
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-2">
                              <div class="form-group">

                              </div>
                          </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Logradouro:</label>
                                    <input type="text" class="form-control" name="endereco_logradouro" value="<?php echo $registro['endereco_logradouro']; ?>" id="endereco_logradouro" placeholder="" >
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">Número:</label>
                                    <input type="text" class="form-control" name="endereco_numero" value="<?php echo $registro['endereco_numero']; ?>" id="endereco_numero" placeholder="" >
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Bairro:</label>
                                    <input type="text" class="form-control" name="endereco_bairro" value="<?php echo $registro['endereco_bairro']; ?>" id="endereco_bairro" placeholder="" >
                                </div>
                            </div>


                        </div>

                        <div class="row">
                          <div class="col-lg-2">
                              <div class="form-group">

                              </div>
                          </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="">Ponto de Referência/Complemento:</label>
                                <input type="text" class="form-control" name="endereco_complemento" value="<?php echo $registro['endereco_complemento']; ?>" id="endereco_complemento" placeholder="" >
                            </div>
                        </div>
                      </div>
</fieldset>

<fieldset>
  <legend>Contatos</legend>
                        <div class="row">
                          <!-- div para espacamento  -->
                          <div class="col-lg-2">
                              <div class="form-group">

                              </div>
                          </div>


                            <div class="col-lg-10">
                                <div class="form-group">
                                  <div class="col-md-8"><label for="">Telefones:</label>
                                      <textarea class="wysihtml5 form-control" name="telefones"  rows="2"><?php echo $registro['telefones']; ?></textarea>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">

                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="form-group">
                                  <div class="col-md-8"><label for="">Vizinhos:</label>
                                      <textarea class="wysihtml5 form-control" name="vizinhos"  rows="2"><?php echo $registro['vizinhos']; ?></textarea>
                                  </div>
                                </div>
                            </div>

                        </div>
</fieldset>
<div class="row" style="margin-top:10px;">
    <div class="col-lg-2">
        <div class="form-group">
            <button class="btn btn-info" type="submit">Salvar</button>
        </div>
    </div>
</div>
  </div>





    <div class="tab-pane" id="pericia">
      <fieldset>
        <legend>Documentos</legend>
        <div class="row">
          <div class="col-lg-2">
              <div class="form-group">

              </div>
          </div>
          <div class="col-lg-3">
              <div class="form-group">
                  <label for="">Livro de registro de nascimento:</label>
                  <input type="text" class="form-control" name="livro_reg_nasc" value="<?php echo $registro['reg_nasc_livro']; ?>" id="livro_reg_nasc" placeholder="" >
              </div>
          </div>
          <div class="col-lg-4">
              <div class="form-group">
                  <label for="">Numero de registro de nascimento:</label>
                  <input type="text" class="form-control" name="num_reg_nasc" value="<?php echo $registro['reg_nasc_numero']; ?>" id="num_reg_nasc" placeholder="" >
              </div>
          </div>
          <div class="col-lg-3">
              <div class="form-group">
                  <label for="">Folha de registro de nascimento:</label>
                  <input type="text" class="form-control" name="folha_reg_nasc" value="<?php echo $registro['reg_nasc_folha']; ?>" id="folha_reg_nasc" placeholder="" >
              </div>
          </div>

        </div>

        <div class="row">
          <div class="col-lg-2">
              <div class="form-group">

              </div>
          </div>
          <div class="col-lg-4">
              <div class="form-group">
                  <label for="">Numero do título:</label>
                  <input type="text" class="form-control" name="num_titulo" value="<?php echo $registro['num_titulo']; ?>" id="num_titulo" placeholder="" >
              </div>
          </div>
          <div class="col-lg-3">
              <div class="form-group">
                  <label for="">Zona do título:</label>
                  <input type="text" class="form-control" name="zona_titulo" value="<?php echo $registro['zona_titulo']; ?>" id="zona_titulo" placeholder="" >
              </div>
          </div>
          <div class="col-lg-3">
              <div class="form-group">
                  <label for="">Seção do título:</label>
                  <input type="text" class="form-control" name="secao_titulo" value="<?php echo $registro['secao_titulo']; ?>" id="secao_titulo" placeholder="" >
              </div>
          </div>

        </div>

        <div class="row">
          <div class="col-lg-2">
              <div class="form-group">

              </div>
          </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="">Número RG:</label>
                    <input type="text" class="form-control" name="numero_rg" id="numero_rg" value="<?php echo $registro['numero_rg']; ?>"placeholder="" >
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="">Orgão de Expedição RG:</label>
                    <input type="text" class="form-control " name="orgao_expedicao_rg" value="<?php echo $registro['orgao_expedicao_rg']; ?>" id="orgao_expedicao_rg" placeholder="" >
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="">Data Expedição RG:</label>
                    <input type="text" class="form-control data" name="data_expedicao_rg" value="<?php if($registro['data_expedicao_rg'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_expedicao_rg'])); }?>" id="data_expedicao_rg" placeholder="" >
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="">Estado Expedição RG:</label>

                    <select class="form-control m-bot15" name="estado_expedicao_rg" >
                        <option value="">SELECIONE ESTADO</option>
                        <?php
                        foreach($estados as $estado){
                            ?>
                            <option value="<?php echo $estado['id_estado'];?>" <?php if(!empty($registro['estado_expedicao_rg']) && $estado['id_estado'] == $registro['estado_expedicao_rg']) echo "selected"; ?>><?php echo $estado['nome_estado'];?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>


        <div class="row">
          <div class="col-lg-2">
              <div class="form-group">

              </div>
          </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="">Número CTPS:</label>
                    <input type="text" class="form-control" value="<?php echo $registro['numero_ctps']; ?>" name="numero_ctps" id="numero_ctps" placeholder="" >
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="">Série CTPS:</label>
                    <input type="text" class="form-control" value="<?php echo $registro['serie_ctps']; ?>" name="serie_ctps" id="serie_ctps" placeholder="" >
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="">Estado Emissão CTPS:</label>

                    <select class="form-control m-bot15" name="estado_emissao_ctps" >
                      <option value="">SELECIONE ESTADO</option>
                      <?php
                      foreach($estados as $estado){
                          ?>
                          <option value="<?php echo $estado['id_estado'];?>" <?php if(!empty($registro['estado_emissao_ctps']) && $estado['id_estado'] == $registro['estado_emissao_ctps']) echo "selected"; ?>><?php echo $estado['nome_estado'];?></option>
                          <?php
                      }
                      ?>
                    </select>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label for="">N° reservista:</label>
                    <input type="text" class="form-control" value="<?php echo $registro['num_reservista']; ?>" name="num_reservista" id="num_reservista" placeholder="" >
                </div>
            </div>
        </div>
        </fieldset>
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-2">
                <div class="form-group">
                    <button class="btn btn-info" type="submit">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane" id="compromisso">

  <fieldset>
    <legend>Dados na Colônia</legend>
    <div class="row">
      <div class="col-lg-2">
          <div class="form-group">

          </div>
      </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label for="">Número da MAT.:</label>
                <input type="text" class="form-control" name="numero_carteira" id="numero_carteira" value="<?php echo $registro['numero_carteira'];?>" placeholder="" >
            </div>
        </div>


        <div class="col-lg-2">
            <div class="form-group">
                <label for="">Data filiacao:</label>
                <input type="text" class="form-control data" name="data_filiacao" value="<?php if($registro['data_filiacao'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_filiacao'])); }?>" id="data_filiacao" placeholder="" >
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="">Número do livro de filiação:</label>
                <input type="text" class="form-control" name="numero_livro_filiacao" value="<?php echo $registro['numero_livro_filiacao'];?>" id="numero_livro_filiacao" placeholder="" >
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label for="">Número da folha de filiação:</label>
                <input type="text" class="form-control" name="numero_folha_filiacao" value="<?php echo $registro['numero_folha_filiacao'];?>" id="numero_folha_filiacao" placeholder="" >
            </div>
        </div>
    </div>
  </fieldset>
  <div class="row" style="margin-top:10px;">
      <div class="col-lg-2">
          <div class="form-group">
              <button class="btn btn-info" type="submit">Salvar</button>
          </div>
      </div>
  </div>
</div>
  <div class="tab-pane" id="recurso_contestacao">
  <fieldset>
    <legend>Outros Dados</legend>
    <div class="row">
      <div class="col-lg-2">
          <div class="form-group">

          </div>
      </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="">N° SUDEPE:</label>
                <input type="text" class="form-control" name="numero_carteira_sudepe" value="<?php echo $registro['numero_carteira_sudepe'];?>"  id="numero_carteira_supede" placeholder="" >
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label for="">Data SUDEPE:</label>
                <input type="text" class="form-control data" name="data_expedicao_sudepe" value="<?php if($registro['data_expedicao_supede'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_expedicao_supede'])); }?>" id="data_expedicao_sudepe" placeholder="" >
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="">N° SEAP:</label>
                <input type="text" class="form-control" name="numero_seap" value="<?php echo $registro['numero_seap'];?>" id="numero_seap" placeholder="" >
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label for="">Data SEAP:</label>
                <input type="text" class="form-control data" name="data_expedicao_seap" value="<?php if($registro['data_expedicao_seap'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_expedicao_seap'])); }?>" id="data_expedicao_seap" placeholder="" >
            </div>
        </div>

      </div>


      <div class="row">
        <div class="col-lg-2">
            <div class="form-group">

            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="">Inscrição PIS:</label>
                <input type="text" class="form-control" name="numero_pis" value="<?php echo $registro['numero_pis'];?>" id="numero_pis" placeholder="" >
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label for="">Data Inscrição PIS:</label>
                <input type="text" class="form-control data" name="data_expedicao_pis" value="<?php if($registro['data_expedicao_pis'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_expedicao_pis'])); }?>" id="data_expedicao_pis" placeholder="" >
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="">Inscrição NIT:</label>
                <input type="text" class="form-control" name="numero_nit" value="<?php echo $registro['numero_nit'];?>" id="numero_nit" placeholder="" >
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label for="">Data Inscrição NIT:</label>
                <input type="text" class="form-control data" name="data_expedicao_nit" value="<?php if($registro['data_expedicao_nit'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_expedicao_nit'])); }?>" id="data_expedicao_nit" placeholder="" >
            </div>
        </div>
      </div>


      <div class="row">
        <div class="col-lg-2">
            <div class="form-group">

            </div>
        </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label for="">Matrícula CEI:</label>
                    <input type="text" class="form-control" name="numero_cei" value="<?php echo $registro['numero_cei'];?>" id="numero_cei" placeholder="" >
                </div>
            </div>

            <div class="col-lg-2">
                <div class="form-group">
                    <label for="">Data Matrícula CEI:</label>
                    <input type="text" class="form-control data" value="<?php if($registro['data_expedicao_cei'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_expedicao_cei'])); }?>" name="data_expedicao_cei" id="data_expedicao_cei" placeholder="" >
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label for="">Morto:</label>

                    <input type="radio" name="morto" value="Nao" <?php if('Nao' == $registro['morto']) echo "checked"; ?> /> Não
                    <input type="radio" name="morto" value="Sim"  <?php if('Sim' == $registro['morto']) echo "checked"; ?> /> Sim
                </div>
            </div>


          </div>

          <div class="row">
            <div class="col-lg-2">
                <div class="form-group">

                </div>
            </div>

          <div class="col-lg-3">
              <div class="form-group">
                  <label for="">Amador:</label>
                  <input type="radio"  name="amador" value="Nao"   <?php if('Nao' == $registro['amador']) echo "checked"; ?>/> Não
                  <input type="radio" name="amador" value="Sim"  <?php if('Sim' == $registro['amador']) echo "checked"; ?>/> Sim
              </div>
          </div>

          <div class="col-lg-4">
              <div class="form-group">
                  <label for="">Inscrição na Capitania dos Portos:</label>
                  <input type="text" class="form-control" name="numero_capitania_portos" value="<?php echo $registro['numero_capitania_portos'];?>" id="numero_capitania_portos" placeholder="" >
              </div>
          </div>

          <div class="col-lg-3">
              <div class="form-group">
                  <label for="">Data Capitania dos Portos:</label>
                  <input type="text" class="form-control data" name="data_inscricao_capitania" value="<?php if($registro['data_inscricao_capitania'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_inscricao_capitania'])); }?>"  id="data_inscricao_capitania" placeholder="" >
              </div>
          </div>
        </div>


        <div class="row">
          <div class="col-lg-2">
              <div class="form-group">

              </div>
          </div>

          <div class="col-lg-4">
              <div class="form-group">
                  <label for="">Profissão Atual:</label>
                  <input type="text" class="form-control" name="profissao_atual" value="<?php echo $registro['profissao_atual'];?>" id="profissao_atual" placeholder="" >
              </div>
          </div>

          <div class="col-lg-3">
              <div class="form-group">
                  <label for="">Carteira do MPA:</label>
                  <input type="text" class="form-control" name="carteira_mpa" value="<?php echo $registro['carteira_mpa'];?>" id="carteira_mpa" placeholder="" >
              </div>
          </div>
          <div class="col-lg-3">
              <div class="form-group">
                  <label for="">Data Expedição MPA:</label>
                  <input type="text" class="form-control data" name="data_expedicao_mpa" value="<?php if($registro['data_expedicao_mpa'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_expedicao_mpa'])); }?>" id="data_expedicao_mpa" placeholder="" >
              </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-2">
              <div class="form-group">

              </div>
          </div>

          <div class="col-lg-3">
              <div class="form-group">
                  <label for="">Aposentado:</label>
                  <input type="radio"  name="aposentado" value="Nao"  <?php if('Nao' == $registro['aposentado']) echo "checked"; ?> /> Não
                  <input type="radio" name="aposentado" value="Sim"  <?php if('Sim' == $registro['aposentado']) echo "checked"; ?>/> Sim
              </div>
          </div>

          <div class="col-lg-2">
              <div class="form-group">
                  <label for="">Data Aposentadoria:</label>
                  <input type="text" class="form-control data" value="<?php if($registro['data_aposentadoria'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_aposentadoria'])); }?>" name="data_aposentadoria" id="data_aposentadoria" placeholder="" >
              </div>
          </div>

          <div class="col-lg-5">
              <div class="form-group">
                  <label for="">Número benefício:</label>
                  <input type="text" class="form-control" name="nb_aposentadoria" id="nb_aposentadoria" value="<?php echo $registro['nb_aposentadoria'];?>" placeholder="" >
              </div>
          </div>



      </div>

      <div class="row">
        <div class="col-lg-2">
            <div class="form-group">

            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label for="">Carteira Mapa:</label>
                <input type="text" class="form-control" value="<?php echo $registro['carteira_mapa'];?>" name="carteira_mapa" id="carteira_mapa" placeholder="" >
            </div>
        </div>

      <div class="col-lg-2">
          <div class="form-group">
              <label for="">Data Mapa:</label>
              <input type="text" class="form-control data" name="data_mapa" value="<?php if($registro['data_mapa'] == '0000-00-00'){ echo "00/00/0000";}else{ echo date('d/m/Y', strtotime($registro['data_mapa'])); }?>" id="data_mapa" placeholder="" >
          </div>
      </div>


    </div>


      <div class="row">
        <div class="col-lg-2">
            <div class="form-group">

            </div>
        </div>
      <div class="form-group">
          <div class="col-md-7"><label for="">Observações:</label>
              <textarea class="wysihtml5 form-control" name="observacoes"  rows="5"><?php echo $registro['observacoes'];?></textarea>
          </div>
      </div>
      </div>





  </fieldset>
  <div class="row" style="margin-top:10px;">
      <div class="col-lg-2">
          <div class="form-group">
              <button class="btn btn-info" type="submit">Salvar</button>
          </div>
      </div>
  </div>
</div>
  <div class="tab-pane" id="emenda_laudo">
  <fieldset>
    <legend>Dados da Embarcação</legend>

    <div class="row">
      <div class="col-lg-2">
          <div class="form-group">

          </div>
      </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="">Número da Embarcação:</label>
                <input type="text" class="form-control" name="numero_embarcacao" value="<?php echo $registro['numero_embarcacao'];?>" id="numero_embarcacao" placeholder="" >
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Nome da Embarcação:</label>
                <input type="text" class="form-control" name="nome_embarcacao" value="<?php echo $registro['nome_embarcacao'];?>" id="nome_embarcacao" placeholder="" >
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label for="">Tamanho da Embarcação:</label>
                <input type="text" class="form-control" name="tamanho_embarcacao" value="<?php echo $registro['tamanho_embarcacao'];?>" id="tamanho_embarcacao" placeholder="" >
            </div>
        </div>



    </div>

    <div class="row">
      <div class="col-lg-2">
        <div class="form-group">
        </div>
      </div>
      <div class="col-lg-3">
          <div class="form-group">
              <label for="">Largura da Embarcação:</label>
              <input type="text" class="form-control" name="largura_embarcacao" value="<?php echo $registro['largura_embarcacao'];?>" id="largura_embarcacao" placeholder="">
          </div>
      </div>
    </div>


  </fieldset>
  <div class="row" style="margin-top:10px;">
      <div class="col-lg-2">
          <div class="form-group">
              <button class="btn btn-info" type="submit">Salvar</button>
          </div>
      </div>
  </div>
</div>




                    </form>
                    <div class="tab-pane" id="agendamento">
                      <div class="modal fade" id="myModalFormAddAgendamento" tabindex="-1"
                           role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
                          <div class="modal-dialog" style="width:400px;">
                              <div class="modal-content">
                                  <form action="" id="formAddAgendamento">
                                      <input type="hidden" value="<?php echo $registro['id_pessoa'];?>" name="id_pessoa" />

                                      <div class="modal-header">
                                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×
                                          </button>
                                          <h4 class="modal-title">Adicionar Novo Agendamento</h4>
                                      </div>
                                      <div class="modal-body">

                                          <div class="col-lg-14">
                                              <div class="row">
                                                  <div class="col-lg-12">
                                                      <div class="form-group">
                                                          <label for="">Número do benefício:</label>
                                                          <input type="text" class="form-control" name="numero_beneficio" id="numero_beneficio" placeholder="">
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="col-lg-14">
                                              <div class="row">
                                                  <div class="col-lg-12">
                                                      <div class="form-group">
                                                          <label for="">Tipo de Benefício:</label>
                                                          <input type="text" class="form-control" name="tipo_beneficio" id="tipo_beneficio" placeholder="">
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="col-lg-14">
                                              <div class="row">
                                          <div class="col-lg-6">
                                              <div class="form-group">
                                                  <label for="">Data Agendamento:</label>
                                                  <input type="text" class="form-control data" name="data_agendamento" id="data_agendamento" placeholder="" >
                                              </div>
                                          </div>
                                          <div class="col-lg-6">
                                              <div class="form-group">
                                                  <label for="">Horário:</label>
                                                  <input type="text" class="form-control" name="horario" id="horario" placeholder="" >
                                              </div>
                                          </div>
                                        </div>
                                    </div>

                                      </div>
                                      <div class="modal-footer">
                                            <input type="submit" id="botaoAcao" value="Adicionar" class="btn btn-success"/>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                      <section class="panel">
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th style="width: 300px;"><i class="fa fa-bullhorn"></i>Tipo do Benefício</th>
                                  <th>Numero do Beneficio</th>
                                  <th>Data agendamento</th>
                                  <th><i class="fa fa-calendar"></i>Data Cadastro</th>
                                  <th><i class="fa fa-user"></i>Usuário Cadastro</th>
                                  <th style="text-align: center;"><a href="" id="addNovoAgendamento" class="btn btn-success" title="Adicionar"><i class="fa fa-plus "></i></a></th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              if(!empty($agendamento))
                              {
                                  foreach($agendamento as $an) {
                                      ?>
                                      <tr>
                                          <td><?php echo $an['tipo_beneficio']; ?></td>
                                          <td><?php echo $an['numero_beneficio']; ?></td>
                                          <td><?php echo $an['data_agendamento']; ?>, <?php echo $an['horario'];?></td>
                                          <td><?php echo $an['data_cadastro']; ?></td>
                                          <td colspan="2"><?php echo $an['usuario_cadastro']; ?></td>
                                      </tr>
                                      <?php
                                  }
                              }else{
                                  ?>
                                  <tr>
                                      <td colspan="4">Nenhum agendamento cadastrado.</td>
                                  </tr>
                                  <?php
                              }
                              ?>
                              </tbody>
                          </table>
                      </section>
                    </div>

                    <div class="tab-pane" id="atendimento">
                      <div class="modal fade" id="myModalFormAddAtendimento" tabindex="-1"
                           role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
                          <div class="modal-dialog" style="width:400px;">
                              <div class="modal-content">
                                  <form action="" id="formAddAtendimento">
                                      <input type="hidden" value="<?php echo $registro['id_pessoa'];?>" name="id_pessoa" />

                                      <div class="modal-header">
                                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×
                                          </button>
                                          <h4 class="modal-title">Adicionar Novo Atendimento</h4>
                                        </div>
                                      <div class="modal-body">

                                        <div class="col-lg-14">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">Descrição:</label>
                                                        <textarea class="form-control" name="descricao_historico" required rows="4"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                      </div>
                                      <div class="modal-footer">
                                          <input type="submit" id="botaoAcao" value="Adicionar" class="btn btn-success"/>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                      <section class="panel">
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th style="width: 300px;"><i class="fa fa-bullhorn"></i>Descrição</th>
                                  <th><i class="fa fa-calendar"></i>Data Cadastro</th>
                                  <th><i class="fa fa-user"></i>Usuário Cadastro</th>
                                  <th style="text-align: center;"><a href="" id="addNovoAtendimento" class="btn btn-success" title="Adicionar"><i class="fa fa-plus "></i></a></th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              if(!empty($historico))
                              {
                                  foreach($historico as $an) {
                                      ?>
                                      <tr>
                                          <td><?php echo $an['descricao_historico']; ?></td>
                                          <td><?php echo $an['data_cadastro']; ?></td>
                                          <td colspan="2"><?php echo $an['usuario_cadastro']; ?></td>
                                      </tr>
                                      <?php
                                  }
                              }else{
                                  ?>
                                  <tr>
                                      <td colspan="4">Nenhum Atendimento cadastrado.</td>
                                  </tr>
                                  <?php
                              }
                              ?>
                              </tbody>
                          </table>
                      </section>
                    </div>


                    <div class="tab-pane" id="anexos">

                      <div class="modal fade" id="myModalFormAddAnexo" tabindex="-1"
                           role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
                          <div class="modal-dialog" style="width:400px;">

                              <div class="modal-content">
                                  <form action="" id="formAddAnexo">


                                      <div class="modal-header">
                                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×
                                          </button>
                                          <h4 class="modal-title">Adicionar Novo Anexo</h4>
                                        </div>
                                      <div class="modal-body">


                                        <div class="col-lg-14">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">Nome:</label>
                                                        <input type="text"  name="nome_anexo" class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-14">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Anexo:</label>
                                                <form id="frmAnexo" method="post" action="<?php echo base_url("pessoa/upload_anexo"); ?>"
                                                      enctype="multipart/form-data">
                                                        <input type="hidden" value="<?php echo $registro['id_pessoa'];?>" name="id_pessoa" />
                                                    <input id="uploadAnexo" name="uploadanexo" type="file" id_pessoa="<?php echo $registro['id_pessoa'];?>"
                                                           onchange="$('.foto-avatar').prepend('<div class=\'load\'></div>');$('#frmAnexo').submit()"/>
                                                </form>
                                                <!-- <a href="" class="btn btn-primary selecione"
                                                   id="botaoUploadAnexo"
                                                   style="background-size: auto 100%; background-position: center center;">Selecione</a> -->
                                                <input type='hidden' name='anexo' value="" id="anexo"
                                                       required></button>
                                                <div id="msgUpload"></div>
                                                <br/>

                                            </div>
                                        </div>



                                      </div>
                                      <div class="modal-footer">
                                          <input type="submit" id="botaoAcao" value="Adicionar" class="btn btn-success"/>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                      <section class="panel">
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                <th ><i class="fa fa-bullhorn"></i> Nome Anexo</th>
                                <th ><i class="fa fa-bullhorn"></i> Caminho/Link</th>
                                <th><i class="fa fa-calendar"></i> Data Cadastro</th>
                                <th><i class="fa fa-user"></i> Usuário Cadastro</th>
                                <th style="text-align: center;"><a href="" id="addNovoAnexo" class="btn btn-success" title="Adicionar"><i class="fa fa-plus "></i></a></th>
                              </tr>
                              </thead>
                              <tbody>
                                <?php
                                if(!empty($anexo))
                                {
                                    foreach($anexo as $an) {
                                        ?>
                                        <tr>
                                            <td><?php echo $an['nome_anexo']; ?></td>
                                            <td><a href="<?php echo base_url($an['caminho_anexo']); ?>" target="_blank"><i class="fa fa-download"></i></a></td>
                                            <td><?php echo $an['data_cadastro']; ?></td>
                                            <td><?php echo $an['usuario_cadastro']; ?></td>
                                            <td  style="text-align: center;">
                                                <button class="btn btn-danger btn-xs excluirAnexo" title="Excluir Anexo"  codigoRegistro="<?php echo $an['id_pessoa_anexo'];?>" ><i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }else{
                                    ?>
                                    <tr>
                                        <td colspan="5">Nenhum anexo cadastrado.</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                              </tbody>
                          </table>
                      </section>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url("tema/flatlab/js/jquery.js");?>"></script>
<script src="<?php echo base_url("tema/flatlab/js/bootstrap.min.js");?>"></script>
<script src="<?php echo base_url("tema/flatlab/js/jquery.scrollTo.min.js");?>"></script>
<script src="<?php echo base_url("tema/flatlab/js/jquery.nicescroll.js");?>" type="text/javascript"></script>

<script src="<?php echo base_url("tema/flatlab/js/jquery-ui-1.9.2.custom.min.js");?>"></script>
<script class="include" type="text/javascript" src="<?php echo base_url("tema/flatlab/js/jquery.dcjqaccordion.2.7.js");?>"></script>

<!--custom switch-->
<script src="<?php echo base_url("tema/flatlab/js/bootstrap-switch.js");?>"></script>
<!--custom tagsinput-->
<script src="<?php echo base_url("tema/flatlab/js/jquery.tagsinput.js");?>"></script>
<!--custom checkbox & radio-->
<script type="text/javascript" src="<?php echo base_url("tema/flatlab/js/ga.js");?>"></script>




<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/fuelux/js/spinner.min.js");?>"></script>



<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/bootstrap-datepicker/js/bootstrap-datepicker.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/bootstrap-daterangepicker/date.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/bootstrap-daterangepicker/daterangepicker.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/bootstrap-timepicker/js/bootstrap-timepicker.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/ckeditor/ckeditor.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("tema/flatlab/assets/bootstrap-inputmask/bootstrap-inputmask.min.js");?>"></script>
<script src="<?php echo base_url("tema/flatlab/js/respond.min.js");?>" ></script>


<!--common script for all pages-->
<script src="<?php echo base_url("tema/flatlab/js/common-scripts.js");?>"></script>


<script src="<?php echo base_url("js/jquery.form.js");?>"></script>


<!--script for this page-->
<script src="<?php echo base_url("tema/flatlab/js/form-component.js");?>"></script>

<script src="<?php echo base_url("tema/flatlab/js/jquery.maskedinput.min.js");?>"></script>

<!--this page  script only-->
<script src="<?php echo base_url("tema/flatlab/js/individual/datepicker.js");?>"></script>


<script type="text/javascript">
$(document).ready(function(){
    $("#addNovoAtendimento").click(function(e){
        e.preventDefault();
        $("#myModalFormAddAtendimento").modal({backdrop: 'static', keyboard: false});
    });

    $("#formAddAtendimento").submit(function (e) {
        e.preventDefault();
        $('#loader-wrapper').show();
        var dadosForm = $(this).serialize();
        //Envia Dados via Ajax
        $.ajax({
            type: 'POST',
            dataType: "json",
            url: '<?php echo base_url("pessoa/salvar_historico_e");?>',
            data: dadosForm,
            success: function (response) {


                if ('erro' == response.classe) {
                    $('#loader-wrapper').fadeOut(500);
                    alertaVModal(response.msg, response.classe);
                    return false;
                }
                else if ('acerto' == response.classe) {
                    $('#loader-wrapper').fadeOut(500);
                    $("#myModalFormAddAtendimento").modal('hide');
                    alertaVModal(response.msg, response.classe,response.url);
                }

                return false;
            }
        });
    });
  });


    $(document).ready(function(){
        $("#botaoUploadAnexo").click(function (e) {
            e.preventDefault();
            $('#uploadAnexo').trigger('click');
        });

        $('#frmAnexo').ajaxForm({
            success: function (data) {
                if (data != 'false') {
                    $(".foto-avatar").css("background","url('<?php echo base_url();?>"+data+"') no-repeat center","background-size","150%","border","solid 3px #c2c2c2");
                    //$(".foto-avatar").css("border","solid 5px #c2c2c2");
                    //$(".foto-avatar").css("background-size","150%");
                    $(".selecione").hide();
                    $("input[name='anexo']").val("");
                    var data = data.replace("	", "");
                    $("input[name='anexo']").val(data);
                    //$('.load').hide();
                    //$(".conteudo-modal,.escurece-tela").show();
                    //$("#titulo").html("Sucesso");
                    //$("#msgUpload").html('<b style="color:black">Arquivo: '+data+'!</b>');
                    $("#msgUpload").html('<b style="color:green">Upload feito com sucesso !</b>');

                } else {
                    //$(".escurece-tela,.escurece-tela").show();
                    //$("#titulo").html("Ops");
                    //$("#msg").html("Ocorreu um erro ao realizar o upload da foto!");
                    alertaVModal("Ocorreu um erro ao realizar o upload da foto!", 'erro');
                }
            }
        });

        $(".excluirAnexo").click(function (e) {
            e.preventDefault();
            var codigoRegistro = $(this).attr('codigoRegistro');
            confirmModal("Deseja excluir este anexo?", 'excluirAnexo', null, codigoRegistro);
        });

        $("#addNovoAnexo").click(function(e){
            e.preventDefault();
            $("#myModalFormAddAnexo").modal({backdrop: 'static', keyboard: false});
        });

        $("#formAddAnexo").submit(function (e) {
            e.preventDefault();
            $('#loader-wrapper').show();
            var dadosForm = $(this).serialize();
            //Envia Dados via Ajax
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: '<?php echo base_url("pessoa/salvar_anexo_e");?>',
                data: dadosForm,
                success: function (response) {


                    if ('erro' == response.classe) {
                        $('#loader-wrapper').fadeOut(500);
                        alertaVModal(response.msg, response.classe);
                        return false;
                    }
                    else if ('acerto' == response.classe) {
                        $('#loader-wrapper').fadeOut(500);
                        $("#myModalFormAddAnexo").modal('hide');
                        alertaVModal(response.msg, response.classe,response.url);
                    }

                    return false;
                }
            });
        });


    $("#addNovoAgendamento").click(function(e){
        e.preventDefault();
        $("#myModalFormAddAgendamento").modal({backdrop: 'static', keyboard: false});
    });

    $("#formAddAgendamento").submit(function (e) {
        e.preventDefault();
        $('#loader-wrapper').show();
        var dadosForm = $(this).serialize();
        //Envia Dados via Ajax
        $.ajax({
            type: 'POST',
            dataType: "json",
            url: '<?php echo base_url("pessoa/salvar_agendamento_e");?>',
            data: dadosForm,
            success: function (response) {


                if ('erro' == response.classe) {
                    $('#loader-wrapper').fadeOut(500);
                    alertaVModal(response.msg, response.classe);
                    return false;
                }
                else if ('acerto' == response.classe) {
                    $('#loader-wrapper').fadeOut(500);
                    $("#myModalFormAddAgendamento").modal('hide');
                    alertaVModal(response.msg, response.classe,response.url);
                }

                return false;
            }
        });
    });
});
    $(document).ready(function(){


        function getCidades(idEstado) {
            $("#cidades").html("");
            if(idEstado != '')
            {


                $.ajax('<?php echo /*"http://".$_SERVER['SERVER_NAME']."/ajax/getCidades";*/ base_url("ajax/getCidades");?>', {
                    data: { idEstado: idEstado },
                    dataType: "json",
                    success: function(data){
                        $("#cidades").html('<option value="">SELECIONE A CIDADE</option>');

                        $.each(data, function(i, item) {
                            var selected = '';
                <?php
if(!empty($registro['id_cidade']))
{
    ?>
                            if(item.id_cidade == <?php echo $registro['id_cidade'];?>)
                                selected += 'selected';
                            <?php
}
                            ?>

                            $("#cidades").append('<option value="'+item.id_cidade+'"  '+selected+' >'+item.nome_cidade+'</option>');
                        });

                    },
                    error: function(){
                        console.log('Erro ao buscar cidades.');
                    }
                });
            }

        }
        $("#id_estado").change(function(){
            getCidades($(this).val());
        });
        getCidades($("#id_estado").val());

        $(".cep").mask("99999-999");
        $(".data").mask("99/99/9999");
        $("#cpf_cnpj").mask("999.999.999-99");
        $("#horario").mask("99:99");
        $(".cpf_cnpj_tipo").click(function(e){


            var cpf_cnpj = $(this).prop('checked');
                if(true == cpf_cnpj)
                {
                    if('CPF' == $(this).val())
                        $("#cpf_cnpj").mask("999.999.999-99");
                    else if('CNPJ' == $(this).val())
                        $("#cpf_cnpj").mask("99.999.999/9999-99");
                }


        });

        function verificarCarteira(numero_carteira) {
            //Envia Dados via Ajax
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: '<?php echo base_url("pessoa/verificaCarteiraExistenteEditar");?>/' + numero_carteira,
                success: function (response) {
                    if ('erro' == response.classe) {
                        $('#loader-wrapper').fadeOut(500);
                        alertaVModal(response.msg, "erro");
                        $(this).hide();
                        $('#numero_carteira').val("");
                        return false;
                    }
                    else if ('acerto' == response.classe) {
                        $('#loader-wrapper').fadeOut(500);
                        alertaVModal(response.msg, response.classe, response.url);
                        $(this).hide();
                        $(this).val("");

                    }
                    return false;
                }
            });
        }

        $('#numero_carteira').blur(function(){

            // numero da carteira
            var numero_carteira = $(this).val();

            verificarCarteira(numero_carteira);


        });

        $('#spinner1').spinner({value:1, min: 1});


        $('#frmFoto').ajaxForm({
            success : function(data) {
                if (data != 'false') {
                    $(".foto-avatar").css("background","url('<?php echo base_url();?>"+data+"') no-repeat center","background-size","150%","border","solid 3px #c2c2c2");
                    $(".foto-avatar").css("border","solid 5px #c2c2c2");
                    $(".foto-avatar").css("background-size","150%");
                    $("input[name='foto']").val("");
                    var data = data.replace("	","");
                    $("input[name='foto']").val(data);
                    $('.load').hide();
                    $(".conteudo-modal,.escurece-tela").show();
                    $("#titulo").html("Sucesso");
                    $("#msg").html("Upload feito com sucesso !");

                } else {
                    $(".escurece-tela,.escurece-tela").show();
                    $("#titulo").html("Ops");
                    $("#msg").html("Ocorreu um erro ao realizar o upload da foto!");
                }
            }
        });

        $("#formCadastro").submit(function(e){
            $("input[type=submit]").attr('disabled','disabled');
            e.preventDefault();
            $('#loader-wrapper').show();
            var dadosForm = $(this).serialize();
            //Envia Dados via Ajax
            $.ajax({type:'POST',
                dataType: "json",url:'<?php echo base_url("pessoa/salvar");?>', data: dadosForm, success: function(response) {
                    if('erro' == response.classe) {
                        $('#loader-wrapper').fadeOut(500);
                        alertaVModal(response.msg, response.classe);
                        return false;
                    }
                    else if('acerto' == response.classe)
                    {
                        var url = "'"+response.url+"'";
                        $('#loader-wrapper').fadeOut(500);
                        alertaVModal(response.msg, response.classe, response.url);
                        //confirmContinuoNaoModal(response.msg+"<br/><b>Deseja cadastrar um Novo?</b><br/>", url)
                    }

                    return false;
                }});
        });
    });
</script>
