<?php


class Logovanje extends Frontend_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(array('model_logovanje','model_korisnik'));
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $data['naslov'] = 'Logovanje';
        $this->load_view('logovanje', $data);
    }
    
    public function login()
    {
        $this->form_validation->set_rules('tbUser','korisnicko ime', 'required|trim');
        $this->form_validation->set_rules('tbLozinka', 'lozinka', 'required|trim');
        $this->form_validation->set_message('required','Polje %s je obavezno!');
        
        if($this->form_validation->run() == FALSE)
        {
            $data = array();
            $this->load_view('logovanje',$data);
        }
        else
        {                   
            $dugme = $this->input->post("btnLogin");
            if($dugme != null)
            {
                $korisnicko_ime = $this->input->post("tbUser");
                $lozinka = md5($this->input->post("tbLozinka"));

                $nizKorisnik = array('naziv_admin' => $korisnicko_ime, 'lozinka' => $lozinka);
                $proveraPodataka = $this->model_logovanje->prijava($nizKorisnik);

                if($proveraPodataka != FALSE)
                {
                    $user = $proveraPodataka->naziv_admin;
                    $email = $proveraPodataka->email;
                    $uloga = $proveraPodataka->id_uloga;
                    
                    $this->session->set_userdata('sessUser', $user);
                    $this->session->set_userdata('sessEmail', $email);
                    $this->session->set_userdata('sessUloga', $uloga);
                    $this->session->set_userdata('ulogovan', true);
                    
                    switch ($uloga)
                    {
                        case '1':
                            redirect(base_url()."admin/index");
                            break;
                        case '2':
                            redirect(base_url()."pocetna/rezervacije");
                            break;
                        case '0':
                            $data['naslov'] = 'Greska';
                            $this->session->unset_userdata('username');
                            $this->session->unset_userdata('ulogovan');
                            $this->session->sess_destroy();
                            $this->load_view('greska_admin', $data);
                            break;
                    }

                }
                else
                {
                    $data['naslov'] = 'Greska';
                    $this->load_view('greska_admin', $data);
                }
            }
        }
    }
    
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('ulogovan');
        $this->session->sess_destroy();
        redirect(base_url());
    }  
    
    public function registracija()
    {
        $this->form_validation->set_rules('tbUser','KORISNICKO IME', 'required|trim');
        $this->form_validation->set_rules('tbLozinka', 'LOZINKA', 'required|trim');
        $this->form_validation->set_rules('tbEmail', 'E-MAIL', 'required|valid_email');
        $this->form_validation->set_message('required','Polje %s je obavezno!');
        
        if($this->form_validation->run() == FALSE)
        {
            $data['naslov'] = 'Registracija';
            $this->load_view('registracija', $data);
        }
        else 
        {
            if($this->input->post("btnRegistracija"))
            {
                $podaciZaBazu = array(
                    'id_admin' => NULL,
                    'naziv_admin' => $this->input->post("tbUser"),
                    'lozinka' => md5($this->input->post("tbLozinka")),
                    'email' => $this->input->post("tbEmail"),
                    'id_uloga' => "2",
                );
                $this->model_korisnik->unosKorisnika($podaciZaBazu);
                redirect(base_url()."logovanje");
            }            
        }
    } 
}
