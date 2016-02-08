<div class="form-login">

    <?= $this->hook->render('template:auth:login-form:before') ?>

    <?php if (isset($errors['login'])): ?>
        <p class="alert alert-error"><?= $this->e($errors['login']) ?></p>
    <?php endif ?>

    <?php if (! HIDE_LOGIN_FORM): ?>
    <form method="post" action="<?= $this->url->href('auth', 'check') ?>">

        <?= $this->form->csrf() ?>

        <?= $this->form->label(t('Username'), 'username') ?>
        <?= $this->form->text('username', $values, $errors, array('autofocus', 'required')) ?>

        <?= $this->form->label(t('Password'), 'password') ?>
        <?= $this->form->password('password', $values, $errors, array('required')) ?>

        <?php if (isset($captcha) && $captcha): ?>
            <?= $this->form->label(t('Enter the text below'), 'captcha') ?>
            <img src="<?= $this->url->href('Captcha', 'image') ?>"/>
            <?= $this->form->text('captcha', array(), $errors, array('required')) ?>
        <?php endif ?>

        <?php if (REMEMBER_ME_AUTH): ?>
            <?= $this->form->checkbox('remember_me', t('Remember Me'), 1, true) ?><br>
        <?php endif ?>

        <div class="form-actions">
            <input type="submit" value="<?= t('Sign in') ?>" class="btn btn-blue"/>
        </div>
        <?php if ($this->app->config('password_reset') == 1): ?>
            <div class="reset-password">
                <?= $this->url->link(t('Forgot password?'), 'PasswordReset', 'create') ?>
            </div>
        <?php endif ?>
    </form>
    <?php endif ?>

    <?= $this->hook->render('template:auth:login-form:after') ?>
</div>