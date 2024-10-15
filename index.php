<?php
require_once('./connection/BaseMySQL.php');
require_once('./model/Genre.php');
require_once('./model/Movie.php');
require_once('./database/MovieDB.php');

$database = BaseMySql::conexion();

$movieDB = new MovieDB();

if (isset($_POST['search'])) {
    $busqueda = $_POST['search'];
    $peliculas = $movieDB->buscar($database, trim($busqueda));
} else {
    $peliculas = $movieDB->listar($database);
}

BaseMySql::close($database);

require_once('./layout/header.php');
?>
<div class="fs-1 text-center">Películas</div>
<div class="d-flex justify-content-end">
    <a href="movie_new.php" class="btn btn-outline-primary">Agregar</a>
</div>
<table class="table mt-3 mb-5">
    <thead>
        <tr>
            <td>Titulo</td>
            <td>Género</td>
            <td>Año de Estreno</td>
            <td>&nbsp;</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($peliculas as $objeto) {
            echo '<tr>';
            echo '<td class="col-5">' . $objeto->getTitle() . '</td>';
            //echo '<td class="col-4">' . $objeto->getGenre()->getName() . '</td>';
            $objeto_genero = $objeto->getGenre();
            echo '<td class="col-2">' . $objeto_genero->getName() . '</td>';
            echo '<td class="col-2">' . $objeto->getReleaseYear() . '</td>';
            echo '<td class="col-3">';
            echo '<a href="movie_detail.php?id=' . $objeto->getId() . '" class="btn btn-outline-info">Ver Detalle</a>&nbsp;';
            echo '<a href="movie_modify.php?id=' . $objeto->getId() . '" class="btn btn-outline-warning">Actualizar</a>&nbsp;';
            echo '<a href="movie_delete.php?id=' . $objeto->getId() . '" class="btn btn-outline-danger">Eliminar</a>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
<?php
require_once('./layout/footer.php')
?>