<script>
function validatelogin()
{
  var email=document.forms["login"]["email"].value;
  if (email==null || email=="")
  {
    alert("You must submit your email address.");
    return false;
  }
  var password=document.forms["login"]["password"].value;
  if (password==null || password=="")
  {
    alert("You must enter a password.");
    return false;
  }
  var atpos=email.indexOf("@");
  var dotpos=email.lastIndexOf(".");
  if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
  {
    alert("Please enter a valid email address.");
    return false;
  }
}

function validateregister()
{
  var name=document.forms["register"]["name"].value;
  if (name==null || name=="")
  {
    alert("Please enter your name.");
    return false;
  }
  var email=document.forms["register"]["email"].value;
  if (email==null || email=="")
  {
    alert("You must enter an email address.");
    return false;
  }
  var password=document.forms["register"]["password"].value;
  if (password==null || password=="")
  {
    alert("You must enter a password.");
    return false;
  }
  var confirmation=document.forms["register"]["confirmation"].value;
  if (confirmation==null || confirmation=="")
  {
    alert("Please reenter your password.");
    return false;
  }
  if (password != confirmation)
  {
    alert("You must enter an email address.");
    return false;
  }
  var atpos=email.indexOf("@");
  var dotpos=email.lastIndexOf(".");
  if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
  {
    alert("Please enter a valid email address.");
    return false;
  }

}

</script>



<div class="container-fluid">
    <div class="row-fluid">
        <div id="cover">
            <img src='../img/book.jpg' >
            
            <div class= "covertitle"> The Crimson Bookstore
            </div> 
            <?php if (isset($apology)) {
                echo "<div id='apol'>".$apology."</div>";
                } ?>          
            <div id= "login">
                Log In
                <form name="login" onsubmit="return validatelogin()" action="index.php" method="post">
                <fieldset>
                    <div class="control-group">
                        <input autofocus name="email" placeholder="Email" type="text"/>
                    </div>
                    <div class="control-group">
                        <input name="password" placeholder="Password" type="password"/>
                    </div>
                    <div class="control-group">
                        <button type="submit" name="login_submit" class="btn">Log In</button>
                    </div>
                </fieldset>
                </form>
            </div>

            <div id="register">
                Register 
                <form name="register" onsubmit="return validateregister()" action="index.php" method="post">
                <fieldset>
                    <div class="control-group">
                        <input autofocus name="name" placeholder="Name" type="text"/>
                    </div>
                    <div class="control-group">
                        <input autofocus name="email" placeholder="Email" type="text"/>
                    </div>
                    <div class="control-group">
                        <input name="password" placeholder="Password" type="password"/>
                    </div>
                    <div class="control-group">
                        <input autofocus name="confirmation" placeholder="Confirm Password" type="password"/>
                    </div>
                    <div class="control-group">
                        <button name="register_submit" type="submit" class="btn">Register</button>
                    </div>
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
