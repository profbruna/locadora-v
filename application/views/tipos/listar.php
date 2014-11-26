
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h3> Tipos </h3>
                </div>
            </div>
           
            <div class="clearfix"></div>
            <br/>

            <div class="col-md-10 col-md-offset-1">
                
                <div class="row box-options">
                    <a  href="<?php echo base_url( "tipos/adicionar" ) ?>" class="btn btn-primary pull-right" > <i class="glyphicon glyphicon-plus" ></i> Adicionar </a>
                </div>
                
                <table class="table table-hover table-striped" >
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> Descrição </th>
                            <th> Ações </th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach( $tipos as $tipo ): ?>
                            <tr>
                                <td> <?php echo $tipo->id ?> </td>
                                <td> <?php echo $tipo->descricao ?> </td>
                                <td>
                                    <a href="<?php echo base_url( "tipos/editar/".$tipo->id ); ?>" class="btn btn-xs btn-warning" > <i class="glyphicon glyphicon-pencil" ></i> Editar </a>
                                    <a href="<?php echo base_url( "tipos/deletar/".$tipo->id ); ?>" data-descricao="<?php echo $tipo->descricao ?>" class="btn btn-xs btn-danger btn-modal-deletar" > <i class="glyphicon glyphicon-remove" ></i> Deletar </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                <?php
                echo $this->pagination->create_links();
                ?>
            </div>
            