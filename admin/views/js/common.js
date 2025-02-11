function getChecked(node) {
    let re = false;
    $('input.' + node).each(function (i) {
        if (this.checked) {
            re = true;
        }
    });
    return re;
}

function timestamp() {
    return new Date().getTime();
}

function em_confirm(id, property, token) {
    let url;
    let msg = '';
    let text = ''
    switch (property) {
        case 'article':
            url = 'article.php?action=del&gid=' + id;
            text = lang('article_del_sure');
            delArticle(msg, text, url, token)
            break;
        case 'draft':
            url = 'article.php?action=del&draft=1&gid=' + id;
            msg = lang('draft_del_sure');
            delAlert(msg, text, url, token)
            break;
        case 'tw':
            url = 'twitter.php?action=del&id=' + id;
            msg = lang('twitter_del_sure');
            delAlert(msg, text, url, token)
            break;
        case 'comment':
            url = 'comment.php?action=del&id=' + id;
            msg = lang('comment_del_sure');
            delAlert(msg, text, url, token)
            break;
        case 'commentbyip':
            url = 'comment.php?action=delbyip&ip=' + id;
            msg = lang('comment_ip_del_sure');
            delAlert(msg, text, url, token)
            break;
        case 'link':
            url = 'link.php?action=del&linkid=' + id;
            msg = lang('link_del_sure');
            delAlert(msg, text, url, token)
            break;
        case 'navi':
            url = 'navbar.php?action=del&id=' + id;
            msg = lang('navi_del_sure');
            delAlert(msg, text, url, token)
            break;
        case 'media':
            url = 'media.php?action=delete&aid=' + id;
            msg = lang('attach_del_sure');
            delAlert(msg, text, url, token)
            break;
        case 'avatar':
            url = 'blogger.php?action=delicon';
            msg = lang('avatar_del_sure');
            delAlert(msg, text, url, token)
            break;
        case 'sort':
            url = 'sort.php?action=del&sid=' + id;
            msg = lang('category_del_sure');
            delAlert(msg, text, url, token)
            break;
        case 'del_user':
            url = 'user.php?action=del&uid=' + id;
            msg = lang('user_del_sure');
            delAlert(msg, text, url, token)
            break;
        case 'forbid_user':
            url = 'user.php?action=forbid&uid=' + id;
            text = lang('user_disable_sure');
            delAlert(msg, text, url, token, lang('disable'))
            break;
        case 'tpl':
            url = 'template.php?action=del&tpl=' + id;
            msg = lang('template_del_sure');
            delAlert(msg, text, url, token)
            break;
        case 'reset_widget':
            url = 'widgets.php?action=reset';
            text = lang('plugin_reset_sure') + lang('plugin_reset_info');
            delAlert(msg, text, url, lang('reset'))
            break;
        case 'plu':
            url = 'plugin.php?action=del&plugin=' + id;
            msg = lang('plugin_del_sure');
            delAlert(msg, text, url, token)
            break;
        case 'media_sort':
            url = 'media.php?action=del_media_sort&id=' + id;
            text = lang('media_category_del_sure') + lang('category_not_deleted');
            delAlert(msg, text, url, token)
            break;
    }
}

function infoAlert(msg) {
    layer.alert(msg, {
        icon: 2,
        shadeClose: true,
        title: '',
    });
}

function delAlert(msg, text, url, token, btnText = lang('delete')) {
    // icon: 0 default, 1 ok, 2 err, 3 ask
    layer.confirm(text, {icon: 3, title: msg, skin: 'class-layer-danger', btn: [btnText, lang('cancel')]}, function (index) {
        window.location = url + '&token=' + token;
        layer.close(index);
    });
}

function delAlert2(msg, text, actionClosure, btnText = lang('delete')) {
    layer.confirm(text, {icon: 3, title: msg, skin: 'class-layer-danger', btn: [btnText, lang('cancel')]}, function (index) {
        actionClosure(); // Execute closure
        layer.close(index);
    });
}

function delArticle(msg, text, url, token) {
    layer.confirm(text, {
        title: msg,
        icon: 3,
        btn: [lang('save_draft'), '<span class="text-danger">'+lang('del_completely')+'</span>', lang('cancel')]
    }, function (index) {
        window.location = url + '&token=' + token;
        layer.close(index);
    }, function (index) {
        window.location = url + '&rm=1&token=' + token;
        layer.close(index);
    }, function (index) {
        layer.close(index);
    });
}

