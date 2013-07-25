<div id="book_intro">
    <h2 class="script_header">Book With Us!</h4>
    <h4 class="sub_header">Get Started Planning Your Wedding Today!</h4>
    <p>When you choose Sugar Sands Beach Weddings to help plan and coordinate your ceremony, you're choosing
        the best in service and in options for your destination wedding.</p>
    <p>Simply complete the Booking Request Form to the right to begin the booking process: Include your contact
        information and select the options and date that is best for you, and the Booking Team here at
        SSBW will review your request and will be in touch within 24 hours. This response will include
        the price quote for your selected options, and will address any issues that need resolving before
        planning for the big day can begin.</p>
    <p>For information about Date Restrictions and our Inclement Weather Policy, see our
        <a href="index.php?ssbw/view/terms_policies">Terms & Policies.</a></p>
</div> <!-- End Book_Intro Div -->
<div id="booking_form_section">
    <h3>Booking Request Form</h3>
    
    <div id="profile_info_labels">
        <ul id="name_labels">
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
    <div id="wedding_info_labels">
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
        <p id="wedding_notes_label">Wedding Notes:</p>
    </div> <!-- End Wedding_Info_Labels Div -->
    <form id="booking_form" action="index.php?ssbw/submitBookingForm" method="post">
        <input type="text" name="first_name" id="first_name" size="30" required /><br />
        <input type="text" name="last_name" id="last_name" size="30" required /><br />
        <input type="text" name="bride_name" id="bride_name" size="30" required /><br />
        <input type="text" name="groom_name" id="groom_name" size="30" required /><br />
        <input type="text" name="wedding_date" id="wedding_date" size="30" required /><br />
        <input type="text" name="address" id="address" size="30" required /><br />
        <select form="booking_form" name="state" id="state" required>
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
        <input type="text" name="zip_code" id="zip_code" size="5" maxlength="5" required /><br />
        <input type="text" name="phone_number" id="phone_number" size="30" required /><br />
        <input type="text" name="email" id="email" size="30" required /><br />
        <select form="booking_form" name="choose_package" id="choose_package" required>
                    <option selected="selected">Package...</option>
                    <?php
                        
                        $counter = 1;
                        
                        foreach($packages as $option) {
                            
                            echo '<option value="'.$option['packageName'].'">'.$option['packageName'].'</option>';
                            
                            $counter++;
                            
                        }
                    
                    ?>
                </select><br />
        <select form="booking_form" name="primary_color" id="primary_color" required>
                    <option selected="selected">Color...</option>
                    <?php
                        
                        $counter = 1;
                        
                        foreach($primary_colors as $option) {
                            
                            echo '<option value="'.$option['colorName'].'">'.$option['colorName'].'</option>';
                            
                            $counter++;
                            
                        }
                    
                    ?>
                </select><br />
        <select form="booking_form" name="secondary_color" id="secondary_color" required>
                    <option selected="selected">Color...</option>
                    <?php
                        
                        $counter = 1;
                        
                        foreach($secondary_colors as $option) {
                            
                            echo '<option value="'.$option['colorName'].'">'.$option['colorName'].'</option>';
                            
                            $counter++;
                            
                        }
                    
                    ?>
                </select><br />
        <input type="text" name="number_chairs" id="number_chairs" size="3" requuired /><br />
        <input type="text" name="number_guests" id="number_guests" size="3" required /><br />
        <select form="booking_form" name="floral_arrangement" id="floral_arrangement" required>
                    <option selected="selected">Arrangement Size...</option>
                    <?php
                        
                        $counter = 1;
                        
                        foreach($floral_arrangements as $option) {
                            
                            echo '<option value="'.$option['floralOptionName'].'">'.$option['floralOptionName'].'</option>';
                            
                            $counter++;
                            
                        }
                    
                    ?>
                </select><br />
        <select form="booking_form" name="music_package" id="music_package" required>
                    <option selected="selected">Music Package...</option>
                    <?php
                        
                        $counter = 1;
                        
                        foreach($music_packages as $option) {
                            
                            echo '<option value="'.$option['musicPackageName'].'">'.$option['musicPackageName'].'</option>';
                            
                            $counter++;
                            
                        }
                    
                    ?>
                </select><br />
        <select form="booking_form" name="photography_package" id="photography_package" required>
                    <option selected="selected">Photography Package...</option>
                    <?php
                        
                        $counter = 1;
                        
                        foreach($photo_packages as $option) {
                            
                            echo '<option value="'.$option['photoPackageName'].'">'.$option['photoPackageName'].'</option>';
                            
                            $counter++;
                            
                        }
                    
                    ?>
                </select><br />
        <textarea name="set_wedding_notes" id="set_wedding_notes" rows="5" cols="27" maxlength="125" value=""></textarea><br />
        <input id="send_booking_request_button" class="ssbw_button" name="send_booking_request_button" type="image" src="<?php echo base_url('assets/images/buttons/send_booking_request_button.png'); ?>" />
    </form>
</div> <!-- End Book_Form Div -->