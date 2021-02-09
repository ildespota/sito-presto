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

        addRemoveLinks: true ,
        
        init : function(){
          let dropzone = this
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
              dropzone.options.addedfile.call(dropzone,file);
              dropzone.options.thumbnail.call(dropzone,file,value.src);
            });
          });
          
          this.on("success", function(file, response){
      
             file.serverId = response.id;
          }); 
          
          this.on("removedfile", function(file){
            // alert('ciao');
            $.ajax({
              type: 'DELETE',
              url: '/announcement/images/remove',
              data: {
               _token: csrftoken,
               id: file.serverId,
               uniqueSecret: uniqueSecret
              },
              dataType: 'json'
            });
          });
        }
    });
    

  }  

})