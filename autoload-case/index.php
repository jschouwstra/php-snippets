<?php

require 'vendor/autoload.php';

$klaas = new User\Person;
echo $klaas->getName();

$human = new User\Human;
echo $human->getQuantityLegs();

?>