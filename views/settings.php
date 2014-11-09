<?php if (!defined('APPLICATION')) exit();

$Fields = $this->Data('Fields');

echo Wrap(T('Custom Discussion Fields'), 'h1');
echo Wrap(Anchor('Add Field', '/settings/discussionextender/edit/', 'Popup SmallButton'), 'div', array('class' => 'Wrap')); ?>
<table>
   <thead>
      <tr>
         <th><?php echo T('Label'); ?></th>
         <th><?php echo T('Type'); ?></th>
         <th><?php echo T('Position'); ?></th>
         <th><?php echo T('Required'); ?></th>
         <th><?php echo T('In Discussions'); ?></th>
         <th><?php echo T('Options'); ?></th>
      </tr>
   </thead>
   <tbody>

<?php
  foreach ($Fields as $Name => $Field) {
    $String  = Wrap($Field['Label'], 'td');
    $String .= Wrap($Field['Type'], 'td');
    $String .= Wrap($Field['Position'], 'td');
    $String .= Wrap($Field['Required'], 'td');
    $String .= Wrap($Field['DisplayInDiscussion'], 'td');
    $String .= Wrap(Anchor('Edit', '/settings/discussionextender/edit/'.$Name, 'Popup SmallButton') . ' ' . Anchor('Delete', '/settings/discussionextender/delete/'.$Name, 'Popup SmallButton'),'td');
    echo Wrap($String, 'tr');
  }
?>
   </tbody>
</table>
<br />
<br />
<?php
echo Wrap(T('Sample New Discussion'), 'h3');
echo Wrap(T('Sample new discussion preview.'),'div', array('class' => 'Info', 'id' => 'NewDiscussionPreview'));