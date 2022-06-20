<?php

if ( ! function_exists('script_tag'))
{
	/**
	 * Link
	 *
	 * Generates link to a JS Script tag
	 *
	 * @param	mixed	js srcs or an array
	 * @param	string	type
	 * @param	string	title
	 * @param	string	media
	 * @return	string
	 */
	function script_tag($src = '', $type = 'text/javascript', $title = '')
	{
		$CI =& get_instance();
		$link = '<script ';

		if (is_array($src))
		{
			foreach ($src as $k => $v)
			{
				if ($k === 'src' && ! preg_match('#^([a-z]+:)?//#i', $v))
				{
					if ($index_page === TRUE)
					{
						$link .= 'src="'.$CI->config->site_url($v).'" ';
					}
					else
					{
						$link .= 'src="'.$CI->config->base_url($v).'" ';
					}
				}
				else
				{
					$link .= $k.'="'.$v.'" ';
				}
			}
		}
		else
		{
			if (preg_match('#^([a-z]+:)?//#i', $src))
			{
				$link .= 'src="'.$src.'" ';
			}
			else
			{
				$link .= 'src="'.$CI->config->base_url($src).'" ';
			}

			$link .= 'type="'.$type.'" ';

			if ($title !== '')
			{
				$link .= 'title="'.$title.'" ';
			}
		}

		return $link."></script>\n";
	}
}
