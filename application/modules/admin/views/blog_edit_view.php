<style type="text/css">
    .table-blog th, .table-blog td{
        text-align: center;
    }
    .table-blog td{
        /*font-size: 16px;*/
    }
    .table-blog img{
        width: 75px;
    }
    .table-blog .btn{
        font-size: 14px;
        font-weight: 500;
        padding: 4px 8px;
    }
    ul.tagit li.tagit-new {
        padding: 0;
        margin: 0px;
    }
    .fr-toolbar .fr-command.fr-btn span, .fr-popup .fr-command.fr-btn span {
        display: none;
    }
    .mce-panel{
        border: 1px solid #f0f0f0!important;
    }
    .mce-edit-area {
      label {
        color: #A9A9A9 !important; /* Override text color */
        left: 5px !important; /* Override left positioning */
      }
    }
    .tag-list{
        margin-left: 20px;            
        margin-bottom: 5px;
    }
    .tag-item{            
        font-weight: 600;
    }
    .remove-button{
        background: #ccc;
        padding: 0px 5px;
    }
    .card-content{
        padding: 10px;
    }



    .frontsubmit .frontsubmit-form-frontend .frontsubmit-edit-post-row-title input[type=text]{
        -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    max-width: 100%;
    width: 100%;
    height: auto;
    margin: 0;
    font-size: 1.5em;
    font-weight: 600;
    color: #000;
    border: none;
    padding: 10px;
    }
     .frontsubmit .frontsubmit-form-side .frontsubmit-edit-post-row-media {
    margin-bottom: 10px; }
    .frontsubmit .frontsubmit-tab-content-current {
    display: block;
}

    .frontsubmit .frontsubmit-upload {
    position: relative;
    margin-bottom: 1.5em;
    text-align: center;
}
    .frontsubmit .frontsubmit-media-upload-form {
    border: 2px dashed #e6e6e6;
}
.frontsubmit .frontsubmit-media-upload-form .frontsubmit-drag-drop-info {
    margin-top: 32px;
    margin-bottom: 0px;
    font-size: 18px;
    font-weight: bold;
}
.frontsubmit .frontsubmit-media-upload-form .frontsubmit-max-upload-size {
    font-size: 13px;
    opacity: 0.666;
}
    .clearfix{
        clear: both!important;
    }
.frontsubmit-media-upload-form img{
    width: 100%;
}

.inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}
.inputfile + label {    
    font-weight: 700;
    color: white;
    background-color: black;
    display: inline-block;    
    padding: 2px 10px;
    font-size: 16px;
    border-radius: 4px;
}

.inputfile:focus + label,
.inputfile + label:hover {
    background-color: red;
}
.inputfile + label {
    cursor: pointer; /* "hand" cursor */
}
.frontsubmit-object-actions{
    text-align: left;
}
</style>

<div class="content">
    <div class="container-fluid white">
        <div class="row">
            <div class="articlemessage text-center" id="articlemessage"></div>
            <div class="frontsubmit" id="blogEdit">
                <div class="frontsubmit frontsubmit-form-frontend"> 
                    <input id="blog-id" type="hidden" name="blog-id" value="<?php if(isset($blog_id)){ echo $blog_id; } ?>">
                    
                    <div class="col col-lg-8">
                        <div class="frontsubmit-form-main">
                            <div class="frontsubmit-edit-post-row-title clearfix">
                                <label for="blog-title">Title</label>
                                <input id="blog-title" class="clearfix" type="text" placeholder="Enter title&hellip;" autocomplete="off" required />
                            </div>
                        </div>

                        <br/>

                        <div class="frontsubmit-edit-post-row-description clearfix">
                            <label for="frontsubmit-post-description">Description</label>                            
                            <textarea name="blog-description" id="blog-description"></textarea>
                        </div>
                    </div>

                     <div class="col col-lg-4 frontsubmit-form-side">
                        <label for="cover_image">Cover Image</label>                        
                        <div class="frontsubmit-upload" >
                            <input type="hidden" name="coverImage" id='coverImage'>
                            <div class="frontsubmit-media-upload-form" id="drop-area">
                                <div id="cover-unuploaded">
                                    <p class="frontsubmit-drag-drop-info">Drop Files Here</p>
                                    <p>or</p>
                                    <p class="frontsubmit-drag-drop-buttons">
                                        <input type="file" name="cover_image" id="cover_image" class="inputfile" />
                                        <label for="cover_image">Choose a file</label>                                    
                                    </p>
                                    <p class="frontsubmit-max-upload-size"> Maximum upload file size: 2 MB.</p>
                                </div>
                                <div id="cover-uploaded"></div>                                
                            </div>
                            <div class="frontsubmit-object-actions">
                                <a href="javascript:void(0);" id="deleteCover" class="frontsubmit-card-action frontsubmit-card-action-delete" title="Remove" style="display: none;">Remove Cover</a>
                            </div>
                        </div>

                        <div class="clearfix">
                            <label for="blog-tags">Tags</label>    
                            <input class="tagInput" name="blog-tags" id="blog-tags" value="" placeholder="Separate tags with commas" style="width: 100%; padding: 4px; font-size: 15px; border: none; margin-bottom: 10px;">
                        </div>

                        <div class="clearfix">
                            <label for="blog-slug">Slug</label>
                            <input name="blog-slug" id="blog-slug" type="text" placeholder="Enter slug&hellip;" autocomplete="off" style="width: 100%; padding: 4px; font-size: 15px; border: none;"/>
                        </div>
                        <div>
                            <button type="submit" onclick="saveArticle()" class="btn btn-success" style="font-weight: 500; font-size: 15px; width: 100%; margin-top: 20px; padding: 8px 15px;"><i class="material-icons">save</i> Save</button>
                        </div>                                            

                        <!-- <div id="frontsubmit-featured-image" ng-if="article.cover_image && article.cover_image!=''">
                            <div class="frontsubmit-image frontsubmit-object">
                                <div class="frontsubmit-object-container">                                                                
                                    <img width="560" height="420" ng-src="{{s3_image_path+article.id+'/'+article.cover_image}}" class="attachment-post-thumbnail size-post-thumbnail" alt="">
                                </div>
                                <div class="frontsubmit-object-actions">
                                    <a ng-click="deleteCover(article.id)" href="javascript:void(0);" class="frontsubmit-card-action frontsubmit-card-action-delete" title="Delete">Remove Cover</a>
                                </div>
                            </div>
                        </div> -->                        
                    </div>
                            
                </div>
            </div>
        </div>

    </div>
</div>
