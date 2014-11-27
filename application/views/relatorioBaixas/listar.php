
<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Relatorio Baixa </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-10 col-md-offset-1">


    <div class="row box-options">
        <form method="post" action="<?php echo base_url("relatorioBaixas/listar") ?>">
            <div class="form-group row">
                <div class="col-md-2">
                    <label>Data inicial:</label>
                    <input type="text"  id="data" name="data_inicial" class="datepicker form-control" required="">

                </div>
                <div class="col-md-2">
                    <label>Data final:</label>
                    <input type="text"  id="data2" name="data_final" class="datepicker form-control" required="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12" >
                    <button type="submit" class="btn btn-primary ">  Listar</button>
                </div>
            </div>
        </form>


    </div>

    <table class="table table-hover table-striped" >
        <thead>
            <tr>
                <th> #id </th>
                <th> Data </th>
                <th> Valor </th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($relatorioBaixas == null) {
                
            } else {
                foreach ($relatorioBaixas as $relatorioBaixa):
                    ?>
                    <tr>
                        <td> <?php echo $relatorioBaixa->id ?> </td>
                        <td> <?php echo date("d/m/Y", strtotime($relatorioBaixa->data)); ?> </td>
                        <td> <?php echo $relatorioBaixa->valor ?> </td>
                    </tr>
                    <?php
                endforeach;
            }
            ?>
        </tbody>

    </table>
    <div class="row">
        <div class="col-xs-6"></div>
        <div class="col-xs-6">
            <nav>
            </nav>
        </div>
    </div>



</div>