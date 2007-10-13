<?php // no direct access

/**
* @version      $Id$
* @package      Joomla!
* @subpackage   68portal
* @license      GNU/GPL
**/

defined('_JEXEC') or die('Restricted access');
?>

<ul class="breadcrumbs pathway">
<?php for ($i = 0; $i < $count; $i ++) :

	// If not the last item in the breadcrumbs add the separator
	if ($i < $count -1) : ?>
	<li><?php echo '<a href="'.$list[$i]->link.'">'.$list[$i]->name.'</a>'; ?></li>
	<?php else : ?>
	<li><?php echo $list[$i]->name; ?></li>

<?php
	endif;
endfor;
?>
</ul>