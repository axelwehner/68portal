<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<h3>
	<img src="components/com_poll/assets/poll.png" border="0" width="12" height="14" alt="" />
	<?php echo $this->poll->title; ?>
</h3>

<table class="items poll_table" cellspacing="0" cellpadding="0" border="0">
<thead>
<tr>
	<th id="votes" class="votes"><?php echo JText::_('Number of Votes'); ?></th>
	<th id="percent"><?php echo JText::_('Percent'); ?></th>
</tr>
</thead>
<tbody>
<?php foreach($this->votes as $vote) : ?>
	<tr class="sectiontableentry<?php echo $vote->odd; ?>">
		<th class="title" colspan="2">
			<?php echo $vote->text; ?>
		</th>
	</tr>
	<tr class="sectiontableentry<?php echo $vote->odd; ?>">
		<td headers="votes" class="votes">
			<strong><?php echo $vote->hits; ?></strong>&nbsp;
		</td>
		<td headers="percent">
			<?php echo $vote->percent; ?>%
			<div class="<?php echo $vote->class; ?>" style="height:<?php echo $vote->barheight; ?>px;width:<?php echo $vote->percent; ?>%"></div>
		</td>
	</tr>
<?php endforeach; ?>
</tbody>
</table>
<ul class="poll_meta meta">
		<li class="vote_counter">
			<?php echo JText::_( 'Number of Voters' ); ?>:
			<strong><?php if(isset($this->votes[0])) echo $this->votes[0]->voters; ?></strong>
		</li>

		<li class="first_vote">
			<?php echo JText::_( 'First Vote' ); ?>:
			<strong><?php echo $this->first_vote; ?></strong>
		</li>

		<li class="last_vote">
			<?php echo JText::_( 'Last Vote' ); ?>:
			<strong><?php echo $this->last_vote; ?></strong>
		</li>
</ul>