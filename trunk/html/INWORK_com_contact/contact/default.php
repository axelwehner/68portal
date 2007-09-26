<?php

/**
* @version      $Id$
* @package      Joomla!
* @subpackage   68portal
* @license      GNU/GPL
**/

defined( '_JEXEC' ) or die('Restricted access');
?>

<div class="contact_item contact<?php echo $this->params->get( 'pageclass_sfx' ); ?>">

	<?php if ( $this->params->get( 'show_page_title' ) && !$this->contact->params->get( 'popup' ) ) : ?>
	<h1 class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
		<?php echo $this->params->get( 'page_title' ); ?>
	</h1>
	<?php endif; ?>

	<?php if ( $this->params->get( 'show_contact_list' ) && count( $this->contacts ) > 1) : ?>
	<form action="<?php echo JRoute::_('index.php') ?>" method="post" name="selectForm" id="selectForm">
		<?php echo JText::_( 'Select Contact' ); ?>:
		<br />
		<?php echo JHTML::_('select.genericlist',  $this->contacts, 'contact_id', 'class="inputbox" onchange="this.form.submit()"', 'id', 'name', $this->contact->id);?>
		<option type="hidden" name="option" value="com_contact" />
	</form>
	<?php endif; ?>

	<?php if ( $this->contact->name && $this->contact->params->get( 'show_name' ) || $this->contact->con_position && $this->contact->params->get( 'show_position' ) ) : ?>

		<h2 class="name">
			<?php echo $this->contact->name; ?>
			<?php if ( $this->contact->con_position && $this->contact->params->get( 'show_position' ) ) : ?>
			<small><?php echo $this->contact->con_position; ?></small>
			<?php endif; ?>
		</h2>
	<?php endif; ?>

	<?php if ( $this->contact->image && $this->contact->params->get( 'show_image' ) ) : ?>
	<div class="contact_image">
		<img src="images/stories/<?php echo $this->contact->image; ?>" align="middle" alt="<?php echo JText::_( 'Contact' ); ?>" />
	</div>
	<?php endif; ?>

	<?php echo $this->loadTemplate('address'); ?>

	<?php if ( $this->contact->params->get( 'allow_vcard' ) ) : ?>
	<p class="vcard">
		<?php echo JText::_( 'Download information as a' );?>
		<a href="index.php?option=com_contact&amp;task=vcard&amp;contact_id=<?php echo $this->contact->id; ?>&amp;format=raw&amp;tmpl=component"><?php echo JText::_( 'VCard' );?></a>
	</p>
	<?php endif; ?>

	<?php if ( $this->contact->params->get('show_email_form') && ($this->contact->email_to || $this->contact->user_id))
		echo $this->loadTemplate('form');
	?>
</div>