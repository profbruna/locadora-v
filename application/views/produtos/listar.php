
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h3> Produtos </h3>
                </div>
            </div>
           
            <div class="clearfix"></div>
            <br/>

            <div class="col-md-10 col-md-offset-1">
                
                <div class="row box-options">
                    <a  href="<?php echo base_url( "produtos/adicionar" ) ?>" class="btn btn-primary pull-right" > <i class="glyphicon glyphicon-plus" ></i> Adicionar </a>
                </div>
                
                <table class="table table-hover table-striped" >
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> Nome </th>
                            <th> Tipo </th>
                            <th> Genero </th>
                            <th> Classificação </th>
                            <th> Preço </th>
                            <th> Qtd. Estoque </th>
                            <th> Qtd. Locado </th>
                            <th> Qtd. Descartado </th>
                            <th> Cadastro </th>
                            <th> Detalhes </th>
                            <th> Devolução</th>
                            <th> Status </th>
                            <th> Ações </th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach( $produtos as $produto ): ?>
                            <tr>
                                <td> <?php echo $produto->id ?> </td>
                                <td> <?php echo $produto->nome ?> </td>
                                <td> <?php echo $produto->tipo_id ?> </td>
                                <td> <?php echo $produto->genero_id ?> </td>
                                <td> <?php echo $produto->classificacao_id ?> </td>
                                <td> <?php echo $produto->preco ?> </td>
                                <td> <?php echo $produto->qtd_estoque ?> </td>
                                <td> <?php echo $produto->qtd_locado ?> </td>
                                <td> <?php echo $produto->qtd_descartado ?> </td>
                                <td> <?php $data = $produto->data_cadastro; echo $data = date("d-m-Y"); ?> </td>
                                <td> <?php echo $produto->detalhes ?> </td>
                                <td> <?php echo $produto->dias_devolucao ?> </td>
                                <td> <?php echo $produto->status ?> </td>
                                <td>
                                    <a href="<?php echo base_url( "produtos/editar/".$produto->id ); ?>" class="btn btn-xs btn-warning" > <i class="glyphicon glyphicon-pencil" ></i> Editar </a>
                                    <a href="<?php echo base_url( "produtos/deletar/".$produto->id ); ?>" data-descricao="<?php echo $produto->id ?>" class="btn btn-xs btn-danger btn-modal-deletar" > <i class="glyphicon glyphicon-remove" ></i> Deletar </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                <?php
                echo $this->pagination->create_links();
                ?>
            </div>
            