<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>



            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Minha área de Trabalho</li>
            </ol>

            <!-- Icon Cards -->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card card-inverse card-primary o-hidden h-100">
                        <div class="card-block">
                            <div class="card-block-icon">
                                <i class="fa fa-fw fa-comments"></i>
                            </div>
                            <div class="m4-5">
                                <h3><b>Total Bruto</b></h3>
                            </div>
                            <div class="mr-5">
                                R$ <?=number_format($total_bruto, 2, ',', '.');?>
                            </div>
                        </div>
                        <a href="#" class="card-footer clearfix small z-1">
                            <span class="float-left">Total do mês <?=date("m")."/".date("Y");?></span>
                            <span class="float-right"><i class="fa fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card card-inverse card-success o-hidden h-100">
                        <div class="card-block">
                            <div class="card-block-icon">
                                <i class="fa fa-fw fa-comments"></i>
                            </div>
                            <div class="m4-5">
                                <h3><b>Total Líquido</b></h3>
                            </div>
                            <div class="mr-5">
                                R$ <?=number_format($total_liquido, 2, ',', '.');?>
                            </div>
                        </div>
                        <a href="#" class="card-footer clearfix small z-1">
                            <span class="float-left">Total do mês <?=date("m")."/".date("Y");?></span>
                            <span class="float-right"><i class="fa fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card card-inverse card-warning o-hidden h-100">
                        <div class="card-block">
                            <div class="card-block-icon">
                                <i class="fa fa-fw fa-shopping-cart"></i>
                            </div>
                            <div class="m4-5">
                                <h3><b>Planos a Vencer</b></h3>
                            </div>
                            <div class="mr-5">
                                -
                            </div>
                        </div>
                        <a href="#" class="card-footer clearfix small z-1">
                            <span class="float-left">Total do mês <?=date("m")."/".date("Y");?></span>
                            <span class="float-right"><i class="fa fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card card-inverse card-danger o-hidden h-100">
                        <div class="card-block">
                            <div class="card-block-icon">
                                <i class="fa fa-fw fa-support"></i>
                            </div>
                            <div class="mr-5">
                                13 New Tickets!
                            </div>
                        </div>
                        <a href="#" class="card-footer clearfix small z-1">
                            <span class="float-left">View Details</span>
                            <span class="float-right"><i class="fa fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>

            <?php
                #echo "<pre>";
                #print_r($lista_3_dias);
                #echo "</pre>";
            ?>


            <!-- Example Tables Card -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> <b>Vencimentos nos Próximos 3 dias</b>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <style type="text/css">tr:nth-child(even){ background-color: #f2f2f2 !important; }</style>
                        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nome Completo</th>
                                    <th>Pacote</th>
                                    <th>Data de Compra</th>
                                    <th>Data de Vencimento</th>
                                    <th>Telefone</th>
                                    <th>Referência</th>
                                    <th>#</th>
                                    <th>#</th>                                    
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nome Completo</th>
                                    <th>Pacote</th>
                                    <th>Data de Compra</th>
                                    <th>Data de Vencimento</th>
                                    <th>Telefone</th>
                                    <th>Referência</th>
                                    <th>#</th>
                                    <th>#</th>                                    
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach($lista_3_dias as $valor){ ?>
                                <tr>
                                    <td><?php echo $valor->cliente; ?></td>
                                    <td><?php echo $valor->plano; ?></td>
                                    <td><?php echo date("d/m/Y", strtotime($valor->data_criacao)); ?></td>
                                    <td><?php echo date("d/m/Y", strtotime($valor->data_vencimento)); ?></td>
                                    <td><?php echo $valor->telefone; ?></td>
                                    <td><?php echo $referencias[$valor->referencia]; ?></td>
                                    <td><button id="enviar" data-id_venda="<?php echo $valor->id_venda; ?>" data-id_cliente="<?php echo $valor->id_cliente; ?>" name="enviar[]" class="btn btn-sm btn-warning enviar_aviso">Enviar Aviso</button></td>
                                    <td><input type="checkbox" name="enviado[]" value="<?php echo $valor->id_venda; ?>" class="aviso_enviado"></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>