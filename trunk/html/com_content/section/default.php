<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php if ($this->params->get('show_page_title')) : ?>
<h1 class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
	<?php echo $this->section->title; ?>
</h1>
<?php endif; ?>
<div class="categorylist<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
	<div class="contentdescription<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
	<?php if ($this->params->get('show_description_image') && $this->section->image) : ?>
		<div class="description_image" style="float: <?php echo $this->section->image_position;?>;">
			<img src="<?php echo $this->baseurl ?>/images/stories/<?php echo $this->section->image;?>" alt="<?php echo $this->section->image;?>" />
    	</div>
	<?php endif; ?>
	<?php if ($this->params->get('show_description') && $this->section->description) : ?>
		<div class="description_text">
			<?php echo $this->section->description; ?>
		</div>
	<?php endif; ?>
	</div>

	<?php if ($this->params->get('show_categories', 1)) : ?>
	<ul class="categories">
	<?php foreach ($this->categories as $category) : ?>
		<?php if (!$this->params->get('show_empty_categories') && !$category->numitems) continue; ?>
		<li class="category<?php echo $category->id; ?>">
			<h3>
				<a href="<?php echo $category->link; ?>" class="category"><?php echo $category->title;?></a>
                <?php if ($this->params->get('show_cat_num_articles')) : ?>
				<small class="article_count">(<?php echo $category->numitems ." ". JText::_( 'items' );?>)</small>
				<?php endif; ?>
			</h3>
			<?php if ($this->params->def('show_category_description', 1) && $category->description) : ?>
			<div class="description">
				<?php echo $category->description; ?>
			</div>
			<?php endif; ?>
		</li>
	<?php endforeach; ?>
	</ul>
	<?php endif; ?>
</div>