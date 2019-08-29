<?php
if (!empty($_GET)){
    echo "Recebemos dados via GET: ";
    print_r($_GET);
}

if (!empty($_POST)){
    echo "Recebemos dados via POST: ";
    print_r($_POST);
}
?>