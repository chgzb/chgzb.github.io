<?php
include './cf/view/head.php'; ?>
<main class="main_block">﻿
    <style></style>
    <form id="table_form" name="table_form" method="post" enctype="multipart/form-data" style="margin:0;">
        <table class="table_table" border="0" cellpadding="5" cellspacing="0">
            <tr>
                <td class="table_left">后台标题</td>
                <td><input class="table_text" name="conf[site]" value="<?php echo $config['site']; ?>"><span class="table_info">设置后台的标题</span>
                </td>
            </tr>
            <tr>
                <td class="table_left">图片目录</td>
                <td><select class="table_text" id="path" name="conf[path]">
                        <option<?php echo $config['path'] == '0'?' selected':''; ?> value="0">相对路径</option>
                        <option<?php echo $config['path'] == '1'?' selected':''; ?> value="1">根目录</option>
                        <option<?php echo $config['path'] == '2'?' selected':''; ?> value="2">绝对路径</option>
                    </select></td>
            </tr>
            <tr>
                <td class="table_left">启用统计</td>
                <td><input type="hidden" name="conf[census]" value="0"><input type="checkbox" name="conf[census]"
                                                                              id="ckb_census"
                                                                              class="table_checkbox sw_butt" value="1"
                        <?php echo $config['census'] == '1'?' checked':''; ?>><label
                            for="ckb_census"></label><label class="table_label" for="ckb_census">启用 EcCensus
                        统计</label></td>
            </tr>
            <tr>
                <td colspan="2" class="table_save_block"><input class="table_butt" id="table_save" name="save"
                                                                type="button" value="保存设置"></td>
            </tr>
        </table>
    </form>
</main>
<?php
include './cf/view/foot.php'; ?>