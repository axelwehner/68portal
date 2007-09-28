<?php

/**
* @version      $Id$
* @package      Joomla!
* @subpackage   68portal
* @copyright    Copyright (c)2007 Axel Wehner. All rights reserved.
* @license      GNU/GPL
**/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

/* sitetitle
******************************************************************/
$sitetitle = $mainframe->getCfg('sitename');
$menu = & JSite::getMenu();

/* layout settings
******************************************************************/
if ($this->countModules('left and right')) :
	$layout = 'left-n-right-col';
elseif ($this->countModules('left')) :
	$layout = 'left-col';
elseif ($this->countModules('right')) :
	$layout = 'right-col';
else :
	$layout = 'no-col';
endif;

if ($this->params->get('modulestyle') == 'modern') :
	$layout .= ' modern';
endif;


/* content module settings
******************************************************************/
if ($this->countModules('user1 and user2')) :
	$module1 = 'float1';
	$module2 = 'float2';
elseif ($this->countModules('user1 or user2')) :
	$module1 = '';
	$module2 = '';
endif;


/* opera css class (for breadcrumb correction)
******************************************************************/
if (stristr($_SERVER['HTTP_USER_AGENT'],'opera')) :
	$browser = 'class="opera"';
else :
	$browser = '';
endif;


/* user width
******************************************************************/
if ($this->params->get('width') == '' || !is_numeric($this->params->get('width'))) :
	$width = '75';
	$unit = 'em';
else :
	$width = $this->params->get('width');
	$unit =  $this->params->get('unit');
endif;


?>