<?php defined( '_JEXEC' ) or die( 'Restricted access' );

	use Jaio\UI\bootstrap4;

	$document = JFactory::getDocument();
	$app  = JFactory::getApplication();

	/**
	 * Bootstrap4 implement
	 */

	JHtml::_('b4.css', ['font-awesome', 'bootstrap'], true);
	JHtml::_('b4.js', ['bootstrap','chart'], true);

	$app  = JFactory::getApplication();
	$user = JFactory::getUser();
	$document = JFactory::getDocument();
	$menu = $app->getMenu();
	$active = $menu->getActive();

	// Output as HTML5
	$this->setHtml5(true);

	// Getting params from template
	$params = $app->getTemplate(true)->params;

	// Detecting Active Variables
	$option   = $app->input->getCmd('option', '');
	$view     = $app->input->getCmd('view', '');
	$layout   = $app->input->getCmd('layout', '');
	$task     = $app->input->getCmd('task', '');
	$itemid   = $app->input->getCmd('Itemid', '');
	$sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');
	$structure = $this->params->get('selectstructure');

	// Logo file or site title param
	if ($this->params->get('logoFile'))
	{
		$logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
	}
	elseif ($this->params->get('sitetitle'))
	{
		$logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('sitetitle'), ENT_COMPAT, 'UTF-8') . '</span>';
	}
	else
	{
		$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
	}
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />
	<?php 
		$document->addStyleSheet('templates/system/css/system.css');
		$document->addStyleSheet('templates/' . $this->template . '/css/template.css'); 
	?>
</head>
<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($this->direction === 'rtl' ? ' rtl' : '');
?>">
	
	<?php
		switch($structure)
		{
			case 0:
				// load template style default
				require_once (JPATH_ROOT.'/templates/'.$app->getTemplate().'/structure/default.php');
				break;
			case 1:
				// load template style structure 8 - 4
				require_once (JPATH_ROOT.'/templates/'.$app->getTemplate().'/structure/structure84.php');
				break;
			case 2:
				// load template style left sidebar
				require_once (JPATH_ROOT.'/templates/'.$app->getTemplate().'/structure/leftsidebar.php');
				break;
			default:
				// load template style default
				require_once (JPATH_ROOT.'/templates/'.$app->getTemplate().'/structure/default.php');
				break;
		}
	?>

	<?php
			/**
			 * Add footer script
			 */
			bootstrap4::generateJavascript();
		?>

</body>
</html>
