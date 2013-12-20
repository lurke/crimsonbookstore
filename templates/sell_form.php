<style>
.cf:before, .cf:after{
    content:"";
    display:table;
}
 
.cf:after{
    clear:both;
}
 
.cf{
    zoom:1;
} 

/* Form wrapper styling */
.form-wrapper {
    width: 45%;
    height: 40px;
    padding: .9% .9% .9% .9%;
    background: #444;
    background: rgba(0,0,0,.2);
    display: inline-block;
    vertical-align:top;
    text-align:center;
    border-radius: 10px;
    box-shadow: 0 1px 1px rgba(0,0,0,.4) inset, 0 1px 0 rgba(255,255,255,.2);
}
 
/* Form text input */
 
.form-wrapper input {
    width: 80%;
    height: 20px;
    padding: 10px 5px;
    float: left;   
    font: bold 15px 'lucida sans', 'trebuchet MS', 'Tahoma';
    border: 0;
              background-color: rgb(228, 218, 202);
    border-radius: 3px 0 0 3px;     
}
 
.form-wrapper input:focus {
    outline: 0;
    background-color: rgb(228, 218, 202);
    box-shadow: 0 0 2px rgba(0,0,0,.8) inset;
}
 
.form-wrapper input::-webkit-input-placeholder {
   color: #999;
   font-weight: normal;
   font-style: italic;
}
 
.form-wrapper input:-moz-placeholder {
    color: #999;
    font-weight: normal;
    font-style: italic;
}
 
.form-wrapper input:-ms-input-placeholder {
    color: #999;
    font-weight: normal;
    font-style: italic;
}   
 
/* Form submit button */
.form-wrapper button {
    overflow: visible;
    position: absolute;
    left: 38.5%;
    float: right;
    border: 0;
    padding: 0;
    cursor: pointer;
    height: 40px;
    width: 8%;
    font: bold 100%/40px 'lucida sans', 'trebuchet MS', 'Tahoma';
    color: #fff;
    text-transform: uppercase;
    background: #680000;
    border-radius: 0 3px 3px 0;     
    text-shadow: 0 -1px 0 rgba(0, 0 ,0, .3);
}  

.btn:hover {
color: white;
}
   
.form-wrapper button:hover{    
    background: #530000;
}  
   
.form-wrapper button:active,
.form-wrapper button:focus{  
    background: #c42f2f;
    outline: 0;
}
 
.form-wrapper button:before { /* left arrow */
    content: '';
    position: absolute;
    border-width: 8px 8px 8px 0;
    border-style: solid solid solid none;
    border-color: transparent #680000 transparent;
    top: 12px;
    left: -6px;
}
 
.form-wrapper button:hover:before{
    border-right-color: #530000;
}
 
.form-wrapper button:focus:before,
.form-wrapper button:active:before{
        border-right-color: #c42f2f;
}     
 
.form-wrapper button::-moz-focus-inner { /* remove extra button spacing for Mozilla Firefox */
    border: 0;
    padding: 0;
}
</style>


<div id="pill-bar">
    <ul><li id="buy" class="inactive"><a href="/buy.php">Buy</a></li><li id="sell" class="active"><a href="/sell.php">Sell</a></li></ul>
