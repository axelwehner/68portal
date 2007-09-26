<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<script language="javascript" type="text/javascript">

	function tableOrdering( order, dir, task )
	{
		var form = document.adminForm;

		form.filter_order.value 	= order;
		form.filter_order_Dir.value	= dir;
		document.adminForm.submit( task );
	}
</script>
<form action="<?php echo JRoute::_('index.php?option=com_content&view=category&id='.$this->category->slug) ?>" method="post" name="adminForm">

<?php if ($this->params->get('filter') || $this->params->get('show_pagination_limit')) : ?>
<div class="filter">
	<?php if ($this->params->get('filter')) : ?>
	<div class="text">
		<label for="filter"><?php echo JText::_('Filter'); ?></label>
		<input type="text" name="filter" id="filter" value="<?php echo $this->lists['filter'];?>" class="inputbox" onchange="document.adminForm.submit();" />
	</div>
	<?php endif; ?>
	<?php if ($this->params->get('show_pagination_limit')) : ?>
	<div class="page">
		<label for="limit"><?php echo JText::_('Display Num'); ?></label>
		<?php echo $this->pagination->getLimitBox(); ?>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>

<table class="items category_table">

	<?php if ($this->params->get('show_headings')) : ?>
	<thead>
		<tr>
			<th class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> number" width="5%" scope="col">
				<?php echo JText::_('Num'); ?>
			</th>
			<?php if ($this->params->get('show_title')) : ?>
		 	<th class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> title" width="45%" scope="col">
				<?php echo JHTML::_('grid.sort',  'Item Title', 'a.title', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
			<?php endif; ?>
			<?php if ($this->params->get('show_date')) : ?>
			<th class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> date" width="25%" scope="col">
				<?php echo JHTML::_('grid.sort',  'Date', 'a.created', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
			<?php endif; ?>
			<?php if ($this->params->get('show_author')) : ?>
			<th class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> author"  width="20%" scope="col">
				<?php echo JHTML::_('grid.sort',  'Author', 'author', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
			<?php endif; ?>
			<?php if ($this->params->get('show_hits')) : ?>
			<th class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> hits" width="5%" nowrap="nowrap" scope="col">
				<?php echo JHTML::_('grid.sort',  'Hits', 'a.hits', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
			<?php endif; ?>
		</tr>
	</thead>
	<tfoot>
    	<tr class="sectiontablefooter<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
			<th class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> number" width="5%" scope="col">
				<?php echo JText::_('Num'); ?>
			</th>
			<?php if ($this->params->get('show_title')) : ?>
		 	<th class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> title" width="45%" scope="col">
				<?php echo JHTML::_('grid.sort',  'Item Title', 'a.title', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
			<?php endif; ?>
			<?php if ($this->params->get('show_date')) : ?>
			<th class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> date" width="25%" scope="col">
				<?php echo JHTML::_('grid.sort',  'Date', 'a.created', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
			<?php endif; ?>
			<?php if ($this->params->get('show_author')) : ?>
			<th class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> author"  width="20%" scope="col">
				<?php echo JHTML::_('grid.sort',  'Author', 'author', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
			<?php endif; ?>
			<?php if ($this->params->get('show_hits')) : ?>
			<th class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> hits" width="5%" nowrap="nowrap" scope="col">
				<?php echo JHTML::_('grid.sort',  'Hits', 'a.hits', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
			<?php endif; ?>
		</tr>
	</tfoot>
	<?php endif; ?>

	<tbody>
		<?php foreach ($this->items as $item) : ?>
		<tr class="sectiontableentry<?php echo ($item->odd +1 ) . $this->params->get( 'pageclass_sfx' ); ?>" >
			<th class="number">
				<?php echo $this->pagination->getRowOffset( $item->count ); ?>
			</th>
			<?php if ($this->params->get('show_title')) : ?>
			<?php if ($item->access <= $this->user->get('aid', 0)) : ?>
			<td class="title">
				<a href="<?php echo $item->link; ?>">
					<?php echo $item->title; ?></a>
					<?php $this->item = $item; echo JHTML::_('icon.edit', $item, $this->params, $this->access) ?>
			</td>
			<?php else : ?>
			<td class="title register">
				<?php
					echo $item->title.' : ';
					$link = JRoute::_('index.php?option=com_user&task=register');
				?>
				<a href="<?php echo $link; ?>">
					<?php echo JText::_( 'Register to read more...' ); ?>
				</a>
			</td>
			<?php endif; ?>
			<?php endif; ?>
			<?php if ($this->params->get('show_date')) : ?>
			<td class="date">
				<?php echo $item->created; ?>
			</td>
			<?php endif; ?>
			<?php if ($this->params->get('show_author')) : ?>
			<td class="author">
				<?php echo $item->created_by_alias ? $item->created_by_alias : $item->author; ?>
			</td>
			<?php endif; ?>
			<?php if ($this->params->get('show_hits')) : ?>
			<td class="hits">
				<?php echo $item->hits ? $item->hits : '-'; ?>
			</td>
			<?php endif; ?>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

<?php if ($this->params->get('show_pagination')) : ?>
	<p class="counter"><?php echo $this->pagination->getPagesCounter(); ?></p>
	<?php echo $this->pagination->getPagesLinks(); ?>
<?php endif; ?>

<input type="hidden" name="id" value="<?php echo $this->category->id; ?>" />
<input type="hidden" name="sectionid" value="<?php echo $this->category->sectionid; ?>" />
<input type="hidden" name="task" value="<?php echo $this->lists['task']; ?>" />
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="" />
</form>
