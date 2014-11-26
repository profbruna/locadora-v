<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Endereços </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-10 col-md-offset-1">

    <div class="row box-options">
        <a  href="<?php echo base_url("enderecos/adicionar") ?>" class="btn btn-primary pull-right" > <i class="glyphicon glyphicon-plus" ></i> Adicionar </a>
    </div>

    <table class="table table-hover table-striped" >
        <thead>
            <tr>
                <th><b> #ID </b></th>
                <th> Lougradouro </th>
                <th> Tipo </th>
                <th> Cep </th>
                <th> Número </th>
                <th> Bairro </th>
                <th> Complemento </th>
                <th> Cidade </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($enderecos as $endereco): ?>
                <tr>
                    <td><b>#<?php echo $endereco->id ?> </b></td>
                    <td> <?php echo $endereco->logradouro ?> </td>
                    <td> <?php echo $tipos[$endereco->tipo]->descricao?> </td>
                    <td> <?php echo $endereco->cep ?> </td>
                    <td> <?php echo $endereco->numero ?> </td>
                    <td> <?php echo $endereco->bairro ?> </td>
                    <td> <?php echo $endereco->complemento ?> </td>
                    <td> <?php echo $cidades[$endereco->cidade_id]->nome ?> </td>

                    <td> 	 	 	 	 
                        <a href="<?php echo base_url("enderecos/editar/" . $endereco->id); ?>" class="btn btn-xs btn-warning" > <i class="glyphicon glyphicon-pencil" ></i> Editar </a>
                        <a href="<?php echo base_url("enderecos/deletar/" . $endereco->id); ?>" data-descricao="<?php echo $endereco->id ?>" class="btn btn-xs btn-danger btn-modal-deletar" > <i class="glyphicon glyphicon-remove" ></i> Deletar </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <div class="row">
        <div class="col-xs-6"></div>
        <div class="col-xs-6">
            <nav>
                <?php echo $this->pagination->create_links() ?>
            </nav>
        </div>
    </div>

</div>

