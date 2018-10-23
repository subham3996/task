$(document).ready(function() {
    $('#scholarship_table').DataTable();    
    $('.mdl-data-table').DataTable({
        "aaSorting": [],
        "aoColumnDefs": [{
           "bSortable": false,
           "aTargets": ["sorting_disabled"]
        }],        
    });

    $("#drop-area").on('dragenter', function (e){
        e.preventDefault();
        $(this).css('background', '#BBD5B8');
    });

     $("#drop-area").on('dragover', function (e){
        e.preventDefault();
    });

     $("#drop-area").on('drop', function (e){
        $(this).css('background', '#D8F9D3');
        e.preventDefault();
        var image = e.originalEvent.dataTransfer.files;
        createFormData(image);
    });


    $('#cover_image').change(function() {
        var upload = document.getElementById('cover_image');
        var image = upload.files;
        createFormData(image);
    });

    $("#deleteCover").on('click', function(){
        $('#cover-uploaded').hide();
        $('#deleteCover').hide();
        $('#cover-unuploaded').show();
        $('#coverImage').val('');        
    });
    
    if( $('#blogEdit').length ) {
        onBLogLoad();
    }    

});

function createFormData(image) {
    var formImage = new FormData();
    formImage.append('userImage', image[0]);
    uploadFormData(formImage);
}

function uploadFormData(formData) {
    $.ajax({
        url: BASE_URL + 'admin/upload/media',
        type: "POST",
        data: formData,
        contentType:false,
        cache: false,
        processData: false,
        success: function(data){        
            if(data.location) {
                $('#coverImage').val(data.location);
                var img = "<img src='"+ data.location +"'>";
                $('#cover-uploaded').html(img);
                $('#cover-unuploaded').hide();
                $('#cover-uploaded').show();
                $('#deleteCover').show();
            }
        }
    });
}

function setBlogStatus(blogId, action) {
     
    if(action == 'delete') {
        var r = confirm("confirm to delete!");
        if (r != true) {
            return;
        }
    } else {
        status = $('#blogStatus_'+blogId).text();       
        if(status == 'Published') {         
            action = 'unpublish';
        } else {            
            action = 'publish';
        }
    }
        
    var formData = {
        'id' : blogId,
        'action' : action
    };   

    $.ajax({
        url: BASE_URL+'admin/api/update_article',
        type: 'POST',
        data: formData,
        /*beforeSend: function(){
        },*/
        success: function(response) {           

            if(response.status == true) {
                if(action == 'delete') {
                    $('#article_'+blogId).remove();
                } else if(action == 'publish') {
                    $('#actionButton_'+blogId).html('<i class="material-icons">remove_circle_outline</i> Unpublish');
                    $('#actionButton_'+blogId).removeClass('btn-success');
                    $('#actionButton_'+blogId).addClass('btn-warning');
                    $('#blogStatus_'+blogId).text('Published');
                } else {
                    $('#actionButton_'+blogId).html('<i class="material-icons">check_circle</i> Publish');
                    $('#actionButton_'+blogId).removeClass('btn-warning');
                    $('#actionButton_'+blogId).addClass('btn-success');
                    $('#blogStatus_'+blogId).text('Pending');
                }
            }
        }, 
        error: function(error) {
        }
    });
}

function saveArticle(){    
    var title = $('#blog-title').val();
    var description = tinymce.get('blog-description').getContent();
    var coverImage = $('#coverImage').val();
    coverImage = coverImage.replace(BASE_URL,'');
    var tags = $('#blog-tags').val();
    var slug = $('#blog-slug').val();

    var blogID = $('#blog-id').val();

    var formData = {
        blog_id: blogID,
        title: title,
        description: description,
        cover_image: coverImage,
        tags: tags,
        slug: slug
    };

    $.ajax({
        url: BASE_URL+'admin/api/save_article',
        type: 'POST',
        data: formData,
        /*beforeSend: function(){
        },*/
        success: function(response) {           
            if(response.status){
                if(response.blog_id){                    
                    location.href = BASE_URL + 'admin/blog/edit/' + response.blog_id;                    
                } else {
                    alert('Blog Saved!');
                }
            }
        }, 
        error: function(error) {
        }
    });    
}

function onBLogLoad(){
    blogID = $('#blog-id').val();
    if(blogID!='' && blogID!=0) {
        $.ajax({
            url: BASE_URL+'admin/api/get_article/'+blogID,
            type: 'GET',            
            success: function(response) {                
                if(response.status) {
                    blog = response.data;
                    console.log(blog);
                    $('#blog-title').val(blog.title);
                    // tinymce.get('blog-description').setContent(blog.description);
                    $('#blog-description').html(blog.description);
                    
                    if(blog.cover_image!=""){
                        $('#coverImage').val(blog.cover_image);
                        var img = "<img src='"+ BASE_URL + blog.cover_image+"'>";
                        $('#cover-uploaded').html(img);
                        $('#cover-unuploaded').hide();
                        $('#cover-uploaded').show();
                        $('#deleteCover').show();
                    }
                    $('#blog-tags').val(blog.tags);
                    $('#blog-slug').val(blog.slug);
                }
            }, 
            error: function(error) {
            }
        });
    }
}

tinymce.init({ 
        selector: 'textarea',
        plugins: 'link lists wordcount image code',
        menubar:false,
        extended_valid_elements: 'span',
        branding: false,
        height: 222,
        
        toolbar: 'undo redo | bold italic | bullist numlist | alignleft aligncenter alignright | link | removeformat restoredraft | code',
});
