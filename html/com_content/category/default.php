<?php

/**
* @version      $Id$
* @package      Joomla!
* @subpackage   68portal
* @license      GNU/GPL
**/

defined( '_JEXEC' ) or die('Restricted access');
?>

<?php if ($this->params->get('show_page_title')) : ?>
	<h1 class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
        <?php echo $this->escape($this->category->title); ?>
	</h1>
<?php endif; ?>
<div class="category<?php echo $this->params->get( 'pageclass_sfx' ); ?> category<?php echo $this->category->id;?>">
	<div class="contentdescription<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
		<?php if ($this->category->image) : ?>
		<div class="description_image" style="float: <?php echo $this->category->image_position;?>">
			<img src="<?php echo $this->baseurl ?>/images/stories/<?php echo $this->category->image;?>" alt="<?php echo $this->category->image;?>" />
		</div>
		<?php endif; ?>
		<div class="description_text">
			<?php echo $this->category->description; ?>
		</div>
	</div>

	<?php
		$this->items =& $this->getItems();
		echo $this->loadTemplate('items');
	?>

	<?php if ($this->access->canEdit || $this->access->canEditOwn) :
			echo JHTML::_('icon.create', $this->category  , $this->params, $this->access);
	endif; ?>
</div>