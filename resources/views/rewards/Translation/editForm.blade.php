 @foreach($translations as $translation)
                           <div class = "edit_t_row">
                               <div id={!! $translation->pivot->language_id!!}>
                                <div class="form-group">
                                	<label for="focusedinput" class="col-sm-2 control-label">Language</label>
                                	<div class="col-sm-8">
                                	<select class="form-control1" name="language_id">
                                    
                                        @foreach($multi_languages as $lang)
                                            <option value="{{$lang->id}}"  {!!$translation->id == $lang->id?'selected':''!!}>{{$lang->language}}</option>      
                                        @endforeach
                                    </select>
                                    </div>


                                	<div class="col-sm-2">
                                	   @include('rewards.Translation.delete')
                                    </div>	
                                </div>
                                                
                                <div class="form-group">
                                	<label for="focusedinput" class="col-sm-2 control-label">Title</label>
                                	<div class="col-sm-8">
                                	<input id="lang_title" type="text" class="form-control1"  name="lang_title" value="{{$translation->pivot->title}}">
                                     <span class="help-block">
                                     <strong id="title_error"></strong>
                                     </span>
                                    </div>							
                                </div>

                                 <div class="form-group">
                                	<label for="focusedinput" class="col-sm-2 control-label">Description</label>
                                	<div class="col-sm-8">
                                        <textarea id="lang_desc" type="text" class="form-control1"  name="lang_desc"> {{$translation->pivot->description}} </textarea>
                                       <span class="help-block">
                                         <strong id="description_error"></strong>
                                        </span>
                                    </div>							
                                 </div>
                                
                                 <div><hr></hr></div>
                               </div> 
                             </div>
@endforeach 

<script>
function iterate_on_edit_row(reward_id){
    
    $('.edit_t_row').each(function () {
        var $this = $(this);
        var lang_title = $this.find('input').first().val();
        var lang_description = $this.find('input').last().val();
        var language_id = $this.find(":selected").val(); 
        console.log(language_id);
        updateTranslation(reward_id,language_id,lang_title, lang_description);
        });
}
function updateTranslation(reward_id,language_id,lang_title, lang_description){
        $.ajax({
        url: "{{env('REWARDS_API_URL')}}rewards/"+reward_id+'/languages/'+language_id,
        type: 'PATCH',            
        data: {'title':lang_title, 'description':lang_description},
       
        success: function (data, status)
		{
             console.log(data);
            if(data['errors']){
				 toastr.error('Failed to update translation');
			}else if(status=='success'){
				 toastr.success('Translation is Updated');
                //  window.location = '/rewards/'+rewardId+'/edit'
			
			}
		}
	});
}
</script>