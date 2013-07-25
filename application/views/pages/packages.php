<?php
    
    $counter = 1;
    
    foreach($packages as $package) {
        
        echo '<div class="package_section" id="package'.$counter.'">
            <div class="package_description">
                <img class="package_image" src="'.base_url('assets/images/tiki_basic.png').'" title="Arch Photo" alt="Photo of Wedding Arch on Beach" width="125" height="175" />
                <div class="description_text">
                    <h2 class="package_header">'.$package['packageName'].'</h2>
                    <p class="package_description">'.$package['description'].'</p>
                </div>
            </div>
            <div class="includes_list">
                <p>Includes:</p>
                <ul>
                    <li>- '.$package['photos'].'</li>
                    <li>- '.$package['chairs'].' chairs</li>
                    <li>- Up to '.$package['guests'].' guests</li>
                </ul>
            </div>
            <a href="index.php/ssbw/view/edit_profile"><img class="ssbw_button package_detail_button" src="'.base_url('assets/images/buttons/see_details_button.png').'" title="See Details Button" alt="See Details Button" height="30" width="110" /></a>
        </div>';
        
        $counter++;
    }
    
?>