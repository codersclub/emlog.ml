// Datepicker + Timepicker Language
$.datepicker.regional['en'] = {
    closeText: 'Done',
    prevText: 'Prev',
    nextText: 'Next',
    currentText: 'Today',
    monthNames: ['January','February','March','April','May','June','July','August','September','October','November','December'],
    monthNamesShort: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
    dayNames: ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
    dayNamesShort: ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'],
    dayNamesMin: ['Su','Mo','Tu','We','Th','Fr','Sa'],
    weekHeader: 'Wk',
    dateFormat: 'mm/dd/yy',
    firstDay: 0,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['en']);


$.timepicker.regional['en'] = {
    currentText: 'Now',
    closeText: 'Done',
    amNames: ['AM','A'],
    pmNames: ['PM','P'],
    timeFormat: 'HH:mm',
    timeSuffix: '',
    timeOnlyTitle: 'Choose Time',
    timeText: 'Time',
    hourText: 'Hour',
    minuteText: 'Minute',
    secondText: 'Second',
    millisecText: 'Millisecond',
    microsecText: 'Microsecond',
    timezoneText: 'Time Zone',
    isRTL: false
};
$.timepicker.setDefaults($.timepicker.regional['en']);
