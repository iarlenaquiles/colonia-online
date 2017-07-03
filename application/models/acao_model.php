<?php
Class acao_model extends CI_Model
{


	public function getAll($filtro=null)
	{

		//SELECT
        $this->db->select( "a.*",false);

		$this->db->from( "acao a" );
		$this->db->join("acao_usuario au", "au.id_acao = a.id_acao","left");
		$this->db->join("usuario_vinculo uv", "uv.id_usuario = au.id_usuario","left");
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

		$this->db->order_by('a.nome_acao');
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
			'campo'    => 'a.id_acao',
			'operador' => null,
			'valor'    => $id
		);

		$resultado = $this->getAll( $filtro );

		return $resultado[0];
	}

	public function insert($dados)
	{
		$this->db->insert("acao", $dados);

		$idAcao = $this->db->insert_id();

		$this->db->insert("acao_usuario",array(
			'id_usuario'=> $this->session->userdata("id_usuario"),
			'id_acao'=> $idAcao)
		);
		return $idAcao;
	}





}
