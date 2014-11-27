<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h2> Editar Lançamentos Financeiro </h2>
    </div>
    <div class="col-md-12">
        <a class="btn btn-danger btn-voltar" > <i class="glyphicon glyphicon-arrow-left" ></i> Voltar </a>
    </div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-8 col-md-offset-2">

    <form role="form" method="post">
        <input type="hidden" name="id" value="<?php echo $financeiro[0]->id ?>">
        <div class="form-group col-md-12">
            <div class="col-md-6">
                <label for="Vencimento">Vencimento</label>
                <input type="text" class="form-control mask-data" name="vencimento" id="Vencimento" required="" value="<?php echo implode('/', array_reverse(explode('-', $financeiro[0]->vencimento))); ?>"/>
            </div>
            <div class="col-md-6">
                <label for="Valor">Valor</label>
                <input type="number" class="form-control" name="valor" id="Valor" required="" value="<?php echo $financeiro[0]->valor; ?>"/>
            </div>   

        </div>     
        <div class="form-group col-md-12">
            <div class="col-md-12" >
                <button type="submit" class="btn btn-success pull-right"> <i class="glyphicon glyphicon-ok" ></i> Salvar</button>
            </div>
        </div>
    </form>
</div>