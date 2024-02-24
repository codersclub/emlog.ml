(function(){
    var factory = function (exports) {
        var lang = {
            name : "ru",
            description : "Онлайн Markdown редактор с открытым кодом.",
            tocTitle    : "Содержание",
            placeholder : "Наслаждайтесь кодом Markdown!...",
            weekDays    : ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"],
            wdPrefix    : "",//Only for Chinese! Set EMPTY for others
            toolbar     : {
                undo             : "Отмена(Ctrl+Z)",
                redo             : "Повтор(Ctrl+Y)",
                bold             : "Жирный",
                del              : "Зачёркнутый",
                italic           : "Наклонный",
                quote            : "Цитата",
                ucwords          : "Words first letter convert to uppercase",
                uppercase        : "Selection text convert to uppercase",
                lowercase        : "Selection text convert to lowercase",
                h1               : "Заголовок 1",
                h2               : "Заголовок 2",
                h3               : "Заголовок 3",
                h4               : "Заголовок 4",
                h5               : "Заголовок 5",
                h6               : "Заголовок 6",
                "list-ul"        : "Простой список",
                "list-ol"        : "Нумерованный список",
                hr               : "Разделительная линия",
                link             : "Ссылка",
                "reference-link" : "Reference link",
                image            : "Изображение",
                code             : "Code inline",
                "preformatted-text" : "Форматированный текст / Блок кода (с Tab отступом)",
                "code-block"     : "Блок кода с указанием языка",
                table            : "Таблица",
                datetime         : "Дата/Время",
                emoji            : "Emoji",
                "html-entities"  : "HTML Entities",
                pagebreak        : "Разрыв страницы",
                "goto-line"      : "Перейти к строке",
                watch            : "Unwatch",
                unwatch          : "Watch",
                preview          : "Предпросмотр (Выход - Shift + ESC)",
                fullscreen       : "На весь экран (Выход - ESC)",
                clear            : "Очистить",
                search           : "Поиск",
                help             : "Помощь",
                info             : "О проекте: " + exports.title
            },
            buttons : {
                enter  : "Enter",
                cancel : "Отмена",
                close  : "Закрыть"
            },
            dialog : {
                link : {
                    title    : "Ссылка",
                    url      : "URL",
                    urlTitle : "Заголовок",
                    urlEmpty : "Ошибка: Необходимо указать URL."
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
                    title : "Помощь",
                    body  : `<div class=\"markdown-body\" style=\"font-family:Microsoft Yahei, Helvetica, Tahoma, STXihei,Arial;height:390px;overflow:auto;font-size:14px;border-bottom:1px solid #ddd;padding:0 20px 20px 0;\">
				<h5>Руководство по синтаксису Markdown</h5><ul>
				<li><p><a href="target="_blank" https://daringfireball.net/projects/markdown/syntax" title="Markdown Syntax">Оригинальный синтаксис от Джона Грубера</a></p>
				</li><li><p><a target="_blank" href="https://guides.github.com/features/mastering-markdown/" title="Mastering Markdown">Осваиваем Markdown - руководство от Github</a></p>
				</li><li><p><a target="_blank" href="https://help.github.com/articles/markdown-basics/" title="Markdown Basics">Основы Markdown от Github</a></p>
				</li><li><p><a target="_blank" href="https://help.github.com/articles/github-flavored-markdown/" title="GitHub Flavored Markdown">Markdown со вкусом GitHub</a></p>
				</li><li><p><a target="_blank" href="http://www.markdown.cn/" title="Markdown syntax description (Simplified Chinese)">Синтаксис Markdown на упрощённом китайском</a></p>
				</li><li><p><a target="_blank" href="http://markdown.tw/" title="Markdown syntax description (Traditional Chinese)">Синтаксис Markdown на традиционном китайском</a></p>
				</li></ul>
				<h5 id="h5--keyboard-shortcuts-">Горячие клавиши</h5><blockquote>
				<p>Если вы работаете на Mac, то указанные в таблице клавиши Ctrl и Alt следует заменить на Cmd и Opt соответственно.</p>
				</blockquote>
				<table>
					<thead>
					<tr>
					<th style="text-align: center;"><strong>Ctrl + S</strong></th>
					<th style="text-align: center;">Сохранить</th>
					<th style="text-align: center;"><strong>F9</strong></th>
					<th style="text-align: center;">Переключение: предпросмотр</th>
					<th style="text-align: center;"><strong>Ctrl + Shift + R</strong></th>
					<th style="text-align: center;">Заменить всё</th>
					</tr>
					</thead>
					<tbody>
					<tr>
					<td style="text-align: center;"><strong>Ctrl + 1~6</strong></td>
					<td style="text-align: center;">соответствует заголовку H1 ~ H6 соответственно</td>
					<td style="text-align: center;"><strong>F10</strong></td>
					<td style="text-align: center;">Полноэкранный режим</td>
					<td style="text-align: center;"><strong>Ctrl + D</strong></td>
					<td style="text-align: center;">Текущее время</td>
					</tr>
					<tr>
					<td style="text-align: center;"><strong>Ctrl + U</strong></td>
					<td style="text-align: center;">Ненумерованный список</td>
					<td style="text-align: center;"><strong>Клик по элементу списка при нажатом Ctrl</strong></td>
					<td style="text-align: center;">Выделение нескольких элементов списка</td>
					<td style="text-align: center;"><strong>Ctrl + H</strong></td>
					<td style="text-align: center;">Горизонтальная линия</td>
					</tr>
					<tr>
					<td style="text-align: center;"><strong>Ctrl + B</strong></td>
					<td style="text-align: center;">Жирный</td>
					<td style="text-align: center;"><strong>Ctrl+ A</strong></td>
					<td style="text-align: center;">Выделить всё</td>
					<td style="text-align: center;"><strong>Ctrl + L</strong></td>
					<td style="text-align: center;">Ссылка</td>
					</tr>
					<tr>
					<td style="text-align: center;"><strong>Ctrl + I</strong></td>
					<td style="text-align: center;">Наклонный</td>
					<td style="text-align: center;"><strong>Ctrl+ Z</strong></td>
					<td style="text-align: center;">Откат</td>
					<td style="text-align: center;"><strong>Ctrl + Shift + A</strong></td>
					<td style="text-align: center;">Ссылка на Github</td>
					</tr>
					<tr>
					<td style="text-align: center;"><strong>Ctrl + K</strong></td>
					<td style="text-align: center;">Код внутри строки</td>
					<td style="text-align: center;"><strong>Ctrl+ Y</strong></td>
					<td style="text-align: center;">Повтор</td>
					<td style="text-align: center;"><strong>Ctrl + Shift + I</strong></td>
					<td style="text-align: center;">Изображение</td>
					</tr>
					<tr>
					<td style="text-align: center;"><strong>Shift + Alt + L</strong></td>
					<td style="text-align: center;">Перевести в нижний регистр</td>
					<td style="text-align: center;"><strong>Ctrl + F</strong></td>
					<td style="text-align: center;">Поиск</td>
					<td style="text-align: center;"><strong>Ctrl + Shift + C</strong></td>
					<td style="text-align: center;">Блок кода</td>
					</tr>
					<tr>
					<td style="text-align: center;"><strong>Shift + Alt+ U</strong></td>
					<td style="text-align: center;">Перевести в верхний регистр первые буквы слов</td>
					<td style="text-align: center;"><strong>Ctrl + Shift + G</strong></td>
					<td style="text-align: center;">Предыдущий результат</td>
					<td style="text-align: center;"><strong>Ctrl + Shift + P</strong></td>
					<td style="text-align: center;">Предформатированный текст</td>
					</tr>
					<tr>
					<td style="text-align: center;"><strong>Ctrl + Alt + G</strong></td>
					<td style="text-align: center;">Перейти к строке</td>
					<td style="text-align: center;"><strong>Ctrl + G</strong></td>
					<td style="text-align: center;">Следующий результат</td>
					<td style="text-align: center;"><strong>Ctrl + Shift + H</strong></td>
					<td style="text-align: center;">HTML символы</td>
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
