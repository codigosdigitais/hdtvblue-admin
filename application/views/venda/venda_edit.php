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
    <li class="breadcrumb-item">Venda</li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>estoque/index">Editar Venda</a></li>
    <li class="breadcrumb-item active">Editar</li>
</ol>

<form method="POST" action="">
    <input type="hidden" name="action" value="edit">
    <input type="hidden" name="id_venda" value="<?php echo $result->id_venda; ?>">


    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Cliente</label>
        <div class="col-10">
            <select class="form-control select2" id="id_cliente" name="id_cliente" data-placeholder="Pesquisar Cliente" required="required">
                <option></option>
                <?php foreach($clientes as $valor){ ?>
                <option value="<?php echo $valor->id_cliente; ?>" <?php if($result->id_cliente==$valor->id_cliente) echo "selected='selected'"; ?>><?php echo $valor->nome; ?> - <?php echo $valor->telefone; ?> - <?php echo $valor->email; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Pacote</label>
        <div class="col-10">
            <select class="form-control select2" id="id_plano" name="id_plano" data-placeholder="Selecionar Plano" required="required">
                <option></option>
                <?php foreach($planos as $valor){ ?>
                <option value="<?php echo $valor->id_plano; ?>" <?php if($result->id_plano==$valor->id_plano) echo "selected='selected'"; ?>><?php echo $valor->titulo; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="example-text-input" class="col-lg-2 col-md-12 col-sm-12 col-form-label">Valor Pago</label>
        <div class="col-lg-2 col-md-12 col-sm-12 ">
            <input class="form-control valor" type="text" value="<?php echo $result->valor_pago; ?>" placeholder="0.00" name="valor_pago" id="valor_pago" data-thousands="." data-decimal="," required="required">
        </div>

        <label for="valor_custo" class="col-lg-2 col-md-12 col-sm-12 col-form-label">Valor de Custo</label>
        <div class="col-lg-2 col-md-12 col-sm-12 ">
            <input class="form-control valor" type="text" value="<?php echo $result->valor_custo; ?>" placeholder="0.00" name="valor_custo" id="valor_custo" data-thousands="." data-decimal="," required="required">
        </div>

        <label for="valor_taxa" class="col-lg-2 col-md-12 col-sm-12 col-form-label">Taxa Risco</label>
        <div class="col-lg-2 col-md-12 col-sm-12 ">
            <input class="form-control valor" type="text" value="<?php echo $result->valor_taxa; ?>" placeholder="0.00" name="valor_taxa" id="valor_taxa" data-thousands="." data-decimal="," onkeyup="calcularLucroPelaTaxa()" />
        </div>

    </div>

    <div class="form-group row">
        <label for="liquido" class="col-lg-2 col-md-12 col-sm-12 col-form-label">Líquido</label>
        <div class="col-lg-2 col-md-12 col-sm-12">
            <input class="form-control valor" type="text" value="<?php echo $result->liquido; ?>" placeholder="0.00" name="liquido" id="liquido" data-thousands="." data-decimal="," required="required" />
        </div>        

        <label for="id_meiodepagamento" class="col-lg-2 col-md-12 col-sm-12 col-form-label">Pago Por</label>
        <div class="col-lg-2 col-md-12 col-sm-12 ">
            <select class="form-control select2" id="id_meiodepagamento" name="id_meiodepagamento" data-placeholder="Meio de Pagamento" required="required">
                <option></option>
                <?php foreach($meiosdepagamento as $valor){ ?>
                <option value="<?php echo $valor->id_meiosdepagamento; ?>" <?php if($result->id_meiodepagamento==$valor->id_meiosdepagamento) echo "selected='selected'"; ?>><?php echo $valor->titulo; ?></option>
                <?php } ?>
            </select>
        </div>

        <label for="liquido" class="col-lg-2 col-md-12 col-sm-12  col-form-label">Data da Venda</label>
        <div class="col-lg-2 col-md-12 col-sm-12 ">
            <?php

                $date = new DateTime($result->data_criacao);
                $dataInput =  $date->format('Y-m-d\TH:i:s');               
            ?>
            <input class="form-control"  
                   type="datetime-local" id="data_criacao"
                   name="data_criacao" value="<?php echo $dataInput; ?>"  required="required"
                   >
        </div>

    </div>    


    

    <div class="form-group row"> 
        <div class="col-10">
            <input type="submit" value="Salvar" class="btn btn-primary">
        </div>
    </div> 
</form>