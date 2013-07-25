<div class="package_section" id="detail_section">
    <p class="back_link"><a href="index.php?ssbw/deals">&#60;&#60; Back to Deals</a></p>
    <div class="package_description">
        <h2 id="detail_header"><?php echo $packageName; ?></h2>
        <div id="package_details_description">
            <img id="package_details_image" class="package_image" src="<?php echo base_url('assets/images/tiki_basic.png'); ?>" title="Arch Photo" alt="Photo of Wedding Arch on Beach" width="125" height="175" />
            <p id="package_detail_text" class="package_description"><?php echo $description; ?></p>
        </div>
    </div>
    <div id="services_list">
        <h4>Included Options</h4>
        <div id="options_list">
            <h5>Number Of Chairs</h5>
            <p class="option_data"><?php echo 'Up to '.$chairs; ?></p>
            <h5>Number Of Guests</h5>
            <p class="option_data"><?php echo 'Up to '.$guests; ?></p>
            <h5>Floral Arrangement</h5>
            <p class="option_data"><?php echo $floralOption; ?></p>
            <h5>Music</h5>
            <p class="option_data"><?php echo $music; ?></p>
            <h5>Photography</h5>
            <p id="photo_option_data" class="option_data"><?php echo $photos; ?></p>
        </div>
    </div>
</div>