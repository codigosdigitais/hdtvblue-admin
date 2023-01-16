<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>



            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Relatórios</a></li>
                <li class="breadcrumb-item active">Busque a melhor opção</li>
            </ol>

            <!-- Icon Cards -->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card card-inverse card-primary o-hidden h-100">
                        <div class="card-block">
                            <div class="card-block-icon">
                                <i class="fa fa-fw fa-users"></i>
                            </div>
                            <div class="m4-5">
                                <h3><b>Total de Clientes</b></h3>
                            </div>
                            <div class="mr-5">
                                <p><b><?php echo $total_clientes; ?></b> cadastrados</p>
                            </div>
                        </div>
                        <a href="<?php echo base_url('cliente'); ?>" class="card-footer clearfix small z-1">
                            <span class="float-left">Todos os Clientes</span>
                            <span class="float-right"><i class="fa fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card card-inverse card-success o-hidden h-100">
                        <div class="card-block">
                            <div class="card-block-icon">
                                <i class="fa fa-fw fa-money"></i>
                            </div>
                            <div class="m4-5">
                                <h3><b>Pendentes Mês Atual</b></h3>
                            </div>
                            <div class="mr-5">
                                <p>R$ 0,00</p>
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
                                <i class="fa fa-fw fa-calendar"></i>
                            </div>
                            <div class="m4-5">
                                <h3><b>Previsto Próximo Mês</b></h3>
                            </div>
                            <div class="mr-5">
                                <p>R$ 0,00</p>
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
                                <i class="fa fa-fw fa-smile-o"></i>
                            </div>
                            <div class="mr-5">
                                Clientes Recorrentes
                            </div>
                        </div>
                        <a href="#" class="card-footer clearfix small z-1">
                            <span class="float-left">Listar todos</span>
                            <span class="float-right"><i class="fa fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>

