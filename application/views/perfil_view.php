<script type="text/javascript">
$(function(){

    $(".listaCadastro tr").click(function(){
        
        var id = $(this).attr("codigo");
        location.href="<?php echo base_url('perfil/registro'); ?>/"+id;
    });

});
</script>
    
<div class="boxTexto">
    
    <!--<?php //echo $paginacao; ?>-->
    <table class="listaCadastro">
        <thead>
            <th>Nome do Perfil</th>
        </thead>
        <tbody>
            <?php
            if (isset($perfis) and ($perfis != null)) {
                foreach ($perfis as $row) {
            ?>
            <tr codigo="<?php echo $row['id']; ?>">
                <td align='center'><?php echo $row['nome']; ?></td>
            </tr>
            <?php
                }
            } ?>
        </tbody>
    </table>
    
    <div style="margin-top: 25px;">
        <?php if ($privilegios['perfil_editar']) { ?>
        <input class="botaoVerde" type="submit" name="button" value="Cadastre um Perfil" onclick="location.href='<?php echo base_url("perfil/registro")?>'"/>
        <?php } ?>
        <div class="clear"></div>
    </div>
</div> 