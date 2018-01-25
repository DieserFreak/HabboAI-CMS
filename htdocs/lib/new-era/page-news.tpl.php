<!- INCLUDE new-era/header ->
	<div id="column" style="width:35%">
		<div id="content">
			<div id="boxtitle">Letzte News</div>
			<div id="box">
			<ul class="stories-list">
			<!- BEGIN newslist ->
				<li><a href="{url}/news/{newslist.ID}">{newslist.TITLE} &raquo;</a></li>
			<!- END newslist ->
			</ul>
			</div>
		</div>
	</div>
	
	<div id="column" style="width:65%">
		<div id="content">
			<div id="boxtitle">Top News</div>
			<!- BEGIN topnews ->
			<a href="{url}/news/{topnews.ID}">
			<div class="stories-topstory" style="background-image: url('{topnews.IMAGE}');height:100px;">
				<h1>{topnews.TITLE}</h1>
				<p>
					{topnews.DESC}
				</p>
			</div></a>
			<br />
			<!- END topnews ->
			
		</div>
	</div>
<!- INCLUDE new-era/footer ->