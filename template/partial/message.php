<?php
if ($page['message']['accept']) {
    foreach ($page['message']['accept'] as $m) {
        ?>
        <div id="message" class="message message-accept"><?= $m ?></div>
        <?php
    }
}
if ($page['message']['error']) {
    foreach ($page['message']['error'] as $m) {
        ?>
        <div id="message" class="message message-error"><?= $m ?></div>
        <?php
    }
}
?>