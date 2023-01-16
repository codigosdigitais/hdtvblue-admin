<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    protected function generateSalt()
    {
        $salt = "xiORG17N6ayoEn6X3";
        return $salt;
    }

    protected function generateVerificationKey()
    {
        $length = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getUserIP()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        } elseif (isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        } else {
            $ipaddress = 'UNKNOWN';
        }
        return $ipaddress;
    }

    public function updateGroups($postData=null, $action=null)
    {
        if ($action == "add") {
            $error = 0;
            if (!isset($postData["name"]) || empty($postData["name"])) {
                $error = 2;
            } else {
                $name = $this->db->escape(strip_tags($postData["name"]));
            }
            if ($error == 2) {
                return $error;
            }
            $sql = "SELECT * FROM admin_groups WHERE name = ".$name;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 3;
            } else {
                $sql2 = "INSERT INTO admin_groups (name) VALUES (".$name.")";
                $this->db->query($sql2);
                return true;
            }
        }
        if ($action == "edit") {
            $error = 0;
            if (!isset($postData["name"]) || empty($postData["name"])) {
                $error = 2;
            } else {
                $name = $this->db->escape(strip_tags($postData["name"]));
            }
            if (!isset($postData["id"]) || empty($postData["id"])) {
                $error = 3;
            } else {
                $id = $this->db->escape(strip_tags($postData["id"]));
            }
            if ($error == 2) {
                return $error;
            }
            $sql = "SELECT * FROM admin_groups WHERE name = ".$name;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 4;
            } else {
                $sql2 = "UPDATE admin_groups SET name = ".$name." WHERE id = ".$id;
                $this->db->query($sql2);
                return true;
            }
        }
        if ($action == "delete") {
            $admin_group = $this->db->escape(strip_tags((int)$postData["id"]));
            $sql = "SELECT * FROM admin WHERE admin_group = ".$admin_group;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return false;
            } else {
                $sql2 = "DELETE FROM admin_groups WHERE id = ".$admin_group;
                $this->db->query($sql2);
                return true;
            }
        }
    }
        
    public function getAdminGroups($additional="")
    {
        if ($additional !== "") {
            $additional = "WHERE id = ".$this->db->escape($additional);
        }
        $sql = "SELECT * FROM admin_groups ".$additional;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getAdminInfo($adminid=null)
    {
        $sql = "SELECT * FROM admin WHERE id = ".$this->db->escape(strip_tags((int)$adminid));
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }

    public function getAdmins()
    {
        $sql = "SELECT a.id, a.username, ag.name as 'role', a.name as 'fullname' FROM admin a 
                LEFT JOIN admin_groups ag ON a.admin_group = ag.id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function updateAdmins($postData=null, $action=null)
    {
        if ($action == "add") {
            $error = 0;
            if (!isset($postData["username"]) || empty($postData["username"])) {
                $error = 2;
            } else {
                $username = $this->db->escape(strip_tags($postData["username"]));
            }
            if (!isset($postData["password"]) || empty($postData["password"])) {
                $error = 3;
            } else {
                $password = strip_tags($postData["password"]);
            }
            if (!isset($postData["password2"]) || empty($postData["password2"])) {
                $error = 4;
            } else {
                $password2 = strip_tags($postData["password2"]);
            }
            if (!isset($postData["email"]) || empty($postData["email"])) {
                $error = 5;
            } else {
                $email = $this->db->escape(strip_tags($postData["email"]));
            }
            if (!isset($postData["name"]) || empty($postData["name"])) {
                $error = 6;
            } else {
                $name = $this->db->escape(strip_tags($postData["name"]));
            }
            if (!isset($postData["admin_group"]) || empty($postData["admin_group"])) {
                $error = 7;
            } else {
                $admin_group = $this->db->escape(strip_tags($postData["admin_group"]));
            }
            if (!isset($postData["address"]) || empty($postData["address"])) {
                $address = "''";
            } else {
                $address = $this->db->escape(strip_tags($postData["address"]));
            }
            if (!isset($postData["address2"]) || empty($postData["address2"])) {
                $address2 = "''";
            } else {
                $address2 = $this->db->escape(strip_tags($postData["address2"]));
            }
            if (!isset($postData["city"]) || empty($postData["city"])) {
                $city = "''";
            } else {
                $city = $this->db->escape(strip_tags($postData["city"]));
            }
            if (!isset($postData["state"]) || empty($postData["state"])) {
                $state = "''";
            } else {
                $state = $this->db->escape(strip_tags($postData["state"]));
            }
            if (!isset($postData["zip"]) || empty($postData["zip"])) {
                $zip = "''";
            } else {
                $zip = $this->db->escape(strip_tags($postData["zip"]));
            }
            $verification_key = $this->db->escape($this->generateVerificationKey());
            $salt = $this->generateSalt();
            if ($password !== $password2) {
                $error = 8;
            } else {
                $password = $this->db->escape(md5($salt.$password));
            }
            if ($error > 0) {
                return $error;
            }
            $now = $this->db->escape(time());
            $sql = "SELECT * FROM admin WHERE username = ".$username;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return 9;
            } else {
                $sql2 = "INSERT INTO admin (username,password,email,created_date,verification_key,admin_group,name,address,address2,city,state,zip) VALUES ($username, $password, $email, $now, $verification_key, $admin_group, $name, $address, $address2, $city, $state, $zip)";
                $this->db->query($sql2);
                return true;
            }
        }
        if ($action == "edit") {
            $error = 0;
            if (!isset($postData["username"]) || empty($postData["username"])) {
                $username = "";
            } else {
                $username = $this->db->escape(strip_tags($postData["username"]));
            }
            if (!isset($postData["password"]) || empty($postData["password"])) {
                $pass = 0;
            } else {
                $pass = 1;
                $password = strip_tags($postData["password"]);
            }
            if (!isset($postData["password2"]) || empty($postData["password2"])) {
                $password2 = "";
            } else {
                $password2 = strip_tags($postData["password2"]);
            }
            if (!isset($postData["email"]) || empty($postData["email"])) {
                $error = 5;
            } else {
                $email = $this->db->escape(strip_tags($postData["email"]));
            }
            if (!isset($postData["name"]) || empty($postData["name"])) {
                $error = 6;
            } else {
                $name = $this->db->escape(strip_tags($postData["name"]));
            }
            if (!isset($postData["admin_group"]) || empty($postData["admin_group"])) {
                $error = 7;
            } else {
                $admin_group = $this->db->escape(strip_tags($postData["admin_group"]));
            }
            if (!isset($postData["address"]) || empty($postData["address"])) {
                $address = "''";
            } else {
                $address = $this->db->escape(strip_tags($postData["address"]));
            }
            if (!isset($postData["address2"]) || empty($postData["address2"])) {
                $address2 = "''";
            } else {
                $address2 = $this->db->escape(strip_tags($postData["address2"]));
            }
            if (!isset($postData["city"]) || empty($postData["city"])) {
                $city = "''";
            } else {
                $city = $this->db->escape(strip_tags($postData["city"]));
            }
            if (!isset($postData["state"]) || empty($postData["state"])) {
                $state = "''";
            } else {
                $state = $this->db->escape(strip_tags($postData["state"]));
            }
            if (!isset($postData["zip"]) || empty($postData["zip"])) {
                $zip = "''";
            } else {
                $zip = $this->db->escape(strip_tags($postData["zip"]));
            }
            if ($error > 0) {
                return $error;
            }
            $sql = "SELECT * FROM admin WHERE username = ".$username;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                if ($pass == 0) {
                    $sql = "UPDATE admin SET email = $email, name = $name, admin_group = $admin_group, address = $address, address2 = $address2, city = $city, state = $state, zip = $zip WHERE id = ".$this->db->escape($query->row()->id);
                    $this->db->query($sql);
                    return true;
                } else {
                    if ($password !== $password2) {
                        return 8;
                    }
                    $salt = $this->generateSalt();
                    $password = $this->db->escape(md5($salt.$password));
                    $sql = "UPDATE admin SET email = $email, name = $name, admin_group = $admin_group, address = $address, address2 = $address2, city = $city, state = $state, zip = $zip, password = $password WHERE id = ".$this->db->escape($query->row()->id);
                    $this->db->query($sql);
                    return true;
                }
            } else {
                return 9;
            }
        }
        if ($action == "delete") {
            $admin_id = $this->db->escape(strip_tags((int)$postData["id"]));
            if ((int)$postData["id"] == $this->session->userdata("admin_id")) {
                return false;
            } else {
                $sql = "DELETE FROM admin WHERE id = ".$admin_id;
                $this->db->query($sql);
                return true;
            }
        }
    }

    public function adminLogin($postData)
    {
        if (!isset($postData["username"])) {
            return 2;
        }
        if (!isset($postData["password"])) {
            return 2;
        }
        $salt = $this->generateSalt();
        $username = $this->db->escape(strip_tags($postData["username"]));
        $password = $this->db->escape(strip_tags(md5($salt.$postData["password"])));
            
         
             

            
        $sql = "SELECT * FROM admin WHERE username = ".$username." AND password = ".$password;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $q = $query->row();
            $this->session->set_userdata("username", $q->username);
            $this->session->set_userdata("verification_key", $q->verification_key);
            $this->session->set_userdata("admin_id", $q->id);
            $this->session->set_userdata("loggedin", 1);
            $ip = $this->getUserIP();
            $sql2 = "UPDATE admin SET last_signin = NOW(), ip = ".$this->db->escape($ip)." WHERE id = ".$q->id;
            $this->db->query($sql2);
            return true;
        } else {
            return 2;
        }
    }

    public function verifyUser()
    {
        if ($this->session->userdata("username") && $this->session->userdata("verification_key") && $this->session->userdata("admin_id") && $this->session->userdata("loggedin")) {
            $sql = "SELECT * FROM admin WHERE id = ".$this->db->escape(strip_tags((int)$this->session->userdata("admin_id")))." AND verification_key = ".$this->db->escape(strip_tags($this->session->userdata("verification_key")))." AND username = ".$this->db->escape(strip_tags($this->session->userdata("username")));
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return true;
            } else {
                $this->logout();
                redirect(base_url()."login", 'auto');
            }
        } else {
            $this->logout();
            redirect(base_url()."login", 'auto');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata("username");
        $this->session->unset_userdata("verification_key");
        $this->session->unset_userdata("admin_id");
        $this->session->unset_userdata("loggedin");
        return true;
    }

    /* Listagem de Vendas da Dashboard (próximos vencimentos) */
    public function getListaVendas3()
    {
        $sql = "SELECT 
                        c1.*,
                        c2.nome as cliente,
                        c2.telefone,
                        c2.id_cliente,
                        c2.referencia,
                        c3.titulo as plano,
                        c4.titulo as meiodepagamento
                    FROM venda as c1 
                    LEFT JOIN cliente as c2 ON c2.id_cliente=c1.id_cliente
                    LEFT JOIN plano as c3 ON c3.id_plano=c1.id_plano
                    LEFT JOIN meiosdepagamento as c4 ON c4.id_meiosdepagamento=c1.id_meiodepagamento
                    WHERE c1.data_vencimento BETWEEN DATE_ADD(NOW(), INTERVAL -3 DAY) AND DATE_ADD(NOW(), INTERVAL 6 DAY)
                    ORDER BY c1.data_vencimento ASC
                    ";
        $query = $this->db->query($sql)->result();
            
        return $query;
    }

    /* Listagem de Vendas da Dashboard (próximos vencimentos) */
    public function getListaTotalVendas()
    {
        $sql = "SELECT * WHERE MONTH(data_criacao) = 'mes_escolhido' ORDER BY data_vencimento ASC";
        $query = $this->db->query($sql)->result();
            
        return $query;
    }
        
    /* */
    public function getResumoDashboard($tipo)
    {
        if ($tipo=='bruto') {
            $this->db->select('SUM(valor_custo) as total');
            $this->db->from('venda');
            $this->db->where('MONTH(data_criacao) = MONTH(NOW())');
            $this->db->where('YEAR(data_criacao) = YEAR(NOW())');
            $query = $this->db->get()->row();
        } else {
            $this->db->select('SUM(liquido) as total');
            $this->db->from('venda');
            $this->db->where('MONTH(data_criacao) = MONTH(NOW())');
            $this->db->where('YEAR(data_criacao) = YEAR(NOW())');
            $query = $this->db->get()->row();
        }


        // echo "<pre>";
        // echo $this->db->last_query();
        // echo "<hr>";
        // print_r($query);
        // die();
            
        return $query->total;
    }


    /*
    * Estrutura do Painel (bluetv)
    * Planos
    */
    public function getPlano()
    {
        return $this->db->get('plano')->result();
    }

    public function getPlanoInfo($id_plano=null)
    {
        $sql = "SELECT * FROM plano WHERE id_plano = ".$this->db->escape(strip_tags((int)$id_plano));
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }

    public function updatePlano($postData=null, $action=null)
    {
        if ($action == "add") {
            $data['titulo'] = $this->input->post('titulo');
            $data['url_amigavel'] = $this->input->post('url_amigavel');
            $data['valor'] = $this->input->post('valor');
            $data['valor_unidade'] = $this->input->post('valor_unidade');

            if ($this->db->insert('plano', $data)) {
                return true;
            }
        }
        if ($action == "edit") {
            $data['titulo'] = $this->input->post('titulo');
            $data['url_amigavel'] = $this->input->post('url_amigavel');
            $data['valor'] = $this->input->post('valor');
            $data['valor_unidade'] = $this->input->post('valor_unidade');

            $this->db->where('id_plano', $this->input->post('id_plano'));
            if ($this->db->update('plano', $data)) {
                return true;
            }
        }

        if ($action == "delete") {
            echo "Você não poderá remover nenhum dos planos.";
        }
    }
        

    /*estoque*/
    public function getEstoque()
    {
        return $this->db->get('v_get_lista_estoque')->result();
    }

    public function getEstoqueInfo($id_plano=null)
    {
        $this->db->select('plano.titulo as nome_plano, estoque_codigo.*, estoque.*');
        $this->db->join('estoque', 'estoque.id_estoque=estoque_codigo.id_estoque');
        $this->db->join('plano', 'plano.id_plano=estoque.id_plano');
        $this->db->where('estoque.id_plano', $id_plano);
        return $this->db->get('estoque_codigo')->result();
    }

    public function updateEstoque($postData=null, $action=null)
    {
        if ($action == "add") {
            $trim                   = $this->input->post('lista_codigo');
            $lista                  = explode("\n", $trim);
            $qtde                   = count($lista);

            $dados['valor_pago']    = $this->input->post('valor_pago');
            $dados['quantidade']    = $qtde;
            $dados['id_plano']      = $this->input->post('id_plano');



                    

            $this->db->insert('estoque', $dados);
            $ultimo                 = $this->db->insert_id();


            foreach ($lista as $valor=>$key) {
                $estoque[$valor]['id_estoque'] = $ultimo;
                $estoque[$valor]['codigo'] = strip_tags($key);
            }

            $this->db->insert_batch('estoque_codigo', $estoque);
            return true;
        }
        if ($action == "edit") {
            $data['titulo'] = $this->input->post('titulo');
            $data['url_amigavel'] = $this->input->post('url_amigavel');
            $data['valor'] = $this->input->post('valor');

            $this->db->where('id_estoque', $this->input->post('id_estoque'));
            if ($this->db->update('estoque', $data)) {
                return true;
            }
        }

        if ($action == "delete") {
            echo "Você não poderá remover nenhum dos planos.";
        }
    }

    /* venda */

    public function getVendaManual()
    {
        $this->db->select('
                                c1.*, 
                                c2.nome, 
                                c2.telefone,
                                c3.titulo, 
                                c4.titulo as meiodepagamento
                            ');
        $this->db->join('meiosdepagamento as c4', 'c4.id_meiosdepagamento=c1.id_meiodepagamento', 'LEFT');
        $this->db->join('plano as c3', 'c3.id_plano=c1.id_plano', 'LEFT');
        $this->db->join('cliente as c2', 'c2.id_cliente=c1.id_cliente', 'LEFT');
        $this->db->where('c1.data_criacao BETWEEN CURRENT_DATE()-180 AND CURRENT_DATE() ');
        $this->db->order_by('c1.data_criacao', 'DESC');
        //$this->db->limit(1500);
        $consulta = $this->db->get('venda as c1')->result();

        return $consulta;
    }


    public function getVendaManualInfo($id_venda)
    {
        $this->db->select('
                                c1.*, 
                                c2.nome,
                                c2.telefone, 
                                c3.titulo, 
                                c4.titulo as meiodepagamento
                            ');
        $this->db->join('meiosdepagamento as c4', 'c4.id_meiosdepagamento=c1.id_meiodepagamento', 'LEFT');
        $this->db->join('plano as c3', 'c3.id_plano=c1.id_plano', 'LEFT');
        $this->db->join('cliente as c2', 'c2.id_cliente=c1.id_cliente', 'LEFT');
        $this->db->where('id_venda', $id_venda);
        $this->db->order_by('c1.data_criacao', 'DESC');
        $consulta = $this->db->get('venda as c1')->row();

        return $consulta;
    }



    public function getVenda()
    {
        $this->db->select('c1.*, c2.titulo as id_plano, c3.mensagem_app');
        $this->db->join('plano as c2', 'c2.id_plano=c1.id_plano', 'LEFT');
        $this->db->join('pagamento_retorno as c3', 'c3.status_detail=c1.status_detail', 'LEFT');
        $this->db->order_by('c1.created_at', 'DESC');
        return $this->db->get('pagamento as c1')->result();
    }


    /* Cliente */
    public function getCliente()
    {
        $this->db->order_by('nome', 'ASC');
        $consulta = $this->db->get('cliente')->result();
        foreach ($consulta as &$valor) {
            $this->db->select('c1.data_vencimento, c2.titulo as nome_plano, c1.data_criacao');
            $this->db->join('plano as c2', 'c2.id_plano=c1.id_plano', 'LEFT');
            $this->db->where('c1.id_cliente', $valor->id_cliente);
            $this->db->order_by('c1.id_venda', 'DESC');
            $valor->plano = $this->db->get('venda as c1')->row();
        }

        return $consulta;

        echo "<pre>";
        print_r($consulta);
        die();
    }

    /* Cliente Vendas */
    public function getVendaByCliente($id_cliente)
    {
        $this->db->where('id_cliente', $id_cliente);
        $this->db->order_by('nome', 'ASC');
        $consulta = $this->db->get('cliente')->result();

        foreach ($consulta as &$venda) {
            $this->db->select('venda.*, c2.nome, c2.telefone,  c3.titulo');
            $this->db->join('cliente as c2', 'c2.id_cliente=venda.id_cliente');
            $this->db->join('plano as c3', 'c3.id_plano=venda.id_plano');
            $this->db->where('venda.id_cliente', $id_cliente);
            $this->db->order_by('venda.id_venda', 'DESC');
            $venda->lista_venda = $this->db->get('venda')->result();
        }

        return $consulta;




        // foreach ($consulta as &$valor) {
        //     $this->db->select('c1.data_vencimento, c2.titulo as nome_plano');
        //     $this->db->join('plano as c2', 'c2.id_plano=c1.id_plano', 'LEFT');
        //     $this->db->where('c1.id_cliente', $valor->id_cliente);
        //     $this->db->order_by('c1.id_venda', 'DESC');
        //     $valor->plano = $this->db->get('venda as c1')->result();
        // }

        //return $consulta;

        echo "<pre>";
        print_r($consulta);
        die();
    }

    public function getClienteInfo($id_cliente=null)
    {
        $sql = "SELECT * FROM cliente WHERE id_cliente = ".$this->db->escape(strip_tags((int)$id_cliente));
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }

    public function updateCliente($postData=null, $action=null)
    {
        if ($action == "add") {
            $data['nome'] = $this->input->post('nome');
            $data['cidade'] = $this->input->post('cidade');
            $data['estado'] = $this->input->post('estado');
            $data['telefone'] = $this->input->post('telefone');
            $data['email'] = $this->input->post('email');
            $data['referencia'] = $this->input->post('referencia');

            if ($this->db->insert('cliente', $data)) {
                return true;
            }
        }
        if ($action == "edit") {
            $data['nome'] = $this->input->post('nome');
            $data['cidade'] = $this->input->post('cidade');
            $data['estado'] = $this->input->post('estado');
            $data['telefone'] = $this->input->post('telefone');
            $data['email'] = $this->input->post('email');
            $data['referencia'] = $this->input->post('referencia');

            $this->db->where('id_cliente', $this->input->post('id_cliente'));
            if ($this->db->update('cliente', $data)) {
                return true;
            }
        }

        if ($action == "delete") {
            echo "Você não poderá remover nenhum dos clientes.";
        }
    }


    /* Área de Vendas Manuais */
    public function getMeiodePagamento()
    {
        $this->db->where('ativo', 1);
        $this->db->order_by('titulo', 'ASC');
        return $this->db->get('meiosdepagamento')->result();
    }


    public function updateVenda($postData=null, $action=null)
    {
        if ($action == "add") {


            foreach ($_POST['id_cliente'] as $k=>$item) {
                if ($_POST['id_cliente'][$k] != "") {
                    
                    /* retorna todos os dados do plano escolhido */
                    $plano                           = $this->get_plano($_POST['id_plano'][$k]);
                    
                    /* trazendo valores do post */
                    $venda[$k]                       = array();
                    $valor_pago                      = self::brl2decimal(($plano->valor) ? $plano->valor : 0);
                    $valor_custo                     = self::brl2decimal(($plano->valor_unidade) ? $plano->valor_unidade : 0);
                    
                    /* dados */
                    $venda[$k]['id_meiodepagamento'] = 4;
                    $venda[$k]['id_cliente']         = $_POST['id_cliente'][$k];
                    $venda[$k]['valor_pago']         = $valor_pago;
                    $venda[$k]['valor_custo']        = $valor_custo;
                    $venda[$k]['valor_taxa']         = "0.00";
                    $venda[$k]['liquido']            = $valor_pago - $valor_custo;
                    $venda[$k]['data_criacao']       = date("Y-m-d H:i:s", strtotime($_POST['data_criacao'][$k]));                    
                    $venda[$k]['id_plano']           = $plano->id_plano;                    
                    $venda[$k]['data_vencimento']    = $this->vencimento_plano($plano->id_plano, date("Y-m-d", strtotime($venda[$k]['data_criacao'])));

                }
            }    
            

            if ($venda) {
                $this->db->insert_batch('venda', $venda);
                $this->session->set_flashdata('sucesso', 'Item registrado com sucesso');
                redirect(base_url('venda'));
                return true;
            }

        }



        if ($action == "edit") {

                /* trazendo valores do post */
            $valor_pago  = self::brl2decimal(($this->input->post('valor_pago')) ? $this->input->post('valor_pago') : 0);
            $valor_custo = self::brl2decimal(($this->input->post('valor_custo')) ? $this->input->post('valor_custo') : 0);
            $valor_taxa  = self::brl2decimal(($this->input->post('valor_taxa')) ? $this->input->post('valor_taxa') : 0);

            $data['id_meiodepagamento'] = $this->input->post('id_meiodepagamento');
            $data['id_cliente']         = $this->input->post('id_cliente');
            $data['id_plano']           = $this->input->post('id_plano');
            $data['valor_pago']         = $valor_pago;
            $data['valor_custo']        = $valor_custo;
            $data['valor_taxa']         = $valor_taxa;
            $data['liquido']            = $valor_pago - ($valor_custo + $valor_taxa);
            $data['data_criacao']       = date("Y-m-d H:i:s", strtotime($this->input->post('data_criacao')));

            $data_vencimento = date("Y-m-d", strtotime($this->input->post('data_criacao')));

            /* verificação para próxima data de vencimento */
            switch ($this->input->post('id_plano')) {

                    case 1:
                    $vencimento = date('Y-m-d', strtotime("+30 days", strtotime($data_vencimento)));
                    break;

                    case 2:
                    $vencimento = date('Y-m-d', strtotime('+90 days', strtotime($data_vencimento)));
                    break;

                    case 3:
                    $vencimento = date('Y-m-d', strtotime('+12 months', strtotime($data_vencimento)));
                    break;

                    case 4:
                    $vencimento = date('Y-m-d', strtotime('+30 days', strtotime($data_vencimento)));
                    break;

                    case 5:
                    $vencimento = date('Y-m-d', strtotime('+90 days', strtotime($data_vencimento)));
                    break;

                    case 6:
                    $vencimento = date('Y-m-d', strtotime('+30 days', strtotime($data_vencimento)));
                    break;

                    case 7:
                    $vencimento = date('Y-m-d', strtotime('+12 months', strtotime($data_vencimento)));
                    break;

                    case 8:
                    $vencimento = date('Y-m-d', strtotime('+12 months', strtotime($data_vencimento)));
                    break;

                    case 9:
                    $vencimento = date('Y-m-d');
                    break;

                    case 10:
                    $vencimento = date('Y-m-d', strtotime('+2 months', strtotime($data_vencimento)));
                    break;
                }

            $data['data_vencimento'] = $vencimento." ".date("H:i:s");


            $this->db->where('id_venda', $this->input->post('id_venda'));
            if ($this->db->update('venda', $data)) {
                return true;
            }
        }

        if ($action == "delete") {
            echo "Você não poderá remover nenhuma venda.";
        }
    }


    /* Formatar */
    public function brl2decimal($brl, $casasDecimais = 2)
    {
        // Se já estiver no formato USD, retorna como float e formatado
        if (preg_match('/^\d+\.{1}\d+$/', $brl)) {
            return (float) number_format($brl, $casasDecimais, '.', '');
        }
        // Tira tudo que não for número, ponto ou vírgula
        $brl = preg_replace('/[^\d\.\,]+/', '', $brl);
        // Tira o ponto
        $decimal = str_replace('.', '', $brl);
        // Troca a vírgula por ponto
        $decimal = str_replace(',', '.', $decimal);
        return (float) number_format($decimal, $casasDecimais, '.', '');
    }

    /* get valores plano */
    public function get_plano($id_plano){
        
        if($id_plano == null) return [];

        return $this->db
                    ->select('
                        id_plano,
                        tipo, 
                        pacote, 
                        titulo, 
                        valor, 
                        quantidade, 
                        valor_unidade, 
                        url_amigavel
                    ')
                    ->where('id_plano', $id_plano)
                    ->get('plano')
                    ->row();
    }

    /* vencimento plano */
    public function vencimento_plano($id_plano, $data_vencimento)
    {

            if($id_plano==null) return [];    


            /* verificação para próxima data de vencimento */
            switch ($id_plano) {

                case 1:
                $vencimento = date('Y-m-d', strtotime("+30 days", strtotime($data_vencimento)));
                break;

                case 2:
                $vencimento = date('Y-m-d', strtotime('+90 days', strtotime($data_vencimento)));
                break;

                case 3:
                $vencimento = date('Y-m-d', strtotime('+12 months', strtotime($data_vencimento)));
                break;

                case 4:
                $vencimento = date('Y-m-d', strtotime('+30 days', strtotime($data_vencimento)));
                break;

                case 5:
                $vencimento = date('Y-m-d', strtotime('+90 days', strtotime($data_vencimento)));
                break;

                case 6:
                $vencimento = date('Y-m-d', strtotime('+30 days', strtotime($data_vencimento)));
                break;

                case 7:
                $vencimento = date('Y-m-d', strtotime('+12 months', strtotime($data_vencimento)));
                break;

                case 8:
                $vencimento = date('Y-m-d', strtotime('+12 months', strtotime($data_vencimento)));
                break;

                case 9:
                $vencimento = date('Y-m-d');
                break;

                case 10:
                $vencimento = date('Y-m-d', strtotime('+2 months', strtotime($data_vencimento)));
                break;

            }

            return $vencimento." ".date("H:i:s");

    }


    /* Vendas Pendentes do Mês Atual */
    public function vendas_pendentes_mes_atual(){

        $mes_atual = date("Y-m");

        $vencimentos_atual = $this->db
                                        ->where("DATE_FORMAT(data_vencimento,'%Y-%m')", $mes_atual)
                                        ->get('venda')
                                        ->result();

                                        $renovados = [];

                                        foreach($vencimentos_atual as $vcto)
                                        {
                                            $renovados = $this->db
                                                                    ->where('id_plano', $vcto->id_plano)
                                                                    ->where('id_cliente', $vcto->id_cliente)
                                                                    ->get('venda')
                                                                    ->result();
                                        }

        echo "<pre>";
        print_r($renovados);
        print_r($vencimentos_atual);
        echo $mes_atual;
        echo "</pre>";
        die();


    }
}
