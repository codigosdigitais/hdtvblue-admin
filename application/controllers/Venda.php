<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Venda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }


    public function index($page=null, $adminid=0)
    {
        if ($this->Admin_model->verifyUser()) {
            if ($this->input->post()) {
                $postData = $this->input->post();
                $this->Admin_model->updateVenda($postData, $postData["action"]);
            }

            

            if ($page == "add") {
                $data['planos'] = $this->Admin_model->getPlano();
                $data['clientes'] = $this->Admin_model->getCliente();
                $data['meiosdepagamento'] = $this->Admin_model->getMeiodePagamento();

                $this->load->view('header');
                $this->load->view('venda/venda_add', $data);
                $this->load->view('footer');
            } elseif ($page == "edit") {
                if ($adminid == null) {
                    redirect(base_url(), 'auto');
                }


                $data['planos'] = $this->Admin_model->getPlano();
                $data['clientes'] = $this->Admin_model->getCliente();
                $data['meiosdepagamento'] = $this->Admin_model->getMeiodePagamento();
                $data["result"] = $this->Admin_model->getVendaManualInfo($adminid);
                
                $this->load->view('header');
                $this->load->view('venda/venda_edit', $data);
                $this->load->view('footer');
            } else {
                $data["venda"] = $this->Admin_model->getVendaManual();
                $this->load->view('header');
                $this->load->view('venda/index', $data);
                $this->load->view('footer');
            }
        }
    }

    /* Ajax getPlano */
    public function getPlano()
    {
        $this->db->select('valor, valor_unidade, titulo');
        $this->db->where('id_plano', $this->input->post('id_plano'));
        $consulta = $this->db->get('plano')->row();

        $retorno['valor_unidade'] = number_format($consulta->valor_unidade, 2, ',', '.'); // Valor de Compra
        $retorno['valor'] = number_format($consulta->valor, 2, ',', '.'); // Valor que o Cliente paga
        $liquido = $consulta->valor- $consulta->valor_unidade;
        $retorno['liquido'] = number_format($liquido, 2, ',', '.');
        $retorno['titulo'] = $consulta->titulo;

        echo json_encode($retorno);
    }

    public function getVenda()
    {
        $id_venda = $this->input->post('id_venda');
        $venda = $this->Admin_model->getVendaManualInfo($id_venda);
        $telefone = "55".str_replace('-', '', str_replace(')', '', str_replace("(", '', str_replace(" ", '', $venda->telefone))));
        $titulo = str_replace(" ", "%20", $venda->titulo);
        $vencimento = date("d/m/Y", strtotime($venda->data_vencimento));
        $data_criacao = date("d/m/Y", strtotime($venda->data_criacao));
        $nome = str_replace(" ", "%20", $venda->nome);
        
        // Formato 24 horas (de 1 a 24)
        date_default_timezone_set('America/Sao_Paulo');
        $hora = date('H');
        
        if (($hora >= 0) and ($hora < 6)) {
            $saudacao = "Boa madrugada";
        } elseif (($hora >= 6) and ($hora < 12)) {
            $saudacao = "Bom dia";
        } elseif (($hora >= 12) and ($hora < 18)) {
            $saudacao = "Boa tarde";
        } else {
            $saudacao = "Boa noite";
        }
                



        //$mensagem_enviada 	= "Prezado%20cliente,%20{$saudacao}!%20Informamos%20que%20de%20acordo%20com%20a%20data%20do%20seu%20comprovante%20de%20pagamento%20anterior%20%20sua%20recarga%20*{$titulo}*%20irá%20vencer%20nas%20próximas%2024hs.%20Caso%20deseje%20recarregar,%20estamos%20a%20disposição. \n\n\n\n Nossas opções de pagamento são: *Depósito em Lotérica, Transferência, Cartão de Crédito e PIX*. *Escolha seu Plano de Recarga Abaixo:* ";
        $mensagem_enviada 	= "Prezado%20cliente,%20{$saudacao}.%20Informamos%20que%20de%20acordo%20com%20sua%20compra%20*realizada%20em%20{$data_criacao}*,%20seu%20plano%20de%20recarga%20vencerá%20nas%20próximas%2024hs.%20Para%20recarregar,%20dúvidas%20ou%20suporte%20técnico,%20estamos%20a%20disposição.%20*Escolha%20seu%20plano%20na%20tabela%20abaixo:*";
        $url_whatsapp 		= "https://api.whatsapp.com/send?phone=".$telefone."&text=".$mensagem_enviada;

        echo $url_whatsapp;
        //print_r($venda);
    }
}
