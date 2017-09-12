<?php

/**
* Wordpress Naked, a very minimal wordpress theme designed to be used as a base for other themes.
*
* @licence LGPL
* @author Darren Beale - http://siftware.co.uk - bealers@gmail.com - @bealers
* 
* Project URL http://code.google.com/p/wordpress-naked/
*/

/**nav()
*
* @desc a wrapper for the wordpress wp_list_pages() function that
* will display one or two unordered lists:
* 1) primary nav, a ul with css id #nav - always shown even if empty
* 2) Optional secondary nav, a ul with css id #subNav
*
* @todo default css provided to allow space for both nav 'bars' one below the other to stop the page jig
*
* @param obj post
* @return string (html)
*/
function nav($post = 0)
{
  $output = "";
  $params = "title_li=&depth=1&echo=0";

  // always show top level
  $output .= '<ul id="nav">';
  $output .= strtolower(wp_list_pages($params));
  $output .= '</ul>';
  return $output;
}
// second level?
// function sub($post)
//   if($post->post_parent)
//   {
//     $params .= "&child_of=" . $post->post_parent;
//   }
//   else
//   {
//     $params .= "&child_of=" . $post->ID;
//   }
//   $subNav = wp_list_pages($params);

//   if ($subNav)
//   {
//     $output .= '<ul id="subNav">';
//     $output .= $subNav;
//     $output .= '</ul>';
//   }
//   return $output; 
// }
/**
* @desc make the site's heading & tagline an h1 on the homepage and an h4 on internal pages
* Naked's default CSS should make the two different states look identical
*/
function do_heading()
{
  $output = "";

  $output .= "<h1>";

  $output .= "<a href='"  . get_bloginfo('url') . "'>" . get_bloginfo('name') . "</a></h1><br>  <h2>" . strtolower(get_bloginfo('description')) . "</h2>";


  return $output;
}

/**
* register_sidebar()
*
*@desc Registers the markup to display in and around a widget
*/
if ( function_exists('register_sidebar') )
{
  register_sidebar(array(
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget' => '</li>',
    'before_title' => '',
    'after_title' => '',
  ));
}

/**
* Check to see if this page will paginate
* 
* @return boolean
*/
function will_paginate() 
{
  global $wp_query;
  
  if ( !is_singular() ) 
  {
    $max_num_pages = $wp_query->max_num_pages;
    
    if ( $max_num_pages > 1 ) 
    {
      return true;
    }
  }
  return false;
}



?>