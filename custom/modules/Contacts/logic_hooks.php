<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(1, 'Contacts push feed', 'modules/Contacts/SugarFeeds/ContactFeed.php','ContactFeed', 'pushFeed');
$hook_array['before_save'][] = Array(1, 'uploadPhoto', 'custom/modules/Contacts/ContactPhoto.php','ContactPhoto', 'uploadPhoto');
$hook_array['after_ui_frame'] = Array();
$hook_array['after_ui_frame'][] = Array(1, 'Contacts InsideView frame', 'modules/Connectors/connectors/sources/ext/rest/insideview/InsideViewLogicHook.php','InsideViewLogicHook', 'showFrame');
// position, file, function
$hook_array['process_record'] = Array();
$hook_array['process_record'][] = Array(1, 'Conditional formatting in a listview column', 'custom/modules/Contacts/ListViewLogicHook.php','ListViewLogicHook','getListValue');


?>