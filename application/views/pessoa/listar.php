<section class="wrapper site-min-height">
  <!-- page start-->
  <section class="panel">
    <header class="panel-heading">
      Lista de Colonizados
    </header>
    <div class="panel-body">
      <div class="adv-table">
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered"
        id="hidden-table-info">
        <thead>
          <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Data Nascimento</th>
            <th>Matrícula</th>
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
              url: '<?php echo base_url("pessoa/excluir");?>/' + id,
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
              confirmModal("Tem certeza que deseja excluir a pessoa " + nomeRegistro + "?", 'excluirRegistro', null, codigoRegistro);
            });

          });
          </script>
          <?php
          if (0 < count($registros)) {
            foreach ($registros as $registro) { ?>
              <tr class="gradeU" >
                <td><?php echo $registro['id_pessoa'];?></td>
                <td><?php echo $registro['nome_pessoa']; ?></td>
                <td><?php echo $registro['cpf_cnpj']; ?></td>
                <td><?php echo $registro['data_nascimento']; ?></td>
                <td><?php echo $registro['numero_carteira']; ?></td>
                <td><?php echo $registro['data_cadastro']; ?></td>
                <td style="text-align: center;">
                  <?php if(($this->permission->checkPermission($this->session->userdata('permissao'),'ePescador')) || ($this->permission->checkPermission($this->session->userdata('permissao'),'ePescadores'))){ ?>
                    <a href="<?php echo base_url('pessoa/editar')."/".$registro['id_pessoa'];?> " style="float:left;margin-left:4px;" title="Visualizar/Editar" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                    <?php } ?>
                    <?php if(($this->permission->checkPermission($this->session->userdata('permissao'),'dPescador')) || ($this->permission->checkPermission($this->session->userdata('permissao'),'dPescadores'))){ ?>
                      <a href="" title="Excluir" class="btn btn-danger btn-sm excluir" style="float:left;margin-left:4px;" idRegistro="<?php echo $registro['id_pessoa']; ?>" nomeRegistro="<?php echo $registro['nome_pessoa']; ?>"><i class="fa fa-trash-o "></i></a>
                      <?php } ?>
                      <a href="<?php echo base_url('pessoa/completo').'/'.$registro['id_pessoa']; ?>" style="float:left;margin-left:4px;" class="btn btn-sm btn-success" title="Acessar Pessoa"><i style="color:#fff" class="fa fa-sign-in"></i></a>

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
