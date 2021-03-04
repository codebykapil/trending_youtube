# Fetch Trending Youtube Videos list with channels details
PHP code for fetching top 10 trending videos with the help of google APIs.

Used Two Google API 
```bash
https://www.googleapis.com/youtube/v3/videos?part=snippet,statistics&chart=mostPopular&regionCode=IN&maxResults=10&key='.$API_key.'
https://www.googleapis.com/youtube/v3/channels?id='.$channelId.'&key='.$API_key.'&part=snippet
json_decode(file_get_contents($API));
```

Used BootStrap,Jquery/Ajax ,MySQL as DB
Used file_get_contents we can also use CURL for the same
