<?php

/**
* @version      $Id$
* @package      Joomla!
* @subpackage   68portal
* @copyright    Copyright (c)2007 Axel Wehner. All rights reserved.
* @license      GNU/GPL
**/

defined('_JEXEC') or die('Restricted access');

function modChrome_68portal($module, &$params, &$attribs)
{
	if (!empty ($module->content)) :
    	if ($module->showtitle) :
        	$class=" heading";
		else :
        	$class=" noheading";
		endif;
	?>
		<div class="module<?php echo $params->get('moduleclass_sfx').$class; ?>">
			<div>
				<?php if ($module->showtitle) : ?>
				<h3><?php echo $module->title; ?></h3>
				<?php endif; ?>
				<?php echo $module->content; ?>
			</div>
		</div>
	<?php endif;
}

function modChrome_68portal_left($module, &$params, &$attribs)
{
	if (!empty ($module->content)) :
		if ($module->showtitle) :
        	$class=" heading";
		else :
        	$class=" noheading";
		endif;
?>
		<div class="moduletable<?php echo $params->get('moduleclass_sfx').$class; ?>">
			<?php if ($module->showtitle) : ?>
			<h3><?php echo $module->title; ?></h3>
			<?php endif; ?>
			<?php echo $module->content; ?>
		</div>
	<?php endif;
}
