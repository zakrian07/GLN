 jQuery(document).ready(function($) {
          		var map = {};
                var lang_id = $('#language_id').data('lang_id');  
            $('.search-input').bind('typeahead:select', function(ev, suggestion) {
             window.location = '/languages/' + map[suggestion].language_id + '/strings/' + map[suggestion].id + '/edit';
            }); 

           
            $(".search-input").typeahead({
                hint: true,
                highlight: true,
                minLength: 1,
                limit: 20,
                
                
            },{
               async: true,
               source: function (query,  processSync, processAsync){
                    // var $this = this //get a reference to the typeahead object
                    query = query.split(':');
                    query = query[query.length - 1].trim();
                    return $.get('/find?q='+ query +'&&lang_id='+lang_id+'',function(data){
                        // console.log(data);
                        var options = [];
                        // this["map"] = {}; //replace any existing map attr with an empty object
                        $.each(data,function (i,val){
                           if(val.language != undefined){ 
                            options.push( val.language.lang_name +': ' + val.key);
                            map[val.language.lang_name +': ' + val.key] = val; //keep reference from name -> id
                           }
                        });
                        // console.log( $this.map);
                        return processAsync(options);
                    });
                },
              
              name: 'usersList',
              templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],

                    suggestion: function (data) {
                      return  "<a href='/languages/" + map[data].language_id + "/strings/"+map[data].id+"/edit' class='list-group-item'>"
                                 +   "<div>"
                                 +       "<div>Key: "+map[data].key+"</div>"
                                 +       "<div>value: "+ map[data].value +"</div>"
                                 +       "<div style='background-color:#f5f5f5'>Language: "+map[data].language.lang_name+"</div>" 
                                 +   "</div>";
                               + "</a>";     
                        
                    }
                }  
            }     
         );
       });