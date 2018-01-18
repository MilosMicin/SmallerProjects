<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_ankete
 *
 * @author milos
 */
class Model_ankete extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
         
    public function dohvatiAnkete()
    {
        $this->db->select('*');
        $this->db->from('anketa');
        $this->db->where('aktivna = 1');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function ankete()
    {
        $this->db->select('*');
        $this->db->from('anketa');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function dohvatiAnketeOdgovore()
    {
        $this->db->select('*');
        $this->db->from('odgovori as o');
        $this->db->join('anketa as a','a.id_anketa = o.id_anketa' );
        $this->db->where('a.aktivna = 1 ');
        $this->db->where('a.id_anketa = o.id_anketa');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function dohvatiRezultate($id)
    {
        $this->db->select('*');
        $this->db->from('rezultat');
        $this->db->where('id_odgovor', $id);
        $query = $this->db->get();
        if($query->num_rows == 1)
        {
            return $query->row();
        }
        else{ return false;}
    }
    
    public function azuriranjeRezultata($podaciZaBazu)
    {
        $uslov = array('id_odgovor' => $podaciZaBazu['id_odgovor'],);
        $this->db->where($uslov);
        $this->db->update('rezultat', $podaciZaBazu);
    }
    
    public function unosAnkete($podaci)
    {
        $this->db->insert('anketa', $podaci);
    }
    public function azuriranjeAnkete($podaci)
    {
        $where = array('id_anketa' => $podaci['id_anketa']);
        $this->db->where($where);
        $this->db->update('anketa',$podaci);
    }
    
    public function brisanjeAnkete($podaci)
    {
        foreach($podaci as $podatak):
            $where = array('id_anketa' => $podatak);
            $set = array('aktivna' => '0');
            $this->db->where($where);
            $this->db->update('anketa',$set);
        endforeach;
    }
    public function vracanjeAnkete($podaci)
    {
        foreach($podaci as $podatak):
            $where = array('id_anketa' => $podatak);
            $set = array('aktivna' => '1');
            $this->db->where($where);
            $this->db->update('anketa',$set);
        endforeach;
    }
    public function brisanaAnkete()
    {
        $this->db->select('*');
        $this->db->from('anketa');
        $this->db->where('aktivna = 0');
        $query = $this->db->get();
        return $query->result_array();
    }
}
