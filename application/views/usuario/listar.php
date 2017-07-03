<div class="modal fade" id="myModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false"
     style="display: none;">
    <div class="modal-dialog" style="width:400px;">
        <div class="modal-content">
            <form action="" id="formAddNovo">
                <input type="hidden" name="id_usuario_principal" id="id_usuario_principal"
                       value="<?php echo $this->session->userdata("id_usuario"); ?>"/>
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Novo Usuário</h4></div>
                <div class="modal-body">
                    <div class="col-lg-14">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Nome Usuário*:</label>
                                    <input type="text" required="" name="nome_usuario" class="form-control "value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Login*:</label>
                                    <input type="email" required="" name="usuario" id="" class="form-control camposNovoUsuario" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Senha*:</label>
                                    <input type="password" required="" name="senha" class="form-control camposNovoUsuario"value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                              <div class="form-group">
                                  <label for="">Permissão*:</label>

                                  <select class="form-control m-bot15" name="permissao_id" >
                                      <option value="">SELECIONE PERMISSÃO</option>
                                      <?php
                                      foreach($permissoes as $permissao){
                                          ?>
                                          <option value="<?php echo $permissao['idPermissao'];?>"><?php echo $permissao['nome'];?></option>
                                          <?php
                                      }
                                      ?>
                                  </select>
                              </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                              <div class="form-group">
                                  <label for="">Colônia*:</label>

                                  <select class="form-control m-bot15" name="colonia_id" >
                                      <option value="">SELECIONE COLÔNIA</option>
                                      <?php
                                      foreach($colonias as $colonia){
                                          ?>
                                          <option value="<?php echo $colonia['id_colonia'];?>"><?php echo $colonia['nome_colonia'];?></option>
                                          <?php
                                      }
                                      ?>
                                  </select>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Salvar" class="btn btn-success"/>
                </div>
            </form>
        </div>
    </div>
</div>

<section class="wrapper site-min-height">
    <!-- page start-->
    <section class="panel">
        <header class="panel-heading">
            Lista de Usuários das Colônias
        </header>
        <div class="panel-body">

            <div class="adv-table">
                <script type="text/javascript">


                    $(document).ready(function () {

                        $("#addNovo").click(function () {
                            $(".camposNovoUsuario").val("");
                            $("#myModalForm").modal({backdrop: 'static', keyboard: false});
                        });


                        $(".editar").click(function (e) {
                            e.preventDefault();
                            var codigoRegistro = $(this).attr('codigoRegistro');

                            $("#myModalForm").html("");
                            //Envia Dados via Ajax
                            $.ajax({
                                type: 'POST',
                                dataType: "json",
                                url: '<?php echo base_url("cliente/editar_fatura");?>/' + codigoRegistro,
                                success: function (response) {
                                    $("#myModalForm").append(response.html);
                                    $("#myModalForm").modal({backdrop: 'static', keyboard: false});


                                }
                            });
                        });


                    });
                </script>
                <div class="clearfix">
                    <div class="btn-group">
                        <button id="addNovo" class="btn btn-success">
                            Adicionar <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <br/>
                <div class="space15"></div>
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered"
                       id="hidden-table-info">
                    <thead>
                    <tr>
                        <th>Nome Usuário</th>
                        <th>Login/Email</th>
                        <th>Data Cadastro</th>
                        <th style="text-align: center;width: 180px;">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <script type="text/javascript">
                        function excluirRegistro(id) {
                            //Envia Dados via Ajax
                            $.ajax({
                                type: 'POST',
                                dataType: "json",
                                url: '<?php echo base_url("usuario/excluir");?>/' + id,
                                success: function (response) {
                                    if ('erro' == response.classe) {
                                        $('#loader-wrapper').fadeOut(500);
                                        alertaVModal(response.msg, "erro");
                                        $(this).hide();
                                        return false;
                                    }
                                    else if ('acerto' == response.classe) {
                                        $('#loader-wrapper').fadeOut(500);
                                        alertaVModal(response.msg, response.classe, response.url);
                                        $(this).hide();
                                    }
                                    return false;
                                }
                            });
                        }
                        $(document).ready(function () {
                            $(".excluir").click(function (e) {
                                e.preventDefault();
                                var codigoRegistro = $(this).attr('idRegistro');
                                var nomeRegistro = $(this).attr('nomeRegistro');
                                confirmModal("Tem certeza que deseja excluir o usuário " + nomeRegistro + "?", 'excluirRegistro', null, codigoRegistro);
                            });

                        });
                    </script>
                    <?php
                    if (0 < count($registros)) {
                        foreach ($registros as $registro) { ?>
                            <tr class="gradeU" >
                                <td><?php echo $registro['nome_usuario']; ?></td>
                                <td><?php echo $registro['usuario']; ?></td>
                                <td><?php echo $registro['data_cadastro']; ?></td>
                                <td style="text-align: center;">
                                    <a href="<?php echo base_url('usuario/editar')."/".$registro['id_usuario'];?> " style="float:left;margin-left:4px;" title="Visualizar/Editar" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                    <a href="" title="Excluir" class="btn btn-danger btn-sm excluir" style="float:left;margin-left:4px;" idRegistro="<?php echo $registro['id_usuario']; ?>" nomeRegistro="<?php echo $registro['nome_usuario']; ?>"><i class="fa fa-trash-o "></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
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
<script src="<?php echo base_url("tema/flatlab/js/common-scripts.js"); ?>"></script>

<!--custom switch-->
<script src="<?php echo base_url("tema/flatlab/js/bootstrap-switch.js"); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $("#formAddNovo").submit(function (e) {
            e.preventDefault();
            $('#loader-wrapper').show();
            var dadosForm = $(this).serialize();
            //Envia Dados via Ajax
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: '<?php echo base_url("usuario/salvar");?>',
                data: dadosForm,
                success: function (response) {
                    if ('erro' == response.classe) {
                        $('#loader-wrapper').fadeOut(500);
                        alertaVModal(response.msg, response.classe);
                        return false;
                    }
                    else if ('acerto' == response.classe) {
                        $('#loader-wrapper').fadeOut(500);
                        $("#myModalForm").hide();
                        alertaVModal(response.msg, response.classe, '<?php echo base_url("usuario/listar");?>');
                    }

                    return false;
                }
            });
        });

        var oTable = $('#hidden-table-info').dataTable({
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [0]}
            ],
            "aaSorting": [[0, 'desc']],
            "oLanguage": {
                "sProcessing": "Aguarde enquanto os dados são carregados ...",
                "sLengthMenu": "Mostrar _MENU_ registros por página",
                "sZeroRecords": "Nenhum registro correspondente ao criterio encontrado",
                "sInfoEmpty": "Exibindo 0 a 0 de 0 registros",
                "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros",
                "sInfoFiltered": "",
                "sSearch": "Procurar",
                "oPaginate": {
                    "sFirst": "Primeiro",
                    "sPrevious": "Anterior",
                    "sNext": "Próximo",
                    "sLast": "Último"
                }
            }
        });
    });
</script>
