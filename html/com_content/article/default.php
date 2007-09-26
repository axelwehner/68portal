<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php if ($this->user->authorize('com_content', 'edit', 'content', 'all') && !$this->print) : ?>
	<div class="contentpaneopen_edit<?php echo $this->params->get( 'pageclass_sfx' ); ?>" style="float: left;">
		<?php echo JHTML::_('icon.edit', $this->article, $this->params, $this->access); ?>
	</div>
<?php endif; ?>

<?php if ($this->params->get('show_title') || $this->params->get('show_pdf_icon') || $this->params->get('show_print_icon') || $this->params->get('show_email_icon')) : ?>

<?php if ($this->params->get('show_title')) :
	$class= ' heading';
else :
	$class= ' noheading';
endif;
?>

<div class="article<?php echo $this->params->get( 'pageclass_sfx' ); ?> article<?php echo $this->article->id.$class; ?>">

    <?php if ($this->params->get('show_pdf_icon') || $this->params->get('show_print_icon') || $this->params->get('show_email_icon')) : ?>
	<ul class="buttonheading">
		<?php if (!$this->print) : ?>
		<?php if ($this->params->get('show_pdf_icon')) : ?>
		<li class="print">
			<?php echo JHTML::_('icon.pdf',  $this->article, $this->params, $this->access); ?>
		</li>
		<?php endif; ?>

		<?php if ( $this->params->get( 'show_print_icon' )) : ?>
		<li class="print print_pop">
			<?php echo JHTML::_('icon.print_popup',  $this->article, $this->params, $this->access); ?>
		</li>
		<?php endif; ?>

		<?php if ($this->params->get('show_email_icon')) : ?>
		<li class="email">
			<?php echo JHTML::_('icon.email',  $this->article, $this->params, $this->access); ?>
		</li>
		<?php endif; ?>
		<?php else : ?>
		<li class="print print_screen">
			<?php echo JHTML::_('icon.print_screen',  $this->article, $this->params, $this->access); ?>
		</li>
		<?php endif; ?>
	</ul>
	<?php endif; ?>

	<?php if ($this->params->get('show_title')) : ?>
	<h1 class="contentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
		<?php if ($this->params->get('link_titles') && $this->article->readmore_link != '') : ?>
		<a href="<?php echo $this->article->readmore_link; ?>" class="contentpagetitle<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
			<?php echo $this->article->title; ?>
		</a>
		<?php else : ?>
			<?php echo $this->escape($this->article->title); ?>
		<?php endif; ?>
	</h1>
	<?php endif; ?>

<?php endif; ?>

<?php  if (!$this->params->get('show_intro')) :
	echo $this->article->event->afterDisplayTitle;
endif; ?>

<div class="articlecontent">
<?php echo $this->article->event->beforeDisplayContent; ?>

	<ul class="meta">
        <?php if (($this->params->get('show_section') && $this->article->sectionid) || ($this->params->get('show_category') && $this->article->catid)) : ?>
			<li class="section category">
				<?php if ($this->params->get('show_section') && $this->article->sectionid && isset($this->article->section)) : ?>
				<small class="section">
					<?php echo JText::_('Section: ');?>
					<?php if ($this->params->get('link_section')) : ?>
						<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getSectionRoute($this->article->sectionid)).'">'; ?>
					<?php endif; ?>
						<?php echo $this->article->section;
					if ($this->params->get('link_section')) : ?><?php echo '</a>'; ?>
					<?php endif; ?>

					<?php if ($this->params->get('show_category')) : ?>
					<?php echo ' - '; ?>
					<?php endif; ?>
				</small>
				<?php endif; ?>

				<?php if ($this->params->get('show_category') && $this->article->catid) : ?>
				<small class="category">
					<?php echo JText::_('Category: ');?>
					<?php if ($this->params->get('link_category')) : ?>
						<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->article->catslug, $this->article->sectionid)).'">'; ?>
					<?php endif; ?>
						<?php echo $this->article->category; ?>
					<?php if ($this->params->get('link_section')) : ?>
						<?php echo '</a>'; ?>
					<?php endif; ?>
				</small>
				<?php endif; ?>
			</li>
		<?php endif; ?>

		<?php if ($this->params->get('show_create_date')) : ?>
		<li class="date createdate">
			<small><?php echo JHTML::_('date', $this->article->created, JText::_('DATE_FORMAT_LC2')) ?></small>
		</li>
		<?php endif; ?>

		<?php if ( intval($this->article->modified) !=0 && $this->params->get('show_modify_date')) : ?>
		<li class="date modifydate">
			<small><?php echo JText::_( 'Last Updated' ); ?> <?php echo JHTML::_('date', $this->article->modified, JText::_('DATE_FORMAT_LC2')); ?></small>
		</li>
		<?php endif; ?>

        <?php if (($this->params->get('show_author')) && ($this->article->author != "")) : ?>
		<li class="author">
			<small>
				<?php JText::printf( 'Written by', ($this->article->created_by_alias ? $this->article->created_by_alias : $this->article->author) ); ?>
			</small>
		</li>
		<?php endif; ?>

		<?php if ($this->params->get('show_url') && $this->article->urls) : ?>
		<li class="url">
			<small><a href="http://<?php echo $this->article->urls ; ?>" target="_blank"><?php echo $this->article->urls; ?></a></small>
		</li>
		<?php endif; ?>
	</ul>

	<?php if (isset ($this->article->toc)) : ?>
	<div class="content_toc">
		<?php echo $this->article->toc; ?>
	</div>
	<?php endif; ?>

	<!-- article content -->
	<?php echo $this->article->text; ?>
    <!-- //article content -->
</div>
</div>
<?php echo $this->article->event->afterDisplayContent; ?>