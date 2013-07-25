<div class="member_subnav">
    <ul>
        <li><a href="index.php?ssbw/memberList">Users</a></li>
        <li class="current_page"><a href="index.php?ssbw/packagesList">Packages</a></li>
        <li><a href="index.php?ssbw/dealsList">Deals</a></li>
    </ul>
</div> <!-- End Member_Subnav Div -->
<div id="add_package_section">
    <p class="back_link"><a href="index.php?ssbw/packagesList">&#60;&#60; Back to Packages</a></p>
    <h2>Add New Package</h2>
    <div id="add_package_labels">
        <ul id="package_info_labels">
            <li>Package Name:</li>
        </ul>
        <ul id="package_guests_labels">
            <li>Number Of Chairs:</li>
            <li>Number Of Guests:</li>
        </ul>
        <ul id="package_options_labels">
            <li>Floral Arrangement:</li>
            <li>Music Package:</li>
            <li>Photography Package:</li>
        </ul>
        <p id="package_description_label">Description:</p>
    </div> <!-- End Add_Package_Labels Div -->
    <form id="add_package_form" action="index.php?ssbw/createNewPackage" method="post">
        <input type="text" name="new_package_name" id="new_package_name" required /><br />
        <input type="text" name="new_package_number_chairs" id="new_package_number_chairs" size="3" maxlength="3" required /><br />
        <input type="text" name="new_package_number_guests" id="new_package_number_guests" size="3" maxlength="3" required /><br />
        <select form="add_package_form" name="new_package_floral_arrangement" id="new_package_floral_arrangement" required>
                    <option selected="selected">Arrangement Size...</option>
                        <?php
                            
                            $counter = 1;
                            
                            foreach($floral_arrangements as $option) {
                                
                                echo '<option value="'.$counter.'">'.$option['floralOptionName'].'</option>';
                                
                                $counter++;
                                
                            }
                               
                        ?>
                </select><br />
        <select form="add_package_form" name="new_package_music_package" id="new_package_music_package" required>
                    <option selected="selected">Music Package...</option>
                    <?php
                        
                        $counter = 1;
                        
                        foreach($music_packages as $option) {
                            
                            echo '<option value="'.$counter.'">'.$option['musicPackageName'].'</option>';
                            
                            $counter++;
                            
                        }
                    
                    ?>
                </select><br />
        <select form="add_package_form" name="new_package_photo_package" id="new_package_photo_package" required>
                    <option selected="selected">Photography Package...</option>
                    <?php
                        
                        $counter = 1;
                        
                        foreach($photo_packages as $option) {
                            
                            echo '<option value="'.$counter.'">'.$option['photoPackageName'].'</option>';
                            
                            $counter++;
                            
                        }
                    
                    ?>
                </select><br />
        <textarea name="new_package_description" id="new_package_description" rows="3" cols="25" maxlength="125" value="" required ></textarea><br />
        <input id="add_package_button" class="ssbw_button" name="add_package_button" type="image" src="<?php echo base_url('assets/images/buttons/add_package_button.png'); ?>" />
    </form>
</div> <!-- End Add_Package_Section -->