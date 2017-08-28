<?php
if(isset($_POST['save_audio']) && $_POST['save_audio']=="upload audio")
{
	$dir="songs/";
	$audio_path=$dir.basename($_FILES['audiofile']['name']);
	if(move_uploaded_file($_FILES['audiofile']['tmp_name'],$audio_path))
	{
		//echo("Good Audio uploaded successfully....");
	}
	saveaudio($audio_path);
	
	
}
function display()
{
	$connection=mysql_connect('localhost',"user","");
	if(!$connection)
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	$db=mysql_select_db('test',$connection)or die("Failed to connect to MySQL: " . mysql_error()); 

	$query="select * from audios";

	$r=mysql_query($query);
	
	while($row=mysql_fetch_array($r))
	{
		echo "<br>";
		
		?>
		<audio controls = "controls">
<source src = "<?php echo $row['filename']; ?>" type = "audio/mpeg">
</audio>
	<?php
	}
}
function saveaudio($filename)
{
	$connection=mysql_connect('localhost',"user","");
	if(!$connection)
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	$db=mysql_select_db('test',$connection)or die("Failed to connect to MySQL: " . mysql_error()); 

	$query="insert into audios(filename,date) values('{$filename}',CURRENT_DATE)";

	mysql_query($query);
	if(mysql_affected_rows($connection)>0)
	{
	
		echo '<script type="text/javascript"> 
		alert("Audio uploaded successfully....");
		window.location.href="home.php";
	</script>
	';
	}
		
	else
	{
	//echo "Audio already exists....";
	echo '<script type="text/javascript"> 
		alert("Audio already exists....");
		window.location.href="home.php";
	</script>
	';
	}	
	
}


?>