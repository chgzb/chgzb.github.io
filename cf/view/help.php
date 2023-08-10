<?php
include './cf/view/head.php'; ?>
<main class="main_block">
    <style>

        .help_li img {
            max-width: 66%;
            border: solid 2px #eee;
            border-radius: 10px;
            padding: 5px 15px;
            margin-left: 10px;
        }

        @media (max-width: 750px) {
            .help_li img {
                max-width: 95%;
            }
        }
    </style>
    <div class="help_block">
        <div class="help_li">
            <div class="help_title">安装方法</div>
            <div class="help_con">
                <ol>
                    <li>将此程序(index.html……等全部文件)复制相应的目录</li>
                    <li>后台地址 http://www.您的域名.com/cf.php</li>
                </ol>
            </div>
        </div>
        <div class="help_li">
            <div class="help_title">运行环境要求</div>
            <div class="help_con">
                <ul>
                    <li>安装方法：一键复制到服务器就可运行</li>
                    <li>代码大小：5M</li>
                    <li>运行环境：PHP 5.4 ~ 6.5</li>
                    <li>数 据 库：无需</li>
                    <li>伪 静 态：无需</li>
                    <li>浏 览 器：手机端</li>
                </ul>
            </div>
        </div>
        <div class="help_li">
            <div class="help_title">无法运行</div>
            <div class="help_con">
                <ol>
                    <li>请检查解析是否正确</li>
                    <li>请检查域名指向地址；<a target="_blank" href="http://tool.chinaz.com/dns/">http://tool.chinaz.com/dns/</a>
                        如果指向的IP是正常，和您的空间(服务器)所在的IP相同
                    </li>
                    <li>在根目录建一个测试文件，看能否打开(根目录的位置请咨询空间商)</li>
                    <li>如上都正确，请将文件夹压上传到响应目录即可</li>
                </ol>
            </div>
        </div>
        <div class="help_li">
            <div class="help_title">域名主机商推荐</div>
            <div class="help_con">
                <ol>
                    <li>在线工具 <a target="_blank" href="http://tools.qedns.cn/code/">在线工具</a></li>
                    <li>域名商推荐 <a target="_blank" href="https://www.xz.com/seller/index">打开 xz.com</a></li>
                    <li>主机商推荐 <a target="_blank"
                                      href="https://item.taobao.com/item.htm?spm=a230r.1.14.25.231a9432Ki5E1I&amp;id=560178118297&amp;ns=1&amp;abbucket=17#detail">打开淘宝链接</a>
                    </li>
                    <li>上传软件 <a target="_blank" href="https://pc.qq.com/detail/13/detail_3313.html">FTP管理器</a>
                    </li>
                    <li>编辑工具 <a target="_blank" href="https://pc.qq.com/detail/0/detail_1300.html">Notepad++</a>
                    </li>
                </ol>
            </div>
        </div>
        <div class="help_li">
            <div class="help_title">静态云搭建教程</div>
            <div class="help_con">
                <ol>
                    <li>./@BT/ 文件放宝塔</li>
                    <li>./index.html 改宝塔的地址，</li>
                    <li>不懂得话，收费咨询</li>
                    <li><img src="//server.ll03.cn/Acc/vAdm2/images/oss_1.png"></li>
                    <li><img src="//server.ll03.cn/Acc/vAdm2/images/oss_2.png"></li>
                </ol>
            </div>
        </div>
        <div class="help_li">
            <div class="help_title">修改规则/代码/预览</div>
            <div class="help_con"><img src="//server.ll03.cn/Acc/vAdm2/images/code.png"></div>
        </div>
    </div>
</main>
<?php
include './cf/view/foot.php'; ?>