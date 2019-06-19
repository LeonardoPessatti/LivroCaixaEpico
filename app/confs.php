<?php
/*
 * Blitz Framework - Small Framework to PHP
 * Copyright (C) 2016 Fernando Batels <luisfbatels@gmail.com>
 */

\blitz\vendor\Bootstrap::$settings['app'] = [
	'name' => 'Livro Caixa Épico',
	'author' => 'Leonardo Pessatti',
	'author_email' => 'lpessatti@gmail.com',
	// 'url' => 'http://localhost/LivroCaixaEpico'
	'url' => 'caixa.leonardopessatti.com.br'
];

\blitz\vendor\Bootstrap::$settings['use_http_encoding_gzip'] = true;
\blitz\vendor\Bootstrap::$settings['use_http_output_minify'] = true;

//Data Source Name(http://php.net/manual/pt_BR/pdo.construct.php)
\blitz\vendor\Bootstrap::$settings['db']['dns'] = 'mysql:host=mysql873.umbler.com:41890;dbname=caixaepico;charset=utf8';
\blitz\vendor\Bootstrap::$settings['db']['user'] = 'leopessatti';
\blitz\vendor\Bootstrap::$settings['db']['pass'] = 'gordo441997';
//http://php.net/manual/pt_BR/pdo.setattribute.php
\blitz\vendor\Bootstrap::$settings['db']['attributes'] = [
	//PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	//PDO::ATTR_CASE => PDO::CASE_LOWER,
	//....
];

/**
 * Enable if you use specific lib
 */
\blitz\vendor\Bootstrap::$settings['vendor_libs'][] = 'bistro';//To Sessions
\blitz\vendor\Bootstrap::$settings['vendor_libs'][] = 'database'; //To Databases
/**
 * Every library needs a infos.php file with your settings
 */
\blitz\vendor\Bootstrap::$settings['app_libs'] = [
	//'api-my-server-folder'
];
/**
 * Every helpers needs a static methods and extends from Helpers class
 */
\blitz\vendor\Bootstrap::$settings['app_helpers'] = [
	//'MyAdmin'
];

setlocale(LC_MONETARY, 'pt_BR');
date_default_timezone_set('America/Sao_Paulo');

// error_reporting(E_ALL);
error_reporting(0);
