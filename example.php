<?php
    include('CVS_ARRAY.php');

    try {
        $file = new CVS_ARRAY();
        $file->setFileName("data.csv");
        $file->toArray();

        print_r($file->getContent());
    } catch (Exception $exc) {
        echo $exc->getMessage();
    }

?>