function submitForm(formId, successMsg) {
    $.ajax({
        type: "POST",
        url: $(formId).attr('action'),
        data: $(formId).serialize(),
        success: function () {
/*vot*/     cocoMessage.success(successMsg || lang('save_success'))
        },
        error: function (xhr) {
            const errorMsg = JSON.parse(xhr.responseText).msg;
            cocoMessage.error(errorMsg, 4000)
        }
    });
}

function focusEle(id) {
    try {
        document.getElementById(id).focus();
    } catch (e) {
    }
}

function hideActived() {
    $(".alert-success").slideUp(300);
    $(".alert-danger").slideUp(300);
}

// Click action of [More Options]
let icon_mod = "down";

function displayToggle(id) {
    $("#" + id).toggle();
    if (icon_mod === "down") {
        icon_mod = "right";
        $(".icofont-simple-down").attr("class", "icofont-simple-right");
    } else {
        icon_mod = "down";
        $(".icofont-simple-right").attr("class", "icofont-simple-down");
    }

    // Using local storage to save state
    localStorage.setItem('em_' + id, icon_mod);
}

function applyStoredState(id) {
    let storedState = localStorage.getItem('em_' + id);
    if (storedState) {
        icon_mod = storedState;
        if (icon_mod === "right") {
            $("#" + id).hide();
            $(".icofont-simple-down").attr("class", "icofont-simple-right");
        } else {
            $("#" + id).show();
            $(".icofont-simple-right").attr("class", "icofont-simple-down");
        }
    }
}

function doToggle(id) {
    $("#" + id).toggle();
}

function insertTag(tag, boxId) {
    var targetinput = $("#" + boxId).val();
    if (targetinput == '') {
        targetinput += tag;
    } else {
        var n = ',' + tag;
        targetinput += n;
    }
    $("#" + boxId).val(targetinput);
    if (boxId == "tag") $("#tag_label").hide();
}

function isalias(a) {
    var reg1 = /^[\w-]*$/;
    var reg2 = /^\d+$/;
    var reg3 = /^post(-\d+)?$/;
    if (!reg1.test(a)) {
        return 1;
    } else if (reg2.test(a)) {
        return 2;
    } else if (reg3.test(a)) {
        return 3;
    } else if (a === 't' || a === 'm' || a === 'admin') {
        return 4;
    } else {
        return 0;
    }
}

function checkform() {
    var a = $.trim($("#alias").val());
    var t = $.trim($("#title").val());

/*vot*/ if (typeof articleTextRecord !== "undefined") {  // When submitting, reset the original text record value to prevent the leaving prompt from appearing
        articleTextRecord = $("textarea[name=logcontent]").text();
    } else {
        pageText = $("textarea").text();
    }
    if (0 == isalias(a)) {
        return true;
    } else {
        infoAlert(lang('alias_link_error'));
        $("#alias").focus();
        return false;
    }
}

function checkalias() {
    var a = $.trim($("#alias").val());
    if (1 == isalias(a)) {
        $("#alias_msg_hook").html('<span id="input_error">' + lang('alias_invalid_chars') + '</span>');
    } else if (2 == isalias(a)) {
        $("#alias_msg_hook").html('<span id="input_error">' + lang('alias_digital') + '</span>');
    } else if (3 == isalias(a)) {
        $("#alias_msg_hook").html('<span id="input_error">' + lang('alias_format_must_be') + '</span>');
    } else if (4 == isalias(a)) {
        $("#alias_msg_hook").html('<span id="input_error">' + lang('alias_system_conflict') + '</span>');
    } else {
        $("#alias_msg_hook").html('');
        $("#msg").html('');
    }
}

