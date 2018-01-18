<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_pozoriste
 *
 * @author milos
 */
class Model_logovanje extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
            
    public function prijava($podatak)
    {                   
        $query = $this->db->get_where('admin',$podatak);   
        if($query->num_rows() == 1)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }
}
