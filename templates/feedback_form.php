<!DOCTYPE html>

<div id="feedback-bar">
    <ul><li id='bugtab' class="active">Feedback</li></ul>
</div>
<div id="feedback-content">
	<form class='feedback' name='feedback' method='post' action='feedback.php'>
	    <input name='name' placeholder='Name' type='text'/>
	    <input type='text' name='email' placeholder='Harvard Email'></br>
	    <label for='email'>(So we may contact you with follow-up questions)</label>
	    <textarea name='feedback' placeholder='Feedback' maxlength='10000' rows='6'></textarea> </br>
	    <button type='submit' name='feedbacksubmit' class='btn fdbk'>Submit</button>
	</form>  
	<form class="btnreturns returnsell" method='post' action='sell.php'>
    	<button class="btn returnlink" name='feedbacksell'>Return to Sell</button>
    </form>
    <form class="btnreturns" method='post' action='buy.php'>
    	<button class="btn returnlink" name='feedbackbuy'>Return to Buy</button>
    </form>
</div>