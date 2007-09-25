<?php /** $Id: default_address.php 8178 2007-07-23 05:39:47Z eddieajau $ */ defined( '_JEXEC' ) or die(); ?>
<?php if ( ( $this->contact->params->get( 'address_check' ) > 0 ) &&  ( $this->contact->address || $this->contact->suburb  || $this->contact->state || $this->contact->country || $this->contact->postcode ) ) : ?>
<div class="address">
	<address>
		<dl>
			<?php if ( $this->contact->address && $this->contact->params->get( 'show_street_address' ) ) : ?>
		    <dt class="street"><?php echo JText::_('Street'); ?></dt>
			<dd class="street"><?php echo nl2br($this->contact->address); ?></dd>
			<?php endif; ?>

			<?php if ( $this->contact->suburb && $this->contact->params->get( 'show_suburb' ) ) : ?>
			<dt class="town"><?php echo JText::_('Town'); ?></dt>
			<dd class="town"><?php echo $this->contact->suburb; ?></dd>
			<?php endif; ?>

	        <?php if ( $this->contact->postcode && $this->contact->params->get( 'show_postcode' ) ) : ?>
			<dt class="postcode"><?php echo JText::_('Postal Code'); ?></dt>
			<dd class="postcode"><?php echo $this->contact->postcode; ?></dd>
			<?php endif; ?>

			<?php if ( $this->contact->state && $this->contact->params->get( 'show_state' ) ) : ?>
			<dt class="state"><?php echo JText::_('State'); ?></dt>
			<dd class="state"><?php echo $this->contact->state; ?></dd>
			<?php endif; ?>

			<?php if ( $this->contact->country && $this->contact->params->get( 'show_country' ) ) : ?>
			<dt class="country"><?php echo JText::_('Country'); ?></dt>
			<dd class="country"><?php echo $this->contact->country; ?></dd>
			<?php endif; ?>
		</dl>
	</address>

	<?php endif; ?>
	<?php if ( ($this->contact->email_to && $this->contact->params->get( 'show_email' )) || $this->contact->telephone  || $this->contact->fax ) : ?>
	<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<?php if ( $this->contact->email_to && $this->contact->params->get( 'show_email' ) ) : ?>
	<tr>
		<td width="<?php echo $this->contact->params->get( 'column_width' ); ?>" >
			<?php echo $this->contact->params->get( 'marker_email' ); ?>
		</td>
		<td>
			<?php echo $this->contact->email_to; ?>
		</td>
	</tr>
	<?php endif; ?>
	<?php if ( $this->contact->telephone && $this->contact->params->get( 'show_telephone' ) ) : ?>
	<tr>
		<td width="<?php echo $this->contact->params->get( 'column_width' ); ?>" >
			<?php echo $this->contact->params->get( 'marker_telephone' ); ?>
		</td>
		<td>
			<?php echo nl2br($this->contact->telephone); ?>
		</td>
	</tr>
	<?php endif; ?>
	<?php if ( $this->contact->fax && $this->contact->params->get( 'show_fax' ) ) : ?>
	<tr>
		<td width="<?php echo $this->contact->params->get( 'column_width' ); ?>" >
			<?php echo $this->contact->params->get( 'marker_fax' ); ?>
		</td>
		<td>
			<?php echo nl2br($this->contact->fax); ?>
		</td>
	</tr>
	<?php endif; ?>
	<?php if ( $this->contact->mobile && $this->contact->params->get( 'show_mobile' ) ) :?>
	<tr>
		<td width="<?php echo $this->contact->params->get( 'column_width' ); ?>" >
		</td>
		<td>
			<?php echo nl2br($this->contact->mobile); ?>
		</td>
	</tr>
	<?php endif; ?>
	<?php if ( $this->contact->webpage && $this->contact->params->get( 'show_webpage' )) : ?>
	<tr>
		<td width="<?php echo $this->contact->params->get( 'column_width' ); ?>" >
		</td>
		<td>
			<a href="<?php echo $this->contact->webpage; ?>" target="_blank">
				<?php echo $this->contact->webpage; ?>
			</a>
		</td>
	</tr>
	<?php endif; ?>
	</table>
	<?php endif; ?>
	<br />
<?php if ( $this->contact->misc && $this->contact->params->get( 'show_misc' ) ) : ?>
<p class="misc">
	<?php echo $this->contact->misc; ?>
</p>
<?php endif; ?>
</div>