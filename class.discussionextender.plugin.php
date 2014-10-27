<?php if (!defined('APPLICATION')) exit();
$PluginInfo['DiscussionExtender'] = array(
   'Name' => 'Discussion Extender',
   'Description' => 'Add arbitrary fields to discussions. Easy to customize via the admin dashboard.',
   'Version' => '0.1',
   'RequiredApplications' => array('Vanilla' => '2.1'),
   'MobileFriendly' => TRUE,
   'SettingsUrl' => '/dashboard/settings/discussionextender',
   'SettingsPermission' => 'Garden.Settings.Manage',
   'Author' => 'Zachary Doll',
   'AuthorEmail' => 'hgtonight@daklutz.com',
   'AuthorUrl' => 'http://daklutz.com'
);

class DiscussionExtender extends Gdn_Plugin {

   /**
    * Add the Dashboard menu item.
    */
   public function Base_GetAppSettingsMenuItems_Handler($Sender) {
      $Menu = &$Sender->EventArguments['SideMenu'];
      $Menu->AddLink('Forum', T('Discussion Fields'), 'settings/discussionextender', 'Garden.Settings.Manage');
   }
   
   /**
    * Settings mini-controller
    */
   public function SettingsController_DiscussionExtender_Create($Sender) {
      $Sender->Permission('Garden.Settings.Manage');
  
      if (!C('DiscussionExtender.Fields')) {
        $this->Setup();
      }

      $this->Dispatch($Sender);
   }

   /**
    * Settings/list of fields
    * @param type $Sender
    */
   public function Controller_Index($Sender) {
     $Sender->Render('settings', '', 'plugins/DiscussionExtender');
   }
   
   /**
    * Edit a field.
    */
   public function Controller_Edit($Sender, $Args) {
      $Sender->SetData('Title', T('Edit Discussion Field'));

      $Sender->Render('edit', '', 'plugins/DiscussionExtender');
   }

   /**
    * Delete a field.
    */
   public function Controller_Delete($Sender, $Args) {
      $Sender->SetData('Title', 'Delete Discussion Field');

      $Sender->Render('delete', '', 'plugins/DiscussionExtender');
   }
   
   /**
    * Display custom fields on Discussion form.
    */
   public function PostController_DiscussionFormOptions_Handler($Sender) {
      echo '<ul>';
      echo "Discussion Fields";
      echo '</ul>';
   }

   /**
    * Display custom fields on Discussion
    */
   public function DiscussionController_BeforeDiscussionBody_Handler($Sender) {
     // TODO
   }

   public function Setup() {
      return true;
   }
   
   /**
    * Add the "permanent" fields as columns to the discussion table.
    * 
    * This sounds like a really bad idea. It essentially inserts columns per
    * user input.
    * 
    * SANITIZE
    */
   public function Structure() {
     
   }
}
