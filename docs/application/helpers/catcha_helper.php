<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// if ( ! function_exists('capt'))
// {
function capt(){
			$vals = array(
		        'word'          => '',
		        'img_path'      => './captcha/',
		        'img_url'       => base_url().'captcha/',
		        'font_path'       => './assets/admin/fonts/3.ttf',
		        // 'font_path'     => './path/to/fonts/texb.ttf',
		        'img_width'     => '308',
		        'img_height'    => 47,
		        'expiration'    => 3600,
		        'word_length'   => 5,
		        'font_size'     => '25',
		        'img_id'        => 'Imageid',
		        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

		        // White background and border, black text and red grid
		        'colors'        => array(
		                'background' => array(255, 255, 255),
		                'border' => array(255, 255, 255),
		                'text' => array(0, 0, 0),
		                'grid' => array(255, 40, 40)
		        )
			);

			return create_captcha($vals);
}
// }

?>