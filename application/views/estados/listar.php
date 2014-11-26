
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h3> Estados </h3>
                </div>
            </div>
           
            <div class="clearfix"></div>
            <br/>

            <div class="col-md-10 col-md-offset-1">
                
                <div class="row box-options">
                    <a  href="<?php echo base_url( "estados/adicionar" ) ?>" class="btn btn-primary pull-right" > <i class="glyphicon glyphicon-plus" ></i> Adicionar </a>
                </div>
                
                <table class="table table-hover table-striped" >
                    <thead>
                        <tr>
                            <th> <b> ID </b> </th>
                            <th> Nome </th>
                            <th> Sigla </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach( $estados as $estado ): ?>
                            <tr>
                                <td> <?php echo $estado->id ?> </td>
                                <td> <?php echo $estado->nome ?> </td>
                                <td> <?php echo $estado->sigla ?> </td>
                                <td>
                                    <a href="<?php echo base_url( "estados/editar/".$estado->id ); ?>" class="btn btn-xs btn-warning" > <i class="glyphicon glyphicon-pencil" ></i> Editar </a>
                                    <a href="<?php echo base_url( "estados/deletar/".$estado->id ); ?>" data-descricao="<?php echo $estado->nome ?>" class="btn btn-xs btn-danger btn-modal-deletar" > <i class="glyphicon glyphicon-remove" ></i> Deletar </a>
                                </td>
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