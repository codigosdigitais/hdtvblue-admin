<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Breadcrumbs -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item">Bluetv.App</li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>estoque/index">Estoque</a></li>
    <li class="breadcrumb-item active">Adicionar Estoque</li>
</ol>

<form method="POST" action="<?=base_url()?>estoque/index">
    <input type="hidden" name="action" value="add"> 
    
    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Pacote</label>
        <div class="col-10">
            <select class="form-control select2" id="id_plano" name="id_plano">
                <?php foreach($planos as $valor){ ?>
                <option value="<?php echo $valor->id_plano; ?>"><?php echo $valor->titulo; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Valor Pago</label>
        <div class="col-2">
            <input class="form-control valor" type="text" value="" placeholder="0.00" name="valor_pago">
        </div>

        <label for="example-text-input" class="col-1 col-form-label">Site</label>
        <div class="col-7">

            <select class="form-control select2" name="referencia">
                <?php foreach($this->config->item('referencias') as $valor=>$key){ ?>
                <option value="<?php echo $valor; ?>"><?php echo $key; ?></option>
                <?php } ?>
            </select>

            
        </div>

    </div>

    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Lista</label>
        <div class="col-10">
            <textarea name="lista_codigo" class="form-control" rows="15"></textarea>
        </div>
    </div>    


    <div class="form-group row"> 
        <div class="col-10">
            <input type="submit" value="Salvar" class="btn btn-primary">
        </div>
    </div> 


</form>
