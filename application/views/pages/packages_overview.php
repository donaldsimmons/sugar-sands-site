<?php
    
    echo '<div id="deal_of_month">
            <h2 id="deal_of_month_header" class="script_header">Deal of the Month</h2>
            <div id="deal_banner">
                <h3>SALE - '.$discount.'% OFF</h3>
            </div>    
            <div id="deal_of_month_description" class="package_description">
                <img class="package_image" src="'.base_url('assets/images/tiki_basic.png').'" title="Arch Photo" alt="Photo of Wedding Arch on Beach" width="125" height="175" />
                <div class="description_text">
                    <h2 class="package_header">'.$packageName.'</h2>
                    <p class="package_description">'.$description.'</p>
                </div>
            </div>
            <div id="deal_of_month_list" class="includes_list">
                <p>Includes:</p>
                <ul>
                    <li>- '.$photos.'</li>
                    <li>- '.$chairs.' chairs</li>
                    <li>- Up to '.$guests.' guests</li>
                </ul>
            </div>
            <a href="index.php?ssbw/packageDetails/'.$packageId.'"><img id="see_details_button" class="ssbw_button" src="'.base_url('assets/images/buttons/see_details_button.png').'" title="See Details Button" alt="See Details Button" height="30" width="110" /></a>
    </div>
';
    
?>
<div id="packages_summary">
    <h3 class="script_header summary_header">Packages</h3>
    <p class="summary_text">At Sugar Sands Beach Weddings, we offer a number of inclusive packages, designed to fit
        any need. From color scheme to the size of your guest list, our packages are completely
        customizable. This allows you, our client to have a hands on role in planning and selecting
        the perfect options for your big day!</p>
    <a href="index.php?ssbw/packages"><img id="view_packages_button" class="ssbw_button" src="<?php echo base_url('assets/images/buttons/view_packages_button.png'); ?>" title="View Packages Button" alt="View Packages Button" height="30" width="110" /></a>
</div> <!-- End Packages_Summary_Div -->
<div id="deals_summary">
    <h3 class="script_header summary_header">Deals</h3>
    <p class="summary_text">Our deals are a great way to plan the perfect ceremony on a budget. Choose the package
        that is right for you, and let us take care of the rest! A simple, hassle-free way plan and
        coordinate large or small gatherings, check out the fantastic bargains we have ready for
        you!</p>
    <a href="index.php?ssbw/deals"><img id="view_deals_button" class="ssbw_button" src="<?php echo base_url('assets/images/buttons/view_deals_button.png'); ?>" title="View Deals Button" alt="View Deals Button" height="30" width="110" /></a>
</div> <!-- End Deals_Summary Div -->