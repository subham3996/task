<style type="text/css">
    .table-user th, .table-user td{
        text-align: center;
    }
    .table-user td{
        /*font-size: 16px;*/
    }
    .table-user img{
        width: 75px;
    }
    .table-user .btn{
        font-size: 14px;
        font-weight: 500;
        padding: 4px 8px;
    }
</style>
<div class="content">
    <div class="container-fluid">        
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="min-height: 350px">
                    <div class="card-header ">
                        <h4 class="card-title">Users</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-user mdl-data-table">
                                <thead>
                                    <tr>                                        
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>                                        
                                        <th>Status</th>
                                        <th>Updated on</th>
                                        <th></th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $this->load->helper('utilities');
                                    foreach ($users as $user) { ?>
                                    <tr id="user_<?php echo $user->id; ?>">                                   
                                        <td style="text-align: center;">
                                            <?php echo $user->name;?>                                 
                                        </td>
                                        <td><?php echo $user->email;?></td>
                                        <td><?php echo $user->state_name . '-'. $user->city_name;?></td>
                                        <td id="userStatus_<?php echo $user->id; ?>"><?php echo $user->status == 'active'? 'Active' : 'Inactive'; ?></td>
                                        <td><?php echo datify($user->date_of_action); ?></td>
                                        <td><a href="<?php echo base_url();?>admin/user/edit/<?php echo $user->id; ?>" target="_blank" class="btn btn-primary btn-sm"><i class="material-icons">edit</i> Edit</a>
                                            <?php if($user->status == 'active') { ?>
                                            <button id="actionButton_<?php echo $user->id; ?>" class="btn btn-warning btn-sm" onclick="setUserStatus(<?php echo $user->id; ?>)"><i class="material-icons">remove_circle_outline</i> Inactive</button>
                                            <?php } else { ?>
                                            <button id="actionButton_<?php echo $user->id; ?>" class="btn btn-success btn-sm" onclick="setUserStatus(<?php echo $user->id; ?>)"><i class="material-icons">check_circle</i> Active</button>
                                            <?php } ?>
                                            <button class="btn btn-danger btn-sm" onclick="setUserStatus(<?php echo $user->id; ?>, 'delete')"><i class="material-icons">delete_forever</i> Delete</button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
