<?php

Class estado_model extends CI_Model
{

	public function getID($id){
		$this->db->where('id_estado', $id );
		$query = $this->db->get('estado');

		return $query->num_rows();
	}


	public function getAll($filtro=null)
	{

		//SELECT de agenda
        $this->db->select( "e.id_estado",false);
        $this->db->select( "e.nome_estado",false);
        $this->db->select( "e.uf",false);
        $this->db->select( "e.id_pais",false);
        $this->db->select( "p.nome_pais",false);

		$this->db->from( "estado e" );
        $this->db->join("pais p", "p.id_pais = e.id_pais",false);
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

		///echo $this->db->last_query(); exit();

		if ($query->num_rows() > 0) {

			$registros = $query->result_array();

		} else {
			$registros = null;
		}

		return $registros;
	}





	public function getById($id) {

		$filtro[] = array(
			'campo'    => 'e.id_estado',
			'operador' => null,
			'valor'    => $id
		);

		$resultado = $this->getAll( $filtro );

		return $resultado[0];
	}



}
