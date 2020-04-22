<?php
/**
 * @copyright	Copyright (C) 2011 Simplify Your Web, Inc. All rights reserved.
 * @license		GNU General Public License version 3 or later; see LICENSE.txt
 */

defined( '_JEXEC' ) or die;

jimport('joomla.plugin.plugin');
jimport('joomla.filesystem.file');

class plgSystemJaio extends JPlugin
{
	public function __construct(&$subject, $config)
	{
		parent::__construct($subject, $config);

		$this->loadLanguage();
		 
	}

	public function onAfterInitialise(){

		// autoloader for Jaio package
		JLoader::registerPrefix('Jaio', JPATH_LIBRARIES . '/pkg_jaio');
		JLoader::registerNamespace('Jaio', JPATH_LIBRARIES . '/pkg_jaio');

	}
	
	function onAfterRoute()
	{
		$app = JFactory::getApplication();
		
		if ($app->isAdmin()) {
			return;
		}
		
		$doc = JFactory::getDocument();

		if ($doc->getType() !== 'html') {
			// put here so JFactory::getDocument() does not break feeds (will break if used in any function before onAfterRoute)
			// https://groups.google.com/forum/?fromgroups#!topic/joomla-dev-general/S0GYKhLm92A
			$this->_enabled = false;
			return;
		} 

		// auto add JHTML from template
		$templatePath = JPATH_ROOT.'/templates/'.$app->getTemplate();
		if( is_dir($templatePath.'/jhtml'))
			\JHtml::addIncludePath($templatePath.'/jhtml');


		// auto turn off edit module to stop frontediting.js
		// it conflict tooltips
		$user         = \JFactory::getUser();
		if(!$user->guest) $app->set('frontediting', 0);

		return;
	}
	
	function onBeforeRender()
	{
		$app = \JFactory::getApplication();

		if ($app->isAdmin()) {
			return;
		}

		
		 
		return;
	}
	
	function onBeforeCompileHead()
	{
		$app = \JFactory::getApplication();

		if ($app->isAdmin()) {
			return;
		}

		$templatePath = JPATH_ROOT.'/templates/'.$app->getTemplate();
		if( file_exists($templatePath.'/helper/integration.php')){
			include $templatePath.'/helper/integration.php';
			IntegrationHelper::solveConflict();
		}
		
		return;	

	}
		
	function onAfterRender()
	{
		if (JFactory::getApplication()->isAdmin()) {
			return;
		} 

		return;
	}
	
}