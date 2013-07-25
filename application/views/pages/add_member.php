<div class="member_subnav">
    <ul>
        <li class="current_page"><a href="index.php?ssbw/memberList">Users</a></li>
        <li><a href="index.php?ssbw/packagesList">Packages</a></li>
        <li><a href="index.php?ssbw/dealsList">Deals</a></li>
    </ul>
</div> <!-- End Member_Subnav Div -->
<div id="add_member_section">
    <p class="back_link"><a href="index.php?ssbw/memberList">&#60;&#60; Back to Users</a></p>
    <h2>Add New Member</h2>
    <div id="add_member_labels">
        <h3 id="profile_info_subheader" class="sub_header">Profile Info</h3>
        <ul id="login_info">
            <li>Username:</li>
            <li>Password:</li>
        </ul>
        <ul id="member_profile_info_labels">
            <li>First Name:</li>
            <li>Last Name:</li>
            <li>Bride's Name:</li>
            <li>Groom's Name:</li>
            <li>Wedding Date:</li>
        </ul>
        <ul id="member_address_info_labels">
            <li>Address:</li>
            <li>State:</li>
            <li>ZIP Code:</li>
        </ul>
        <ul id="member_contact_info_labels">
            <li>Phone Number:</li>
            <li>Email Address:</li>
        </ul>
        <h3 id="wedding_info_subheader" class="sub_header">Wedding Info</h3>
        <ul id="member_package_info">
            <li>Package:</li>
            <li>Primary Color:</li>
            <li>Secondary Color:</li>
        </ul>
        <ul id="member_guests_labels">
            <li>Number Of Chairs:</li>
            <li>Number Of Guests:</li>
        </ul>
        <ul id="member_wedding_options_labels">
            <li>Floral Arrangement:</li>
            <li>Music Package:</li>
            <li>Photography:</li>
        </ul>
        <p id="member_wedding_notes_label">Wedding Notes:</p>
    </div> <!-- End Add_Member_Lables Div -->
    <form id="add_member_form" action="index.php?ssbw/createNewMember" method="post">
        <input type="text" name="new_username" id="new_username" size="30" /><br />
        <input type="text" name="new_password" id="new_password" size="30" /><br />
        <input type="text" name="new_first_name" id="new_first_name" size="30" /><br />
        <input type="text" name="new_last_name" id="new_last_name" size="30" /><br />
        <input type="text" name="new_bride_name" id="new_bride_name" size="30" /><br />
        <input type="text" name="new_groom_name" id="new_groom_name" size="30" /><br />
        <input type="text" name="new_wedding_date" id="new_wedding_date" size="30" /><br />
        <input type="text" name="new_address" id="new_address" size="30" /><br />
        <select form="add_member_form" name="new_state" id="new_state">
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
        <input type="text" name="new_zip_code" id="new_zip_code" size="5" /><br />
        <input type="text" name="new_phone_number" id="new_phone_number" size="30" /><br />
        <input type="text" name="new_email" id="new_email" size="30" /><br />
        <select form="add_member_form" name="new_package" id="new_package" required>
                    <option selected="selected">Package...</option>
                    <?php
                        
                        $counter = 1;
                        
                        foreach($packages as $option) {
                            
                            echo '<option value="'.$counter.'">'.$option['packageName'].'</option>';
                            
                            $counter++;
                            
                        }
                    
                    ?>
                </select><br />
        <select form="add_member_form" name="new_primary_color" id="new_primary_color" required>
                    <option selected="selected">Color...</option>
                    <?php
                        
                        $counter = 1;
                        
                        foreach($primary_colors as $option) {
                            
                            echo '<option value="'.$counter.'">'.$option['colorName'].'</option>';
                            
                            $counter++;
                            
                        }
                    
                    ?>
                </select><br />
        <select form="add_member_form" name="new_secondary_color" id="new_secondary_color" required>
                    <option selected="selected">Color...</option>
                    <?php
                        
                        $counter = 1;
                        
                        foreach($secondary_colors as $option) {
                            
                            echo '<option value="'.$counter.'">'.$option['colorName'].'</option>';
                            
                            $counter++;
                            
                        }
                    
                    ?>
                </select><br />
        <input type="text" name="new_number_chairs" id="new_number_chairs" size="3" maxlength="3" required /><br />
        <input type="text" name="new_number_guests" id="new_number_guests" size="3" maxlength="3" required /><br />
        <select form="add_member_form" name="new_floral_arrangement" id="new_floral_arrangement" required>
                    <option selected="selected">Arrangement Size...</option>
                        <?php
                            
                            $counter = 1;
                            
                            foreach($floral_arrangements as $option) {
                                
                                echo '<option value="'.$counter.'">'.$option['floralOptionName'].'</option>';
                                
                                $counter++;
                                
                            }
                               
                        ?>
                </select><br />
        <select form="add_member_form" name="new_music_package" id="new_music_package" required>
                    <option selected="selected">Music Package...</option>
                    <?php
                        
                        $counter = 1;
                        
                        foreach($music_packages as $option) {
                            
                            echo '<option value="'.$counter.'">'.$option['musicPackageName'].'</option>';
                            
                            $counter++;
                            
                        }
                    
                    ?>
                </select><br />
        <select form="add_member_form" name="new_photo_package" id="new_photo_package" required>
                    <option selected="selected">Photography Package...</option>
                    <?php
                        
                        $counter = 1;
                        
                        foreach($photo_packages as $option) {
                            
                            echo '<option value="'.$counter.'">'.$option['photoPackageName'].'</option>';
                            
                            $counter++;
                            
                        }
                    
                    ?>
                </select><br />
        <textarea name="new_wedding_notes" id="new_wedding_notes" rows="3" cols="25" maxlength="125" value=""></textarea><br />
        <input id="add_member_button" class="ssbw_button" name="add_member_button" type="image" src="<?php echo base_url('assets/images/buttons/add_member_button.png'); ?>" />
    </form>
</div> <!-- End Add_Member_Section -->