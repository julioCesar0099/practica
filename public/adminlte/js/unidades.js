$(document).ready(function(){

    $("#area1").change(function(event){
        var a = event.target.value;
        $.get("/admin/unin/"+a+"",function(response,state){
            $(".unidades").empty();
            for(i=0; i < response.length ; i++){
                $(".unidades").append("<option value='"+response[i].nombre+"'>"+response[i].nombre+"</option>");
            }
        });
    });  
    $('#add3').click(function () {
            var a =  $("#area1").val();
            $.get("/admin/unin/"+a+"",function(response,state){
                $(".unidades").empty();
                for(i=0; i < response.length ; i++){
                    $(".unidades").append("<option value='"+response[i].nombre+"'>"+response[i].nombre+"</option>");
                } 
            });
    });
    $("#area2").change(function(event){
        var a = event.target.value;
        $.get("/admin/unin/"+a+"",function(response,state){
            $(".unidades2").empty();
            for(i=0; i < response.length ; i++){
                $(".unidades2").append("<option value='"+response[i].nombre+"'>"+response[i].nombre+"</option>");
            } 
        }); 
    }); 
    $('#add6').click(function () {
        var s =  $("#area2").val();
        $.get("/admin/unin/"+s+"",function(response,state){

            $(".unidades2").empty();
            for(i=0; i < response.length ; i++){
                $(".unidades2").append("<option value='"+response[i].nombre+"'>"+response[i].nombre+"</option>");
            }  
        });
     });

});
