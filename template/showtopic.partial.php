<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /template/showtopic.partial.php
 */
require 'partial/header.php';
?>

<main class="main">

    <?php require 'partial/sidebar.php'; ?>

    <div class="content">
        <?php
        require 'partial/message.php';
        if($user != null and $user->admingp != 0 or Site::ifopen()->ifopen == 1){
            require 'partial/showtopic-list.php';
            require 'partial/pagination.php';
            if ($user != null){
                require 'partial/new-reply.php';
            }
        }else{
            require "partial/forbid-visit-set.php";
        }
        ?>
    </div>

</main>



