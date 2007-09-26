<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<ul class="breadcrumbs pathway">
<?php for ($i = 0; $i < $count; $i ++) :

	// If not the last item in the breadcrumbs add the separator
	if ($i < $count -1) : ?>
	<li><?php echo $list[$i]->link; ?></li>
	<?php else : ?>
	<li><?php echo $list[$i]->name; ?></li>

<?php
	endif;
endfor;
?>
</ul>