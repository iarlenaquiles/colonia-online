<div class="boxTexto">	
	<form id = "form1" name = "form1" method = "post" action = "<?php echo base_url("login/salva_nova_senha");?>">
	

		<div class="campo">
            Senha:<br /><span class="observacoes">senha deve conter no máximo 10 caracteres</span>
            <input type="text" name="senha" id="senha" class="styleInput"  maxlength="10"/>
        </div>
                    
        <div class="campo">
            Confirme sua Senha:<br /> 
            <input type="text" name="confsenha" id="confsenha" class="styleInput"  maxlength="10"/>
        </div>
	
		<div class="campo">
        	<input class="botaoVerde" type="submit" name="Submit" value="Redefinir" />
        	<!--<input class="botaoVermelho" type="button" value="Voltar" onclick="location.href='<?php //echo base_url("login")?>'"/>-->
    	</div>
	</form>    
</div>