// act: 1 = Auto save, 2 = User manually saves
function autosave(act) {
    const nodeid = "as_logid";
    const timeout = 60000;
    const url = "article_save.php?action=autosave";
    const alias = $.trim($("#alias").val());
    const content = Editor.getMarkdown();
    let ishide = $.trim($("#ishide").val());
    if (ishide === "") {
        $("#ishide").val("y")
    }

    if (alias != '' && 0 != isalias(alias)) {
        $("#msg").show().html(lang('alias_link_error_not_saved'));
        if (act == 0) {
            setTimeout("autosave(1)", timeout);
        }
        return;
    }
    // Do not automatically save when editing published article
    if (act == 1 && ishide == 'n') {
        return;
    }
    // Do not save automatically when the content is empty
    if (act == 1 && content == "") {
        setTimeout("autosave(1)", timeout);
        return;
    }
    // Manual saving is not allowed when the last successful save time is less than one second
    if ((new Date().getTime() - Cookies.get('em_saveLastTime')) < 1000 && act != 1) return;

    const $savedf = $("#savedf");
    const btname = $savedf.val();
    $savedf.val(lang('saving')).attr("disabled", "disabled");
    $('title').text(lang('saving_in') + titleText);
    $.post(url, $("#addlog").serialize(), function (data) {
        data = $.trim(data);
        var isresponse = /.*autosave\_gid\:\d+\_.*/;
        if (isresponse.test(data)) {
            const getvar = data.match(/_gid:([\d]+)_/);
            const logid = getvar[1];
            const d = new Date();
            const h = d.getHours();
            const m = d.getMinutes();
            const tm = (h < 10 ? "0" + h : h) + ":" + (m < 10 ? "0" + m : m);
            $("#save_info").html(lang('saved_ok_time') + tm + ' <a href="../?post=' + logid + '" target="_blank">' + lang('article_preview') + '</a>');
            $('title').text(lang('saved_ok') + titleText);
            setTimeout(function () {
                $('title').text(titleText);
            }, 2000);
            articleTextRecord = $("#addlog textarea[name=logcontent]").val(); // After the save is successful, replace the original text record value with the current text
            Cookies.set('em_saveLastTime', new Date().getTime()); // Put (or update) the save success timestamp into a cookie
            $("#" + nodeid).val(logid);
            $("#savedf").attr("disabled", false).val(btname);
        } else {
            $("#savedf").attr("disabled", false).val(btname);
/*vot*/     $("#save_info").html(lang('save_system_error')).addClass("alert-danger");
            $('title').text(lang('save_failed') + titleText);
        }
    });
    if (act == 1) {
        setTimeout("autosave(1)", timeout);
    }
}

// editor.md: Page AutoSave shortcut: Ctrl + S
const pagetitle = $('title').text();

function pagesave() {
/*vot*/ document.addEventListener('keydown', function (e) {  // Prevents the browser default action from autosave
        if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
            e.preventDefault();
        }
    });
    let url = "page.php?action=save";
    if ($("[name='pageid']").attr("value") < 0) return infoAlert(lang('save_first'));
/*vot*/ if (!$("[name='pagecontent']").html()) return infoAlert(lang('content_empty'));
/*vot*/ $('title').text(lang('saving_in') + ' ' + pagetitle);
    $.post(url, $("#addlog").serialize(), function (data) {
/*vot*/ $('title').text(lang('saved_ok') + pagetitle);
        setTimeout(function () {
            $('title').text(pagetitle);
        }, 2000);
        pageText = $("textarea").text();
    }).fail(function () {
/*vot*/ $('title').text(lang('save_failed') + pagetitle);
/*vot*/ infoAlert(lang('save_failed!'))
    });
}

// toggle plugin
$.fn.toggleClick = function () {
    var functions = arguments;
    return this.click(function () {
        var iteration = $(this).data('iteration') || 0;
        functions[iteration].apply(this, arguments);
        iteration = (iteration + 1) % functions.length;
        $(this).data('iteration', iteration);
    });
};

function removeHTMLTag(str) {
    str = str.replace(/<\/?[^>]*>/g, ''); //Remove HTML tags
    str = str.replace(/[ | ]*\n/g, '\n'); //Remove trailing whitespace
    str = str.replace(/ /ig, '');
    return str;
}

// editor.md js hook
var queue = new Array();
var hooks = {
    addAction: function (hook, func) {
        if (typeof (queue[hook]) == "undefined" || queue[hook] == null) {
            queue[hook] = new Array();
        }
        if (typeof func == 'function') {
            queue[hook].push(func);
        }
    },
    doAction: function (hook, obj) {
        try {
            for (var i = 0; i < queue[hook].length; i++) {
                queue[hook][i](obj);
            }
        } catch (e) {
        }
    }
}

