<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /install/step-2.php
 */
include("header.php");
?>
<h3><span class='label label-info'>2/5</span>--检查环境配置</h3>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>功能或状态</th>
        <th>最低配置要求/推荐配置要求</th>
        <th>当前配置</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>PHP版本</td>
        <td>5.1及以上/5.5及以上</td>
        <td>
          <b><font color="<?php
            if (version_compare(PHP_VERSION, '5.1.0') >= 0) {
              echo"green";
            } else {
              echo "red";
            }
            ?> ">
              <?= PHP_VERSION?>
            </font>
          </b>
        </td>
      </tr>
      <tr>
        <td>MySQLi数据库拓展</td>
        <td>支持/支持</td>
        <td><b>
            <?php
            if (function_exists('mysqli_connect')) {
              echo "<font color='green'>支持</font>";
            }else {
              echo "<font color='red'>不支持</font>";
            }
            ?>
          </b>
        </td>
      </tr>

      <tr>
        <td>配置文件写入</td>
        <td>可选/支持</td>
        <td><b>
            <?php
            if (is_writable("../common/config2.php")) {
              echo "<font color='green'>支持</font>";
            }else {
              echo "<font color='red'>不支持</font>";}
            ?>
          </b>
        </td>
      </tr>

      <tr>
        <td>程序最长运行时间</td>
        <td>15秒及以上/30秒及以上</td>
        <td>
          <b><font color="<?php
            if (ini_get("max_execution_time")>= 15) {
              echo"green";
            } else {
              echo "red";
            }
            ?> ">
              <?= ini_get("max_execution_time")?>秒
            </font>
          </b>
        </td>
      </tr>
    <tr>
      <td>文件上传大小限制：</td>
      <td>1M/5M</td>
      <td>
        <b><font color="<?php
          preg_match_all('/\d+/',ini_get("upload_max_filesize"),$arr);
          $arr = join('',$arr[0]);
          if ($arr>=1) {
            echo"green";
          } else {
            echo "red";
          }
          ?>">
        <?= ini_get("upload_max_filesize") ?></td>
    </tr>
    </tbody>
  </table>
  
<center>
<a href="step-3.php" class="btn btn-primary">下一步</a>&nbsp;<a href="install.php" class="btn btn-primary">上一步</a></center>
</body>
</html>