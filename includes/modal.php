<div class="modal fade bd-example-modal-lg" id="imageUploadModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Choose and image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                <!-- CHOOSE IMAGE FORM -->
                    <form action="?" method="post" id="choose_image">
                    </form>	
                    <div class="row justify-content-left">		
                        <?php if(count($images) > 0){
                            for($i=0;$i<count($images);$i++){ ?>										
                                <label class="col-md-3 mr-auto">
                                    <input type="radio" class="choose_image" name="image" value="<?=$images[$i]["image"]?>" form="choose_image">
                                    <div class="image_container">
                                        <a class="close" href="?remove_image=<?=$images[$i]['id'];?>"><i class="far fa-times-circle"></i></a>
                                        <img src="../<?=$images[$i]["image"]?>">
                                    </div>
                                </label>									
                            <?php }
                        }else{ ?>
                            <div class="col-md-3 mr-auto"><p>No images uploaded</p></div>
                        <?php } ?>		
                    </div>	
                </div>			
                <form action="<?=$_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data" id="upload_image">
                    Select image to upload (max 2MB):
                    <input type="file" name="image" id="image">
                    <button type="submit" class="btn btn-primary" form="upload_image">Upload image</button><br>
                    <br>   
                </form> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="choose_image">Choose image</button>
            </div>
        </div>
    </div>
</div>
