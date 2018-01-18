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
class Model_predstava extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function brojPredstava() {
        return $this->db->count_all("predstava");
    }
    
    public function dohvatiPredstave()
    {
        $this->db->select('*');
        $this->db->from('predstava as p'); 
        $this->db->join('poziriste as po', 'p.id_pozoriste = po.id_pozoriste');
        $query = $this->db->get();       
        return $query->result_array();
    }
    
    public function dohvatiPredstavePozoriste($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('predstava as p');       
        $this->db->join('poziriste as po', 'p.id_pozoriste = po.id_pozoriste');
        $this->db->limit($limit, $start);
        $query = $this->db->get();       
        return $query->result_array();
    }
    
    public function unosPredstava($podaciZaBazu)
    {
        $this->db->insert('predstava', $podaciZaBazu);      
    }
    
    public function azuriranjePredstava($podaciZaBazu)
    {
        $uslov = array('id_predstava' => $podaciZaBazu['id_predstava'],);
        $this->db->where($uslov);
        $this->db->update('predstava', $podaciZaBazu);
    }
    
    public function brisiPredstave($podatak)
    {
        foreach($podatak as $id):
            $this->db->where('id_predstava', $id);
            $this->db->delete('predstava');                              
        endforeach;             
    }
    
    public function ajaxPredstave($id)
    {
        $this->db->select('*');
        $this->db->from('predstava');    
        $this->db->where('id_pozoriste',$id);
        $query = $this->db->get();       
        return $query->result_array();
    }
}
