<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Adicionar Locação </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>
<div class="col-md-8 col-md-offset-2">
    <div class="row box-options">
        <a class="btn btn-danger btn-voltar" > <i class="glyphicon glyphicon-arrow-left" ></i> Voltar </a>
    </div>
    <form role="form" method="post" class="form-select-default" >
        <div class="form-group row">
            <div class="col-md-5">
                <div class="col-md-12">
                    <label for="Clientes">Clientes</label>
                    <select id="Clientes" class="form-control select-default" name="cliente_id" required="required">
                        <option selected="selected" value="default" > -- Escolha um cliente -- </option>
                        <?php foreach ($clientes as $cliente) { ?>
                            <option value="<?php echo $cliente->id ?>" > <?php echo $cliente->nome ?> </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                    <div class="col-md-12'">
                        <label for="Condicoes">Condições de Pagamento</label>
                        <select id="Condicoes" class="form-control select-default" name="condicao_pagamento_id" required="required">
                            <option selected="selected" value="default" > -- Escolha um pagamento -- </option>
                            <?php foreach ($condicoes as $condicao) { ?>
                                <option value="<?php echo $condicao->id ?>" > <?php echo $condicao->nome ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div> 
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <label for="Observacoes">Observações</label>
                    <textarea class="form-control" name="observacoes" id="Observacões" ></textarea>
                </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <div class="col-md-12" >
                <button type="submit" class="btn btn-success pull-right" disabled > <i class="glyphicon glyphicon-ok" ></i>  Salvar </button>
            </div>
        </div>
    </form>
</div>
