<html>
<head>
	<title>Home</title>

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
<form action="search.php" method="get">


	<p id="welcome">Music Lovers.....</p>

	<div id="form" align="right">
		<a href="add.html"><abbr title="Click here to Add new Songs">AddSongs</abbr></a>
		<input type="text" name="search1" placeholder="Search here...." size="30"><input type="submit" name="submit" value="submit">
	</div>
	<img class="image" src="images/wonderful-headphones-wallpaper-1165-1289-hd-wallpapers.jpg" height="480" width="1350">
	<p id="about">
	WELCOME to "Music Lovers....."<br>
	here, You can Search, Listen and Add your Favourite Songs... Any time. <br>
	<img src="images/enjoyingsomemusic.jpg" height="350" width="500"> 
	</p>
	

	<div id="form" align="right">
		<br>
	</div>

	<div id="table" align="center">
	<table cellspacing="0">
	<tr>

	<?php

	$connection=mysql_connect('localhost',"user","");
	if(!$connection)
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	$db=mysql_select_db('test',$connection)or die("Failed to connect to MySQL: " . mysql_error()); 

	$query="select * from audios order by date desc";

	$r=mysql_query($query);
	$i=0;
	$j=0;
	while($row=mysql_fetch_array($r))
	{
		$i++;
		$j++;
		$name=$row['filename'];
		if($j%2==0)
			echo '<td class="even">';
		else if($j%3==0)
			echo '<td class="mid">';
		else
			echo '<td class="odd">';
		?>
		
		<h1><img src="images/k.png" width="280" height="150"><?php echo $name; ?></h1>
		<audio controls = "controls">
<source src = "<?php echo $name; ?>" type = "audio/mpeg">
</audio>
		</td>
		<?php
		if($i==5)
		{
			$i=0;
			echo '</tr>';
			echo '<tr>';
		}
	
	}?>
	</tr>
	</table>	
	</div>
</form>
</body>
</html>
	
