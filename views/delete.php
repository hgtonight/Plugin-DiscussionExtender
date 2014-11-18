<?php if (!defined('APPLICATION')) exit();
$Field = $this->Data('Field');

echo Wrap($this->Data('Title'), 'h1');

echo $this->Form->Open();
echo $this->Form->Errors();

echo Wrap($this->Form->CheckBox('Confirm', 'Confirm removal of the field: ' . Wrap($Field['Label'], 'strong')), 'p');

echo Wrap($this->Form->CheckBox('Wipe', 'Completely remove all associated data?'), 'p', array('id' => 'WipeTick'));

echo Wrap(T('THIS IS A PERMANENT CHANGE WITH NO UNDO!'), 'div', array('class' => 'Warning Hidden', 'id' => 'WipeWarning'));

echo $this->Form->Close('Delete');
