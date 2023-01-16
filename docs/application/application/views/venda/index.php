<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>
            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
                <li class="breadcrumb-item">Bluetv.App</li>
                <li class="breadcrumb-item active">Venda</li>
            </ol>
 

            <!-- Example Tables Card -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Registro de Vendas
                </div>
                <div class="card-header">
                    <a href="<?=base_url()?>venda/index/add"><button class="btn btn-primary">Registrar Venda Manual</button></a>
                    <a href="<?=base_url()?>venda/index/search"><button class="btn btn-warning">Pesquisar Venda</button></a>
                    <a href="<?=base_url()?>cliente/index/add"><button class="btn btn-danger">Novo Cliente</button></a>
                </div>                
                <div class="card-block">
                    <div class="">
                        <?php if($this->session->flashdata('sucesso')) echo $this->session->flashdata('sucesso'); ?>
                    </div>
                    <div class="table-responsive">
                        <style type="text/css">tr:nth-child(even){ background-color: #f2f2f2 !important; }</style>
                        <table class="table table-bordered stripe" width="100%" id="listagem_venda" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Telefone</th>
                                    <th>Plano</th>
                                    <th>Venda</th>
                                    <th>Custo</th>                                    
                                    <th>Lucro</th>
                                    <th>Data</th>
                                    <th>Vencimento</th> 
                                    <th>#</th> 
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Telefone</th>
                                    <th>Plano</th>
                                    <th>Venda</th>
                                    <th>Custo</th>
                                    <th>Lucro</th>
                                    <th>Data</th>
                                    <th>Vencimento</th>
                                    <th>#</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ($venda as $v) { ?>
                                <tr>
                                    <td><?php echo $v->nome; ?></td>
                                    <td><?php echo $v->telefone; ?></td>
                                    <td><?php echo $v->titulo; ?></td>
                                    <td>R$ <?php echo number_format($v->valor_pago, 2, ',', '.'); ?></td>
                                    <td>R$ <?php echo number_format($v->valor_custo, 2, ',', '.'); ?></td>
                                    <td><button class="btn btn-sm btn-danger"><b>R$ <?php echo number_format($v->liquido, 2, ',', '.'); ?></b></button></td>
                                    <td><?php echo date("d/m/Y H:i", strtotime($v->data_criacao)); ?></td>
                                    <td>
                                        <B><?php echo date("d/m/Y H:i", strtotime($v->data_vencimento)); ?></B>
                                    </td>
                                    <td>
                                        <a href="<?=base_url()?>venda/index/edit/<?php echo $v->id_venda; ?>">
                                            <button class="btn btn-sm btn-info">Editar</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?> 
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>