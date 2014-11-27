
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h3> Títulos Vencidos </h3>
                </div>
            </div>
           
            <div class="clearfix"></div>
            <br/>

            <div class="col-md-10 col-md-offset-1">
                <br/>
                <hr/>
                <table class="table table-hover table-striped" >
                    <thead>
                        <tr>
                            <th><b> #ID </b></th>
                            <th> Cliente </th>
                            <th> Vencimento </th>
                            <th> Valor </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach( $relatorioVencidos as $relatorioVencido ): ?>
                            <tr>
                                <td> <?php echo $relatorioVencido->id ?> </td>
                                <td> <?php echo $relatorioVencido->nome ?> </td>
                                <?php $data = implode("/",array_reverse(explode("-",$relatorioVencido->vencimento))); ?>
                                <td> <?php echo $data ?> </td>
                                <td><?php $valor = $relatorioVencido->valor ; 
                                 $valor_pago = $relatorioVencido->valor_pago;
                                echo $valorTotal =  $valor - $valor_pago ; ?></td>
                           
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                <div class="row">
                    <div class="col-xs-6"></div>
                    <div class="col-xs-6">
                        <nav>
                            <?php echo $this->pagination->create_links(); ?>
                        </nav>
                    </div>
                </div>
            </div>