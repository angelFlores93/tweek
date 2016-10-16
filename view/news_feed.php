<?php 
if (isset($_SESSION['feed']) ){
	if ($_SESSION['feed'] != NULL){
		foreach ($_SESSION['feed'] as $row) { 
			$content = file_get_contents($row['url']);
			if (isset($content) && $content != ""){
				$xml = new SimpleXmlElement($content);
				echo "<h4>".$xml->subtitle."</h4><br>";
				echo '<form action="../controller/subscribe.php" method="POST">';
				echo '<input type="hidden" name="id_subscription" value="'.$row['id'].'">';
				echo '<input type="hidden" name="id_action" value="1">';
				echo '<input type="hidden" name="id_user" value="'.$_SESSION['user_id'].'">';
				echo '<input type ="submit" class ="btn btn-danger" value="Unsubscribe">';
				echo '</form>';
				foreach ($xml->entry as $entry) {
					echo '<div class="row">'; 
						echo '<strong><a href="'.$entry->id.'">'.$entry->title.'</a></strong><br>'; 
						echo $entry->summary.'<br><br>';
					echo "</div> <hr>";	
				}
			}
			else{
				echo "<h4>No news for this team";
			}
		}
	}else{
		echo "<h4>No subscriptions :(</h4>";
	}
}
?>