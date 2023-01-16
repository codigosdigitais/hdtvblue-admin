<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Breadcrumbs -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item">Bluetv.App</li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>cliente/index">Clientes</a></li>
    <li class="breadcrumb-item active">Adicionar Cliente</li>
</ol>

<form method="POST" action="<?=base_url()?>cliente/index">
    <input type="hidden" name="action" value="add"> 
    
    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Nome Completo</label>
        <div class="col-10">
            <input class="form-control" type="text" value="" placeholder="" name="nome" autofocus>
        </div>
    </div>

    

    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Telefone</label>
        <div class="col-10">
            <input class="form-control" type="text" value="" placeholder="" name="telefone" id="telefone">
        </div>
    </div>

    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Referência</label>
        <div class="col-10">
            
            <select class="form-control select2" name="referencia">
                <?php foreach($this->config->item('referencias') as $valor=>$key){ ?>
                <option value="<?php echo $valor; ?>" <?php if($valor==1) echo "selected='selected'"; ?>><?php echo $key; ?></option>
                <?php } ?>
            </select>
            
        </div>
    </div>

    <div class="form-group row"> 
        <div class="col-10">
            <input type="submit" value="Salvar" class="btn btn-primary">
        </div>
    </div> 

</form>

<!-- Inputs Masked -->
<script src="<?=base_url()?>resources/vendor/jquery/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="<?=base_url()?>resources/js/sb-admin-inputs.js"></script>