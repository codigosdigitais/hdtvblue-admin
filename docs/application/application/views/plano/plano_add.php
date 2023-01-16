<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Breadcrumbs -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item">Bluetv.App</li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>plano/index">Planos</a></li>
    <li class="breadcrumb-item active">Adicionar Plano</li>
</ol>

<form method="POST" action="<?=base_url()?>plano/index">
    <input type="hidden" name="action" value="add"> 
    
    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Título</label>
        <div class="col-10">
            <input class="form-control" type="text" value="" placeholder="" name="titulo">
        </div>
    </div>

    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">URL Amigável</label>
        <div class="col-10">
            <input class="form-control" type="text" value="" placeholder="" name="url_amigavel">
        </div>
    </div>

    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Valor Venda</label>
        <div class="col-10">
            <input class="form-control" type="text" value="" placeholder="" name="valor">
        </div>
    </div>

    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Valor Unidade</label>
        <div class="col-10">
            <input class="form-control" type="text" value="" placeholder="" name="valor_unidade">
        </div>
    </div>

    <div class="form-group row"> 
        <div class="col-10">
            <input type="submit" value="Salvar" class="btn btn-primary">
        </div>
    </div> 


</form>
