<?php
/*
 * Blitz Framework - Small Framework to PHP
 * Copyright (C) 2016 Fernando Batels <luisfbatels@gmail.com>
 *
 * File to router
 *
 * Default router from https://github.com/bramus/router
 */

$this->router->match('POST|GET', '/', function () {
	$this->callController('Conta');
});

$this->router->match('POST|GET', '/home', function () {
	$this->callcontroller('Conta', 'home');
});

$this->router->match('POST|GET', '/logoff', function () {
	$this->callcontroller('Conta', 'EfetuaLogoff');
});
/**
 * Todas as páginas que forem /usuario revalidarão as credenciais a cada carregamento.
 */
$this->router->before('GET|POST', '/usuario/.*', function () {
	$this->callController('Conta', 'ValidaLogin');
});

$this->router->match('POST|GET', '/usuario/home', function () {
	$this->callcontroller('Usuario', 'home');
});
