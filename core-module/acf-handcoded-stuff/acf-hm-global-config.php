<?php

    use StoutLogic\AcfBuilder\FieldsBuilder;

    $config = new FieldsBuilder('global_config');
    $config
        ->addTab('social links')
        ->addLink('Facebook')
        ->addLink('LinkedIn')
        ->addLink('Twitter')
        ->addLink('Vimeo')

        ->setLocation('options_page', '==', 'theme-general-settings');

    add_action('acf/init', function() use ($config) {
        acf_add_local_field_group($config->build());
    });
