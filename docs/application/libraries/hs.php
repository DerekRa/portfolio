<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'/libraries/hashids.php';
// require_once APPPATH.'/libraries/HashGenerator.php';

class hs Extends hashids\Hashids
{
	public function __construct()
	{
		parent::__construct();
	}
}