<?php defined('_JEXEC') or die('Restricted access'); ?>
<div class="weblinks<?php echo $this->params->get( 'pageclass_sfx' ); ?> weblink_cat<?php echo $this->category->id; ?>">

	<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
	<h1 class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
		<?php echo $this->category->title; ?>
	</h1>
	<?php endif; ?>

	<?php if ( @$this->category->image || @$this->category->description ) : ?>
	<div class="contentdescription<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
	<?php
		if ( isset($this->category->image) ) :  echo $this->category->image; endif;
		echo $this->category->description;
	?>
	</div>
	<?php endif; ?>

	<?php echo $this->loadTemplate('items'); ?>

</div>