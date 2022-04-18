<?php
@ob_start();
@session_start();
require_once('../src/dao/login_dao.php');
require_once('../src/model/classe_login.php');
require_once('../src/helper/funcoes.php');
require_once('../autoload.php');

Autoload::carrega_const();
$login_dao = new LoginDao();

$login_dao->finaliza_sessao();

$errobase64 = base64_encode('2');
header('Location: ../login.php?e=' . $errobase64);
exit;
