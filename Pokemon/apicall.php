<?php
require __DIR__ . '/../vendor/autoload.php';

use PokePHP\PokeApi;
$api = new PokeApi;
$a = json_decode($api->pokemon(1),true);
echo $a['abilities']['0']['ability']['name'].'<br>';
echo $a['abilities']['1']['ability']['name']."<br>";
  // var_dump($a);
print_r($a);
 ?>
