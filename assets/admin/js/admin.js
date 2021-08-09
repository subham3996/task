$(document).ready(function() {
    $('#scholarship_table').DataTable();    
    $('.mdl-data-table').DataTable({
        "aaSorting": [],
        "aoColumnDefs": [{
           "bSortable": false,
           "aTargets": ["sorting_disabled"]
        }],        
    });

    $('#userEdit input').on('click', function() {
       $('#ajaxResponseDivs').html('');
    });
    $('#userEdit select').on('click', function() {
       $('#ajaxResponseDivs').html('');
    });

    $('#user-country').on('change', function(){
        $country_id = $('#user-country').val();
        $.ajax({
            url : BASE_URL + 'admin/api/get_states/'+ $country_id,
            type : 'GET',
            success: function(response) {                
                if (response.status) {
                    var states = response.data;
                    $.each(states, function(index, item) {
                    var option = $('<option />');
                    option.attr('value',item.id ).text(item.state_name);
                    $('#user-state').append(option);
                });
                }
            }, 
            error: function(error) {
            }
        });
    });

    $('#user-state').on('change', function(){
        $state_id = $('#user-state').val();
        $.ajax({
            url : BASE_URL + 'admin/api/get_city/'+ $state_id,
            type : 'GET',
            success: function(response) {                
                if (response.status) {
                    var cities = response.data;
                    $.each(cities, function(index, item) {
                    var option = $('<option />');
                    option.attr('value',item.id ).text(item.city_name);
                    $('#user-city').append(option);
                });
                }
            }, 
            error: function(error) {
            }
        });
    });

    $('#user-email').on('keyup', function() {
        $('#email-error').html('');
    });
    $('#user-email').blur(function() {
        var email = $('#user-email').val();
        if(isEmail(email) && email !== '') {
            var formData = {
                email : email
            };
            $.ajax({
                url : BASE_URL + 'admin/api/check_email',
                type : 'POST',
                data : formData,
                success: function(response) {               
                    if (response.status) {
                        $('#is_available').val(1);
                        $('#email-error').css({'display' : 'block', 'font-size' : '16px', 'color' : 'red' });
                        $('#email-error').text(response.message);
                    }
                }, 
                error: function(error) {
                }
            });
        } else {
            $('#email-error').css({'display' : 'block', 'font-size' : '16px', 'color' : 'red' });
            $('#email-error').text('Please enter valid email');
        }

    });
    if( $('#userEdit').length ) {
        onUserLoad();
    } 
});

function isEmail(contact_email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(contact_email);
}

function setUserStatus(userId, action) {
     
    if(action == 'delete') {
        var r = confirm("confirm to delete!");
        if (r != true) {
            return;
        }
    } else {
        status = $('#userStatus_'+userId).text();       
        if(status == 'Active') {         
            action = 'inactive';
        } else {            
            action = 'active';
        }
    }
        
    var formData = {
        'id' : userId,
        'action' : action
    };   

    $.ajax({
        url: BASE_URL+'admin/api/update_user',
        type: 'POST',
        data: formData,
        /*beforeSend: function(){
        },*/
        success: function(response) {           

            if(response.status == true) {
                if(action == 'delete') {
                    $('#user_'+userId).remove();
                } else if(action == 'active') {
                    $('#actionButton_'+userId).html('<i class="material-icons">remove_circle_outline</i> Inactive');
                    $('#actionButton_'+userId).removeClass('btn-success');
                    $('#actionButton_'+userId).addClass('btn-warning');
                    $('#userStatus_'+userId).text('Active');
                } else {
                    $('#actionButton_'+userId).html('<i class="material-icons">check_circle</i> Active');
                    $('#actionButton_'+userId).removeClass('btn-warning');
                    $('#actionButton_'+userId).addClass('btn-success');
                    $('#userStatus_'+userId).text('Inactive');
                }
            }
        }, 
        error: function(error) {
        }
    });
}

function saveUser(){    
    var is_available = $('#is_available').val();
    if(is_available == 0) {
        var userName = $('#user-name').val();
        var userEmail = $('#user-email').val();
        var userCity = $('#user-city').val();
        var userPassword = $('#user-password').val();
        var userID = $('#user-id').val();
        if (userEmail == '') {
            $('#ajaxResponseDivs').css({'font-size' : '16px', 'color' : 'red', 'margin-top' : '20px' });
            $('#ajaxResponseDivs').text('Please Enter Email');
            return;
        } else if (userPassword == '' && userID == '') {
            $('#ajaxResponseDivs').css({'font-size' : '16px', 'color' : 'red', 'margin-top' : '20px' });
            $('#ajaxResponseDivs').text('Please Enter Password');
            return;
        } else if (userCity == null) {
            $('#ajaxResponseDivs').css({'font-size' : '16px', 'color' : 'red', 'margin-top' : '20px' });
            $('#ajaxResponseDivs').text('Please Select City');
            return;
        }
        var userAddress = $('#user-address').val();
        var aboutYou = CKEDITOR.instances['editor'].getData();
        var formData = {
            user_id: userID,
            name: userName,
            email: userEmail,
            password: userPassword,
            city: userCity,
            address: userAddress,
            aboutyou: aboutYou
        };
        $('#ajaxResponseDivs').html('');
        $.ajax({
            url: BASE_URL+'admin/api/save_user',
            type: 'POST',
            data: formData,
            /*beforeSend: function(){
            },*/
            success: function(response) {           
                if(response.status){
                    if(response.user_id){                    
                        location.href = BASE_URL + 'admin/user/list';                    
                    } else {
                        alert('User Saved!');
                    }
                }
            }, 
            error: function(error) {
            }
        });    
    } else {
        $('#ajaxResponseDivs').css({'font-size' : '16px', 'color' : 'red', 'margin-top' : '20px' });
        $('#ajaxResponseDivs').text('This email is already used! Please try other email');
        $('#is_available').val(0);
    }
}

function onUserLoad(){
    userID = $('#user-id').val();
    if(userID!='' && userID!=0) {
        $.ajax({
            url: BASE_URL+'admin/api/get_user/'+userID,
            type: 'GET',            
            success: function(response) {                
                if(response.status) {
                    user = response.data;
                    console.log(user);
                    $('#user-name').val(user.user_name);
                    $('#user-email').val(user.email);
                    $("#user-password").prop('disabled', true);
                    $('#user-country').val(user.country_id);
                    $("#user-state").append(new Option(user.state_name, user.state_id,true, true));
                    $("#user-city").append(new Option(user.city_name, user.city_id,true, true));
                    $('#editor').html(user.about_you);
                    $('#user-address').html(user.address);
                }
            }, 
            error: function(error) {
            }
        });
    }
}