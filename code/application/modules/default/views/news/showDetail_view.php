<div class="news">
<?php
	echo "<h1>$newsInfo[news_title]</h1>";
	if($newsInfo['news_img'] != ''){
		echo '<img src="'.base_url().'uploads/main/'.$newsInfo['news_img'].'" width="130" align="left" />';
	}
	echo $newsInfo['news_full'];
	echo "<p align='right'><b>$newsInfo[news_author]</b></p>";
	echo '<div class="cls"></div>';

	if( ! empty($otherNews)){
		echo '<h1>Tin khác liên quan</h1>';
		echo '<ul>';
		foreach($otherNews as $news){
			$urlTitle = unicode($news['news_title']);
			echo "<li><a href='".base_url()."news/showDetail/$news[news_id]-$urlTitle.htm'>$news[news_title]</a></li>";
		}
		echo '</ul>';
	}
?>
</div>