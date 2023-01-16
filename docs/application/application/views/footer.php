<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

</div>
        <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>

    <!-- Bootstrap core JavaScript -->
    <script src="<?=base_url()?>resources/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>resources/vendor/tether/tether.min.js"></script>
    <script src="<?=base_url()?>resources/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?=base_url()?>resources/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?=base_url()?>resources/vendor/chart.js/Chart.min.js"></script>
    <script src="<?=base_url()?>resources/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?=base_url()?>resources/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?=base_url()?>resources/js/sb-admin.min.js"></script>
    <script src="<?=base_url()?>resources/js/jquery.maskMoney.js"></script>
    
    <!-- Select 2 -->
    <script src="<?=base_url()?>resources/vendor/select2/js/select2.js"></script>  

    <script>
        $(document).ready(function(){ 
            
            /* Máscara de Valor */
            $('.valor').maskMoney();

            $("#listagem_venda").DataTable({
                "lengthMenu": [[50, 100, 150, -1], [50, 100, 150, "All"]],
                order: false
            })

            /* Select 2 de Pesquisa */
            $(".select2").select2();            

            /* Clone de Registro de Código */
            $('.clonador').click(function(){
              
                $clone = $('.box_venda.hide').clone(true);
                $clone.removeClass('hide');
                $clone.select2(); 
                $('#lista_vendas').append($clone);

            });

            $('.btn_remove').click(function(){
                $(this).parents('.box_venda').remove();
            });

            $(document).on('click', '.enviar_aviso', function(){

                _this = $(this);

                var id_venda        = _this.attr('data-id_venda');
                var id_cliente      = _this.attr('data-id_cliente');

                $.ajax({
                     url : "<?php echo base_url('venda/getVenda'); ?>",
                     type : 'post',
                     data : {
                        id_venda : id_venda,
                        id_cliente : id_cliente
                     },
                     beforeSend : function(){
                          console.log('Venda', 'Buscando Dados')
                     }
                })
                .done(function(result){
                    console.log('Retorno', result)
                    //window.location = result; 
                    window.open(result, '_blank');
                })
                .fail(function(jqXHR, textStatus, result){
                     alert(result);
                });

            })

            $(document).on('click', '.aviso_enviado', function(){

                _this = $(this);

                var id_venda = _this.val();


                $.ajax({
                     url : "<?php echo base_url('venda/setAvisoEnviado'); ?>",
                     type : 'post',
                     data : {
                        id_venda : id_venda
                     },
                     beforeSend : function(){
                          console.log('Configurando Aviso', 'Buscando Dados')
                     }
                })
                .done(function(result){
                    console.log('Retorno', result)                    
                })
                .fail(function(jqXHR, textStatus, result){
                     alert(result);
                });                






                console.log(id_venda)
                alert('deverá marcar o aviso')
            })




        });
    </script>  

</body>

</html>
