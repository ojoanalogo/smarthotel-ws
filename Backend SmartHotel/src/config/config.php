<?php
if(!defined('DB_TYPE')) define("DB_TYPE", "mysql");
if(!defined('DB_HOST')) define("DB_HOST", "localhost");
if(!defined('DB_PORT')) define("DB_PORT", "3306");
if(!defined('DB_DB')) define("DB_DB", "smarthotel");
if(!defined('DB_USR')) define("DB_USR", "root");
if(!defined('DB_PWD')) define("DB_PWD", "");
// Mensajes del Handler
if(!defined('HNDLR_CNXNDB')) define("HNDLR_CNXNDB", "Conexion erronea, contactar al administrador. <a href='mailto:hola@mrarc.xyz'>hola@mrarc.xyz</a>");
if(!defined('HNDLR_ROL')) define("HNDLR_ROL", "Usuario no autorizado!");
if(!defined('MAX_ROWS')) define("MAX_ROWS", 10);

?>