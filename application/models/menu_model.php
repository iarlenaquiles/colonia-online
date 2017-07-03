<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class menu_model extends CI_Model
{


    public function getDados($idTela)
    {

        //SELECT de agenda
        $this->db->select( "t.*",false);
        $this->db->from( "tela t" );
        $this->db->where("t.id_tela", $idTela);

        $query = $this->db->get();

       // echo "query".$this->db->last_query(); exit();

        if ($query->num_rows() > 0) {

            $registros = $query->result_array();

        } else {
            $registros = null;
        }

        return $registros[0];
    }
}	