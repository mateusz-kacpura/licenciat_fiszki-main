<?php
    require_once "../../polaczeniePDO.php";

    if(!isset($_SESSION))      
    {         
        session_start();      
    }

    $flaga = 1;

    if (!isset($_POST['table']))
    {
        $flaga = 0;
    }

    if ($flaga == 1)
    {
        try
        { 
            $table = $_POST['table'];
            $querty = "SELECT * FROM $table";
            $liczba = $pdo -> query($querty);
            while ($row = $liczba->fetch()) 
            {
                echo '<script>array1.push("'.$row['v1'].'");array2.push("'.$row['v2'].'");weight.push("'.$row['weight'].'")</script>';
            }
        }
        catch(PDOException $e)
        {
            echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
        }
    }

// aby użyć ten funkcji należy użyć w kodzie js AJAX, aby przesłać potrzebne zmienne
function load_table_fishcards($table, $pdo){
    
}

?>