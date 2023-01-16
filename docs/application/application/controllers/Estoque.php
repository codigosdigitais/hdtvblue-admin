<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estoque extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }


	public function index($page=null, $adminid=0) {

		if ($this->Admin_model->verifyUser()) {

			if ($this->input->post()){
				$postData = $this->input->post();
				$this->Admin_model->updateEstoque($postData, $postData["action"]);
			}
			if ($page == "add") {
				$data['planos'] = $this->Admin_model->getPlano();
				$this->load->view('header');
				$this->load->view('estoque/estoque_add', $data);
				$this->load->view('footer');

			} elseif ($page == "visualizar") {

				if ($adminid == null) { redirect(base_url(), 'auto'); }
				$data["result"] = $this->Admin_model->getEstoqueInfo($adminid);
				$this->load->view('header');
				$this->load->view('estoque/estoque_plano', $data);
				$this->load->view('footer');

			} else {

				$data["admins"] = $this->Admin_model->getEstoque();
				$this->load->view('header');
				$this->load->view('estoque/index', $data);
				$this->load->view('footer');

			} 

		}

	}
}
