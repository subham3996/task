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
</style>
<div class="content">
    <div class="container-fluid">        
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="min-height: 350px">

                    <div class="card-header ">
                        <h4 class="card-title">Blog Articles</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-blog mdl-data-table">
                                <thead>
                                    <tr>                                        
                                        <th>Title</th>
                                        <th>Category</th>                                        
                                        <th>Status</th>
                                        <th>Updated on</th>
                                        <th></th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $this->load->helper('utilities');
                                    foreach ($articles as $article) { ?>
                                    <tr id="article_<?php echo $article->id; ?>">                                        
                                        <td style="text-align: left">
                                            <a href="<?php echo base_url() . 'blog/' . $article->slug; ?>" target="_blank">
                                                <img src="<?php echo base_url() . $article->cover_image; ?>">
                                                <?php echo $article->title; ?>                                              
                                            </a>
                                        </td>
                                        <td><?php echo $article->cat_name; ?></td>
                                        <td id="blogStatus_<?php echo $article->id; ?>"><?php echo $article->status == 'active'? 'Published' : 'Pending'; ?></td>
                                        <td><?php echo datify($article->date_of_action); ?></td>
                                        <td><a href="<?php echo base_url();?>admin/blog/edit/<?php echo $article->id; ?>" target="_blank" class="btn btn-primary btn-sm"><i class="material-icons">edit</i> Edit</a>
                                            <?php if($article->status == 'active') { ?>
                                            <button id="actionButton_<?php echo $article->id; ?>" class="btn btn-warning btn-sm" onclick="setBlogStatus(<?php echo $article->id; ?>)"><i class="material-icons">remove_circle_outline</i> Unpublish</button>
                                            <?php } else { ?>
                                            <button id="actionButton_<?php echo $article->id; ?>" class="btn btn-success btn-sm" onclick="setBlogStatus(<?php echo $article->id; ?>)"><i class="material-icons">check_circle</i> Publish</button>
                                            <?php } ?>
                                            <button class="btn btn-danger btn-sm" onclick="setBlogStatus(<?php echo $article->id; ?>, 'delete')"><i class="material-icons">delete_forever</i> Delete</button>
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
