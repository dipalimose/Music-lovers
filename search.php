<html>
<head>
	<title>Search</title>

	<script type="text/javascript">  
document.addEventListener('play', function(e){    
    var audios = document.getElementsByTagName('audio');    
    for(var i = 0, len = audios.length; i < len;i++){    
        if(audios[i] != e.target){    
            audios[i].pause();    
        }    
    }    
}, true);  
</script>
	<link href="home.css" type="text/css" rel="stylesheet"/>
	
</head>

<body>
<style>
body
{
	background-color:rgb(193,225,225);
}
</style>

	<p id="welcome">Music Lovers.....</p>
	<div id="form" align="right">
		<br>
	</div>
	<br>

	<div id="table" align="center">
	<table cellspacing="1">
	<tr>	
<?php


	$connection=mysql_connect('localhost',"user","");
	if(!$connection)
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	$db=mysql_select_db('test',$connection)or die("Failed to connect to MySQL: " . mysql_error()); 

	$query="select filename from audios";

	$r=mysql_query($query);
	$flag=0;
	$i=0;
	$j=0;
	while($row=mysql_fetch_array($r))
	{
		if(stristr($row['filename'],$_REQUEST["search1"])!=null)
		{
			$i++;
			$j++;
			if($j%2==0)
				echo '<td class="even">';
			else if($j%3==0)
				echo '<td class="mid">';
			else
				echo '<td class="odd">';

			?>
			
			<h1><img src="images/k.png" width="280" height="150"><?php echo $row['filename']; ?></h1>
		<audio controls = "controls">
<source src = "<?php echo $row['filename']; ?>" type = "audio/mpeg">
</audio>
			</td>
			<?php $flag=1;
		
			if($i==5)
			{
				$i=0;
				echo '</tr>';
				echo '<tr>';
			}
	
		}
	}?>
	</tr>
	</table>	
	</div>

	<?php
	if($flag==0)
	{
	echo '<script type="text/javascript"> 
		alert("No Match Found....");
		window.location.href="home.php";
	</script>
	';
	}
	else
	{
	echo '<script type="text/javascript"> 
		alert("Match Found....");
	</script>
	';
	}
?>
</form>
</body>
</html>