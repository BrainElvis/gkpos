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
