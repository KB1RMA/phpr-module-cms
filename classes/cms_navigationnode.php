<?php

class Cms_NavigationNode
{
	public function __construct($object)
	{
		foreach ((array)$object as $key=>$value)
			$this->{$key} = $value;
	}

	public function navigation_label()
	{
		return empty($this->navigation_label) ? $this->name : $this->navigation_label;
	}

	public function navigation_subpages()
	{
		if (!empty(Cms_Page::$navigation_parent_cache[$this->id]))
			return Cms_Page::$navigation_parent_cache[$this->id];

		return array();
	}

	public function is_current()
	{
		return $this->url == Phpr::$request->get_current_uri();
	}

}