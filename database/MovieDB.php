<?php
class MovieDB
{
    public function listar($cnx)
    {
        $sql = "SELECT m.id, m.title, g.name as genre_name, m.release_year  
                FROM movies m 
                INNER JOIN genres g 
                  ON g.genre_id = m.genre_id";
        $stmt = $cnx->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
?>