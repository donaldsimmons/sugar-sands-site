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
    <p class="back_link"><a href="index.php?ssbw/member">&#60;&#60; Back to Profile</a></p>
    
    <h2 id="profile_header">Edit Profile Information</h2>
    
    <div id="profile_info_labels">
        <ul id="username_info_label">
            <li>Username:</li>
            <li>Password:</li>
            <li>First Name:</li>
            <li>Last Name:</li>
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
    <form id="edit_profile_form" action="index.php?ssbw/updateProfile" method="post">
        <input type="text" name="edit_username" id="edit_username" size="30" /><br />
        <input type="text" name="edit_password" id="edit_password" size="30" /><br />
        <input type="text" name="edit_first_name" id="edit_first_name" size="30" /><br />
        <input type="text" name="edit_last_name" id="edit_last_name" size="30" /><br />
        <input type="text" name="edit_bride_name" id="edit_bride_name" size="30" /><br />
        <input type="text" name="edit_groom_name" id="edit_groom_name" size="30" /><br />
        <input type="text" name="edit_wedding_date" id="edit_wedding_date" size="30" /><br />
        <input type="text" name="edit_address" id="edit_address" size="30" /><br />
        <select form="edit_profile_form" name="edit_state" id="edit_state">
                    <option selected="selected">State</option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select><br />
        <input type="text" name="edit_zip_code" id="edit_zip_code" size="30" /><br />
        <input type="text" name="edit_phone_number" id="edit_phone_number" size="30" /><br />
        <input type="text" name="edit_email" id="edit_email" size="30" /><br />
        <input class="ssbw_button" id="update_profile_button" name="update_profile_button" type="image" src="<?php echo base_url('assets/images/buttons/update_profile_button.png'); ?>" />
    </form>
</div> <!-- End Profile_Info_Section Div -->