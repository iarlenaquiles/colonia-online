
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Cadastro da Permissões</header>

                <div class="panel-body">

                    <form id="formCadastro" class="formProcesso">

<fieldset>
  <legend>Dados</legend>
                        <div class="row">


                            <div class="col-lg-5">
                                <div class="form-group">
                                  <label>Nome da Permissão</label>
                                  <input name="nome" type="text" id="nome" class="form-control" />
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                  <input name="marcarTodos" type="checkbox" value="1" id="marcarTodos" />
                                  <span class="lbl"> Marcar Todos</span>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                          <table class="table table-bordered">
                              <tbody>
                                  <tr>

                                      <td>
                                          <label>
                                              <input name="vPescador" class="marcar" type="checkbox"  value="1" />
                                              <span class="lbl"> Visualizar Pescador</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="aPescador" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Adicionar Pescador</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="ePescador" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Editar Pescador</span>
                                          </label>
                                      </td>
                                      <td>
                                          <label>
                                              <input name="dPescador" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Excluir Pescador</span>
                                          </label>
                                      </td>

                                  </tr>
                                  <tr><td colspan="4"></td></tr>
                                  <tr>

                                      <td>
                                          <label>
                                              <input name="vPescadores" class="marcar" type="checkbox"  value="1" />
                                              <span class="lbl"> Visualizar Pescadores</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="aPescadores" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Adicionar Pescadores</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="ePescadores" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Editar Pescadores</span>
                                          </label>
                                      </td>
                                      <td>
                                          <label>
                                              <input name="dPescadores" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Excluir Pescadores</span>
                                          </label>
                                      </td>

                                  </tr>

                                  <tr><td colspan="4"></td></tr>
                                  <tr>

                                      <td>
                                          <label>
                                              <input name="vColonia" class="marcar" type="checkbox"  value="1" />
                                              <span class="lbl"> Visualizar Colonia</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="aColonia" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Adicionar Colonia</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="eColonia" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Editar Colonia</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="dColonia" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Excluir Colonia</span>
                                          </label>
                                      </td>

                                  </tr>
                                  <tr><td colspan="4"></td></tr>
                                  <tr>

                                      <td>
                                          <label>
                                              <input name="vColonias" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Visualizar Colonias</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="aColonias" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Adicionar Colonias</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="eColonias" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Editar Colonias</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="dColonias" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Excluir Colonias</span>
                                          </label>
                                      </td>

                                  </tr>
                                  <tr><td colspan="4"></td></tr>

                                  <tr>

                                      <td>
                                          <label>
                                              <input name="vAgendamento" class="marcar" type="checkbox"  value="1" />
                                              <span class="lbl"> Visualizar Agendamento</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="aAgendamento" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Adicionar Agendamento</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="eAgendamento" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Editar Agendamento</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="dAgendamento" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Excluir Agendamento</span>
                                          </label>
                                      </td>

                                  </tr>

                                  <tr><td colspan="4"></td></tr>
                                  <tr>

                                      <td>
                                          <label>
                                              <input name="vAtendimento" class="marcar" type="checkbox"  value="1" />
                                              <span class="lbl"> Visualizar Atendimento</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="aAtendimento" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Adicionar Atendimento</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="eAtendimento" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Editar Atendimento</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="dAtendimento" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Excluir Atendimento</span>
                                          </label>
                                      </td>

                                  </tr>
                                  <tr><td colspan="4"></td></tr>

                                  <tr>

                                      <td>
                                          <label>
                                              <input name="vRelatorio" class="marcar" type="checkbox"  value="1" />
                                              <span class="lbl"> Visualizar Relatorio</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="vAniversariantes" class="marcar" type="checkbox"  value="1" />
                                              <span class="lbl"> Visualizar Aniversariantes</span>
                                          </label>
                                      </td>
                                      <td>
                                          <label>
                                              <input name="vGerados" class="marcar" type="checkbox"  value="1" />
                                              <span class="lbl">Visualizar Relatórios Gerados</span>
                                          </label>
                                      </td>
                                      <td>
                                          <label>
                                              <input name="vGeral" class="marcar" type="checkbox"  value="1" />
                                              <span class="lbl">Visualizar Relatórios Gerais</span>
                                          </label>
                                      </td>




                                  </tr>

                                  <tr><td colspan="4"></td></tr>
                                  <tr>

                                      <td>
                                          <label>
                                              <input name="vLivro" class="marcar" type="checkbox"  value="1" />
                                              <span class="lbl"> Visualizar Relatorio Livro</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="vImpostoSindical" class="marcar" type="checkbox"  value="1" />
                                              <span class="lbl"> Visualizar Imposto Sindical</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="vAtendimentos" class="marcar" type="checkbox"  value="1" />
                                              <span class="lbl"> Visualizar Atendimentos</span>
                                          </label>
                                      </td>
                                      <td>
                                          <label>
                                              <input name="vBotaoDownload" class="marcar" type="checkbox"  value="1" />
                                              <span class="lbl"> Visualizar Botão Download</span>
                                          </label>
                                      </td>
                                  </tr>
                                  <tr><td colspan="4"></td></tr>

                                  <tr>

                                      <td>
                                          <label>
                                              <input name="vPermissoes" class="marcar" type="checkbox"  value="1" />
                                              <span class="lbl"> Visualizar Permissoes</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="aPermissoes" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Adicionar Permissoes</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="ePermissoes" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Editar Permissoes</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="dPermissoes" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Excluir Permissoes</span>
                                          </label>
                                      </td>

                                  </tr>

                                  <tr><td colspan="4"></td></tr>

                                  <tr>

                                      <td>
                                          <label>
                                              <input name="vUsuarios" class="marcar" type="checkbox"  value="1" />
                                              <span class="lbl"> Visualizar Usuários</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="aUsuarios" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Adicionar Usuários</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="eUsuarios" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Editar Usuários</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="dUsuarios" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Excluir Usuários</span>
                                          </label>
                                      </td>

                                  </tr>
                                  <tr><td colspan="4"></td></tr>
                                  <tr>

                                      <td>
                                          <label>
                                              <input name="vLink" class="marcar" type="checkbox"  value="1" />
                                              <span class="lbl"> Visualizar Link</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="aLink" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Adicionar Link</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="eLink" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Editar Link</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="dLink" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Excluir Link</span>
                                          </label>
                                      </td>

                                  </tr>



                                  <tr><td colspan="4"></td></tr>
                                  <tr>

                                      <td>
                                          <label>
                                              <input name="vPagamento" class="marcar" type="checkbox"  value="1" />
                                              <span class="lbl"> Visualizar Pagamento</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="aPagamento" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Adicionar Pagamento</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="ePagamento" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Editar Pagamento</span>
                                          </label>
                                      </td>

                                      <td>
                                          <label>
                                              <input name="dPagamento" class="marcar" type="checkbox" value="1" />
                                              <span class="lbl"> Excluir Pagamento</span>
                                          </label>
                                      </td>

                                  </tr>

                              </tbody>
                          </table>
                        </div>






