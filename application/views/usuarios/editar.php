<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Adicionar Usuários </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-8 col-md-offset-2">
    <div class="row box-options">
        <a class="btn btn-danger btn-voltar" > <i class="glyphicon glyphicon-arrow-left" ></i> Voltar </a>
    </div>
    <form role="form" method="post">
        <div class="form-group row">
                <input type="hidden" class="form-control" name="nome" value="<?php echo $usuario[0]->id ?>" id="Nome" required=""/>
            <div class="col-md-6">
                <label for="Nome">Nome</label>
                <input type="text" class="form-control" name="nome" value="<?php echo $usuario[0]->nome ?>" id="Nome" required=""/>
            </div>
            <div class="col-md-6">
                <label for="Email">E-mail</label>
                <input type="text" class="form-control" name="email" value="<?php echo $usuario[0]->email ?>" id="Email" required=""/>
            </div>
            <div class="col-md-6">
                <label for="Login">Login</label>
                <input type="text" class="form-control" name="login" value="<?php echo $usuario[0]->login ?>" id="Login" required=""/>
            </div>
            <div class="col-md-6">
                <label for="Senha">Senha</label>
                <input type="text" class="form-control" name="senha" value="<?php echo $usuario[0]->senha ?>" id="Senha" required=""/>
            </div>
            <div class="col-md-6">
                <input type="hidden" class="form-control" value="1" name="status" required=""/>
                <input type="hidden" class="form-control" value="0" name="falha" required=""/>
            </div>
            
        </div>
        <div class="form-group col-md-12">
            <div class="col-md-12" >
                <button type="submit" class="btn btn-success pull-right"> <i class="glyphicon glyphicon-ok" ></i> Salvar</button>
            </div>
        </div>
    </form>
</div>
