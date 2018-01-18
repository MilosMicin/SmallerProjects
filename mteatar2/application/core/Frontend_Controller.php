<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend_Controller extends CI_Controller {
	
	function __construct() {
            parent::__construct();            
        }
        public function load_view($view, $vars = array()) {
            $this->load->view('sablon/header', $vars);
            $this->load->view($view, $vars);
            $this->load->view('sablon/footer');
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */