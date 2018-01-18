<?php

class Rezervacija extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
       
    public function dohvatiRezervacije()
    {
        $this->db->select('*');
        $this->db->from('korisnik as k');       
        $this->db->join('poziriste as po', 'k.id_pozoriste = po.id_pozoriste');
        $this->db->join('predstava as p', 'k.id_predstava = p.id_predstava');       
        $query = $this->db->get();       
        return $query->result_array();
    }
    public function brisiRezervacije($podatak)
    {
        foreach($podatak as $id):
            $this->db->where('id_korisnik', $id);
            $this->db->delete('korisnik');                              
        endforeach;             
    }
    
    public function unosRezervacije($podaciZaBazu)
    {
        $this->db->insert('korisnik', $podaciZaBazu);      
    }
    
    public function azuriranjeRezervacije($podaciZaBazu)
    {
        $uslov = array('id_korisnik' => $podaciZaBazu['id_korisnik'],);
        $this->db->where($uslov);
        $this->db->update('rezultat', $podaciZaBazu);
    }
    public function meni()
    {     
        $this->db->select('*');
        $this->db->from('meni'); 
        $query = $this->db->get(); 
        $query->result_array();
    }
}