// Paste upload image
function imgPasteExpand(thisEditor) {
/*vot*/    var listenObj = document.querySelector("textarea").parentNode  // Object to listen for
/*vot*/    var postUrl = './media.php?action=upload';  // emlog image upload address
/*vot*/    var emMediaPhpUrl = "./media.php?action=lib";  // The resource library address of emlog, which is used to asynchronously obtain the uploaded image data

    // By dynamically configuring the read-only mode, the original paste action of the editor is prevented and the cursor position is restored
    function preventEditorPaste() {
        let l = thisEditor.getCursor().line;
        let c = thisEditor.getCursor().ch - 3;

        thisEditor.config({readOnly: true,});
        thisEditor.config({readOnly: false,});
        thisEditor.setCursor({line: l, ch: c});
    }

    // The editor replaces the text by the first few digits of the cursor position
    function replaceByNum(text, num) {
        let l = thisEditor.getCursor().line;
        let c = thisEditor.getCursor().ch;

        thisEditor.setSelection({line: l, ch: (c - num)}, {line: l, ch: c});
        thisEditor.replaceSelection(text);
    }

    // Paste event fires
    listenObj.addEventListener("paste", function (e) {
/*vot*/        if ($('.editormd-dialog').css('display') == 'block') return;  // Exit if editor has dialog
        if (!(e.clipboardData && e.clipboardData.items)) return;

/*vot*/        var pasteData = e.clipboardData || window.clipboardData; // Get the entire contents of the clipboard
/*vot*/        pasteAnalyseResult = new Array;  // Used to store the results of traversal analysis

/*vot*/        for (var i = 0; i < pasteData.items.length; i++) {  // Traverse the data in the analysis clipboard
            var item = pasteData.items[i];

            if ((item.kind == "file") && (item.type.match('^image/'))) {
                var imgData = item.getAsFile();
                if (imgData.size === 0) return;
                pasteAnalyseResult['type'] = 'img';
                pasteAnalyseResult['data'] = imgData;
/*vot*/                break;  // When there is a picture in the pasteboard, jump out of the loop
            }
            ;
        }

/*vot*/        if (pasteAnalyseResult['type'] == 'img') {  // If there is a picture in the clipboard, upload the picture
            preventEditorPaste();
            uploadImg(pasteAnalyseResult['data']);
            return;
        }
    }, false);

    // Upload image
    function uploadImg(img) {
        var formData = new FormData();
        var imgName = lang('paste_upload') + new Date().getTime() + "." + img.name.split(".").pop();

        formData.append('file', img, imgName);
        thisEditor.insertValue(lang('uploading'));
        $.ajax({
            url: postUrl, type: 'post', data: formData, processData: false, contentType: false, xhr: function () {
                var xhr = $.ajaxSettings.xhr();
                if (xhr.upload) {
                    thisEditor.insertValue("....");
                    xhr.upload.addEventListener('progress', function (e) {  // Show upload progress
                        console.log(lang('progress') + e.loaded + ' / ' + e.total);
                        let percent = Math.floor(e.loaded / e.total * 100);
                        if (percent < 10) {
                            replaceByNum('..' + percent + '%', 4);
                        } else if (percent < 100) {
                            replaceByNum('.' + percent + '%', 4);
                        } else {
                            replaceByNum(percent + '%', 4);
                        }
                    }, false);
                }
                return xhr;
            }, success: function (result) {
                console.log(lang('upload_ok_get_result'));
                $.get(emMediaPhpUrl, function (resp) {
                    var image = resp.data.images[0];
                    if (image) {
/*vot*/                 console.log(lang('result_ok'));
/*vot*/                 replaceByNum(`[![](${image.media_icon})](${image.media_url})`, 10);  // The number 10 here corresponds to 'Uploading...100%' which is 10 characters
                    } else {
/*vot*/                 console.log(lang('get_result_fail'));
/*vot*/                 infoAlert(lang('get_result_fail'));
                    }
                })
            }, error: function (result) {
                infoAlert(lang('upload_failed_error'));
                replaceByNum(lang('upload_failed_error'), 6);
            }
        })
    }
}

// Attach the paste upload image function to the js hook located in the article editor and page editor
hooks.addAction("loaded", imgPasteExpand);
hooks.addAction("page_loaded", imgPasteExpand);

function checkUpdate() {
    const updateModal = $("#update-modal");
    const updateModalLoading = $("#update-modal-loading");
    const updateModalMsg = $("#update-modal-msg");
    const updateModalChanges = $("#update-modal-changes");
    const updateModalBtn = $("#update-modal-btn");

    updateModal.modal('show');
    updateModalLoading.addClass("spinner-border text-primary");

    let rep_msg = "";
    let rep_changes = "";
    let rep_btn = "";

    updateModalMsg.html(rep_msg);
    updateModalChanges.html(rep_changes);
    updateModalBtn.html(rep_btn);

    $.get("./upgrade.php?action=check_update", function (result) {
        if (result.code === 1001) {
/*vot*/     rep_msg = lang('emlog_not_registered') + ': <a href="auth.php">' + lang('register') + '</a>';
        } else if (result.code === 1002) {
            rep_msg = lang('is_latest_version');
        } else if (result.code === 200) {
            rep_msg = lang('new_ver_available') + `: <span class="text-danger">${result.data.version}</span> <br><br>`;
            rep_changes = '<b>' + lang('view_changelog') + '</b>:<br>' + result.data.changes;

            // Check if cdn_sql and cdn_file are empty
            let sqlFile = result.data.cdn_sql || result.data.sql;
            let fileFile = result.data.cdn_file || result.data.file;

            rep_btn = `<hr><a href="javascript:doUp('${fileFile}','${sqlFile}');" id="upbtn" class="btn btn-success btn-sm">` + lang('update_now') + '</a>';
        } else {
            rep_msg = lang('check_failed');
        }

        updateModalLoading.removeClass();
        updateModalMsg.html(rep_msg);
        updateModalChanges.html(rep_changes);
        updateModalBtn.html(rep_btn);
    });
}

