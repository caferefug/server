<?php
$dsn = 'mysql:host=public.2it8h.tyo1.database-hosting.conoha.io;dbname=2it8h_development;charset=utf8';
$db = new PDO($dsn,'2it8h_developer','Line123456789');
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	function insert_feedback($tero_id = null,$user_id = null,$type = null)
	{
		if ($tero_id == null || $user_id == null || $type == null ) {
                        echo "NO1";
			return false;
		}
                try {
        	       $sql = 'SELECT tero_id,user_id FROM Feedback WHERE tero_id=:tero_id AND user_id=:user_id';
        	       $prepare = $db->prepare($sql);
        	       $prepare->bindValue(':tero_id',$tero_id, PDO::PARAM_STR);
        	       $prepare->bindValue(':user_id',$user_id, PDO::PARAM_STR);
        	       $prepare->execute();
        	       $exsist = $prepare->fetchAll(PDO::FETCH_OBJ);
                } catch (PDOException $e) {
                        echo "NO2";
        	return false;
        }
        if (empty($exsist)) {
        	try {
        		$sql = 'INSERT INTO Feedback (tero_id,user_id,type) VALUES (:tero,:user,:type)';
        		$prepare = $db->prepare($sql);
                $prepare->bindValue(':tero',$tero_id, PDO::PARAM_STR);
                $prepare->bindValue(':user',$user_id, PDO::PARAM_STR);
                $prepare->bindValue(':type',$type, PDO::PARAM_STR);
                $prepare->execute();
        	} catch (PDOException $e) {
                        echo "NO3";
        		return false;
        	}
        	return true;
        }else{
                echo "NO4";
        	return false;
        }
	}
        /* different server
        function get_feedback($tero_id)
        {
                try {
                $sql = 'SELECT type FROM Feedback WHERE tero_id=:tero_id';
                $prepare = $db->prepare($sql);
                $prepare->bindValue(':tero_id',$tero_id, PDO::PARAM_STR);
                $prepare->execute();
                $data = $prepare->fetchAll(PDO::FETCH_OBJ);
                } catch (PDOException $e) {
                        return false;
                }
                return $data;
        }*/

	function history($tero_id,$page)
	{
                if ($count > 1) {
                        $start = ($count * 10) - 10;
                }else{
                        $start = 1;
                }
                try {
                       $sql = 'SELECT img_name FROM Teros WHERE id=:tero_id limit :search,10';
                       $prepare = $db->prepare($sql);
                       $prepare->bindValue(':tero_id',$tero_id, PDO::PARAM_STR);
                       $prepare->bindValue(':search',$start, PDO::PARAM_STR);
                       $prepare->execute();
                       $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
               } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
        }
            foreach ($result as $row) {
                $data = $row['img_name'];
        }
        echo json_encode($data);
        var_dump($data);
        return json_encode($data);
	}

        function tero_counts()
        {
                try {
                        $sql = 'SELECT COUNT(*) id FROM Teros';
                        $prepare = $db->prepare($sql);
                        $prepare->execute();
                        $count = $prepare->fetchColumn();
                } catch (PDOException $e) {
                        return false;
                }
        }


