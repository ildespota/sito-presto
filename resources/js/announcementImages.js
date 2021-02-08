$(function(){   

  if($("#dropHere").length>0) {

    let csrftoken = $('meta[name="csrf-token"]').attr('content');
    let uniqueSecret = $('input[name="uniqueSecret"]').attr('value');
    let mydropzone = new Dropzone('#dropHere' , {
        url:'announcement/images/upload',
        params:{
            _token: csrftoken, 
            uniqueSecret: uniqueSecret
        }
    });
  }  
})