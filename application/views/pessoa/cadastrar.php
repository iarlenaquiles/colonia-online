<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Cadastro de Pescador</header>

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
                                      Dados Pessoais
                                  </a>
                              </li>
                              <li>
                                  <a href="#pericia" data-toggle="tab">
                                      Documentos
                                  </a>
                              </li>
                              <li>
                                  <a href="#compromisso" data-toggle="tab">
                                    Dados na Colônia
                                  </a>
                              </li>
                              <li>
                                  <a href="#emenda_laudo" data-toggle="tab">
                                    Embarcação
                                  </a>
                              </li>
                              <li>
                                  <a href="#recurso_contestacao" data-toggle="tab">
                                    Outros Dados
                                  </a>
                              </li>



                          </ul>
                      </header>
                      <div class="tab-content">
                          <div class="tab-pane active" id="audiencias">
<fieldset>
  <legend>Dados Pessoais</legend>
                        <div class="row">

                            <div class="col-xs-4 col-sm-2 col-lg-2">
                                <div class="form-group">
                                    <div class="foto-avatar arredonda-100 " onclick="$('#uploadfoto').trigger('click')" style="position: absolute;margin: 0px 20px 0px 20px;background-size: auto 100%; background-position: center center;" >
                                        <input type='hidden' name='foto' value="" id="avatar_cadastros" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-2 col-lg-2">
                                <div class="form-group">
                                  <label for="">CPF*:</label>
                                    <input type="text" class="form-control" name="cpf_cnpj" id="cpf_cnpj" placeholder="" >
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-lg-8">
                                <div class="form-group">
                                    <label for="">Nome*:</label>
                                    <input type="text" class="form-control" name="nome" placeholder="Informe o Nome" >
                                </div>
                            </div>

                          </div>
                          <br><br>

                        <div class="row">
                          <div class="col-lg-2">
                              <div class="form-group">

                              </div>
                          </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">Apelido:</label>
                                    <input type="text" class="form-control" name="apelido" placeholder="Informe o Apelido" >
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">Data Nascimento:</label>
                                    <input type="text" class="form-control data" name="data_nascimento" id="data_nascimento" placeholder="" >
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
                                    <label for="exampleInputEmail1">Estado Civil*:</label>
                                    <select class="form-control m-bot15" name="estado_civil" id="estado_civil">
                                        <option value="">Selecione</option>
                                        <option value="Casado">Casado(a)</option>
                                        <option value="Divorciado">Divorciado(a)</option>
                                        <option value="Separado">Separado(a)</option>
                                        <option value="Solteiro">Solteiro(a)</option>
                                        <option value="União estável">União Estável</option>
                                        <option value="Viúvo">Viúvo(a)</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Nome da Mãe:</label>
                                    <input type="text" class="form-control" name="nome_mae" id="nome_mae" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Nome do Pai:</label>
                                    <input type="text" class="form-control" name="nome_pai" id="nome_pai" placeholder="">
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
                                  <label for="">Nome do(a) esposo(a):</label>
                                  <input type="text" class="form-control" name="nome_esposa" value="" id="nome_esposa" placeholder="" >
                              </div>
                          </div>
                          <div class="col-lg-3">
                              <div class="form-group">
                                  <label for="">E-mail:</label>
                                  <input type="text" class="form-control" name="email" value="" id="email" placeholder="" >
                              </div>
                          </div>
                          <div class="col-lg-4">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Grau de estudo*:</label>
                                  <select class="form-control m-bot15" name="grau_estudo" id="grau_estudo">
                                      <option value="">Selecione</option>
                                      <option value="Fundamental - Incompleto">Fundamental - Incompleto</option>
                                      <option value="Fundamental - Completo">Fundamental - Completo</option>
                                      <option value="Médio - Incompleto">Médio - Incompleto</option>
                                      <option value="Médio - Completo">Médio - Completo</option>
                                      <option value="Superior - Incompleto">Superior - Incompleto</option>
                                      <option value="Superior - Completo">Superior - Completo</option>
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
                                  <label for="">Alfabetizado(a):</label>
                                  <input type="radio" name="alfabetizado" value="Nao" /> Não
                                  <input type="radio" checked name="alfabetizado" value="Sim" /> Sim
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-md-7"><label for="">Filhos:</label>
                                  <textarea class="wysihtml5 form-control" name="nome_filhos"  rows="5"></textarea>
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
                                    <label for="">Nacionalidade:</label>
                                    <input type="text" class="form-control" name="nacionalidade" value="" id="nacionalidade" placeholder="" >
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Naturalidade:</label>
                                    <input type="text" class="form-control " name="naturalidade" value="" id="naturalidade" placeholder="" >
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
                                    <input type="text" class="form-control cep"  name="endereco_cep" id="Cep" placeholder="" >
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
                                            <option value="<?php echo $estado['id_estado'];?>"><?php echo $estado['nome_estado'];?></option>
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
                                    <input type="text" class="form-control" name="endereco_logradouro" id="endereco_logradouro" placeholder="" >
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Número:</label>
                                    <input type="text" class="form-control" name="endereco_numero" id="endereco_numero" placeholder="" >
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Bairro:</label>
                                    <div>
                                        <div id="boxAjaxAutoComplete" style="float:left;margin:7px;float:left;display:none;"><img src="<?php echo base_url('tema/flatlab/img/ajax-loader-autocomplete.gif')?>"></div>
                                        <input type="hidden" name="id_bairro" id="id_bairro" />
                                        <input type="text" placeholder="" id="endereco_bairro" name="endereco_bairro" style="width:82%;margin-right:4px ; float:left;" class="form-control">
                                        <a href="" id="addNovoBairro" style="float:left;" class="btn btn-success">+</a>
                                    </div>
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
                                <label for="">Ponto de referência/Complemento:</label>
                                <input type="text" class="form-control" name="endereco_complemento" id="endereco_complemento" placeholder="" >
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
                                      <textarea class="wysihtml5 form-control" name="telefones"  rows="2"></textarea>
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
                                      <textarea class="wysihtml5 form-control" name="vizinhos"  rows="2"></textarea>
                                  </div>
                                </div>
                            </div>

                        </div>
