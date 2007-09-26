<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<div class="blog<?php echo $this->params->get('pageclass_sfx') ?>">

	<?php if ($this->params->get('show_page_title')) : ?>
	<h1 class="componentheading<?php echo $this->params->get('pageclass_sfx') ?>">
		<?php echo $this->params->get('page_title'); ?>
	</h1>
	<?php endif; ?>

	<?php if (isset($this->frontpage->description)) : ?>
	<div class="contentdescription<?php echo $this->params->get('pageclass_sfx') ?>">
		<?php if ($this->params->get('show_description_image') && $this->frontpage->description->image) : ?>
			<img src="<?php echo $this->frontpage->description->link ?>" align="<?php echo $this->frontpage->description->image_position ?>"  alt="" />
		<?php endif; ?>
		<?php if ($this->params->get('show_description') && $this->frontpage->description->text) : ?>
			<?php echo $this->frontpage->description->text; ?>
		<?php endif; ?>
	</div>
	<?php endif; ?>

<?php
$i = $this->pagination->limitstart;
$numrow = $this->params->def('num_leading_articles', 1);

if ($numrow) :

	for ($y = 0; $y < $numrow && $i < $this->total; $y++, $i++) : ?>

		<div class="leading">
        <?php
			$this->item =& $this->getItem($i, $this->params);
			echo $this->loadTemplate('item');
		?>
		</div>

	<?php endfor; ?>

	<div class="rowsep leadingsep clear"></div>

<?php endif; ?>

<?php
$nrintros = $this->params->def('num_intro_articles', 4);

if ($nrintros) :

	$nrcolumns = $this->params->def('num_columns', 2);
	$nrcolumns == 0 ? $nrcolumns = 1 : $nrcolumns;
	$nrrows = (int) $nrintros / $nrcolumns ;
	$ii = 0;

	for ($z = 0; $z < $nrrows && $i < $this->total; $z++) : ?>

		<div class="blog_row cols<?php echo $nrcolumns; ?>">

		<?php
		for ($y = 0; $y < $nrcolumns && $ii < $nrintros && $i < $this->total; $y++, $i++, $ii++) :
			$this->item =& $this->getItem($i, $this->params);
			?>

			<div class="col<?php echo $y ?>">
				<?php echo $this->loadTemplate('item');	?>
			</div>

		<?php endfor; ?>

		</div>

	<?php endfor; ?>

<?php endif; ?>

<?php if ($this->params->def('num_links', 4) && ($i < $this->total)) : ?>
		<div class="blog_more<?php echo $this->params->get('pageclass_sfx') ?>">
			<?php
			$this->links = array_splice($this->items, $i);
			echo $this->loadTemplate('links');
			?>
		</div>
<?php endif; ?>

<?php if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->get('pages.total') > 1)) : ?>
	<?php if ($this->params->def('show_pagination_results', 1)) : ?>
    <p class="counter">
		<?php echo $this->pagination->getPagesCounter(); ?>
	</p>
	<?php endif; ?>
	<?php echo $this->pagination->getPagesLinks(); ?>
<?php endif; ?>
</div>
