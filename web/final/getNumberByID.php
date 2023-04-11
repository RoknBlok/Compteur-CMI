<?php
    function getNumberOfID() {
        $db = new SQLite3("../db.sqlite");

        if (!$db) {
            die("Erreur de connexion à la base de données");
        }

        $result = $db->querySingle("SELECT COUNT(*) FROM compeurDB");
        

        if ($result) {
            $db->close();
            return $result;
        }
        $db->close();
    
        return "Erreur";
    }

    function get_nombre_de_personne($id) {
        $db = new SQLite3("../db.sqlite");
    
        if (!$db) {
            die("Erreur de connexion à la base de données");
        }
        
        $result = $db->query("SELECT nombre_de_personne FROM compeurDB WHERE id = $id");
    
        if ($result) {
            $row = $result->fetchArray(SQLITE3_ASSOC); //on récupère le nb de personne dans un tableau associatif
    
            if ($row) {
                $db->close();
    
                return $row['nombre_de_personne'];
            }
        }
        $db->close();
    
        return "Erreur";
    }

    function get_p_nb_de_personne($id) {
        $db = new SQLite3("../db.sqlite");
    
        if (!$db) {
            die("Erreur de connexion à la base de données");
        }
        
        $result = $db->query("SELECT nombre_de_personne FROM compeurDB WHERE id = $id");
        $nmax = $db->query("SELECT nMax FROM compeurDB WHERE id = $id");
    
        if ($result && $nmax) {
            $row = $result->fetchArray(SQLITE3_ASSOC); //on récupère le nb de personne dans un tableau associatif
            $row2 = $nmax->fetchArray(SQLITE3_ASSOC);

            if ($row && $row2) {
                $db->close();
                
                $p = $row['nombre_de_personne'] * 100 / $row2['nMax'];

                return $p;
            }
        }
        $db->close();
    
        return "Erreur lors de la recherche de la salle";
    }
?>