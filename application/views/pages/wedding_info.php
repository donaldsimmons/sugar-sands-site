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
    <h2 id="profile_header">Wedding Information</h2>
    <a href="index.php?ssbw/editWedding"><img id="edit_wedding_button" class="ssbw_button" src="<?php echo base_url('assets/images/buttons/edit_wedding_button.png'); ?>" title="Edit Wedding Button" alt="Edit Wedding Button" height="30" width="110" /></a>
    <div id="wedding_info_labels">
        <ul id="wedding_date_label">
            <li>Wedding Date:</li>
        </ul>
        <ul id="wedding_package_labels">
            <li>Package:</li>
            <li>Primary Color:</li>
            <li>Secondary Color:</li>
        </ul>
        <ul id="wedding_options_labels">
            <li>Number Of Chairs:</li>
            <li>Number Of Guests:</li>
            <li>Floral Arrangement:</li>
            <li>Music Package:</li>
            <li>Photo Packages:</li>
        </ul>
        <p id="wedding_notes">Wedding Notes:</p>
    </div> <!-- End Profile_Info_Labels Div -->
    <div id="wedding_info_data">
        <ul id="wedding_date_data">
            <li><?php echo $this->session->userdata('weddingDate'); ?></li>
        </ul>
        <ul id="wedding_package_data">
            <li><?php echo $package; ?></li>
            <li><?php echo $primaryColor; ?></li>
            <li><?php echo $secondaryColor; ?></li>
        </ul>
        <ul id="wedding_options_data">
            <li><?php echo $chairs; ?></li>
            <li><?php echo $guests; ?></li>
            <li><?php echo $floralOption; ?></li>
            <li><?php echo $music; ?></li>
            <li><?php echo $photos; ?></li>
        </ul>
        <?php
            if($notes == NULL) {
                echo '<p id="wedding_notes_data">None</p>';
            }else{
                echo '<p id="wedding_notes_data">'.$notes.'</p>';
            }
        ?>
        
    </div> <!-- End Wedding_Info_Data Div -->
</div> <!-- End Profile_Info_Section Div -->