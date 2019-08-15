<div class="hidden-sm hidden-xs">
    <div class="religion-matrimonials margin-top-20px">
    <h4 class="font1">Catholic Community Matrimonials</h4>
    <hr class="hrmarsetting">
    <div class="listofsection">
        <?php 
        if(isset($matrimony_name_list_religion) && $matrimony_name_list_religion!='' && is_array($matrimony_name_list_religion) && count($matrimony_name_list_religion) > 0){
            foreach($matrimony_name_list_religion as $matrimony_name_list_religion_name){?>
            <a href="<?php echo base_url();?>matrimony/<?php if(isset($matrimony_name_list_religion_name['matrimony_name']) && $matrimony_name_list_religion_name['matrimony_name']!=''){ echo str_ireplace(" ","-",$matrimony_name_list_religion_name['matrimony_name']);}?>-matrimony" title="" >
                
                <?php if(isset($matrimony_name_list_religion_name['matrimony_name']) && $matrimony_name_list_religion_name['matrimony_name']!=''){ echo str_replace("-"," ",$matrimony_name_list_religion_name['matrimony_name']);}?> Matrimony
                <i class="fa fa-play pull-right play-f"></i>
            </a>
            <?php 
            }?>
            <div class="moretag">
                <a href="<?php echo base_url();?>more-details/religion" title="">View More</a>
            </div>
            <?php }?>
        </div>
    </div>
    <div class="religion-matrimonials margin-top-20px">
        <h4 class="font1">Diocese Matrimonials</h4>
        <hr class="hrmarsetting">
        <div class="listofsection">
            <?php 
            if(isset($matrimony_name_list_caste) && $matrimony_name_list_caste!='' && is_array($matrimony_name_list_caste) && count($matrimony_name_list_caste) > 0)
            {
                foreach($matrimony_name_list_caste as $matrimony_name_list_caste_name)
                { 
                ?>
                <a href="<?php echo base_url();?>matrimony/<?php if(isset($matrimony_name_list_caste_name['matrimony_name']) && $matrimony_name_list_caste_name['matrimony_name']!=''){ echo str_ireplace(" ","-",$matrimony_name_list_caste_name['matrimony_name']);}?>-matrimony" title="">
                    
                    <?php if(isset($matrimony_name_list_caste_name['matrimony_name']) && $matrimony_name_list_caste_name['matrimony_name']!=''){echo str_replace("-"," ",$matrimony_name_list_caste_name['matrimony_name']);}?> Matrimony
                    <i class="fa fa-play pull-right play-f"></i>
                </a>
                <?php 
                }?>
                <div class="moretag">
                    <a href="<?php echo base_url();?>more-details/Caste" title="">View More</a>
                </div>
            <?php }?>
        </div>
    </div>
    <div class="religion-matrimonials margin-top-20px">
        <h4 class="font1">Country Matrimonials</h4>
        <hr class="hrmarsetting">
        <div class="listofsection">
            <?php 
            if(isset($matrimony_name_list_country) && $matrimony_name_list_country!='' && is_array($matrimony_name_list_country) && count($matrimony_name_list_country) > 0)
            {
                foreach($matrimony_name_list_country as $matrimony_name_list_country_name)
                { 
                ?>
                <a href="<?php echo base_url();?>matrimony/<?php if(isset($matrimony_name_list_country_name['matrimony_name']) && $matrimony_name_list_country_name['matrimony_name']!=''){ echo str_ireplace(" ","-",$matrimony_name_list_country_name['matrimony_name']); }?>-matrimony">
                    <?php if(isset($matrimony_name_list_country_name['matrimony_name']) && $matrimony_name_list_country_name['matrimony_name']!=''){ echo str_replace("-"," ",$matrimony_name_list_country_name['matrimony_name']);}?> Matrimony
                    <i class="fa fa-play pull-right play-f"></i>
                </a>
                <?php 
                }?>
                <div class="moretag">
                    <a href="<?php echo base_url();?>more-details/country">View More</a>
                </div>
            <?php }?>
        </div>
    </div>
    <div class="religion-matrimonials margin-top-20px">
        <h4 class="font1">Mother Tongue Matrimonials</h4>
        <hr class="hrmarsetting">
        <div class="listofsection">
            <?php
            if(isset($matrimony_name_list_mtong) && $matrimony_name_list_mtong!='' && is_array($matrimony_name_list_mtong) && count($matrimony_name_list_mtong) > 0)
            { 
                foreach($matrimony_name_list_mtong as $key=>$matrimony_name_list_mtong_name)
                { 
                ?>
                <a href="<?php echo base_url();?>matrimony/<?php if(isset($matrimony_name_list_mtong_name['matrimony_name']) && $matrimony_name_list_mtong_name['matrimony_name']!=''){ echo str_ireplace(" ","-",$matrimony_name_list_mtong_name['matrimony_name']);}?>-matrimony">
                    
                    <?php if(isset($matrimony_name_list_mtong_name['matrimony_name']) && $matrimony_name_list_mtong_name['matrimony_name']!=''){ echo str_replace("-"," ",$matrimony_name_list_mtong_name['matrimony_name']);}?> Matrimony
                    <i class="fa fa-play pull-right play-f"></i>
                </a>
                <?php 
                }?>
                <div class="moretag">
                    <a href="<?php echo base_url();?>more-details/Mother-Tongue">View More</a>
                </div>
                <?php
            }?>
        </div>
    </div>
</div>