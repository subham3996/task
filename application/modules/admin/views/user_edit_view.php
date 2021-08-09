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

     .frontsubmit .frontsubmit-form-frontend .frontsubmit-edit-post-row-title input[type=password]{
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

    #user-address {
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
    }
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
.category_dropdown {
    width: 100%;
    padding: 10px 5px;
    text-align: center;
    background: #fff;
    color: #616161;
    border: 1px solid #e3e3e3;
}
</style>

<div class="content">
    <div class="container-fluid white">
        <div class="row">
           <div class="col-md-8 mx-auto">
                <div class="articlemessage text-center" id="articlemessage"></div>
            <div class="frontsubmit" id="userEdit">
                <div class="frontsubmit frontsubmit-form-frontend"> 
                    <input id="user-id" type="hidden" name="user-id" value="<?php if(isset($user_id)){ echo $user_id; } ?>">
                    <input type="hidden" id="is_available" name="is_available" value="0">
                    <!-- <div class="col col-lg-8"> -->
                        <div class="frontsubmit-form-main">
                            <div class="frontsubmit-edit-post-row-title clearfix">
                                <label for="user-name">Name</label>
                                <input id="user-name" class="clearfix" type="text" placeholder="Enter name" autocomplete="off" required />
                            </div>
                        </div>
                        <br/>

                        <div class="frontsubmit-form-main">
                            <div class="frontsubmit-edit-post-row-title clearfix">
                                <label for="user-email">Email</label>
                                <input id="user-email" class="clearfix" type="text" placeholder="Enter email" autocomplete="off" required />
                            </div>
                            <div id="email-error" style="display: none;"></div>
                        </div>
                        <br/>

                        <div class="frontsubmit-form-main">
                            <div class="frontsubmit-edit-post-row-title clearfix">
                                <label for="user-password">Password</label>
                                <input id="user-password" class="clearfix" type="password" placeholder="**********" autocomplete="off" required />
                            </div>
                        </div>
                        <br/>
                        <div class="frontsubmit-edit-post-row-dropdown clearfix">
                            <label for="user-country">Country</label>
                            <select id="user-country" class="category_dropdown" name="user-country">
                                <option disabled="" selected="">Select Country</option>
                                <?php print_r($countries) ?>
                            </select>
                        </div>
                        <br/>
                        <div class="frontsubmit-edit-post-row-dropdown clearfix">
                            <label for="user-state">State</label>
                            <select id="user-state" class="category_dropdown" name="user-state">
                                <option disabled="" selected="">Select State</option>
                            </select>
                        </div>
                        <br/>
                        <div class="frontsubmit-edit-post-row-dropdown clearfix">
                            <label for="user-city">City</label>
                            <select id="user-city" class="category_dropdown" name="user-city">
                                <option disabled="" selected>Select City</option>
                            </select>
                        </div>
                        <br/>

                        <div class="frontsubmit-edit-post-row-dropdown clearfix">
                            <label for="user-address">Address</label>
                            <textarea id="user-address" rows="4"></textarea>
                        </div>
                        <br/>

                        <div class="frontsubmit-edit-post-row-dropdown clearfix">
                            <label for="user-ckeditor">About You</label>
                            <textarea id="editor" name="editor"></textarea>
                        </div>
                        <div id="ajaxResponseDivs"></div>
                        <div>
                            <button type="submit" onclick="saveUser()" class="btn btn-success" style="font-weight: 500; font-size: 15px; width: 100%; margin-top: 20px; padding: 8px 15px;"><i class="material-icons">save</i> Save</button>
                        </div>
                    <!-- </div>          -->
                </div>
            </div>
           </div> 
           
        </div>

    </div>
</div>
