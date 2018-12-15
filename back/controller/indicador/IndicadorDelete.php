<?php
include_once realpath('../../facade/IndicadorFacade.php');

$idindi = $_POST['id'];
IndicadorFacade::delete($idindi);
echo "true";
