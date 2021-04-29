// Gives the document a title
function giveTitle(name) {
    document.getElementsByTagName("title")[0].innerHTML = name;
}

// +/-
function incrementValue(e) {
    e.preventDefault();
    let fieldName = $(e.target).data('field');
    let parent = $(e.target).closest('div');
    let currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

    if (!isNaN(currentVal)) {
        parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
    } else {
        parent.find('input[name=' + fieldName + ']').val(0);
    }
}

function decrementValue(e) {
    e.preventDefault();
    let fieldName = $(e.target).data('field');
    let parent = $(e.target).closest('div');
    let currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

    if (!isNaN(currentVal) && currentVal > 0) {
        parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
    } else {
        parent.find('input[name=' + fieldName + ']').val(0);
    }
}

$(document).ready(function () {
    $('.button-plus').click(function(e) {
        incrementValue(e);
    });
    $('.button-minus').click(function(e) {
        decrementValue(e);
    });
})