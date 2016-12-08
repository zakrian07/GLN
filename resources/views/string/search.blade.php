<form class="typeahead" role="search" style="margin-left:37%">
										<div class="form-group">
											<input type="search" name="q" class="form-control search-input" placeholder="Search" autocomplete="off">
										</div>
</form>


@section('script')
<!-- Typeahead.js Bundle -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <!-- Typeahead Initialization -->
    <script>
        jQuery(document).ready(function($) {
            // Set the Options for "Bloodhound" suggestion engine
			
            var engine = new Bloodhound({
                remote: {
                    url: '/find?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });
				
            $(".search-input").typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                source: engine.ttAdapter(),

                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'usersList',

                // the key from the array we want to display (name,id,email,etc...)
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
					source: function (query, process) {
						console.log('PROCESS', process);
						// implementation
					},
                    suggestion: function (data) {
                        console.log(typeof data);
						
									
							
                        return "<a href='/languages/" + data['language_id'] + "/strings/"+data['id']+"/edit' class='list-group-item'>" + data.key + " - " + data.value + "</a>"
              }
                }
            });
        });
    </script>
@endsection