</fieldset>
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
                                  <input type="text" class="form-control" name="livro_reg_nasc" value="" id="livro_reg_nasc" placeholder="" >
                              </div>
                          </div>
                          <div class="col-lg-4">
                              <div class="form-group">
                                  <label for="">Numero de registro de nascimento:</label>
                                  <input type="text" class="form-control" name="num_reg_nasc" value="" id="num_reg_nasc" placeholder="" >
                              </div>
                          </div>
                          <div class="col-lg-3">
                              <div class="form-group">
                                  <label for="">Folha de registro de nascimento:</label>
                                  <input type="text" class="form-control" name="folha_reg_nasc" value="" id="folha_reg_nasc" placeholder="" >
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
                                  <input type="text" class="form-control" name="num_titulo" value="" id="num_titulo" placeholder="" >
                              </div>
                          </div>
                          <div class="col-lg-3">
                              <div class="form-group">
                                  <label for="">Zona do título:</label>
                                  <input type="text" class="form-control" name="zona_titulo" value="" id="zona_titulo" placeholder="" >
                              </div>
                          </div>
                          <div class="col-lg-3">
                              <div class="form-group">
                                  <label for="">Seção do título:</label>
                                  <input type="text" class="form-control" name="secao_titulo" value="" id="secao_titulo" placeholder="" >
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
                                    <input type="text" class="form-control" name="numero_rg" id="numero_rg" placeholder="" >
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Orgão de Expedição RG:</label>
                                    <input type="text" class="form-control " name="orgao_expedicao_rg" id="orgao_expedicao_rg" placeholder="" >
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">Data Expedição RG:</label>
                                    <input type="text" class="form-control data" name="data_expedicao_rg" id="data_expedicao_rg" placeholder="" >
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
                                            <option value="<?php echo $estado['id_estado'];?>"><?php echo $estado['nome_estado'];?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <!-- aquiii -->
                        <div class="row">
                          <div class="col-lg-2">
                              <div class="form-group">

                              </div>
                          </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">Número CTPS:</label>
                                    <input type="text" class="form-control" name="numero_ctps" id="numero_ctps" placeholder="" >
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">Série CTPS:</label>
                                    <input type="text" class="form-control" name="serie_ctps" id="serie_ctps" placeholder="" >
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
                                            <option value="<?php echo $estado['id_estado'];?>"><?php echo $estado['nome_estado'];?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">N° reservista:</label>
                                    <input type="text" class="form-control" name="num_reservista" id="num_reservista" placeholder="" >
                                </div>
                            </div>
                        </div>
                        </fieldset>
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
              <input type="text" class="form-control" name="numero_carteira" id="numero_carteira" placeholder="" >
          </div>
      </div>
      <div class="col-lg-2">
          <div class="form-group">
              <label for="">Data filiacao:</label>
              <input type="text" class="form-control data" name="data_filiacao" id="data_filiacao" placeholder="" >
          </div>
      </div>
      <div class="col-lg-3">
          <div class="form-group">
              <label for="">Número do livro de filiação:</label>
              <input type="text" class="form-control" name="numero_livro_filiacao" id="numero_livro_filiacao" placeholder="" >
          </div>
      </div>

      <div class="col-lg-3">
          <div class="form-group">
              <label for="">Número da folha de filiação:</label>
              <input type="text" class="form-control" name="numero_folha_filiacao" id="numero_folha_filiacao" placeholder="" >
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
          <div>
              <div id="boxAjaxAutoComplete" style="float:left;margin:7px;float:left;display:none;"><img src="<?php echo base_url('tema/flatlab/img/ajax-loader-autocomplete.gif')?>"></div>
              <input type="hidden" name="id_profissao" id="id_profissao" />
              <input type="text" placeholder="" id="profissao_atual" name="profissao_atual" style="width:82%;margin-right:4px ; float:left;" class="form-control">
              <a href="" id="addNovaProfissao" style="float:left;" class="btn btn-success">+</a>
          </div>

      </div>
  </div>
  </div>
