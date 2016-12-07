$.fn.numpad.defaults.gridTpl = '<table class="table modal-content"></table>';
$.fn.numpad.defaults.backgroundTpl = '<div class="modal-backdrop in"></div>';
$.fn.numpad.defaults.displayTpl = '<input type="text" class="form-control" />';
$.fn.numpad.defaults.buttonNumberTpl = '<button type="button" class="btn btn-default"></button>';
$.fn.numpad.defaults.buttonFunctionTpl = '<button type="button" class="btn" style="width: 100%;"></button>';
$.fn.numpad.defaults.onKeypadCreate = function () {
    $(this).find('.done').addClass('btn-primary');
};


function setPhoneNumKeys(inputFiledId) {
    jQuery('.numkey').click(function (event) {
        var numBox = document.getElementById(inputFiledId);
        if (this.innerHTML == '0') {
            if (numBox.value.length > 0)
                numBox.value = numBox.value + this.innerHTML;
        } else
            numBox.value = numBox.value + this.innerHTML;
        event.stopPropagation();
    });
    $('.btnPin').click(function (event) {
        if (this.innerHTML == 'DEL') {
            var numBox = document.getElementById(inputFiledId);
            if (numBox.value.length > 0) {
                numBox.value = numBox.value.substring(0, numBox.value.length - 1);
            }
        } else {
            document.getElementById(inputFiledId).value = '';
        }
        event.stopPropagation();
    });
}

function setnumkeys(inputFiledId) {
    jQuery('.numkey').click(function (event) {
        var numBox = document.getElementById(inputFiledId);
        if (this.innerHTML == '0') {
            if (numBox.value.length > 0)
                numBox.value = numBox.value + this.innerHTML;
        } else
            numBox.value = numBox.value + this.innerHTML;
        event.stopPropagation();
    });
    $('.btnPin').click(function (event) {
        if (this.innerHTML == 'DEL') {
            var numBox = document.getElementById(inputFiledId);
            if (numBox.value.length > 0) {
                numBox.value = numBox.value.substring(0, numBox.value.length - 1);
            }
        } else {
            document.getElementById(inputFiledId).value = '';
        }
        event.stopPropagation();
    });
}


function set_feedback(text, classname, keep_displayed)
{
    if (text)
    {
        $('#feedback_bar').removeClass().addClass(classname).html(text).css('opacity', '1');

        if (!keep_displayed)
        {
            $('#feedback_bar').fadeTo(5000, 1).fadeTo("fast", 0);
        }
    } else
    {
        $('#feedback_bar').css('opacity', '0');
    }
}
function checkBlock(checkId, blockId) {
    if ($("#" + checkId).is(":checked")) {
        $("#" + blockId).show(500);
    } else {
        $("#" + blockId).hide(500);
    }
    $("#" + checkId).click(function () {
        if ($(this).is(":checked")) {
            $("#" + blockId).show(500);
        } else {
            $("#" + blockId).hide(500);
        }
    });
}
function toggleContent(contentBlock) {
    $('#' + contentBlock).slideToggle(function () {
        $(".menu-info a").find('span').toggleClass('glyphicon-minus glyphicon-plus');
    });
}
function myJqueryKeyboard(keyboard) {
    $('#' + keyboard).keyboard();
}
function goBack() {
    window.history.back();
}
function manageWindowHeight() {
    var staticHeight = $(window).height();
    var staticCalHeight = staticHeight - 100;
    $(".bodyitem").css({"min-height": staticCalHeight + "px"});
    $(".left-item").css({"min-height": staticCalHeight + "px"});
    $(".right-item").css({"min-height": staticCalHeight + "px"});
    $(window).bind('resize', function () {
        var width = $(window).width();
        var MaxResizeHeight = $(window).height();
        var CalculatedResizeHeight = MaxResizeHeight - 100;
        $(".bodyitem").css({"min-height": CalculatedResizeHeight + "px"});
        $(".left-item").css({"min-height": CalculatedResizeHeight + "px"});
        $(".right-item").css({"min-height": CalculatedResizeHeight + "px"});
        if ($('.menuselection').length > 0) {
            $('.menuselection .left-top, .menuselection .middle-top,.menuselection .right-top').css({"height": CalculatedResizeHeight - (CalculatedResizeHeight * 0.11) + "px"});
            $('.menuselection .order-menu-list').css({"height": CalculatedResizeHeight - (CalculatedResizeHeight * 0.36) + "px", "overflow-y": "auto", "overflow-x": "hidden"});
            $('.menuselection .left-bottom,.menuselection .middle-bottom,.menuselection .right-bottom').css({"height": CalculatedResizeHeight - (CalculatedResizeHeight * 0.89) + "px"});
        }
        if ($('#menuManagerBody').length > 0) {
            $('#menuManagerBody').css({"height": CalculatedResizeHeight + "px", "overflow-y": "auto", "overflow-x": "hidden"});
        }
        if ($('#accordion').length > 0) {
            $('#accordion').css({"height": CalculatedResizeHeight - 70 + "px", "overflow-y": "auto", "overflow-x": "hidden"});
        }
        $('.sidebar-heading,.liveclock').css('font-size', ($(window).width * 0.2) + 'px');
        $('h1').css('font-size', width * 0.03 + 'px');
        $('h2').css('font-size', width * 0.02 + 'px');
        $('h3').css('font-size', width * 0.01 + 'px');
    });
}

