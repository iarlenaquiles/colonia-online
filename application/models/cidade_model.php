<?php 
	
Class cidade_model extends CI_Model
{

	public function getID($id){
		$this->db->where('id_cidade', $id );
		$query = $this->db->get('cidade');
		
		return $query->num_rows();
	}



	public function getAll($filtro=null)
	{

		//SELECT de agenda
        $this->db->select( "c.id_cidade",false);
        $this->db->select( "c.nome_cidade",false);
        $this->db->select( "c.id_estado",false);
        $this->db->select( "e.nome_estado",false);

		$this->db->from( "cidade c" );
        $this->db->join("estado e", "e.id_estado = c.id_estado",false);
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
			'campo'    => 'c.id_cidade',
			'operador' => null,
			'valor'    => $id
		);

		$resultado = $this->getAll( $filtro );

		return $resultado[0];
	}



}