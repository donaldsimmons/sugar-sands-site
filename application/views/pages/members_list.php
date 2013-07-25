<div id="admin_subnav" class="member_subnav">
    <ul>
        <li class="current_page"><a href="index.php?ssbw/memberList">Users</a></li>
        <li><a href="index.php?ssbw/packagesList">Packages</a></li>
        <li><a href="index.php?ssbw/dealsList">Deals</a></li>
    </ul>
</div> <!-- End Member_Subnav Div -->
<div id="member_list_section">
    <h2>Members</h2>
    <a href="index.php?ssbw/addMember"><img id="new_member_button" class="ssbw_button" src="<?php echo base_url('assets/images/buttons/add_member_button.png'); ?>" title="See Details Button" alt="See Details Button" height="30" width="110" /></a>
    <div id="members_list">
        <ul>
            <?php
                
                foreach($members AS $member) {
                    
                    echo '<li class="admin_list_item" id="member_list_item"><a href="index.php?ssbw/memberDetails/'.$member['userId'].'" class="member_name">'.$member['fullName'].'</a><a href="index.php?ssbw/deleteMember/'.$member['userId'].'" class="delete_button" >X</a></li>';
                    
                }
                
            ?>
        </ul>
    </div>
</div> <!-- End Member_List_Section Div -->
<div id="upcoming_weddings_section">
    <h3>Upcoming Weddings</h3>
</div> <!-- End Upcoming_Weddings Div -->