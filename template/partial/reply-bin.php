<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
 * Author: Xiaoan
 * File: /template/partial/reply-bin.php
 */
?>
<div class="tab-pane fade" id="newid" style="display: none;">
    <form class="form-inline" name="topicbin" role="form" action="" method=post>
        <table class="table">
            <tr>
                <td>勾选</td>
                <td>回复ID</td>
                <td>回帖人</td>
                <td>对应主题帖ID/内容</td>
                <td>回帖内容</td>
                <td>回帖时间</td>
            </tr>
            <?php
            foreach ($replybin as $value){
                require "admin-replypreview.php";
            }
            ?>
        </table>
        <input name="recoverreplys" type = "submit" class="btn btn-success" value = "恢复所选帖子">
    </form>
</div>