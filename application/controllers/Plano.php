<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plano extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }


	public function index($page=null, $adminid=0) {

		if ($this->Admin_model->verifyUser()) {

			if ($this->input->post()){
				$postData = $this->input->post();
				$this->Admin_model->updatePlano($postData, $postData["action"]);
			}
			if ($page == "add") {

				$this->load->view('header');
				$this->load->view('plano/plano_add');
				$this->load->view('footer');

			} elseif ($page == "edit") {

				if ($adminid == null) { redirect(base_url(), 'auto'); }
				$data["result"] = $this->Admin_model->getPlanoInfo($adminid);
				$this->load->view('header');
				$this->load->view('plano/plano_edit', $data);
				$this->load->view('footer');

			} else {

				$data["admins"] = $this->Admin_model->getPlano();
				$this->load->view('header');
				$this->load->view('plano/index', $data);
				$this->load->view('footer');

			} 

		}

	}
}
