<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bluetv.App - Administrador</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>resources/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?=base_url()?>resources/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="<?=base_url()?>resources/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>resources/css/sb-admin.css" rel="stylesheet">

    <link href="<?=base_url()?>resources/vendor/select2/css/select2.css" rel="stylesheet"/>

    

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar static-top navbar-toggleable-md navbar-inverse bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">BLUETV.APP</a>
        <div class="collapse navbar-collapse" id="navbarExample">
            <ul class="sidebar-nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>


                <li class="nav-item active">
                    <a 
                    class="nav-link nav-link-collapse" 
                    data-toggle="collapse" 
                    href="#MenuBlueTV"
                    >
                    <i class="fa fa-fw fa-desktop"></i> Blue Tv</a>
                    <ul class="sidebar-second-level collapse show" id="MenuBlueTV">
                        <li><a href="<?=base_url()?>cliente"><i class="fa fa-fw fa-minus"></i> Clientes</a></li>
                        <li><a href="<?=base_url()?>venda"><i class="fa fa-fw fa-minus"></i> Vendas</a></li>
                        <li><a href="<?=base_url()?>compra"><i class="fa fa-fw fa-minus"></i> Compras</a></li>
                        <li><a href="<?=base_url()?>relatorio"><i class="fa fa-fw fa-minus"></i> Relatórios</a></li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a 
                    class="nav-link nav-link-collapse" 
                    data-toggle="collapse" 
                    href="#MenuConfiguracoes">
                    <i class="fa fa-fw fa-wrench"></i> Configurações</a>
                    <ul class="sidebar-second-level collapse" id="MenuConfiguracoes">
                        <li><a href="<?=base_url()?>plano"><i class="fa fa-fw fa-minus"></i> Planos</a></li> 
                        <li><a href="<?=base_url()?>estoque"><i class="fa fa-fw fa-minus"></i> Estoque</a></li> 
                        <li><a href="<?=base_url()?>settings/groups"><i class="fa fa-fw fa-minus"></i> Grupos</a></li> 
                        <li><a href="<?=base_url()?>settings/admins"><i class="fa fa-fw fa-minus"></i> Usuários</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>"><i class="fa fa-fw fa-sign-out"></i> Sair do Sistema</a>
                </li>

            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>logout"><i class="fa fa-fw fa-sign-out"></i> Sair do Sistema</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content-wrapper py-3">

        <div class="container-fluid">

        