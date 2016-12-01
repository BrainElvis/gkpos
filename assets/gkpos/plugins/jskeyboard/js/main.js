
function keyboard(keyboardId) {
    jsKeyboard.init(keyboardId);
    var $firstInput = $(':input').first().focus();
    jsKeyboard.currentElement = $firstInput;
    jsKeyboard.currentElementCursorPosition = 0;
}
