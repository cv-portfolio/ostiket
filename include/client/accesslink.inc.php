<?php
if(!defined('OSTCLIENTINC')) die('Access Denied');

$email=Format::input($_POST['lemail']?$_POST['lemail']:$_GET['e']);
$ticketid=Format::input($_POST['lticket']?$_POST['lticket']:$_GET['t']);

if ($cfg->isClientEmailVerificationRequired())
    $button = __("Enlace de acceso al correo electrónico");
else
    $button = __("Ver billete");
?>
<h1><?php echo __('Verificar el estado del billete'); ?></h1>
<p><?php
echo __("Por favor proporcione su dirección de correo electrónico y un número de billete.");
if ($cfg->isClientEmailVerificationRequired())
    echo ' '.__('Se le enviará por correo electrónico un enlace de acceso.');
else
    echo ' '.__("Esto iniciará sesión para ver su boleto".);
?></p>
<form action="login.php" method="post" id="clientLogin">
    <?php csrf_token(); ?>
<div style="display:table-row">
    <div class="login-box">
    <div><strong><?php echo Format::htmlchars($errors['login']); ?></strong></div>
    <div>
        <label for="email"><?php echo __('Email Address'); ?>:
        <input id="email" placeholder="<?php echo __('e.g. john.doe@osticket.com'); ?>" type="text"
            name="lemail" size="30" value="<?php echo $email; ?>" class="nowarn"></label>
    </div>
    <div>
        <label for="ticketno"><?php echo __('Ticket Number'); ?>:
        <input id="ticketno" type="text" name="lticket" placeholder="<?php echo __('e.g. 051243'); ?>"
            size="30" value="<?php echo $ticketid; ?>" class="nowarn"></label>
    </div>
    <p>
        <input class="btn" type="submit" value="<?php echo $button; ?>">
    </p>
    </div>
    <div class="instructions">
<?php if ($cfg && $cfg->getClientRegistrationMode() !== 'disabled') { ?>
        <?php echo __('¿Tienes una cuenta con nosotros?'); ?>
        <a href="login.php"><?php echo __('Sign In'); ?></a> <?php
    if ($cfg->isClientRegistrationEnabled()) { ?>
<?php echo sprintf(__('o %s regístrese para obtener una cuenta %s para acceder a todos sus tickets.'),
    '<a href="account.php?do=create">','</a>');
    }
}?>
    </div>
</div>
</form>
<br>
<p>
<?php
if ($cfg->getClientRegistrationMode() != 'disabled'
    || !$cfg->isClientLoginRequired()) {
    echo sprintf(
    __("Si es la primera vez que nos contacta o ha perdido el número de ticket, %s abra un ticket nuevo %s"),
        '<a href="open.php">','</a>');
} ?>
</p>
