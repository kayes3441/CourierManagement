"use strict";
document.addEventListener('DOMContentLoaded', () => {
    const checkboxes = document.querySelectorAll('.user-type-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            checkboxes.forEach(otherCheckbox => {
                if (otherCheckbox !== checkbox) {
                    otherCheckbox.checked = false;
                }
            });
            if (checkbox.value === 'admin') {
                $('.role-name').removeClass('d-none');
                $('.role-permission').removeClass('d-none')
                $('.courier-as-courier').addClass('d-none')
            } else {
                $('.role-name').addClass('d-none');
                $('.role-permission').addClass('d-none')
                $('.courier-as-courier').removeClass('d-none')
            }
        });
    });
});
