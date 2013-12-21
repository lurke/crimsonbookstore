/***********************************************************************
 * scripts.js
 *
 * Computer Science 50
 * Problem Set 7
 *
 * Global JavaScript, if any.
 **********************************************************************/

//        var classHead = '<div><table id = "classes" style="color:#000000; padding:15px;" ><thead></thead>'

//        if ($('#classtable').html().trim() === '') 
//        {
//            $('#classtable').empty().append(classHead);
//        }
//            $.post('ajax/classlist.php', {booksearch: input}, function(data) {
//                $("#classes tbody").empty();
//                $("#classes thead").after(data);
//                $("#classes tbody tr").on('click', function() {
//                
//                    var tableid = $(this).attr("id");
//                    var courseid = tableid.slice(7, tableid.length);                 
//                    $('#' + tableid).toggleClass('invisible');
//                });
//            });

function search(input, count, sessid) {
        // $('input#booksearch').autocomplete({source:'ajax/suggest_book.php', minLength:2});               
    var tableHead = '<div><table id = "results" style="color:#000000; padding:15px;" ><thead></thead>'
    if ($('#resultstable').html().trim() === '') 
    {
        $('#resultstable').empty().append(tableHead);
    }
    $.post('ajax/booktbl.php', {booksearch: input}, function(data) {

        var counts = [];
   
        $("#results tbody").empty();
        $("#results thead").after(data);

        $("#results tbody tr").on('click', function() {
            var tableid = $(this).attr("id");
            var bookid = tableid.slice(5, tableid.length);
            console.log(bookid);                  
            $('#listbook_' + bookid).toggleClass('invisible');               
            if (counts[bookid]) {
                   return;
            }                  

            $.post('ajax/listtbl.php', {bookid: bookid, sid: sessid}, function(data) {                         
                    $('#book_' + bookid).after(data);
                    counts[bookid] = true;
                    
                    //$("[rel=tooltip]").tooltip({'placement':'top'});                 

                    $("#listings tbody tr td").on('click', function() 
                    {
                        
                        var listid = $(this).attr("id");
                        var id = listid.slice(5, listid.length);
                        $("#"+listid + " i").toggleClass("icon-white");   
                            if (listid === 'star_'+id)
                            {
                                if ($("#"+listid + " i").hasClass("icon-white"))
                                {
                                    $.post('ajax/star.php', {listid: id, is_starred: 1, sid: sessid}, function( data ) {
                                        console.log(data); });
                                    $("td#star_" + id + " h5").replaceWith("<h5><i class=\"icon-star icon-white\"></i> Un-Star?</h5>");
                                }

                                else
                                {
                                     $.post('ajax/star.php', {listid: id, is_starred: 0, sid: sessid}, function( data ) {
                                        console.log(data); });
                                    $("td#star_" + id + " h5").replaceWith("<h5><i class=\"icon-star\"></i> Star It!</h5></td>");
                                }
                            }
                            else if (listid === 'cart_'+id)
                            { 
                                if ($("#"+listid + " i").hasClass("icon-white"))
                                {
                                    $.post('ajax/cart.php', {listid: id, is_carted: 1, sid: sessid}, function(data) {
                                        $("td#user_" + id + " h5").replaceWith("<h5><a style = 'text decoration: none' rel='tooltip' data-original-title='" + data + " users have already asked to buy this book'><i class=\"icon-user icon-white\"></i></a>     " + data + "</h5>");
                                    });
                                    $("td#cart_" + id + " h5").replaceWith("<h5><i class=\"icon-tag icon-white\"></i> Remove buy offer?</h5>");
                                    
                                    $("#boom_"+id +".green").addClass("yellow");
                                    $("#star_"+id +".green").addClass("yellow");
                                    $("#cart_"+id +".green").addClass("yellow");
                                    $("#user_"+id +".green").addClass("yellow");
                                    $("#boom_"+id +".pending_red").addClass("red");
                                    $("#star_"+id +".pending_red").addClass("red");
                                    $("#cart_"+id +".pending_red").addClass("red");
                                    $("#user_"+id +".pending_red").addClass("red");
                                    
                                    $("#boom_"+id +".green").removeClass("green");
                                    $("#star_"+id +".green").removeClass("green");
                                    $("#cart_"+id +".green").removeClass("green");
                                    $("#user_"+id +".green").removeClass("green");
                                    $("#boom_"+id +".pending_red").removeClass("pending_red");
                                    $("#star_"+id +".pending_red").removeClass("pending_red");
                                    $("#cart_"+id +".pending_red").removeClass("pending_red");
                                    $("#user_"+id +".pending_red").removeClass("pending_red");
                                    
                                    $.post('ajax/mail.php', {listid: id}, function(data) {                                                                                   
                                });
                                }

                                else
                                {
                                     $.post('ajax/cart.php', {listid: id, is_carted: 0, sid: sessid}, function(data) {
                                        $("td#user_" + id + " h5").replaceWith("<h5><a style = 'text decoration: none' rel='tooltip' data-original-title='" + data + " users have already asked to buy this book'><i class=\"icon-user icon-white\"></i></a>     " + data + "</h5>");                                             
                                     });
                                     $("td#cart_" + id + " h5").replaceWith("<h5><i class=\"icon-tag\"></i> Buy it!</h5>");
                                    $("#boom_"+id +".yellow").addClass("green");
                                    $("#star_"+id +".yellow").addClass("green");
                                    $("#cart_"+id +".yellow").addClass("green");
                                    $("#user_"+id +".yellow").addClass("green");
                                    
                                    $("#boom_"+id +".yellow").removeClass("yellow");
                                    $("#star_"+id +".yellow").removeClass("yellow");
                                    $("#cart_"+id +".yellow").removeClass("yellow");
                                    $("#user_"+id +".yellow").removeClass("yellow");
                                }
                            }
                });
            });
        });                                                          
    });
}

// Fire jQuery only when document ready
$(document).ready( function () {    
    var sess = document.getElementById('sessionid').innerHTML;
    //initial search
    search('', 0, sess);

    //if there is a change in the search bar
    $("input#booksearch").on('change', function(){
        // $('input#booksearch').autocomplete({source:'ajax/suggest_book.php', minLength:2});
        var input = $('input#booksearch').val();
        var count = 0;
        if ($.trim(input) != '') {
            search(input, count, sess);
        }
    });
});
