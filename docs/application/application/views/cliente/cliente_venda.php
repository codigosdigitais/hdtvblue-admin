<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>

<!-- Breadcrumbs -->

<ol class="breadcrumb">

    <li class="breadcrumb-item"><a
            href="<?=base_url()?>">Dashboard</a></li>

    <li class="breadcrumb-item">Bluetv.App</li>

    <li class="breadcrumb-item active">Venda Por Cliente</li>

</ol>





<!-- Example Tables Card -->

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Registro de Vendas por Cliente
    </div>

    <div class="card-header">

        <a href="<?=base_url()?>venda/index/add"><button
                class="btn btn-primary">Registrar Venda Manual</button></a>

        <a href="<?=base_url()?>cliente/index/add"><button
                class="btn btn-danger">Novo Cliente</button></a>

    </div>

    <div class="card-block">
        <div class="table-responsive">
            <style type="text/css">
                tr:nth-child(even) {
                    background-color: #f2f2f2 !important;
                }
            </style>


            <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome Completo</th>
                        <th>Telefone</th>
                        <th>Próximo Vencimento</th>
                        <th>Plano</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nome Completo</th>
                        <th>Telefone</th>
                        <th>Próximo Vencimento</th>
                        <th>Plano</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($venda[0]->lista_venda as $v) { ?>
                    <tr>
                        <td><button class="btn btn-sm btn-danger" style="width: 50%"><?php echo $v->id_venda; ?></button></td>
                        <td><?php echo $v->nome; ?>
                        </td>
                        <td><?php echo $v->telefone; ?>
                        </td>

                        <td><?php if (isset($v->data_vencimento)) { ?><button
                                class="btn btn-sm btn-success"><?php echo date("d/m/Y H:i:s", strtotime($v->data_vencimento)); ?></button><?php } else {
    echo "-";
} ?>
                        </td>
                        <td><?php if (isset($v->titulo)) { ?><button
                                class="btn btn-sm btn-success"><?php echo $v->titulo; ?></button><?php } else {
    echo "-";
} ?>
                        </td>
                        <td>


                            <button id="enviar"
                                data-id_venda="<?php echo $v->id_venda; ?>"
                                data-id_cliente="<?php echo $v->id_cliente; ?>"
                                name="enviar[]" class="btn btn-sm btn-warning enviar_aviso">Enviar Aviso</button>

                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>

    </div>

</div>