</div>
<div id="pill-content">
        <div class="form-wrapper cf" display="inline-block"> <!--id="sellsearchbar"-->
            <input id="booksearchinput" name="booksearch" placeholder="Search by Title, Author, or ISBN" type="text"/>
            <button type="submit" id="sellsearchsubmit" class="btn">Search</button>
        </div>
        <div class='coursepack'>
                <button id='cp' type='submit' name='sellformentrance' class='cpbutton btn'>Or Sell a Course Pack</button>         
        </div> 
        <div class='notfound'>
                <button id='nf' type='submit' name='sellformentrance' class='nfbutton btn'>Can't find your book?</button>            
        </div>
        <form id='cp' class='cpform well' name='sellform' method='post' action='sell.php'>
            <label class='cplabel'>Course Packs:</label></br>
            <input id='scourse' name='course' placeholder='Course' type='text'/>
            <input id='smandatory' type='checkbox' name='smandatory' value='1'>
            <label for='smandatory'>Required Text?</label><br>
            <input id='sprice' name='price' placeholder='List your price' type='text'/>
            <div class=selectstyle><select id='sbookcondition' vertical-align='top' name='book_condition' size='1'>
                <option value='' class='uneditable-input' selected='selected'>Condition</option>
                <option value='new'>Outstanding</option>
                <option value='exceeds'>Exceeds Expectations</option>
                <option value='acceptable'>Acceptable</option>
                <option value='poor'>Poor</option>
                <option value='dreadful'>Dreadful</option>
                <option value='troll'>Troll</option>
            </select>
            </div>
            <textarea id='scomments' name='comments' placeholder='Comments' maxlength='800' rows='3'></textarea>
            <button id='sbutton' type='submit' name='sellformsubmit' class='btn'>Submit</button>
        </form>  
        <form id='nf' class='nfform well' name='sellform' method='post' action='sell.php'>
            <label class='nflabel'>Enter the following information:</label></br>
            <input id='stitle' name='stitle' placeholder='Title' type='text'/>
            <input id='sauthors' name='sauthors' placeholder='Authors, separated by comma' type='text'/>
            <input id='spublisher' name='spublisher' placeholder='Publisher' type='text'/>
            <input id='sisbn13' name='sisbn13' placeholder='13 digit ISBN' type='text'/>
            <input id='scourse' name='course' placeholder='Course' type='text'/>
            <input id='smandatory' type='checkbox' name='smandatory' value='1'>
            <label for='smandatory'>Required Text?</label><br>
            <input id='sprice' name='price' placeholder='List your price' type='text'/>
            <div class=selectstyle><select id='sbookcondition' vertical-align='top' name='book_condition' size='1'>
                <option value='' class='uneditable-input' selected='selected'>Condition</option>
                <option value='new'>Outstanding</option>
                <option value='exceeds'>Exceeds Expectations</option>
                <option value='acceptable'>Acceptable</option>
                <option value='poor'>Poor</option>
                <option value='dreadful'>Dreadful</option>
                <option value='troll'>Troll</option>
            </select>
            </div>
            <textarea id='scomments' name='comments' placeholder='Comments' maxlength='800' rows='3'></textarea>
            <button id='sbutton' type='submit' name='sellformsubmit' class='btn'>Submit</button>
        </form>
            <?php if(isset($message))  {
                        echo "<div id='message' class='well' >" . $message . "</div>";
                     } ?>

    <!-- todo insert links into message
    todo check if user refreshes the page what happens, 
     make back button once click on form, 
    make the page still searchable once form is clicked 
    validate form-->
        <div id="big">    
            <!-- insert one search result here in div-->
            <!--insert form here -->
            <div id='common'>Commonly sold books: </div>
            <div class='sellresult well'>
                <div class='sellbook'>
                    <img src='http://bks2.books.google.com/books?id=T2z7kgEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api' alt='book image'>
                    <ol><li id='stitle'>Biology: How Life Works</li>
                        <li id='sauthors'>James Moris</li>
                        <li id='spublisher'>Worth Publishers | 9781429218702</li>
                        <li id='sdescription'>No Description Available </li>
                    </ol>
                </div>
                <div class='sellform'>
                    <button id='1c' type='submit' name='sellformentrance' class='sellformentrance btn'>Sell</button>
                    <form id='1c' class='actualform' name='sellform' method='post' action='sell.php'>
                        <input id='scourse' name='course' placeholder='Course' type='text'/>
                        <input id='smandatory' type='checkbox' name='smandatory' value='1'>
                        <label for='smandatory'>Required Text?</label><br>
                        <input id='sprice' name='price' placeholder='List your price' type='text'/>
                        <div class=selectstyle><select id='sbookcondition' vertical-align='top' name='book_condition' size='1'>
                            <option value='' class='uneditable-input' selected='selected'>Condition</option>
                            <option value='new'>Outstanding</option>
                            <option value='exceeds'>Exceeds Expectations</option>
                            <option value='acceptable'>Acceptable</option>
                            <option value='poor'>Poor</option>
                            <option value='dreadful'>Dreadful</option>
                            <option value='troll'>Troll</option>
                        </select>
                        </div>
                        <textarea id='scomments' name='comments' placeholder='Comments' maxlength='800' rows='3'></textarea>
                        <button id='sbutton' type='submit' name='sellformsubmit' class='btn'>Submit</button>
                        <input class='preset' name='title' value='Biology: How Life Works' readonly>
                        <input class='preset' name='authors' value='James Moris' readonly>
                        <input class='preset' name='publisher' value='Worth Publishers' readonly>
                        <input class='preset' name='description' value='No Description Available' readonly>
                        <input class='preset' name='pic' value='http://bks2.books.google.com/books?id=T2z7kgEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api' alt='book image' readonly>
                        <input class='preset' name='isbn10' value='1429218703' readonly>
                        <input class='preset' name='isbn13' value='9781429218702' readonly>
                    </form>
                </div>
            </div>

            <div class='sellresult well'>
                <div class='sellbook'>
                    <img src='http://bks5.books.google.com/books?id=emAyzTNy1cUC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api' alt='book image'>
                    <ol><li id='stitle'>Psychology</li>
                        <li id='sauthors'>Daniel L. Schacter, Daniel T. Gilbert, Daniel M. Wegner</li>
                        <li id='spublisher'>Worth Publishers | 9781429237192</li>
                        <li id='sdescription'>The result of an exclusive partnership with Scientific American, the articles in this collection were personally selected from the pages of world's foremost scientific magazine by the authors Dan Schacter, Dan Gilbert, and Dan Wegner.</li>
                    </ol>
                </div>
                <div class='sellform'>
                    <button id='2c' type='submit' name='sellformentrance' class='sellformentrance btn'>Sell</button>
                    <form id='2c' class='actualform' name='sellform' method='post' action='sell.php'>
                        <input id='scourse' name='course' placeholder='Course' type='text'/>
                        <input id='smandatory' type='checkbox' name='smandatory' value='1'>
                        <label for='smandatory'>Required Text?</label><br>
                        <input id='sprice' name='price' placeholder='List your price' type='text'/>
                        <div class=selectstyle><select id='sbookcondition' vertical-align='top' name='book_condition' size='1'>
                            <option value='' class='uneditable-input' selected='selected'>Condition</option>
                            <option value='new'>Outstanding</option>
                            <option value='exceeds'>Exceeds Expectations</option>
                            <option value='acceptable'>Acceptable</option>
                            <option value='poor'>Poor</option>
                            <option value='dreadful'>Dreadful</option>
                            <option value='troll'>Troll</option>
                        </select>
                        </div>
                        <textarea id='scomments' name='comments' placeholder='Comments' maxlength='800' rows='3'></textarea>
                        <button id='sbutton' type='submit' name='sellformsubmit' class='btn'>Submit</button>
                        <input class='preset' name='title' value='Psychology' readonly>
                        <input class='preset' name='authors' value='Daniel L. Schacter, Daniel T. Gilbert, Daniel M. Wegner' readonly>
                        <input class='preset' name='publisher' value='Worth Publishers' readonly>
                        <input class='preset' name='description' value='The result of an exclusive partnership with Scientific American, the articles in this collection were personally selected from the pages of worlds foremost scientific magazine by the authors Dan Schacter, Dan Gilbert, and Dan Wegner.' readonly>
                        <input class='preset' name='pic' value='http://bks5.books.google.com/books?id=emAyzTNy1cUC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api' readonly>
                        <input class='preset' name='isbn10' value='1429237198' readonly>
                        <input class='preset' name='isbn13' value='9781429237192' readonly>
                    </form>
                </div>
            </div>

            <div class='sellresult well'>
                <div class='sellbook'>
                    <img src='http://bks4.books.google.com/books?id=nZE_wPg4Wi0C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api' alt='book image'>
                    <ol><li id='stitle'>Principles of Economics</li>
                        <li id='sauthors'>N. Gregory Mankiw</li>
                        <li id='spublisher'>South-Western Pub | 9780538453059</li>
                        <li id='sdescription'>The result of an exclusive partnership with Scientific American, the articles in this collection were personally selected from the pages of worlds foremost scientific magazine by the authors Dan Schacter, Dan Gilbert, and Dan Wegner.</li>
                    </ol>
                </div>
                <div class='sellform'>
                    <button id='3c' type='submit' name='sellformentrance' class='sellformentrance btn'>Sell</button>
                    <form id='3c' class='actualform' name='sellform' method='post' action='sell.php'>
                        <input id='scourse' name='course' placeholder='Course' type='text'/>
                        <input id='smandatory' type='checkbox' name='smandatory' value='1'>
                        <label for='smandatory'>Required Text?</label><br>
                        <input id='sprice' name='price' placeholder='List your price' type='text'/>
                        <div class=selectstyle><select id='sbookcondition' vertical-align='top' name='book_condition' size='1'>
                            <option value='' class='uneditable-input' selected='selected'>Condition</option>
                            <option value='new'>Outstanding</option>
                            <option value='exceeds'>Exceeds Expectations</option>
                            <option value='acceptable'>Acceptable</option>
                            <option value='poor'>Poor</option>
                            <option value='dreadful'>Dreadful</option>
                            <option value='troll'>Troll</option>
                        </select>
                        </div>
                        <textarea id='scomments' name='comments' placeholder='Comments' maxlength='800' rows='3'></textarea>
                        <button id='sbutton' type='submit' name='sellformsubmit' class='btn'>Submit</button>
                        <input class='preset' name='title' value='Principles of Economics' readonly>
                        <input class='preset' name='authors' value='N. Gregory Mankiw' readonly>
                        <input class='preset' name='publisher' value='South-Western Pub' readonly>
                        <input class='preset' name='description' value="Principles of Economics, Sixth Edition, became a best seller after its introduction and continues to be the most popular and widely used text in the economics classroom. Instructors found it the perfect complement to their teaching. A text by a superb writer and economist that stressed the most important concepts without overwhelming students with an excess of detail was a formula that was quickly imitated, but has yet to be matched. The sixth edition features a strong revision of content in all thirty-six chapters. Dozens of new applications emphasize the real-world relevance of economics for todays students through interesting news articles, realistic case studies, and engaging problems. The premier ancillary package is the most extensive in the industry, using a team of instructors/preparers that have been with the project since the first edition. The text material is again fully integrated into Aplia, the best-selling online homework solution. I have tried to put myself in the position of someone seeing economics for the first time. My goal is to emphasize the material that students should and do find interesting about the study of the economy.--N. Gregory Mankiw.--Publishers website." readonly>
                        <input class='preset' name='pic' value='http://bks4.books.google.com/books?id=nZE_wPg4Wi0C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api' readonly>
                        <input class='preset' name='isbn10' value='0538453052' readonly>
                        <input class='preset' name='isbn13' value='9780538453059' readonly>
                    </form>
                </div>
            </div>

        </div>
</div>