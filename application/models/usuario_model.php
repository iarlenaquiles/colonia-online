<?php

Class usuario_model extends CI_Model{

	public function getAll( $filtro = null, $limit = null){

		$this->db->select( "u.*, c.*");
		$this->db->select("DATE_FORMAT(u.data_cadastro,'%d/%m/%Y %H:%i:%s') as data_cadastro",false);
    $this->db->select( "u.id as id_usuario");//, permissoes.nome as permissao");
		$this->db->from("usuario u, colonia c");//, permissoes p");
	//	$this->db->join("grupo_usuario g", "g.id_grupo_usuario = u.id_grupo_usuario", "left");
	//	$this->db->join("colonia c", "c.id_colonia = u.colonia_id", "left");
      //  $this->db->join("usuario_vinculo uv", "uv.id_usuario = u.id","left");
				//$this->db->join('permissoes', 'u.permissoes_id = permissoes.idPermissao', 'left');
    $this->db->where('c.id_colonia = '.$this->session->userdata("colonia_id"));


		if($filtro != ''){
			$this->db->where("ativo", $filtro);
		}

		$this->db->order_by("u.nome_usuario");

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$resultado = $query->result_array();
		} else {
			$resultado = null;
		}

		return $resultado;
	}

    public function uploadFoto($input_file) {

        $this->load->library('upload');

        $folder = 'uploads/temp/foto_usuario/';

        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        $config = array('upload_path' => $folder, 'allowed_types' => '*', 'maintain_ratio' => true);

        $this->upload->initialize($config);

        if ($this->upload->do_upload($input_file)) {
            $info = $this->upload->data();
            $config = array('image_library' => 'gd2', 'source_image' => $folder . $info["file_name"], 'maintain_ratio' => true, 'width' => 200, 'height' => 200);

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            return $folder.$info['file_name'];
        } else {
            return $this->upload->display_errors();
            return false;
        }
    }

	public function getById($id) {

		$this->db->select( "*");
		$this->db->from("usuario");
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



    /**
     * Método para buscar registros na tabela
     * @name getDadosUsuario
     * @access public
     * @author Tássio Neri
     * @param $filtro Array com parâmetros
     * @return Array retorna array com registros encontrados
     */
    public function getDadosUsuario($filtro=null)
    {

    }

    /**
     * Método para buscar registro pelo código primário
     * @name getByEmail
     * @access public
     * @author Tássio Neri
     * @param $email Email
     * @return Array com Dados do Código Informado
     */
    public function getByEmail($email) {

        $filtro[] = array(
            'campo'    => 'u.email',
            'operador' => null,
            'valor'    => $email
        );

        $resultado = $this->getDadosUsuario( $filtro );

        return $resultado[0];
    }

    public function getUsuariosResponsaveis( $id_usuario_principal )
    {
        $this->db->select( "u.*",false);
        $this->db->select( "u.id as id_usuario",false);
        $this->db->from("usuario_vinculo uv");
        $this->db->join("usuario u", "u.id = uv.id_usuario","left");
        $this->db->where("uv.id_usuario_principal = $id_usuario_principal");

        $query = $this->db->get();

        //echo $this->db->last_query(); exit();

        if ($query->num_rows() > 0) {

            $resultado = $query->result_array();
        } else {

            $resultado = null;
        }

        return $resultado;
    }

	public function getPrivilegios( $id_usuario )
	{
		$this->db->from("perfil_acesso");
		$this->db->where("id = (select id_perfil from usuario where id = $id_usuario)");

		$query = $this->db->get();

		//echo $this->db->last_query(); exit();

		if ($query->num_rows() > 0) {

			$resultado = $query->result_array();
			$resultado = $resultado[0];
		} else {

			$resultado = null;
		}

		return $resultado;
	}


    public function insert($dados)
    {
        $this->db->insert("usuario", $dados);

        $idUsuario = $this->db->insert_id();
				$this->db->insert("usuario_vinculo",array(
								'id_usuario'=> $idUsuario,
								'id_usuario_principal'=> $idUsuario
				));
        return $idUsuario;
    }

    public function verificaLoginExistente($usuario) {

        $this->db->where("usuario", $usuario);
        $this->db->from("usuario");



        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            $resultado = $query->result_array();
            $resultado = $resultado[0];
        } else {

            $resultado = null;
        }

        return $resultado;
    }

    public function verificaEmailUsuario($email) {

        $this->db->where("email", $email);
        $this->db->from("usuario");

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            $resultado = $query->result_array();
            $resultado = $resultado[0];
        } else {

            $resultado = null;
        }

        return $resultado;
    }




		function update($table,$data,$fieldID,$ID){
			$this->db->where($fieldID,$ID);
			$this->db->update($table, $data);

			if ($this->db->affected_rows() >= 0)
			{
				return TRUE;
			}

			return FALSE;
		}


    /**
     * Método para excluir registro
     * @name delete
     * @access public
     * @author Tássio Neri
     * @return void
     */
    public function delete($id){
        $this->db->where('id', $id)->delete('usuario');

        return true;
    }

    //gera senhas aleatórias
    public function randGenerator( $tamanho ) {

        if( $tamanho > 0 ){

            $CaracteresAceitos = 'abcdxywzABCDZYWZ0123456789';
            $max = strlen($CaracteresAceitos)-1;
            $password = null;

            for($i=0; $i < $tamanho; $i++) {
                $password .= $CaracteresAceitos{mt_rand(0, $max)};
            }

            return $password;
        }
        else {
            return '';
        }
    }

}
