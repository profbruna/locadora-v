<!-- HEADER -->
    <?php 
        echo $this->load->view( "elements/header" , Array( "title" => $title ) ); 
        echo $this->load->view( "elements/modal" );
        ?>
<!-- .\ HEADER -->

<div class="container">

    <div class="col-md-8 col-md-offset-2">
        <output>
            <?php echo $this->load->view("elements/output"); ?>
        </output>
    </div> <!-- .\ output -->

    <div class="content">

        <?php echo $this->load->view($view, $data); ?>

    </div><!-- .\ content -->
    
</div><!-- .\ container -->

<div class="clearfix"></div>

<!-- FOOTER -->
    <?php echo $this->load->view( "elements/footer" ); ?>
<!-- .\ FOOTER -->