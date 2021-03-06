
<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Lista de Aniversáriantes </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-10 col-md-offset-1">


    <div class="row box-options">
        <form method="post" action="<?php echo base_url("relatorioAniversariantes/listar") ?>">
            <div class="form-group row">
                <div class="col-md-4">
                    <label>Data Inicial:</label>
                    <input type="text"  placeholder="Digte a data para a pesquisa" id="data" name="data_inicial" class="datepicker form-control" required="">

                </div>
                <div class="col-md-4">
                    <label>Data final:</label>
                    <input type="text"  placeholder="Digte a data para a pesquisa" id="data2" name="data_final" class="datepicker form-control" required="">
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
                <th> #Id </th>
                <th> Felizardo </th>
                <th> Data </th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($relatorioAniversariantes == null) {
                
            } else {
                foreach ($relatorioAniversariantes as $relatorioAniversariante):
                    ?>
                    <tr>
                        <td> <?php echo $relatorioAniversariante->id ?> </td>
                        <td> <?php echo $relatorioAniversariante->nome ?> </td>
                        <td> <?php echo date("d/m/Y", strtotime($relatorioAniversariante->nascimento)); ?> </td>
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