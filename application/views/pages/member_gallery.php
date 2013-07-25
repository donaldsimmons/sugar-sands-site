<div class="member_subnav">
    <ul>
        <li><a href="index.php?ssbw/member">My Profile</a></li>
        <li><a href="index.php?ssbw/myWedding">My Wedding</a></li>
        <li class="current_page"><a href="index.php?ssbw/myGallery">My Gallery</a></li>
        <li><a href="index.php?ssbw/view/contact_ssbw">Contact SSBW</a></li>
    </ul>
</div> <!-- End Member_Subnav Div -->
<div id="user_gallery_section">
    <?php
    
        if(!isset($url_1)) {
            
            echo '<p>Sorry, but you have no images to display.</p>';
            
        }else{
            echo '<div id="member_thumb_images">
        <div id="member_thumbs_row_1">
            <img id="member_photo_thumb_1" class="thumbnail_gallery_image" src="'.base_url('assets/images/gallery/bride_groom_sunset.png').'" title="Bride and Groom Face the Sunset" alt="Bride and Groom Face the Sunset" width="60" height="50">
            <img id="member_photo_thumb_2" class="thumbnail_gallery_image" src="'.base_url('assets/images/gallery/sunset_pier.png').'" title="The Pier Stands Out Against the Sunset" alt="The Pier Stands Out Against the Sunset" width="60" height="50">
        </div>
        <div id="member_thumbs_row_2">
            <img id="member_photo_thumb_3" class="thumbnail_gallery_image" src="'.base_url('assets/images/gallery/flower.png').'" title="Bouquet in the Sand" alt="Bouquet in the Sand" width="60" height="50">
            <img id="member_photo_thumb_4" class="thumbnail_gallery_image" src="'.base_url('assets/images/gallery/blue_wedding_setup.png').'" title="Wedding Setup Seen Through the Dunes" alt="Wedding Setup Seen Through the Dunes" width="60" height="50">
        </div>
        <div id="member_thumbs_row_3">
            <img id="member_photo_thumb_5" class="thumbnail_gallery_image" src="'.base_url('assets/images/gallery/sunset_kiss.png').'" title="Sunset Kiss" alt="Sunset Kiss" width="60" height="50">
            <img id="member_photo_thumb_6" class="thumbnail_gallery_image" src="'.base_url('assets/images/gallery/bamboo_arch_side.png').'" title="SSBW&apos;s Bamboo Arch Package" alt="SSBW&apos;s Bamboo Arch Package" width="60" height="50">
        </div>
    </div>       
    <img id="member_selected_image" class="selected_gallery_image" src="'.base_url('assets/images/gallery/bride_groom_sunset.png').'" title="Sunset" alt="Sunset" width="300" height="225">
            
            ';
        }
    
    ?>
</div> <!-- End Gallery Section -->