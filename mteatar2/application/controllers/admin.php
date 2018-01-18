<?php

class Admin extends Frontend_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');   
        $this->load->model(array('rezervacija', 'model_predstava', 'model_pozoriste'));                     
    }
    
    public function index()
    {
        $data = array();
        $data['naslov'] = 'Admin panel';
        
        $session = $this->session->userdata("ulogovan");
        $sessUloga = $this->session->userdata("sessUloga");
        if(!empty($session) && $session && $sessUloga == '1')
        {
            $this->load_view('admin', $data);
        }
        else
        {
            $this->load_view('greska_admin', $data);
        }
    }
    
    public function upravljanje_rezervacijama($tip = null)
    {
        $spisak_korisnika = $this->rezervacija->dohvatiRezervacije();
        $data['naslov'] = 'Upravljanje rezervacijama';
        $data['rezervacije'] = $spisak_korisnika;
        $data['pozoriste'] = $this->model_pozoriste->dohvatiPozoriste();
        $data['predstava'] = $this->model_predstava->dohvatiPredstave();
        
        //INSERT
        if($tip != null && $tip == 'insert')
        { 
                                   
            if($this->input->post("btnUnos"))
            {
                $podaciZaBazu = array(
                    'id_korisnik' => NULL,
                    'ime' => $this->input->post('tbIme'),
                    'email' => $this->input->post('tbEmail'),
                    'id_pozoriste' => $this->input->post('ddlPozoriste'),
                    'id_predstava' => $this->input->post('ddlPredstava'),
                );
                
                $this->rezervacija->unosRezervacije($podaciZaBazu);
                
                $data['status'] = 'Uspešno';
            }
            
            $session = $this->session->userdata("ulogovan");
            $sessUloga = $this->session->userdata("sessUloga");
            if(!empty($session) && $session && $sessUloga == '1')
            {
                $this->load_view('administrator/rez_insert', $data);
            }
            else
            {
                $this->load_view('greska_admin', $data);
            }            
        }
        
        //UPDATE
        if($tip != null && $tip == 'update')
        {
            if($this->input->post("btnUpdate"))
            {
                $podaciZaBazu = array(
                    'id_korisnik' => $this->input->post('tbId'),
                    'ime' => $this->input->post('tbIme'),
                    'email' => $this->input->post('tbEmail'),
                    'id_pozoriste' => $this->input->post('ddlPozoriste'),
                    'id_predstava' => $this->input->post('ddlPredstava'),
                );
                
                $this->rezervacija->azuriranjeRezervacije($podaciZaBazu);
                
                $data['status'] = 'Uspešno';
            }
            $session = $this->session->userdata("ulogovan");
            $sessUloga = $this->session->userdata("sessUloga");
            if(!empty($session) && $session && $sessUloga == '1')
            {
                $this->load_view('administrator/rez_update', $data);
            }
            else
            {
                $this->load_view('greska_admin', $data);
            }
        }
        //DELETE
        if($tip != null && $tip == 'delete')
        {
            if($this->input->post("id"))
            {
                $spisak_korisnika = $this->rezervacija->brisiRezervacije($this->input->post("id"));
                $data['status'] = 'Uspešno';
            } 
            $session = $this->session->userdata("ulogovan");
            $sessUloga = $this->session->userdata("sessUloga");
            if(!empty($session) && $session && $sessUloga == '1')
            {
                $this->load_view('administrator/rez_delete', $data);
            }
            else
            {
                $this->load_view('greska_admin', $data);
            }
        }
    }
    
    public function upravljanje_repertoarima($tip = null)
    {       
        $data['naslov'] = 'Admin panel';
        $spisak_korisnika = $this->model_predstava->dohvatiPredstave();
        $data['predstave'] = $spisak_korisnika;
        $data['pozoriste'] = $this->model_pozoriste->dohvatiPozoriste();
        $session = $this->session->userdata("ulogovan");
        $sessUloga = $this->session->userdata("sessUloga");
        
        $config['upload_path'] = "images/predstave/";           
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '2000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        
        $this->load->library('upload', $config);
        $this->upload->do_upload('tbSlike');
        $upload_data = $this->upload->data(); 
        $file_name = $upload_data['file_name'];
        
        if($tip != null && $tip == 'insert')
        { 
                        
            
            $config = array();
            $config['base_url'] = base_url()."admin/upravljanje_repertoarima/insert";
            $config['total_rows'] = $this->model_predstava->brojPredstava();
            $config["per_page"] = 5;    
            $config['uri_segments'] = 3;
                         
            $this->pagination->initialize($config); 
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                                     
            $data['predstavaPozoriste'] = $this->model_predstava->dohvatiPredstavePozoriste($config["per_page"], $page); 
            $data['paginacija'] = $this->pagination->create_links();
                       
                        
            if($this->input->post("btnUnos"))
            {
                $podaciZaBazu = array(
                    'id_predstava' => NULL,
                    'naziv_predstava' => $this->input->post('tbNaziv'),
                    'opis' => $this->input->post('tbOpis'),
                    'slika' => $config['upload_path'].$file_name,
                    'id_pozoriste' => $this->input->post('ddlPozoriste'),                    
                );
                
                $this->model_predstava->unosPredstava($podaciZaBazu);
                
                $data['status'] = 'Uspešno';
            }
            
            
            if(!empty($session) && $session && $sessUloga == '1')
            {
                $this->load_view('administrator/pre_insert', $data);
            }
            else
            {
                $this->load_view('greska_admin', $data);
            }
        }
        
        if($tip != null && $tip == 'update')
        {
            if($this->input->post("btnUpdate"))
            {
                $podaciZaBazu = array(
                    'id_predstava' => $this->input->post('tbID'),
                    'naziv_predstava' => $this->input->post('tbNaziv'),
                    'opis' => $this->input->post('tbOpis'), 
                    'slika' => $config['upload_path'].$file_name,
                    'id_pozoriste' => $this->input->post('ddlPozoriste'),
                );
                
                $this->model_predstava->azuriranjePredstava($podaciZaBazu);
                
                $data['status'] = 'Uspešno';
            }
                        
            if(!empty($session) && $session && $sessUloga == '1')
            {
                $this->load_view('administrator/pre_update', $data);
            }
            else
            {
                $this->load_view('greska_admin', $data);
            }
        }
        
        if($tip != null && $tip == 'delete')
        {
            if($this->input->post("id"))
            {
                $spisak_korisnika = $this->model_predstava->brisiPredstave($this->input->post("id"));
                $data['status'] = 'Uspešno';
            } 
            
            
            if(!empty($session) && $session && $sessUloga == '1')
            {
                $this->load_view('administrator/pre_delete', $data);
            }
            else
            {
                $this->load_view('greska_admin', $data);
            }
        }
    }
    public function upravljanje_pozoristima($tip = null)
    {
        $data['naslov'] = 'Admin panel';
        $data['pozorista'] = $this->model_pozoriste->dohvatiPozoriste();
        
        $session = $this->session->userdata("ulogovan");
        $sessUloga = $this->session->userdata("sessUloga");
        
        if($tip != null && $tip == 'insert')
        {
            if($this->input->post("btnUnos"))
            {
                $podaciZaBazu = array(
                    'id_pozoriste' => NULL,
                    'naziv_pozoriste' => $this->input->post('tbPozoriste'),
                );
                $this->model_pozoriste->unosPozorista($podaciZaBazu);
                $data['status'] = 'Uspešno';
            }
            if(!empty($session) && $session && $sessUloga == '1')
            {                                
                $this->load_view('administrator/poz_insert', $data);
            }
            else
            {
                $this->load_view('greska_admin', $data);
            }
        }
        if($tip != null && $tip == 'update')
        {
            if($this->input->post("btnIzmena"))
            {
                $podaciZaBazu = array(
                    'id_pozoriste' => $this->input->post('tbId'),
                    'naziv_pozoriste' => $this->input->post('tbPozoriste'),
                );
                $this->model_pozoriste->izmenaPozorista($podaciZaBazu);
                $data['status'] = 'Uspešno';
            }
            if(!empty($session) && $session && $sessUloga == '1')
            {                                
                $this->load_view('administrator/poz_update', $data);
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
                if($this->input->post("chBrisi"))
                {
                    $this->model_pozoriste->brisanjePozorista($this->input->post("chBrisi"));
                }                
                $data['status'] = 'Uspešno';
            }
            if(!empty($session) && $session && $sessUloga == '1')
            {                                
                $this->load_view('administrator/poz_delete', $data);
            }
            else
            {
                $this->load_view('greska_admin', $data);
            }
        }
    }
}
