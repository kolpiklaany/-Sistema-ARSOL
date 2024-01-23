document.getElementById('addRowLink').addEventListener('click', function(event) {
  event.preventDefault(); // Evita que el enlace recargue la página
  addRow();
});

function addRow() {
  var table = document.getElementById('actividadesTable').getElementsByTagName('tbody')[0];
  var newRow = table.insertRow(table.rows.length);

  // Número de la fila
  var cellNo = newRow.insertCell(0);
  cellNo.innerHTML = table.rows.length;

  // Otras celdas (puedes agregar más según sea necesario)
  for (var i = 1; i <= 6; i++) {
    var cell = newRow.insertCell(i);
    cell.innerHTML = '<input type="text" />';
  }
}





