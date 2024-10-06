// Datepicker + Timepicker Language
$.datepicker.regional['zh-CN'] = {
    closeText: 'Done',
    prevText: '上个月',
    nextText: '下个月',
    currentText: 'Today',
    monthNames: ['January','February','March','April','May','June','July','August','September','October','November','December'],
    monthNamesShort: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
    dayNames: ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
    dayNamesShort: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
    dayNamesMin: ['日', '一', '二', '三', '四', '五', '六'],
    weekHeader: '周',
    dateFormat: 'yy-mm-dd',
    firstDay: 0,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: '年'
};
$.datepicker.setDefaults($.datepicker.regional['zh-CN']);


$.timepicker.regional['zh-CN'] = {
    currentText: '现在时间',
    closeText: '关闭',
    amNames: ['AM', 'A'],
    pmNames: ['PM', 'P'],
    timeFormat: 'HH:mm:ss',
    timeSuffix: '',
    timeOnlyTitle: '选择时间',
    timeText: '时间',
    hourText: '时',
    minuteText: '分',
    secondText: '秒',
    millisecText: '毫秒',
    microsecText: '微秒',
    timezoneText: '时区',
    isRTL: false
};
$.timepicker.setDefaults($.timepicker.regional['zh-CN']);
