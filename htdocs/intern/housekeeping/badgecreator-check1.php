<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */
 header('Content-Type: text/html; charset=UTF-8');
require ('../../inc/base.inc.php');
require ('../../inc/maintenance.inc.php');

if(LOGGING_IN == false){
    header('location: '. $_CONFIG['website']['url']);
}

if($user->UserData('rank') < $_CONFIG['housekeeping']['right']['user.list']){
    header('location: '. $_CONFIG['website']['url'].'/error');
}

if(empty($_SESSION['intern']['acp'])){
	header('location: '. $_CONFIG['website']['url'].$_CONFIG['housekeeping']['url'].'/');
}

function protect($string, $output = false) {
    $string = str_replace("'", "", $string);
    $string = strip_tags($string);


    return $string;
}
if (isset($_POST['add'])) {
            $id = protect($_POST['id']);
            $check = dbSelect('*','user_ownbadge'," WHERE id = '" . $id . "' ");
			 $row = $check->fetch_assoc();

            $badge_id = 'UBAD' . $id;
            //$mysqli->query("UPDATE hp_mcp SET status = '1' WHERE extra_data = '" . $id . "' ");
			$form_data_badge_addst = array(
				'status'	=>	'2',
				'badge_id' => $badge_id
				);
				dbUpdate('user_ownbadge', $form_data_badge_addst, "WHERE id = '" . $id . "'");
           
           // file_put_contents('http://habbo.gy/swf/c_images/album1584/' . $badge_id . '.gif', base64_decode($row['badge_image']));
			$decoded=base64_decode('iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAv0lEQVRYR+2UQQ6AIAwE4f+PRtFgoLEG2JZgsl68sHWYtsaw+RM35wsERDtEgzSIGkDznEEaRA2gec4gDaIG0DxnkAZRA2j+NzOYxE23AddAJDDaKZnvFtB90Jqwtx4Be01p52YNLluqEUDvxSkSG6YRQNmFDIzkta7WIiL6AS/IAp9QwFzIE9IE0BPSDNAL0hSwQOa32ehYFHrbxmYTJ3/W12x7AdZMM7AlswRQg/0S+4hbYXCyw3eMgJC+M3wAITwVJWYvX/AAAAAASUVORK5CYII=');
			file_put_contents('/tmp/newImage.JPG',$decoded);
//leave it to you to randomize the filename.
			$form_data_badge_add = array(
			'user_id' => $row['user_id'],
			'badge_id' => $badge_id,
			'badge_slot' => '0'	
			);
		dbInsert('user_badges', $form_data_badge_add);
		$form_data_badge_add_external = array(
			'badge' => $badge_id,
			'title' => $row['badge_title'],
			'desc' => $row['badge_desc']	
			);
		dbInsert('external_badges', $form_data_badge_add_external);
             //$mysqli->query("INSERT INTO hp_useralert (user_id, text, sender_id) VALUES ('" . $row->user_id . "', 'Dein Badge wurde erfolgreich bearbeitet und aktiviert!', '" . $user->id . "') ");
        }

        if (isset($_POST['remove'])) {
            $id = protect($_POST['id']);
            //$mysqli->query("UPDATE hp_mcp SET status = '1' WHERE extra_data = '" . $id . "' ");
			$form_data_badge_removest = array(
				'status'	=>	'3'
				);
				dbUpdate('user_ownbadge', $form_data_badge_removest, "WHERE id = '" . $id . "'");
           
            $getuserrow = dbSelect('*','user_ownbadge'," WHERE id = '" . $id . "' ");
            if ($getuserrow->num_rows > 0) {
                $ubad = $getuserrow->fetch_assoc();
				$form_data_badge_remove = array(
				'credits'	=>	$ubad['credits'] + 5000,
				'vip_points'=>	$ubad['vip_points'] + 10
				);
				dbUpdate('users', $form_data_badge_remove, "WHERE id = '" . $ubad['id'] . "'");
                
            }
        }


$active = 'badgecreator';
$headtitle = 'Badgecreator7';
$toptitle = 'Badge<small>creator</small>';
$title = 'Badge</li><li class="active">creator</li>';
require ('./header.php');
?>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Badgecreator</h3>
			<div class="pull-right box-tools">
				<button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimieren/Maximieren"><i class="fa fa-minus"></i></button>
            </div>
	</div>

	<div class="box-body table-responsive">
	 <?php
                $sql = dbSelect('*','user_ownbadge', "WHERE status = '0'");
                if ($sql->num_rows > 0) {
                    ?>
		<table id="userlist" class="table table-bordered table-striped">
			<thead>
				<tr>
				<th width="60px"></th>
                <th width="150px"><b>Name</b></th>
                <th><b>Beschreibung</b></th>
                <th><b>Datum</b></th>
                <th><b>Ersteller</b></th>
                <th><b>Aktionen</b></th>
					
				</tr>
			</thead>
			<tbody>
		<?php
			while ($row = $sql->fetch_assoc()) {
		?>
			<tr>
			<td><?php if ($row['status'] == '0') { ?><img src="data:image/gif;base64,<?php echo $row['badge_image']; ?>"><?php } else { ?><?php } ?></td>
                                    <td style="font-size: 13px;"><?php echo utf8_encode($row['badge_title']); ?></td>
                                    <td style="font-size: 13px;"><?php echo utf8_encode($row['badge_desc']); ?></td>
                                    <td style="font-size: 13px;"><?php echo date('d.m.Y H:i', $row['timestamp']); ?> Uhr</td>
                                    <td style="font-size: 13px;"><?php echo getUsername($row['user_id']); ?></td>
                                    <td style="font-size: 13px;">
                                        <form action="" method="post">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <input type="submit" name="add" class="btn btn-app" value="Badge akzeptieren" style="background-color:lightblue;">
                                            <input type="submit" name="remove" class="btn btn-app" value="Badge ablehnen" style="background-color:pink;">

                                        </form>

                                    </td>
					
					</tr>
		<?php
			}
		?>
			</tbody>
			<tfoot>
				<tr>
					<th width="60px"></th>
                <th width="150px"><b>Name</b></th>
                <th><b>Beschreibung</b></th>
                <th><b>Datum</b></th>
                <th><b>Ersteller</b></th>
                <th><b>Aktionen</b></th>
				</tr>
			</tfoot>
		</table>
				 <?php } else { ?>

                    Derzeit gibt es keine neuen Badgeanmeldungen!

                <?php } ?>
	</div>
</div>
<?php require ('./footer.php'); ?>