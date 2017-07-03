<?php
Class pessoa_model extends CI_Model
{

	public function getID($id){
		$this->db->where('id_midia', $id );
		$query = $this->db->get('midia');

		return $query->num_rows();
	}

	public function insert_agendamento($dados)
	{
		$this->db->insert("agendamento_inss",$dados);

		return $this->db->insert_id();
	}


	public function insert_pagamento($dados){
		$this->db->insert("historico_pescador_pagamento", $dados);

		return $this->db->insert_id();
	}


	public function insert_anexo($dados)
	{
		$this->db->insert("pessoa_anexo",$dados);

		return $this->db->insert_id();
	}

	public function insert_relatorio($dados)
	{
		$this->db->insert("relatorios", $dados);

		return $this->db->insert_id();;
	}

	public function uploadAnexo($input_file){
		$this->load->library('upload');

		$folder = 'uploads/anexos/';

		if (!file_exists($folder)) {
			mkdir($folder, 0777, true);
		}
		$config = array('upload_path' => $folder, 'allowed_types' => '*', 'maintain_ratio' => true);

		$this->upload->initialize($config);
		if ($this->upload->do_upload($input_file)) {
			$info = $this->upload->data();
			return $folder . $info['file_name'];
		} else {
			return $this->upload->display_errors();
			return false;
		}
	}

	public function insert_historico($dados)
	{
		$this->db->insert("historico",$dados);
		return $this->db->insert_id();
	}


	public function getAnexoById($id){
		//SELECT
		$this->db->select( "pa.*",false);

		$this->db->from( "pessoa_anexo pa" );
		$this->db->where('pa.id_pessoa_anexo = '.$id);
		$this->db->order_by("pa.data_cadastro asc");

		$query = $this->db->get();


		if ($query->num_rows() > 0) {

			$registros = $query->result_array();

		} else {
			$registros = null;
		}

		return $registros[0];
	}



	public function getPagamentoById($id){
		//SELECT
		$this->db->select( "p.*",false);

		$this->db->from( "historico_pescador_pagamento p" );
		$this->db->where('p.id_historico_pescador_pagamento = '.$id);

		$query = $this->db->get();


		if ($query->num_rows() > 0) {

			$registros = $query->result_array();

		} else {
			$registros = null;
		}

		return $registros[0];
	}


	public function getAnexos($id){
		//SELECT
		$this->db->select( "a.*, u.nome_usuario as usuario_cadastro",false);
		$this->db->select("DATE_FORMAT(a.data_cadastro,'%d/%m/%Y %H:%i:%s') as data_cadastro",false);


		$this->db->from("pessoa_anexo a");
		$this->db->join("usuario u", "u.id = a.id_usuario_cadastro","left");
		$this->db->where('a.id_pessoa = '.$id);
		$this->db->order_by("a.data_cadastro desc");

		$query = $this->db->get();
		//echo $this->db->last_query(); exit();

		if ($query->num_rows() > 0) {

			$registros = $query->result_array();

		} else {
			$registros = null;
		}

		return $registros;
	}


	public function getAgendamento($id)
	{
		//SELECT
		$this->db->select( "a.*, u.nome_usuario as usuario_cadastro",false);
		$this->db->select("DATE_FORMAT(a.data_cadastro,'%d/%m/%Y %H:%i:%s') as data_cadastro",false);
		$this->db->select("DATE_FORMAT(a.data_agendamento,'%d/%m/%Y') as data_agendamento",false);

		$this->db->from("agendamento_inss a");
		$this->db->join("usuario u", "u.id = a.id_usuario_cadastro","left");
		$this->db->where('a.id_pessoa = '.$id);
		$this->db->order_by("a.data_cadastro desc");

		$query = $this->db->get();
		//echo $this->db->last_query(); exit();

		if ($query->num_rows() > 0) {

			$registros = $query->result_array();

		} else {
			$registros = null;
		}

		return $registros;
	}

	public function getPagamentos($id){
		//SELECT
		$this->db->select( "p.*, u.nome_usuario as usuario_cadastro", false);
		$this->db->select("DATE_FORMAT(p.data_cadastro,'%d/%m/%Y %H:%i:%s') as data_cadastro",false);
		$this->db->select("DATE_FORMAT(p.data_pagamento,'%d/%m/%Y') as data_pagamento",false);

		$this->db->from("historico_pescador_pagamento p");
		$this->db->join("usuario u", "u.id = p.id_usuario_cadastro","left");
		$this->db->where('p.id_pessoa = '.$id);
		$this->db->order_by("p.data_cadastro desc");

		$query = $this->db->get();
		//echo $this->db->last_query(); exit();

		if ($query->num_rows() > 0) {

			$registros = $query->result_array();

		} else {
			$registros = null;
		}

		return $registros;
	}

	public function getHistorico($id)
	{
		//SELECT
		$this->db->select( "h.*, u.nome_usuario as usuario_cadastro",false);
		$this->db->select("DATE_FORMAT(h.data_cadastro,'%d/%m/%Y %H:%i:%s') as data_cadastro",false);

		$this->db->from("historico h");
		$this->db->join("usuario u", "u.id = h.id_usuario_cadastro","left");

		$this->db->where('h.id_pessoa = '.$id);
		$this->db->order_by("h.data_cadastro desc");

		$query = $this->db->get();
		//echo $this->db->last_query(); exit();

		if ($query->num_rows() > 0) {

			$registros = $query->result_array();

		} else {
			$registros = null;
		}

		return $registros;
	}
	function count(){
		$registros = $this->getAll();
		return  count($registros);
	}

	/* Busca o próximo código interno do usuário */
	public function getByProximoIdInterno() {

		$this->db->select("(IFNULL(MAX(p.id_pessoa_interno),0)+1) AS proximo_id",false);
		$this->db->from("pessoa p");
		$this->db->join("pessoa_usuario pu", "pu.id_pessoa = p.id_pessoa","left");
		$this->db->join("usuario_vinculo uv", "uv.id_usuario = pu.id_usuario","left");
		$this->db->where('uv.id_usuario_principal = '.$this->session->userdata("id_usuario_principal"));

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


	public function getAll($filtro=null){

		//SELECT de pessoa
		$this->db->select( "p.*, ci.nome_cidade, e.nome_estado");
		$this->db->select( "DATE_FORMAT(p.data_cadastro,'%d/%m/%Y %H:%i:%s') as data_cadastro",false);
		$this->db->select( "DATE_FORMAT(p.data_nascimento,'%d/%m/%Y') as data_nascimento",false);
		$this->db->select( "DATE_FORMAT(p.data_aposentadoria,'%d/%m/%Y') as data_aposentadoria",false);

		$this->db->from( "pessoa p" );
		//	$this->db->join("pessoa_usuario pu", "pu.id_pessoa = p.id_pessoa","left");
		$this->db->join("colonia c", "c.id_colonia = p.colonia_id","left");
		$this->db->join("cidade ci", "ci.id_cidade = p.id_cidade","left");
		$this->db->join("estado e", "e.id_estado = p.id_estado","left");
		//	$this->db->join("usuario_vinculo uv", "uv.id_usuario = pu.id_usuario","left");
		//$this->db->where('uv.id_usuario_principal = '.$this->session->userdata("id_usuario_principal"));
		$this->db->where('p.colonia_id = '.$this->session->userdata("colonia_id"));
		$this->db->order_by("p.nome_pessoa asc");
		if ($filtro!=null) {
			foreach ($filtro as $row) {
				switch ($row['operador']) {

					case "LIKE":
					$this->db->like($row['campo'], $row['valor'] );
					break;
					case "AJAXCLIENTE":
					$this->db->where($row['campo_1']." LIKE '%". $row['valor_1']."%' OR ".$row['campo_2']." LIKE '%".$row['valor_2']."%'");
					break;
					case "LIKEC":
					$this->db->where($row['campo']." LIKE '%".$row['valor']."%'");
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

	public function getTodos()
	{

		//SELECT de pessoa
		$this->db->select( "p.*");
		$this->db->select( "DATE_FORMAT(p.data_cadastro,'%d/%m/%Y %H:%i:%s') as data_cadastro",false);
		$this->db->select( "DATE_FORMAT(p.data_nascimento,'%d/%m/%Y') as data_nascimento",false);

		$this->db->from( "pessoa p" );
		//	$this->db->join("pessoa_usuario pu", "pu.id_pessoa = p.id_pessoa","left");
		$this->db->join("colonia c", "c.id_colonia = p.colonia_id","left");
		//	$this->db->join("usuario_vinculo uv", "uv.id_usuario = pu.id_usuario","left");
		//$this->db->where('uv.id_usuario_principal = '.$this->session->userdata("id_usuario_principal"));
		//$this->db->where('p.colonia_id = '.$this->session->userdata("colonia_id"));
		if ($filtro!=null) {
			foreach ($filtro as $row) {
				switch ($row['operador']) {

					case "LIKE":
					$this->db->like( $row['campo'], $row['valor'] );
					break;
					case "AJAXCLIENTE":
					$this->db->where($row['campo_1']." LIKE '%". $row['valor_1']."%' OR ".$row['campo_2']." LIKE '%".$row['valor_2']."%'");
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


	/**
	* Método para excluir registro
	* @name delete
	* @access public
	* @author Tássio Neri
	* @return void
	*/
	public function delete($id){
		$this->db->where('id_pessoa', $id)->delete('pessoa');
		$this->db->where('id_pessoa', $id)->delete('processo_parte');
		return true;
	}

	public function getById($id) {

		$filtro[] = array(
			'campo'    => 'p.id_pessoa',
			'operador' => null,
			'valor'    => $id
		);

		$resultado = $this->getAll( $filtro );

		return $resultado[0];
	}


	public function getAposentados() {

		$filtro[] = array(
			'campo'    => 'p.aposentado',
			'operador' => null,
			'valor'    => 'Sim'
		);

		$resultado = $this->getAll( $filtro );

		return $resultado;
	}

	function countQtdAposentados(){
		$filtro[] = array(
			'campo'    => 'p.aposentado',
			'operador' => null,
			'valor'    => 'Sim'
		);

		$registros = $this->getAll($filtro);
		return  count($registros);
	}

	public function getCatadores() {

		$filtro[] = array(
			'campo'    => 'p.profissao_atual',
			'operador' => 'LIKEC',
			'valor'    => 'CARANGUEJO'
		);

		$resultado = $this->getAll( $filtro );

		return $resultado;
	}

	function countQtdCatadores(){
		$filtro[] = array(
			'campo'    => 'p.profissao_atual',
			'operador' => 'LIKEC',
			'valor'    => 'CARANGUEJO'
		);

		$registros = $this->getAll($filtro);
		return  count($registros);
	}

	public function getFalecidos() {

		$filtro[] = array(
			'campo'    => 'p.morto',
			'operador' => null,
			'valor'    => 'Sim'
		);

		$resultado = $this->getAll( $filtro );

		return $resultado;
	}

	function countQtdFalecidos(){
		$filtro[] = array(
			'campo'    => 'p.morto',
			'operador' => null,
			'valor'    => 'Sim'
		);

		$registros = $this->getAll($filtro);
		return  count($registros);
	}

	public function deleteAnexo($id){
		$this->db->where('id_pessoa_anexo', $id)->delete('pessoa_anexo');
		return true;
	}


	public function deletePagamento($id){
		$this->db->where('id_historico_pescador_pagamento', $id)->delete('historico_pescador_pagamento');
		return true;
	}
	public function getByEmail($email) {

		$filtro[] = array(
			'campo'    => 'c.email_cliente',
			'operador' => null,
			'valor'    => $email
		);

		$resultado = $this->getAll( $filtro );

		return $resultado[0];
	}

	public function getByCpfCnpj($cpf) {

		$filtro[] = array(
			'campo'    => 'p.cpf_cnpj',
			'operador' => null,
			'valor'    => $cpf
		);

		$resultado = $this->getAll( $filtro );

		return $resultado[0];
	}


	public function getByCarteira($carteira) {

		$filtro[] = array(
			'campo'    => 'p.numero_carteira',
			'operador' => null,
			'valor'    => $carteira
		);

		$resultado = $this->getAll( $filtro );

		return $resultado[0];

	}
	function countQtdCarteira($carteira){
		$filtro[] = array(
			'campo'    => 'p.numero_carteira',
			'operador' => null,
			'valor'    => $carteira
		);

		$registros = $this->getAll($filtro);
		return  count($registros);
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

	public function insert($dados)
	{
		$this->db->insert("pessoa",$dados);

		$idPessoa = $this->db->insert_id();

		$this->db->insert("pessoa_usuario",array(
			'id_usuario'=> $this->session->userdata("id_usuario"),
			'id_pessoa'=> $idPessoa)
		);
		return $idPessoa;
	}

	public function getRelatorio() {

		$sql = "
		SELECT DATE_FORMAT(data, '%m') AS data, status, COUNT(0) AS total
		FROM agenda_homologacao
		GROUP BY DATE_FORMAT(data, '%m'), status
		ORDER BY DATE_FORMAT(data, '%m'), status";
		$query = $this->db->query( $sql );

		if ($query->num_rows() > 0) {

			$relatorio = $query->result_array();

			foreach ($relatorio as $row) {

				switch ( $row['data'] ) {
					case 0:  $mes = 'Mês não definido'; break;
					case 1:  $mes = 'Janeiro'; break;
					case 2:  $mes = 'Fevereiro'; break;
					case 3:  $mes = 'Março'; break;
					case 4:  $mes = 'Abril'; break;
					case 5:  $mes = 'Maio'; break;
					case 6:  $mes = 'Junho'; break;
					case 7:  $mes = 'Julho'; break;
					case 8:  $mes = 'Agosto'; break;
					case 9:  $mes = 'Setembro'; break;
					case 10: $mes = 'Outubro'; break;
					case 11: $mes = 'Novembro'; break;
					case 12: $mes = 'Dezembro'; break;
				}

				if (!isset($resultado[ $row['data'] ]))
				$resultado[ $row['data'] ] = array( 'mes' => $mes, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 'total' => 0 );

				$resultado[ $row['data'] ][ $row['status'] ] = $row['total'];
				$resultado[ $row['data'] ][ 'total' ] += $row['total'];
			}

		} else {
			$resultado = null;
		}

		return $resultado;
	}

}
