<?php
    
    $user_id = $this->session->userdata('userId');
    
?>
<div class="member_subnav">
    <ul>
        <li class="current_page"><a href="index.php?ssbw/member">My Profile</a></li>
        <li><a href="index.php?ssbw/myWedding">My Wedding</a></li>
        <li><a href="index.php?ssbw/myGallery">My Gallery</a></li>
        <li><a href="index.php?ssbw/view/contact_ssbw">Contact SSBW</a></li>
    </ul>
</div> <!-- End Member_Subnav Div -->
<div id="profile_info_section">
    <h2 id="profile_header">Profile Information</h2>
    <a href="index.php?ssbw/view/edit_profile"><img id="edit_profile_button" class="ssbw_button" src="<?php echo base_url('assets/images/buttons/edit_profile_button.png'); ?>" title="Edit Profile Button" alt="Edit Profile Button" height="30" width="90" /></a>
    <div id="profile_info_labels">
        <ul id="username_info_label">
            <li>Username:</li>
        </ul>
        <ul id="wedding_day_info_labels">
            <li>Bride's Name:</li>
            <li>Groom's Name:</li>
            <li>Wedding Date:</li>
        </ul>
        <ul id="address_info_labels">
            <li>Address:</li>
            <li>State:</li>
            <li>ZIP Code:</li>
        </ul>
        <ul id="contact_info_labels">
            <li>Phone Number:</li>
            <li>Email Address:</li>
        </ul>
    </div> <!-- End Profile_Info_Labels Div -->
    <div id="profile_info_data">
        <ul id="username_info_label">
            <li><?php echo $username; ?></li>
        </ul>
        <ul id="wedding_day_info_data">
            <li><?php echo $bride; ?></li>
            <li><?php echo $groom; ?></li>
            <li><?php echo $weddingDate; ?></li>
        </ul>
        <ul id="address_info_data">
            <li><?php echo $address; ?></li>
            <li><?php echo $state; ?></li>
            <li><?php echo $zipCode; ?></li>
        </ul>
        <ul id="contact_info_data">
            <li><?php echo $phoneNumber; ?></li>
            <li><?php echo $email; ?></li>
        </ul>
    </div> <!-- End Profile_Info_Data Div -->
</div> <!-- End Profile_Info_Section Div -->