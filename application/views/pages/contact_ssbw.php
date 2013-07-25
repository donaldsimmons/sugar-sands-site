<div class="member_subnav">
    <ul>
        <li><a href="index.php?ssbw/member">My Profile</a></li>
        <li><a href="index.php?ssbw/myWedding">My Wedding</a></li>
        <li><a href="index.php?ssbw/myGallery">My Gallery</a></li>
        <li class="current_page"><a href="index.php?ssbw/view/contact_ssbw">Contact SSBW</a></li>
    </ul>
</div> <!-- End Member_Subnav Div -->
<div id="contact_section">
    <h2 id="contact_header">Contact Us</h2>
    <form id="contact_ssbw_form" action="index.php?ssbw/contactSSBW" method="post" enctype="text/plain">
        <input type="text" id="member_name" name="member_name" value="Your Name" size="40" required /><br />
        <input type="email" id="member_email" name="member_email" value="Your Email" size="40" required /><br />
        <input type="text" id="email_subject" name="email_subject" value="Subject" size="40" required /><br />
        <textarea name="contact_ssbw_text" id="contact_ssbw_text" rows="5" cols="53" ></textarea><br />
        <input id="contact_SSBW_button" class="ssbw_button" name="contact_SSBW_button" type="image" src="<?php echo base_url('assets/images/buttons/submit_button.png'); ?>" />
    </form>
</div> <!-- End Contact_Section Div -->