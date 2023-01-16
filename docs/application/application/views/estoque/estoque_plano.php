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
                    <i class="fa fa-table"></i> Estoque por Plano <a href="<?=base_url()?>estoque/index/add"><button class="btn btn-primary">+</button></a>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Situação</th>
                                    <th>Plano</th>
                                    <th>Código</th>
                                    <th>Valor</th> 
                                    <th>Data</th> 
                                    <th>Cliente</th> 
                                    <th>Meio de Pagamento</th> 
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Situação</th>
                                    <th>Plano</th>
                                    <th>Código</th>
                                    <th>Valor</th> 
                                    <th>Data</th> 
                                    <th>Cliente</th> 
                                    <th>Meio de Pagamento</th> 
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ($result as $v) { ?>
                                <tr>
                                    <td>
                                        <?php
                                            if($v->id_pagamento){
                                                $classe = "btn-default";
                                            } else {
                                                $classe = "btn-warning";
                                            }
                                        ?>
                                        <button 
                                            class="btn btn-sm <?php echo $classe; ?>" 
                                            style="width: 50%"
                                        ><?php echo $v->id_pagamento; ?></button>
                                    </td>
                                    <td><?php echo $v->nome_plano; ?></td>
                                    <td><?php echo $v->codigo; ?></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            <?php } ?> 
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>