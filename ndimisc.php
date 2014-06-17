<?php

require_once 'ndimisc.civix.php';

function ndimisc_civicrm_alterContent( &$content, $context, $tplName, &$object ) {
/*** Replaces old template overrides ***/
  switch($tplName) {
    case "CRM/Activity/Form/Activity.tpl":
      $content .= '<script type="text/javascript">cj(".crm-activity-form-block-attachment").hide(); </script>';
      break;
    case "CRM/Event/Form/ManageEvent/EventInfo.tpl":
      $content .= '<script type="text/javascript">
                     cj(".crm-event-manage-eventinfo-form-block-is_map").hide();
	                   cj(".crm-event-manage-eventinfo-form-block-is_public").hide();
                     cj(".crm-event-manage-eventinfo-form-block-is_share").hide(); 
                   </script>';
      break;
    case "CRM/Admin/Page/Tag.tpl":
      $content .= '<script type="text/javascript">
                     cj(".crm-tag-used_for").hide();
                     cj("th:contains(\'Used For\')").hide();
                     cj(".crm-tag-is_reserved").hide();
                     cj("th:contains(\'Reserved?\')").hide()
                  </script>';
      break;
    case "CRM/Contact/Form/Contact.tpl":
      $content .= '<script type="text/javascript">
                     cj("label[for=\'external_identifier\']").parent().hide();
                     cj("label[for=\'image_URL\']").parent().hide();
                     cj("label[for=\'internal_identifier_display\']").text("Internal Identifier");
                     cj("div.collapsible-title:contains(\'Signature\')").hide();
                     cj("label[for=\'prefix_id\']").parent().hide();
                     cj("label[for=\'suffix_id\']").parent().hide();
                     cj("label[for=\'nick_name\']").parent().hide();
                     cj("label[for=\'contact_sub_type\']").parent().hide();
                     cj("span:contains(\'Suffix\')").hide();
                     cj("input[name*=\'postal_code_suffix\']").hide();
                     cj("input[name*=\'[city]\']").parent().append(
                       \'<br><span class="description font-italic">Например‌·"Гродно"‌·или‌·"г.‌·Гродно"</span>\');
                     cj("input[name*=\'[street_address]\']").parent().append(\'<br>\');
                  </script>';
      break;
  }
   
}
/**
 * Implementation of hook_civicrm_config
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function ndimisc_civicrm_config(&$config) {
  _ndimisc_civix_civicrm_config($config);
}

/**
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function ndimisc_civicrm_xmlMenu(&$files) {
  _ndimisc_civix_civicrm_xmlMenu($files);
}

/**
 * Implementation of hook_civicrm_install
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function ndimisc_civicrm_install() {
  CRM_Core_I18n_Schema::makeMultilingual("en_US");
  CRM_Core_I18n_Schema::addLocale("ru_RU", "en_US");
	require_once("install/belarus_civicrm.additional_information");
	require_once("install/belarus_civicrm.political_preferences_group");
  require_once("install/belarus_civicrm.relationships_api");
  require_once("install/belarus_civicrm.relationships");
 // require_once("install/belarus_civicrm.tags");
  require_once("install/belarus_civicrm.profiles");
  return _ndimisc_civix_civicrm_install();
}

/**
 * Implementation of hook_civicrm_uninstall
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function ndimisc_civicrm_uninstall() {
  return _ndimisc_civix_civicrm_uninstall();
}

/**
 * Implementation of hook_civicrm_enable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function ndimisc_civicrm_enable() {
  return _ndimisc_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_disable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function ndimisc_civicrm_disable() {
  return _ndimisc_civix_civicrm_disable();
}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function ndimisc_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _ndimisc_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implementation of hook_civicrm_managed
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function ndimisc_civicrm_managed(&$entities) {
  return _ndimisc_civix_civicrm_managed($entities);
}

/**
 * Implementation of hook_civicrm_caseTypes
 *
 * Generate a list of case-types
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function ndimisc_civicrm_caseTypes(&$caseTypes) {
  _ndimisc_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implementation of hook_civicrm_alterSettingsFolders
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function ndimisc_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _ndimisc_civix_civicrm_alterSettingsFolders($metaDataFolders);
}
