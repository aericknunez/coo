<style>
    body { 
        background-color: black; /* La página de fondo será negra */
        color: 000; 
    	}
</style>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if($_REQUEST["modal"]=="registrar") include_once 'system/modal/modal/registrar.php';

if($_REQUEST["modal"]=="register_success") include_once 'system/modal/modal/register_success.php';