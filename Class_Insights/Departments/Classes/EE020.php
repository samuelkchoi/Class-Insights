<html>
    <body>
        
        <?php 

		$class_num = 7;

		$servername = "localhost";
		$user = "root";
		$pass = "39632hd";
		$dbname = "Database One";

		$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);

		$sth = $pdo->prepare("SELECT uname, sid FROM Cloud WHERE 1");
		
		$sth->bindParam(':uname', $uname);
		$sth->bindParam(':sid', $sid);
		$sth->execute();

		$result = $sth->fetch(PDO::FETCH_ASSOC);

		//Create connection

		$stmt = $pdo->prepare("INSERT INTO Reviews (username, content, id, class_id) VALUES				(:username, :content, :id, :class_id)");

		$random = 0;

		$stmt->bindParam(':username', $result['uname']);
		$stmt->bindParam(':content', $_POST['usermsg']);
		$stmt->bindParam(':id', $random);
		$stmt->bindParam(':class_id', $class_num);

		$stmt->execute();

		//output messages
		$sth2 = $pdo->prepare("SELECT username, content, class_id FROM Reviews WHERE 1");
		
		
		$sth2->bindParam(':username', $username);
		$sth2->bindParam(':content', $content);	
		$sth2->bindParam(':class_id', $class_id);

		$sth2->execute();
		$result2 = $sth2->fetch(PDO::FETCH_ASSOC);

		while($sth2->fetch(PDO::FETCH_BOTH)){
			if($result2['class_id'] == $class_num){
				echo $result2['username'] . ": " . $result2['content'],"<br>";
}
		}
		
	?>
    </body>
</html>
