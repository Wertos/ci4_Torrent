<?php

namespace App\Libraries\Breadcrumb;

/**
 * Breadcrumb Class
 *
 * This class manages the breadcrumb object
 *
 * @package		Breadcrumb
 * @version		1.0
 * @author 		Richard Davey <info@richarddavey.com> && Dwight Watson <dwight@studiousapp.com>
 * @copyright 	Copyright (c) 2011, Richard Davey && 2013, Dwight Watson
 * @link		https://github.com/richarddavey/codeigniter-breadcrumb
 * @link 		https://github.com/dwightwatson/codeigniter-breadcrumb
 */
class BreadcrumbClass {
	
	/**
	 * Breadcrumbs stack
	 *
     */
	private $breadcrumbs	= array();
	
	/**
	 * Options
	 *
	 */
	private $_tag_open 		= '<div id="breadcrumb">';
	private $_tag_close 		= '</div>';
	private $_item_open		= '';
	private $_item_close		= '';
	private $_last_item_open 	= '<span>';
	private $_last_item_close 	= '</span>';
	public $params;
	/**
	 * Constructor
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 */
	public function __construct($params = array())
	{
	  $this->params =  new \Config\Breadcrumb();
	}

	// --------------------------------------------------------------------

	/**
	 * Append crumb to stack
	 *
	 * @access	public
	 * @param	string $title
	 * @param	string $href
	 * @return	self
	 */
	function append($title, $href = NULL)
	{
		// no title provided
		if (!$title) return;
		
		// add to end
		$this->breadcrumbs[] = array('title' => $title, 'href' => $href);
		
		return $this;
	}
	
	// --------------------------------------------------------------------

	/**
	 * Prepend crumb to stack
	 *
	 * @access	public
	 * @param	string $title
	 * @param	string $href
	 * @return	self
	 */
	function prepend($title, $href = NULL)
	{
		// no title provided
		if (!$title) return;
		
		// add to start
		array_unshift($this->breadcrumbs, array('title' => $title, 'href' => $href));
		
		return $this;
	}
	
	// --------------------------------------------------------------------

	/**
	 * Add multiple crumbs to the stack
	 *
	 * @access	public
	 * @param	array $breadcrumbs
	 * @return	self
	 */
	function populate($breadcrumbs = array())
	{
		foreach ($breadcrumbs as $key => $value)
		{
			$this->append(is_int($key) ? $value : $key, $value);
		}
		
		return $this;
	}
	
	// --------------------------------------------------------------------

	/**
	 * Generate breadcrumb
	 *
	 * @access	public
	 * @return	string
	 */
	function output()
	{
		// breadcrumb found
		if ($this->breadcrumbs) {
		
			// set output variable
			$output = $this->params->tag_open;
			
			// add html to output
			foreach ($this->breadcrumbs as $key => $crumb) {
				
				// if last element
				$array_keys = array_keys($this->breadcrumbs);
				if (end($array_keys) == $key) {
					$output .= $this->params->last_item_open . $crumb['title'] . $this->params->last_item_close;
				
				// else add link and divider
				} else {
					$output .= $this->params->item_open . '<a href="' . site_url($crumb['href']) . '">' . $crumb['title'] . '</a>' . $this->params->item_close . "\n";
				}
			}
			
			// return html
			return $output . $this->params->tag_close . PHP_EOL;
		}
		
		// return blank string
		return '';
	}
}
// END Breadcrumb Class

/* End of file Breadcrumb.php */
/* Location: ./application/libraries/Breadcrumb.php */
