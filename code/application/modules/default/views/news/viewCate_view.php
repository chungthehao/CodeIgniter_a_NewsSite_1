<?php
	if( ! empty($newsArr)){
		foreach($newsArr as $news){
			echo '<div class="news">';
			echo "<h1>$news[news_title]</h1>";
			if($news['news_img'] != ''){
				echo '<img src="'.base_url().'uploads/main/'.$news['news_img'].'" width="130" align="left" />';
			}
			echo $news['news_info'];
			$urlTitle = unicode($news['news_title']);
			echo "<p align='right'><a href='".base_url()."news/showDetail/$news[news_id]-$urlTitle.htm'>Read more</a></p>";
			echo '<div class="cls"></div>';
			echo '</div>';
		}
	}else{
		echo "<h1>Chưa có tin nào trong chuyên mục này!</h1>";
	}
?>