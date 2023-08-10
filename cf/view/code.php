<?php
include './cf/view/head.php'; ?>
<main class="main_block">
    <style>
        .fetch_code {
            text-align: left;
            width: 90%;
            margin: 0 auto 10px;
            padding-top: 10px;
        }

        .fetch_code pre {
            color: #44c;
            margin: 6px 0;
            padding: 8px 20px;
            font-size: 14px;
            font-weight: normal;
            background: #f5f5f5;
            border-radius: 10px;
            tab-size: 4;
            white-space: pre-wrap;
            word-break: break-all;
            font-family: 'Source Code Pro', 'DejaVu Sans Mono', 'Ubuntu Mono', Menlo, Monaco, Consolas, Arial;
        }

        .fetch_code .code_btn {
            font-size: 14px;
            color: #118AB2;
            border: none;
            cursor: pointer;
            line-height: 1;
            background: none;
            margin-left: 10px;
            text-decoration: underline;
            vertical-align: 1px;
            outline: none;
        }

        .fetch_code h1 {
            text-align: center;
            margin: 20px 0 10px;
            font-size: 24px;
        }

        .fetch_code h2 {
            margin: 30px 0 10px;
            font-size: 16px;
            font-weight: 500;
        }

        .fetch_code p {
            font-size: 14px;
            color: #666;
        }

        .fetch_code .fetch_link {
            margin: 10px 0 10px 22px;
            display: inline-block;
            color: #296DE8;
            text-decoration: underline;
        }

        #fetch_script {
            min-height: 200px;
        }
    </style>
    <div class="fetch_code"><h1>网站信息整理</h1>
        <ul>
            <li>
                <h2>网站信息快捷复制
                    <button class="code_btn code_copy">点此复制</button>
                    <button class="code_btn code_down">下载内容</button>
                </h2>
                <pre contenteditable='true' spellcheck='false'>服务器IP：	120.239.137.14	D:/xm/002
推广地址：	http://127.0.0.2/
后台地址：	http://127.0.0.2/cf.php?df
账号密码：	admin	123456
版本日期：	V180195(2023-07-24 14:30:08)</pre>
            </li>
            <li><h2>下载网站配置</h2><a href="?df=code&c=downconfig" class="fetch_link">下载配置</a></li>
        </ul>
        <h1>代码安装方法</h1>
        <ul>
            <li>
                <h2>JS 跨域引入
                    <button class="code_btn code_copy">点此复制</button>
                    <a href="?df=help" target="_blank" class="code_btn">查看帮助</a></h2>
                <pre contenteditable='true' spellcheck='false'>var host = '//127.0.0.2';</pre>
            </li>
            <li>
                <h2>加载，输出和转化
                    <button class="code_btn code_copy">点此复制</button>
                </h2>
                <pre contenteditable='true' spellcheck='false'>&lt;script src="./mp/config.js" &gt;&lt;/script&gt;
&lt;script&gt;
	document.write('&lt;script src="./mp/config.js?'+Math.random()+'" &gt;&lt;\/script&gt;');
	if(!window.conf){
		alert('没有发现您保存的设置，请在后台 选择模版并保存设置！');location.href='./cf.php';
	}
	if((/^(Win|Mac)/i.test(navigator.platform)||!/mobile|Android|phone|iPhone|iPod|ios|iPad/i.test(navigator.userAgent))&amp;&amp;(!localStorage.idf||parseInt( conf.mobile))){
		location = 'http://www.qq.com/babygohome/?pgv_ref=404';
	}
	document.body.oncopy=function(){if(window.cess)cess.init('复制微信');};
&lt;/script&gt;
&lt;base href="http://127.0.0.2/"&gt;</pre>
            </li>
        </ul>
    </div>
    <script>
        $(function () {
            $('.fetch_code pre a').click(function () {
                open($(this).attr('href'), '_blank');
            });
            $('.code_copy').click(function (e) {
                var node = $(this).parents('li').find('pre');
                copyText(node.text().replace(/^\s*(.+host\s\=\s\')https?\:(\/\/.+)\s*$/g, '\r\n$1$2'));
                selectNode(node[0]);
            });
            $('.code_down').click(function (e) {
                var text = $(this).parents('li').find('pre').html();
                text = '\r\n/* \r\n* 感谢声明：感谢您对恩科网络的长期支持，这是恩科网络给你发送的内容；\r\n* 技术支持：我们的技术范围有：PHP，JAVASCRIPT，JQUERY，MYSQL，HTML，CSS，THINKPHP，APACHE，NGINX，IIS，图片处理，UI设计，SEO技术顾问等；\r\n* 联系扣扣：3379530015。\r\n*/\r\n\r\n\r\n' + text;
                downText('网站配置【' + location.hostname + '】', text);
            });
        });

        function selectNode(dom) {
            var range = document.createRange();
            range.selectNode(dom);
            var selection = window.getSelection();
            if (selection.rangeCount > 0) selection.removeAllRanges();
            selection.addRange(range);
        }

        function copyText(t) {
            var p = document.createElement('textarea');
            p.value = t;
            p.style.opacity = 0;
            document.body.appendChild(p);
            p.select();
            document.execCommand("Copy");
            document.body.removeChild(p);
            window.tip && tip('复制成功！');
        }

        function downText(name, text) {
            name = name + ' ' + (new Date().toLocaleString().replace(/\W+/g, '')) + '.txt';
            text = text.replace(/\s*\n/g, '\r\n');
            if (!!window.ActiveXObject || "ActiveXObject" in window) {
                var winname = window.open('', '_blank', 'top=10000');
                winname.document.open('text/html', 'replace');
                winname.document.write(text);
                winname.document.execCommand('saveas', '', name);
                winname.close();
            } else {
                var e = document.createElement('a');
                e.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
                e.setAttribute('download', name);
                e.style.display = 'none';
                document.body.appendChild(e);
                e.click();
                document.body.removeChild(e);
            }
        }
    </script>
</main>

<?php
include './cf/view/foot.php'; ?>