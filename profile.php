<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<style type="text/css">
  body {
  background-color: #efefef;
}

.profile-pic {
    max-width: 200px;
    max-height: 200px;
    display: block;
}

.file-upload {
    display: none;
}
.circle {
    border-radius: 1000px !important;
    overflow: hidden;
    width: 128px;
    height: 128px;
    border: 8px solid rgba(255, 255, 255, 0.7);
    position: absolute;
    top: 72px;
}
img {
    max-width: 100%;
    height: auto;
}
.p-image {
  position: absolute;
  top: 167px;
  right: 30px;
  color: #666666;
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.p-image:hover {
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.upload-button {
  font-size: 1.2em;
}

.upload-button:hover {
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
  color: #999;
}
</style>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/css/foundation.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
</head>
<body>

<div class="row">
   <div class="small-12 medium-2 large-2 columns">
     <div class="circle">
       <!-- User Profile Image -->
       <img class="profile-pic" src="http://dev.fichapp.co/images/82092abcffa42dae1d948bb7bed4bb01139322c4.png">

       <!-- Default Image -->
       <!-- <i class="fa fa-user fa-5x"></i> -->
     </div>
     <div class="p-image">
       <i class="fa fa-camera upload-button"></i>
        <input class="file-upload" type="file" id="file" accept="image/*"/>
     </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
        var fd = new FormData();

            var files = $('#file')[0].files[0];

            fd.append('file',files);
            fd.append('uid',1);

            $.ajax({
                url:'upload.php',
                type:'post',
                data:fd,
                contentType: false,
                processData: false,
                success:function(response){
                    // if(response != 0){
                    //     $("#img").attr("src",response);
                    //     $('.preview img').show();
                    // }else{
                    //     alert('File not uploaded');
                    // }
                }
            });
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });


        $("#but_upload").click(function(){

            
        });

});


</script>
</body>
</html>