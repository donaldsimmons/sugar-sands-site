<div class="member_subnav">
    <ul>
        <li><a href="index.php?ssbw/memberList">Users</a></li>
        <li><a href="index.php?ssbw/packagesList">Packages</a></li>
        <li class="current_page"><a href="index.php?ssbw/dealsList">Deals</a></li>
    </ul>
</div> <!-- End Member_Subnav Div -->
<div id="deals_list_section">
    <h2>Deals</h2>
    <a href="index.php?ssbw/addDeal"><img id="new_deal_button" class="ssbw_button" src="<?php echo base_url('assets/images/buttons/add_deal_button.png'); ?>" title="Add New Deal Button" alt="Add New Deal Button" height="30" width="110" /></a>
    <div id="packages_list">
        <ul>
            <?php
                
                foreach($deals as $deal) {
                    
                    echo '<li class="admin_list_item" id="deal_list_item"><a href="index.php?ssbw/checkDealsDetails/'.$deal['packageId'].'">'.$deal['name'].'</a><a href="index.php?ssbw/deleteDeal/'.$deal['packageId'].'" class="delete_button" >X</a></li>';
                    
                }
                
            ?>
        </ul>
    </div>
</div> <!-- End Deals_List_Section -->