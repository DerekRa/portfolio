<div class="row">
    <div class="sub-title">
     		<h2>My Portfolio</h2>
            <a href="<?=site_url('Contact') ?>"><i class="icon-envelope"></i></a>
    </div>
    <div class="col-md-12 content-page">
        <div class="col-md-12 blog-post">
            <!-- Intro Start -->
            <div class="post-title margin-bottom-30">
                <h1>Let's take a look on <span class="main-color">My Work</span></h1>
            </div>
            <!-- Intro End -->
            <!-- Portfolio Start -->
            <div>
                <!-- Portfolio Detail Start -->
                <?if($projects_information):?>
                    <?foreach($projects_information as $pk => $pv):?>
                        <div class="row portfolio">
                            <div class="col-sm-6 custom-pad-1">
                                <div class="image-carousel">
                                    <?foreach($pv['images'] as $ik => $iv):?>
                                        <img src="<?=site_url('assets/files/proj_imgs/'.$iv->name_of_picture.'.'.$iv->picture_format) ?>" class="img-responsive" alt="image project">
                                    <?endforeach;?>
                                </div>
                            </div>
                            <div class="col-sm-6 custom-pad-2">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
        					            <tbody>
                                            <tr>
                                                <td>Skills</td>
                    							<td>
                                                    <?foreach($pv['skills'] as $sk => $sv):?>
                                                        <b> <?=strtoupper($sv->name_of_skill);?></b>/
                                                    <?endforeach;?>
                                                </td>
                  						    </tr>
                                            <tr>
                                                <td>Description</td>
                                                <td><?=$pv['description']?></td>
    						                </tr>
                                        </tbody>
        				            </table>
                                </div>
                            </div>
                        </div>
                    <?endforeach;?>
                <?endif;?>
                <!-- Portfolio Detail End -->
            </div>  
        </div>  
        <div class="col-md-12 text-center">
            <a href="javascript:void(0)" id="load-more-portfolio" class="load-more-button">
                Load
            </a>
            <div id="portfolio-end-message"></div>
        </div>
    </div>
</div>