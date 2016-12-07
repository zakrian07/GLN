 <div class="form-group">
    <div class="col-md-3 col-md-offset-1">
    <strong style="color:grey">Add Multiple Language Translations<strong>
    </div>
   <div class="col-md-3 ">
    <a onclick="addTranslationRow()"><img src="/images/buttons/plus.png"></a>
   </div>
</div> 

<script>
function delete_row(obj){
    obj.parentNode.parentNode.parentNode.parentNode.removeChild(obj.parentNode.parentNode.parentNode);
}
function addTranslationRow(){
    rows= '<div class = "t_row">'
            +'<div class="form-group">'
			+	'<label for="focusedinput" class="col-sm-2 control-label">Language</label>'
			+	'<div class="col-sm-8">'
            +   '<select class="form-control1" name="language_id">'
			+	'@foreach($multi_languages as $lang)'
            +         '<option value="{{$lang->id}}" >{{$lang->language}}</option>'      
            +     '@endforeach'
            +   '</select>'
            +    '</div>'
			+	'<div class="col-sm-2">'
            +   '<a class="btn btn-danger btn-xs"  onclick="delete_row(this)"><span class="glyphicon glyphicon-remove"></span></a>'
			+	'</div>'	
			+'</div>'
                            
            +'<div class="form-group">'
			+	'<label for="focusedinput" class="col-sm-2 control-label">Title</label>'
			+	'<div class="col-sm-8">'
			+	 '<input id="lang_title" type="text" class="form-control1"  name="lang_title" value="">'
            +     '<span class="help-block">'
            +      '<strong id="title_error"></strong>'
            +     '</span>'
            +    '</div>'									
			+'</div>'

            + '<div class="form-group">'
			+	'<label for="focusedinput" class="col-sm-2 control-label">Description</label>'
			+	'<div class="col-sm-8">'
			+		'<textarea id="lang_desc" type="text" class="form-control1" style="height:200px" name="lang_desc"></textarea>'
            +       '<span class="help-block">'
            +         '<strong id="description_error"></strong>'
            +        '</span>'
            +    '</div>'									
			+ '</div>'
            
            + '<div><hr></hr></div>'
        + '</div>';

    $('#translation_rows').append(rows);
}

function iterate_on_add_row(reward_id){
   
    $('.t_row').each(function () {
    var $this = $(this);
    var lang_title = $this.find('input').first().val();
    var lang_description = $this.find('input').last().val();
    var language_id = $this.find(":selected").val();    
    addTranslation(reward_id,language_id,lang_title, lang_description);
});

}

function addTranslation(reward_id,language_id,lang_title, lang_description){
        $.ajax({
        url: "{{env('REWARDS_API_URL')}}rewards/"+reward_id+'/languages',
        type: 'POST',            
        data: {'title':lang_title, 'description':lang_description,'language_id':language_id},
       
        success: function (data, status)
		{
            // console.log(data);
            if(data['errors']){
				 toastr.error('Failed to Add Translation');
			}else if(status=='success'){
				 toastr.success('Translations are added');
                //  window.location = '/rewards/'+rewardId+'/edit'
			
			}
		}
	});
}
</script>