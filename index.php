<?php
include_once 'presentation.class.php';
View::start('GCShop');
echo "<img src='logo.jpg'>";
$db = new PDO("sqlite:./datos.db");
$db->exec('PRAGMA foreign_keys = ON;'); // Activa la integridad referencial para esta conexión
$res=$db->prepare('SELECT * FROM productos;');
$res->execute();
$res->setFetchMode(PDO::FETCH_NAMED); // Establecemos que queremos cada fila como array asociativo

$datos = $res->fetchAll(); // Leo todos los datos de una vez

echo '<h2>Ejemplo acceso a tabla</h2>';
// Ejemplo de mostrado de datos en forma de tabla HTML
echo "<table>";
echo "<tr>";
echo "<th>Nombre</th>";
echo "<th>Precio</th>";
echo "<th>Imagen</th>";
echo "</tr>";

foreach($datos as $registro){
    echo "<tr>";
    echo "<td>{$registro['nombre']}</td>";
    echo "<td>{$registro['precio']}</td>";
    $imgb64 = base64_encode($registro['imagen']);
    echo "<td><img src='data:image/jpeg;base64,$imgb64'></td>";
    echo "</tr>";
}
echo '</table>';

View::end();
