<?php

$manifest = array(
    'acceptable_sugar_flavors' => array('CE', 'PRO', 'CORP', 'ENT', 'ULT'),
    'acceptable_sugar_versions' => array(
        'exact_matches' => array(),
        'regex_matches' => array('6\\.[0-9]\\.[0-9])'),
    ),
    'author' => 'SugarCRM',
    'description' => 'Installs a sample set of custom fields to the accounts module',
    'icon' => '',
    'is_uninstallable' => true,
    'name' => 'Photo field installer',
    'published_date' => '2015-08-27 00:10:00',
    'type' => 'module',
    'version' => '1391607505',
);

$installdefs = array(
    'id' => 'package_1341607504',
    'custom_fields' => array(
        array(
            'name' => 'contact_photo_c',
            'label' => 'LBL_CONTACT_PHOTO',
            'type' => 'varchar',
            'module' => 'Contacts',
            'help' => 'Upload your Photo',
            'comment' => '',
            'default_value' => '',
            'max_size' => 255,
            'required' => false, // true or false
            'reportable' => true, // true or false
            'audited' => false, // true or false
            'importable' => 'true', // 'true', 'false', 'required'
            'duplicate_merge' => false, // true or false
        ),
    ),
);

?>