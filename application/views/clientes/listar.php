<div class="col-md-8 col-md-offset-2">  
    <div class="page-header">
        <h3> Clientes </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-10 col-md-offset-1">

    <div class="row box-options">
        <a  href="<?php echo base_url("clientes/adicionar") ?>" class="btn btn-primary pull-right" > <i class="glyphicon glyphicon-plus" ></i> Adicionar </a>
    </div>

    <table class="table table-hover table-striped" >
        <thead>
            <tr>
                <th><b> #ID </b></th>
                <th> Nome </th>
                <th> Data de Nascimento </th>
                <th> Cpf </th>
                <th> Rg </th>
                <th> Email </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><b>#<?php echo $cliente->id ?> </b></td>
                    <td> <?php echo $cliente->nome ?> </td>
                    <td> <?php echo $cliente->nascimento ?> </td>
                    <td> <?php echo $cliente->cpf ?> </td>
                    <td> <?php echo $cliente->rg ?> </td>
                    <td> <?php echo $cliente->email ?> </td>
                    <td>
                      <a href="<?php echo base_url("enderecos/listar/" . $cliente->id); ?>" class="btn btn-xs btn-primary" > <i class="glyphicon glyphicon-home" ></i> Endereço </a>
                      <a href="<?php echo base_url("telefones/listar/" . $cliente->id); ?>" class="btn btn-xs btn-primary" > <i class="glyphicon glyphicon-phone" ></i> Telefone </a>
                      <a href="<?php echo base_url("clientes/editar/" . $cliente->id); ?>" class="btn btn-xs btn-warning" > <i class="glyphicon glyphicon-pencil" ></i> Editar </a>
                      <a href="<?php echo base_url("clientes/deletar/" . $cliente->id); ?>" data-descricao="<?php echo $cliente->nome ?>" class="btn btn-xs btn-danger btn-modal-deletar" > <i class="glyphicon glyphicon-remove" ></i> Deletar </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    

    <div class="row">
        <div class="col-xs-6"></div>
        <div class="col-xs-6">
            <nav>
                  <?php echo $this->pagination->create_links()?>
            </nav>
        </div>
    </div>
              
</div>

