function resetCheckbox(resetButton) {
    let formElements = resetButton.parentElement.elements;
    for (let element of formElements) {
        element.removeAttribute('checked');
    }
}