</fieldset>


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


      $(document).on('click', '#marcarTodos', function(event) {
          if($(this).prop('checked')){

            $('.marcar').each(
               function(){
                  $(this).attr("checked", true);
               }
            );
         }else{

            $('.marcar').each(
               function(){
                  $(this).attr("checked", false);
               }
            );
         }
      });



        $('#spinner1').spinner({value:1, min: 1});


        $("#formCadastro").submit(function(e){
            $("input[type=submit]").attr('disabled','disabled');
            e.preventDefault();
            $('#loader-wrapper').show();
            var dadosForm = $(this).serialize();
            //Envia Dados via Ajax
            $.ajax({type:'POST',
                dataType: "json",url:'<?php echo base_url("permissoes/salvar");?>', data: dadosForm, success: function(response) {
                    if('erro' == response.classe) {
                        $('#loader-wrapper').fadeOut(500);
                        alertaVModal(response.msg, response.classe);
                        return false;
                    }
                    else if('acerto' == response.classe)
                    {
                        var url = "'"+response.url+"'";
                        $('#loader-wrapper').fadeOut(500);
                        <?php
if(!empty($id_processo))
                        {
                        ?>
                        alertaVModal(response.msg, response.classe, response.url);
<?php
}else{
                        ?>
                        confirmContinuoNaoModal(response.msg + "<br/><b>Deseja cadastrar um Novo?</b><br/>", url);
<?php
}?>
                    }

                    return false;
                }});
        });
    });

</script>
