
<?php
$type = $this->session->flashdata('output_type');
if ($type) {
    switch ($type) {
        case "success":
            echo " <div class='alert alert-success alert-dismissible' role='alert'>";
            break;
        case "alert":
            echo " <div class='alert alert-warning alert-dismissible' role='alert'>";
            break;
        case "info":
            echo " <div class='alert alert-info alert-dismissible' role='alert'>";
            break;
        default:
            echo " <div class='alert alert-danger alert-dismissible' role='alert'>";
            break;
    }
    echo " <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>";
    echo " <strong>{$this->session->flashdata('output_text')}</strong>";
    echo " </div>";
}
