<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2006 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  if ($osC_Customer->isLoggedOn() === false) {
    if (!empty($_GET)) {
      $first_array = array_slice($_GET, 0, 1);
    }

    if (empty($_GET) || (!empty($_GET) && !in_array(tep_sanitize_string(basename(key($first_array))), array('login', 'create', 'password_forgotten')))) {
      $osC_NavigationHistory->setSnapshot();

      tep_redirect(tep_href_link(FILENAME_ACCOUNT, 'login', 'SSL'));
    }
  }

  $osC_Language->load('account');

  if ($osC_Services->isStarted('breadcrumb')) {
    $breadcrumb->add($osC_Language->get('breadcrumb_my_account'), tep_href_link(FILENAME_ACCOUNT, '', 'SSL'));
  }

  $osC_Template = osC_Template::setup('account');

  require('templates/' . $osC_Template->getCode() . '.php');

  require('includes/application_bottom.php');
?>
