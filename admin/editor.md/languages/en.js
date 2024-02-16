(function(){
    var factory = function (exports) {
        var lang = {
            name : "en",
            description : "Open source online Markdown editor.",
            tocTitle    : "Table of Contents",
            placeholder : "Enjoy Markdown! coding now...",
            weekDays    : ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            wdPrefix    : "",//Only for Chinese! Set EMPTY for others
            toolbar     : {
                undo             : "Undo(Ctrl+Z)",
                redo             : "Redo(Ctrl+Y)",
                bold             : "Bold",
                del              : "Strikethrough",
                italic           : "Italic",
                quote            : "Block quote",
                ucwords          : "Words first letter convert to uppercase",
                uppercase        : "Selection text convert to uppercase",
                lowercase        : "Selection text convert to lowercase",
                h1               : "Heading 1",
                h2               : "Heading 2",
                h3               : "Heading 3",
                h4               : "Heading 4",
                h5               : "Heading 5",
                h6               : "Heading 6",
                "list-ul"        : "Unordered list",
                "list-ol"        : "Ordered list",
                hr               : "Horizontal rule",
                link             : "Link",
                "reference-link" : "Reference link",
                image            : "Image",
                code             : "Code inline",
                "preformatted-text" : "Preformatted text / Code block (Tab indent)",
                "code-block"     : "Code block (Multi-languages)",
                table            : "Tables",
                datetime         : "Datetime",
                emoji            : "Emoji",
                "html-entities"  : "HTML Entities",
                pagebreak        : "Page break",
                "goto-line"      : "Go to line",
                watch            : "Unwatch",
                unwatch          : "Watch",
                preview          : "HTML Preview (Press Shift + ESC exit)",
                fullscreen       : "Fullscreen (Press ESC exit)",
                clear            : "Clear",
                search           : "Search",
                help             : "Help",
                info             : "About " + exports.title
            },
            buttons : {
                enter  : "Enter",
                cancel : "Cancel",
                close  : "Close"
            },
            dialog : {
                link : {
                    title    : "Link",
                    url      : "Address",
                    urlTitle : "Title",
                    urlEmpty : "Error: Please fill in the link address."
                },
                referenceLink : {
                    title    : "Reference link",
                    name     : "Name",
                    url      : "Address",
                    urlId    : "ID",
                    urlTitle : "Title",
                    nameEmpty: "Error: Reference name can't be empty.",
                    idEmpty  : "Error: Please fill in reference link id.",
                    urlEmpty : "Error: Please fill in reference link url address."
                },
                image : {
                    title    : "Image",
                    url      : "Address",
                    link     : "Link",
                    alt      : "Title",
                    uploadButton     : "Upload",
                    imageURLEmpty    : "Error: picture url address can't be empty.",
                    uploadFileEmpty  : "Error: upload pictures cannot be empty!",
                    formatNotAllowed : "Error: only allows to upload pictures file, upload allowed image file format:"
                },
                preformattedText : {
                    title             : "Preformatted text / Codes", 
                    emptyAlert        : "Error: Please fill in the Preformatted text or content of the codes.",
                    placeholder       : "coding now...."
                },
                codeBlock : {
                    title             : "Code block",
                    selectLabel       : "Languages: ",
                    selectDefaultText : "select a code language...",
                    otherLanguage     : "Other languages",
                    unselectedLanguageAlert : "Error: Please select the code language.",
                    codeEmptyAlert    : "Error: Please fill in the code content.",
                    placeholder       : "coding now...."
                },
                htmlEntities : {
                    title : "HTML Entities"
                },
                help : {
                    title : "Help",
                    body  : `<div class=\"markdown-body\" style=\"font-family:Microsoft Yahei, Helvetica, Tahoma, STXihei,Arial;height:390px;overflow:auto;font-size:14px;border-bottom:1px solid #ddd;padding:0 20px 20px 0;\">
				<h5>Markdown syntax tutorial</h5><ul>
				<li><p><a target="_blank" href="https://daringfireball.net/projects/markdown/syntax" title="Markdown Syntax">John Gruber Markdown Syntax</a></p>
				</li><li><p><a target="_blank" href="https://guides.github.com/features/mastering-markdown/" title="Mastering Markdown">Mastering Markdown - Github guide</a></p>
				</li><li><p><a target="_blank" href="https://help.github.com/articles/markdown-basics/" title="Markdown Basics">Markdown Basics from Github</a></p>
				</li><li><p><a target="_blank" href="https://help.github.com/articles/github-flavored-markdown/" title="GitHub Flavored Markdown">GitHub Flavored Markdown</a></p>
				</li><li><p><a target="_blank" href="http://www.markdown.cn/" title="Markdown syntax description (Simplified Chinese)">Markdown syntax description (Simplified Chinese)</a></p>
				</li><li><p><a target="_blank" href="http://markdown.tw/" title="Markdown syntax description (Traditional Chinese)">Markdown syntax description (Traditional Chinese)</a></p>
				</li></ul>
				<h5 id="h5--keyboard-shortcuts-">Keyboard shortcuts</h5>
				<blockquote>
				<p>Ctrl and Alt in the shortcut key table can be replaced by Cmd and Opt respectively on Mac systems.</p>
				</blockquote>
				<table>
					<thead>
					<tr>
					<th style="text-align: center;"><strong>Ctrl + S</strong></th>
					<th style="text-align: center;">Save</th>
					<th style="text-align: center;"><strong>F9</strong></th>
					<th style="text-align: center;">Toggle live preview</th>
					<th style="text-align: center;"><strong>Ctrl + Shift + R</strong></th>
					<th style="text-align: center;">Replace all</th>
					</tr>
					</thead>
					<tbody>
					<tr>
					<td style="text-align: center;"><strong>Ctrl+1~6</strong></td>
					<td style="text-align: center;">corresponds to H1 to H6 respectively</td>
					<td style="text-align: center;"><strong>F10</strong></td>
					<td style="text-align: center;">Editor full screen preview</td>
					<td style="text-align: center;"><strong>Ctrl + D</strong></td>
					<td style="text-align: center;">Current time</td>
					</tr>
					<tr>
					<td style="text-align: center;"><strong>Ctrl + U</strong></td>
					<td style="text-align: center;">Unordered list</td>
					<td style="text-align: center;"><strong>While holding down the Ctrl key, select different places in the editing area</strong></td>
					<td style="text-align: center;">Multiple cursor selection</td>
					<td style="text-align: center;"><strong>Ctrl + H</strong></td>
					<td style="text-align: center;">Horizontal line</td>
					</tr>
					<tr>
					<td style="text-align: center;"><strong>Ctrl + B</strong></td>
					<td style="text-align: center;">Bold</td>
					<td style="text-align: center;"><strong>Ctrl+ A</strong></td>
					<td style="text-align: center;">Select all</td>
					<td style="text-align: center;"><strong>Ctrl + L</strong></td>
					<td style="text-align: center;">Link</td>
					</tr>
					<tr>
					<td style="text-align: center;"><strong>Ctrl + I</strong></td>
					<td style="text-align: center;">italic</td>
					<td style="text-align: center;"><strong>Ctrl+ Z</strong></td>
					<td style="text-align: center;">Undo</td>
					<td style="text-align: center;"><strong>Ctrl + Shift + A</strong></td>
					<td style="text-align: center;">Github link</td>
					</tr>
					<tr>
					<td style="text-align: center;"><strong>Ctrl + K</strong></td>
					<td style="text-align: center;">Inline code</td>
					<td style="text-align: center;"><strong>Ctrl+ Y</strong></td>
					<td style="text-align: center;">Redo</td>
					<td style="text-align: center;"><strong>Ctrl + Shift + I</strong></td>
					<td style="text-align: center;">Image</td>
					</tr>
					<tr>
					<td style="text-align: center;"><strong>Shift + Alt + L</strong></td>
					<td style="text-align: center;">Convert selected text to lowercase</td>
					<td style="text-align: center;"><strong>Ctrl + F</strong></td>
					<td style="text-align: center;">Find search</td>
					<td style="text-align: center;"><strong>Ctrl + Shift + C</strong></td>
					<td style="text-align: center;">Code block</td>
					</tr>
					<tr>
					<td style="text-align: center;"><strong>Shift + Alt+ U</strong></td>
					<td style="text-align: center;">Convert first letter to uppercase</td>
					<td style="text-align: center;"><strong>Ctrl + Shift + G</strong></td>
					<td style="text-align: center;">Previous result</td>
					<td style="text-align: center;"><strong>Ctrl + Shift + P</strong></td>
					<td style="text-align: center;">Preformatted code block</td>
					</tr>
					<tr>
					<td style="text-align: center;"><strong>Ctrl + Alt + G</strong></td>
					<td style="text-align: center;">Jump to line</td>
					<td style="text-align: center;"><strong>Ctrl + G</strong></td>
					<td style="text-align: center;">Next result</td>
					<td style="text-align: center;"><strong>Ctrl + Shift + H</strong></td>
					<td style="text-align: center;">Html real font characters</td>
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
