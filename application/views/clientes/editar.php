<div class="col-md-8 col-md-offset-2"> 
    <div class="page-header">
        <h3> Editar Clientes </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-8 col-md-offset-2">
    <div class="row box-options">
        <a class="btn btn-danger btn-voltar" > <i class="glyphicon glyphicon-arrow-left" ></i> Voltar </a>
    </div>
    <form role="form" method="post">
        <input type="hidden" name="id" value="<?php echo $cliente[0]->id ;?>"
        <div class="form-group row">
            <div class="col-md-12">
                <label for="Nome">Nome</label>
                <input type="text" value="<?php echo $cliente[0]->nome ;?>" class="form-control" name="nome" id="Nome" required=""/>
            </div>
            
            <div class="col-md-6">
                <label for="Cpf">CPF</label>
                <input type="text" value="<?php echo $cliente[0]->cpf ;?>" class="form-control" name="cpf" id="Cpf" required=""/>
            </div>
           
            <div class="col-md-6">
                <label for="Rg">RG</label>
                <input type="text" value="<?php echo $cliente[0]->rg ;?>" class="form-control" name="rg" id="Rg" required=""/>
            </div>
            
            <div class="col-md-12">
                <label for="Email">Email</label>
                <input type="text"  value="<?php echo $cliente[0]->email ;?>" class="form-control" name="email" id="Email" required=""/>
            </div>
            
        </div>
        <div class="form-group col-md-12">
            <div class="col-md-12" >
                <button type="submit" class="btn btn-success pull-right"> <i class="glyphicon glyphicon-ok" ></i> Salvar</button>
            </div>
        </div>
    </form>
</div>
