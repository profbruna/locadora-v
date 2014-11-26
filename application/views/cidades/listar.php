
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h3> Cidades </h3>
                </div>
            </div>
           
            <div class="clearfix"></div>
            <br/>

            <div class="col-md-10 col-md-offset-1">
                
                <div class="row box-options">
                    <a  href="<?php echo base_url( "cidades/adicionar" ) ?>" class="btn btn-primary pull-right" > <i class="glyphicon glyphicon-plus" ></i> Adicionar </a>
                </div>
                
                <table class="table table-hover table-striped" >
                    <thead>
                        <tr>
                            <th> <b> #ID </b> </th>
                            <th> Nome </th>
                            <th> Estado </th>
                            <th> Ações </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach( $cidades as $cidade ){ ?>
                            <tr>
                                <td> <b># <?php echo $cidade->id ?></b> </td>
                                <td> <?php echo $cidade->nome ?> </td>
                                <td> <?php echo $estados[ $cidade->estado_id ]->nome ?> </td>
                                <td>
                                    <a href="<?php echo base_url( "cidades/editar/".$cidade->id ); ?>" class="btn btn-xs btn-warning" > <i class="glyphicon glyphicon-pencil" ></i> Editar </a>
                                    <a href="<?php echo base_url( "cidades/deletar/".$cidade->id ); ?>" data-descricao="<?php echo $cidade->nome ?>" class="btn btn-xs btn-danger btn-modal-deletar" > <i class="glyphicon glyphicon-remove" ></i> Deletar </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
            </div>
            
            <?php echo $this->pagination->create_links() ?>