</fieldset>
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
              <input type="text" class="form-control" name="numero_carteira_sudepe" id="numero_carteira_sudepe" placeholder="" >
          </div>
      </div>
      <div class="col-lg-2">
          <div class="form-group">
              <label for="">Data SUDEPE:</label>
              <input type="text" class="form-control data" name="data_expedicao_sudepe" id="data_expedicao_sudepe" placeholder="" >
          </div>
      </div>
      <div class="col-lg-3">
          <div class="form-group">
              <label for="">N° SEAP:</label>
              <input type="text" class="form-control" name="numero_seap" id="numero_seap" placeholder="" >
          </div>
      </div>
      <div class="col-lg-2">
          <div class="form-group">
              <label for="">Data SEAP:</label>
              <input type="text" class="form-control data" name="data_expedicao_seap" id="data_expedicao_seap" placeholder="" >
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
              <input type="text" class="form-control" name="numero_pis" id="numero_pis" placeholder="" >
          </div>
      </div>
      <div class="col-lg-2">
          <div class="form-group">
              <label for="">Data Inscrição PIS:</label>
              <input type="text" class="form-control data" name="data_expedicao_pis" id="data_expedicao_pis" placeholder="" >
          </div>
      </div>
      <div class="col-lg-3">
          <div class="form-group">
              <label for="">Inscrição NIT:</label>
              <input type="text" class="form-control" name="numero_nit" id="numero_nit" placeholder="" >
          </div>
      </div>
      <div class="col-lg-2">
          <div class="form-group">
              <label for="">Data Inscrição NIT:</label>
              <input type="text" class="form-control data" name="data_expedicao_nit" id="data_expedicao_nit" placeholder="" >
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
                  <input type="text" class="form-control" name="numero_cei" id="numero_cei" placeholder="" >
              </div>
          </div>

          <div class="col-lg-2">
              <div class="form-group">
                  <label for="">Data Matrícula CEI:</label>
                  <input type="text" class="form-control data" name="data_expedicao_cei" id="data_expedicao_cei" placeholder="" >
              </div>
          </div>



          <div class="col-lg-3">
              <div class="form-group">
                  <label for="">Morto:</label>
                  <input type="radio" checked name="morto" value="Nao"  /> Não
                  <input type="radio" name="morto" value="Sim" /> Sim
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
                <input type="radio" checked name="amador" value="Nao"  /> Não
                <input type="radio" name="amador" value="Sim" /> Sim
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Inscrição na Capitania dos Portos:</label>
                <input type="text" class="form-control" name="numero_capitania_portos" id="numero_capitania_portos" placeholder="" >
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label for="">Data Capitania dos Portos:</label>
                <input type="text" class="form-control data" name="data_inscricao_capitania" id="data_inscricao_capitania" placeholder="" >
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
                <label for="">Carteira do MPA:</label>
                <input type="text" class="form-control" name="carteira_mpa" id="carteira_mpa" placeholder="" >
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="">Data Expedição MPA:</label>
                <input type="text" class="form-control data" name="data_expedicao_mpa" id="data_expedicao_mpa" placeholder="" >
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
              <input type="radio" checked name="aposentado" value="Nao"  /> Não
              <input type="radio" name="aposentado" value="Sim" /> Sim
          </div>
      </div>

      <div class="col-lg-2">
          <div class="form-group">
              <label for="">Data Aposentadoria:</label>
              <input type="text" class="form-control data" name="data_aposentadoria" id="data_aposentadoria" placeholder="" >
          </div>
      </div>

      <div class="col-lg-5">
          <div class="form-group">
              <label for="">Número benefício:</label>
              <input type="text" class="form-control" name="nb_aposentadoria" id="nb_aposentadoria" placeholder="" >
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
              <input type="text" class="form-control" name="carteira_mapa" id="carteira_mapa" placeholder="" >
          </div>
      </div>

    <div class="col-lg-2">
        <div class="form-group">
            <label for="">Data Mapa:</label>
            <input type="text" class="form-control data" name="data_mapa" id="data_mapa" placeholder="" >
        </div>
    </div>


  </div>

  <div class="row">
    <div class="col-lg-2">
        <div class="form-group">

        </div>
    </div>
  <div class="form-group">
      <div class="col-md-7"><label for="">Tipo de Pescado:</label>
          <textarea class="wysihtml5 form-control" name="tipo_pescado"  rows="5"></textarea>
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
            <textarea class="wysihtml5 form-control" name="observacoes"  rows="5"></textarea>
        </div>
    </div>
    </div>





