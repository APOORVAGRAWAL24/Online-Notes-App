$(function(){
    var activeNote=0;
    var editNode=false;
    
   $.ajax({
       url:"loadnotes.php",
       success:function(data){
       $('#notes').html(data); 
        clickonNote();
           clickonDelete();
           
       },
       error:function(){
          $('#alertContent').text("There was an error with the ajax call please try again!");
               $("#alert").fadeIn(); 
       }
       
   }); 

$('#addNote').click(function(){
    
    $.ajax({
        url:"createnotes.php",
        success:function(data){
           if(data =='error'){
              $('#alertContent').text("There was an issue inserting the new note in the database!");
               $("#alert").fadeIn();
              }else{
              //update that variable to id of new note
                  activeNote=data;
                  $("textarea").val("");
                  //show hide elements
                showHide(["#notePad","#allNotes"],["#notes","#addNote","#edit","#done"]);
                 showHide();
                  $("textarea").focus();
              } 
        },
       error:function(){
          $('#alertContent').text("There was an error with the ajax call please try again!");
               $("#alert").fadeIn(); 
       }
    });
});
    //type note:Ajax call to update note.php
    $("textarea").keyup(function(){
       //ajax call to be sent to upate the task of id activenote
         $.ajax({
       url:"updatenotes.php",
       type:"POST",
             //we need to send curent notes content with its id to the php file
        data:{note: $(this).val(),id:activeNote},
             
       success:function(data){
       if(data== 'error'){
          $('#alertContent').text("There was an issue updating the notes in the database!");  
            $("#alert").fadeIn();
       }
           
       },
       error:function(){
          $('#alertContent').text("There was an error with the ajax call please try again!");
               $("#alert").fadeIn();
        
    }
         });
        
    });
    
    //click on all  notes
    $('#allNotes').click(function(){
         $.ajax({
       url:"loadnotes.php",
       success:function(data){
       $('#notes').html(data);  
           showHide(["#addNote","#edit","#notes"],["#allNotes","#notePad"]);
           clickonNote();
           clickonDelete();
           
       },
       error:function(){
          $('#alertContent').text("There was an error with the ajax call please try again!");
               $("#alert").fadeIn();
        
    }
         });
    });
    
    //click on done after editing
    $("#done").click(function(){
        editNode=false;//swithc to non edit mode
        //expand the nodes
        $(".noteheader").removeClass("col-xs-7 col-sm-9");
        //show hide elements
        showHide(["#edit"],[this,".delete"]);
    });
    
    //click on edit
    $("#edit").click(function(){
     //switch to edit mode
        editNode=true;
        //reduce the width of notes
        $(".noteheader").addClass("col-xs-7 col-sm-9");
        //show hide elements
        showHide(["#done",".delete"],["#edit"])
        
    });
    function clickonNote(){
         $(".noteheader").click(function(){
        if(!editNode){
            //update activeNote variable
            activeNote = $(this).attr("id");
            // fill text area
            $("textarea").val($(this).find('.text').text());
             //show hide elements
                  showHide(["#notePad","#allNotes"],["#notes","#addNote","#edit","#done"]);
                  showHide();
                  $("textarea").focus();
        }        
    });
        
    }
    //clicking in delete buttons
    function clickonDelete(){
        $(".delete").click(function(){
            var deleteButton = $(this);
            //send ajax call
               $.ajax({
       url:"deletenotes.php",
       type:"POST",
             //we need to send curent notes content with its id to the php file
        data:{id:deleteButton.next().attr("id")},
             
       success:function(data){
       if(data== 'error'){
          $('#alertContent').text("There was an issue deleting the notes from the database!");  
            $("#alert").fadeIn();
       }else{
         //remove containing div
           deleteButton.parent().remove();
       }
           
       },
       error:function(){
          $('#alertContent').text("There was an error with the ajax call please try again!");
               $("#alert").fadeIn();
        
    }
         });
            
        });
    }
    function showHide(array1,array2){
     for(i=0;i<array1.length;i++){
         $(array1[i]).show();
     } 
        
        for(i=0;i<array2.length;i++){
         $(array2[i]).hide();
     } 
    };
});
