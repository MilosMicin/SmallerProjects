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
class Model_pozoriste extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
            
    public function dohvatiPozoriste()
    {
        $this->db->select('*');
        $this->db->from('poziriste');               
        $query = $this->db->get();       
        return $query->result_array();
    }
    
    public function unosPozorista($podaci)
    {
        $this->db->insert('poziriste', $podaci);
    }
    
    public function izmenaPozorista($podaci)
    {
        $uslov = array('id_pozoriste' => $podaci['id_pozoriste']);
        $this->db->where($uslov);
        $this->db->update('poziriste', $podaci);
    }
    public function brisanjePozorista($ids)
    {
        foreach ($ids as $id):
        $this->db->where('id_pozoriste',$id);
        $this->db->delete('poziriste');
        endforeach;
    }
}
