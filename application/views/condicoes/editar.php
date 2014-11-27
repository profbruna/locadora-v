<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h2> Editar Condição de Pagamento </h2>
    </div>
    <div class="col-md-12">
        <a class="btn btn-danger btn-voltar" > <i class="glyphicon glyphicon-arrow-left" ></i> Voltar </a>
    </div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-8 col-md-offset-2">

    <form role="form" method="post">
        <input type="hidden" name="id" value="<?php echo $condicao[0]->id ?>">
        <div class="form-group col-md-12">
            <div class="col-md-12">
                <label for="Nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="Nome" required="" value="<?php echo $condicao[0]->nome; ?>"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <div class="col-md-6">
                <label for="Parcelas">Parcelas</label>
                <input type="text" class="form-control" name="parcelas" id="Parcelas" required="" value="<?php echo $condicao[0]->parcelas; ?>"/>
            </div>
            <div class="col-md-6">
                <label for="Dias">Dias</label>
                <input type="text" class="form-control" name="dias" id="Dias" required="" value="<?php echo $condicao[0]->dias; ?>"/>
            </div>   

        </div>     
        <div class="form-group col-md-12">
            <div class="col-md-12" >
                <button type="submit" class="btn btn-success pull-right"> <i class="glyphicon glyphicon-ok" ></i> Salvar</button>
            </div>
        </div>
    </form>
</div>