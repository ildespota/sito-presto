const Dropzone = require("dropzone");
document.addEventListener('DOMContentLoaded', ()=>{   

  if($("#drophere").length>0) {

    let csrftoken = $('meta[name="csrf-token"]').attr('content');
    let uniqueSecret = $('input[name="uniqueSecret"]').attr('value');
    let myDropzone = $("#drophere").dropzone({
        url:'/announcement/images/upload',
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
              myDropzone.options.addedfile.call(myDropzone,file);
              myDropzone.options.thumbnail.call(myDropzone,file,value.src);
            });
          });
        }
    });
    
     myDropzone.on("success", function(file, response){

        file.serverId = response.id;
     }); 

     myDropzone.on("removedfile", function(file){
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