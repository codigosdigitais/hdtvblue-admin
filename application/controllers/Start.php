<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends CI_Controller {

	public function index()
	{ 
		$referencias = array("BLUTV.APP", "HDTV.BLUE", "AUTORIZADA.BLUE", "BLUETVPLUS.COM", "RECARGAS.BLUE", "BLUETV.BLUE");
		if ($this->Admin_model->verifyUser()) {

			/* */
			$this->data['lista_3_dias'] = $this->Admin_model->getListaVendas3();
			$this->data['total_bruto'] = $this->Admin_model->getResumoDashboard('bruto');
			$this->data['total_liquido'] = $this->Admin_model->getResumoDashboard('liquido');
			$this->data['referencias'] = $referencias;
			
			$this->load->view('header');
			$this->load->view('welcome_message', $this->data);
			$this->load->view('footer');
		} 
		
	}
}
