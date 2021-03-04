<?
include('db_connection.php');
$video_id=$_GET['video_id'];
$sql = "SELECT video_id, video_etag, DATE_FORMAT(video_date, '%d/%m/%Y %H:%i:%s') as video_date,video_title,video_description,video_url,video_thumbnails_default,video_thumbnails_medium,video_thumbnails_high,video_viewCount,video_likeCount,video_dislikeCount,video_commentCount,channels_title,channels_description,channels_thumbnail_default,channels_thumbnail_medium,channels_thumbnail_high FROM youtube_tranding_list where video_id='$video_id'";
if ($result = $conn -> query($sql)) {
	$row = $result -> fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script type="text/javascript"  src="js/jQuery.js"></script>
</head>
<body>
<div class="container">
<div class="row">
	<div class="col-lg-6">
		<div class="card text-white bg-primary mb-3" style="max-width: 100rem;">
		<div class="card-header"><? echo $row['video_title'].' - Uploaded on '.$row['video_date'].'';?></div>
		<div class="card-body">
		<iframe width="490" height="275" src="https://www.youtube.com/embed/<?echo $video_id;?>?autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" ></iframe>
		<? echo 'Total Views:'.$row['video_viewCount'].'&nbsp;&nbsp;&nbsp; Likes:'.
		$row['video_likeCount'].'&nbsp;&nbsp;&nbsp; Dislikes:'.$row['video_dislikeCount'].'&nbsp;&nbsp;&nbsp; Comments:'.$row['video_commentCount'];?>
		</div>
		</div>
	</div>
	<div class="col-lg-6">
	<h3><u>Video Description</u></h3>
	 <? echo $row['video_description'];?>
	 <br>URL: <a href="'.$row['video_url'].'" target="_blank"> <? echo $row['video_url'];?></a>
	</div>
</div>
<div class="row">
	<div class="card-header"><? echo 'Channel Title: '.$row['channels_title'].'';?></div>
	<div class="card-body"><h3><u>Channel Description: </u></h3><? echo $row['channels_description'];?></div>
</div>
<h3><u>Channel thumbnails:</u></h3>
<div class="row">
	<img src="<? echo $row['channels_thumbnail_default'];?>" title="channels_thumbnail_default">&nbsp;
	<img src="<? echo $row['channels_thumbnail_medium'];?>" title="channels_thumbnail_medium">&nbsp;
	<img src="<? echo $row['channels_thumbnail_high'];?>" title="channels_thumbnail_high">
</div>
<h3><u>Video thumbnails:</u></h3>
<div class="row">
	<img src="<? echo $row['video_thumbnails_default'];?>" title="channels_thumbnail_default">&nbsp;
	<img src="<? echo $row['video_thumbnails_medium'];?>" title="video_thumbnails_medium">&nbsp;
	<img src="<? echo $row['video_thumbnails_high'];?>" title="video_thumbnails_high">&nbsp;
</div>
</div>
</div>