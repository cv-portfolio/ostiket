<?php

class CronManager extends Module {
    var $prologue = 'CLI cron manager for osTicket';

    var $arguments = array(
        'action' => array(
            'help' => 'Acción a realizar',
            'options' => array(
                'fetch' => 'Obtener correo electrónico',
                'search' => 'Crear índice de búsqueda'
            ),
        ),
    );

    function run($args, $options) {
        Bootstrap::connect();
        $ost = osTicket::start();

        switch (strtolower($args[0])) {
        case 'fetch':
            Cron::MailFetcher();
            break;
        case 'search':
            $ost->searcher->backend->IndexOldStuff();
            break;
        }
    }
}

Module::register('cron', 'CronManager');
?>
