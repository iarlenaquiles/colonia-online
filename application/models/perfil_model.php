<?php 
	
Class perfil_model extends CI_Model{

	public function getAll( $filtro = null, $limit = null){
	
		$this->db->select( "id");
		$this->db->select( "nome");
		$this->db->select( "cadastro_ver");
		$this->db->select( "cadastro_editar");
		$this->db->select( "usuario_ver");
		$this->db->select( "usuario_editar");
		$this->db->select( "perfil_ver");
		$this->db->select( "perfil_editar");
		$this->db->from("perfil_acesso");
		
		$this->db->order_by("nome");
            
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$resultado = $query->result_array();
		} else {
			$resultado = null;
		}

		return $resultado;
	}

	public function getById($id) {
		
		$this->db->select( "id");
		$this->db->select( "nome");
		$this->db->select( "cadastro_ver");
		$this->db->select( "cadastro_editar");
		$this->db->select( "usuario_ver");
		$this->db->select( "usuario_editar");
		$this->db->select( "perfil_ver");
		$this->db->select( "perfil_editar");
		$this->db->from("perfil_acesso");
		$this->db->where("id", $id);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {

			$resultado = $query->result_array();
			$resultado = $resultado[0];
		} else {

			$resultado = null;
		}

		return $resultado;
	}
	public function insert(
		$nome,
		$cadastro_ver, $cadastro_editar,  
		$usuario_ver, $usuario_editar, $perfil_ver, $perfil_editar) {

		//cria o insert
		$this->db->set( "nome", $nome );
		$this->db->set( "cadastro_ver", $cadastro_ver);
		$this->db->set( "cadastro_editar", $cadastro_editar);
		$this->db->set( "usuario_ver", $usuario_ver);
		$this->db->set( "usuario_editar", $usuario_editar);
		$this->db->set( "perfil_ver", $perfil_ver);
		$this->db->set( "perfil_editar" ,$perfil_editar);
		
		$this->db->insert("perfil_acesso");    
	}

	public function update(
		$id, $nome,
		$cadastro_ver, $cadastro_editar,
		$usuario_ver, $usuario_editar, $perfil_ver, $perfil_editar) {
		
		$this->db->set( "nome", $nome);
		$this->db->set( "cadastro_ver", $cadastro_ver);
		$this->db->set( "cadastro_editar", $cadastro_editar);
		$this->db->set( "usuario_ver", $usuario_ver);
		$this->db->set( "usuario_editar", $usuario_editar);
		$this->db->set( "perfil_ver", $perfil_ver);
		$this->db->set( "perfil_editar" ,$perfil_editar);
		    
		$this->db->where("id", $id);
		$this->db->update("perfil_acesso");  
	}	
}	