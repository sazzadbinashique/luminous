<!DOCTYPE html>
<html>
<head>
	<title>Luminous Logic</title>
	<link rel="stylesheet" href="style.css">
    <link href="http://vjs.zencdn.net/5.8.0/video-js.css" rel="stylesheet">
     <!-- If you'd like to support IE8 -->
     <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
</head>
<body>
	<?php
		include 'connect.php';
	?>

	<div id="box">

		<?php
			$video =$_GET['video']; 
		?>
		<video id="my-video" class="video-js" controls preload="auto" width="640" height="264" poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
        <source src="videos/<?php echo $video; ?>" type='video/mp4'>
        </video>	
	</div> 

  <script src="http://vjs.zencdn.net/5.8.0/video.js"></script>
</body>
</html>