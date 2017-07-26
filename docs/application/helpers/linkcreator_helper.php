<?php

if(!function_exists('__link'))
{
	function __link($li = FALSE)
	{
		// create the class object with custom alphabet */
		// $hashids = new Hashids\Hashids('kenneth port folio', 0, 'abcdefgh123456789');
		// create the class object with minimum hashid length of 8 */
		$hashids = new Hashids\Hashids('kenneth port folio', 8);

		return $li ? $hashids->encode($li) : FALSE;	
	}
}

if(!function_exists('_secure_encode'))
{
	function _secure_encode($li = FALSE)
	{
		// create the class object with custom alphabet */
		// $hashids = new Hashids\Hashids('kenneth port folio', 0, 'abcdefgh123456789');
		// create the class object with minimum hashid length of 8 */
		$hashids = new Hashids\Hashids('kenneth port folio', 8);

		return $li ? $hashids->decode($li) : FALSE;	
	}
}


if(!function_exists('clear_all_cache'))
{
	function clear_all_cache()
	{
	    $CI =& get_instance();
			$path = $CI->config->item('cache_path');

	    $cache_path = ($path == '') ? APPPATH.'cache/' : $path;

	    $handle = opendir($cache_path);
	    while (($file = readdir($handle))!== FALSE) 
	    {
	        //Leave the directory protection alone
	        if ($file != '.htaccess' && $file != 'index.html')
	        {
	           @unlink($cache_path.'/'.$file);
	        }
	    }
	    closedir($handle);
	}
}


