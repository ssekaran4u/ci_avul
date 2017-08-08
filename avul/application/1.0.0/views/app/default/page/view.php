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
            <section class="sblock center-block">
                <?php if ($reg_success): ?>
                    <div class="alert alert-success text-center">
                        <b>User has been removed successfully.</b>
                    </div>
                <?php endif; ?>
                <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Added date</th>
                        <th>Tools</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($item as $item) { ?>
                      <tr>
                        <td><a href="edit/<?php echo $item['id'] ;?>"><?php echo $item['id'] ;?></a></td>
                        <td><?php echo $item['username'];?></td>
                        <td><?php echo $item['email'];?></td>
                        <td><?php echo $item['date_added'];?></td>
                        <td><a onclick="return confirm('Are you sure you want to delete this.?');" href="accounts?action=delete&id=<?php echo $item['id'] ;?>"><span class="glyphicon glyphicon-remove"></span></a> | <a href="edit/<?php echo $item['id'] ;?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
            </section>
        </div>
    </div>
    <?php
        $this->load->view('app/default/common/foot_bottom');
    ?>