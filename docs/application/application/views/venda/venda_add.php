<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!-- Breadcrumbs -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a
            href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item">Bluetv.App</li>
    <li class="breadcrumb-item"><a
            href="<?=base_url()?>venda/index">Venda Manual</a></li>
    <li class="breadcrumb-item active">Registro de Venda Manual</li>
</ol>

<style type="text/css">
    .hide {
        display: none;
    }
</style>

<form method="POST" action="<?=base_url()?>venda/index">
    <input type="hidden" name="action" value="add">

    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Cliente</label>
        <div class="col-4">
            <select class="form-control select2" id="id_cliente[]" name="id_cliente[]" data-placeholder="Pesquisar Cliente"
                required="required">
                <option></option>
                <?php foreach ($clientes as $valor) { ?>
                <option value="<?php echo $valor->id_cliente; ?>">
                    <?php echo $valor->nome; ?> - <?php echo $valor->telefone; ?> - <?php echo $valor->email; ?>
                </option>
                <?php } ?>
            </select>
        </div>

        <div class="col-3">
            <select class="form-control select2" id="id_plano[]" name="id_plano[]" data-placeholder="Selecionar Plano"
                required="required">
                <option></option>
                <?php foreach ($planos as $valor) { ?>
                <option value="<?php echo $valor->id_plano; ?>">
                    <?php echo $valor->titulo; ?>
                </option>
                <?php } ?>
            </select>
        </div>  
               
        <div class="col-lg-2 col-md-12 col-sm-12 ">
            <input class="form-control" type="datetime-local" id="data_criacao[]" name="data_criacao[]"
                value="<?php echo date("Y-m-d H:i"); ?>"
                required="required">
        </div>

        <div class="col-lg-1 col-md-12 col-sm-12 ">
            <button class="btn btn-danger clonador" type="button"><i class="fa fa-plus"></i></button>
        </div>
    </div>

    <div id="lista_vendas"></div>

    <div class="form-group row">
        <div class="col-10">
            <input type="submit" value="Salvar" class="btn btn-primary">
        </div>
    </div>
</form>


<!-- Template para Duplicar -->
<div id="savar_venda" class="box_venda hide">
    <div class="form-group row venda_linha">
        <label for="example-text-input" class="col-2 col-form-label">Cliente</label>
        <div class="col-4">
            <select class="form-control" id="id_cliente[]" name="id_cliente[]" data-placeholder="Pesquisar Cliente">
                <option></option>
                <?php foreach ($clientes as $valor) { ?>
                <option value="<?php echo $valor->id_cliente; ?>">
                    <?php echo $valor->nome; ?> - <?php echo $valor->telefone; ?> - <?php echo $valor->email; ?>
                </option>
                <?php } ?>
            </select>
        </div>

        <div class="col-3">
            <select class="form-control" id="id_plano[]" name="id_plano[]" data-placeholder="Selecionar Plano">
                <option></option>
                <?php foreach ($planos as $valor) { ?>
                <option value="<?php echo $valor->id_plano; ?>">
                    <?php echo $valor->titulo; ?>
                </option>
                <?php } ?>
            </select>
        </div>  
               
        <div class="col-lg-2 col-md-12 col-sm-12 ">
            <input class="form-control" type="datetime-local" id="data_criacao[]" name="data_criacao[]"
                value="<?php echo date("Y-m-d H:i"); ?>">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1">
            <button class="btn btn-warning btn_remove" type="button"><i class="fa fa-minus"></i></button>
        </div>
    </div>
</div>


