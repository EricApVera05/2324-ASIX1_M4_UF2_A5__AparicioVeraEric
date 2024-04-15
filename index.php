<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciudad Condal</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="shortcut icon" href="./img/ciudadcondallogo.jpg" type="image/png">
    <script src="https://kit.fontawesome.com/05bd12561e.js" crossorigin="anonymous"></script>
</head>
<body>
  <header>
      <div class="header-container">
          <img src="./img/ciudadcondallogo.jpg" alt="Logo de Ciudad Condal" class="logo">
      </div>
  </header>

    <main>
        <div class="menu-container">
            <div class="select-container">
                <label for="menu-select">Seleccione una categoría:</label>
                <select id="menu-select">
                    <option value="todos">Todos</option>
                    <option value="primeros">Primeros Platos</option>
                    <option value="segundos">Segundos Platos</option>
                    <option value="postres">Postres</option>
                </select>
            </div>
            <div class="table-responsive">
                <table id="menu-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Calorías</th>
                            <th>Características</th>
                            <th>Categoría</th>
                        </tr>
                    </thead>
                    <tbody id="menu-table-body">
                        <?php
                        // Cargar el archivo XML
                        $xml = simplexml_load_file("./menu.xml");

                        // Verificar si el archivo se cargó correctamente
                        if ($xml === false) {
                            echo "Error cargando el archivo XML";
                            exit;
                        }

                        // Utilizar la variable $xml para acceder a los datos del menú
                        if (isset($_GET['plato'])) {
                            foreach($xml->dish as $plato){
                                if ($_GET['plato'] == $plato['comida']) {
                                    echo '<tr>';
                                    echo '<td>'.$plato->name.'</td>';
                                    echo '<td>'.$plato->description.'</td>';
                                    echo '<td>';
                                    foreach($plato->ingredientes->caracteristicas as $ign) {
                                        if ($ign == 'Carne') {
                                            echo '<i class="fas fa-bacon" style="color: #e73636;"></i>  ';
                                        } elseif ($ign == 'Lacteo') {
                                            echo '<i class="fas fa-cheese" style="color: #ece636;"></i>  ';
                                        } elseif ($ign == 'vegetariano') {
                                            echo '<i class="fas fa-leaf" style="color: #4fe360;"></i>  ';
                                        } elseif ($ign == 'Pescado') {
                                            echo '<i class="fas fa-fish" style="color: #5d8fe5;"></i>  ';
                                        }elseif ($ign == 'destacado') {
                                            echo '<i class="fas fa-star" style="color: #FFD43B;"></i>  ';
                                        }elseif ($ign == 'arroz') {
                                            echo '<i class="fad fa-bowl-rice"></i>  ';
                                        }elseif ($ign == 'sin gluten') {
                                            echo '<i class="fas fa-wheat-slash" style="color: #bcaa6c;"></i>  ';
                                        }elseif ($ign == 'pollo') {
                                            echo '<i class="fas fa-drumstick-bite" style="color: #886606;"></i>';
                                        }elseif ($ign == 'frutas') {
                                            echo '<i class="fas fa-apple-whole" style="color: #d23232;"></i> ';
                                        }
                                    }
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            }
                        } else {
                            foreach($xml->dish as $plato){
                                echo '<tr>';
                                echo '<td>'.$plato->name.'</td>';
                                echo '<td>'.$plato->description.'</td>';
                                echo '<td>';
                                foreach($plato->ingredientes->caracteristicas as $ign) {
                                    if ($ign == 'Carne') {
                                        echo '<i class="fas fa-bacon" style="color: #e73636;"></i>  ';
                                    } elseif ($ign == 'Lacteo') {
                                        echo '<i class="fas fa-cheese" style="color: #ece636;"></i>  ';
                                    } elseif ($ign == 'vegetariano') {
                                        echo '<i class="fas fa-leaf" style="color: #4fe360;"></i>  ';
                                    } elseif ($ign == 'Pescado') {
                                        echo '<i class="fas fa-fish" style="color: #5d8fe5;"></i>  ';
                                    }elseif ($ign == 'destacado') {
                                        echo '<i class="fas fa-star" style="color: #FFD43B;"></i>  ';
                                    }elseif ($ign == 'arroz') {
                                        echo '<i class="fad fa-bowl-rice"></i>  ';
                                    }elseif ($ign == 'sin gluten') {
                                        echo '<i class="fas fa-wheat-slash" style="color: #bcaa6c;"></i>  ';
                                    }elseif ($ign == 'pollo') {
                                        echo '<i class="fas fa-drumstick-bite" style="color: #886606;"></i>';
                                    }elseif ($ign == 'frutas') {
                                        echo '<i class="fas fa-apple-whole" style="color: #d23232;"></i> ';
                                    }
                                }
                                echo '</td>';
                                echo '</tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="footer-placeholder"></div>
    </main>
    <footer>
        <p>&copy; 2024 Ciudad Condal Todos los derechos reservados.</p>
    </footer>
    <script src="menu.js"></script>
</body>
</html>
