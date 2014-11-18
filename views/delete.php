<?php if (!defined('APPLICATION')) exit();
$Field = $this->Data('Field');

echo Wrap($this->Data('Title'), 'h1');

echo $this->Form->Open();
echo $this->Form->Errors();

echo Wrap($this->Form->CheckBox('Confirm', 'Confirm removal of the field: ' . Wrap($Field['Label'], 'strong')), 'p');

echo Wrap($this->Form->CheckBox('Wipe', 'Completely remove all associated data?'), 'p');

echo $this->Form->Close('Delete');
