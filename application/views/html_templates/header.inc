<!DOCTYPE HTML>
<html>
    <head>
        <title>Sugar Sands Beach Weddings - Beautiful Beach Weddings at Affordable Prices</title>
        <meta name="description" content="DesignShare allows you to find and share artwork and design that moves you.">
        
        <link href="<?php echo base_url('assets/images/ssbw_icon.ico'); ?>" rel="icon" type="image" />
        
        <link href="<?php echo base_url('css/main.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('css/members.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('css/admin.css'); ?>" rel="stylesheet" type="text/css" />
    </head> <!-- End Head Section -->
    <body>
        <div class="container">
            <header>
                <img id="header_logo" src="<?php echo base_url('assets/images/ssbw_logo.png'); ?>" title="Sugar Sands Beach Weddings Logo" alt="Sugar Sands Beach Weddings Logo"/>
                <div id="login_form_div">
                    <?php
                            
                        if($this->session->userdata('login_state') == TRUE) {
                            
                            $user_info = $this->session->all_userdata();
                            
                            if($user_info['isAdmin'] === 'true') {
                                echo '<span id="welcome_back_message">
                                        <p><a href="index.php?ssbw/memberList">Welcome Back, '.$user_info['firstName'].'</a> &nbsp; &#124; &nbsp;</p>
                                        <a id="log_out_link" href="index.php?logout/signout"> Log Out</a>
                                    </span>';
                            }else{
                                echo '<span id="welcome_back_message">
                                        <p><a href="index.php?ssbw/member">Welcome Back, '.$user_info['firstName'].'</a> &nbsp; &#124; &nbsp;</p>
                                        <a id="log_out_link" href="index.php?logout/signout"> Log Out</a>
                                    </span>';
                            }
                            
                        }else{
                            
                            echo '<form action="index.php?login/submit" id="login_form" method="post">
                                    <h3 id="login_header">Member Sign-In</h3>
                                    <input type="text" name="username" id="username" placeholder="Username" required />
                                    <input type="password" name="password" id="password" placeholder="Password" required />
                                    <input type="submit" name="login_button" value="Go" />
                                </form>
                                <a id="forgot_password_link" href="index.php?ssbw/view/forgot_password" title="Forgot Your Password Link">Forgot Your Password?</a>';
                            
                        }
                    
                    ?>
                </div>
                <img id="purple_nav_bar" src="<?php echo base_url('assets/images/purple_nav_bar.png'); ?>" width="960" alt="Purple Navigation Bar" />
                <ul id="nav_list">
                    <li><a href="index.php">Home</a></li>
                    <li>
                        <a href="index.php?ssbw/view/about_ssbw">About SSBW</a>
                        <ul class="drop_down">
                            <li><a href="index.php?ssbw/view/about_ssbw">Our Company</a></li>
                            <li><a href="index.php?ssbw/view/services">Our Services</a></li>
                            <li><a href="index.php?ssbw/view/location">Our Location</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?ssbw/packagesOverview">Packages</a>
                        <ul class="drop_down">
                            <li><a href="index.php?ssbw/packages">Packages</a></li>
                            <li><a href="index.php?ssbw/deals">Deals</a></li>
                        </ul>
                    </li>
                    <li><a href="index.php?ssbw/view/gallery">Gallery</a></li>
                    <li><a href="index.php?ssbw/bookingForm">Book With Us</a></li>
                </ul>
            </header>
            