<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorio extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }


	public function index($page=null, $adminid=0) {

		if ($this->Admin_model->verifyUser()) {


            $data['total_clientes'] = count($this->Admin_model->getCliente());
            $data['pendentes_mes_atual'] = $this->Admin_model->vendas_pendentes_mes_atual();



            $this->load->view('header');
            $this->load->view('relatorio/index', $data);
            $this->load->view('footer');

        }

	}
}
