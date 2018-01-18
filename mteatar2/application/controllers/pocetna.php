<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pocetna extends Frontend_Controller {	
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(array('model_pozoriste','model_predstava','rezervacija'));       
        //$this->load->library('pagination');
        $this->load->library(array('table','form_validation'));                      
    }       
	public function index()
	{                  
            $data['naslov'] = "M-teatar | Pocetna";
            //$data['meni'] = $this->rezervacija->meni();
            $this->load_view('pocetna',$data);
	}
        
        public function repertoar()
        { 
           
            $config = array();
            $config['base_url'] = base_url()."pocetna/repertoar";
            $config['total_rows'] = $this->model_predstava->brojPredstava();
            $config["per_page"] = 5;    
            $config['uri_segments'] = 3;
                                   
            $this->pagination->initialize($config); 
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                        
            $data['predstava'] = $this->model_predstava->dohvatiPredstavePozoriste($config["per_page"], $page); 
            $data['paginacija'] = $this->pagination->create_links();
            $data['naslov'] = "M-teatar | Pocetna";
            $this->load_view('repertoar',$data);       
        } 
        
        public function rezervacije()
        { 
            $this->form_validation->set_rules('ddlPozoriste','pozoriste', 'required|is_natural');
            $this->form_validation->set_rules('ddlPredstava', 'predstave', 'required|is_natural');
            $this->form_validation->set_message('is_natural','Morate izabrati nesto iz polja za biranje %s!');
            
            $data['naslov'] = "M-teatar | Rezervacije";
            $data['pozoriste'] = $this->model_pozoriste->dohvatiPozoriste();
            
            $ime = $this->session->userdata('sessUser');
            $email = $this->session->userdata('sessEmail');            
                                   
            if($this->form_validation->run() == FALSE)
            {
                $this->load_view('rezervacije',$data);
            }
            else
            {
                $dugme = $this->input->post("btnUnos");
                if($dugme != null)
                {
                    $podaciZaBazu = array(
                        'id_korisnik' => NULL,
                        'ime' => $ime,
                        'email' => $email,
                        'id_pozoriste' => $this->input->post('ddlPozoriste'),
                        'id_predstava' => $this->input->post('ddlPredstava'),
                    );
                    $this->rezervacija->unosRezervacije($podaciZaBazu);
                    $data['uspesno'] = "Uspesno upisano u bazu";
                }
            
                $sesija = $this->session->userdata('ulogovan');
                if(!empty($sesija) && $sesija)
                {   
                    $this->load_view('rezervacije',$data);  
                }
                else
                {
                    $this->load_view('greska_korisnik', $data);
                }
            }
            
        }
        
        public function predstava_ajax($id = null)
        {                       
            $data['ajax_predstava'] = $this->model_predstava->ajaxPredstave($id);
            
            $this->load->view('dohvatiPredstave', $data); 
        }
        public function autor()
        {                                  
            $this->load->view('milos'); 
        }
        public function download()
        {
        $id = $this->uri->segment(3);
        if(!empty($id))
        {
            $this->load->model('model_fajlovi','fajl');
            $this->fajl->id_fajl=$id;
            $rez = $this->fajl->select_where();
            foreach($rez as $r)
            {
                $this->load->helper('download');
                $this->load->helper('file');
                $data = file_get_contents($r['putanja']);
                $name = str_replace('img/','',$r['putanja']);
                force_download($name,$data);
            }
        }
    }   
}

