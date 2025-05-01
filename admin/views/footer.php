<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
</div>
</div>
<?php if (AI::model()): ?>
    <a class="ai-chat-button" href="#" data-toggle="modal" data-target="#aiChatModal">
        <span>&#10024;</span>
    </a>
<?php endif; ?>
<a class="scroll-to-top" href="#page-top">
    <i class="icofont-rounded-up"></i>
</a>
<footer class="sticky-footer bg-white">
    <div class="text-right my-auto mr-4">
        <small><a href="https://www.emlog.net" target="_blank">EMLOG</a> - <?= ucfirst(Option::EMLOG_VERSION) ?></small>
    </div>
</footer>
<!-- AI Chat Modal -->
<div class="modal fade" id="aiChatModal" tabindex="-1" role="dialog" aria-labelledby="aiChatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="aiChatModalLabel"><?= lang('ai_chat') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="chat-box" style="height: 500px; overflow-y: scroll; border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; border-radius: 8px;">
                    <!-- Chat messages will appear here -->
                </div>
                <form id="chat-form">
                    <div class="input-group">
                        <textarea class="form-control" id="chat-input" placeholder="<?= lang('input_msg') ?>" rows="1" style="resize: none; overflow: hidden;"></textarea>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="send-btn"><?= lang('send') ?></button>
                        </div>
                    </div>
                    <div class="text-muted text-xs mt-2">Model: <?= AI::model() ? AI::model() : lang('model_not_configured') ?>, <?= lang('shift_enter') ?></div>
                </form>
                <script>
                    $(document).ready(function() {
                        $('#chat-input').on('input', function() {
                            this.style.height = 'auto';
                            this.style.height = (this.scrollHeight) + 'px';
                            $('#send-btn').css('height', this.style.height);
                        });

                        $('#chat-input').on('keydown', function(event) {
                            if (event.key === 'Enter' && !event.shiftKey) {
                                event.preventDefault();
                                $('#send-btn').click();
                            }
                        });

                        $('#chat-form').submit(function() {
                            $('#chat-input').css('height', 'auto');
                            $('#send-btn').css('height', 'auto');
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php doAction('adm_footer') ?>
<script src="./views/js/sb-admin-2.min.js?t=<?= Option::EMLOG_VERSION_TIMESTAMP ?>"></script>
<script>
    $(function() {
        // Scroll to top button appear
        $(document).on('scroll', function() {
            var scrollDistance = $(this).scrollTop();
            if (scrollDistance > 100) {
                $('.scroll-to-top').fadeIn();
            } else {
                $('.scroll-to-top').fadeOut();
            }
        });
        // Smooth scrolling using jQuery easing
        $(document).on('click', 'a.scroll-to-top', function(e) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: ($($anchor.attr('href')).offset().top)
            }, 1000, 'easeInOutExpo');
            e.preventDefault();
        });

        //pjax
        $(document).pjax('a[data-pjax]', '#main-container', {
            fragment: '#main-container',
            timeout: 5000
        });
        $(document).on('pjax:success', function() {
            initPageScripts();
        });
        $(document).on('pjax:beforeSend', function() {
            closePageScripts();
        });

/* vot: moved to common.js
        // Time selection control
        $.timepicker.regional['zh-CN'] = {
            timeOnlyTitle: '选择时间', // Do NOT translate
            timeText: '时间',        // Do NOT translate
            hourText: '时',         // Do NOT translate
            minuteText: '分',       // Do NOT translate
            secondText: '秒',       // Do NOT translate
            millisecText: '毫秒',    // Do NOT translate
            microsecText: '微秒',    // Do NOT translate
            timezoneText: '时区',    // Do NOT translate
            currentText: '现在时间',   // Do NOT translate
            closeText: '关闭',       // Do NOT translate
            timeFormat: 'HH:mm',
            timeSuffix: '',
            amNames: ['AM', 'A'],
            pmNames: ['PM', 'P'],
            isRTL: false,
            prevText: '上个月',       // Do NOT translate
            nextText: '下个月',       // Do NOT translate
            showMonthAfterYear: true,
            weekHeader: '周',       // Do NOT translate
            yearSuffix: '年',       // Do NOT translate
        };
        $.timepicker.setDefaults($.timepicker.regional['zh-CN']);
        let dayNamesMin = ["日", "一", "二", "三", "四", "五", "六"]; // Do NOT translate
        let monthNamesShort = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"];
        const screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        let _left = screenWidth < 1200 ? 0 : 50;
        $(".datepicker").length && $(".datepicker").datetimepicker({
            controlType: "select",
            dayNamesMin: dayNamesMin,
            monthNamesShort: monthNamesShort,
            changeMonth: true,
            changeYear: true,
            yearRange: "c-30:c+10",
            showSecond: true,
            dateFormat: "yy-mm-dd",
            timeFormat: "HH:mm:ss",
            beforeShow: function(input, inst) {
                setTimeout(function() {
                    inst.dpDiv.css({
                        top: $(".datepicker.active").offset().top + 50,
                        left: $(".datepicker.active").offset().left - _left
                    });
                }, 0);
            },
            onClose: function(dateText, inst) {
                typeof onDatepickerClose === "function" && onDatepickerClose(dateText, inst);
            }
        });
*/
        $('body').on('focus', '.datepicker', function() {
            let _this = $(this)
            $('.datepicker').removeClass('active')
            _this.addClass('active')
        })

        // AI Chat
        $('#aiChatModal').on('shown.bs.modal', function() {
            $('#chat-input').focus();
        });

        $('#chat-form').submit(function(event) {
            event.preventDefault();
            var message = $('#chat-input').val().trim();
            if (message === '') return;

            // Display User Messages
            $('#chat-box').append('<div style="background-color:#69b4ff; color:#FFFFFF; border-radius: 10px; padding: 10px; margin: 5px 0;"><b>&#128516;:</b> ' + $('<div>').text(message).html() + '</div>');
            $('#chat-input').val('');
            $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);

            var $sendBtn = $('#send-btn');
            $sendBtn.prop('disabled', true).text('<?= lang('sending') ?>');

            // Initialize EventSource for streaming communication
            var eventSource = new EventSource('ai.php?action=chat_stream&message=' + encodeURIComponent(message));
            var $aiMessage = $('<div style="background-color: #f1f1f1; border-radius: 10px; padding: 10px; margin: 5px 0;"><b>&#129302;:</b> <span class="ai-typing"></span></div>');
            $('#chat-box').append($aiMessage);

            eventSource.onmessage = function(event) {
                if (event.data === '[DONE]') {
                    $sendBtn.prop('disabled', false).text('<?= lang('send') ?>');
                    eventSource.close();
                } else {
                    try {
                        var data = JSON.parse(event.data);
                        if (data.choices && data.choices[0].delta && (data.choices[0].delta.content || data.choices[0].delta.reasoning_content)) {
                            var chunk = data.choices[0].delta.content;
                            var rchunk = data.choices[0].delta.reasoning_content;
                            var $typing = $aiMessage.find('.ai-typing');
                            var currentContent = $typing.html();
                            if (chunk) {
                                $typing.html(currentContent + $('<div>').text(chunk).html().replace(/\n/g, '<br>'));
                            } else if (rchunk) {
                                $typing.html(currentContent + $('<div>').text(rchunk).html().replace(/\n/g, '<br>'));
                            }
                            $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
                        }
                    } catch (err) {
                        console.error('<?= lang('error_parsing') ?>:', err);
                    }
                }
            };

            eventSource.onerror = function() {
                var $typing = $aiMessage.find('.ai-typing');
                var currentContent = $typing.html();
                $typing.html(currentContent + " <?= lang('error_model_net') ?>");
                $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
                $sendBtn.prop('disabled', false).text('<?= lang('send') ?>');
                eventSource.close();
            };
        });
    });
</script>
</body>

</html>