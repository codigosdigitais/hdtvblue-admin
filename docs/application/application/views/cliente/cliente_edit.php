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
    <li class="breadcrumb-item">Cliente</li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>cliente/index">Editar Cliente</a></li>
    <li class="breadcrumb-item active">Editar</li>
</ol>

<form method="POST" action="">
    <input type="hidden" name="action" value="edit">
    <input type="hidden" name="id_cliente" value="<?php echo $result->id_cliente; ?>">

    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Nome Completo</label>
        <div class="col-10">
            <input class="form-control" type="text" value="<?php echo $result->nome; ?>" placeholder="" name="nome">
        </div>
    </div>

    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Cidade</label>
        <div class="col-10">
            <input class="form-control" type="text" value="<?php echo $result->cidade; ?>" placeholder="" name="cidade">
        </div>
    </div>    

    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Estado</label>
        <div class="col-10">
            <select name="estado" class="form-control select2">
                <option value="AC" <?php if($result->estado=="AC") echo "selected"; ?>>Acre</option>
                <option value="AL" <?php if($result->estado=="AL") echo "selected"; ?>>Alagoas</option>
                <option value="AP" <?php if($result->estado=="AP") echo "selected"; ?>>Amapá</option>
                <option value="AM" <?php if($result->estado=="AM") echo "selected"; ?>>Amazonas</option>
                <option value="BA" <?php if($result->estado=="BA") echo "selected"; ?>>Bahia</option>
                <option value="CE" <?php if($result->estado=="CE") echo "selected"; ?>>Ceará</option>
                <option value="DF" <?php if($result->estado=="DF") echo "selected"; ?>>Distrito Federal</option>
                <option value="ES" <?php if($result->estado=="ES") echo "selected"; ?>>Espírito Santo</option>
                <option value="GO" <?php if($result->estado=="GO") echo "selected"; ?>>Goiás</option>
                <option value="MA" <?php if($result->estado=="MA") echo "selected"; ?>>Maranhão</option>
                <option value="MT" <?php if($result->estado=="MT") echo "selected"; ?>>Mato Grosso</option>
                <option value="MS" <?php if($result->estado=="MS") echo "selected"; ?>>Mato Grosso do Sul</option>
                <option value="MG" <?php if($result->estado=="MG") echo "selected"; ?>>Minas Gerais</option>
                <option value="PA" <?php if($result->estado=="PA") echo "selected"; ?>>Pará</option>
                <option value="PB" <?php if($result->estado=="PB") echo "selected"; ?>>Paraíba</option>
                <option value="PR" <?php if($result->estado=="PR") echo "selected"; ?>>Paraná</option>
                <option value="PE" <?php if($result->estado=="PE") echo "selected"; ?>>Pernambuco</option>
                <option value="PI" <?php if($result->estado=="PI") echo "selected"; ?>>Piauí</option>
                <option value="RJ" <?php if($result->estado=="RJ") echo "selected"; ?>>Rio de Janeiro</option>
                <option value="RN" <?php if($result->estado=="RN") echo "selected"; ?>>Rio Grande do Norte</option>
                <option value="RS" <?php if($result->estado=="RS") echo "selected"; ?>>Rio Grande do Sul</option>
                <option value="RO" <?php if($result->estado=="RO") echo "selected"; ?>>Rondônia</option>
                <option value="RR" <?php if($result->estado=="RR") echo "selected"; ?>>Roraima</option>
                <option value="SC" <?php if($result->estado=="SC") echo "selected"; ?>>Santa Catarina</option>
                <option value="SP" <?php if($result->estado=="SP") echo "selected"; ?>>São Paulo</option>
                <option value="SE" <?php if($result->estado=="SE") echo "selected"; ?>>Sergipe</option>
                <option value="TO" <?php if($result->estado=="TO") echo "selected"; ?>>Tocantins</option>
            </select>
        </div>
    </div>     

    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">E-mail</label>
        <div class="col-10">
            <input class="form-control" type="email" value="<?php echo $result->email; ?>" placeholder="" name="email">
        </div>
    </div>

    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Telefone</label>
        <div class="col-10">
            <input class="form-control" type="text" value="<?php echo $result->telefone; ?>" placeholder="" name="telefone" id="telefone">
        </div>
    </div>    
    
    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Referência</label>
        <div class="col-10">
            <select class="form-control" name="referencia">
                <?php foreach($referencias as $valor=>$key){ ?>
                <option value="<?php echo $valor; ?>" <?php if($valor==$result->referencia) echo "selected"; ?> ><?php echo $key; ?></option>
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