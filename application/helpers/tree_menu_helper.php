<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function generate_tree_menu($data, $uri_segment = false)
{
	$str = "";
	
    foreach ($data as $list)
    {
		if ($uri_segment === $list['url'])
		{
			$active = 'active';
			$block = 'block';
		}
		else
		{
			$active = '';
			$block = '';
		}
		
        $str .= "<li class='$list[dropdown] $active'><a href='".base_url(''.$list['url'])."'><span class=".$list['icon']."></span> $list[title]</a>";
		
        $subchild = $list['child'];
		
        if ($subchild !== '')
		{
			$str .= "<ul style='display:$block'>";	
			foreach ($subchild as $subchild)
			{
            	$str .= "<li class='$subchild[dropdown] $active'><a href='".base_url(''.$list['url'].'/'.$subchild['url'])."'>".ucfirst($subchild['title'])."</a>";
				
					$deepchild = $subchild['deep_child'];
					
					if ($deepchild !== '')
					{
						$str .= "<ul>";
							foreach ($deepchild as $deepchild)
							{
								$str .= "<li><a href='".base_url(''.$list['url'].'/'.$subchild['url'].'/'.$deepchild['url'])."' class='top_link'>".ucfirst($deepchild['title'])."</a></li>";
							}
						$str .= "</ul>";
					}
				$str .= '</li>';
			}
			$str .= "</ul>";
		}
		
        $str .= "</li>";
    }
	
    return $str;
}

function generate_category($data)
{
	$category = "";
	
    foreach ($data as $list)
    {
        $category .= "<span class='formwrapper'><input type='checkbox' name='category_id[]' id='category_id' value='$list[id]'> $list[title]</span>";
        $subchild = generate_category($list['child']);
		
        if ($subchild !== '')
		{
			$category .= '<div style="margin-left:25px">'.$subchild.'</div>';
		}
    }
	
    return $category;
}

function generate_category_edit($data)
{
	$category = "";
	
    foreach ($data as $list)
    {
        $category .= "<li><input type='checkbox' name='category_id[]' id='category_id' value='$list[id]' data-title='$list[title]' class='chk_categories'> $list[title]</li>";
        $sub_category = generate_category_edit($list['child']);
		
		
        if ($sub_category !== '')
		{
			$category .= '<div style="margin-left:30px">'.$sub_category.'</div>';
		}
    }
	
    return $category;
}