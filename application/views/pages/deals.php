<?php
    
    $counter = 1;
    
    foreach($deals as $deal) {
        
        echo '<div class="package_section" id="deal'.$counter.'">
            <div class="package_description">
                <img class="package_image" src="'.base_url('assets/images/tiki_basic.png').'" title="Arch Photo" alt="Photo of Wedding Arch on Beach" width="125" height="175" />
                <div class="description_text">
                    <h2 class="package_header">'.$deal['packageName'].'</h2>
                    <p class="package_description">'.$deal['description'].'</p>
                </div>
            </div>
            <div class="includes_list">
                <p>Includes:</p>
                <ul>
                    <li>- '.$deal['photos'].'</li>
                    <li>- '.$deal['chairs'].' chairs</li>
                    <li>- Up to '.$deal['guests'].' guests</li>
                </ul>
            </div>
            <a href="index.php?ssbw/dealDetails/'.$deal['packageId'].'"><img class="ssbw_button package_detail_button" src="'.base_url('assets/images/buttons/see_details_button.png').'" title="See Details Button" alt="See Details Button" height="30" width="110" /></a>
        </div>';
        
        $counter++;
    }