</fieldset>
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
              <input type="text" class="form-control" name="numero_embarcacao" id="numero_embarcacao" placeholder="" >
          </div>
      </div>

      <div class="col-lg-4">
          <div class="form-group">
              <label for="">Nome da Embarcação:</label>
              <input type="text" class="form-control" name="nome_embarcacao" id="nome_embarcacao" placeholder="" >
          </div>
      </div>

      <div class="col-lg-3">
          <div class="form-group">
              <label for="">Tamanho da Embarcação:</label>
              <input type="text" class="form-control" name="tamanho_embarcacao" id="tamanho_embarcacao" placeholder="" >
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
            <input type="text" class="form-control" name="largura_embarcacao" id="largura_embarcacao" placeholder="">
        </div>
    </div>
  </div>


</fieldset>
</div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <button class="btn btn-info" type="submit">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</section>

<div class="modal fade" id="myModalFormAddBairro" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
    <div class="modal-dialog" style="width:400px;">
        <div class="modal-content">
            <form action="" id="formAddBairro">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×
                    </button>
                    <h4 class="modal-title">Adicionar Novo Bairro</h4></div>
                <div class="modal-body">
                    <div class="col-lg-14">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Nome do Bairro:</label>
                                    <input type="text" required name="endereco_bairro" class="form-control" required value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" id="botaoBairro" value="Adicionar" class="btn btn-success"/>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="myModalFormAddProfissao" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
    <div class="modal-dialog" style="width:400px;">
        <div class="modal-content">
            <form action="" id="formAddProfissao">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×
                    </button>
                    <h4 class="modal-title">Adicionar Nova Profissão</h4></div>
                <div class="modal-body">
                    <div class="col-lg-14">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Nome da Profissão:</label>
                                    <input type="text" required name="nome_profissao" class="form-control" required value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" id="botaoProfissao" value="Adicionar" class="btn btn-success"/>
                </div>
            </form>
        </div>
    </div>
