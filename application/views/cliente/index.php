<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>



<!-- Breadcrumbs -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a
            href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item">Bluetv.App</li>
    <li class="breadcrumb-item active">Clientes</li>
</ol>


<!-- Example Tables Card -->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Novo Cliente <a
            href="<?=base_url()?>cliente/index/add"><button
                class="btn btn-primary">+</button></a>
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
                        <th>Data Venda</th>
                        <th>Vencimento</th>
                        <th>Plano</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nome Completo</th>
                        <th>Telefone</th>
                        <th>Data Venda</th>
                        <th>Vencimento</th>
                        <th>Plano</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($admins as $v) { ?>
                    <tr>
                        <td><button class="btn btn-sm btn-danger" style="width: 50%"><?php echo $v->id_cliente; ?></button></td>
                        <td><?php echo $v->nome; ?>
                        </td>
                        <td>
                            <a href="https://wa.me/55<?php echo preg_replace('/[^0-9]/', '', $v->telefone); ?>?text=Olá" target="_blank">
                                <?php echo $v->telefone; ?>
                            </a>
                        </td>
                       
                        <td><?php if (isset($v->plano)) { ?><button
                                class="btn btn-sm btn-danger"><?php echo date("d/m/Y", strtotime($v->plano->data_criacao)); ?></button><?php } else {
    echo "-";
} ?>
                        </td>
                        <td><?php if (isset($v->plano)) { ?><button
                                class="btn btn-sm btn-success"><?php echo date("d/m/Y", strtotime($v->plano->data_vencimento)); ?></button><?php } else {
    echo "-";
} ?>
                        </td>
                        <td><?php if (isset($v->plano)) { ?><button
                                class="btn btn-sm btn-success"><?php echo $v->plano->nome_plano; ?></button><?php } else {
    echo "-";
} ?>
                        </td>
                        <td>

                            <a
                                href="<?=base_url()?>cliente/index/venda/<?php echo $v->id_cliente; ?>">
                                <button class="btn btn-sm btn-primary">Vendas</button>
                            </a>

                            <a
                                href="<?=base_url()?>cliente/index/edit/<?php echo $v->id_cliente; ?>">
                                <button class="btn btn-sm btn-info">Editar</button>
                            </a>

                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id"
                                    value="<?php echo $v->id_cliente; ?>">
                                <input type="submit" class="btn btn-sm btn-warning" value="Excluir">
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>