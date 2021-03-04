<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script type="text/javascript"  src="js/jQuery.js"></script>
</head>
<body>
<div class="container">
<div class="jumbotron">
<p class="lead">This Page Shows YOUTUBE Top 10 Trending videos with title, URL, thumbnail, view count, likes, dislike and channel title</p>
<button type="button" class="btn btn-primary btn-lg btn-block" onclick="GettrendingViedos()">Get Trending Videos</button>
</div>
<div class="VideoDetails" id="VideoDetails"></div>
</div>
<script>
function GettrendingViedos(){
		$.ajax({
		type:"post",
		url:"youtube.php",
		cache: false,
		data:{},
		success: function(data){
		$('#VideoDetails').html(data);
		}
		});
}
</script>
</body>
</html>