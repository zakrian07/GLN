<!DOCTYPE html>
<html>
<title>Game Loot</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="basic.css">
<link rel="stylesheet" href="loot_hub.css">
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<?php
 $id=$_GET['id'];
 
 if(!isset($id))
 {
	 echo ("<SCRIPT LANGUAGE='JavaScript'>
   			 			window.alert('There is issue with your user account please contact support for more details')
   						 </SCRIPT>");
						  die(); 
 }
 $fdata = "";
 $fdata .= "LIVE=Y";
 $fdata .= "&APIACTION=PROFILE";
 $fdata .= "&DATATYPE=XML";
 $fdata .= "&CL=gln&LC=30803&API=JDw82knf39iw7&ID=$id";			
$fname="gameloot";
$lname="user";		
$output_profile=update_data_profile($fdata);
function  update_data_profile($data)
{
	
	

	 $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://secure4.office2office.com/designcenter/api/imx_api_call.asp");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));

    curl_setopt($ch, CURLOPT_POST, true); 

    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    $outputXMLString = curl_exec($ch);
    //$output = new SimpleXMLElement($outputXMLString);
    $outputXML = simplexml_load_string($outputXMLString);
    $outputJsonArray = json_encode($outputXML);
    $output = json_decode($outputJsonArray,TRUE);


	if(isset($output['ERROR1']))
	{
			return false;
			
				/*print_r($data);
			print_r($output);
			die('profile update');*/
	}		
	else
	{
			return $output;
		
		/*	print_r($output);
			die('profile not update');*/
		
	}
	
	//echo  $outputJsonArray;
     curl_close($ch);

}

if($output_profile && isset($output_profile['ALL_FNAME1']))
	  $fname=$output_profile['ALL_FNAME1'];
	  else
	 $fname="gameloot";
	  if($output_profile && isset($output_profile['ALL_LNAME1']))
	  $lname=$output_profile['ALL_LNAME1'];
	  else
	  $lname="user";
	  
	  
	  
	 /* print_r($output_profile);
	  die();*/
	
	  if(isset($output_profile['SHP_NM1_1']) && is_array($lname)):
	 
	  $name_parts=explode(",",$output_profile['SHP_NM1_1']);
	  if(is_array($name_parts))
	  {
		
	  	$fname=$name_parts[0];
	  	$lname=$name_parts[1];
	  }
	  else
	  {
	  	
	  	$lname="user";
	  }
	endif;   

	if(is_array($lname))
	  $lname="user";

switch($output_profile['ALL_RNK'])
		{
			case 1:
			$rank ="f";
			break;
			case 2:
			$rank ="f";
			break;
			case 3:
			$rank ="f";
			break;
			case 4:
			$rank ="p";
			break;
			case 5:
			$rank ="a";
			break;
			case 6:
			$rank ="a";
			break;
			case 7:
			$rank ="a";
			break;
			case 8:
			$rank ="a";
			break;
			case 9:
			$rank ="a";
			break;
			case 10:
			$rank ="a";
			break;
			case 11:
			$rank ="a";
			break;case 12:
			$rank ="a";		
			default:
			$rank ="f";			
			
		}
$imatrix_id=$output_profile['ALL_ID'];
$fname=$fname;
$lname=$lname;
$user_type=$output_profile['STS_NM'];
$email=$output_profile['ALL_EML'];
$username=$output_profile['DSM_UID2'];
$password=$output_profile['ALL_PWD'];
//$order_status=$user_order_status;
$sponsor_username=$output_profile['SPN_UID2'];
$sponsor_id=$output_profile['DSM_SPN_RCN'];
$sponsor_email=$output_profile['SPN_EML_ADR'];
$sponsor_name=$output_profile['SPN_NM'];
$rank=$rank;
$ALL_SSN=$output_profile['ALL_SSN'];
$ALL_COU=$output_profile['ALL_COU'];
$ALL_ADR1=$output_profile['ALL_ADR1'];
$ALL_ADR2=$output_profile['ALL_ADR2'];
$ALL_CITY=$output_profile['ALL_CITY'];
$ALL_STATE=$output_profile['ALL_STATE'];
$ALL_ZIP=$output_profile['ALL_ZIP'];
$ALL_PHN1=$output_profile['ALL_PHN1'];
$sponsor_id=$output_profile['DSM_SPN_RCN'];
if(!$ALL_SSN)
$ALL_SSN="";
if(!$ALL_ADR2)
$ALL_ADR2="";
if(!$ALL_ADR1)
$ALL_ADR1="";

//print_r($ALL_SSN);

/*echo $ALL_ZIP;
die();*/
//die();
?>
<body background="background.png">   
    <div id="screen1">
    	<div class="w3-container w3-card-2 header1">
	  		<div class="w3-left">
	  			<a class="back_event" data-username="<?php echo $username ;?>" style="cursor:pointer;"><img src="backicon.png" class="w3-image" style="margin-top: 25px;" alt="back" ></a>
	 		 </div>	
	 		 <div class="w3-center">
	  			<h2 style="color:white;">Upgrades</h2>
	  		</div>
	  		<div class="w3-right">
	  		</div>	
		</div>
	    <div class="w3-container" id="head2">
      	  <div class="w3-left">
        	 <h4 style="color:white;">User Name</h4>
         	 <h4 style="color:white;"><?php echo $username ;?></h4>
      	 </div>    
    	 <div class="w3-right">
        	<h4 style="color:white;">ID</h4>
         	<h4 style="color:white;"><?php echo $imatrix_id ;?></h4>
      	</div>
    </div> 
   			 <div class="w3-container">
    	<!--<p><div class="w3-row ">
				<div class="w3-col l6 s6 m6">
			    	<div class="alert alert-success w3-left">
			    		<strong>Success!</strong> This alert box indicates a successful or positive action.
			    	</div>
			    </div>
			</div></p>-->
		<!--<p><div class="w3-row ">
				<div class="w3-col l6 s6 m6">	    	
			    	<div class="alert alert-danger w3-left">
			    		<strong>Danger!</strong> This alert box indicates a negative action.
			    	</div>
			    </div>
			</div></p>-->    	
	</div>
			<div class="w3-container"> 
             
    <form id="p2sboxstep1" method="post" role="form">
    		<div class="w3-container">
		<h2 class="w3-center" id="heading2">Choose A Membership Package</h2> 
		<div class="w3-row header2">
		  <h1 id="h1">premium gamer</h1>
		  <img src="logo.png" class="w3-image logo"  alt="bird" >
		</div>
		
			<div class="w3-row pg">
				<div class="w3-col m5 s6 l3">
					<h2 class="w3-center" style="color:#9d9ea1;text-transform:uppercase;">starting at</h2>
					<b  class="dollar">$10</b>
					<label>
					    <input type="radio" name="gamer_selection" id="gamer_selection" value="premium_gamer">
					    <img src="grey_circle.png" id="img" class="w3-image" alt="Grey_circle" >
					</label>
				</div>
				<div class="w3-col m7 s6 l9">
					<ul type="none">
					   <li>Play for fun.</li>
					   <li>Invite your friends to play head-to-head.</li>
					   <li>Earn virtual Game Loot<sup>TM</sup> tokens.</li>
					   <li>Win prizes at our <b>"gamified"</b> rewards center.</li>
					   <li>Earn 2 levels of referral commissions</li>
					   <li>Upgrade at any time</li>
					</ul>
				</div>
			</div>
			<div class="w3-row header3">
		  <h1 id="h1">game ambassador</h1>
		  <img src="logo.png" class="w3-image logo"  alt="bird" >
		</div>
		
			<div class="w3-row pg">
				<div class="w3-col m5 s6 l3">
					<h2 class="w3-center" style="color:#9d9ea1;text-transform:uppercase;">starting at</h2>
					<b  class="dollar">$100</b>
					<label>
					    <input checked type="radio" name="gamer_selection" id="gamer_selection" value="ambassador">
					    <img src="grey_circle.png" id="img" class="w3-image" alt="Grey_circle" >
					</label>
				</div>
				<div class="w3-col m7 s6 l9">
					<ul type="none">
					   <li>Play for fun.</li>
					   <li>Invite your friends to play head-to-head.</li>
					    <li>Earn virtual Game Loot<sup>TM</sup> tokens.</li>
					    <li>Win prizes at our <b>"gamified"</b> rewards center.</li>
					   <li>Eligible to earn up to 10 levels of referral commissions AND deeper.</li>
					   <li>Eligible to earn Fast Start Bonuses.</li>
					   <li>Eligible to earn up to Infinity Coded Bonuses</li>
					   <li>Eligible to earn 20% Matching Bonuses</li>
					   <li>Eligible to qualify for Worldwide Revenue</li>
					</ul>
				</div>
			</div>
		</div>
        <div class="w3-container w3-center">
	  		<a style="cursor:pointer;" class="back_click_1_to_1" > <img src="back.png" id="button" alt="back"></a>

	  		<a class="step1_click" style="cursor:pointer;"> <img src="next.png" id="button" alt="next"></a>
	  	</div>
				 
        </form> 
    </div>
</div>

    <div id="screen2" style="display:none;">
 
		<div class="w3-container w3-card-2 header1">
	  		<div class="w3-left">
	  			<a class="back_event" data-username="<?php echo $username ;?>" style="cursor:pointer;"><img src="backicon.png" class="w3-image" style="margin-top: 25px;" alt="back" ></a>
	 		 </div>	
	 		 <div class="w3-center">
	  			<h2 style="color:white;">Upgrades</h2>
	  		</div>
	  		<div class="w3-right">
	  		</div>	
		</div>
	    <!--<div class="w3-container" id="head2">
      	  <div class="w3-left">
        	 <h4 style="color:white;">User Name</h4>
         	 <h4 style="color:white;"><?php echo $username ;?></h4>
      	 </div>    
    	 <div class="w3-right">
        	<h4 style="color:white;">ID</h4>
         	<h4 style="color:white;"><?php echo $imatrix_id ;?></h4>
      	</div>
    </div>--> 
    
		<h3 class="w3-center">
				Choose A Fun Pack Below
			</h3>	
		
        <form id="step2_form" method="post">
        
          <div id="amb_package" style="display:none;">
          	<div class="w3-row">
	  		<div class="w3-container w3-center">
	  			<img src="pack1.png"  class="w3-image im"  alt="pack1" >
	  			<h3 id="fun500">FUN PACK 500</h3>
	  			<div id="pack1data">
	  				<p><b>$100</b><br>
	  				PLUS $50 a month <br>
	  				Included 500 GameLoot<sup>TM</sup> tokens PLUS 250 tokens a month</p>	
	  			</div>
	  			<div id="pack1lower">
	  				<p style="color:white;">Qualified as a</p>
	  				<h1 style="color:#0898d1;" id="gm">GAME AMBASSADOR</h1>
                    <label>
                        <input checked class="validate[minCheckbox[1]]" type="radio" name="fun_pack_amb" value="500">
                        <img src="grey_circle.png" class="w3-image" alt="cirle" >
                    </label>
	  			</div>	
	  		</div>
	  	</div>
	  		<div class="w3-row">	
	  		<div class="w3-container w3-center">
	  			<img src="pack2.png" class="w3-image im" id="i" alt="pack2" >
	  			<h3 id="fun1250">FUN PACK 1250</h3>
	  			<div id="pack2data">
	  				<p><b>$250</b><br>
	  				PLUS $50 a month <br>
	  				Included 1250 GameLoot<sup>TM</sup> tokens PLUS 250 tokens a month</p>	
	  			</div>
	  			<div id="pack2lower">
	  				<p style="color:white;">Qualified as a</p>
	  				<h1 style="color:#0898d1;" id="gm">GAME AMBASSADOR</h1>
	  				<label>
                        <input class="validate[minCheckbox[1]]" type="radio" name="fun_pack_amb" value="1250">
                        <img src="grey_circle.png" class="w3-image" alt="cirle" >
                    </label>
	  			</div>	
	  		</div>
	  	</div>
	  		<div class="w3-row">
	  		<div class="w3-container w3-center">
	  			<img src="pack3.png" class="w3-image im" id="i" alt="pack3" >
	  			<h3 id="fun2500">FUN PACK 2500</h3>
	  			<div id="pack3data">
	  				<p><b>$500</b><br>
	  				PLUS $50 a month <br>
	  				Included 2500 GameLoot<sup>TM</sup> tokens PLUS 250 tokens a month</p>	
	  			</div>
	  			<div id="pack3lower">
	  				<p style="color:#949598;">Qualified as a</p>
	  				<h1 style="color:#0898d1;" id="gm">GAME AMBASSADOR</h1>
	  				<label>
                        <input type="radio" name="fun_pack_amb" value="2500" class="validate[minCheckbox[1]]">
                        <img src="grey_circle.png" class="w3-image" alt="cirle" >
                    </label>
	  			</div>	
	  		</div>
          </div>  
    
          </div>
               
               <div id="premium_gamer_package" style="display:none;">
          			<div class="w3-row">
	  		<div class="w3-container w3-center">
	  			<img src="pack1.png"  class="w3-image im"  alt="pack1" >
	  			<h3 id="fun500">FUN PACK 50</h3>
	  			<div id="pack1data">
	  				<p><b>$10</b><br>
	  				PLUS $50 a month <br>
	  				Included 50 GameLoot<sup>TM</sup> tokens PLUS 250 tokens a month</p>	
	  			</div>
	  			<div id="pack1lower">
	  				<p style="color:white;">Qualified as a</p>
	  				<h1 style="color:#0898d1;" id="gm">Premium Gamer</h1>
                    <label>
                        <input checked="checked" type="radio" name="fun_pack_pre" value="50" class="validate[minCheckbox[1]]">
                        <img src="grey_circle.png" class="w3-image" alt="cirle" >
                    </label>
	  			</div>	
	  		</div>
	  	</div>
	  				<div class="w3-row">	
	  		<div class="w3-container w3-center">
	  			<img src="pack2.png" class="w3-image im" id="i" alt="pack2" >
	  			<h3 id="fun1250">FUN PACK 250</h3>
	  			<div id="pack2data">
	  				<p><b>$50</b><br>
	  				PLUS $10 a month <br>
	  				Included 250 GameLoot<sup>TM</sup> tokens PLUS 250 tokens a month</p>	
	  			</div>
	  			<div id="pack2lower">
	  				<p style="color:white;">Qualified as a</p>
	  				<h1 style="color:#0898d1;" id="gm">Premium Gamer</h1>
	  				<label>
                        <input type="radio" name="fun_pack_pre" value="250" class="validate[minCheckbox[1]]">
                        <img src="grey_circle.png" class="w3-image" alt="cirle" >
                    </label>
	  			</div>	
	  		</div>
	  	</div>
	  		   </div>
               
           </form> 
            
		 <div class="w3-container w3-center">
	  		<a class="back_click_2_to_1" style="cursor:pointer;" > <img src="back.png" id="button" alt="back"></a></a>

	  		<a class="step2_click" style="cursor:pointer;"> <img src="next.png" id="button" alt="next"></a></a>
	  	</div>				
	</div>  
    
    
    <div id="screen3" style="display:none;">
    <div class="w3-container w3-card-2 header1">
	  <div class="w3-left">
	  	<a class="back_event" data-username="<?php echo $username ;?>" style="cursor:pointer;"><img src="backicon.png" class="w3-image" style="margin-top: 25px;" alt="back" ></a>
	  </div>	
	  <div class="w3-center">
	  	<h2 style="color:white;">Upgrades</h2>
	  </div>
	  <div class="w3-right">

	  </div>	
	</div>
	<div class="w3-container" id="h2">
        
         <div class="w3-left">
        	 <h4 style="color:white;">User Name</h4>
         	 <h4 style="color:white;"><?php echo $username ;?></h4>
      	 </div>    
    	 <div class="w3-right">
        	<h4 style="color:white;">ID</h4>
         	<h4 style="color:white;"><?php echo $imatrix_id ;?></h4>
      	</div>
        
    </div> 
    <!--<div class="w3-container">
    	<p><div class="w3-row ">
				<div class="w3-col l6 s6 m6">
			    	<div class="alert alert-success w3-left">
			    		<strong>Success!</strong> This alert box indicates a successful or positive action.
			    	</div>
			    </div>
			</div></p>
		<p><div class="w3-row ">
				<div class="w3-col l6 s6 m6">	    	
			    	<div class="alert alert-danger w3-left">
			    		<strong>Danger!</strong> This alert box indicates a negative action.
			    	</div>
			    </div>
			</div></p>    	
	</div>-->

	<div class="w3-container">
		<h3 class="w3-left">Member Information</h3>
	</div>	
	<form id="form3_post" class="w3-container">
    <input type="hidden" name="method" value="upgradeMembership">
      <input type="hidden" name="imatrix_member_id" value="<?php echo $id; ;?>">
         <input type="hidden" id="type_gamer" name="type" value="">
           <input type="hidden" id="fun_pack_selector" name="fun_pack" value="">
         
      
      
    
			<p><div class="w3-row ">
				<div class="w3-col l6 s6 m6">
					<select  id="setpFourMailingCountry" class="w3-input w3-border w3-round-medium validate[required]" name="ship_country">
                            <option <?php if($ALL_COU=="USA"):?> selected <?php endif;?> value="USA" selected="selected">UNITED STATES</option>
                            <option <?php if($ALL_COU=="AU"):?> selected <?php endif;?> value="AU">AUSTRALIA</option>
                            <option <?php if($ALL_COU=="BS"):?> selected <?php endif;?> value="BS">BAHAMAS</option>
                            <option <?php if($ALL_COU=="CA"):?> selected <?php endif;?> value="CA">CANADA</option>
                            <option <?php if($ALL_COU=="MX"):?> selected <?php endif;?> value="MX">MEXICO</option>
                            <option <?php if($ALL_COU=="NZ"):?> selected <?php endif;?> value="NZ">NEW ZEALAND</option>
                            <option <?php if($ALL_COU=="GB"):?> selected <?php endif;?> value="GB">UNITED KINGDOM</option>
							 <option <?php if($ALL_COU=="IN"):?> selected <?php endif;?> value="IN">INDIA</option>
							  <option <?php if($ALL_COU=="PH"):?> selected <?php endif;?> value="PH">PHILIPPINES</option>
							 
                        </select>
				</div>	
			</div></p>
			<p>	
			<div class="w3-row ">
				<div class="w3-col l5 s5 m6">
					<input <?php if(isset($fname)):?>value="<?php echo $fname ;?>" <?php endif;?> class="w3-input w3-border w3-round-medium validate[required]" name="first_name" type="text" placeholder="First Name">
				</div>
				
				<div class="w3-col l5 s5 m6">
					<input <?php if(isset($lname)):?>value="<?php echo $lname ;?>" <?php endif;?> class="w3-input w3-border w3-round-medium validate[required]" name="last_name" type="text" style="margin-left: 20px;" placeholder="Last Name">
				</div>	
			</div></p>
			<p><div class="w3-row ">
				<div class="w3-col l6 s6 m6">
					<input <?php if(isset($company)):?>value="<?php echo $company ;?>" <?php endif;?> class="w3-input w3-border w3-round-medium" name="company" type="text" placeholder="Company">
				</div>
			</div></p>
			<p class="w3-left w3-margin-0">
			<div class="w3-row ">
				<div class="w3-col l6">
					Commission checks will be made payable to your Company<br>
					if you enter a Company Name.
			</div>
			</div></p>
			<p>	
			<div id="ssn_id_checker" class="w3-row ">
				<div class="w3-col l5 s5 m6">
					<input <?php if(isset($ALL_SSN)):?>value="<?php echo $ALL_SSN ;?>" <?php endif;?> class="w3-input w3-border w3-round-medium" name="id" type="text" placeholder="SSN or Tax ID #">
				</div>
				
				<div class="w3-col l5 s5 m6">
					<input <?php if(isset($ALL_SSN)):?>value="<?php echo $ALL_SSN ;?>" <?php endif;?> class="w3-input w3-border w3-round-medium" name="id2" type="text" style="margin-left: 20px;" placeholder="Re-Type SSN">
				</div>	
			</div></p>

			<h3>Address</h3>
			<p>	
			<div class="w3-row ">
				<div class="w3-col l5 s5 m6">
					<input <?php if(isset($ALL_ADR1)):?>value="<?php echo $ALL_ADR1 ;?>" <?php endif;?> class="w3-input w3-border w3-round-medium validate[required]" name="ship_street_address" type="text" placeholder="Street Address">
				</div>
				
				<div class="w3-col l5 s5 m6">
					<input <?php if(isset($ALL_ADR2)):?>value="<?php echo $ALL_ADR2 ;?>" <?php endif;?> class="w3-input w3-border w3-round-medium validate[required]" name="ship_street_address2" type="text" style="margin-left: 20px;" placeholder="Street Address 2">
				</div>	
			</div></p>
				
			<div class="w3-row alert_text w3-padding-medium">
				<p>
					<b>IMPORTANT:</b> If you live in a city with an abbreviation as part of the name like words "MT" or "FT" please completely spell out the words "Mount" or "Fort" or any similar word
				</p>
			</div>

			<p>	
			<div class="w3-row ">
				<div class="w3-col l5 s5 m6">
					<input <?php if(isset($ALL_CITY)):?>value="<?php echo $ALL_CITY;?>" <?php endif;?> class="w3-input w3-border w3-round-medium validate[required]" name="ship_city" type="text" placeholder="City">
				</div>
				
				<div class="w3-col l5 s5 m6">
					<input <?php if(isset($ALL_ZIP)):?>value="<?php echo $ALL_ZIP ;?>" <?php endif;?> class="w3-input w3-border w3-round-medium validate[required]" name="ship_zip" type="text" style="margin-left: 20px;" placeholder="Zip">
				</div>	
			</div></p>
			<p><div class="w3-row ">
				<div class="w3-col l6 s6 m6">
					<select name="ship_state" class="w3-input w3-border w3-round-medium validate[required]">
                            <option <?php if($ALL_STATE=="AA"):?> selected <?php endif;?> value="AA">ARMED FORCES AMERICA</option>
                            <option <?php if($ALL_STATE=="AE"):?> selected <?php endif;?> value="AE">ARMED FORCES EUROPE</option>
                            <option <?php if($ALL_STATE=="AK"):?> selected <?php endif;?> value="AK">ALASKA</option>
                            <option <?php if($ALL_STATE=="AL"):?> selected <?php endif;?> value="AL">ALABAMA</option>
                            <option <?php if($ALL_STATE=="AP"):?> selected <?php endif;?> value="AP">ARMED FORCES PACIFIC</option>
                            <option <?php if($ALL_STATE=="AR"):?> selected <?php endif;?> value="AR">ARKANSAS</option>
                            <option <?php if($ALL_STATE=="AZ"):?> selected <?php endif;?> value="AZ">ARIZONA</option>
                            <option <?php if($ALL_STATE=="CA"):?> selected <?php endif;?> value="CA">CALIFORNIA</option>
                            <option <?php if($ALL_STATE=="CO"):?> selected <?php endif;?> value="CO">COLORADO</option>
                            <option <?php if($ALL_STATE=="CT"):?> selected <?php endif;?> value="CT">CONNECTICUT</option>
                            <option <?php if($ALL_STATE=="DC"):?> selected <?php endif;?> value="DC">DISTRICT OF COLUMBIA</option>
                            <option <?php if($ALL_STATE=="DE"):?> selected <?php endif;?> value="DE">DELAWARE</option>
                            <option <?php if($ALL_STATE=="FL"):?> selected <?php endif;?> value="FL">FLORIDA</option>
                            <option <?php if($ALL_STATE=="GA"):?> selected <?php endif;?> value="GA">GEORGIA</option>
                            <option  <?php if($ALL_STATE=="GU"):?> selected <?php endif;?>value="GU">GUAM</option>
                            <option <?php if($ALL_STATE=="HI"):?> selected <?php endif;?> value="HI">HAWAII</option>
                            <option <?php if($ALL_STATE=="IA"):?> selected <?php endif;?> value="IA">IOWA</option>
                            <option <?php if($ALL_STATE=="ID"):?> selected <?php endif;?> value="ID">IDAHO</option>
                            <option <?php if($ALL_STATE=="IL"):?> selected <?php endif;?> value="IL">ILLINOIS</option>
                            <option <?php if($ALL_STATE=="IN"):?> selected <?php endif;?> value="IN">INDIANA</option>
                            <option <?php if($ALL_STATE=="KS"):?> selected <?php endif;?> value="KS">KANSAS</option>
                            <option <?php if($ALL_STATE=="KY"):?> selected <?php endif;?> value="KY">KENTUCKY</option>
                            <option <?php if($ALL_STATE=="LA"):?> selected <?php endif;?> value="LA">LOUISIANA</option>
                            <option <?php if($ALL_STATE=="MA"):?> selected <?php endif;?> value="MA">MASSACHUSETTS</option>
                            <option <?php if($ALL_STATE=="MD"):?> selected <?php endif;?> value="MD">MARYLAND</option>
                            <option <?php if($ALL_STATE=="ME"):?> selected <?php endif;?> value="ME">MAINE</option>
                            <option <?php if($ALL_STATE=="MI"):?> selected <?php endif;?> value="MI">MICHIGAN</option>
                            <option <?php if($ALL_STATE=="MN"):?> selected <?php endif;?> value="MN">MINNESOTA</option>
                            <option <?php if($ALL_STATE=="MO"):?> selected <?php endif;?> value="MO">MISSOURI</option>
                            <option <?php if($ALL_STATE=="MS"):?> selected <?php endif;?> value="MS">MISSISSIPPI</option>
                            <option <?php if($ALL_STATE=="MT"):?> selected <?php endif;?> value="MT">MONTANA</option>
                            <option <?php if($ALL_STATE=="NC"):?> selected <?php endif;?> value="NC">NORTH CAROLINA</option>
                            <option <?php if($ALL_STATE=="ND"):?> selected <?php endif;?> value="ND">NORTH DAKOTA</option>
                            <option <?php if($ALL_STATE=="NE"):?> selected <?php endif;?> value="NE">NEBRASKA</option>
                            <option <?php if($ALL_STATE=="NH"):?> selected <?php endif;?> value="NH">NEW HAMPSHIRE</option>
                            <option <?php if($ALL_STATE=="NJ"):?> selected <?php endif;?> value="NJ">NEW JERSEY</option>
                            <option <?php if($ALL_STATE=="NM"):?> selected <?php endif;?> value="NM">NEW MEXICO</option>
                            <option <?php if($ALL_STATE=="NV"):?> selected <?php endif;?> value="NV">NEVADA</option>
                            <option <?php if($ALL_STATE=="NY"):?> selected <?php endif;?> value="NY">NEW YORK</option>
                            <option <?php if($ALL_STATE=="OH"):?> selected <?php endif;?> value="OH">OHIO</option>
                            <option <?php if($ALL_STATE=="OK"):?> selected <?php endif;?> value="OK">OKLAHOMA</option>
                            <option <?php if($ALL_STATE=="OR"):?> selected <?php endif;?> value="OR">OREGON</option>
                            <option <?php if($ALL_STATE=="PA"):?> selected <?php endif;?> value="PA">PENNSYLVANIA</option>
                            <option <?php if($ALL_STATE=="PR"):?> selected <?php endif;?> value="PR">PUERTO RICO</option>
                            <option <?php if($ALL_STATE=="RI"):?> selected <?php endif;?> value="RI">RHODE ISLAND</option>
                            <option <?php if($ALL_STATE=="SC"):?> selected <?php endif;?> value="SC">SOUTH CAROLINA</option>
                            <option <?php if($ALL_STATE=="SD"):?> selected <?php endif;?> value="SD">SOUTH DAKOTA</option>
                            <option <?php if($ALL_STATE=="TN"):?> selected <?php endif;?> value="TN">TENNESSEE</option>
                            <option <?php if($ALL_STATE=="TX"):?> selected <?php endif;?> value="TX">TEXAS</option>
                            <option <?php if($ALL_STATE=="UT"):?> selected <?php endif;?> value="UT">UTAH</option>
                            <option <?php if($ALL_STATE=="VA"):?> selected <?php endif;?> value="VA">VIRGINIA</option>
                            <option <?php if($ALL_STATE=="VI"):?> selected <?php endif;?> value="VI">VIRGIN ISLANDS</option>
                            <option <?php if($ALL_STATE=="VT"):?> selected <?php endif;?> value="VT">VERMONT</option>
                            <option <?php if($ALL_STATE=="WA"):?> selected <?php endif;?> value="WA">WASHINGTON</option>
                            <option <?php if($ALL_STATE=="WI"):?> selected <?php endif;?> value="WI">WISCONSIN</option>
                            <option <?php if($ALL_STATE=="WV"):?> selected <?php endif;?> value="WV">WEST VIRGINIA</option>
                            <option <?php if($ALL_STATE=="WY"):?> selected <?php endif;?> value="WY">WYOMING</option>
                        </select>
				</div>	
			</div></p>

			<h3>Contract Information</h3>
			<p><div class="w3-row ">
				<div class="w3-col l6 s6 m6">
					<input <?php if(isset($ALL_PHN1)):?>value="<?php echo $ALL_PHN1 ;?>" <?php endif;?> class="w3-input w3-border w3-round-medium validate[required]" name="phone" type="text" placeholder="Phone Number1">
				</div>
			</div></p>

			<h3>Placement Information</h3>
			<p><div class="w3-row ">
				<div class="w3-col l6 s6 m6">
					<input disabled <?php if(isset($sponsor_id)):?>value="<?php echo $sponsor_id ;?>" <?php endif;?> class="w3-input w3-border w3-round-medium validate[required]" name="sponsor_id" type="text" placeholder="Placement Information">
				</div>
			</div></p>

			<h3>Site Information</h3>
			<p>	
			<div class="w3-row ">
				<div class="w3-col l5 s5 m6">
					<input <?php if(isset($username)):?>value="<?php echo $username ;?>" <?php endif;?> disabled class="w3-input w3-border w3-round-medium validate[required]" name="site_name" type="text" placeholder="User/Site Name">
				</div>
				
				<div class="w3-col l5 s5 m6">
					<input <?php if(isset($username)):?>value="<?php echo $username ;?>" <?php endif;?> disabled class="w3-input w3-border w3-round-medium validate[required]" name="site_name2" type="text" style="margin-left: 20px;" placeholder="Re-Type Site Name">
				</div>	
			</div></p>
			<p class="w3-left w3-margin-0">
			<div class="w3-row ">
				<div class="w3-col l6 s6 m6">
					User/Site Name is used for your personal website name.
					For Example:<br>
					sitename would mean that your website URL would be :
					sitename.gamelootnetwork.com
			</div>
			</div></p>
			<h3>Item Selection</h3>
			<p>
			<label>
			    <input checked type="radio" name="funpack_selected" value="250">
			    <img src="grey_circle.png" alt="Grey_circle" >
			   <div id="funpack_selected_text">Text</div>
			</label>
			</p>
			<h3>Monthly Authoship - Get Qualified !</h3>
			<p>
				<label>
			    <input checked type="radio" name="funpack_autoship" value="50">
			    <img src="grey_circle.png" alt="Grey_circle" >
			     <div id="funpack_autoship_text">Fun Pack 50 ($10) </div>
				</label>
			</p>

			<h3>Choose youe method of payment</h3>
			<p>
				<label>
			    <input class="credit_type" checked type="radio" name="payment_method" value="card">
			    <img src="grey_circle.png" alt="Grey_circle" >
			    Credit Card
				</label>
			</p>
			<p>
				<label>
			    <input class="credit_type" type="radio" name="payment_method" value="others">
			    <img src="grey_circle.png" alt="Grey_circle" >
			    Pay with Bank Account /Bank Wire /WesternUnion/ Bitcoin 
				</label>
			</p>
            <div id="show_card">
				<p>
            
            <div class="w3-row ">
				<div class="w3-col l6 s6 m6">
					<input class="w3-input w3-border w3-round-medium validate[required]" name="card_holder_name" type="text" placeholder="Card Holder Name">
				</div>
			</div></p>
				<p><div class="w3-row ">
				<div class="w3-col l6 s6 m6">
					<input class="w3-input w3-border w3-round-medium validate[required,creditCard]" name="card_number" type="text" placeholder="Card Number">
				</div>
			</div></p>
				<p>	
			<div class="w3-row ">
				<div class="w3-col l5 s5 m6">
				<!--	<input class="w3-input w3-border w3-round-medium validate[required] text-input datepicker" name="expiry_month" type="text" placeholder="Expiry Month">-->
                <select id="expiry_month" class="w3-select w3-input w3-border w3-round-medium validate[required]" name="expiry_month">
                			<option  value="" selected>Expiry Month</option>
                            <option  value="01">01</option>
                            <option  value="02">02</option>
                            <option  value="03">03</option>
                            <option  value="04">04</option>
                            <option  value="05">05</option>
                            <option  value="06">06</option>
                            <option  value="07">07</option>
                            <option  value="08">08</option>
                            <option  value="09">09</option>
                            <option  value="10">10</option>
                            <option  value="11">11</option>
                            <option  value="12">12</option>
							 
                        </select>
				</div>
				
				<div class="w3-col l5 s5 m6">
					<!--<input class="w3-input w3-border w3-round-medium validate[required] text-input datepicker" name="expiry_year" type="text" style="margin-left: 20px;" placeholder="Expiry Year">-->
                      <select  id="expiry_month"  class="w3-select w3-input w3-border w3-round-medium validate[required]" name="expiry_month" style="margin-left:18px;">
                      <option  value="" selected>Expiry Year</option>
                            <option  value="2015">2015</option>
                            <option  value="2016" >2016</option>
                            <option  value="2017" >2017</option>
                            <option  value="2018">2018</option>
                            <option  value="2019">2019</option>
                            <option  value="2020">2020</option>
                            <option  value="2021">2021</option>
                            <option  value="2022">2022</option>
                            <option  value="2023">2023</option>
                            <option  value="2024">2024</option>
                            <option  value="2025">2025</option>
                            <option  value="2026">2026</option>
							 
                        </select>
				</div>	
			</div></p>
				<p><div class="w3-row ">
				<div class="w3-col l6 s6 m6">
					<input class="w3-input w3-border w3-round-medium validate[required,condRequired[creditcard]]" name="card_ccv_digits" type="text" placeholder="Card CCV">
				</div>
			</div></p>
            </div>
			<!--<div class="w3-center">
			<button class="w3-btn w3-round-large" style="background-color:#263a63;font-weight:bold;">SUBMIT</button>
			</div>-->
            <div align="center" id="loading" style="display:none;"><img src="ajax-loader.gif"></div>
			<div id="last_screen" class="w3-center">
		  		<a class="back_click_3_to_2" style="cursor:pointer;"> <img src="back.png" id="button" alt="back"></a></a>

		  		<a class="step3_click" style="cursor:pointer;"> <img src="next.png" id="button" alt="next"></a></a>
	  		</div>	
		</form>
        
    </div>
    	  				
       
    
    	<script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

		<!--[if lt IE 9]>
				<script src="js/respond.min.js"></script>
		<![endif]-->

		<script src="js/tmm_form_wizard_custom.js"></script>  
        <script>
			$( document ).ready(function() {
				
				
				function save(q, e){
			var url_local="http://localhost/fun-hub/functions/api/page.php";
			var url_live="https://gamelootnetwork.com/loot_hub/functions/api/page.php";
			if (document.location.hostname == "localhost")
			url=url_local;
			else
			url=url_live;
            $.post(url, q, function(d){
                e(d);
            }, 'json');
       }
				console.log('ready');
		d1=$("#screen1");
		d2=$("#screen2");
		d3=$("#screen3");
		;
		 
		 f1=$("#p2sboxstep1");
		 f2=$("#step2_form");
		 f3=$("#form3_post");
	
		 
	li1 = f1.find('.step1_click');
	li2 = f2.find('.step2_click');
	li3 = f3.find('.step3_click');

	
	b_c_3_to_2=d3.find('.back_click_3_to_2');
	b_c_2_to_1=d2.find('.back_click_2_to_1');
	

		
		 b_c_3_to_2.click(function(){
            d3.hide();
			d2.show();
		
        });
		
		
		 b_c_2_to_1.click(function(){
            d2.hide();
			d1.show();
			$('#premium_gamer_package').hide();
			 $('#amb_package').hide();
	
        });
			
	
		 $('.step1_click').click(function(){
			 
			 console.log('amb',$('input[name=gamer_selection]:checked', '#p2sboxstep1').val());
			 console.log('screen 1');
			 
			 var gamer_type=$('input[name=gamer_selection]:checked', '#p2sboxstep1').val();
			 if(gamer_type=="premium_gamer")
			$('#premium_gamer_package').show();
			 
			 
			 
			  if(gamer_type=="ambassador")
			  	 $('#amb_package').show();
					//$('#step1').hide();
					//$('#step2').show();
				f1.find('#gamer').val();
					d1.hide();
					d2.show();	
					
			
			
        });
		 $('.step2_click').click(function(){
			 console.log('screen 3');
					//$('#step1').hide();
					
					 f2.submit();
					//$('#step2').show()
			
        });
		
		f2.validationEngine('attach', {
            onValidationComplete:function(fr, status){
                if(!status)return false;
                var q = f2.serializeArray();
				
				 var gamer_type_text=$('input[name=gamer_selection]:checked', '#p2sboxstep1').val();
				 console.log('gamer_type_text',gamer_type_text);
				  if(gamer_type_text=="premium_gamer")
				  {
				  	monthlyautoship="The Fun Pack 50 ($10)";
					gmt="pre";
					 fun_pack=$('input[name=fun_pack_pre]:checked', '#step2_form').val();
				  }
				  
				  if(gamer_type_text=="ambassador")
				  {
				 	 monthlyautoship="The Fun Pack 250 ($50.00)";
					 gmt="amb";
					 fun_pack=$('input[name=fun_pack_amb]:checked', '#step2_form').val();
				  }
				  console.log('fun_pack',fun_pack);
				 switch (fun_pack) {
					case "50":
						var selection_text ="Fun Pack 50 ($10)";
						var code=109;
						break;
					case "250":
						 var selection_text = "Fun Pack 250 ($50)";
						 var code=111;
						break;
					case "500":
						 var selection_text = "Fun Pack 500 ($100)";
						 var code=112;
						break;
					case "1250":
						 var selection_text = "Fun Pack 1250 ($250)";
						 var code=104;
						break;
					case "2500":
						 var selection_text = "Fun Pack 2500 ($500)";
						 var code=105;
						break;
				} 
				 console.log('texttt',selection_text);
				 d3.find('#funpack_autoship_text').text(monthlyautoship);
				  d3.find('#funpack_selected_text').text(selection_text);
				  
				   d3.find('#fun_pack_selector').val(code);
				    d3.find('#type_gamer').val(gmt);
				 
				 console.log('fun_pack',fun_pack);
					d2.hide();
					d3.show();
				
				
				
				
				
            }
        });
		
		$('.back_event').click(function(){
            username=$(this).data('username');
			
			console.log('user_name',username);
			q={ method: "generateDeepLinks", user_name:username,gln_game_id:5 };
			 save(q, function(d){
				   console.log('d',d);
				   if(!d.flag)
				   {
					 
						
					    alert(d.message);
						$("#last_screen").show();
						 $("#loading").hide();
				   }
				   else
				   {
					   window.location.replace(d.deep_link);
					   
				   }
					   
                  
				 
                 
                });
			
		
        });
		
		
		$('.step3_click').click(function(){
			
			
			
			 console.log('screen 3 to ajax');
					//$('#step1').hide();
					//$('#step2').show();
				 f3.submit();
					
					
			
			
        });
		
		f3.validationEngine('attach', {
            onValidationComplete:function(fr, status){
                if(!status)return false;
                var q = f3.serializeArray();
				 //$('.step3_click').hide();\
				 $("#last_screen").hide();
				  $("#loading").show();
				 
		   
		   console.log('ajax request');
               save(q, function(d){
				   console.log('d',d);
				   if(!d.flag)
				   {
					   if(d.error_1)
					   mess=d.error_1;
					   if(d.error_2)
					    mess+=" "+d.error_2;
						 if(d.error_3)
					    mess+=" "+d.error_3;
						
					    alert(d.message+" "+mess);
						$("#last_screen").show();
						 $("#loading").hide();
				   }
				   else
				   {
					   alert("Order Proceeded Successfully");
					   location.reload();
					   
				   }
					   
                  
				 
                 
                });
                
                
            }
        });
		d3.find('.credit_type').click(function(){ 
			 var credit_type =$('input[name=payment_method]:checked', '#form3_post').val();
			 if(credit_type=="others")
			 d3.find('#show_card').hide();
			 else
			 d3.find('#show_card').show(); 
        });
			
			$("#setpFourMailingCountry" ).change(function() {
				console.log('changed');
   changeStates(this, 'ship_state', true);
});
		
		
		
		function changeStates(select, stateDropdownName, hideSSN) {
    var country = jQuery(select).val();
    var state = "";
    
    if (hideSSN) {
        if (country === 'USA') {
            jQuery ("#ssn_id_checker input").show();
        } else {
            jQuery ("#ssn_id_checker input").hide();
        }
    }
	console.log('country',country);
    if (country === 'USA') {
        state = '<option value="">Select State</option>'+
					'<option value="AA">ARMED FORCES AMERICA</option>'+
                    '<option value="AE">ARMED FORCES EUROPE</option>'+
                    '<option value="AK">ALASKA</option>'+
                    '<option value="AL">ALABAMA</option>'+
                    '<option value="AP">ARMED FORCES PACIFIC</option>'+
                    '<option value="AR">ARKANSAS</option>'+
                    '<option value="AZ">ARIZONA</option>'+
                    '<option value="CA">CALIFORNIA</option>'+
                    '<option value="CO">COLORADO</option>'+
                    '<option value="CT">CONNECTICUT</option>'+
                    '<option value="DC">DISTRICT OF COLUMBIA</option>'+
                    '<option value="DE">DELAWARE</option>'+
                    '<option value="FL">FLORIDA</option>'+
                    '<option value="GA">GEORGIA</option>'+
                    '<option value="GU">GUAM</option>'+
                    '<option value="HI">HAWAII</option>'+
                    '<option value="IA">IOWA</option>'+
                    '<option value="ID">IDAHO</option>'+
                    '<option value="IL">ILLINOIS</option>'+
                    '<option value="IN">INDIANA</option>'+
                    '<option value="KS">KANSAS</option>'+
                    '<option value="KY">KENTUCKY</option>'+
                    '<option value="LA">LOUISIANA</option>'+
                    '<option value="MA">MASSACHUSETTS</option>'+
                    '<option value="MD">MARYLAND</option>'+
                    '<option value="ME">MAINE</option>'+
                    '<option value="MI">MICHIGAN</option>'+
                    '<option value="MN">MINNESOTA</option>'+
                    '<option value="MO">MISSOURI</option>'+
                    '<option value="MS">MISSISSIPPI</option>'+
                    '<option value="MT">MONTANA</option>'+
                    '<option value="NC">NORTH CAROLINA</option>'+
                    '<option value="ND">NORTH DAKOTA</option>'+
                    '<option value="NE">NEBRASKA</option>'+
                    '<option value="NH">NEW HAMPSHIRE</option>'+
                    '<option value="NJ">NEW JERSEY</option>'+
                    '<option value="NM">NEW MEXICO</option>'+
                    '<option value="NV">NEVADA</option>'+
                    '<option value="NY">NEW YORK</option>'+
                    '<option value="OH">OHIO</option>'+
                    '<option value="OK">OKLAHOMA</option>'+
                    '<option value="OR">OREGON</option>'+
                    '<option value="PA">PENNSYLVANIA</option>'+
                    '<option value="PR">PUERTO RICO</option>'+
                    '<option value="RI">RHODE ISLAND</option>'+
                    '<option value="SC">SOUTH CAROLINA</option>'+
                    '<option value="SD">SOUTH DAKOTA</option>'+
                    '<option value="TN">TENNESSEE</option>'+
                    '<option value="TX">TEXAS</option>'+
                    '<option value="UT">UTAH</option>'+
                    '<option value="VA">VIRGINIA</option>'+
                    '<option value="VI">VIRGIN ISLANDS</option>'+
                    '<option value="VT">VERMONT</option>'+
                    '<option value="WA">WASHINGTON</option>'+
                    '<option value="WI">WISCONSIN</option>'+
                    '<option value="WV">WEST VIRGINIA</option>'+
                    '<option value="WY">WYOMING</option>';
    }
    if (country === 'AU') {
        state = '<option value="">Select State</option>'+
    			'<option value="AC">AUSTRALIAN CAPITAL T</option>'+
                '<option value="AS">ASHMORE AND CARTIER</option>'+
                '<option value="CR">CORAL SEA ISLANDS TE</option>'+
                '<option value="JB">JERVIS BAY TERRITORY</option>'+
                '<option value="NS">NEW SOUTH WALES</option>'+
                '<option value="NT">NORTHERN TERRITORY</option>'+
                '<option value="QL">QUEENSLAND</option>'+
                '<option value="SA">SOUTH AUSTRALIA</option>'+
                '<option value="TS">TASMANIA</option>'+
                '<option value="VI">VICTORIA</option>'+
                '<option value="WA">WESTERN AUSTRALIA</option>';
    }
	
	
		if(country==='IN')
	{
		
		state="<option value='AN'>Andaman and Nicobar</option>"+
"<option value='AP'>Andhra Pradesh</option>"+
"<option value='AR'>Arunachal Pradesh</option>"+
"<option value='AS'>Assam</option>"+
"<option value='BI'>Bihar</option>"+
"<option value='CA'>Chhattisgarh</option>"+
"<option value='DE'>Delhi</option>"+
"<option value='GO'>Goa</option>"+
"<option value='GU'>Gujarat</option>"+
"<option value='HA'>Haryana</option>"+
"<option value='HP'>Himachal Pradesh</option>"+
"<option value='JK'>Jharkhand</option>"+
"<option value='KA'>Jammu and Kashmir</option>"+
"<option value='KE'>Karnataka</option>"+
"<option value='LA'>Kerala</option>"+
"<option value='MA'>Lakshadweep</option>"+
"<option value='ME'>Meghalaya</option>"+
"<option value='MI'>Mizoram</option>"+
"<option value='MN'>Manipur</option>"+
"<option value='MP'>Madhya Pradesh</option>"+
"<option value='NA'>Nagaland</option>"+
"<option value='OR'>Orissa</option>"+
"<option value='PU'>Punjab</option>"+
"<option value='RA'>Rajasthan</option>"+
"<option value='SI'>Sikkim</option>"+
"<option value='TN'>Tamil Nadu</option>"+
"<option value='TR'>Tripura</option>"+
"<option value='UP'>Uttar Pradesh</option>"+
"<option value='UT'>Uttaranchal</option>"+
"<option value='WB'>West Bengal</option>";		
	}
	
	
	
	if(country==='PH')
	{
		
		state="<option value='AB'>Abra</option>"+
	"<option value='AK'>Aklan</option>"+
	"<option value='AL'>Albay</option>"+
	"<option value='AN'>Agusan del Norte</option>"+
	"<option value='AP'>Apayao</option>"+
	"<option value='AQ'>Antique</option>"+
	"<option value='AS'>Agusan del Sur</option>"+
	"<option value='AU'>Aurora</option>"+
	"<option value='BA'>Bataan</option>"+
	"<option value='BG'>Benguet</option>"+
	"<option value='BI'>Biliran</option>"+
	"<option value='BK'>Bukidnon</option>"+
	"<option value='BN'>Batanes</option>"+
	"<option value='BO'>Bohol</option>"+
	"<option value='BS'>Basilan</option>"+
	"<option value='BT'>Batangas</option>"+
	"<option value='BU'>Bulacan</option>"+
	"<option value='CB'>Cebu</option>"+
	"<option value='CG'>Cagayan</option>"+
	"<option value='CL'>Compostela Valley</option>"+
	"<option value='CM'>Camiguin</option>"+
	"<option value='CN'>Camarines Norte</option>"+
	"<option value='CP'>Capiz</option>"+
	"<option value='CS'>Camarines Sur</option>"+
	"<option value='CT'>Catanduanes</option>"+
	"<option value='CV'>Cavite</option>"+
	"<option value='DI'>Dinagat Islands</option>"+
	"<option value='DO'>Davao Oriental</option>"+
	"<option value='DS'>Davao del Sur</option>"+
	"<option value='DV'>Davao del Norte</option>"+
	"<option value='ES'>Eastern Samar</option>"+
	"<option value='GU'>Guimaras</option>"+
	"<option value='IB'>Isabela</option>"+
	"<option value='IF'>Ifugao</option>"+
	"<option value='II'>Iloilo</option>"+
	"<option value='IN'>Ilocos Norte</option>"+
	"<option value='IS'>Ilocos Sur</option>"+
	"<option value='KA'>Kalinga</option>"+
	"<option value='LE'>Leyte</option>"+
	"<option value='LG'>Laguna</option>"+
	"<option value='LN'>Lanao del Norte</option>"+
	"<option value='LS'>Lanao del Sur</option>"+
	"<option value='LU'>La Union</option>"+
	"<option value='MB'>Masbate</option>"+
	"<option value='MC'>Occidental Mindoro</option>"+
	"<option value='MD'>Misamis Occidental</option>"+
	"<option value='MG'>Maguindanao</option>"+
	"<option value='MM'>Metropolitan Manila</option>"+
	"<option value='MN'>Misamis Oriental</option>"+
	"<option value='MQ'>Marinduque</option>"+
	"<option value='MR'>Oriental Mindoro</option>"+
	"<option value='MT'>Mountain</option>"+
	"<option value='NC'>Cotabato</option>"+
	"<option value='ND'>Negros Occidental</option>"+
	"<option value='NE'>Nueva Ecija</option>"+
	"<option value='NR'>Negros Oriental</option>"+
	"<option value='NS'>Northern Samar</option>"+
	"<option value='NV'>Nueva Vizcaya</option>"+
	"<option value='PL'>Palawan</option>"+
	"<option value='PM'>Pampanga</option>"+
	"<option value='PN'>Pangasinan</option>"+
	"<option value='QR'>Quirino</option>"+
	"<option value='QZ'>Quezon</option>"+
	"<option value='RI'>Rizal</option>"+
	"<option value='RO'>Romblon</option>"+
	"<option value='SC'>South Cotabato</option>"+
	"<option value='SG'>Sarangani</option>"+
	"<option value='SK'>Sultan Kudarat</option>"+
	"<option value='SL'>Southern Leyte</option>"+
	"<option value='SM'>Samar</option>"+
	"<option value='SQ'>Siquijor</option>"+
	"<option value='SR'>Sorsogon</option>"+
	"<option value='SS'>Surigao del Sur</option>"+
	"<option value='ST'>Surigao del Norte</option>"+
	"<option value='SU'>Sulu</option>"+
	"<option value='TR'>Tarlac</option>"+
	"<option value='TT'>Tawi-Tawi</option>"+
	"<option value='ZM'>Zambales</option>"+
	"<option value='ZN'>Zamboanga del Norte</option>"+
	"<option value='ZS'>Zamboanga del Sur</option>"+
	"<option value='ZY'>Zamboanga-Sibugay</option>";	
	}
	
	

	
    if (country === 'BS') {
        state = '<option value="">Select State</option>'+
				'<option value="AK">ACKLINS</option>'+
                '<option value="BI">BIMINI</option>'+
                '<option value="BP">BLACK POINT</option>'+
                '<option value="BR">BERRY ISLANDS</option>'+
                '<option value="CB">CENTRAL ABACO</option>'+
                '<option value="CE">CENTRAL ELEUTHERA</option>'+
                '<option value="CI">CAT ISLAND</option>'+
                '<option value="CK">CROOKED ISLAND</option>'+
                '<option value="CN">CENTRAL ANDROS</option>'+
                '<option value="EB">EAST GRAND BAHAMA</option>'+
                '<option value="EM">EXUMA</option>'+
                '<option value="FP">CITY OF FREEPORT</option>'+
                '<option value="GC">GRAND CAY</option>'+
                '<option value="HB">HARBOUR ISLAND</option>'+
                '<option value="HT">HOPE TOWN</option>'+
                '<option value="IN">INAGUA</option>'+
                '<option value="LI">LONG ISLAND</option>'+
                '<option value="MC">MANGROVE CAY</option>'+
                '<option value="MG">MAYAGUANA</option>'+
                '<option value="MI">MOORE\'S ISLAND</option>'+
                '<option value="NB">NORTH ABACO</option>'+
                '<option value="NE">NORTH ELEUTHERA</option>'+
                '<option value="NN">NORTH ANDROS</option>'+
                '<option value="NW">NEW PROVIDENCE</option>'+
                '<option value="RC">RUM CAY</option>'+
                '<option value="RI">RAGGED ISLAND</option>'+
                '<option value="SB">SOUTH ABACO</option>'+
                '<option value="SE">SOUTH ELEUTHERA</option>'+
                '<option value="SN">SOUTH ANDROS</option>'+
                '<option value="SS">SAN SALVADOR</option>'+
                '<option value="SW">SPANISH WELLS</option>'+
                '<option value="WB">WEST GRAND BAHAMA</option>';
    }
    if (country === 'CA') {
        state = '<option value="">Select State</option>'+
				'<option value="AB">ALBERTA</option>'+
                '<option value="BC">BRITISH COLUMBIA</option>'+
                '<option value="MB">MANITOBA</option>'+
                '<option value="NB">NEW BRUNSWICK</option>'+
                '<option value="NF">NEWFOUNDLAND</option>'+
                '<option value="NS">NOVA SCOTIA</option>'+
                '<option value="NT">NORTHWEST TERRITORY</option>'+
                '<option value="NU">NUNAVUT</option>'+
                '<option value="ON">ONTARIO</option>'+
                '<option value="PE">PRINCE EDWARD ISLAND</option>'+
                '<option value="QC">QUEBEC</option>'+
                '<option value="SK">SASKATCHEWAN</option>'+
                '<option value="YT">YUKON TERRITORY</option>';
    }
    if (country === 'MX') {
        state = '<option value="">Select State</option>'+
				'<option value="AC">�GUAS CALIENTES</option>'+
                '<option value="BC">BAJA CALIFORNIA</option>'+
                '<option value="BS">BAJA CA. DEL SUR</option>'+
                '<option value="CA">CHIAPAS</option>'+
                '<option value="CH">CHIHUAHUA</option>'+
                '<option value="CL">COLIMA</option>'+
                '<option value="CO">COAHUILA</option>'+
                '<option value="CP">CAMPECHE</option>'+
                '<option value="DF">DISTRICTO FEDERAL</option>'+
                '<option value="DU">DURANGO</option>'+
                '<option value="GO">GUERRERO</option>'+
                '<option value="GU">GUANAJUATO</option>'+
                '<option value="HD">HIDALGO</option>'+
                '<option value="JA">JALISCO</option>'+
                '<option value="MI">MICHOAC�N</option>'+
                '<option value="MO">MORELOS</option>'+
                '<option value="MX">MEXICO</option>'+
                '<option value="NU">NUEVO LE�N</option>'+
                '<option value="NY">NAYARIT</option>'+
                '<option value="OA">OAXACA</option>'+
                '<option value="PB">PUEBLA</option>'+
                '<option value="QR">QUINTANA ROO</option>'+
                '<option value="QU">QUER�TARO</option>'+
                '<option value="SI">SINALOA</option>'+
                '<option value="SL">SAN LU�S POTOS�</option>'+
                '<option value="SO">SONORA</option>'+
                '<option value="TA">TABASCO</option>'+
                '<option value="TM">TAMAULIPAS</option>'+
                '<option value="TX">TLAXCALA</option>'+
                '<option value="VC">VERA CRUZ</option>'+
                '<option value="YU">YUCAT�N</option>'+
                '<option value="ZA">ZACATECAS</option>';
    }
    if (country === 'NZ') {
        state = '<option value="">Select State</option>'+
				'<option value="AUK">AUKLAND</option>'+
                '<option value="BOP">BAY OF PLENTY</option>'+
                '<option value="CAN">CANTERBURY</option>'+
                '<option value="GIS">GISBORNE</option>'+
                '<option value="HKB">HAWKE\'S BAY</option>'+
                '<option value="MBH">MARLBOROUGH</option>'+
                '<option value="MWT">MANAWATU-WANGANUI</option>'+
                '<option value="NSN">NELSON</option>'+
                '<option value="NTL">NORTHLAND</option>'+
                '<option value="OTA">OTAGO</option>'+
                '<option value="STL">SOUTHLAND</option>'+
                '<option value="TAS">TASMAN</option>'+
                '<option value="TKI">TARANAKI</option>'+
                '<option value="WGN">WELLINGTON</option>'+
                '<option value="WKO">WAIKATO</option>'+
                '<option value="WTC">WEST COAST</option>';
    }
    if (country === 'GB') {
        state = '<option value="">Select State</option>'+
				'<option value="AVN">AVON</option>'+
                '<option value="BDF">BEDFORDSHIRE</option>'+
                '<option value="BKM">BUCKINGHAMSHIRE</option>'+
                '<option value="BRK">BERKSHIRE</option>'+
                '<option value="CAM">CAMBRIDGESHIRE</option>'+
                '<option value="CHS">CHESHIRE</option>'+
                '<option value="CLV">CLEVELAND</option>'+
                '<option value="CMA">CUMBRIA</option>'+
                '<option value="CON">CORNWALL</option>'+
                '<option value="CUL">CUMBERLAND</option>'+
                '<option value="DBY">DERBYSHIRE</option>'+
                '<option value="DEV">DEVON</option>'+
                '<option value="DON">CO. DONEGAL</option>'+
                '<option value="DOR">DORSET</option>'+
                '<option value="DUR">CO. DURHAM</option>'+
                '<option value="ERY">EAST RIDING OF YORK</option>'+
                '<option value="ESS">ESSEX</option>'+
                '<option value="GLS">GLOUCESTERSHIRE</option>'+
                '<option value="GTM">GREATER MANCHESTER</option>'+
                '<option value="HAM">HAMPSHIRE</option>'+
                '<option value="HEF">HEREFORDSHIRE</option>'+
                '<option value="HRT">HERTFORDSHIRE</option>'+
                '<option value="HUM">HUMBERSIDE</option>'+
                '<option value="HUN">HUNTINGDONSHIRE</option>'+
                '<option value="HWR">HEREFORD AT WORC</option>'+
                '<option value="IOW">ISLE OF WIGHT</option>'+
                '<option value="KEN">KENT</option>'+
                '<option value="LAN">LANCASHIRE</option>'+
                '<option value="LEI">LEICESTERSHIRE</option>'+
                '<option value="LIN">LINCOLNSHIRE</option>'+
                '<option value="LND">LONDON</option>'+
                '<option value="MSY">MERSEYSIDE</option>'+
                '<option value="NBL">NORTHUMBERLAND</option>'+
                '<option value="NFK">NORFOLK</option>'+
                '<option value="NRY">NORTH RIDING OF YORK</option>'+
                '<option value="NTH">NORTHAMPTONSHIRE</option>'+
                '<option value="NTT">NOTTINGHAMSHIRE</option>'+
                '<option value="NYK">NORTH YORKSHIRE</option>'+
                '<option value="OXF">OXFORDSHIRE</option>'+
                '<option value="RUT">RUTLAND</option>'+
                '<option value="SAL">SHROPSHIRE</option>'+
                '<option value="SFK">SUFFOLK</option>'+
                '<option value="SOM">SOMERSET</option>'+
                '<option value="SRY">SURREY</option>'+
                '<option value="SSX">SUSSEX</option>'+
                '<option value="SXE">EAST SUSSEX</option>'+
                '<option value="SYK">SOUTH YORKSHIRE</option>'+
                '<option value="TWR">TYNE AND WEAR</option>'+
                '<option value="WAR">WARWICKSHIRE</option>'+
                '<option value="WES">WESTMORLAND</option>'+
                '<option value="WIL">WILTSHIRE</option>'+
                '<option value="WMD">WEST MIDLANDS</option>'+
                '<option value="WOR">WORCESTERSHIRE</option>'+
                '<option value="WRY">WEST RIDING OF YORK</option>'+
                '<option value="WSX">WEST SUSSEX</option>'+
                '<option value="YKS">YORKSHIRE</option>';
    }
    $('select[name="'+stateDropdownName+'"]').html(state);
}

		
		
	});	
		</script>
        
        		
</body>
</html> 
