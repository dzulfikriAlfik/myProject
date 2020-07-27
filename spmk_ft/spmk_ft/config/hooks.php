<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$hook['pre_system'] = array(
	'function' => 'load_exceptions',
	'filename' => 'uhoh.php',
	'filepath' => 'hooks',
);
