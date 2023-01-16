<?php
defined('BASEPATH') 
    OR exit('No direct script access allowed');

//echo "<pre>";
//print_r($result);
//die();


//$result = $result[0];
?>
<!-- Breadcrumbs -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item">estoque</li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>estoque/index">Editar estoques</a></li>
    <li class="breadcrumb-item active">Editar</li>
</ol>

<form method="POST" action="">
    <input type="hidden" name="action" value="edit">
    <input type="hidden" name="id_estoque" value="<?php echo $result->id_estoque; ?>">

    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Título</label>
        <div class="col-10">
            <input class="form-control" type="text" value="<?php echo $result->titulo; ?>" placeholder="" name="titulo">
        </div>
    </div>

    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">URL Amigável</label>
        <div class="col-10">
            <input class="form-control" type="text" value="<?php echo $result->url_amigavel; ?>" placeholder="" name="url_amigavel">
        </div>
    </div>

    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Valor</label>
        <div class="col-10">
            <input class="form-control" type="text" value="<?php echo $result->valor; ?>" placeholder="" name="valor">
        </div>
    </div>    
    

    <div class="form-group row"> 
        <div class="col-10">
            <input type="submit" value="Salvar" class="btn btn-primary">
        </div>
    </div> 
</form>