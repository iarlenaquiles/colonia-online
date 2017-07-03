<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class contato extends CI_Controller {


	public function index()
	{
        $data = array();
        $this->template->controlesite("contato_view", $data);
	}
}