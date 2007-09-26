<?php defined('_JEXEC') or die('Restricted access'); ?>

<form id="searchForm" action="<?php echo JRoute::_( 'index.php?option=com_search' );?>" method="post" name="searchForm">

	<div class="search_word">
		<h2><label for="search_searchword"><?php echo JText::_( 'Search Keyword' ); ?>:	</label></h2>
		<input type="text" name="searchword" id="search_searchword" size="30" maxlength="20" value="<?php echo $this->escape($this->searchword); ?>" class="inputbox" />
		<button name="Search" onclick="this.form.submit()" class="button"><?php echo JText::_( 'Search' );?></button>
	</div>

    <div class="search_phrase">
		<?php echo $this->lists['searchphrase']; ?>
    </div>

	<div class="search_ordering">
		<h3><label for="ordering"><?php echo JText::_( 'Ordering' );?>:</label></h3>
		<?php echo $this->lists['ordering'];?>
	</div>

	<?php if ($this->params->get( 'search_areas', 1 )) : ?>
	<div class="search_only">
		<h3><?php echo JText::_( 'Search Only' );?>:</h3>
		<?php foreach ($this->searchareas['search'] as $val => $txt) :
			$checked = is_array( $this->searchareas['active'] ) && in_array( $val, $this->searchareas['active'] ) ? 'checked="true"' : '';
		?>
		<input type="checkbox" name="areas[]" value="<?php echo $val;?>" id="area_<?php echo $val;?>" <?php echo $checked;?> />
		<label for="area_<?php echo $val;?>"><?php echo JText::_($txt); ?></label>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>


	<div class="searchintro">
		<?php echo JText::_( 'Search Keyword' ) .' <strong><em>'. $this->escape($this->searchword) .'</em></strong>'; ?>
		<?php echo $this->result; ?>
		<a href="http://www.google.com/search?q=<?php echo $this->escape($this->searchword); ?>" target="_blank"><?php echo $this->image; ?></a>
	</div>

	<?php if($this->result > 0) : ?>
	<div align="center">
		<div style="float: right;">
			<label for="limit"><?php echo JText::_( 'Display Num' ); ?></label>
			<?php echo $this->pagination->getLimitBox( ); ?>
		</div>
		<div>
			<?php echo $this->pagination->getPagesCounter(); ?>
		</div>
	</div>
	<?php endif; ?>

<input type="hidden" name="task" value="search" />
</form>