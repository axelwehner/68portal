<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<div class="weblinks weblinks<?php echo $this->params->get( 'pageclass_sfx' ); ?>">

	<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
	<h1 class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
		<?php echo $this->params->get('page_title'); ?>
	</h1>
	<?php endif; ?>

	<?php if ( ($this->params->def('image', -1) != -1) || $this->params->def('show_comp_description', 1) ) : ?>
	<div class="contentdescription<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
	<?php
		if ( isset($this->image) ) :
			echo $this->image;
		endif;
		echo $this->params->get('comp_description');
	?>
	</div>
	<?php endif; ?>

	<ul class="categories">
	<?php foreach ( $this->categories as $category ) : ?>
		<li class="cat<?php echo $category->id;?>">
			<h3>
			<a href="<?php echo $category->link; ?>" class="category<?php echo $this->params->get( 'pageclass_sfx' ); ?>"><?php echo $category->title;?></a>
			<small>(<?php echo $category->numlinks;?>)</small>
			</h3>
		</li>
	<?php endforeach; ?>
	</ul>

</div>