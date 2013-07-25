<div class="member_subnav">
    <ul>
        <li><a href="index.php?ssbw/memberList">Users</a></li>
        <li><a href="index.php?ssbw/packagesList">Packages</a></li>
        <li class="current_page"><a href="index.php?ssbw/dealsList">Deals</a></li>
    </ul>
</div> <!-- End Member_Subnav Div -->
<div id="add_deal_section">
    <p class="back_link"><a href="index.php?ssbw/dealsList">&#60;&#60; Back to Deals</a></p>
    <h2>Add New Deal</h2>
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
        <ul id="deal_info_labels">
            <li>Discount:</li>
            <li>Deal of the Month:</li>
        </ul>
        <p id="package_description_label">Description:</p>
    </div> <!-- End Add_Package_Labels Div -->
    <form id="add_deal_form" action="index.php?ssbw/createNewDeal" method="post">
        <input type="text" name="new_deal_package_name" id="new_deal_package_name" required /><br />
        <input type="text" name="new_deal_number_chairs" id="new_deal_number_chairs" size="3" maxlength="3" required /><br />
        <input type="text" name="new_deal_number_guests" id="new_deal_number_guests" size="3" maxlength="3" required /><br />
        <select form="add_deal_form" name="new_deal_floral_arrangement" id="new_deal_floral_arrangement" required>
                    <option selected="selected">Arrangement Size...</option>
                        <?php
                            
                            $counter = 1;
                            
                            foreach($floral_arrangements as $option) {
                                
                                echo '<option value="'.$counter.'">'.$option['floralOptionName'].'</option>';
                                
                                $counter++;
                                
                            }
                               
                        ?>
                </select><br />
        <select form="add_deal_form" name="new_deal_music_package" id="new_deal_music_package" required>
                    <option selected="selected">Music Package...</option>
                    <?php
                        
                        $counter = 1;
                        
                        foreach($music_packages as $option) {
                            
                            echo '<option value="'.$counter.'">'.$option['musicPackageName'].'</option>';
                            
                            $counter++;
                            
                        }
                    
                    ?>
                </select><br />
        <select form="add_deal_form" name="new_deal_photo_package" id="new_deal_photo_package" required>
                    <option selected="selected">Photography Package...</option>
                    <?php
                        
                        $counter = 1;
                        
                        foreach($photo_packages as $option) {
                            
                            echo '<option value="'.$counter.'">'.$option['photoPackageName'].'</option>';
                            
                            $counter++;
                            
                        }
                    
                    ?>
                </select><br />
        <input type="text" name="new_deal_discount" id="new_deal_discount" size="2" maxlength="2" required /><br />
        <select form="add_deal_form" name="new_deal_of_month" id="new_deal_of_month" required>
            <option value="2" selected="selected">No</option>
            <option value="1">Yes</option>
        </select><br />
        <textarea name="new_deal_description" id="new_deal_description" rows="3" cols="25" maxlength="125" value="" required ></textarea><br />
        <input id="add_deal_button" class="ssbw_button" name="add_deal_button" type="image" src="<?php echo base_url('assets/images/buttons/add_deal_button.png'); ?>" />
    </form>
</div> <!-- End Add_Package_Section -->