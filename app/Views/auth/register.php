<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Register Card -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mb-4 mt-2">
                        <a href="index.html" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z" fill="#7367F0" />
                                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z" fill="#7367F0" />
                                </svg>
                            </span>
                            <span class="app-brand-text demo text-body fw-bold ms-1">Vuexy</span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-1 pt-2">Adventure starts here 🚀</h4>
                    <p class="mb-4">Make your app management easy and fun!</p>

                    <?= view('App\Views\Auth\_message_block') ?>

                    <form id="formAuthentication" class="mb-3" action="<?= url_to('register') ?>" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label"><?= lang('Auth.username') ?></label>
                            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="username" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label"><?= lang('Auth.email') ?></label>
                            <input type="text" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="email" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password"><?= lang('Auth.password') ?></label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password"><?= lang('Auth.repeatPassword') ?></label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                                <label class="form-check-label" for="terms-conditions">
                                    I agree to
                                    <a href="javascript:void(0);">privacy policy & terms</a>
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-primary d-grid w-100">Sign up</button>
                    </form>

                    <p class="text-center">
                        <span>Already have an account?</span>
                        <a href="<?= site_url('login') ?>">
                            <span>Sign in instead</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- Register Card -->
        </div>
    </div>
</div>


<?= $this->endSection() ?>