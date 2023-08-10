<?php
include './cf/view/head.php'; ?>
<main class="main_block">
    <form id="table_form" name="table_form" method="post" enctype="multipart/form-data" style="margin:0;">
        <table class="table_table" border="0" cellpadding="5" cellspacing="0">
            <tr>
                <td class="table_left">温馨提示</td>
                <td>
                    <ol>
                        <li>当用户名为 admin 密码为 123456 时，不用登陆就可以进入</li>
                        <li>当密码错误不能登录时，请删除或查看根目录下的 /mp/web-config.php 文件</li>
                    </ol>
                </td>
            </tr>
            <tr>
                <td class="table_left">用 户 名</td>
                <td><input class="table_text" id="user" name="login[user]" value="<?php echo $login['user']; ?>"><span
                            class="table_info">填写本后台的管理用户名</span></td>
            </tr>
            <tr>
                <td class="table_left">管理密码</td>
                <td><input class="table_text" id="pass" name="login[pass]" value="<?php echo $login['pass']; ?>"><span
                            class="table_info">填写本后台的管理密码</span></td>
            </tr>
            <tr>
                <td colspan="2" class="table_save_block"><input class="table_butt chenksave" name="save" type="submit"
                                                                value="保存设置"></td>
            </tr>
        </table>
    </form>
</main>
<?php
include './cf/view/foot.php'; ?>