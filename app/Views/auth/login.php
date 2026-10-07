<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Login - Puihaha Electric') ?></title>
    <link href="<?= base_url('public/assets/css/custom.css?v=20261007c') ?>" rel="stylesheet">
</head>
<body class="auth-body">
    <main class="auth-page">
        <section class="auth-form-panel">
            <div class="auth-form-card">
                <header class="auth-card-header">
                    <a href="<?= base_url() ?>" class="auth-brand" aria-label="Puihaha Electric home">
                        <span class="auth-brand-mark" aria-hidden="true">
                            <svg viewBox="0 0 24 24"><path d="M13.2 2 5.5 13h5.3L9.9 22l8.6-12h-5.8l.5-8Z"/></svg>
                        </span>
                        <span>Puihaha Electric</span>
                    </a>
                    <p class="eyebrow">Customer records</p>
                    <h1>Welcome back</h1>
                    <p class="auth-muted">Enter your staff credentials to continue.</p>
                </header>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger" role="alert">
                        <svg class="auth-status-icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v6M12 17h.01"/></svg>
                        <span><?= esc(session()->getFlashdata('error')) ?></span>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success" role="status">
                        <svg class="auth-status-icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="m8 12 2.5 2.5L16 9"/></svg>
                        <span><?= esc(session()->getFlashdata('success')) ?></span>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('login') ?>" method="post" class="auth-form">
                    <?= csrf_field() ?>
                    <div class="auth-field">
                        <label for="username">Username or email</label>
                        <div class="auth-input-wrap">
                            <svg class="auth-input-icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="8" r="3.5"/><path d="M5.5 19c.8-3 3.1-4.5 6.5-4.5s5.7 1.5 6.5 4.5"/></svg>
                            <input type="text" id="username" name="username" value="<?= esc(old('username')) ?>" placeholder="Enter your username or email" autocomplete="username" required autofocus>
                        </div>
                    </div>

                    <div class="auth-field">
                        <label for="password">Password</label>
                        <div class="auth-input-wrap auth-password-field">
                            <svg class="auth-input-icon" viewBox="0 0 24 24" aria-hidden="true"><rect x="5.5" y="10" width="13" height="10" rx="2"/><path d="M8.5 10V7a3.5 3.5 0 0 1 7 0v3"/></svg>
                            <input type="password" id="password" name="password" placeholder="Enter your password" autocomplete="current-password" required>
                            <button type="button" class="password-toggle" aria-label="Show password" data-target="password">
                                <svg class="password-icon-show" viewBox="0 0 24 24" aria-hidden="true"><path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"/><circle cx="12" cy="12" r="2.5"/></svg>
                                <svg class="password-icon-hide" viewBox="0 0 24 24" aria-hidden="true"><path d="m4 4 16 16M9.6 6.4A9.8 9.8 0 0 1 12 6c6 0 9.5 6 9.5 6a15.5 15.5 0 0 1-3 3.6M6.3 7.4A16.4 16.4 0 0 0 2.5 12s3.5 6 9.5 6c1 0 2-.2 2.8-.5M9.9 9.9a3 3 0 0 0 4.2 4.2"/></svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="auth-submit">
                        <span>Sign in</span>
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M14 7l5 5-5 5"/></svg>
                    </button>
                </form>

                <div class="auth-hint">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 5.5 5.5v5.8c0 4.1 2.6 7.8 6.5 9.7 3.9-1.9 6.5-5.6 6.5-9.7V5.5L12 3Z"/><path d="m9.5 12 1.7 1.7 3.6-3.7"/></svg>
                    <p><span>Demo access</span><strong>admin</strong> / <strong>admin123</strong></p>
                </div>
            </div>

            <p class="auth-footnote">&copy; <?= date('Y') ?> Puihaha Electric. Staff access only.</p>
        </section>
    </main>

    <script src="<?= base_url('public/assets/js/app.js?v=20261007c') ?>"></script>
</body>
</html>
