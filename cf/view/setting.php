<?php
include './cf/view/head.php'; ?>
<main class="main_block">
    <form id="table_form" name="table_form" method="post" enctype="multipart/form-data" style="margin:0;">
        <table class="table_table" border="0" cellpadding="5" cellspacing="0">
            <tr>
                <td colspan="2" class="table_title">参数列表</td>
            </tr>
            <tr>
                <td class="table_left">pc端跳转地址</td>
                <td><textarea class="table_text" name="conf[pc_jump]" placeholder="" spellcheck="false"><?php echo $config['pc_jump']; ?></textarea>
                    <div class="table_info">pc端跳转地址</div>
                </td>
            </tr>
            <tr>
                <td class="table_left">结尾跳转</td>
                <td><textarea class="table_text" name="conf[ready]" placeholder="请填写结尾跳转" spellcheck="false"><?php echo $config['ready']; ?></textarea>
                    <div class="table_info">观看结束的跳转地址</div>
                </td>
            </tr>
            <tr>
                <td class="table_left">顶部广告</td>
                <td><textarea class="table_text" name="conf[topad]" placeholder="请填写顶部广告" spellcheck="false"><?php echo $config['topad']; ?></textarea>
                    <div class="table_info">顶部广告地址</div>
                </td>
            </tr>
            <tr>
                <td class="table_left">按钮2</td>
                <td><input class="table_text" name="conf[btn2]" placeholder="请填写按钮2" value="<?php echo $config['btn2']; ?>">
                    <div class="table_info">按钮文字2</div>
                </td>
            </tr>
            <tr>
                <td class="table_left">加群2</td>
                <td><textarea class="table_text" name="conf[url2]" placeholder="请填写加群2" spellcheck="false"><?php echo $config['url2']; ?></textarea>
                    <div class="table_info">加群地址2</div>
                </td>
            </tr>
            <tr>
                <td class="table_left">按钮3</td>
                <td><input class="table_text" name="conf[btn3]" placeholder="请填写按钮3"
                           value="<?php echo $config['btn3']; ?>">
                    <div class="table_info">按钮文字3</div>
                </td>
            </tr>
            <tr>
                <td class="table_left">加群3</td>
                <td><textarea class="table_text" name="conf[url3]" placeholder="请填写加群3" spellcheck="false"><?php echo $config['url3']; ?></textarea>
                    <div class="table_info">加群地址3</div>
                </td>
            </tr>
            <tr>
                <td class="table_left">按钮4</td>
                <td><input class="table_text" name="conf[btn4]" placeholder="请填写按钮4"
                           value="<?php echo $config['btn4']; ?>">
                    <div class="table_info">按钮文字4</div>
                </td>
            </tr>
            <tr>
                <td class="table_left">加群4</td>
                <td><textarea class="table_text" name="conf[url4]" placeholder="请填写加群4" spellcheck="false"><?php echo $config['url4']; ?></textarea>
                    <div class="table_info">加群地址4</div>
                </td>
            </tr>
            <tr>
                <td class="table_left">网站标题</td>
                <td><input class="table_text" name="conf[title]" placeholder="请填写网站标题" value="<?php echo $config['title']; ?>">
                    <div class="table_info">网站标题</div>
                </td>
            </tr>
            <tr>
                <td class="table_left">提示开始</td>
                <td><input class="table_text" name="conf[adth1]" placeholder="请填写提示开始"
                           value="<?php echo $config['adth1']; ?>">
                    <div class="table_info">分享描述结尾</div>
                </td>
            </tr>
            <tr>
                <td class="table_left">提示结尾</td>
                <td><input class="table_text" name="conf[adthe]" placeholder="请填写提示结尾"
                           value="<?php echo $config['adthe']; ?>">
                    <div class="table_info">分享描述结尾</div>
                </td>
            </tr>
            <tr>
                <td class="table_left">延时提示</td>
                <td><input class="table_text" name="conf[timeTip]" placeholder="请填写延时提示"
                           value="<?php echo $config['timeTip']; ?>">
                    <div class="table_info">分享描述结尾</div>
                </td>
            </tr>
            <tr>
                <td class="table_left">延时时间</td>
                <td><input class="table_text" name="conf[timeOut]" placeholder="请填写延时时间" value="<?php echo $config['timeOut']; ?>">
                    <div class="table_info">延时时间。多少秒后提示弹框</div>
                </td>
            </tr>
            <tr>
                <td class="table_left">延时跳转</td>
                <td><input class="table_text" name="conf[timeSrc]" placeholder="请填写延时跳转"
                           value="<?php echo $config['timeSrc']; ?>">
                    <div class="table_info">点确认多少的跳转地址</div>
                </td>
            </tr>
            <tr>
                <td class="table_left">顶部广告</td>
                <td><label class="up_image" for="up_img_img1"><input type="file" id="up_img_img1"
                                                                     accept=".jpg,.jpeg,.png,.gif,.bmp"
                                                                     style="display:none"><input
                                class="table_text table_checkbox" type="hidden" id="_img1" name="conf[img1]"
                                value="<?php echo $config['img1']; ?>"><img id="upimgbg_img1" class="up_img_img"
                                                                  onerror="this.src='/images/bg_upimg.svg';"
                                                                  src="<?php echo $config['img1']; ?>"></label>
                    <div class="table_info">顶部广告图片</div>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="table_title">分享设置</td>
            </tr>
            <tr>
                <td class="table_left">分享提示</td>
                <td><textarea class="table_text" name="conf[sInfo]" placeholder="请填写分享提示" spellcheck="false"><?php echo $config['sInfo']; ?></textarea>
                    <div class="table_info">分享提示文字</div>
                </td>
            </tr>
            <tr>
                <td class="table_left">分享文字</td>
                <td><textarea class="table_text" name="conf[sText]" placeholder="请填写分享文字" spellcheck="false"><?php echo $config['sText']; ?></textarea>
                    <div class="table_info">分享文字， ### 代表分享的地址</div>
                </td>
            </tr>
            <tr>
                <td class="table_left">复制提示</td>
                <td><textarea class="table_text" name="conf[sEnd]" placeholder="请填写复制提示" spellcheck="false"><?php echo $config['sEnd']; ?></textarea>
                    <div class="table_info">复制成功提示</div>
                </td>
            </tr>
            <tr>
                <td class="table_left">卡片链接</td>
                <td><textarea class="table_text" name="conf[shu]" placeholder="请填写卡片链接"
                              spellcheck="false"><?php echo $config['shu']; ?></textarea>
                    <div class="table_info">点击卡片要跳转的方向（格式带http://），<br>默认值
                        ?_wv={www}&f=FROM&{www}={wwwwnnn} <br>建议不填
                    </div>
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