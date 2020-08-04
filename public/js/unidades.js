$(document).ready(function(){

        $("#areas").change(function(event){

            var a = event.target.value;

            $.get("unin/"+a+"",function(response,state){

                $("#unidades").empty();
                for(i=0; i < response.length ; i++){
                    $("#unidades").append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");
                }

                
            });
            
        }); 

});
