<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php if ($this->user->authorize('com_content', 'edit', 'content', 'all')) : ?>
	<div class="contentpaneopen_edit<?php echo $this->item->params->get( 'pageclass_sfx' ); ?>" style="float: left;">
		<?php echo JHTML::_('icon.edit', $this->item, $this->item->params, $this->access); ?>
	</div>
<?php endif; ?>

<?php if ($this->item->params->get('show_title') || $this->item->params->get('show_pdf_icon') || $this->item->params->get('show_print_icon') || $this->item->params->get('show_email_icon')) : ?>
<div class="article<?php echo $this->item->params->get( 'pageclass_sfx' ); ?> article<?php echo $this->item->id; ?>">

	<?php if ($this->item->params->get('show_pdf_icon') || $this->item->params->get('show_print_icon') || $this->item->params->get('show_email_icon')) : ?>
    <ul class="buttonheading">
	<?php endif; ?>
		<?php if ($this->item->params->get('show_pdf_icon')) : ?>
		<li class="pdf">
			<?php echo JHTML::_('icon.pdf', $this->item, $this->item->params, $this->access); ?>
		</li>
		<?php endif; ?>

		<?php if ( $this->item->params->get( 'show_print_icon' )) : ?>
		<li class="print">
			<?php echo JHTML::_('icon.print_popup', $this->item, $this->item->params, $this->access); ?>
		</li>
		<?php endif; ?>

		<?php if ($this->item->params->get('show_email_icon')) : ?>
		<li class="email">
			<?php echo JHTML::_('icon.email', $this->item, $this->item->params, $this->access); ?>
		</li>
		<?php endif; ?>
    <?php if ($this->item->params->get('show_pdf_icon') || $this->item->params->get('show_print_icon') || $this->item->params->get('show_email_icon')) : ?>
	</ul>
	<?php endif; ?>

	<?php if ($this->item->params->get('show_title')) : ?>
	<h2 class="contentheading<?php echo $this->item->params->get( 'pageclass_sfx' ); ?>">
		<?php if ($this->item->params->get('link_titles') && $this->item->readmore_link != '') : ?>
		<a href="<?php echo $this->item->readmore_link; ?>" class="contentpagetitle<?php echo $this->item->params->get( 'pageclass_sfx' ); ?>">
			<?php echo $this->item->title; ?>
		</a>
		<?php else : ?>
			<?php echo $this->item->title; ?>
		<?php endif; ?>
	</h2>
	<?php endif; ?>

<?php endif; ?>

	<?php  if (!$this->item->params->get('show_intro')) :
		echo $this->item->event->afterDisplayTitle;
	endif; ?>

	<?php echo $this->item->event->beforeDisplayContent; ?>

	<ul class="meta">

		<?php if (($this->item->params->get('show_section') && $this->item->sectionid) || ($this->item->params->get('show_category') && $this->item->catid)) : ?>
			<li class="section category">
				<?php if ($this->item->params->get('show_section') && $this->item->sectionid && isset($this->item->section)) : ?>
				<small class="section">
					<?php if ($this->item->params->get('link_section')) : ?>
					<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getSectionRoute($this->item->sectionid)).'">'; ?>
					<?php endif; ?>
						<?php echo $this->item->section;
					if ($this->item->params->get('link_section')) : ?></a>
					<?php endif; ?>
				</small>
				<?php endif; ?>

                <?php if ($this->item->params->get('show_category')) : ?>
					<?php echo ' - '; ?>
				<?php endif; ?>

				<?php if ($this->item->params->get('show_category') && $this->item->catid) : ?>
				<small class="category">
					<?php if ($this->item->params->get('link_category')) : ?>
					<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug, $this->item->sectionid)).'">'; ?>
					<?php endif; ?>
						<?php echo $this->item->category; ?>
					<?php if ($this->item->params->get('link_section')) : ?>
					</a>
					<?php endif; ?>
				</small>
				<?php endif; ?>
			</li>
		<?php endif; ?>

    	<?php if ($this->item->params->get('show_create_date')) : ?>
		<li class="date createdate">
			<small><?php echo JHTML::_('date', $this->item->created, JText::_('DATE_FORMAT_LC2')); ?></small>
		</li>
		<?php endif; ?>

    	<?php if ( intval($this->item->modified) != 0 && $this->item->params->get('show_modify_date')) : ?>
		<li class="date modifydate">
			<small><?php echo JText::_( 'Last Updated' ); ?> ( <?php echo JHTML::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC2')); ?> )</small>
		</li>
		<?php endif; ?>

		<?php if (($this->item->params->get('show_author')) && ($this->item->author != "")) : ?>
		<li class="author">
			<small><?php JText::printf( 'Written by', ($this->item->created_by_alias ? $this->item->created_by_alias : $this->item->author) ); ?></small>
		</li>
		<?php endif; ?>

		<?php if ($this->item->params->get('show_url') && $this->item->urls) : ?>
		<li class="url">
			<small><a href="http://<?php echo $this->item->urls ; ?>" target="_blank"><?php echo $this->item->urls; ?></a></small>
		</li>
		<?php endif; ?>
	</ul>

	<?php if (isset ($this->item->toc)) : ?>
	<div class="content_toc">
		<?php echo $this->item->toc; ?>
	</div>
	<?php endif; ?>

	<!-- article content -->
	<?php echo $this->item->text; ?>
	<!-- //article content -->

	<?php if ($this->item->params->get('show_readmore') && $this->item->readmore) : ?>
	<p class="readmore">
		<a href="<?php echo $this->item->readmore_link; ?>" class="readon<?php echo $this->item->params->get( 'pageclass_sfx' ); ?>">
			<?php if ($this->item->readmore_register) : ?>
				<?php echo JText::_('Register to read more...'); ?>
			<?php else : ?>
				<?php echo JText::sprintf('Read more', $this->item->params->get('readmore', $this->item->title)); ?>
			<?php endif; ?>
		</a>
	</p>
	<?php endif; ?>

</div>
<?php echo $this->item->event->afterDisplayContent; ?>