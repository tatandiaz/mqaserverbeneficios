	
$("#taller").change(function(event){

$.get("/procesos/vermesas/"+event.target.value+"",function(response,state){

$('#mesa').empty();
var o=document.getElementById('taller').value;
var me=document.getElementById('mesa');

if (o==0){
 $('#mesa').append("<option value='0'>Seleccione..</option>");
me.disabled=true;

}
else{
for ( i = 0; i <response.length; i++) {

 $('#mesa').append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");

}
 me.disabled=false;	

}



});

});