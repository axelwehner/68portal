<?php defined('_JEXEC') or die('Restricted access'); ?>
<script language="javascript" type="text/javascript">
	function tableOrdering( order, dir, task ) {
	var form = document.adminForm;

	form.filter_order.value 	= order;
	form.filter_order_Dir.value	= dir;
	document.adminForm.submit( task );
}
</script>

<form action="<?php echo $this->action; ?>" method="post" name="adminForm">

<div class="filter">
	<div class="page">
		<label for="limit"><?php echo JText::_('Display Num'); ?></label>
		<?php echo $this->pagination->getLimitBox(); ?>
	</div>
</div>

<table class="items weblink_table" width="100%" border="0" cellspacing="0" cellpadding="0">
<?php if ( $this->params->def( 'show_headings', 1 ) ) : ?>
<thead>
<tr>
	<th scope="col" style="text-align:center;" class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> number">
		<?php echo JText::_('Num'); ?>
	</th>
	<th scope="col" class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> title">
		<?php echo JHTML::_('grid.sort',  'Web Link', 'title', $this->lists['order_Dir'], $this->lists['order'] ); ?>
	</th>
	<?php if ( $this->params->get( 'show_link_hits' ) ) : ?>

	<th scope="col" class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> hits" nowrap="nowrap">
		<?php echo JHTML::_('grid.sort',  'Hits', 'hits', $this->lists['order_Dir'], $this->lists['order'] ); ?>
	</th>
	<?php endif; ?>
</tr>
</thead>
<tfoot>
<tr>
	<th scope="col" style="text-align:center;" class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> number">
		<?php echo JText::_('Num'); ?>
	</th>
	<th scope="col" class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> title">
		<?php echo JHTML::_('grid.sort',  'Web Link', 'title', $this->lists['order_Dir'], $this->lists['order'] ); ?>
	</th>
	<?php if ( $this->params->get( 'show_link_hits' ) ) : ?>

	<th scope="col" class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> hits" nowrap="nowrap">
		<?php echo JHTML::_('grid.sort',  'Hits', 'hits', $this->lists['order_Dir'], $this->lists['order'] ); ?>
	</th>
	<?php endif; ?>
</tr>
</tfoot>
<?php endif; ?>
<tbody>
<?php foreach ($this->items as $item) : ?>
<tr class="sectiontableentry<?php echo $item->odd + 1; ?>">
	<th scope="row">
		<?php echo $this->pagination->getRowOffset( $item->count ); ?>
	</th>
	<td class="title">
		<?php if ( $item->image ) : ?>
		<span class="link_image"><?php echo $item->image;?></span>
		<?php endif; ?>
		<?php echo $item->link; ?>
		<?php if ( $this->params->get( 'show_link_description' ) ) : ?>
		<br /><small class="description"><?php echo nl2br($item->description); ?></small>
		<?php endif; ?>
	</td>
	<?php if ( $this->params->get( 'show_link_hits' ) ) : ?>
	<td class="hits">
		<?php echo $item->hits; ?>
	</td>
	<?php endif; ?>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<?php if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->get('pages.total') > 1)) : ?>
<p class="pagecounter">
	<?php echo $this->pagination->getPagesCounter(); ?>
</p>
	<?php if ($this->params->def('show_pagination_results', 1)) : ?>
		<?php echo $this->pagination->getPagesLinks(); ?>
	<?php endif; ?>

<?php endif; ?>

<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="" />
</form>