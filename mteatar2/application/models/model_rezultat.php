<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Repertoar
 *
 * @author milos
 */
class Model_rezultat extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function dohvatiRezultate()
    {
        $this->db->select('*');
        $this->db->from('rezultat as r');
        $this->db->join('anketa as a', 'r.id_anketa = a.id_anketa');
        $this->db->join('odgovori as o', 'r.id_odgovor = o.id_odgovori');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function unosRezultata($podaci)
    {
        $this->db->insert('rezultat', $podaci);
    }
    public function izmenaRezultata($podaci)
    {
        $where = array('id_rezultat' => $podaci['id_rezultat']);
        $this->db->where($where);
        $this->db->update('rezultat', $podaci);
    }
    
    public function brisanjeRezultata($podaci)
    { 
        foreach($podaci as $id):
        $this->db->where('id_rezultat', $id);
        $this->db->delete('rezultat'); 
        endforeach;       
    }
}
