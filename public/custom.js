jQuery(document).ready(function() {
  $('.category_image').click(function(event){

    var src = $(this).attr('src');

    $.fancybox({
          openEffect  : 'elastic',
        closeEffect : 'elastic',
        href : src,
        helpers : {
          title : {
            type : 'inside'
        }
        }
        });
  });
$(".show-hide-form").click(function(){
        
        var link = $(this);
        var text = link.text().trim().split(' ');
        var buttonText = text[1] + " " + text[2];

        $("#add_game").slideToggle('slow', function() {
            
            if ($(this).is(':visible'))
            {
                link.text("Hide Game Form");                
            }
            else
            {
                link.text("Add Game");                
            }        
        });       
    });
});

jQuery(document).ready(function() {
$(".show-hide-form").click(function(){
        
        var link = $(this);
        var text = link.text().trim().split(' ');
        var buttonText = text[1] + " " + text[2];

        $("#add_user").slideToggle('slow', function() {
            
            if ($(this).is(':visible'))
            {
                link.text("Hide User Form");                
            }
            else
            {
                link.text("Add User");                
            }        
        });       
    });
});
jQuery(document).ready(function() {
$(".show-hide-form").click(function(){
        
        var link = $(this);
        var text = link.text().trim().split(' ');
        var buttonText = text[1] + " " + text[2];

        $("#category").slideToggle('slow', function() {
            
            if ($(this).is(':visible'))
            {
                link.text("Hide Category Form");                
            }
            else
            {
                link.text("Add Category");                
            }        
        });       
    });
});

/*
$("#submit").click(function(){
  var dat = $("#add_game").serialize();
  $.ajax(
              {
                url : 'process/add_game.php',
                data : dat,
                type : 'POST',
                success:function(data){
                    var d = JSON.parse(data);
                if(d.status==false){
                    //$('#alert4').show();
                } 
                else{   
              $('#alert3').show();               
            }
        }                
    });
});
*/
/*
$("#User").click(function(){
  var dat = $("#add_user").serialize();
  $.ajax(
              {
                url : 'process/add_user.php',
                data : dat,
                type : 'POST',
                success:function(data){
                    var d = JSON.parse(data);
                if(d.status==false){
                    //$('#alert4').show();
                } 
                else{   
              $('#alert6').show();               
            }
        }                
    });
});
*/

var ajax_url_delete_user = "process/delete_user.php";
var ajax_url_delete_game = "process/delete_game.php";
var ajax_url_delete_cat = "process/delete_category.php";
var ajax_url_delete_image = "process/delete_image.php";

