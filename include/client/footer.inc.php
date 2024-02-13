        </div>
    </div>
    <div id="footer">
        <p><?php echo __('Copyright &copy;'); ?> <?php echo date('Y'); ?> <?php
        echo Format::htmlchars((string) $ost->company ?: 'IntelliHelp'); ?> - <?php echo __('Reservados todos los derechos.'); ?></p>
        <a id="poweredBy" href="https://www.intellihelp.tech/" target="_blank"><?php echo __('Software de asistencia técnica - desarrollado por IntelliHelp'); ?></a>
    </div>
<div id="overlay"></div>
<div id="loading">
    <h4><?php echo __('¡Espere por favor!');?></h4>
    <p><?php echo __('Por favor, espera... ¡tomará un segundo!');?></p>
</div>
<?php
if (($lang = Internationalization::getCurrentLanguage()) && $lang != 'en_US') { ?>
    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>ajax.php/i18n/<?php
        echo $lang; ?>/js"></script>
<?php } ?>
<script type="text/javascript">
    getConfig().resolve(<?php
        include INCLUDE_DIR . 'ajax.config.php';
        $api = new ConfigAjaxAPI();
        print $api->client(false);
    ?>);
</script>
</body>
</html>
