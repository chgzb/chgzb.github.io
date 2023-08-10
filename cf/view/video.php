<?php
include './cf/view/head.php'; ?>
<main class="main_block">﻿
    <form id="table_form" name="table_form" method="post" enctype="multipart/form-data" style="margin:0;">
        <table class="table_table" border="0" cellpadding="5" cellspacing="0">
            <tr>
                <td colspan="2" class="table_title">其他设置</td>
            </tr>
            <tr>
                <td class="table_left">默认次数</td>
                <td><input class="table_text" type="number" name="conf[vdef]" placeholder="请填写默认次数" min="0"
                           value="<?php echo $config['vdef']; ?>">
                    <div class="table_info">用户可以看几个视频</div>
                </td>
            </tr>
            <tr>
                <td class="table_left">增加次数</td>
                <td><input class="table_text" type="number" name="conf[vadd]" placeholder="请填写增加次数" min="0"
                           value="<?php echo $config['vadd']; ?>">
                    <div class="table_info">用户分享可以看几个视频</div>
                </td>
            </tr>
            <tr>
                <td class="table_left">缓存时间</td>
                <td><input class="table_text" type="number" name="conf[cache]" placeholder="请填写缓存时间" min="0"
                           value="<?php echo $config['cache']; ?>">
                    <div class="table_info">用户行为记录的时长(单位秒)</div>
                </td>
            </tr>
            <tr>
                <td class="table_left">统计代码</td>
                <td><textarea class="table_text" name="conf[tongji]" placeholder="格式如：<script ... >"
                              spellcheck="false"><?php echo $config['tongji']; ?></textarea>
                    <div class="table_info">填写HTML统计代码</div>
                </td>
            </tr>

            <tr>
                <td class="table_left">视频格式</td>
                <td><input type="hidden" name="conf[m3u8]" value="0"><input type="checkbox" name="conf[m3u8]"
                                                                              id="ckb_m3u8"
                                                                              class="table_checkbox sw_butt" value="1"
                        <?php echo $config['m3u8'] == '1'?' checked':''; ?>><label
                            for="ckb_m3u8"></label><label class="table_label" for="ckb_m3u8">支持模拟型 m3u8
                        统计</label></td>
            </tr>

            <tr>
                <td class="table_left">访问形式</td>
                <td><input type="hidden" name="conf[mobile]" value="0"><input type="checkbox" name="conf[mobile]"
                                                                              id="ckb_mobile"
                                                                              class="table_checkbox sw_butt" value="1"
                        <?php echo $config['mobile'] == '1'?' checked':''; ?>><label
                            for="ckb_mobile"></label><label class="table_label" for="ckb_mobile">
                        手机跳转</label></td>
            </tr>
            <tr>
                <td colspan="2" class="table_title">视频设置</td>
            </tr>
            <tr>
                <td class="table_left">视频列表</td>
                <td><textarea class="table_text" name="conf[videos]" placeholder="请填写视频列表" spellcheck="false"><?php echo $config['videos']; ?></textarea><label
                            for="up_videos" class="up_butt"><input id="up_videos" class="table_upload" type="file"
                                                                   multiple
                                                                   accept=".jpg,.jpeg,.png,.gif,.bmp,.mp4,.zip,.doc,.txt"><span
                                class="glyphicon glyphicon-open"></span> 请上传视频列表</label>
                    <div class="table_info">视频列表，一行一个</div>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="table_save_block"><input class="table_butt" id="table_save" name="save"
                                                                type="button" value="保存设置"></td>
            </tr>
        </table>
    </form>
    <div class="table_blank"></div>
</main>
<?php
include './cf/view/foot.php'; ?>