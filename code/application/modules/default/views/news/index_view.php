<!-- <div class="news">
	<h1>Lũ ơi, xin đừng đến nữa… </h1>
    <img src="aaa.jpg" width="130" align="left" />
    Trên chiếc canô chất đầy hàng hóa ậm ạch vượt qua con nước dữ, cứ mỗi lần nghe tiếng dân kêu và những cánh tay vẫy cuống cuồng từ những mái nhà là mỗi lần lòng tôi đau nhói.
    <div class="cls"></div>
</div> -->
<?php
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
?>