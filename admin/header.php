<!DOCTYPE html>
<?php
require_once('../autoload.php');
?>

<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MMTech | Admin</title>
</head>

<?php
Autoload::carrega_sistema();
Autoload::verifica_sessao();
Autoload::carrega_menu();
