<?php

Class colonia_model extends CI_Model
{
	public function getTodos($filtro=null)
	{

		//SELECT de agenda
		$this->db->select( "c.*,f.nome_federacao, f.id_federacao, f.sigla_federacao, f.foto_federacao");
		$this->db->from( "colonia c" );
		$this->db->join("federacao f", "f.id_federacao = c.id_federacao","left");
	//	$this->db->where('c.id_colonia = '.$this->session->userdata("colonia_id"));
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

	public function getID($id){
		$this->db->where('id_colonia', $id );
		$query = $this->db->get('colonia');

		return $query->num_rows();
	}


	public function uploadFoto($input_file) {

			$this->load->library('upload');

			$folder = 'uploads/temp/foto_colonia/';

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

	public function uploadFotoFederacao($input_file) {

			$this->load->library('upload');

			$folder = 'uploads/foto_federacao/';

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

	public function delete($id){
		$this->db->where('id_colonia', $id)->delete('colonia');
		return true;
	}

	function count(){
		$registros = $this->getAll();
		return  count($registros);
	}

	public function getCargos($filtro=null)
	{

		//SELECT de agenda
		$this->db->select( "c.*, p.nome_pessoa");
		$this->db->from( "colonia c" );
		$this->db->join("pessoa p", "p.id_pessoa = c.id_pessoa_presidente","left");
		$this->db->where('c.id_colonia = '.$this->session->userdata("colonia_id"));
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


	public function getAll($filtro=null)
	{

		//SELECT de agenda
    $this->db->select( "c.*");
		$this->db->from( "colonia c" );

		$this->db->where('c.id_colonia = '.$this->session->userdata("colonia_id"));
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
			'campo'    => 'c.id_colonia',
			'operador' => 'equals',
			'valor'    => $id
		);

		$resultado = $this->getTodos( $filtro );

		return $resultado[0];
	}


  public function insert($dados){
    $this->db->insert("colonia", $dados);

    $idColonia = $this->db->insert_id();

    return $idColonia;

  }

	public function getByCnpj($cnpj) {

		$filtro[] = array(
			'campo'    => 'c.cnpj',
			'operador' => null,
			'valor'    => $cnpj
		);

		$resultado = $this->getAll( $filtro );

		return $resultado[0];
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