if( $('div').hasClass('msg') )
  {
    window.setTimeout(function() {
        $(".msg > .alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 1000);
  }


$(document).on('click','[data-action=delete_game]',function(){
   
    //var action = $(this).data('action');
      var action_type = $(this).data('action-type');
      var data_id = $(this).data('id');

    swal({   
        title: "Are you sure?",   
        text: "You will not be able to recover this " + action_type + "!",//imaginary file!",   
        type: "warning",   
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, Delete It!",   
        cancelButtonText: "No, Cancel Please!",   
        closeOnConfirm: true,   
        closeOnCancel: true 
      },
      function(isConfirm){
          if ( isConfirm === true ) {
            console.log('isconfirm: ', isConfirm);
                
                $.ajax({
                    url: ajax_url_delete_game,
                    type: 'GET',
                    data: 'id='+data_id,
          
                    error: function(e) {
                      alert('ERROR: '+ e);
                    },

                    success: function(data) {
                  var json = JSON.parse(data);
                  if(json.status == true)
                  {
                    var url ='game.php?status=success&message=' + json.message;
                    window.location.href = url;
                    //$('#message').html("<div class='col-sm-offset-4 col-sm-4 alert fade in alert-success'><button type='button' class='close' data-dismiss='alert'>x</button><strong>" + json.message + "</strong></div>");
                  }
                  else
                  {
                    $('#message').html("<div class='col-sm-offset-4 col-sm-4 alert fade in alert-danger'><button type='button' class='close' data-dismiss='alert'>x</button><strong>" + json.message + "</strong></div>");
                  }
                  
                  //alert('Data: '+ data);
                  $('html, body').animate({ scrollTop: 0 }, 'slow');
                  window.setTimeout(function() {
                  $("#message > .alert").fadeTo(500, 0).slideUp(500, function(){
                          $(this).remove(); 
                      });
                  }, 1000);
                }
                });  
        } 
      });
  });

$(document).on('click','[data-action=delete]',function(){
   
    //var action = $(this).data('action');
      var action_type = $(this).data('action-type');
      var data_id = $(this).data('id');

    swal({   
        title: "Are you sure?",   
        text: "You will not be able to recover this " + action_type + "!",//imaginary file!",   
        type: "warning",   
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, Delete It!",   
        cancelButtonText: "No, Cancel Please!",   
        closeOnConfirm: true,   
        closeOnCancel: true 
      },
      function(isConfirm){
          if ( isConfirm === true ) {
            console.log('isconfirm: ', isConfirm);
                
                $.ajax({
                    url: ajax_url_delete_user,
                    type: 'GET',
                    data: 'id='+data_id,
          
                    error: function(e) {
                      alert('ERROR: '+ e);
                    },

                    success: function(data) {
                  var json = JSON.parse(data);
                  if(json.status == true)
                  {
                    var url = 'users.php?page=1&status=success&message=' + json.message;
                    window.location.href = url;
                    //$('#message').html("<div class='col-sm-offset-4 col-sm-4 alert fade in alert-success'><button type='button' class='close' data-dismiss='alert'>x</button><strong>" + json.message + "</strong></div>");
                  }
                  else
                  {
                    $('#message').html("<div class='col-sm-offset-4 col-sm-4 alert fade in alert-danger'><button type='button' class='close' data-dismiss='alert'>x</button><strong>" + json.message + "</strong></div>");
                  }
                  
                  //alert('Data: '+ data);
                  $('html, body').animate({ scrollTop: 0 }, 'slow');
                  window.setTimeout(function() {
                  $("#message > .alert").fadeTo(500, 0).slideUp(500, function(){
                          $(this).remove(); 
                      });
                  }, 1000);
                }
                });  
        } 
      });
  });

$(document).on('click','[data-action=delete-cat]',function(){
   
    //var action = $(this).data('action');
      var action_type = $(this).data('action-type');
      var data_id = $(this).data('id');

    swal({   
        title: "Are you sure?",   
        text: "You will not be able to recover this " + action_type + "!",//imaginary file!",   
        type: "warning",   
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, Delete It!",   
        cancelButtonText: "No, Cancel Please!",   
        closeOnConfirm: true,   
        closeOnCancel: true 
      },
      function(isConfirm){
          if ( isConfirm === true ) {
            console.log('isconfirm: ', isConfirm);
                
                $.ajax({
                    url: ajax_url_delete_cat,
                    type: 'GET',
                    data: 'id='+data_id,
          
                    error: function(e) {
                      alert('ERROR: '+ e);
                    },

                    success: function(data) {
                  var json = JSON.parse(data);
                  if(json.status == true)
                  {
                    var url ='category.php?status=success&message=' + json.message;
                    window.location.href = url;
                    //$('#message').html("<div class='col-sm-offset-4 col-sm-4 alert fade in alert-success'><button type='button' class='close' data-dismiss='alert'>x</button><strong>" + json.message + "</strong></div>");
                  }
                  else
                  {
                    $('#message').html("<div class='col-sm-offset-4 col-sm-4 alert fade in alert-danger'><button type='button' class='close' data-dismiss='alert'>x</button><strong>" + json.message + "</strong></div>");
                  }
                  
                  //alert('Data: '+ data);
                  $('html, body').animate({ scrollTop: 0 }, 'slow');
                  window.setTimeout(function() {
                  $("#message > .alert").fadeTo(500, 0).slideUp(500, function(){
                          $(this).remove(); 
                      });
                  }, 1000);
                }
                });  
        } 
      });
  });
$(document).on('click','[data-action=delete_img]',function(){
   
    //var action = $(this).data('action');
      var action_type = $(this).data('action-type');
      var data_id = $(this).data('id');
      var game_id = $(this).data('game');
    swal({   
        title: "Are you sure?",   
        text: "You will not be able to recover this " + action_type + "!",//imaginary file!",   
        type: "warning",   
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, Delete It!",   
        cancelButtonText: "No, Cancel Please!",   
        closeOnConfirm: true,   
        closeOnCancel: true 
      },
      function(isConfirm){
          if ( isConfirm === true ) {
            console.log('isconfirm: ', isConfirm);
                
                $.ajax({
                    url: ajax_url_delete_image,
                    type: 'GET',
                    data: 'id='+data_id,
          
                    error: function(e) {
                      alert('ERROR: '+ e);
                    },

                    success: function(data) {
                  var json = JSON.parse(data);
                  if(json.status == true)
                  {
                    var url ='image.php?game_id='+game_id+'&status=success&message=' + json.message;
                    window.location.href = url;
                    //$('#message').html("<div class='col-sm-offset-4 col-sm-4 alert fade in alert-success'><button type='button' class='close' data-dismiss='alert'>x</button><strong>" + json.message + "</strong></div>");
                  }
                  else
                  {
                    $('#message').html("<div class='col-sm-offset-4 col-sm-4 alert fade in alert-danger'><button type='button' class='close' data-dismiss='alert'>x</button><strong>" + json.message + "</strong></div>");
                  }
                  
                  //alert('Data: '+ data);
                  $('html, body').animate({ scrollTop: 0 }, 'slow');
                  window.setTimeout(function() {
                  $("#message > .alert").fadeTo(500, 0).slideUp(500, function(){
                          $(this).remove(); 
                      });
                  }, 1000);
                }
                });  
        } 
      });
  });
/*
$('#video').on('click', function (e) {


     $('.our_video_of_iwhim').magnificPopup({
        dispableOn: 700,
        type: 'iframe',
        removalDelay: 160,
        mainClass: 'mfp-fade',
        preloader: false
     })
     .magnificPopup('open');
 
 });
 */