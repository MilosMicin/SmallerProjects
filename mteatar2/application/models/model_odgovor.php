<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_odgovor
 *
 * @author milos
 */
class model_odgovor extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function dohvatiOdgovore()
    {
        $this->db->select('*');
        $this->db->from('odgovori as o');
        $this->db->join('anketa as a', 'o.id_anketa = a.id_anketa');
        $this->db->where('a.aktivna = 1');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function unosOdgovora($podaci)
    {
        $this->db->insert('odgovori',$podaci);
    }
    
    public function izmenaOdgovora($podaci)
    {
        $uslov = array('id_odgovori' => $podaci['id_odgovori']);
        $this->db->where($uslov);
        $this->db->update('odgovori', $podaci);
    }
    
    public function brisanjeOdgovora($podaci)
    {
        foreach($podaci as $podatak):
           $this->db->where('id_odgovori', $podatak);
            $this->db->delete('odgovori'); 
        endforeach;
        
    }
}
