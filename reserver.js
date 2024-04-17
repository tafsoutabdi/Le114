const radioAll = document.getElementById('all-tables');
const radioSpecify = document.getElementById('specify-tables');
const tableQuantity = document.getElementById('table-quantity');

radioSpecify.addEventListener('click', function () {
    tableQuantity.style.display = 'block';
});

radioAll.addEventListener('click', function () {
    tableQuantity.style.display = 'none';
});
