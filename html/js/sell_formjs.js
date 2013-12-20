var ajaxRequest = null;


$(document).ready(function() {
    $('input.preset').hide();
    $('.actualform').hide();
    $('.cpform').hide();
    $('.nfform').hide();
    $('.sellformentrance').show();
    //when cp is clicked
    $('.coursepack').on('click', '.cpbutton', function() {
        $('.cpform').show();
        $('.cpbutton').attr('disabled', true);
        $('.nfform').hide();
        $('.nfbutton').attr('disabled', false);
    });
    //when nf is clicked
    $('.notfound').on('click', '.nfbutton', function() {
        $('.nfform').show();
        $('.nfbutton').attr('disabled', true);
        $('.cpform').hide();
        $('.cpbutton').attr('disabled', false);

    });
    //when one result is clicked for common results
        $('#big').on('click', '.sellformentrance', function() {
            //hide any open forms and current button
            $('.actualform').hide();
            $('.sellformentrance').show();
            $(this).hide();
            //show form
            $('#' + this.id + '.actualform').show();
            //hide presets in sellform
            $('input.preset').hide();

        });
    //query google books api on button clicked
    var books = {};
    var ajaxHandler = function() {
        //remove any existing search results
        $('.sellresult').remove(); 
        $('#common').remove();
        //remove any existing message that tells user they sold a book   
        $('#message').remove();
        
        // AJAX using jQuery
        var responseCallback = function(json, successString) {

            //var json = JSON.parse(responseText);
            //parse response
            for(var i=0; i < json.items.length; i++) {
                books[i]={};
                //author
                if (json.items[i].volumeInfo.authors)
                    books[i]["authors"]=json.items[i].volumeInfo.authors.join(", ");
                else
                    books[i]["authors"]="No Author Available";
                //title
                if (json.items[i].volumeInfo.subtitle)
                    books[i]["title"] = json.items[i].volumeInfo.title + ": " + json.items[i].volumeInfo.subtitle;
                else
                    books[i]["title"]=json.items[i].volumeInfo.title;
                //publisher
                if (json.items[i].volumeInfo.publisher)
                    books[i]["publisher"]=json.items[i].volumeInfo.publisher;
                else
                    books[i]["publisher"]="No Publisher Available";
                //description
                if (json.items[i].volumeInfo.description)
                    books[i]["description"]=json.items[i].volumeInfo.description;
                else
                    books[i]["description"]="No Description Available";
                //isbn10
                if (json.items[i].volumeInfo.industryIdentifiers) {
                    if (json.items[i].volumeInfo.industryIdentifiers[0]) {
                        if (json.items[i].volumeInfo.industryIdentifiers[0].type === "ISBN_10") 
                           books[i]["isbn10"]=json.items[i].volumeInfo.industryIdentifiers[0].identifier;
                        else
                            books[i]["isbn10"]="No ISBN Available";
                    }
                    else
                        books[i]["isbn10"]="No ISBN Available";
                }
                else
                    books[i]["isbn10"]="No ISBN Available";
                //isbn13
                if (json.items[i].volumeInfo.industryIdentifiers) {
                    if (json.items[i].volumeInfo.industryIdentifiers[1]) {
                        if (json.items[i].volumeInfo.industryIdentifiers[1].type === "ISBN_13")
                           books[i]["isbn13"]=json.items[i].volumeInfo.industryIdentifiers[1].identifier;
                        else
                            books[i]["isbn13"]="No ISBN Available";
                    }
                    else 
                            books[i]["isbn13"]="No ISBN Available";
                }
                else 
                    books[i]["isbn13"]="No ISBN Available";  
                //pic
                if (json.items[i].volumeInfo.imageLinks) 
                    books[i]["pic"]=json.items[i].volumeInfo.imageLinks.thumbnail;
                else
                    books[i]["pic"]="http://www.myworldhut.com/product_images/u/book_image_not_available__14165.jpg";
                //put search one result and one form into #big inside a div with class sellresult
                $("<div id='" + i + "' class='sellresult well'><div class='sellbook'><img src='" + books[i]["pic"] + "' alt='book image'><ol><li id='stitle'>" + books[i]["title"] + "</li><li id='sauthors'>" + books[i]["authors"] + "</li><li id='spublisher'>" + books[i]["publisher"] + " | " + books[i]["isbn13"] + " </li><li id='sdescription'>" + books[i]["description"] + " </li></ol></div><div class='sellform'><button id='" + i + "' type='submit' name='sellformentrance' class='sellformentrance btn'>Sell</button><form class='actualform' name='sellform' method='post' action='sell.php'><input id='scourse' name='course' placeholder='Course' type='text'/><input id='smandatory' type='checkbox' name='smandatory' value='1'><label for='smandatory'>Required Text?</label><br><input id='sprice' name='price' placeholder='List your price' type='text'/><div class=selectstyle><select id='sbookcondition' vertical-align='top' name='book_condition' size='1'><option value='' class='uneditable-input' selected='selected'>Condition</option><option value='new'>Outstanding</option><option value='exceeds'>Exceeds Expectations</option><option value='acceptable'>Acceptable</option><option value='poor'>Poor</option><option value='dreadful'>Dreadful</option><option value='troll'>Troll</option></select></div><textarea id='scomments' name='comments' placeholder='Comments' maxlength='800' rows='3'></textarea><button id='sbutton' type='submit' name='sellformsubmit' class='btn'>Submit</button><input class='preset' name='title' value='" + books[i]["title"] + "' readonly><input class='preset' name='authors' value='" + books[i]["authors"] + "' readonly><input class='preset' name='publisher' value='" + books[i]["publisher"] + "' readonly><input class='preset' name='description' value='" + books[i]["description"] + "' readonly><input class='preset' name='pic' value='" + books[i]["pic"] + "' readonly><input class='preset' name='isbn10' value='" + books[i]["isbn10"] + "' readonly><input class='preset' name='isbn13' value='" + books[i]["isbn13"] + "' readonly></form></div></div>").appendTo('#big'); 
                $('.actualform').hide();
            }
            //when one result is clicked
            $('#big').on('click', '.sellformentrance', function() {
                //hide any open forms and current button
                $('.actualform').hide();
                $('.sellformentrance').show();
                $(this).hide();

                //show form
                var ident=this.id;
                $('#'+ident+' .actualform').show();
                //hide presets in sellform
                $('input.preset').hide();

            });
        };
    var query= $('#booksearchinput').val();    
    if (ajaxRequest != null)
    {
        ajaxRequest.abort();
    }
    ajaxRequest = $.ajax({
        url: "https://www.googleapis.com/books/v1/volumes?q=" + query + "&maxResults=20", 
        method: "GET", 
        success: responseCallback, 
        error: function(a, why) {
            if (why != "abort") {
                // handle error here
            }
        }
    });

    };
    var enterHandler = function(e) {
         if ((e.keycode && e.keycode == 13) || (e.which && e.which == 13))
             ajaxHandler(); 
    };
    $('#sellsearchsubmit').click(ajaxHandler);
    $('#booksearchinput').on('keyup', enterHandler);
    
  
}); 


