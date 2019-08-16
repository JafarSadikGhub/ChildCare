<?php

require("dbc.php");

function getUsersData($id)
{
	$array = array();
	$q = mysqli_query("SELECT * FROM `users` WHERE `id`=".$id);
	while($r = mysqli_fetch_assoc($q))
	{
		$array['id'] = $r['id'];
		$array['username'] = $r['username'];
		$array['password'] = $r['password'];
		$array['firstname'] = $r['firstname'];
		$array['lastname'] = $r['lastname'];
		$array['profileext'] = $r['profileext'];
		$array['aboutme'] = $r['aboutme'];
		$array['birthday'] = $r['birthday'];
		$array['country'] = $r['country'];
		$array['city'] = $r['city'];
	}
	return $array;
}

function getId($username)
{
	$q = mysqli_query("SELECT `id` FROM `users` WHERE `username`='".$username."'");
	while($r = mysqli_fetch_assoc($q))
	{
		return $r['id'];
	}
}

function userExists($id)
{
	$numrows = mysqli_num_rows(mysqli_query("SELECT `id` FROM `users` WHERE `id`=".$id));
	if($numrows==1)
		return true;
	else
		return false;
}

function updateFirstLastName($id,$firstName,$lastName)
{
	if(mysqli_query("UPDATE `users` SET `firstname`='".$firstName."', `lastname`='".$lastName."' WHERE `id`=".$id))
		return true;
	else
		return false;
}

function updateAboutMe($id,$aboutMe)
{
	if(mysqli_query("UPDATE `users` SET `aboutme`='".$aboutMe."' WHERE `id`=".$id))
		return true;
	else
		return false;
}

function updateCountryCity($id,$country,$city)
{
	if(mysqli_query("UPDATE `users` SET `country`='".$country."', `city`='".$city."' WHERE `id`=".$id))
		return true;
	else
		return false;
}

function updateBirthday($id,$birthday)
{
	if(mysqli_query("UPDATE `users` SET `birthday`=".$birthday." WHERE `id`=".$id))
		return true;
	else
		return false;
}

function updateProfilePicture($id,$tmpName,$ext)
{
	if(move_uploaded_file($tmpName,"images/userimages/".$id.".".$ext) && mysqli_query("UPDATE `users` SET `profileext`='".$ext."' WHERE `id`=".$id))
		return true;
	else
		return false;
}

function resetProfilePicture($id,$ext)
{
	if(unlink("images/userimages/".$id.".".$ext) && mysqli_query("UPDATE `users` SET `profileext`='n/a' WHERE `id`=".$id))
		return true;
	else
		return false;
}

?>
