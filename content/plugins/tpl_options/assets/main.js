$(function () {
    //初始化变量
    var tplOptions = window.tplOptions;
    var body = $('body');
    var iframe = $('<iframe name="upload-image" src="about:blank" style="display:none"/>').appendTo(body);
    var optionArea = $('<div/>').insertAfter($('#content').find('.container-fluid .row')).addClass(attr('area')).slideUp();
    var loadingDom = $('<div />').appendTo(body);
    var message = $('<span />').appendTo($('#wrapper'));
    var tplBox = $('.tpl');
    var timer, input, targetInput, target, templateInput, template;
    var trueInput = $('<input type="file" name="image">').css({
        position: 'absolute', margin: 0, visibility: 'hidden'
    }).on('change', function () {
        loading();
        target = input.data('target');
        targetInput.val(target);
        templateInput.val(template);
        form.submit();
    }).on('mouseleave', function () {
        trueInput.css('visibility', 'hidden');
        input.css('visibility', 'visible');
    });
    var form = $('<form id="upload-form" target="upload-image" />').append(trueInput, targetInput = $('<input type="hidden" name="target">'), templateInput = $('<input type="hidden" name="template">')).prependTo(body).attr({
        action: tplOptions.uploadUrl, target: 'upload-image', enctype: 'multipart/form-data', method: 'post'
    });
    //插入设置按钮
    for (var tpl of Object.keys(tplOptions.templates)) {
        var now = document.querySelector('a[href*="em_confirm(\'' + tpl + '\',"]');
        var xps = document.createElement('a');
        xps.style.fontSize = '12px';
        xps.style.marginLeft = '4px';
        now.parentNode.appendChild(xps);
        $('<a class="btn btn-primary btn-sm">设置</span>').insertBefore(xps).addClass(attr('setting')).data('template', tpl);
    }
    //绑定事件
    body.on('click', '.' + attr('setting'), function () {
        document.getElementsByClassName("container-fluid")[0].children[0].style.cssText = 'display:none !important';
        $('.container-fluid .row').fadeToggle();
        $.ajax({
            url: tplOptions.baseUrl, data: {
                template: $(this).data('template')
            }, cache: false, beforeSend: function () {
                loading();
                editorMap = {};
            }, success: function (data) {
                optionArea.html(data).show(), tplBox.hide();
                window.setTimeout(function () {
                    initOptionSort();
                    initRichText();
                    setTimeout(function () {
                        loading(false);
                    }, 0);
                }, 1000);
            }
        });
    }).on('click', '.tpl-options-menu ul li,.tpl-nav-options ul li', function () {
        $('.tpl-options-menu ul li').removeClass('active');
        $('.tpl-nav-options ul li').removeClass('active');
        $(this).addClass('active');
    }).on('click', '.tpl-options-close', function () {
        document.getElementsByClassName("container-fluid")[0].children[0].style.cssText = 'display:flex !important';
        $('.container-fluid .row').fadeToggle();
        optionArea.slideUp(500), tplBox.show();
    }).on('click', '.option-name', function () {
        $(this).find('.option-description').fadeToggle();
        $(this).parent().find('.option-body').fadeToggle();
        if ($(this).parent().find('.option-ico').hasClass('upico')) {
            $(this).parent().find('.option-ico').removeClass('upico').addClass('downico');
        } else {
            $(this).parent().find('.option-ico').removeClass('downico').addClass('upico');
        }

    }).on('click', '.tpl-options-menu li', function () {
        //$('html,body').animate({scrollTop:$('#'+$(this).attr('data-id')).offset().top-80}, 500);
    }).on('click', '.vtpl-menu,.vtpl-nav.show ul li,.fixed-body', function () {
        $('.vtpl-nav').toggleClass('show')
    }).on('click', '.tpl-options-menubtn', function () {
        $('.tpl-options-menu').fadeToggle();
    }).on('click', '.tpl-options-btns', function () {
        if ($(this).attr('data-type') == 1) {
            $(this).text('全部展开').attr('data-type', 0);
            $('.option-body').fadeOut();
            $('.option-description').fadeOut();
            $('.option-ico').removeClass('upico').addClass('downico');
        } else {
            $(this).text('全部收缩').attr('data-type', 1);
            $('.option-body').fadeIn();
            $('.option-description').fadeIn();
            $('.option-ico').removeClass('downico').addClass('upico');
        }
    }).on('click', '.option-sort-tag-name', function () {
        var that = $(this);
        if (that.is('.selected')) {
            return;
        }
        var left = that.parent(), right = left.siblings('.option-sort-tag-right');
        left.find('.selected').removeClass('selected');
        that.addClass('selected');
        right.find('.option-sort-tag-option').removeClass('selected').eq(that.index()).addClass('selected');
    }).on('change', '.option-sort-tag-select', function () {
        var that = $(this);
        var right = that.parent().siblings('.option-sort-tag-right');
        right.find('.option-sort-tag-option').removeClass('selected').eq(that.find('option:selected').index()).addClass('selected');
    }).on('input propertychange paste change focus', '.chosen-search-input', function () {
        _this_val = $(this).val().replace(/(^\s*)|(\s*$)/g, "");
        let _this_data_opt = $(this).attr('data-opt')
        let _drop_item = $(this).parent().parent().next()
        let _drop_item_child = $(this).parent().parent().next().find('.chosen-results')
        if (_this_val === '') {
            _drop_item.css('clip', 'rect(0, 0, 0, 0)')
            _drop_item.css('clip-path', 'inset(100% 100%)')
            _drop_item.css('position', 'absolute')
            return
        }
        _drop_item.css('clip', 'auto')
        _drop_item.css('clip-path', 'none')
        _drop_item.css('position', 'relative')
        var formData = new FormData()
        formData.append("action", 'tpl_select_search')
        formData.append("kywd", $(this).val())
        formData.append("name", $(this).attr('data-s-name'))
        formData.append("type", _this_data_opt)
        $.ajax({
            url: $(this).attr('data-url') + 'content/plugins/tpl_options/actions/search.php',
            type: 'post',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (data) {
                _drop_item_child.html(data)
            },
            error: function (data) {
                _drop_item_child.html(data)
            }
        });
    }).on('click', '.chosen-results .active-result', function () {
        let title = $(this).html()
        let name = $(this).attr('data-s-name')
        let gid = $(this).attr('data-id')
        let _search_filed = $(this).parent().parent().prev().find('.search-field')
        let _input_item = $(this).parent().parent().prev().find('.search-field').find('.chosen-search-input')
        let _drop_item = $(this).parent().parent()
        _search_filed.before('<li class="search-choice"><span>' + title + '</span><a class="search-choice-close"><i class="icofont-close"></i></a><input class="d-none" name="' + name + '[]" type="text" value="' + gid + '"></li>');
        _drop_item.css('clip', '')
        _drop_item.css('clip-path', '')
        _input_item.val('')
        _input_item.focus()
        $('form.tpl-options-form').trigger('submit');
    }).on('click', '.search-choice-close i', function () {
        $(this).parent().parent().remove()
        $('form.tpl-options-form').trigger('submit');
    }).on('click', '.tpl-block-title', function () {
        $(this).next().toggleClass('d-none')
        $(this).find('span').toggleClass('icofont-rounded-right')
        $(this).find('span').toggleClass('icofont-rounded-down')
    }).on('click', '.tpl-add-block', function () {
        let _name = $(this).attr('data-b-name')
        let _type = $(this).attr('data-type')
        let _url = $(this).attr('data-url')
        let type_html = ''
        if (_type === 'image') {
            type_html = '<div class="tpl-block-upload"><span>填写块标题：</span>' +
                '<input class="block-title-input" type="text" name="' + _name + '[title][]" value="">' +
                '<div class="tpl-image-preview"><img src=""></div><div class="tpl-block-upload-input">' +
                '<input type="text" name="' + _name + '[content][]" value=""><label>\n' +
                '<a class="btn btn-primary"><i class="icofont-plus"></i>上传</a>\n' +
                '<input class="d-none tpl-image" type="file" name="image" data-url="' + _url + '" accept="image/svg+xml,image/webp,image/avif,image/jpeg,image/jpg,image/png,image/gif">\n' +
                '</label>'
            type_html += '</div></div>';
        } else {
            type_html += '<div>填写块标题：</div>'
            type_html += '<input class="block-title-input" type="text" name="' + _name + '[title][]" value="">'
            type_html += '<div>填写块内容：</div>'
            if ($(this).parent().parent().hasClass('is-multi')) {
                type_html += '<textarea rows="5" name="' + _name + '[content][]"></textarea>'
            } else {
                type_html += '<input type="text" name="' + _name + '[content][]" value="">'
            }
        }
        $(this).before('<div class="tpl-block-item">\n' +
            '    <div class="tpl-block-head">\n' +
            '    <i class="tpl-block-clone icofont-ui-copy"></i>\n' +
            '    <i class="tpl-block-remove icofont-close icofont-md"></i>\n' +
            '    </div>\n' +
            '    <h4 class="tpl-block-title">\n' +
            '    <span class="tpl-block-title-icon icofont-rounded-right"></span>\n' +
            '    <item class="block-title-text"></item>' +
            '    </h4>\n' +
            '    <div class="tpl-block-content d-none">\n' +
            type_html +
            '    </div>\n' +
            '</div>')
        $('form.tpl-options-form').trigger('submit');
    }).on('change', '.tpl-image', function () {
        let obj = this;
        let file = $(this).prop('files')[0];
        let _url = $(this).attr('data-url')
        let _target_input = $(this).parent().parent().find('input[type="text"]')
        let _target_img = $(this).parent().parent().prev().find('img')
        let formData = new FormData();
        if (file === undefined || file === null) return
        formData.append("action", 'tpl_upload')
        formData.append("image", file)
        formData.append("origin_image", _target_input.val())
        $.ajax({
            url: _url + 'content/plugins/tpl_options/actions/tpl.php',
            type: 'post',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (data) {
                let j_data = JSON.parse(data)
                if (j_data.code === 'success') {
                    _target_input.val(j_data.data)
                    _target_img.attr('src', j_data.data + '?' + new Date().getTime())
                    obj.value = ''
                    $('form.tpl-options-form').trigger('submit');
                } else {
                    cocoMessage.error(j_data.data, 2500);
                }
            },
            error: function (data) {
                cocoMessage.error('网络异常', 2500);
            }

        });

    }).on('click', '.tpl-block-remove', function () {
        if (confirm('真的要删除吗？')) {
            $(this).parent().parent().remove()
            $('form.tpl-options-form').trigger('submit');
        }
    }).on('click', '.tpl-block-clone', function () {
        let _this_clone = $(this).parent().parent().clone()
        $(this).parent().parent().after(_this_clone)
        $('form.tpl-options-form').trigger('submit');
    }).on('input change focus', '.block-title-input', function () {
        let _tar = $(this).parent().prev().find('item')
        if ($(this).parent().hasClass('tpl-block-upload')) {
            _tar = $(this).parent().parent().prev().find('item')
        }
        _tar.html($(this).val())
    }).on('click', '.vtpl-switch-item input[type="checkbox"]', function () {
        if ($(this).is(":checked")) {
            $(this).parent().parent().addClass('vtpl-checked')
        } else {
            $(this).parent().parent().removeClass('vtpl-checked')
        }
    }).on('mouseenter', '.tpl-options-form input[type="file"]', function () {
        input = $(this);
        trueInput.css(input.offset());
        input.css('visibility', 'hidden');
        trueInput.css('visibility', 'visible');
    }).on('submit', 'form.tpl-options-form', function () {
        var that = $(this);
        $.ajax({
            url: that.attr('action'), type: 'post', data: that.serialize(), cache: false, dataType: 'json', // beforeSend: loading,
            success: function (data) {
                if (data.code === 1) {
                    cocoMessage.error(data.msg, 2500);
                    return false;
                }
                cocoMessage.success(data.msg, 2500);
            }, error: function () {
                cocoMessage.error('网络异常', 2500);
            }, complete: function () {
                // loading(false);
            }
        });
        return false;
    }).on('change', '.tpl-options-form input:not(.chosen-search-input,.tpl-image), .tpl-options-form textarea', function () {
        $('form.tpl-options-form').trigger('submit');
    });
    //定义方法
    var initRichText = (function () {
        var num = 0;
        return function () {
            $('.option-rich-text').each(function () {
                var that = $(this);
                if (that.attr('id') === undefined) {
                    that.attr('id', 'option-rich-text-' + (num++));
                }
                //loadEditor(that.attr('id'));
            });
            window.setTimeout(function () {
                for (var id in editorMap) {
                    editorMap[id].container[0].style.width = '';
                }
            }, 100);
        }
    })();
    window.setImage = function (src, path, code, msg) {
        if (code == 0) {
            $('[name="' + target + '"]').val(path).trigger('change');
            $('[data-name="' + target + '"]').attr('href', src).find('img').attr('src', src);
        } else {
            alert('上传失败：' + msg)
        }
        trueInput.val('');
        target = '';
        loading(false);
    };

    function initOptionSort() {
        $('.option-sort-tag-left').each(function () {
            $(this).find('.option-sort-tag-name:first').addClass('selected');
        });
        $('.option-sort-tag-right').each(function () {
            $(this).find('.option-sort-tag-option:first').addClass('selected');
        });
    }

    function loading(enable) {
        if (enable === undefined) {
            enable = true;
        }
        if (enable) {
            loadingDom.addClass('loading');
        } else {
            loadingDom.removeClass('loading');
        }
    }

    function showMsg(code, msg) {
        message.text(msg).show();
        if (code == 0) {
            message.attr('class', 'tpl-activebox');
            if (timer) {
                window.clearTimeout(timer);
            }
            timer = window.setTimeout(function () {
                message.hide();
            }, 2600);
        } else {
            message.attr('class', 'tpl-errorbox');
        }
    }

    function attr(name) {
        return tplOptions.prefix + name;
    }

    function loadEditor(id) {
        editorMap[id] = editorMap[id] || KindEditor.create('#' + id, {
            resizeMode: 1,
            allowUpload: false,
            allowImageUpload: false,
            allowFlashUpload: false,
            allowPreviewEmoticons: false,
            filterMode: false,
            afterChange: (function () {
                var t, i = 0;
                return function () {
                    var that = this;
                    if (t) {
                        window.clearTimeout(t);
                    }
                    if (i++ > 0) {
                        t = window.setTimeout(function () {
                            that.sync();
                            $(that.srcElement[0]).trigger('change');
                        }, 2000);
                    }
                }
            })(),
            urlType: 'domain',
            items: ['bold', 'italic', 'underline', 'strikethrough', 'forecolor', 'hilitecolor', 'fontname', 'fontsize', 'lineheight', 'removeformat', 'plainpaste', 'quickformat', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'justifyleft', 'justifycenter', 'justifyright', 'link', 'unlink', 'image', 'flash', 'table', 'emoticons', 'code', 'fullscreen', 'source']
        });
    }
});

function TplShow(a) {
    $('.option').hide();
    $('.' + a).fadeIn();
}

function block_drag_end() {
    $('form.tpl-options-form').trigger('submit');
}
