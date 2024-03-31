(function(){
    var factory = function (exports) {
        var lang = {
            name        : "zh-tw",
            description : "開源在線Markdown編輯器<br/>Open source online Markdown editor.",
            tocTitle    : "目錄",
            placeholder : "使用 Markdown! 開始你的創作...",
            weekDays    : ["日", "一", "二", "三", "四", "五", "六"],
            wdPrefix    : "星期",//Only for Chinese! Set EMPTY for others
            toolbar     : {
                undo             : "撤銷（Ctrl+Z）",
                redo             : "重做（Ctrl+Y）",
                bold             : "粗體",
                del              : "刪除線",
                italic           : "斜體",
                quote            : "引用",
                ucwords          : "將所選的每個單詞首字母轉成大寫",
                uppercase        : "將所選文本轉成大寫",
                lowercase        : "將所選文本轉成小寫",
                h1               : "標題1",
                h2               : "標題2",
                h3               : "標題3",
                h4               : "標題4",
                h5               : "標題5",
                h6               : "標題6",
                "list-ul"        : "無序列表",
                "list-ol"        : "有序列表",
                hr               : "横线",
                link             : "链接",
                "reference-link" : "引用鏈接",
                image            : "圖片",
                code             : "行內代碼",
                "preformatted-text" : "預格式文本 / 代碼塊（縮進風格）",
                "code-block"     : "代碼塊（多語言風格）",
                table            : "添加表格",
                datetime         : "日期時間",
                emoji            : "Emoji 表情",
                "html-entities"  : "HTML 實體字符",
                pagebreak        : "插入分頁符",
                "goto-line"      : "跳轉到行",
                watch            : "關閉實時預覽",
                unwatch          : "開啟實時預覽",
                preview          : "全窗口預覽HTML（按 Shift + ESC 退出）",
                fullscreen       : "全屏（按 ESC 退出）",
                clear            : "清空",
                search           : "搜尋",
                help             : "使用幫助",
                info             : "關於" + exports.title
            },
            buttons : {
                enter  : "確定",
                cancel : "取消",
                close  : "關閉"
            },
            dialog : {
                link   : {
                    title    : "添加鏈接",
                    url      : "鏈接地址",
                    urlTitle : "鏈接標題",
                    urlEmpty : "錯誤：請填寫鏈接地址。"
                },
                referenceLink : {
                    title    : "添加引用鏈接",
                    name     : "引用名稱",
                    url      : "鏈接地址",
                    urlId    : "鏈接ID",
                    urlTitle : "鏈接標題",
                    nameEmpty: "錯誤：引用鏈接的名稱不能為空。",
                    idEmpty  : "錯誤：請填寫引用鏈接的ID。",
                    urlEmpty : "錯誤：請填寫引用鏈接的URL地址。"
                },
                image  : {
                    title    : "添加圖片",
                    url      : "圖片地址",
                    link     : "圖片鏈接",
                    alt      : "圖片描述",
                    uploadButton     : "本地上傳",
                    imageURLEmpty    : "錯誤：圖片地址不能為空。",
                    uploadFileEmpty  : "錯誤：上傳的圖片不能為空！",
                    formatNotAllowed : "錯誤：只允許上傳圖片文件，允許上傳的圖片文件格式有："
                },
                preformattedText : {
                    title             : "添加預格式文本或代碼塊", 
                    emptyAlert        : "錯誤：請填寫預格式文本或代碼的內容。",
                    placeholder       : "coding now...."
                },
                codeBlock : {
                    title             : "添加代碼塊",
                    selectLabel       : "代碼語言：",
                    selectDefaultText : "請語言代碼語言",
                    otherLanguage     : "其他語言",
                    unselectedLanguageAlert : "錯誤：請選擇代碼所屬的語言類型。",
                    codeEmptyAlert    : "錯誤：請填寫代碼內容。",
                    placeholder       : "coding now...."
                },
                htmlEntities : {
                    title : "HTML實體字符"
                },
                help : {
                    title : "使用幫助",
                    body  : `<div class=\"markdown-body\" style=\"font-family:微软雅黑, Helvetica, Tahoma, STXihei,Arial;height:390px;overflow:auto;font-size:14px;border-bottom:1px solid #ddd;padding:0 20px 20px 0;\">
				<h5>Markdown语法教程</h5><ul>
				</li><li><p><a href="https://markdown.p2hp.com/basic-syntax/" title="Markdown 语法说明（简体中文）">Markdown 语法说明（简体中文）</a></p>
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
