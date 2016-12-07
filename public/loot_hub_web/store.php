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
<body style="background-color:#71ad19;">   
   

    <div id="screen2">
    
 	<div class="w3-container w3-card-2 header1">
      <div class="w3-left">
        <a class="back_event" data-username="<?php echo $username ;?>" style="cursor:pointer;"><img src="backicon.png" class="w3-image w3-center" style="margin-top: 25px;" alt="back" ></a>
      </div>    
      <div class="w3-center">
        <h2 style="color:white;">Store</h2>
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
    <div class="wrapper">
            <div id="reward">
                <h3 class="w3-center" style="color:#d5e710;">5 Tokens</h3>
                <div class="pic">
                    <img src="tokens1.png" alt="tokens" width="100%" height="100%">
                </div> 
                <p class="w3-center" style="color:white;font-size:25px;font-weight:bold;">$0.99</p>
                <div class="w3-row w3-center"><a style="cursor:pointer;" class="step2_click" data-code="107" id="buy">buy</a></div>  
            </div>
            <div id="reward">
                <h3 class="w3-center" style="color:#d5e710;">25 Tokens</h3>
                <div class="pic">
                    <img src="tokens2.png" alt="tokens" width="100%" height="100%">
                </div> 
                <p class="w3-center" style="color:white;font-size:25px;font-weight:bold;">$4.99</p>
                <div class="w3-row w3-center"><a style="cursor:pointer;" class="step2_click" data-code="108" id="buy">buy</a></div> 
            </div>
            <div id="reward">
                <h3 class="w3-center" style="color:#d5e710;">50 Tokens</h3>
                <div class="pic">
                    <img src="tokens3.png" alt="tokens" width="100%" height="100%">
                </div>
                <p class="w3-center" style="color:white;font-size:25px;font-weight:bold;">$9.99</p>
                <div class="w3-row w3-center"><a style="cursor:pointer;" data-code="109" class="step2_click" id="buy">buy</a></div>  
            </div>
            <div id="reward">
                <h3 class="w3-center" style="color:#d5e710;">100 Tokens</h3>
                <div class="pic">
                    <img src="tokens4.png" alt="tokens" width="100%" height="100%">
                </div> 
                <p class="w3-center" style="color:white;font-size:25px;font-weight:bold;">$19.99</p>
                <div class="w3-row w3-center"><a style="cursor:pointer;" data-code="110" class="step2_click" id="buy">buy</a></div>  
            </div>
            <div id="reward">
                <h3 class="w3-center" style="color:#d5e710;">250 Tokens</h3>
                <div class="pic">
                    <img src="tokens5.png" alt="tokens" width="100%" height="100%">
                </div> 
                <p class="w3-center" style="color:white;font-size:25px;font-weight:bold;">$39.99</p>
                <div class="w3-row w3-center"><a style="cursor:pointer;" data-code="111" class="step2_click" id="buy">buy</a></div> 
            </div>
            <div id="reward">
                <h3 class="w3-center" style="color:#d5e710;">500 Tokens</h3>
                <div class="pic">
                    <img src="tokens6.png" alt="tokens" width="100%" height="100%">
                </div>
                <p class="w3-center" style="color:white;font-size:25px;font-weight:bold;">$99.99</p>
                <div class="w3-row w3-center"><a style="cursor:pointer;" data-code="112" class="step2_click" id="buy">buy</a></div>  
            </div>
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

	<form id="form3_post" class="w3-container">
    <input type="hidden" name="method" value="ShopItems">
      <input type="hidden" name="imatrix_member_id" value="<?php echo $id; ;?>">
           <input type="hidden" id="fun_pack_selector" name="fun_pack" value="">
         	
			<h3>Item Selection</h3>
			<p>
			<label>
			    <input checked type="radio" name="funpack_selected" value="250">
			    <img src="grey_circle.png" alt="Grey_circle" >
			   <div id="funpack_selected_text">Text</div>
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
                <select placeholder="Expiry Month"  id="expiry_month" class="w3-input w3-border w3-round-medium validate[required]" name="expiry_month">
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
                      <select  id="expiry_month" placeholder="Expiry Year" class="w3-input w3-border w3-round-medium validate[required]" name="expiry_month">
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
	
		d2=$("#screen2");
		d3=$("#screen3");
	
		 f2=$("#step2_form");
		 f3=$("#form3_post");
	
		 
	li2 = f2.find('.step2_click');
	li3 = f3.find('.step3_click');

	
	b_c_3_to_2=d3.find('.back_click_3_to_2');
	

		
		 b_c_3_to_2.click(function(){
            d3.hide();
			d2.show();
		
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
		
		
			
		 $('.step2_click').click(function(){
			 
			
				 
				  
				   d3.find('#fun_pack_selector').val($(this).data('code'));
				   fun_pack=$(this).data('code');
				    switch (fun_pack) {
					case 107:
						var selection_text ="5 Game Loot Tokens ($0.99)";
						var code=107;
						break;
					case 108:
						 var selection_text = "25 Game Loot Tokens ($4.99)";
						 var code=108;
						break;
					case 109:
						 var selection_text = "50 Game Loot Tokens ($9.99)";
						 var code=109;
						break;
					case 110:
						 var selection_text = "100 Game Loot Tokens ($19.99)";
						 var code=110;
						break;
					case 111:
						 var selection_text = "250 Game Loot Tokens ($39.99)";
						 var code=111;
						break;
						case 112:
						 var selection_text = "500 Game Loot Tokens ($99.99)";
						 var code=112;
						break;
				} 
				 console.log('texttt',selection_text);
				 console.log('fun_pack',fun_pack);
				  d3.find('#funpack_selected_text').text(selection_text);
				   
				   
				 
				
					d2.hide();
					d3.show();
				
					
			
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
			


		
		
	});	
		</script>
        
        		
</body>
</html> 
