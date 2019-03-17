<?php
function getdb()
{
$dsn = 'mysql:host=public.2it8h.tyo1.database-hosting.conoha.io;dbname=2it8h_development;charset=utf8';
$db = new PDO($dsn,'2it8h_developer','Line123456789');
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $db;
}
	function insert_feedback($tero_id = null,$user_id = null,$type = null)
	{
        $db = getdb();
        $db->query("INSERT INTO Feedback (tero_id,user_id,type) VALUES ('$tero_id', '$user_id', '$type')");
		if ($tero_id == null || $user_id == null || $type == null ) {
			return false;
		}
//        try {
//        	       $sql = 'SELECT tero_id,user_id FROM Feedback WHERE tero_id=:tero_id AND user_id=:user_id';
//        	       $prepare = $db->prepare($sql);
//        	       $prepare->bindValue(':tero_id',$tero_id, PDO::PARAM_STR);
//        	       $prepare->bindValue(':user_id',$user_id, PDO::PARAM_STR);
//        	       $prepare->execute();
//        	       $exsist = $prepare->fetchAll(PDO::FETCH_OBJ);
//                } catch (PDOException $e) {
//        	return false;
//        }
//                try {
//                       $sql = 'SELECT id FROM Users WHERE user_id=:user_id';
//                       $prepare = $db->prepare($sql);
//                       $prepare->bindValue(':user_id',$user_id, PDO::PARAM_STR);
//                       $prepare->execute();
//                       $exsist2 = $prepare->fetchAll(PDO::FETCH_OBJ);
//                } catch (PDOException $e) {
//                return false;
//        }
//        if (empty($exsist) || empty($exsist2)) {
//        	try {
//        		$sql = 'INSERT INTO Feedback (tero_id,user_id,type) VALUES (:tero,:user,:type)';
//        		$prepare = $db->prepare($sql);
//                $prepare->bindValue(':tero',$tero_id, PDO::PARAM_STR);
//                $prepare->bindValue(':user',$user_id, PDO::PARAM_STR);
//                $prepare->bindValue(':type',$type, PDO::PARAM_STR);
//                $prepare->execute();
//        	} catch (PDOException $e) {
//        		return false;
//        	}
//        	return true;
//        }else{
//        	return false;
//        }
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
                $db = getdb();
                if ($page > 1) {
                        $start = ($page * 10) - 10;
                }else{
                        $start = 1;
                }
                try {
                       $sql = 'SELECT * FROM Teros WHERE user_id=:tero_id limit :search,10';
                       $prepare = $db->prepare($sql);
                       $prepare->bindValue(':tero_id',$tero_id, PDO::PARAM_STR);
                       $prepare->bindValue(':search',$start, PDO::PARAM_STR);
                       $prepare->execute();
                       $data = array();
                       while($row = $prepare->fetch(PDO::FETCH_ASSOC)){
                        $json[]=array(
                                'data'=>$row['img_name']
                        );
                }
               } catch (PDOException $e) {
                $e->getMessage();
                return false;
        }
        return json_encode($json);
	}

        function tero_counts()
        {
                $db = getdb();
                try {
                        $sql = 'SELECT COUNT(*) id FROM Teros';
                        $prepare = $db->prepare($sql);
                        $prepare->execute();
                        $count = $prepare->fetchColumn();
                } catch (PDOException $e) {
                        return false;
                }
                return array('count' => $count );
        }
/*        function what_username($id)
        {
                $db = getdb();
                try {
                        $sql = 'SELECT * FROM Teros WHERE user_id=:tero_id limit :search,10';
                       $prepare = $db->prepare($sql);
                       $prepare->bindValue(':tero_id',$id, PDO::PARAM_STR);
                       $prepare->bindValue(':search',$start, PDO::PARAM_STR);
                       $prepare->execute();
                } catch (PDOException $e) {
                        return false;
                }
        }*/
