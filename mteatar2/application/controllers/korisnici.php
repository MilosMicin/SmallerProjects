<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of korisnici
 *
 * @author milos
 */
class korisnici extends Frontend_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model(array('model_korisnik'));
        $this->load->helper('form');
    }
    
    public function adminKorisnici($tip = null)
    {
        $data['naslov'] = 'Admin panel';
        $data['korisnici'] = $this->model_korisnik->dohvatiKorisnike();
        $data['brisaniKorisnici'] = $this->model_korisnik->dohvatiBrisaneKorisnike();
        
        $session = $this->session->userdata("ulogovan");
        $sessUloga = $this->session->userdata("sessUloga");
        
        if($tip != null && $tip == 'insert')
        {            
            if(!empty($session) && $session && $sessUloga == '1')
            {      
                if($this->input->post("btnUnos"))
                {
                    $podaci = array(
                        'id_admin' => null,
                        'naziv_admin' => $this->input->post('tbNaziv'),
                        'lozinka' =>md5($this->input->post('tbLozinka')),
                        'email' => $this->input->post('tbEmail'),
                        'id_uloga' => '2',
                    );
                    $data['status'] = '';
                    $this->model_korisnik->unosKorisnika($podaci);
                }
                
                $this->load_view('administrator/kor_insert', $data);
            }
            else
            {
                $this->load_view('greska_admin', $data);
            }
        }
        
        //UPDATE
        if($tip != null && $tip == 'update')
        {  
            if($this->input->post("btnIzmena"))
            {
                $podaci = array(
                    'id_admin' => $this->input->post('tbId'),
                    'naziv_admin' => $this->input->post('tbNaziv'),
                    'lozinka' =>md5($this->input->post('tbLozinka')),
                    'email' => $this->input->post('tbEmail'),
                    //'id_uloga' => '2',
                );                
                $this->model_korisnik->promenaKorisnika($podaci);
                $data['status'] = '';
            }
            
            if(!empty($session) && $session && $sessUloga == '1')
            {                                
                $this->load_view('administrator/kor_update', $data);
            }
            else
            {
                $this->load_view('greska_admin', $data);
            }
        }
        if($tip != null && $tip == 'delete')
        {  
            if($this->input->post("btnBrisi"))
            { 
                $brisi = $this->input->post('cbBrisi');
                if($brisi)
                {
                    $this->model_korisnik->brisanjeKorisnika($brisi);
                }
                                              
                $data['status'] = '';
            }
            if($this->input->post("btnIzmena"))
            {
                $vrati = $this->input->post('cbVrati');
                if($vrati)
                {
                    $this->model_korisnik->vracanjeKorisnika($vrati);
                }
                $data['status'] = '';
            }
            if(!empty($session) && $session && $sessUloga == '1')
            {                                
                $this->load_view('administrator/kor_delete', $data);
            }
            else
            {
                $this->load_view('greska_admin', $data);
            }
        }
    }
}
