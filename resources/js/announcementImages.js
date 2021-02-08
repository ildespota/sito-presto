const Dropzone = require("dropzone");
document.addEventListener('DOMContentLoaded', ()=>{   

  if($("#dropHere").length>0) {

    let csrftoken = $('meta[name="csrf-token"]').attr('content');
    let uniqueSecret = $('input[name="uniqueSecret"]').attr('value');
    let mydropzone = new Dropzone('#dropHere' , {
        url:'announcement/images/upload',
        params:{
            _token: csrftoken, 
            uniqueSecret: uniqueSecret
        },
        addRemoveLinks:true,

        init:function(){
          $.ajax({
              type: 'GET',
              url:'/announcement/images',
              data: {
                uniqueSecret:uniqueSecret
              },
              dataType: 'json'
          }).done(function(data){
            $.each(data,function(key,value){
              let file ={
                serverId:value.id
              };
              mydropzone.options.addedfile.call(mydropzone,file);
              mydropzone.options.thumbnail.call(mydropzone,file,value.src);
            });
          });
        }
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