<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Content.Author
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\Registry\Registry;

/**
 * Contact Plugin
 *
 * @since  3.2
 */
class PlgContentAuthor extends JPlugin
{
    /**
    * Load the language file on instantiation.
    *
    * @var    boolean
    * @since  3.1
    */
	protected $autoloadLanguage = true;
	
	/**
	 * Display the author link at last of an article
	 *
	 * @param   string  $context  - the context
	 * @param   object  &$row     - the component row
	 * @param   object  &$params  - any params
	 * @param   int     $page     - the page
	 *
	 * @return type
	 */
	public function onContentAfterDisplay($context, &$row, &$params, $page = 0)
	{
		if($context == 'com_content.featured')
		{
			$app = JFactory::getApplication();
			$menu = $app->getMenu();
			$authoritem = $menu->getItems('component','com_author');
			// get url of article
			$url = JRoute::_('index.php?option=com_author&author_id=' . $row->created_by.'&Itemid=140', false);
			if(isset($authoritem)){
				return '<span style="margin-left:30px;">'.JText::_('PLG_AUTHOR_WRITTEN_BY') .': <a href="' . $url . '">' . $row->author . '</a></span>';
			}else{
				return '';
			}
		}
		else
		{
			return '';
		}
	}
}
