/* --------------------------- */
/* CKEditor */
/* --------------------------- */
    
/* --------------------------- */
/* CHECK ALL CHECKBOX */
/* --------------------------- */
document.querySelector('.checkAll').onclick = function() {
    var checkboxes = document.querySelectorAll('.checkbox');
    if (this.checked) {
        checkboxes.forEach((el) => {
            el.checked = true;
        })
    } else {
        checkboxes.forEach((el) => {
            el.checked = false;
        })
    }
};
//document.querySelector('#checkAll').checked = true;