</div>

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

<script src="<?php echo base_url("tema/flatlab/js/valida_cpf_cnpj.js");?>"></script>
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

      $( "#profissao_atual" ).autocomplete({
              minLength: 2,
              source: function( request, response ) {
                  $("#boxAjaxCliente").show();
                  $.ajax({
                      url: '<?php echo base_url('profissao/ajax');?>',
                      dataType: "json",
                      data: {
                          acao: 'listar',
                          term: $('#profissao_atual').val()
                      },
                      success: function(data) {
                          response(data);
                      }
                  });
              },
              html: true, // optional (jquery.ui.autocomplete.html.js required)

              // optional (if other layers overlap autocomplete list)
              open: function(event, ui) {
                  $(".ui-autocomplete").css("z-index", 99000);
              },
              select: function( event, ui ) {
                  $("#profissao_atual").val( ui.item.nome_profissao);
                  $("#id_profissao").val( ui.item.id_profissao);

                  return false;
              },
          })
          .autocomplete().data("uiAutocomplete")._renderItem =  function( ul, item ) {
          $("#boxAjaxAutoComplete").hide();
          return $( "<li>" )
              .append( "<a>" + item.nome_profissao+"</a>" )
              .appendTo( ul );
      };

      $("#addNovaProfissao").click(function(e){
          e.preventDefault();
          $("#myModalFormAddProfissao").modal({backdrop: 'static', keyboard: false});
      });

      $("#formAddProfissao").submit(function (e) {
          e.preventDefault();
          $('#loader-wrapper').show();
          var dadosForm = $(this).serialize();
          //Envia Dados via Ajax
          $.ajax({
              type: 'POST',
              dataType: "json",
              url: '<?php echo base_url("profissao/salvar");?>',
              data: dadosForm,
              success: function (response) {
                  if ('erro' == response.classe) {
                      $('#loader-wrapper').fadeOut(500);
                      alertaVModal(response.msg, response.classe);
                      return false;
                  }
                  else if ('acerto' == response.classe) {
                      $('#loader-wrapper').fadeOut(500);
                      $("#myModalFormAddProfissao").modal('hide');
                      $("#addNovaProfissao").hide();
                      alertaVModal(response.msg, response.classe);
                      $("#id_profissao").val(response.id_profissao);
                      $("#profissao_atual").attr('readonly','readonly');
                      $("#profissao_atual").val(response.nome_profissao);
                  }

                  return false;
              }
          });
      });


      $( "#endereco_bairro" ).autocomplete({
              minLength: 3,
              source: function( request, response ) {
                  $("#boxAjaxCliente").show();
                  $.ajax({
                      url: '<?php echo base_url('bairro/ajax');?>',
                      dataType: "json",
                      data: {
                          acao: 'listar',
                          term: $('#endereco_bairro').val()
                      },
                      success: function(data) {
                          response(data);
                      }
                  });
              },
              html: true, // optional (jquery.ui.autocomplete.html.js required)

              // optional (if other layers overlap autocomplete list)
              open: function(event, ui) {
                  $(".ui-autocomplete").css("z-index", 99000);
              },
              select: function( event, ui ) {
                  $("#endereco_bairro").val( ui.item.nome_bairro );
                  $("#id_bairro").val( ui.item.id_bairro );

                  return false;
              },
          })
          .autocomplete().data("uiAutocomplete")._renderItem =  function( ul, item ) {
          $("#boxAjaxAutoComplete").hide();
          return $( "<li>" )
              .append( "<a>" + item.nome_bairro+"</a>" )
              .appendTo( ul );
      };

      $("#addNovoBairro").click(function(e){
          e.preventDefault();
          $("#myModalFormAddBairro").modal({backdrop: 'static', keyboard: false});
      });

      $("#formAddBairro").submit(function (e) {
          e.preventDefault();
          $('#loader-wrapper').show();
          var dadosForm = $(this).serialize();
          //Envia Dados via Ajax
          $.ajax({
              type: 'POST',
              dataType: "json",
              url: '<?php echo base_url("bairro/salvar");?>',
              data: dadosForm,
              success: function (response) {
                  if ('erro' == response.classe) {
                      $('#loader-wrapper').fadeOut(500);
                      alertaVModal(response.msg, response.classe);
                      return false;
                  }
                  else if ('acerto' == response.classe) {
                      $('#loader-wrapper').fadeOut(500);
                      $("#myModalFormAddBairro").modal('hide');
                      $("#addNovoBairro").hide();
                      alertaVModal(response.msg, response.classe);
                      $("#id_bairro").val(response.id_bairro);
                      $("#endereco_bairro").attr('readonly','readonly');
                      $("#endereco_bairro").val(response.nome_bairro);
                  }

                  return false;
              }
          });
      });


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
                            $("#cidades").append('<option value="'+item.id_cidade+'" >'+item.nome_cidade+'</option>');
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
        $(".cpf_cnpj_tipo").click(function(e){
        $(".telefones").mask("(99)99999-9999");


            var cpf_cnpj = $(this).prop('checked');
                if(true == cpf_cnpj)
                {
                    if('CPF' == $(this).val())
                        $("#cpf_cnpj").mask("999.999.999-99");
                    else if('CNPJ' == $(this).val())
                        $("#cpf_cnpj").mask("99.999.999/9999-99");
                }


        });

        function verificarCpf(cpf) {
            //Envia Dados via Ajax
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: '<?php echo base_url("pessoa/verificaCpfExistente");?>/' + cpf,
                success: function (response) {
                    if ('erro' == response.classe) {
                        $('#loader-wrapper').fadeOut(500);
                        alertaVModal(response.msg, "erro");
                        $('#cpf_cnpj').val("");
                        $(this).hide();

                        return false;
                    }
                    else if ('acerto' == response.classe) {
                        $('#loader-wrapper').fadeOut(500);
                        //alertaVModal(response.msg, response.classe, response.url);
                        $(this).hide();
                    }
                    return false;
                }
            });
        }

        function verificarCarteira(numero_carteira) {
            //Envia Dados via Ajax
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: '<?php echo base_url("pessoa/verificaCarteiraExistente");?>/' + numero_carteira,
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
                        //alertaVModal(response.msg, response.classe, response.url);
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
        // Aciona a validação a cada tecla pressionada

        $('#cpf_cnpj').blur(function(){

            // O CPF ou CNPJ
            var cpf_cnpj = $(this).val();

            if ( valida_cpf_cnpj( cpf_cnpj ) ) {
                verificarCpf(cpf_cnpj);
            } else {
                alertaVModal('CPF inválido!','erro');
                $(this).val("");
            }

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

                        //alertaVModal(response.msg, response.classe, response.url);


                        confirmContinuoNaoModal(response.msg + "<br/><b>Deseja cadastrar um Novo?</b><br/>", url);

                    }

                    return false;
                }});
        });
    });

</script>
