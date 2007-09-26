<?php // no direct access

/**
* @version      $Id$
* @package      Joomla!
* @subpackage   68portal
* @license      GNU/GPL
**/

defined('_JEXEC') or die('Restricted access'); ?>
<form class="poll poll<?php echo $params->get('moduleclass_sfx'); ?>" action="index.php" method="post" name="form2">
	<h5><?php echo $poll->title;?></h5>
    <ol>
		<?php for ($i = 0, $n = count($options); $i < $n; $i ++) : ?>
		<li class="<?php echo $tabclass_arr[$tabcnt]; ?>">
			<input type="radio" name="voteid" id="voteid<?php echo $options[$i]->id;?>" value="<?php echo $options[$i]->id;?>" alt="<?php echo $options[$i]->id;?>" />
            <label for="voteid<?php echo $options[$i]->id;?>"><?php echo $options[$i]->text; ?></label>
		</li>
		<?php
		$tabcnt = 1 - $tabcnt;
		endfor;
		?>
	</ol>
	<div class="buttons">
		<input type="submit" name="task_button" class="button send" value="<?php echo JText::_('Vote'); ?>" />
		<input type="button" name="option"  class="button result" value="<?php echo JText::_('Results'); ?>" onclick="document.location.href='<?php echo JRoute::_("index.php?option=com_poll&id=$poll->slug".$itemid); ?>'" />
	</div>
	<input type="hidden" name="option" value="com_poll" />
	<input type="hidden" name="task" value="vote" />
	<input type="hidden" name="id" value="<?php echo $poll->id;?>" />
	<input type="hidden" name="<?php echo JUtility::getToken(); ?>" value="1" />
</form>