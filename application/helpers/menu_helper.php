<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function generate_menu($data, $uri_segment = false)
{
	$str = "";
	
    foreach ($data as $list)
    {
		if ($uri_segment === $list['slug'])
		{
			$active = 'active';
			$block = 'block';
		}
		else
		{
			$active = '';
			$block = '';
		}
		
        $str .= "<li class='current'><a href='".base_url(''.$list['slug'])."'>".img(array('src'=>base_url('assets/img/menu/'.$list['slug'].'.png')))."</a>";
		
        $subchild = $list['child'];
		
        /* if ($subchild !== '')
		{
			$str .= "<ul>";	
			foreach ($subchild as $subchild)
			{
            	$str .= "<li><a href='".base_url(''.$list['slug'].'/'.$subchild['slug'])."'>".ucfirst($subchild['title'])."</a>";
				
					$deepchild = $subchild['deep_child'];
					
					if ($deepchild !== '')
					{
						$str .= "<ul>";
							foreach ($deepchild as $deepchild)
							{
								$str .= "<li><a href='".base_url(''.$list['slug'].'/'.$subchild['slug'].'/'.$deepchild['slug'])."' class='top_link'>".ucfirst($deepchild['title'])."</a></li>";
							}
						$str .= "</ul>";
					}
				$str .= '</li>';
			}
			$str .= "</ul>";
		} */
		
        $str .= "</li>";
    }
	
    return $str;
}