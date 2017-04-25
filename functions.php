<?php
	function getEverything($username)
	{
		require("connection.php");
		$everything=array();
		$sql="SELECT UserID,name,email,homecity,status,skills,contact from users where Username='$username'";
		$res=mysqli_query($db,$sql);
		if(!$res)
		{
			echo "error";
		}
		else
		{
			if(mysqli_num_rows($res))
			{
				while($data=mysqli_fetch_object($res))
				{
					$everything[]= array('UserID' => $data->UserID, 'name'=> $data->name, 'email'=> $data->email, 'homecity'=> $data->homecity, 'status'=> $data->status, 'skills'=> $data->skills, 'contact'=> $data->contact );
				}
				if(count($everything))
				{
					foreach ($everything as $key => $value) {
						$_SESSION['UserID']=$value['UserID'];
						$_SESSION['name']=$value['name'];
						$_SESSION['email']=$value['email'];
						$_SESSION['homecity']=$value['homecity'];
						$_SESSION['status']=$value['status'];
						$_SESSION['skills']=$value['skills'];
						$_SESSION['contact']=$value['contact'];
					}
				}
				else
				{
					echo "there is no match";
				}
			}
		}
	}
	function getUserID()
	{
		require("connection.php");
		$userid=$_SESSION['UserID'];
		$userids=array();
		$sql="SELECT UserID from following WHERE FollowerID='$userid'";
		$res=mysqli_query($db,$sql);
		if(!$res)
		{
			echo "errffor!";
		}
		else
		{
			if(mysqli_num_rows($res))
			{
				while($data=mysqli_fetch_object($res))
				{
					$userids[]=array('UserID'=> $data->UserID);
				}
				return $userids;
			}
		}
	}	
	
	/*function show_lists(array $userid)
	{
		require("connection.php");
		$listarray=array();
		$sql_users="SELECT UserID,stamp,ListURL,ListID from lists order by stamp desc";
		$res_users=mysqli_query($db,$sql_users);
		if(!$res_users)
		{
			echo "error";
		}
		if(mysqli_num_rows($res_users))
		{
			while($data_users=mysqli_fetch_object($res_users))
			{
				if(array_search($data_users->UserID, $userid))
				{
					$listarray[]=array('ListURL'=> $data_users->ListURL,'stamp'=> $data_users->stamp, 'ListID'=> $data_users->ListID);
				}
			}
			return $listarray;
		}
		/*$sql="SELECT stamp,ListURL,ListID from lists WHERE UserID='$userid' order by stamp desc";
		$res=mysqli_query($db,$sql);
		if(!$res)
		{
			echo "error!";
		}
		else
		{
			if(mysqli_num_rows($res))
			{
				while($data=mysqli_fetch_object($res))
				{
					$listarray[]=array('ListURL'=> $data->ListURL,'stamp'=> $data->stamp, 'ListID'=> $data->ListID);
				}
				return $listarray;
			}
		}
	}	*/	
	function show_lists_profile($userid)
	{
		require("connection.php");
		$listarray=array();
		$sql="SELECT stamp,ListURL,ListID from lists WHERE UserID='$userid' order by stamp desc";
		$res=mysqli_query($db,$sql);
		if(!$res)
		{
			echo "error!";
		}
		else
		{
			if(mysqli_num_rows($res))
			{
				while($data=mysqli_fetch_object($res))
				{
					$listarray[]=array('ListURL'=> $data->ListURL,'stamp'=> $data->stamp, 'ListID'=> $data->ListID);
				}
				return $listarray;
			}
		}
	}
	function show_lists_timeline()
	{
		require("connection.php");
		$listarray=array();
		$sql="SELECT stamp,ListURL,ListID from lists order by stamp desc";
		$res=mysqli_query($db,$sql);
		if(!$res)
		{
			echo "error!";
		}
		else
		{
			if(mysqli_num_rows($res))
			{
				while($data=mysqli_fetch_object($res))
				{
					$listarray[]=array('ListURL'=> $data->ListURL,'stamp'=> $data->stamp, 'ListID'=> $data->ListID);
				}
				return $listarray;
			}
		}
	}

	function show_replies($listid)
	{
		require("connection.php");
		$listarray=array();
		$sql="SELECT reply from replies WHERE ListID='$listid' order by stamp desc";
		$res=mysqli_query($db,$sql);
		if(!$res)
		{
			echo "error!";
		}
		else
		{
			if(mysqli_num_rows($res))
			{
				while($data=mysqli_fetch_object($res))
				{
					$listarray[]=array('reply'=> $data->reply);
				}
				return $listarray;
			}
		}
	}


	function show_users()
	{
		require("connection.php");
		$users=array();
		$sql="SELECT Username, UserID from users";
		$res=mysqli_query($db,$sql);
		if(!$res)
		{
			echo "error!";
		}
		else
		{
			if(mysqli_num_rows($res))
			{
				while($data=mysqli_fetch_object($res))
				{
					$users[$data->UserID]=$data->Username;
				}
				return $users;
			}
			else
			{
				echo "no users here!";
			}
		}
	}
		
	function following($userid)
	{
		require("connection.php");
		$users=array();
		$sql="SELECT distinct UserID from following where FollowerID='$userid'";
		$result=mysqli_query($db,$sql);
		while($data=mysqli_fetch_object($result))
		{
			array_push($users, $data->UserID);
		}
		return $users;
	}
	function check_count($first,$second)
	{
		require("connection.php");
		$sql="SELECT count(*)from following where UserID='$second' and FollowerID='$first'";
		$result=mysqli_query($db,$sql);
		$row=mysqli_fetch_row($result);
		return $row[0];
	}
	function follow_user($me,$them)
	{
		require("connection.php");
		$count=check_count($me,$them);
		if($count==0)
		{
			$sql="INSERT into following (UserID, FollowerID) VALUES ($them,$me)";
			$result=mysqli_query($db,$sql);
		}
	}
	function unfollow_user($me,$them)
	{
		require("connection.php");
		$count=check_count($me,$them);
		if($count!=0)
		{
			$sql="DELETE from following where UserID='$them' and FollowerID='$me' limit 1";
			$result=mysqli_query($db,$sql);
		}
	}
	function setActive()
	{
		require("connection.php");
		$username=$_SESSION['username'];
		$sql="UPDATE `users` SET `status` = 'active' WHERE `users`.`Username` = '$username'";
		$result=mysqli_query($db,$sql);
	}
	function setInactive()
	{
		require("connection.php");
		$userid=$_SESSION['UserID'];
		$sql="UPDATE `users` SET `status` = 'inactive' WHERE `users`.`UserID` = '$userid'";
		$result=mysqli_query($db,$sql);
	}
	function get_status($username)
	{
		require("connection.php");
		$status=array();
		$sql="SELECT status from users WHERE Username='$username'";
		$result=mysqli_query($db,$sql);
		if(!$result)
		{
			echo "error!";
		}
		else
		{
			if(mysqli_num_rows($result))
			{
				while($data=mysqli_fetch_object($result))
				{
					$status[]=array('status'=> $data->status);
				}
				foreach ($status as $key => $value) {
					if($value['status']=="active"){
						return true;
					}
					else return false;
				}
			}
		}
	}
	function get_follower_id($userid)
	{
		require("connection.php");
		$followerids=array();
		$sql="SELECT FollowerID from following WHERE UserID='$userid'";
		$res=mysqli_query($db,$sql);
		if(!$res)
		{
			echo "error!";
		}
		else
		{
			if(mysqli_num_rows($res))
			{
				while($data=mysqli_fetch_object($res))
				{
					$followerids[]=array('FollowerID'=> $data->FollowerID);
				}
			}
			return $followerids;
		}
	}

	function get_info($userid)
	{
		require("connection.php");
		$everything=array();
		$sql="SELECT Username,status from users where UserID='$userid'";
		$res=mysqli_query($db,$sql);
		if(!$res)
		{
			echo "error";
		}
		else
		{
			if(mysqli_num_rows($res))
			{
				while($data=mysqli_fetch_object($res))
				{
					$everything[]= array('Username' => $data->Username, 'status'=> $data->status );
				}
				
			}
			return $everything;
		}
	}

	function get_list($listid)
	{
		require("connection.php");
		$everything=array();
		$sql="SELECT ListURL,UserID from lists where ListID='$listid'";
		$res=mysqli_query($db,$sql);
		if(!$res)
		{
			echo "error";
		}
		else
		{
			if(mysqli_num_rows($res))
			{
				while($data=mysqli_fetch_object($res))
				{
					$everything[]= array('ListURL' => $data->ListURL, 'UserID'=> $data->UserID );
				}
				
			}
			return $everything;
		}

	}
	/*
	function jugad($listid)
	{
		require("connection.php");
		$status=array();
		$userid=$_SESSION['UserID'];
		$sql="SELECT likeness from likes where UserID='$userid' and ListID='$listid'";
		$result=mysqli_query($db,$sql);
		if(!$result)
		{
			echo "error";
		}
		else
		{
			if(mysqli_num_rows($result))
			{
				while($data=mysqli_fetch_object($result))
				{
					$status[]= array('likeness' => $data->likeness );
				}
				if(count($status))
				{
					foreach ($status as $key => $value) {
						return $value['likeness'];
					}
				}
				else
				{
					echo "there is no match";
				}
			}
		}
		
	}
*/
?>