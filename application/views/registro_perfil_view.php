<?php

//echo "<pre>"; print_r($info_perfil); exit();

if (isset($info_perfil) and ($info_perfil != null)) {

    $id = $info_perfil['id'];
    $nome = $info_perfil['nome'];

    if ($info_perfil['cadastro_editar']) {

        $cadastro_editar = "checked='checked'";
        $cadastro_ver = "checked='checked' disabled='disabled'";
    } else {
        $cadastro_ver = ($info_perfil['cadastro_ver'] ? "checked='checked'" : "");
        $cadastro_editar = "";
    }

    if ($info_perfil['usuario_editar']) {

        $usuario_editar = "checked='checked'";
        $usuario_ver = "checked='checked' disabled='disabled'";
    } else {
        $usuario_ver = ($info_perfil['usuario_ver'] ? "checked='checked'" : "");
        $usuario_editar = "";
    }

    if ($info_perfil['perfil_editar']) {

        $perfil_editar = "checked='checked'";
        $perfil_ver = "checked='checked' disabled='disabled'";
    } else {
        $perfil_ver = ($info_perfil['perfil_ver'] ? "checked='checked'" : "");
        $perfil_editar = "";
    }
} else {

    $id = null;
    $nome = null;
    $cadastro_ver = null;
    $cadastro_editar = null;
    $usuario_ver = null;
    $usuario_editar = null;
    $perfil_ver = null;
    $perfil_editar = null;
}
?>

<script type="text/javascript">
    $(function () {

        $(".checkPrivilegio").change(function () {

            var rel = $(this).attr("rel");

            if ($(this).attr("checked") == "checked") {

                $("#" + rel).attr("checked", "checked");
                $("#" + rel).attr("disabled", "disabled");
            } else {

                $("#" + rel).removeAttr("disabled");
            }
        });
    });
</script>


<?php if ($privilegios['perfil_editar']) { ?>
<form id="form1" name="form1" method="POST" action="<?php echo base_url("perfil/salvar"); ?>">
    <?php } ?>

    <div class="boxTexto">

        <input name="id" type="hidden" value="<?php echo $id; ?>"/>

        <div class="campo">
            Nome do Perfil:<br/>
            <input type="text" name="nome" id="nome" class="styleInput" value="<?php echo $nome; ?>"/>
        </div>

        <strong class="campo">Cadastros</strong>
        <div class="campo">
            <input id="opcao_cadas1" type="checkbox" name="opcao_cadas1" <?php echo $cadastro_ver; ?> > Visualizar
            <input class="checkPrivilegio" rel="opcao_cadas1" type="checkbox" name="opcao_cadas2"
                   style="margin-left: 25px;" <?php echo $cadastro_editar; ?> > Editar/Cadastrar
        </div>

        <strong class="campo">Usuários</strong>
        <div class="campo">
            <input id="opcao_usu1" type="checkbox" name="opcao_usu1" <?php echo $usuario_ver; ?> > Visualizar
            <input class="checkPrivilegio" rel="opcao_usu1" type="checkbox" name="opcao_usu2"
                   style="margin-left: 25px;" <?php echo $usuario_editar; ?> > Editar/Cadastrar
        </div>

        <strong class="campo">Perfis</strong>
        <div class="campo">
            <input id="opcao_per1" type="checkbox" name="opcao_per1" <?php echo $perfil_ver; ?> > Visualizar
            <input class="checkPrivilegio" rel="opcao_per1" type="checkbox" name="opcao_per2"
                   style="margin-left: 25px;" <?php echo $perfil_editar; ?> > Editar/Cadastrar
        </div>

        <div class="campo">
            <?php if ($privilegios['perfil_editar']) { ?>
                <input class="botaoVerde" type="submit" id="submit" name="submit" value="Salvar"/>
            <?php } ?>
            <input class="botaoVermelho" type="button" value="Voltar"
                   onclick="location.href='<?php echo base_url("perfil") ?>'"/>
        </div>
    </div>
    <?php if ($privilegios['perfil_editar']) { ?>
</form>
<?php } ?>
</div>

