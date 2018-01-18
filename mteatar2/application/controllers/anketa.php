<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of anketa
 *
 * @author milos
 */
class Anketa extends Frontend_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(array("model_ankete","model_odgovor",'model_rezultat'));
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $this->form_validation->set_rules('rbOdgovori', 'ODGOVORA', 'required|is_natural');
        $this->form_validation->set_message('required', 'Morate izabrati neki od %s');
        
        $data['naslov'] = "M-teatar | Anketa";
        $data['ankete'] = $this->model_ankete->dohvatiAnkete();
        $data['odgovori'] = $this->model_ankete->dohvatiAnketeOdgovore();        
        
        $dugme = $this->input->post('btnOdgovor');
               
        if($this->form_validation->run() == FALSE)
        {
            $session = $this->session->userdata("ulogovan");
            $sessUloga = $this->session->userdata("sessUloga");
            if(!empty($session) && $session && $sessUloga == '2')
            {
                $this->load_view('anketa', $data);
            }
            else
            {
                $this->load_view('greska_admin', $data);
            }
        }
        else
        {
            $id = $this->input->post("rbOdgovori");
            $rezultati = $this->model_ankete->dohvatiRezultate($id);
            $rezultat = $rezultati->rezultat + 1;
            if($dugme != null)
            {  
                $podaciZaBazu = array(
                    "id_odgovor" => $this->input->post("rbOdgovori"),
                    "rezultat" => $rezultat,
                );
                $this->model_ankete->azuriranjeRezultata($podaciZaBazu);
                $data['uspesno'] = 'Hvala';
            }
            $this->load_view('anketa', $data);
        }       
                
    }
    
    public function adminAnketa($tip = null)
    {     
        $data['naslov'] = 'Upravljanje anketama';  
        $data['ankete'] = $this->model_ankete->ankete(); 
        $data['brisaneAnkete'] = $this->model_ankete->brisanaAnkete();
        $spisak_anketa = $this->model_ankete->dohvatiAnkete();
        $data['dankete'] =  $spisak_anketa;
        
        $session = $this->session->userdata("ulogovan");
        $sessUloga = $this->session->userdata("sessUloga");
        if($tip != null && $tip == 'insert_anketa')
        {            
            
            if($this->input->post('btnUnos'))
            {
                $podaciZaBazu = array(
                    'id_anketa' => NULL,
                    'pitanje' => $this->input->post("tbPitanje"),
                );

                $this->model_ankete->unosAnkete($podaciZaBazu);

                $data['status'] = 'Uspesno!';
            }
            
            if(!empty($session) && $session && $sessUloga == '1')
            {                                 
                $this->load_view('administrator/anketa_insert', $data);               
            }
            else
            {
                $this->load_view('greska_admin', $data);
            }             
        }
        if($tip != null && $tip == 'update_anketa')
        {
            
            if($this->input->post('btnIzmeni'))
            {
                $podaciZaBazu = array(
                    'id_anketa' => $this->input->post("tbId"),
                    'pitanje' => $this->input->post("tbPitanje"),
                );
                
                $this->model_ankete->azuriranjeAnkete($podaciZaBazu);

                $data['status'] = 'Uspesno!';
            }
            if(!empty($session) && $session && $sessUloga == '1')
            {    
                
                $this->load_view('administrator/anketa_update', $data);               
            }
            else
            {
                $this->load_view('greska_admin', $data);
            }
        }
        if($tip != null && $tip == 'delete_anketa')
        {
            if($this->input->post('btnBrisi'))
            {
                $id = $this->input->post('cbBrisi');
                if($id)
                {
                    $spisak_anketa = $this->model_ankete->brisanjeAnkete($id);
                    $data['status'] = 'Uspesno!';
                }              
            }
            if($this->input->post('btnVracanje'))
            {
                $id2 = $this->input->post('cbVrati');
                if($id2)
                {
                    $this->model_ankete->vracanjeAnkete($id2);
                    $data['status'] = 'Uspesno!';
                }
            }
            if(!empty($session) && $session && $sessUloga == '1')
            {                                 
                $this->load_view('administrator/anketa_delete', $data);               
            }
            else
            {
                $this->load_view('greska_admin', $data);
            }
        }
    }
    
    public function adminOdgovori($tip = null)
    {
        $data['naslov'] = 'Upravljanje anketama';
        $data['odgovori'] = $this->model_odgovor->dohvatiOdgovore();
        $data['ankete'] = $this->model_ankete->dohvatiAnkete();
               
        $session = $this->session->userdata("ulogovan");
        $sessUloga = $this->session->userdata("sessUloga");
        if($tip != null && $tip == 'insert_odgovor')
        {
            if($this->input->post("btnUnos") != null)
            {
                $podaciZaBazu = array(
                    'id_odgovori' => NULL,
                    'id_anketa' => $this->input->post("ddlPitanje"),
                    'odgovori' => $this->input->post("tbOdgovor"),
                );

                $this->model_odgovor->unosOdgovora($podaciZaBazu);
                $data['status'] = 'Uspesno!';
            }
            if(!empty($session) && $session && $sessUloga == '1')
            {                                 
                $this->load_view('administrator/odgovor_insert', $data);               
            }
            else
            {
                $this->load_view('greska_admin', $data);
            }
        }  
        
        //UPDATE
        if($tip != null && $tip == 'update_odgovor')
        {
            if($this->input->post('btnIzmeni') != null)
            {
                $podaciZaBazu = array(
                    'id_odgovori' => $this->input->post("tbId"),
                    'id_anketa' => $this->input->post("ddlPitanje"),
                    'odgovori' => $this->input->post("tbOdgovor"),
                );
                $this->model_odgovor->izmenaOdgovora($podaciZaBazu);
                $data['status'] = 'Uspesno!';
            }
            if(!empty($session) && $session && $sessUloga == '1')
            {                                 
                $this->load_view('administrator/odgovor_update', $data);               
            }
            else
            {
                $this->load_view('greska_admin', $data);
            }
        }
        if($tip != null && $tip == 'delete_odgovor')
        {
            if($this->input->post('brnBrisi'))
            {
                $id = $this->input->post('cbBrisanje');
                if($id)
                {
                    $this->model_odgovor->brisanjeOdgovora($id);
                    $data['status'] = 'Uspesno!';
                }
            }
            if(!empty($session) && $session && $sessUloga == '1')
            {                                 
                $this->load_view('administrator/odgovor_delete', $data);               
            }
            else
            {
                $this->load_view('greska_admin', $data);
            }
        }
    }
    public function adminRezultati($tip = null)
    {
        $data['naslov'] = 'Upravljanje anketama';
        $data['rezultati'] = $this->model_rezultat->dohvatiRezultate();
        $data['ankete'] = $this->model_ankete->dohvatiAnkete();
        $data['odgovori'] = $this->model_odgovor->dohvatiOdgovore();
               
        $session = $this->session->userdata("ulogovan");
        $sessUloga = $this->session->userdata("sessUloga");
        
        if($tip != null && $tip == 'insert')
        {
            if($this->input->post("btnUnos") != null)
            {
                $podaciZaBazu = array(
                    'id_rezultat' => NULL,
                    'id_anketa' => $this->input->post("ddlPitanje"),
                    'id_odgovor' => $this->input->post("ddlOdgovor"),
                    'rezultat' => '0',
                );

                $this->model_rezultat->unosRezultata($podaciZaBazu);
                $data['status'] = 'Uspesno!';
            }
            if(!empty($session) && $session && $sessUloga == '1')
            {                                 
                $this->load_view('administrator/rezultat_insert', $data);               
            }
            else
            {
                $this->load_view('greska_admin', $data);
            }
        }
        //UPDATE
        if($tip != null && $tip == 'update')
        {
            if($this->input->post("btnUnos") != null)
            {
                $podaciZaBazu = array(
                    'id_rezultat' => $this->input->post("tbId"),
                    'id_anketa' => $this->input->post("ddlPitanje"),
                    'id_odgovor' => $this->input->post("ddlOdgovor"),
                    'rezultat' => $this->input->post("tbRezultat"),
                );

                $this->model_rezultat->izmenaRezultata($podaciZaBazu);
                $data['status'] = 'Uspesno!';
            }
            if(!empty($session) && $session && $sessUloga == '1')
            {                                 
                $this->load_view('administrator/rezultat_update', $data);               
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
                if($this->input->post("cbBrisi"))
                {
                    $this->model_rezultat->brisanjeRezultata($this->input->post("cbBrisi"));
                }                                      
                $data['status'] = 'Uspešno';
            }
            
            if(!empty($session) && $session && $sessUloga == '1')
            {                                 
                $this->load_view('administrator/rezultat_delete', $data);               
            }
            else
            {
                $this->load_view('greska_admin', $data);
            }
        }
    }
}
