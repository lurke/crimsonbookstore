<!DOCTYPE html>
<div id="bug-bar">
    <ul><li id='bugtab' class="active">Report a Bug</li></ul>
</div>
<div id="bug-content">
    <form class='reportbug' name='reportbug' method='post' action='reportbug.php'>
        <input name='name' placeholder='Name' type='text'/>
        <input type='text' name='email' placeholder='Harvard Email'>
        <label for='email'>(So we may contact you with follow-up questions)</label><br>
        <textarea name='bugdescription' placeholder='Please describe what went wrong and when the error occured' maxlength='10000' rows='6'></textarea>
        </br><button type='submit' name='reportbugsubmit' class='btn bugr'>Submit</button>
    </form>  
    <form class="btnreturns returnsell" method='post' action='sell.php'>
        <button class="btn returnlink" name='bugsell'>Return to Sell</button>
    </form>
    <form class="btnreturns" method='post' action='buy.php'>
        <button class="btn returnlink" name='bugbuy'>Return to Buy</button>
    </form>
</div>