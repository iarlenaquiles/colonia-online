<div class="boxTexto">	
	<form id = "form1" name = "form1" method = "post" action = "<?php echo base_url("login/valida_recuperar_senha");?>">	
	

		<div class="campo">
    		Digite seu email:<br />
    		<input type="text" name="email" id="email" class="styleInput"/>
		</div>
	
		<div class="campo">
        	<input class="botaoVerde" type="submit" name="Submit" value="Confirmar" />
        	<input class="botaoVermelho" type="button" value="Voltar" onclick="location.href='<?php echo base_url("login")?>'"/>
    	</div>
	
	</form>    
</div>