function doUp(source, upSQL) {
    const updateModalLoading = $("#update-modal-loading");
    const updateModalMsg = $("#update-modal-msg");
    const updateModalChanges = $("#update-modal-changes");
    const upmsg = $("#upmsg");
    const upbtn = $("#upbtn");

    updateModalLoading.addClass("spinner-border text-primary");
    updateModalMsg.html(lang('updating_now'));
    updateModalChanges.html("");

    $.get(`./upgrade.php?action=update&source=${source}&upsql=${upSQL}`, function (data) {
        upmsg.removeClass();
        if (data.includes("succ")) {
            upbtn.text(lang('refresh_page'));
            upbtn.attr('href', './');
            updateModalMsg.html(lang('updated_ok') + ', <a href="./">' + lang('refresh_page') +'</a> ' + lang('to_use_new'));
        } else if (data.includes("error_down")) {
            updateModalMsg.html(lang('update_download_fail'));
        } else if (data.includes("error_zip")) {
            updateModalMsg.html(lang('unzip_fail'));
        } else if (data.includes("error_dir")) {
            updateModalMsg.html(lang('update_not_writable'));
        } else {
            updateModalMsg.html(lang('update_fail'));
        }

        updateModalLoading.removeClass();
    });
}

//------------------------------
// Return the language var value
function lang(key) {
    if (LNG[key]) {
        val = LNG[key];
    } else {
        val = '{' + key + '}';
    }
    return val;
}

/*vot*/    // Load Timepicker language
/*vot*/    $.getScript('../lang/' + em_lang + '/lang_timepicker.js');


$(function () {
    // Setting interface: Automatically detect site address. If "Automatically detect address" is set, set the input to read-only to indicate that the item is invalid.
    if ($("#detect_url").prop("checked")) {
        $("[name=blogurl]").attr("readonly", "readonly")
    }
    $("#detect_url").click(function () {
        if ($(this).prop("checked")) {
            $("[name=blogurl]").attr("readonly", "readonly")
        } else {
            $("[name=blogurl]").removeAttr("readonly")
        }
    })

    // Select all checkboxes
    $('#checkAllItem').click(function () {
        let cardCheckboxes = $('.checkboxContainer').find('input[type=checkbox]');
        cardCheckboxes.prop('checked', $(this).prop('checked'));
    });

    $('.checkboxContainer').find('input[type=checkbox]').click(function () {
        let allChecked = true;
        $('.checkboxContainer').find('input[type=checkbox]').each(function () {
            if (!$(this).prop('checked')) {
                allChecked = false;
                return false;
            }
        });
        $('#checkAllItem').prop('checked', allChecked);
    });

    // store app install
    $('.installBtn').click(function (e) {
        e.preventDefault();
        let link = $(this);
        let down_url = link.data('url');
        let cdn_down_url = link.data('cdn-url');
        let type = link.data('type');
/*vot*/        link.text(lang('installing'));
        link.parent().prev(".installMsg").html("").addClass("spinner-border text-primary");

        let url = './store.php?action=install&type=' + type + '&source=' + down_url + '&cdn_source=' + cdn_down_url;
        $.get(url, function (data) {
/*vot*/            link.text(lang('install_free'));
            link.parent().prev(".installMsg").html('<span class="text-danger">' + data + '</span>').removeClass("spinner-border text-primary");
        });
    });

    // App Store: View app information
    $('#appModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var name = button.data('name');
        var url = button.data('url');
        var buy_url = button.data('buy-url');
        var modal = $(this);

        modal.find('.modal-body').empty();
        modal.find('.modal-title').html(name);
        modal.find('.modal-buy-url').attr('href', buy_url);

        var loadingSpinner = '<div class="spinner-border text-primary ml-3"><span class="sr-only">Loading...</span></div>';
        modal.find('.modal-title').append(loadingSpinner);

        var iframe = $('<iframe>', {
            'class': 'iframe-content',
            'src': url,
            'frameborder': 0
        });

        iframe.on('load', function () {
            $('.spinner-border').remove();
        });

        modal.find('.modal-body').append(iframe);
    });
})