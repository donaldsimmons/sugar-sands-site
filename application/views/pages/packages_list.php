<div class="member_subnav">
    <ul>
        <li><a href="index.php?ssbw/memberList">Users</a></li>
        <li class="current_page"><a href="index.php?ssbw/packagesList">Packages</a></li>
        <li><a href="index.php?ssbw/dealsList">Deals</a></li>
    </ul>
</div> <!-- End Member_Subnav Div -->
<div id="packages_list_section">
    <h2>Packages</h2>
    <a href="index.php?ssbw/addPackage"><img id="new_package_button" class="ssbw_button" src="<?php echo base_url('assets/images/buttons/add_package_button.png'); ?>" title="Add New Package Button" alt="Add New Package Button" height="30" width="110" /></a>
    <div id="packages_list">
        <ul>
            <?php
                
                foreach($packages AS $package) {
                    
                    echo '<li class="admin_list_item" id="package_list_item"><a href="index.php?ssbw/checkPackageDetails/'.$package['packageId'].'">'.$package['name'].'</a><a href="index.php?ssbw/deletePackage/'.$package['packageId'].'" class="delete_button" >X</a></li>';
                    
                }
                
            ?>            
        </ul>
    </div>
</div> <!-- End Packages_List_Section -->