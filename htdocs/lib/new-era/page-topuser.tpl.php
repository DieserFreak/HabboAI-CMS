<!- INCLUDE new-era/header ->
<!- INCLUDE new-era/subheader_community ->

<br>
<div id="content">
	<div class="socialmedia-item">
		<h2>Top 5: Taler</h2>
		<br>
		<!- BEGIN usercredits ->
			<div class="topuser" style="float:left;">
			<img src="http://www.habbo.com/habbo-imaging/avatarimage?figure={usercredits.USERLOOK}&direction=2&head_direction=3&gesture=sml&action=stand" class="topuseravatar">
			<b>{usercredits.USERNAME}</b><br /><br />... besitzt {usercredits.USERCREDITS} Taler
			</div>
		<!- END usercredits ->
	</div>
	<div class="socialmedia-item">
		<h2>Top 5: Duckets</h2>
		<br>
		<!- BEGIN userpixel ->
			<div class="topuser" style="float:left;">
			<img src="http://www.habbo.com/habbo-imaging/avatarimage?figure={userpixel.USERLOOK}&direction=2&head_direction=3&gesture=sml&action=stand" class="topuseravatar">
			<b>{userpixel.USERNAME}</b><br /><br />.. besitzt {userpixel.USERPIXEL} Duckets
			</div>
		<!- END userpixel ->
	</div>
	<div class="socialmedia-item">
		<h2>Top 5: Diamanten</h2>
		<br>
		<!- BEGIN userdias ->
			<div class="topuser" style="float:left;">
			<img src="http://www.habbo.com/habbo-imaging/avatarimage?figure={userdias.USERLOOK}&direction=2&head_direction=3&gesture=sml&action=stand" class="topuseravatar">
			<b>{userdias.USERNAME}</b><br /><br />.. besitzt {userdias.USERDIAS} Diamanten
			</div>
		<!- END userdias ->
	</div>
	<div class="socialmedia-item">
		<h2>Top 5: Onlinezeit</h2>
		<br>
		<!- BEGIN useronline ->
			<div class="topuser" style="float:left;">
			<img src="http://www.habbo.com/habbo-imaging/avatarimage?figure={useronline.USERLOOK}&direction=2&head_direction=3&gesture=sml&action=stand" class="topuseravatar">
			<b>{useronline.USERNAME}</b><br /><br />.. war bereits {useronline.USERONLINE} Stunden online
			</div>
		<!- END useronline ->
	</div>
	<div class="socialmedia-item">
		<h2>Top 5: Lobe</h2>
		<br>
		<!- BEGIN userrespect ->
			<div class="topuser" style="float:left;">
			<img src="http://www.habbo.com/habbo-imaging/avatarimage?figure={userrespect.USERLOOK}&direction=2&head_direction=3&gesture=sml&action=stand" class="topuseravatar">
			<b>{userrespect.USERNAME}</b><br /><br />.. hat aktuell {userrespect.USERRESPECT} Loben erhalten
			</div>
		<!- END userrespect ->
	</div>
	<div class="socialmedia-item">
		<h2>Top 5: Aktivit&auml;tspunkte</h2>
		<br>
		<!- BEGIN userachiev ->
			<div class="topuser" style="float:left;">
			<img src="http://www.habbo.com/habbo-imaging/avatarimage?figure={userachiev.USERLOOK}&direction=2&head_direction=3&gesture=sml&action=stand" class="topuseravatar">
			<b>{userachiev.USERNAME}</b><br /><br />.. hat aktuell {userachiev.USERACHIEV} Aktivit&auml;tsp.
			</div>
		<!- END userachiev ->
	</div>
	<div class="socialmedia-item">
		<h2>Top 5: Badges</h2>
		<br>
		<!- BEGIN userbadge ->
			<div class="topuser" style="float:left;">
			<img src="http://www.habbo.com/habbo-imaging/avatarimage?figure={userbadge.USERLOOK}&direction=2&head_direction=3&gesture=sml&action=stand" class="topuseravatar">
			<b>{userbadge.USERNAME}</b><br /><br />.. hat insgesamt {userbadge.USERBADGE} Badges
			</div>
		<!- END userbadge ->
	</div>
</div>
<!- INCLUDE new-era/footer ->