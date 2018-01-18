<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_korisnik
 *
 * @author milos
 */
class model_korisnik extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function dohvatiKorisnike()
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('id_uloga = 2');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function dohvatiBrisaneKorisnike()
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('id_uloga = 0');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function unosKorisnika($podaci)
    {
        $this->db->insert('admin',$podaci);
    }
    public function promenaKorisnika($podaci)
    {
        $uslov = array('id_admin' => $podaci['id_admin']);
        $this->db->where($uslov);
        $this->db->update('admin',$podaci);
    }
    
    public function brisanjeKorisnika($ids)
    {
        foreach($ids as $id):
        $uslov = array('id_admin' => $id);
        $brisanje = array('id_uloga' => '0');
        $this->db->where($uslov);
        $this->db->update('admin',$brisanje);
        endforeach;
    }
    public function vracanjeKorisnika($ids)
    {
        foreach($ids as $id):
        $uslov = array('id_admin' => $id);
        $vracanje = array('id_uloga' => '2');
        $this->db->where($uslov);
        $this->db->update('admin',$vracanje); 
        endforeach;
    }
    
    
}
