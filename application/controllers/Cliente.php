<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cliente extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }


    public function index($page=null, $adminid=0)
    {
        $referencias = array("BLUTV.APP", "HDTV.BLUE", "AUTORIZADA.BLUE", "BLUETVPLUS.COM", "RECARGAS.BLUE", "BLUETV.BLUE");


        if ($this->Admin_model->verifyUser()) {
            if ($this->input->post()) {
                $postData = $this->input->post();
                $this->Admin_model->updateCliente($postData, $postData["action"]);
            }


            
            
            
            if ($page == "add") {
                $this->data['referencias'] = $referencias;

                $this->load->vars($this->data);
                $this->load->view('header');
                $this->load->view('cliente/cliente_add', $this->data);
                $this->load->view('footer');
            } elseif ($page == "edit") {
                if ($adminid == null) {
                    redirect(base_url(), 'auto');
                }

                $data['referencias'] = $referencias;
                $data["result"] = $this->Admin_model->getClienteInfo($adminid);
                $this->load->view('header');
                $this->load->view('cliente/cliente_edit', $data);
                $this->load->view('footer');
            } elseif ($page=="venda") {
                $data['venda'] = $this->Admin_model->getVendaByCliente($adminid);
                $this->load->view('header');
                $this->load->view('cliente/cliente_venda', $data);
                $this->load->view('footer');
            } else {
                $data['referencias'] = $referencias;
                $data["admins"] = $this->Admin_model->getCliente();
                $this->load->view('header');
                $this->load->view('cliente/index', $data);
                $this->load->view('footer');
            }
        }
    }
}
