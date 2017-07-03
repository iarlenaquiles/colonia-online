<?php

Class links_model extends CI_Model
{

	public function uploadFoto($input_file) {

			$this->load->library('upload');

			$folder = 'uploads/foto_link/';

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

	public function getID($id){
		$this->db->where('id_link', $id );
		$query = $this->db->get('agendamento_inss');
		return $query->num_rows();
	}

	public function delete($id){
		$this->db->where('id_link', $id)->delete('links');
		return true;
	}

	function count(){
		$registros = $this->getAll();
		return  count($registros);
	}

	public function getAll($filtro=null)
	{

		//SELECT de agenda
    $this->db->select( "l.*");
		$this->db->from( "links l" );
		//$this->db->join("pessoa p", "p.id_pessoa = a.id_pessoa","left");

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
                        $this->db->where("'". $row['campo'] ."' BETWEEN '". $row['valor_1']."' AND '".$row['valor_2']."'" );
                        break;
					 case "equals":
					 			$this->db->where($row["campo"]." = ".$row['valor']);
								break;
					default:
						if ($row["campo"]==null) {
							$this->db->where($row['valor']);
						} else {
							$this->db->where($row['campo'], $row['valor']);
						}
						break;
				}
			}
		}

		$query = $this->db->get();

//		echo $this->db->last_query(); exit();

		if ($query->num_rows() > 0) {

			$registros = $query->result_array();

		} else {
			$registros = null;
		}

		return $registros;
	}

	public function getById($id) {

		$filtro[] = array(
			'campo'    => 'l.id_link',
			'operador' => null,
			'valor'    => $id
		);

		$resultado = $this->getAll( $filtro );

		return $resultado[0];
	}


  public function insert($dados){
    $this->db->insert("links", $dados);

    $idLinks = $this->db->insert_id();

    return $idLinks;

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



}
