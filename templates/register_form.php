<script type="text/javascript">
//variable filters
var ck_name = /^[A-Za-z0-9 ]{3,20}$/;
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

//on document ready
$(document).ready(function()
{		
    //taken from http://www.phpgenious.com/2009/02/username-availability-chacker-in-ajax-and-php-using-jquery/
    //checks for first name and last name
    $("#lst").blur(function()
	{	
		//remove all the class add the messagebox classes and start fading
		$("#msgbox").removeClass().addClass('messagebox').text('Checking...').fadeIn(1000);
		//check the uname exists or not from ajax
		$.post("check_name.php",{ last:$(this).val(), first:$('#frst').val() } ,function(data)
        {
		  if(data == 0) //if uname not avaiable
		  {
		  	$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('First Name too short').addClass('messageboxerror').fadeTo(900,1);
			});		
          }
          else if (data == 1)
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Last Name too short').addClass('messageboxerror').fadeTo(900,1);	
			});
		  }
		  else
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  
			  //add message and change the class of the box and start fading
			  $(this).html('✓').addClass('messageboxok').fadeTo(900,1);	
			});
		  }				
        }); 
	});
	
    //checks for username availability
    $("#uname").blur(function()
	{	
		//remove all the class add the messagebox classes and start fading
		$("#msgbox2").removeClass().addClass('messagebox').text('Checking...').fadeIn(1000);
		//check the uname exists or not from ajax
		$.post("user_available.php",{ uname:$(this).val() } ,function(data1)
        {
		  if(data1 == 0) //if uname not avaiable
		  {
		  	$("#msgbox2").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  
			  //add message and change the class of the box and start fading
			  $(this).html('Username taken').addClass('messageboxerror').fadeTo(900,1);
			});		
          }
          else if (data1 == 1)
		  {
		  	$("#msgbox2").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  
			  //add message and change the class of the box and start fading
			  $(this).html('Username too short').addClass('messageboxerror').fadeTo(900,1);	
			});
		  }
		  else
		  {
		  	$("#msgbox2").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  
			  //add message and change the class of the box and start fading
			  $(this).html('✓').addClass('messageboxok').fadeTo(900,1);	
			});
		  }				
        }); 
	});
	
	//checks for email available
	$("#email").blur(function()
	{		
		//remove all the class add the messagebox classes and start fading
		$("#msgbox3").removeClass().addClass('messagebox').text('Checking...').fadeIn(1000);
		//check the uname exists or not from ajax
		$.post("email_available.php",{ email:$(this).val() } ,function(data2)
        {
		  if(data2 == 0) //if uname not avaiable
		  {
		  	$("#msgbox3").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  
			  //add message and change the class of the box and start fading
			  $(this).html('An account with this e-mail already exists!').addClass('messageboxerror').fadeTo(900,1);
			});		
          }
		  else if(data2 == 1) //if uname not avaiable
		  {
		  	$("#msgbox3").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  
			  //add message and change the class of the box and start fading
			  $(this).html('Please enter a valid Harvard College e-mail address!').addClass('messageboxerror').fadeTo(900,1);
			});		
          }
		  else
		  {
		  	$("#msgbox3").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  
			  //add message and change the class of the box and start fading
			  $(this).html('✓').addClass('messageboxok').fadeTo(900,1);	
			});
		  }
				
        });
 
	});

	//checks that confirmation matches password
	$("#confirmation").blur(function()
	{		
		//remove all the class add the messagebox classes and start fading
		$("#msgbox4").removeClass().addClass('messagebox').text('Checking...').fadeIn(1000);
		//check the uname exists or not from ajax
		$.post("pass_match.php",{ confirmation:$(this).val(), password:$('#pass').val() } ,function(data3)
        {
		  if(data3 == 0) //if uname not avaiable
		  {
		  	$("#msgbox4").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  
			  //add message and change the class of the box and start fading
			  $(this).html(total_data).addClass('messageboxerror').fadeTo(900,1);
			});		
          }
		  else
		  {
		  	$("#msgbox4").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  
			  //add message and change the class of the box and start fading
			  $(this).html("✓").addClass('messageboxok').fadeTo(900,1);	
			});
		  }				
        });
 
	});
	
});


</script>

<div class="hero-unit">
    <legend style="text-align:left; border-bottom: 1px solid #000000;"> 
        <h2>Are you excited?</h2>
        <p>You're about to become part of the first book exchange at Harvard!</p> 
    </legend>
<form action="register.php" method="post" id= "registerHere">
    <fieldset>
        <div class="span6" style="text-align:left">
            <div class="row">
                <h5><font color = black>What's your name?</font><font color = red>*</font> </h5>
                <input id = "frst" autofocus name="first" placeholder="First Name" type="text" class="input inline" minlength="2"/>
                <input id = "lst" name="last" placeholder="Last Name" type="text" class="input inline" minlength="2"//>
                <span id="msgbox" style="display:none"></span>
            </div>
            <div class="row">
                <h5><font color = black>Select a username</font><font color = red>*</font> </h5>
                <input id="uname" name="uname" placeholder="Username" type="text" class="required" minlength="2"//>
                <span id="msgbox2" style="display:none"></span>
            </div>
            <div class="row">
                <h5><font color = black>What's your Harvard e-mail?</font><font color = red>*</font> </h5>
                <input id="email" name="email" placeholder="E-mail Address" type="text" class="required" minlength="2"//>
                <span id="msgbox3" style="display:none"></span>
            </div>
            <div class="row">
                <h5><font color = black>Make a password</font><font color = red>*</font> </h5>
                <input id = "pass" name="password" placeholder="Password" type="password" class="input inline" minlength="2"//>
                <input id="confirmation" name="confirmation" placeholder="Confirm Password" type="password" class="input inline" minlength="2"//>
                <span id="msgbox4" style="display:none"></span>
            </div> 
            <div class="row">
                <h5><font color = black>To ensure you are a Harvard student: What's 2+3?</font><font color = red>*</font> </h5>
                <input name="secret" placeholder="Answer to the challenge" type="text" class="required" minlength="2"//>
            </div> 
            <br/>
            <div class="row">
                <button type="submit" onclick="return validateForm()" class="btn btn-danger">Register</button>
            </div>
            <div class="row">
            <p><b id='error_msg'> </b></p>
            </div>           
        </div>
    </fieldset>
</form>
</div>


