<a class="btn btn-warning" onclick="deleteTranslation({{$reward->id}},{{$translation->pivot->language_id}})" > delete</a>


<script>
function deleteTranslationRow(rowid)  
{   
    var row = document.getElementById(rowid);
    row.parentNode.removeChild(row);
}

function deleteTranslation(id,lang_id)
{
    console.log(id);
    $.ajax({
        url: "{{env('REWARDS_API_URL')}}rewards/"+ id +'/languages/'+lang_id,
        type: 'DELETE',            
        success: function (data, status)
		{
			if(data['errors']){
				 toastr.error('Failed to Delete');
			}else {
				 toastr.success('Translation is Deleted');
				 deleteTranslationRow(lang_id);
        	}
		}
	});

};
</script>