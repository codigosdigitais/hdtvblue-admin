<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>
            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
                <li class="breadcrumb-item">Bluetv.App</li>
                <li class="breadcrumb-item active">Estoque</li>
            </ol>
 

            <!-- Example Tables Card -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Estoque <a href="<?=base_url()?>estoque/index/add"><button class="btn btn-primary">+</button></a>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID Plano</th>
                                    <th>Plano</th>
                                    <th>Em Estoque</th>
                                    <th>Data de Inclusão</th>
                                    <th>Ações</th> 
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Plano</th>
                                    <th>Em Estoque</th>
                                    <th>Data de Inclusão</th>
                                    <th>Ações</th> 
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ($admins as $v) { ?>
                                <tr>
                                    <td><button class="btn btn-sm btn-danger" style="width: 50%"><?php echo $v->id_plano; ?></button></td>
                                    <td><?php echo $v->titulo; ?></td>
                                    <td><?php echo $v->total_estoque; ?></td>
                                    <td><?php echo date("d/m/Y H:i", strtotime($v->data_inclusao)); ?></td>
                                    <td>
                                        <a href="<?=base_url()?>estoque/index/visualizar/<?php echo $v->id_plano; ?>">
                                            <button class="btn btn-sm btn-info">Visualizar Estoque</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?> 
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>