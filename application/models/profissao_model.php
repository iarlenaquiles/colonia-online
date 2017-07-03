<?php
Class profissao_model extends CI_Model
{


	public function getAll($filtro=null)
	{

		//SELECT
    $this->db->select( "p.*",false);
		$this->db->from( "profissao p" );


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

		$this->db->order_by('p.nome_profissao');
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
			'campo'    => 'p.id_profissao',
			'operador' => null,
			'valor'    => $id
		);

		$resultado = $this->getAll( $filtro );

		return $resultado[0];
	}


	public function insert($dados)
	{
		$this->db->insert("profissao", $dados);

		$idProfissao = $this->db->insert_id();

		return $idProfissao;
	}





}
