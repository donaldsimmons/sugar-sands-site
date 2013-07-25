<?php

    $user_id = $this->session->userdata('userId');
    
?>
<div class="member_subnav">
    <ul>
        <li><a href="index.php?ssbw/member">My Profile</a></li>
        <li class="current_page"><a href="index.php?ssbw/myWedding">My Wedding</a></li>
        <li><a href="index.php?ssbw/myGallery">My Gallery</a></li>
        <li><a href="index.php?ssbw/view/contact_ssbw">Contact SSBW</a></li>
    </ul>
</div> <!-- End Member_Subnav Div -->
<div id="wedding_info_section">
    <p class="back_link"><a href="index.php?ssbw/myWedding">&#60;&#60; Back to Wedding</a></p>
    
    <h2 id="profile_header">Edit Wedding Information</h2>
    
    <div id="wedding_info_labels">
        <ul id="edit_wedding_package_labels">
            <li>Package:</li>
            <li>Primary Color:</li>
            <li>Secondary Color:</li>
        </ul>
        <ul id="edit_wedding_options_labels">
            <li>Number Of Chairs:</li>
            <li>Number Of Guests:</li>
            <li>Floral Arrangement:</li>
            <li>Music Package:</li>
            <li>Photo Packages:</li>
        </ul>
        <p id="edit_wedding_notes_label">Wedding Notes:</p>
    </div> <!-- End Profile_Info_Labels Div -->
    <form id="edit_wedding_form" action="index.php?ssbw/submitWeddingChanges" method="post">
        <select form="edit_wedding_form" name="edit_package" id="edit_package">
                    <option selected="selected" value="">Package...</option>
                    <?php
                        
                        $counter = 1;
                        
                        foreach($packages as $option) {
                            
                            echo '<option value="'.$counter.'">'.$option['packageName'].'</option>';
                            
                            $counter++;
                            
                        }
                    
                    ?>
                </select><br />
        <select form="edit_wedding_form" name="edit_primary_color" id="edit_primary_color" >
                    <option selected="selected" value="">Color...</option>
                    <?php
                        
                        $counter = 1;
                        
                        foreach($primary_colors as $option) {
                            
                            echo '<option value="'.$counter.'">'.$option['colorName'].'</option>';
                            
                            $counter++;
                            
                        }
                    
                    ?>
                </select><br />
        <select form="edit_wedding_form" name="edit_secondary_color" id="edit_secondary_color" >
                    <option selected="selected" value="">Color...</option>
                    <?php
                        
                        $counter = 1;
                        
                        foreach($secondary_colors as $option) {
                            
                            echo '<option value="'.$counter.'">'.$option['colorName'].'</option>';
                            
                            $counter++;
                            
                        }
                    
                    ?>
                </select><br />
        <input type="text" name="edit_number_chairs" id="edit_number_chairs" size="3" /><br />
        <input type="text" name="edit_number_guests" id="edit_number_guests" size="3" /><br />
        <select form="edit_wedding_form" name="edit_floral_arrangement" id="edit_floral_arrangement" >
                    <option selected="selected" value="">Arrangement Size...</option>
                    <?php
                        
                        $counter = 1;
                        
                        foreach($floral_arrangements as $option) {
                            
                            echo '<option value="'.$counter.'">'.$option['floralOptionName'].'</option>';
                            
                            $counter++;
                            
                        }
                    
                    ?>
                </select><br />
        <select form="edit_wedding_form" name="edit_music_package" id="edit_music_package" >
                    <option selected="selected" value="">Music Package...</option>
                    <?php
                        
                        $counter = 1;
                        
                        foreach($music_packages as $option) {
                            
                            echo '<option value="'.$counter.'">'.$option['musicPackageName'].'</option>';
                            
                            $counter++;
                            
                        }
                    
                    ?>
                </select><br />
        <select form="edit_wedding_form" name="edit_photography_package" id="edit_photography_package">
                    <option selected="selected" value="">Photography Package...</option>
                    <?php
                        
                        $counter = 1;
                        
                        foreach($photo_packages as $option) {
                            
                            echo '<option value="'.$counter.'">'.$option['photoPackageName'].'</option>';
                            
                            $counter++;
                            
                        }
                    
                    ?>
                </select><br />
        <textarea name="edit_wedding_notes" id="edit_wedding_notes" rows="5" cols="27" maxlength="125" value=""></textarea><br />
        <input id="update_wedding_button" class="ssbw_button" name="update_wedding_button" type="image" src="<?php echo base_url('assets/images/buttons/update_wedding_button.png'); ?>" />
    </form>
</div> <!-- End Profile_Info_Section Div -->