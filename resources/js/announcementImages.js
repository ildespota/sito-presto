$(function(){   

  if($("#dropHere").length>0) {

    let csrftoken = $('meta[name="csrf-token"]').attr('content');
    let uniqueSecret = $('input[name="uniqueSecret"]').attr('value');
    let mydropzone = new Dropzone('#dropHere' , {
        url:'announcement/images/upload',
        params:{
            _token: csrftoken, 
            uniqueSecret: uniqueSecret
        },
        addRemoveLinks:true
    });
    
     mydropzone.on("success", function(file, response){

        file.serverId = response.id;
     }); 

     mydropzone.on("removedfile", function(file){
       $.ajax({
         type: 'DELETE',
         url: '/announcement/images/remove',
         data: {
        _token:csrftoken,
        id:file.serverId,
        uniqueSecret:uniqueSecret
         },

         dataType: 'json'
       });
     });
  }  

})