<?php
include './cf/view/head2.php'; ?>
    <main class="main_block">
        <form id="table_form" name="table_form" method="post" enctype="multipart/form-data" style="margin:0;">
            <table class="table_table" border="0" cellpadding="5" cellspacing="0">

                <tr>
                    <td class="table_left">用 户 名</td>
                    <td><input class="table_text" id="user" name="log[user]" value=""><span
                                class="table_info">填写本后台的管理用户名</span></td>
                </tr>
                <tr>
                    <td class="table_left">管理密码</td>
                    <td><input class="table_text" id="pass" name="log[pass]" value=""><span
                                class="table_info">填写本后台的管理密码</span></td>
                </tr>
                <tr>
                    <td colspan="2" class="table_save_block"><input class="table_butt" id="table_save" name="save"
                                                                    type="button" value="登录"></td>
                </tr>
            </table>
        </form>
    </main>
<?php
include './cf/view/foot.php'; ?>