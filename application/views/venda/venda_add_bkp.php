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
        <div class="col-10">
            <select class="form-control select2" id="id_cliente" name="id_cliente" data-placeholder="Pesquisar Cliente"
                required="required">
                <option></option>
                <?php foreach ($clientes as $valor) { ?>
                <option value="<?php echo $valor->id_cliente; ?>">
                    <?php echo $valor->nome; ?> - <?php echo $valor->telefone; ?> - <?php echo $valor->email; ?>
                </option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Pacote</label>
        <div class="col-10">
            <select class="form-control select2" id="id_plano" name="id_plano" data-placeholder="Selecionar Plano"
                required="required">
                <option></option>
                <?php foreach ($planos as $valor) { ?>
                <option value="<?php echo $valor->id_plano; ?>">
                    <?php echo $valor->titulo; ?>
                </option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="example-text-input" class="col-lg-2 col-md-12 col-sm-12 col-form-label">Valor Pago</label>
        <div class="col-lg-2 col-md-12 col-sm-12 ">
            <input class="form-control valor" type="text" value="" placeholder="0.00" name="valor_pago" id="valor_pago"
                data-thousands="." data-decimal="," required="required">
        </div>

        <label for="valor_custo" class="col-lg-2 col-md-12 col-sm-12 col-form-label">Valor de Custo</label>
        <div class="col-lg-2 col-md-12 col-sm-12 ">
            <input class="form-control valor" type="text" value="" placeholder="0.00" name="valor_custo"
                id="valor_custo" data-thousands="." data-decimal="," required="required">
        </div>

        <label for="valor_taxa" class="col-lg-2 col-md-12 col-sm-12 col-form-label">Taxa Risco</label>
        <div class="col-lg-2 col-md-12 col-sm-12 ">
            <input class="form-control valor" type="text" value="" placeholder="0.00" name="valor_taxa" id="valor_taxa"
                data-thousands="." data-decimal="," onkeyup="calcularLucroPelaTaxa()" />
        </div>

    </div>

    <div class="form-group row">
        <label for="liquido" class="col-lg-2 col-md-12 col-sm-12 col-form-label">Líquido</label>
        <div class="col-lg-2 col-md-12 col-sm-12">
            <input class="form-control valor" type="text" value="" placeholder="0.00" name="liquido" id="liquido"
                data-thousands="." data-decimal="," required="required" />
        </div>

        <label for="id_meiodepagamento" class="col-lg-2 col-md-12 col-sm-12 col-form-label">Pago Por</label>
        <div class="col-lg-2 col-md-12 col-sm-12 ">
            <select class="form-control select2" id="id_meiodepagamento" name="id_meiodepagamento"
                data-placeholder="Meio de Pagamento" required="required">
                <option></option>
                <?php foreach ($meiosdepagamento as $valor) { ?>
                <option
                    value="<?php echo $valor->id_meiosdepagamento; ?>">
                    <?php echo $valor->titulo; ?>
                </option>
                <?php } ?>
            </select>
        </div>

        <label for="liquido" class="col-lg-2 col-md-12 col-sm-12  col-form-label">Data da Venda</label>
        <div class="col-lg-2 col-md-12 col-sm-12 ">
            <input class="form-control" type="datetime-local" id="data_criacao" name="data_criacao"
                value="<?php echo date("d/m/Y H:i"); ?>"
                required="required">
        </div>

    </div>

    <hr>
    <div class="form-group row box_codigo">
        <label for="codigo_recarga" class="col-2 col-form-label">Código</label>
        <div class="col-lg-2 col-md-12 col-sm-12">
            <select class="form-control" name="tipo[]" id="tipo[]" required="required">
                <option value="1">Blue TV Mensal</option>
                <option value="2">Blue TV Anual</option>
                <option value="3">My Family Cinema Mensal</option>
                <option value="4">My Family Cinema Anual</option>
            </select>
        </div>
        <div class="col-lg-2 col-md-11 col-sm-11 ">
            <input type="text" class="form-control" name="codigo[]" id="codigo[]" placeholder="Código de Recarga"
                required="required">
        </div>
        <div class="col-lg-2 col-md-1 col-sm-1">
            <button class="btn btn-info clonador" type="button"><i class="fa fa-plus"></i></button>
        </div>
    </div>

    <div id="lista_codigos"></div>
    <hr>

    <div class="form-group row">
        <div class="col-10">
            <input type="submit" value="Salvar" class="btn btn-primary">
        </div>
    </div>
</form>

<!-- Template para Duplicar -->
<div id="salvar_codigo" class="box_codigo hide">
    <div class="form-group row codigo_linha">
        <label for="codigo_recarga" class="col-lg-2 col-md-12 col-sm-12  col-form-label">Código</label>
        <div class="col-lg-2 col-md-12 col-sm-12 ">
            <select class="form-control" name="tipo[]" id="tipo[]">
                <option value="1">Blue TV Mensal</option>
                <option value="2">Blue TV Anual</option>
                <option value="3">My Family Cinema Mensal</option>
                <option value="4">My Family Cinema Anual</option>
            </select>
        </div>
        <div class="col-lg-2 col-md-12 col-sm-12 ">
            <input type="text" class="form-control" name="codigo[]" id="codigo[]" placeholder="Código de Recarga">
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1">
            <button class="btn btn-warning btn_remove" type="button"><i class="fa fa-minus"></i></button>
        </div>
    </div>
</div>

<script>
    /* Calcular Lucro pela Taxa de Venda */
    function calcularLucroPelaTaxa() {
        var valor_custo = $("#valor_custo").val().replace(',', '.');
        var valor_pago = $("#valor_pago").val().replace(',', '.');
        var valor_liquido = $("#liquido").val().replace(',', '.');
        var valor_taxa = $("#valor_taxa").val().replace(',', '.');

        var bruto = (valor_pago - valor_custo)

        console.log('bruto: ', bruto);
        console.log('valor taxa: ', valor_taxa)
        console.log('valor liquido: ', valor_liquido)
        console.log('valor pago: ', valor_pago)
        console.log('valor custo: ', valor_custo)

        var liquido = (bruto - valor_taxa)

        $("#liquido").val(liquido.toFixed(2));
        console.log('Líquido com taxa', liquido)
    }
</script>