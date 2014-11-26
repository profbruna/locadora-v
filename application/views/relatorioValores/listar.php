
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h3>Relatório de Valores à Receber</h3>
                </div>
            </div>
           
            <div class="clearfix"></div>
            <br/>

            <div class="col-md-10 col-md-offset-1">
                
                <form role="form" method="post">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="DataInicial">Data Inicial</label>
                            <input type="text" class="form-control" name="dia1" id="DataInicial" required="" placeholder="aaaa/mm/dd"/>
                        </div>
                        <div class="col-md-6">
                            <label for="DataFinal">Data Final</label>
                            <input type="text" class="form-control" name="dia2" id="DataFinal" required="" placeholder="aaaa/mm/dd"/>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="col-md-12" >
                            <button type="submit" class="btn btn-success pull-right"> <i class="glyphicon glyphicon-ok" ></i> Listar</button>
                        </div>
                    </div>
                </form>
                
                <table class="table table-hover table-striped" >
                    <thead>
                        <tr>
                            <th> <b> ID </b> </th>
                            <th> Locação </th>
                            <th> Vencimento </th>
                            <th> Valor Original </th>
                            <th> Saldo à receber </th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach( $relatos as $relato ): ?>
                            <tr>
                                <td> <?php echo $relato->id ?> </td>
                                <td> <?php echo $relato->locacao_id ?> </td>
                                <td> <?php echo $relato->vencimento ?> </td>
                                <td> <?php echo $relato->valor ?> </td>
                                <td> <?php echo $relato->saldo ?> </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                <!--<div class="row">
                    <div class="col-xs-6"></div>
                    <div class="col-xs-6">
                        <nav>
                            <?php echo $this->pagination->create_links(); ?>
                        </nav>
                    </div>
                </div>-->
            </div>