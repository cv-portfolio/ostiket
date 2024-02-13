<?php

if(!defined('OSTCLIENTINC') || !$thisclient || !$ticket || !$ticket->checkUserAccess($thisclient)) die('Access Denied!');

?>

<h1>
    <?php echo sprintf(__('Editando ticket #%s'), $ticket->getNumber()); ?>
</h1>

<form action="tickets.php" method="post">
    <?php echo csrf_token(); ?>
    <input type="hidden" name="a" value="edit"/>
    <input type="hidden" name="id" value="<?php echo Format::htmlchars($_REQUEST['id']); ?>"/>
<table width="800">
    <tbody id="dynamic-form">
    <?php if ($forms)
        foreach ($forms as $form) {
            $form->render(['staff' => false]);
    } ?>
    </tbody>
</table>
<hr>
<p style="text-align: center;">
    <input type="submit" value="<?php echo __('Actualizar') ?>"/>
    <input type="reset" value="<?php echo __('Reiniciar') ?>"/>
    <input type="button" value="<?php echo __('Cancelar') ?>" onclick="javascript:
        window.location.href='index.php';"/>
</p>
</form>