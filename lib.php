<?php
	function insert_feedback($tero_id = null,$user_id = null,$type = null)
	{
$dsn = 'mysql:host=public.2it8h.tyo1.database-hosting.conoha.io;dbname=2it8h_development;charset=utf8';
$db = new PDO($dsn,'2it8h_developer','Line123456789');
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if ($tero_id == null || $user_id == null || $type == null ) {
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
        		return false;
        	}
        	return true;
        }else{
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
$dsn = 'mysql:host=public.2it8h.tyo1.database-hosting.conoha.io;dbname=2it8h_development;charset=utf8';
$db = new PDO($dsn,'2it8h_developer','Line123456789');
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if ($page > 1) {
                        $start = ($page * 10) - 10;
                }else{
                        $start = 1;
                }
                echo $page.'<br>'.$start.'<br>';
                try {
                       $sql = 'SELECT * FROM Teros WHERE user_id=:tero_id limit :search,10';
                       $prepare = $db->prepare($sql);
                       $prepare->bindValue(':tero_id',$tero_id, PDO::PARAM_STR);
                       $prepare->bindValue(':search',$start, PDO::PARAM_STR);
                       $prepare->execute();
                       $data = array();
                       while($row = $sth->fetch(PDO::FETCH_ASSOC)){
                        $userData[]=array(
                                'id'=>$row['user_id'],
                                'name'=>$row['img_name']
                        );
                }
               } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
        }
        return json_encode($json);
	}

        function tero_counts()
        {
$dsn = 'mysql:host=public.2it8h.tyo1.database-hosting.conoha.io;dbname=2it8h_development;charset=utf8';
$db = new PDO($dsn,'2it8h_developer','Line123456789');
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                try {
                        $sql = 'SELECT COUNT(*) id FROM Teros';
                        $prepare = $db->prepare($sql);
                        $prepare->execute();
                        $count = $prepare->fetchColumn();
                } catch (PDOException $e) {
                        return false;
                }
        }
        function ranking()
        {
$dsn = 'mysql:host=public.2it8h.tyo1.database-hosting.conoha.io;dbname=2it8h_development;charset=utf8';
$db = new PDO($dsn,'2it8h_developer','Line123456789');
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                try {
                        $sql = 'SELECT user_id,type FROM Feedback ';
                        $prepare = $db->prepare($sql);
                        $prepare->execute();
                        $result = $prepare->fetchAll(PDO::FETCH_OBJ);
                } catch (PDOException $e) {
                        return false;
                }

        }

