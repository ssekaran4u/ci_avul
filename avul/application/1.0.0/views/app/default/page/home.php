<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('app/default/common/head_top');
?>
    <title><?php echo config_item('site_name'); ?></title>

    <!-- meta for search engines -->
    <meta name="robots" content="follow,index">
    <link rel="canonical" href="<?php echo config_item('base_url'); ?>">
    <?php $this->load->view('app/default/common/css');
    $this->load->view('app/default/common/head_bottom');
    $this->load->view('app/default/common/top_nav'); ?>
    <div class="container">
        <div class="row">
            <section class="col-md-7 col-md-offset-2 sblock">
                    <?php if ($errors): foreach ($errors as $error): ?>
                    <p class="alert alert-danger"><?php echo $error; ?></p>
                    <?php endforeach; endif; ?>

                    <?php if (!$reg_success): ?>

                    <form method="post" class="pt-1">
                        <div class="form-group">
                            <input class="form-control lg" placeholder="Username" name="username" type="text"  value="<?php echo $inputs ? $inputs['username'] : ''; ?>" maxlength="32">
                        </div>
                        <div class="form-group">
                            <input class="form-control lg" placeholder="Password" name="password" type="password"  value="<?php echo $inputs ? $inputs['password'] : ''; ?>" maxlength="64">
                        </div>
                        <div class="form-group">
                            <input class="form-control lg" placeholder="Password Confirmation" name="password-confirm" type="password"  value="<?php echo $inputs ? $inputs['password-confirm'] : ''; ?>" maxlength="64">
                        </div>
                        <div class="form-group">
                            <input class="form-control lg" placeholder="Email" name="email" type="email"  value="<?php echo $inputs ? $inputs['email'] : ''; ?>" maxlength="254">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?php echo $csrf['hash']; ?>">
                            <button class="btn btn-primary btn-block" type="submit">Create New</button>
                        </div>
                    </form>
                    <?php else: ?>
                    <p class="alert alert-success">Congratulations! Your new user has been successfully created!</p>
                    <?php endif; ?>
                </section>
        </div>
    </div>
    <?php
        $this->load->view('app/default/common/foot_bottom');
    ?>