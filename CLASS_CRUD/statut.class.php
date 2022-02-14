<?php
// CRUD STATUT
// ETUD
require_once __DIR__ . '../../CONNECT/database.php';

class STATUT{
	function get_1Statut($idStat){
		global $db;
		$query = "SELECT * FROM STATUT WHERE idStat = ?";
		$result = $db->prepare($query);
		$result->execute([$idStat]);
		return($result->fetch());
	}

	function get_AllStatuts(){
		global $db;

		// select
		$query = 'SELECT * FROM STATUT;';
		// prepare
		$result = $db->query($query);
		// execute
		$allStatuts = $result->fetchAll();
		return($allStatuts);
	}

	function create($libStat){
		global $db;

		try {
			$db->beginTransaction();

			// insert
			$query = 'INSERT INTO STATUT (libStat) VALUES (?)'; // ON met la liste des attributs de la table, ici il n'y en a qu'un donc on s'arrête à libStat
			// prepare
			$request = $db->prepare($query);
			$request->execute([$libStat]);
			// execute
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();	// DANS LE CAS OU CA PLANTE ON ENVOIE UNE ERREUR
			$request->closeCursor();
			die('Erreur insert STATUT : ' . $e->getMessage());
		}
	}

	function update($idStat, $libStat){
		global $db;

		try {
			$db->beginTransaction();

			// update
			$query = "UPDATE STATUT SET libStat = ? WHERE idStat = $idStat;";
			// prepare
            $request = $db->prepare($query);
            // execute
            $request->execute([$libStat]);

			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur update STATUT : ' . $e->getMessage());
		}
	}

	function delete($idStat){
		global $db;
		
		try {
			$db->beginTransaction();

			// insert
			$query = 'DELETE FROM STATUT WHERE idStat=?'; 
			// prepare
			$request = $db->prepare($query);
			// execute
			$request->execute([$idStat]);

			$count = $request->rowCount(); 
			$db->commit();
			$request->closeCursor();
			return($count); 
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur delete STATUT : ' . $e->getMessage());
		}
	}
}	// End of class
