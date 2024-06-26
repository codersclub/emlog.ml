(function(){
    var factory = function (exports) {
        var lang = {
            name	: "zh-cn",
            description : "开源在线Markdown编辑器<br/>Open source online Markdown editor.",
            tocTitle    : "目录",
            placeholder : "使用 Markdown! 开始你的创作...",
            weekDays    : ["日", "一", "二", "三", "四", "五", "六"],
            wdPrefix    : "星期",//Only for Chinese! Set EMPTY for others
            toolbar     : {
                undo             : "撤销（Ctrl+Z）",
                redo             : "重做（Ctrl+Y）",
                bold             : "粗体",
                del              : "删除线",
                italic           : "斜体",
                quote            : "引用",
                ucwords          : "将每个单词首字母转成大写",
                uppercase        : "将所选转换成大写",
                lowercase        : "将所选转换成小写",
                h1               : "标题1",
                h2               : "标题2",
                h3               : "标题3",
                h4               : "标题4",
                h5               : "标题5",
                h6               : "标题6",
                "list-ul"        : "无序列表",
                "list-ol"        : "有序列表",
                hr               : "横线",
                link             : "链接",
                "reference-link" : "引用链接",
                image            : "添加图片",
                code             : "行内代码",
                "preformatted-text" : "预格式文本 / 代码块（缩进风格）",
                "code-block"     : "代码块（多语言风格）",
                table            : "添加表格",
                datetime         : "日期时间",
                emoji            : "Emoji表情",
                "html-entities"  : "HTML实体字符",
                pagebreak        : "插入分页符",
                "goto-line"      : "跳转到行",
                watch            : "关闭实时预览",
                unwatch          : "开启实时预览",
                preview          : "全窗口预览HTML（按 Shift + ESC还原）",
                fullscreen       : "全屏（按ESC还原）",
                clear            : "清空",
                search           : "搜索",
                help             : "使用帮助",
                info             : "关于" + exports.title
            },
            buttons : {
                enter  : "确定",
                cancel : "取消",
                close  : "关闭"
            },
            dialog : {
                link : {
                    title    : "添加链接",
                    url      : "链接地址",
                    urlTitle : "链接标题",
                    urlEmpty : "错误：请填写链接地址。"
                },
                referenceLink : {
                    title    : "添加引用链接",
                    name     : "引用名称",
                    url      : "链接地址",
                    urlId    : "链接ID",
                    urlTitle : "链接标题",
                    nameEmpty: "错误：引用链接的名称不能为空。",
                    idEmpty  : "错误：请填写引用链接的ID。",
                    urlEmpty : "错误：请填写引用链接的URL地址。"
                },
                image : {
                    title    : "添加图片",
                    url      : "图片地址",
                    link     : "图片链接",
                    alt      : "图片描述",
                    uploadButton     : "本地上传",
                    imageURLEmpty    : "错误：图片地址不能为空。",
                    uploadFileEmpty  : "错误：上传的图片不能为空。",
                    formatNotAllowed : "错误：只允许上传图片文件，允许上传的图片文件格式有："
                },
                preformattedText : {
                    title             : "添加预格式文本或代码块", 
                    emptyAlert        : "错误：请填写预格式文本或代码的内容。",
                    placeholder       : "coding now...."
                },
                codeBlock : {
                    title             : "添加代码块",
                    selectLabel       : "代码语言：",
                    selectDefaultText : "请选择代码语言",
                    otherLanguage     : "其他语言",
                    unselectedLanguageAlert : "错误：请选择代码所属的语言类型。",
                    codeEmptyAlert    : "错误：请填写代码内容。",
                    placeholder       : "coding now...."
                },
                htmlEntities : {
                    title : "HTML 实体字符"
                },
                help : {
                    title : "使用帮助",
                    body  : `<div class=\"markdown-body\" style=\"font-family:微软雅黑, Helvetica, Tahoma, STXihei,Arial;height:390px;overflow:auto;font-size:14px;border-bottom:1px solid #ddd;padding:0 20px 20px 0;\">
				<h5>Markdown语法教程</h5><ul>
				<li><p><a href="https://markdown.p2hp.com/basic-syntax/" title="Markdown 语法说明（简体中文）">Markdown 语法说明（简体中文）</a></p>
				</li><li><p><a href="http://markdown.tw/" title="Markdown 語法說明（繁體中文）">Markdown 語法說明（繁體中文）</a></p>
				</li><li><p><a href="https://guides.github.com/features/mastering-markdown/" title="Mastering Markdown">Mastering Markdown</a></p>
				</li></ul>
				<h5 id="h5--keyboard-shortcuts-">键盘快捷键</h5>
				<blockquote>
				<p>快捷键表格中的Ctrl与Alt，在Mac系统中可分别被Cmd与Opt取代。</p>
				</blockquote>
				<table>
					<thead>
					<tr>
					<th style="text-align: center;"><strong><strong>Ctrl + S</strong></strong></th>
					<th style="text-align: center;">保存</th>
					<th style="text-align: center;"><strong><strong>F9</strong></strong></th>
					<th style="text-align: center;">切换实时预览</th>
					<th style="text-align: center;"><strong><strong>Ctrl + Shift + R</strong></strong></th>
					<th style="text-align: center;">全部替换</th>
					</tr>
					</thead>
					<tbody>
					<tr>
					<td style="text-align: center;"><strong><strong>Ctrl+1~6</strong></strong></td>
					<td style="text-align: center;">分别对应H1到H6</td>
					<td style="text-align: center;"><strong><strong>F10</strong></strong></td>
					<td style="text-align: center;">编辑器全屏预览</td>
					<td style="text-align: center;"><strong><strong>Ctrl + D</strong></strong></td>
					<td style="text-align: center;">当前时间</td>
					</tr>
					<tr>
					<td style="text-align: center;"><strong><strong>Ctrl + U</strong></strong></td>
					<td style="text-align: center;">无序列表</td>
					<td style="text-align: center;"><strong><strong>按住Ctrl键的同时，选择编辑区的不同地方</strong></strong></td>
					<td style="text-align: center;">多光标选择</td>
					<td style="text-align: center;"><strong><strong>Ctrl + H</strong></strong></td>
					<td style="text-align: center;">水平线</td>
					</tr>
					<tr>
					<td style="text-align: center;"><strong><strong>Ctrl + B</strong></strong></td>
					<td style="text-align: center;">粗体</td>
					<td style="text-align: center;"><strong><strong>Ctrl+ A</strong></strong></td>
					<td style="text-align: center;">全选</td>
					<td style="text-align: center;"><strong><strong>Ctrl + L</strong></strong></td>
					<td style="text-align: center;">链接</td>
					</tr>
					<tr>
					<td style="text-align: center;"><strong><strong>Ctrl + I</strong></strong></td>
					<td style="text-align: center;">斜体</td>
					<td style="text-align: center;"><strong><strong>Ctrl+ Z</strong></strong></td>
					<td style="text-align: center;">撤销</td>
					<td style="text-align: center;"><strong><strong>Ctrl + Shift + A</strong></strong></td>
					<td style="text-align: center;">Github链接</td>
					</tr>
					<tr>
					<td style="text-align: center;"><strong><strong>Ctrl + K</strong></strong></td>
					<td style="text-align: center;">行内代码</td>
					<td style="text-align: center;"><strong><strong>Ctrl+ Y</strong></strong></td>
					<td style="text-align: center;">重做</td>
					<td style="text-align: center;"><strong><strong>Ctrl + Shift + I</strong></strong></td>
					<td style="text-align: center;">图片</td>
					</tr>
					<tr>
					<td style="text-align: center;"><strong><strong>Shift + Alt + L</strong></strong></td>
					<td style="text-align: center;">所选文本转为小写</td>
					<td style="text-align: center;"><strong><strong>Ctrl + F</strong></strong></td>
					<td style="text-align: center;">查找搜索</td>
					<td style="text-align: center;"><strong><strong>Ctrl + Shift + C</strong></strong></td>
					<td style="text-align: center;">代码区块</td>
					</tr>
					<tr>
					<td style="text-align: center;"><strong><strong>Shift + Alt+ U</strong></strong></td>
					<td style="text-align: center;">首字母转为大写</td>
					<td style="text-align: center;"><strong><strong>Ctrl + Shift + G</strong></strong></td>
					<td style="text-align: center;">上一个结果</td>
					<td style="text-align: center;"><strong><strong>Ctrl + Shift + P</strong></strong></td>
					<td style="text-align: center;">Pre标签代码区块</td>
					</tr>
					<tr>
					<td style="text-align: center;"><strong><strong>Ctrl + Alt + G</strong></strong></td>
					<td style="text-align: center;">跳转到行</td>
					<td style="text-align: center;"><strong><strong>Ctrl + G</strong></strong></td>
					<td style="text-align: center;">下一个结果</td>
					<td style="text-align: center;"><strong><strong>Ctrl + Shift + H</strong></strong></td>
					<td style="text-align: center;">Html实体字符</td>
					</tr>
					</tbody>
				</table>
			</div>`
                }
            }
        };

        exports.defaults.lang = lang;
    };

	// CommonJS/Node.js
	if (typeof require === "function" && typeof exports === "object" && typeof module === "object")
    {
        module.exports = factory;
    }
	else if (typeof define === "function")  // AMD/CMD/Sea.js
    {
		if (define.amd) { // for Require.js

			define(["editormd"], function(editormd) {
                factory(editormd);
            });

		} else { // for Sea.js
			define(function(require) {
                var editormd = require("../editormd");
                factory(editormd);
            });
		}
	}
	else
	{
        factory(window.editormd);
	}

})();
