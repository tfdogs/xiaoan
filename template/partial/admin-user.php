<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /template/partial/admin-user.php
 */
$users = Admin::listuser($pge);
?>
<center>
    <h4>用户管理</h4>
</center>
<div id="fundetail">
    <div class="col-md-9" role="main">
        <ul class="nav nav-tabs" id="PageTab">
            <li class="active">
                <a href="#adminid" data-toggle="tab" onclick="mytopic()" aria-expanded="true">注册用户管理</a>
            </li>
            <li class="">
                <a href="#newid" data-toggle="tab" onclick="myreply()" aria-expanded="false">用户设置</a>
            </li>
        </ul><br>
        <?php
        require"user-list.php";
       // require "reply-bin.php";
        //require "topic-setting.php";
        require 'pagination.php';
        ?>
    </div>
</div>