<?php
Class forum_model extends CI_Model
{


	public function getAll($filtro=null)
	{

		//SELECT
        $this->db->select( "f.*",false);

		$this->db->from( "forum f" );
		$this->db->join("forum_usuario fu", "fu.id_forum = f.id_forum","left");
		$this->db->join("usuario_vinculo uv", "uv.id_usuario = fu.id_usuario","left");
        //$this->db->join( "cliente_filial cf", "cf.id_cliente = c.id_cliente","left");
		$this->db->where('uv.id_usuario_principal = '.$this->session->userdata("id_usuario_principal"));
		if ($filtro!=null) {
			foreach ($filtro as $row) {
				switch ($row['operador']) {

					case "LIKE":
						$this->db->like( $row['campo'], $row['valor'] );
						break;
					case "IN":
						$this->db->where( $row['campo'] ." ". $row['operador'] ." ". $row['valor'] );
						break;
                    case "BETWEEN":
                        $this->db->where( $row['campo'] ." BETWEEN '". $row['valor_1']."' AND '".$row['valor_2']."'" );
                        break;
					default:
						if ($row["campo"]==null) {
							$this->db->where( $row['valor'] );
						} else {
							$this->db->where( $row['campo'], $row['valor'] );
						}
						break;
				}
			}
		}

		$query = $this->db->get();

		//echo $this->db->last_query(); exit();

		if ($query->num_rows() > 0) {

			$registros = $query->result_array();

		} else {
			$registros = null;
		}

		return $registros;
	}


	public function getById($id) {

		$filtro[] = array(
			'campo'    => 'f.id_forum',
			'operador' => null,
			'valor'    => $id
		);

		$resultado = $this->getAll( $filtro );

		return $resultado[0];
	}

	public function insert($dados)
	{
		$this->db->insert("forum",$dados);

		$idForum = $this->db->insert_id();

		$this->db->insert("forum_usuario",array(
			'id_usuario'=> $this->session->userdata("id_usuario"),
			'id_forum'=> $idForum)
		);
		return $idForum;
	}

	public function update(
		$id, $nome, $telefone, $email) {

        $this->db->set( "nome_cliente", $nome);
        $this->db->set( "telefone_cliente", $telefone);
        $this->db->set("email_cliente", $email);
		              
		$this->db->where("id_cliente", $id);
		$this->db->update("cliente");
    }


    /* Busca o próximo código interno do usuário */
    public function getByProximoIdInterno() {

        $this->db->select( "(IFNULL(MAX(p.codigo_processo_interno),0)+1) AS proximo_id",false);
        $this->db->from("processo p");
		$this->db->join("processo_usuario pu", "pu.id_processo = p.id_processo","left");
		$this->db->join("usuario_vinculo uv", "uv.id_usuario = pu.id_usuario","left");
        $this->db->where("p.ano_processo_interno", date('Y'));
		$this->db->where("uv.id_usuario_principal", $this->session->userdata("id_usuario_principal"));

        $query = $this->db->get();
       // echo "<PRE>".$this->db->last_query(); exit();
        $this->db->last_query();

        if ($query->num_rows() > 0) {

            $resultado = $query->result_array();
        } else {

            $resultado = null;
        }

        return $resultado[0]['proximo_id'];
    }



}