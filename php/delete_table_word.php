<?php
function delete_table_word($table, $pdo){
    $id = filtruj($_GET['id']);

    if (empty($id)){
        echo "Numer ID nie istnieje";
    }
     
    try
    {
    $pdo ->exec("DELETE FROM $table WHERE id = '$id' ") or die('Błąd zapytania');
    header("Location: tryb_edycji.php?zestaw=$table");
      
    }
    catch(PDOException $e)
    {
       echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
       echo '</br><a href="tryb_edycji.php?zestaw='.$table.'">wróć</a>';
    }
}
?>