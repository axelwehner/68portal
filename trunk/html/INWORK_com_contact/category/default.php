<?php

/**
* @version      $Id$
* @package      Joomla!
* @subpackage   68portal
* @license      GNU/GPL
**/

defined( '_JEXEC' ) or die('Restricted access');

?>
<div class="contact_categories contact<?php echo $this->params->get( 'pageclass_sfx' ); ?>">

<?php if ( $this->params->get( 'show_page_title' ) ) : ?>
<h1 class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
<?php if ($this->category->title) :
	echo $this->params->get('page_title').' - '.$this->category->title;
else :
	echo $this->params->get('page_title');
endif; ?>
</h1>
<?php endif; ?>

<?php if ($this->category->image || $this->category->description) : ?>
	<div class="contentdescription<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
	<?php if ($this->params->get('image') != -1 && $this->params->get('image') != '') : ?>
		<div class="description_image" style="float: <?php echo $this->params->get('image_align'); ?>">
			<img src="images/stories/<?php echo $this->params->get('image'); ?>" alt="<?php echo JText::_( 'Contacts' ); ?>" />
    	</div>
	<?php elseif ($this->category->image) : ?>
		<div class="description_image" style="float: <?php echo $this->params->get('image_align'); ?>">
        	<img src="images/stories/<?php echo $this->category->image; ?>" alt="<?php echo JText::_( 'Contacts' ); ?>" />
		</div>
	<?php endif; ?>
		<div class="description_text">
			<?php echo $this->category->description; ?>
		</div>
	</div>
<?php endif; ?>
<script language="javascript" type="text/javascript">
	function tableOrdering( order, dir, task ) {
	var form = document.adminForm;

	form.filter_order.value 	= order;
	form.filter_order_Dir.value	= dir;
	document.adminForm.submit( task );
}
</script>
<form action="<?php echo $this->action; ?>" method="post" name="adminForm">
	<?php if ($this->params->get('show_limit')) : ?>
	<div class="filter">
		<div class="page">
			<label for="limit"><?php echo JText::_('Display Num');?></label>
			<?php echo $this->pagination->getLimitBox();?>
		</div>
	</div>
	<?php endif; ?>

	<table class="items contact_table" border="0" cellspacing="0" cellpadding="0">
		<?php if ($this->params->get( 'show_headings' )) : ?>
        <thead>
			<tr>
				<th class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> number">
					<?php echo JText::_('Num'); ?>
				</th>
				<th class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> title name">
					<?php echo JHTML::_('grid.sort',  'Name', 'cd.name', $this->lists['order_Dir'], $this->lists['order'] ); ?>
				</th>
				<?php if ( $this->params->get( 'show_position' ) ) : ?>
				<th class="sectiontableheader<?php echo  $this->params->get( 'pageclass_sfx' ); ?> position">
					<?php echo JHTML::_('grid.sort',  'Position', 'cd.con_position', $this->lists['order_Dir'], $this->lists['order'] ); ?>
				</th>
				<?php endif; ?>
				<?php if ( $this->params->get( 'show_email' ) ) : ?>
				<th class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> email">
					<?php echo JText::_( 'Email' ); ?>
				</th>
				<?php endif; ?>
				<?php if ( $this->params->get( 'show_telephone' ) ) : ?>
				<th class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> phone">
					<?php echo JText::_( 'Phone' ); ?>
				</th>
				<?php endif; ?>
				<?php if ( $this->params->get( 'show_mobile' ) ) : ?>
				<th class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> mobile">
					<?php echo JText::_( 'Mobile' ); ?>
				</th>
				<?php endif; ?>
				<?php if ( $this->params->get( 'show_fax' ) ) : ?>
				<th class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> fax">
					<?php echo JText::_( 'Fax' ); ?>
				</th>
				<?php endif; ?>
			</tr>

		</thead>
        <tfoot>
			<tr>
				<th class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> number">
					<?php echo JText::_('Num'); ?>
				</th>
				<th class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> title name">
					<?php echo JHTML::_('grid.sort',  'Name', 'cd.name', $this->lists['order_Dir'], $this->lists['order'] ); ?>
				</th>
				<?php if ( $this->params->get( 'show_position' ) ) : ?>
				<th class="sectiontableheader<?php echo  $this->params->get( 'pageclass_sfx' ); ?> position">
					<?php echo JHTML::_('grid.sort',  'Position', 'cd.con_position', $this->lists['order_Dir'], $this->lists['order'] ); ?>
				</th>
				<?php endif; ?>
				<?php if ( $this->params->get( 'show_email' ) ) : ?>
				<th class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> email">
					<?php echo JText::_( 'Email' ); ?>
				</th>
				<?php endif; ?>
				<?php if ( $this->params->get( 'show_telephone' ) ) : ?>
				<th class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> phone">
					<?php echo JText::_( 'Phone' ); ?>
				</th>
				<?php endif; ?>
				<?php if ( $this->params->get( 'show_mobile' ) ) : ?>
				<th class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> mobile">
					<?php echo JText::_( 'Mobile' ); ?>
				</th>
				<?php endif; ?>
				<?php if ( $this->params->get( 'show_fax' ) ) : ?>
				<th class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?> fax">
					<?php echo JText::_( 'Fax' ); ?>
				</th>
				<?php endif; ?>
			</tr>
		</tfoot>
		<?php endif; ?>
		<tbody>
		<?php echo $this->loadTemplate('items'); ?>
		</tbody>
	</table>

	<p class="counter"><?php echo $this->pagination->getPagesCounter(); ?></p>
	<?php echo $this->pagination->getPagesLinks(); ?>

	<input type="hidden" name="option" value="com_contact" />
	<input type="hidden" name="catid" value="<?php echo $this->category->id;?>" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="" />
</form>
</div>