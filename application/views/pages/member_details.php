<div id="member_details_subnav" class="member_subnav">
    <ul>
        <li class="current_page"><a href="index.php?ssbw/memberList">Users</a></li>
        <li><a href="index.php?ssbw/packagesList">Packages</a></li>
        <li><a href="index.php?ssbw/dealsList">Deals</a></li>
    </ul>
</div> <!-- End Member_Details_Subnav Div -->
<p id="member_details_back_link" class="back_link"><a href="index.php?ssbw/memberList">&#60;&#60; Back to Members</a></p>
<div id="member_profile_info_section">
    <h2>Profile Information</h2>
    <div id="member_profile_labels">
        <ul id="member_wedding_day_labels">
            <li>Username:</li>
            <li>Bride's Name:</li>
            <li>Groom's Name:</li>
            <li>Wedding Date:</li>
        </ul>
        <ul id="member_address_labels">
            <li>Address:</li>
            <li>State:</li>
            <li>ZIP Code:</li>
        </ul>
        <ul id="member_contact_labels">
            <li>Phone Number:</li>
            <li>Email Address:</li>
        </ul>
    </div> <!-- End Member_Profile_Labels Div -->
    <div id="member_profile_data">
        <ul id="member_wedding_day_data">
            <li><?php echo $username; ?></li>
            <li><?php echo $profile_info['bride']; ?></li>
            <li><?php echo $profile_info['groom']; ?></li>
            <li><?php echo $profile_info['weddingDate']; ?></li>
        </ul>
        <ul id="member_address_data">
            <li><?php echo $profile_info['address']; ?></li>
            <li><?php echo $profile_info['state']; ?></li>
            <li><?php echo $profile_info['zipCode']; ?></li>
        </ul>
        <ul id="member_contact_data">
            <li><?php echo $profile_info['phoneNumber']; ?></li>
            <li><?php echo $profile_info['email']; ?></li>
        </ul>
    </div> <!-- End Member_Profile_Data Div -->
</div> <!-- End Member_Profile_Info_Section Div -->
<div id="member_wedding_info_section">
    <h2>Wedding Information</h2>
    <a href="<?php echo 'index.php?ssbw/editMemberWedding/'.$userId; ?>"><img id="edit_member_wedding_button" class="ssbw_button" src="<?php echo base_url('assets/images/buttons/edit_wedding_button.png'); ?>" title="Edit Wedding Button" alt="Edit Wedding Button" height="30" width="110" /></a>
    <?php
        
        if(!empty($weddingChanges)) {
            
            echo '<img id="change_indicator" src="'.base_url('assets/images/buttons/changes_indicator.png').'" />';
            
        }
        
    ?>
    <div id="member_wedding_labels">
        <ul id="wedding_package_label">
            <li>Package:</li>
        </ul>
        <ul id="member_wedding_options_labels">
            <li>Primary Color:</li>
            <li>Secondary Color:</li>
            <li>Number Of Chairs:</li>
            <li>Number Of Guests:</li>
            <li>Floral Arrangement:</li>
            <li>Music Package:</li>
            <li>Photo Packages:</li>
        </ul>
        <p id="member_wedding_notes_label">Wedding Notes:</p>
    </div> <!-- End Member_Wedding_Labels Div -->
    <div id="member_wedding_data">
        <ul id="member_wedding_package_data">
            <li><?php echo $wedding_info['package']; ?></li>
        </ul>
        <ul id="member_wedding_options_data">
            <li><?php echo $wedding_info['primaryColor']; ?></li>
            <li><?php echo $wedding_info['secondaryColor']; ?></li>
            <li><?php echo $wedding_info['chairs']; ?></li>
            <li><?php echo $wedding_info['guests']; ?></li>
            <li><?php echo $wedding_info['floralOption']; ?></li>
            <li><?php echo $wedding_info['music']; ?></li>
            <li><?php echo $wedding_info['photos']; ?></li>
        </ul>
        <?php
            if($wedding_info['notes'] == NULL) {
                echo '<p id="member_wedding_notes_data">None</p>';
            }else{
                echo '<p id="member_wedding_notes_data">'.$wedding_info['notes'].'</p>';
            }
        ?> 
    </div> <!-- End Wedding_Info_Data Div -->
</div> <!-- End Member_Wedding_Info_Section Div -->
<div id="member_gallery_info_section">
    <h2>Custom Gallery</h2>
    <?php
        
        $counter = 1;
        if($gallery_info['galleryId']) {
            $gallery_id = $gallery_info['galleryId'];
        }
        
        
        if(empty($gallery_info)) {
           
            echo '<p id="member_gallery_message">No Gallery Images Available</p>';
            
        }else{
            
            echo '<ul id="member_gallery_list">';
            
            foreach($gallery_info as $key=>$image) {
                
                if( !empty($image) ) {
                    
                    if($key != "userId" && $key != "galleryId") {
                        
                        echo '<li class="admin_list_item">'.$counter.'. '.$image.'</li>';
                        
                        $counter++;
                        
                    }
                }
                
            }
            
            echo '</ul>';
            
        }
        
    ?>
    <div id="add_member_image_section">
        <h4>Add Image</h4>
        <form id="add_member_image_form" action="<?php echo 'index.php?ssbw/addGalleryImage/'.$userId; ?>" method="post">
            <label for="member_gallery_image_url">Image URL:</label>
            <input type="text" name="member_gallery_image_url" id="member_gallery_image_url" size="48" required />
            <input id="add_image_button" class="ssbw_button" name="add_image_button" type="image" src="<?php echo base_url('assets/images/buttons/add_image_button.png'); ?>" />
        </form>
    </div>
</div> <!-- End Member_Gallery_Info_Section Div -->