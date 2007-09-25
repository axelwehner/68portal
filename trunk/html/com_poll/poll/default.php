<?php // no direct access
defined('_JEXEC') or die('Restricted access'); 
?>

<?php JHTML::_('stylesheet', 'poll_bars.css', 'components/com_poll/assets/'); ?>

<form action="index.php" method="post" name="poll" id="poll">
	<div class="poll<?php echo $this->params->get( 'pageclass_sfx' ) ?> poll<?php echo $this->poll->id; ?>">

		<?php if ($this->params->get( 'show_page_title')) : ?>
		<h1 class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ) ?>">
			<?php echo $this->poll->title ? $this->poll->title : $this->params->get('page_title'); ?>
		</h1>
		<?php endif; ?>

		<h2>
			<label for="id"><?php echo JText::_('Select Poll'); ?></label>
		</h2>

		<?php
		echo $this->lists['polls'];
        echo $this->loadTemplate('graph');
		?>

	</div>
</form>