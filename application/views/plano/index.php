<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>



            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
                <li class="breadcrumb-item">Bluetv.App</li>
                <li class="breadcrumb-item active">Planos</li>
            </ol>
 

            <!-- Example Tables Card -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Planos <a href="<?=base_url()?>plano/index/add"><button class="btn btn-primary">+</button></a>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Url Amigável</th>
                                    <th>Venda</th>
                                    <th>Unidade</th>
                                    <th>Ações</th> 
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Url Amigável</th>
                                    <th>Venda</th>
                                    <th>Unidade</th>
                                    <th>Ações</th> 
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ($admins as $v) { ?>
                                <tr>
                                    <td><button class="btn btn-sm btn-danger" style="width: 50%"><?php echo $v->id_plano; ?></button></td>
                                    <td><?php echo $v->titulo; ?></td>
                                    <td><?php echo $v->url_amigavel; ?></td>
                                    <td>R$ <?php echo number_format($v->valor, 2, ',', '.'); ?></td>
                                    <td>R$ <?php echo number_format($v->valor_unidade, 2, ',', '.'); ?></td>
                                    <td>
                                        <a href="<?=base_url()?>plano/index/edit/<?php echo $v->id_plano; ?>">
                                            <button class="btn btn-sm btn-info">Editar</button>
                                        </a>

                                        <form method="POST" action="" style="display:inline;">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="<?php echo $v->id_plano; ?>">
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