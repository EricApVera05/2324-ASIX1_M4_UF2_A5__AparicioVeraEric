// Declaración de variables
let selectedCategory = 'todos';

// Función para cargar el menú
function loadMenu() {
  let xhttp = new XMLHttpRequest();
  
  // Manejador de evento para cuando la solicitud cambia de estado
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // Procesamiento del archivo XML y creación de filas de la tabla
      let xmlDoc = this.responseXML;
      let platos = xmlDoc.getElementsByTagName("dish");
      let tableBody = document.getElementById("menu-table-body");
      tableBody.innerHTML = '';

      // Recorriendo cada plato en el XML
      for (let i = 0; i < platos.length; i++) {
        let plato = platos[i];
        let nombre = plato.getElementsByTagName("name")[0].textContent;
        let descripcion = plato.getElementsByTagName("description")[0].textContent;
        let precio = plato.getElementsByTagName("price")[0].textContent;
        let calorias = plato.getElementsByTagName("calorias")[0].textContent;
        let caracteristicas = plato.getElementsByTagName("caracteristicas")[0].textContent;
        let categoria = plato.getAttribute("comida");
        
        // Verificar si el plato pertenece a la categoría seleccionada o si se seleccionó "todos"
        if (categoria === selectedCategory || selectedCategory === 'todos') {
          let row = `<tr><td>${nombre}</td><td>${descripcion}</td><td>${precio}</td><td>${calorias}</td><td>${caracteristicas}</td><td>${categoria}</td></tr>`;
          tableBody.innerHTML += row;
        }
      }
    }
  };
  
  // Iniciando la solicitud HTTP
  xhttp.open("GET", "menu.xml", true);
  xhttp.send();
}

// Función que se ejecuta cuando la ventana se carga completamente
window.onload = function() {
  loadMenu();
};

// Evento que se activa cuando se cambia la opción del menú select
let menuSelect = document.getElementById("menu-select");
menuSelect.addEventListener("change", function() {
  selectedCategory = this.value;
  loadMenu();
});
