<?
include('db_connection.php');
$API_key  = 'AIzaSyBlPryS3cIa-ugABVZ361FjqKXXrI7jQN0';
$videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/videos?part=snippet,statistics&chart=mostPopular&regionCode=IN&maxResults=10&key='.$API_key.''));
//echo '<pre>'; print_r($videoList->items);
$sql = "truncate table youtube_tranding_list";
$conn->query($sql);

foreach($videoList->items as $item){
	$channel = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/channels?id='. $item->snippet->channelId .'&key='.$API_key.'&part=snippet'));
	$video_id=mysqli_real_escape_string($conn,$item->id);
	$video_etag=mysqli_real_escape_string($conn,$item->etag);
	$video_date=date('Y-m-d h:i:s', strtotime($item->snippet->publishedAt));
	$video_title=mysqli_real_escape_string($conn,$item->snippet->title);
	$video_description=mysqli_real_escape_string($conn,$item->snippet->description);
	$video_url='https://www.youtube.com/watch?v='.$item->id;
	$video_thumbnails_default=mysqli_real_escape_string($conn,$item->snippet->thumbnails->default->url);
	$video_thumbnails_medium=mysqli_real_escape_string($conn,$item->snippet->thumbnails->medium->url);
	$video_thumbnails_high=mysqli_real_escape_string($conn,$item->snippet->thumbnails->medium->url);
	$video_viewCount=$item->statistics->viewCount;
	$video_likeCount=$item->statistics->likeCount;
	$video_dislikeCount=$item->statistics->dislikeCount;
	$video_commentCount=$item->statistics->commentCount;
	foreach($channel->items as $channels){
	$channels_title=mysqli_real_escape_string($conn,$channels->snippet->title);
	$channels_description=mysqli_real_escape_string($conn,$channels->snippet->description);
	$channels_thumbnail_default=mysqli_real_escape_string($conn,$channels->snippet->thumbnails->default->url);
	$channels_thumbnail_medium=mysqli_real_escape_string($conn,$channels->snippet->thumbnails->medium->url);
	$channels_thumbnail_high=mysqli_real_escape_string($conn,$channels->snippet->thumbnails->high->url);
	}
	$sql = "INSERT INTO youtube_tranding_list (video_id, video_etag, video_date,video_title,video_description,video_url,video_thumbnails_default,video_thumbnails_medium,video_thumbnails_high,video_viewCount,video_likeCount,video_dislikeCount,video_commentCount,channels_title,channels_description,channels_thumbnail_default,channels_thumbnail_medium,channels_thumbnail_high)VALUES ('$video_id', '$video_etag', '$video_date','$video_title','$video_description','$video_url','$video_thumbnails_default','$video_thumbnails_medium','$video_thumbnails_high','$video_viewCount','$video_likeCount','$video_dislikeCount','$video_commentCount','$channels_title','$channels_description','$channels_thumbnail_default','$channels_thumbnail_medium','$channels_thumbnail_high')";
	$conn->query($sql);
}

$sql = "SELECT video_id, DATE_FORMAT(video_date, '%d/%m/%Y %H:%i:%s') as video_date,video_title,video_url,video_thumbnails_default,video_viewCount,video_likeCount,video_dislikeCount,video_commentCount,channels_title FROM youtube_tranding_list";
	if ($result = $conn -> query($sql)) { $srno=1;
	echo '<table class="table table-hover">
			<thead>
			<tr>
			<th scope="col">Sr.</th>
			<th scope="col">Video date</th>
			<th scope="col">Video title</th>
			<th scope="col">Video url</th>
			<th scope="col">Video thumbnails</th>
			<th scope="col">Statistics</th>
			<th scope="col">Channel</th>
			<th scope="col">Details</th>
			</tr>
			</thead>
			<tbody>';
	while ($row = $result -> fetch_assoc()) {
		echo'<tr class="table-success">
			<td>'.$srno++.'</td>
			<td>'.$row['video_date'].'</td>
			<td>'.$row['video_title'].'</td>
			<td> <a href="'.$row['video_url'].'" target="_blank">'.$row['video_url'].'</a></td>
			<td> <img src="'.$row['video_thumbnails_default'].'"> </td>
			<td width="20%">Video View Count: '.$row['video_viewCount'].'<br>
			Video like Count: '.$row['video_likeCount'].'<br>
			Video Dislike Count: '.$row['video_dislikeCount'].'<br>
			Video Comment Count:'.$row['video_commentCount'].'</td>
			<td>'.$row['channels_title'].'</td>
			<th scope="col"><a href="http://localhost:82/youtube/video_details.php?video_id='.$row['video_id'].'" target="_blank">Details</a></button></th>
			</tr>';	
		}
		echo '</tbody></table>';
	}
$conn->close();
?>