<p id="back_to_home_link" class="back_link"><a href="index.php">&#60;&#60; Back to Home</a></p>
<div id="forgot_password_section">
    <div id="forgot_password_intro">
        <h2>Forgot Password?</h2>
        <p>Don't worry! Enter your email address and username, and we'll send you a new password</p>
        <p>Then, simplay edit your profile to reset your password.</p>
    </div>
    <form id="forgot_password_form" name="forgot_password_form" action="index.php?ssbw/forgotPassword" method="post">
        <label>Username:</label>
            <input type="text" name="forgot_password_username" id="forgot_password_username" /><br /> 
        <label>Email Address:</label>    
            <input type="text" name="forgot_password_email" id="forgot_password_email" /><br /> 
        <input id="forgot_password_button" class="ssbw_button" name="forgot_password_button" type="image" src="<?php echo base_url('assets/images/buttons/submit_button.png'); ?>" />
    </form>
</div>