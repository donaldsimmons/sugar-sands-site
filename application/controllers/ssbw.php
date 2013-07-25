<?php

    class SSBW extends CI_Controller {
        
        public function __construct() {
            
            #calls the parent class's constructor function
            parent::__construct();
            
            #loads the session library for use in this class
            $this->load->library('session');
            
            #loads the url helper 
            $this->load->helper('url');
            
        }//end __Construct Function
        
        public function view($page="home",$data=array()) {
            
            #checks if the desired page exists
            if(!file_exists('application/views/pages/'.$page.'.php')) {
                
                #if the page doesn't exist, shows the 404 error message
                show_404();
                
            }
            
            #loads header/footer views, along with the desired page
            $this->load->view('html_templates/header.inc');
            $this->load->view('pages/'.$page.'.php',$data);
            $this->load->view('html_templates/footer.inc');
            
        }//end View Function
        
        public function forgotPassword() {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #stores the "posted" data from the form
            $post = $this->input->post(NULL,TRUE);
            
            #generates a random password
            $password = $this->ssbw_model->generateRandomPassword($post['forgot_password_email']);
            
            #stores info for sending email
            $to = $post['forgot_password_email'];
            $subject = "SSBW - Forgotten Password";
            $message = "Hello, this message is in response to your request for a new password. \n
                        Please do not respond to this email \n.
                        Your username is: ".$post['forgot_password_username']."\n
                        Your new password is: ".$password." \n
                        Thank you for choosing Sugar Sands beach Weddings";
            $from = "Sugar Sands Beach Weddings"; 
            
            #sends email based on parameter information
            mail($to,$subject,$message,$from);
            
            #redirects the user back to the home page
            redirect(base_url('index.php'));
            
        }//end ForgotPassword Function
        
        public function bookingForm() {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #stores information for the form's drop down menus
            $packages = $this->ssbw_model->getPackageDropDown();
            $primary_colors = $this->ssbw_model->getPrimaryColorsDropDown();
            $secondary_colors = $this->ssbw_model->getSecondaryColorsDropDown();
            $floral_arrangements = $this->ssbw_model->getFloralArrangementDropDown();
            $music_packages = $this->ssbw_model->getMusicDropDown();
            $photo_packages = $this->ssbw_model->getPhotoDropDown();
            
            #stores drop down menu data in one array for use in the view
            $drop_down_array['packages'] = $packages;
            $drop_down_array['primary_colors'] = $primary_colors;
            $drop_down_array['secondary_colors'] = $secondary_colors;
            $drop_down_array['floral_arrangements'] = $floral_arrangements;
            $drop_down_array['music_packages'] = $music_packages;
            $drop_down_array['photo_packages'] = $photo_packages;
            
            #shows user the "booking" form page, and passes the drop down menu fata
            $this->view('booking_form',$drop_down_array);
            
        }//end BookingForm Section
        
        public function submitBookingForm() {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #stores the "posted" data from the form
            $post = $this->input->post(NULL,TRUE);
            
            #stores the "post" data for use in email message
            $first_name = $post['first_name'];
            $last_name = $post['last_name'];
            $bride_name = $post['bride_name'];
            $groom_name = $post['groom_name'];
            $wedding_date = $post['wedding_date'];
            $address = $post['address'];
            $state = $post['state'];
            $zip_code = $post['zip_code'];
            $phone_number = $post['first_name'];
            $email = $post['first_name'];
            $package = $post['choose_package'];
            $primary_color = $post['primary_color'];
            $secondary_color = $post['secondary_color'];
            $number_chairs = $post['number_chairs'];
            $number_guests = $post['number_guests'];
            $floral_arrangement = $post['floral_arrangement'];
            $music_package = $post['music_package'];
            $photo_package = $post['photography_package'];
            
            #uses conditional to check value of the wedding notes form
            if($post['set_wedding_notes'] == ' ') {
                
                #if the "post" data from the wedding notes field is empty, store string "None"
                $wedding_notes = "None";
                
            }else{
                
                #if data is present, store the data
                $wedding_notes = $post['set_wedding_notes'];
                
            }
            
            #sets necessary objects for the mail() function
            $to = "donaldsimmons@fullsail.edu";
            $email_subject = "SSBW Booking Form - ".$first_name.' '.$last_name;
            
            $message = "This is a new Booking Request from SSBW \n \n
                Name: ".$first_name.' '.$last_name."\n
                Bride Name: ".$bride_name." \n
                Groom Name: ".$groom_name." \n
                Wedding Date: ".$wedding_date." \n \n
                Address: ".$address." \n
                State: ".$state." \n
                ZIP Code: ".$zip_code." \n \n
                Phone Number: ".$phone_number." \n
                Email: ".$email." \n \n
                Package: ".$package." \n
                Primary Color: ".$primary_color." \n
                Secondary Color: ".$secondary_color." \n
                Number of Chairs: ".$number_chairs." \n
                Number of Guests: ".$number_guests." \n
                Floral Arrangement: ".$floral_arrangement." \n
                Music Package: ".$music_package." \n
                Photography Package: ".$photo_package." \n
                Wedding Notes: ".$wedding_notes." \n \n
                Please review and respond at your earliest convenience.
            ";   
            
            #sends email
            mail($to,$email_subject,$message);
            
            #redirects user to the home page
            redirect(base_url('index.php'));
            
        }//end submitBookingForm Function
        
        public function packagesOverview() {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #retrieves the deal of the month from the database
            $deal_of_month = $this->ssbw_model->getDealOfMonth();
            
            #views the "packages_overview" page and passes the deal of the month to page
            $this->view('packages_overview',$deal_of_month);
            
        }//end PackageOverview Function
        
        public function packages() {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #retrieves packages from database
            $packages_results = $this->ssbw_model->getPackages();
            
            #creates an array to hold the package info
            $packages_array = array();
            #creates a counter to track the packages
            $counter = 1;
            
            #uses foreach loop to store each package in the "packages_array"
            foreach($packages_results as $package) {
                
                #stores the package in an array index with an index that matches the corresponding
                #counter value
                $packages_array['package'.$counter] = $package;
                
                #increments the counter
                $counter++;
                
            }
            
            #stores the packages for use in the view
            $packages['packages'] = $packages_array;
            
            #views the "packages" page and passes in the packages data
            $this->view('packages',$packages);
            
        }//end Packages Function
        
        public function deals() {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #retrieves deals from the database
            $deals_results = $this->ssbw_model->getDeals();
            
            #creates an array to hold deal data
            $deals_array = array();
            #creates counter to track individual deal
            $counter = 1;
            
            #uses foreach loop to store each deal in "deals_array"
            foreach($deals_results as $deal) {
                
                #stores deal in index that corresponds with current counter position
                $deals_array['deal'.$counter] = $deal;
                
                #increments counter
                $counter++;
                
            }
            
            #stores "deals_array" for use in view
            $deals['deals'] = $deals_array;
            
            #views the "deals" page and passes in the deals data
            $this->view('deals',$deals);
            
        }//end Deals Function
        
        public function packageDetails($package_id) {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #retrieves package data based on the package id
            $package_details = $this->ssbw_model->getPackageDetails($package_id);
            
            #views the "package_details" page and passes in appropriate package info
            $this->view('package_details',$package_details);
            
        }//end PackageDetails Function
        
        public function dealDetails($package_id) {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #retrieves deal details from the database based on their id
            $package_details = $this->ssbw_model->getPackageDetails($package_id);
            
            #views the "deal_details" page and passes in the appropriate deal info
            $this->view('deal_details',$package_details);
            
        }//end DealDetails Function
        
        public function member() {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #stores the session data for this user
            $user_info = $this->session->all_userdata();
            
            #retrieves the member's information based on their session data
            $profile_info = $this->ssbw_model->getUserInfo($user_info);
            
            #stores the member's username in the information array
            $profile_info['username'] = $user_info['username'];
            
            #views the "profile" page and passes in the member's information
            $this->view('profile',$profile_info);
            
        }//end Member Function
        
        public function updateProfile() {
            
            #stores the "posted" information from the form
            $post = $this->input->post(NULL,TRUE);
            
            #stores the current user's userId from their session data
            $user_id = $this->session->userdata('userId');
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #updates the member's profile based on the edited options and their userId
            $this->ssbw_model->updateUserProfile($post,$user_id);
            #updates the member's session data with the new information
            $this->updateSessionData($user_id);
            
            #redirects the user back to their profile page to view new info
            redirect(base_url('index.php/ssbw/member'));
            
        }//end UpdateProfile Function
        
        public function memberList() {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #gets the memberList for viewing by admin
            $members_results = $this->ssbw_model->getMemberList();
            
            #creates an array and counter to store/track the members
            $members_array = array();
            $counter = 1;
            
            #uses foreach loop store the memberList data
            foreach($members_results as $member) {
                
                #stores the current member data according to their index position
                $members_array['member'.$counter] = $member;
                
                #increments the counter
                $counter++;
                
            }
            
            #stores the collective member data for use in the view
            $members['members'] = $members_array;
            
            #views the "members_list" page and passes in the members list data
            $this->view('members_list',$members);
            
        }//end MemberList Function
        
        public function memberDetails($user_id) {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #retrieves information about member based on their userId
            $user = $this->ssbw_model->getUserById($user_id);
            
            #retrieves member-specific data for use in details page
            $userName = $user['username'];
            $wedding_changes = $this->ssbw_model->getWeddingChanges($user_id);
            $profile_info = $this->ssbw_model->getUserInfo($user_id);
            $wedding_info = $this->ssbw_model->getWeddingInfoByUser($user_id);
            $gallery_data = $this->ssbw_model->getUserGallery($user_id);
            
            #uses conditional to determine values for use in the member's gallery details section
            if(empty($gallery_data)) {
                
                #if there is no gallery data for this user
                
                #the gallery info passed into the view will be empty
                $gallery_info['galleryId'] = "";
                
            }else{
                
                #if there is gallery data present for the selected member, then the data is stored
                $gallery_info = $gallery_data;
                
            }
            
            #creates an array for passing member-specific data to view
            $info_array = array('userId'=>$user_id,'username'=>$userName,'weddingChanges'=>$wedding_changes,'profile_info'=>$profile_info,'wedding_info'=>$wedding_info,
                                'gallery_info'=>$gallery_info);
            
            #views the "member_details" page and passes in the selected member's details for display
            $this->view('member_details',$info_array);
            
        }//end MemberDetails Function
        
        public function addGalleryImage($user_id) {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #stores the "posted" data from form
            $post = $this->input->post(NULL,TRUE);
            
            #adds the "posted" url to the database based on the selected member's userId
            $this->ssbw_model->addGalleryImage($user_id,$post['member_gallery_image_url']);
            
            #redirectes the administrator back to the selected member's detail page
            redirect(base_url('index.php/ssbw/memberDetails/'.$user_id));
            
        }//end AddGalleryImage Function
        
        public function addMember() {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #stores the information for use in the drop down menus
            $packages = $this->ssbw_model->getPackageDropDown();
            $primary_colors = $this->ssbw_model->getPrimaryColorsDropDown();
            $secondary_colors = $this->ssbw_model->getSecondaryColorsDropDown();
            $floral_arrangements = $this->ssbw_model->getFloralArrangementDropDown();
            $music_packages = $this->ssbw_model->getMusicDropDown();
            $photo_packages = $this->ssbw_model->getPhotoDropDown();
            
            #stores drop down menu information in array for use in view
            $drop_down_array['packages'] = $packages;
            $drop_down_array['primary_colors'] = $primary_colors;
            $drop_down_array['secondary_colors'] = $secondary_colors;
            $drop_down_array['floral_arrangements'] = $floral_arrangements;
            $drop_down_array['music_packages'] = $music_packages;
            $drop_down_array['photo_packages'] = $photo_packages;
            
            #view the "add_member" page and passes in the array of drop down information
            $this->view('add_member',$drop_down_array);
            
        }//end AddMember Function
        
        public function createNewMember() {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #stores the "posted" information from the form
            $post = $this->input->post(NULL,TRUE);
            
            #adds the member to the database using the submitted information
            $user = $this->ssbw_model->addMember($post);
            
            #redirects the administrator back to the memberList
            redirect(base_url('index.php/ssbw/memberList'));
            
        }//end CreateNewMember Function
        
        public function editMemberWedding($user_id) {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #stores user/drop-down menu information from database
            $user = $user_id;
            $wedding_changes = $this->ssbw_model->getWeddingChanges($user_id);
            $packages = $this->ssbw_model->getPackageDropDown();
            $primary_colors = $this->ssbw_model->getPrimaryColorsDropDown();
            $secondary_colors = $this->ssbw_model->getSecondaryColorsDropDown();
            $floral_arrangements = $this->ssbw_model->getFloralArrangementDropDown();
            $music_packages = $this->ssbw_model->getMusicDropDown();
            $photo_packages = $this->ssbw_model->getPhotoDropDown();
            
            #stores data for use in view
            $drop_down_array['userId'] = $user_id;
            $drop_down_array['weddingChanges'] = $wedding_changes;
            $drop_down_array['packages'] = $packages;
            $drop_down_array['primary_colors'] = $primary_colors;
            $drop_down_array['secondary_colors'] = $secondary_colors;
            $drop_down_array['floral_arrangements'] = $floral_arrangements;
            $drop_down_array['music_packages'] = $music_packages;
            $drop_down_array['photo_packages'] = $photo_packages;
            
            #views the "admin_edit_wedding" page and passes in the retrieved data
            $this->view('admin_edit_wedding',$drop_down_array);
            
        }//end editMemberWedding Function
        
        public function updateMemberWedding($user_id) {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #stores the "posted" information from the form
            $post = $this->input->post(NULL,TRUE);
            
            #updates the member in the database based on the selected user and the "posted" data
            $this->ssbw_model->updateMemberWedding($post,$user_id);
            
            #redirects the administrator back to the selected member's details page
            redirect(base_url('index.php/ssbw/memberDetails/'.$user_id));
            
        }//end UpdateMemberWedding Function
        
        public function deleteMember($user_id) {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #deletes the selected member from the database based on their userId
            $this->ssbw_model->deleteMember($user_id);
            
            #redirects the administrator back to the membersList
            redirect(base_url('index.php/ssbw/memberList'));
            
        }//end DeleteMember Function
        
        public function packagesList() {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #gets the package information for displaying list of packages 
            $packages_results = $this->ssbw_model->getPackagesList();
            
            #creates array/counter for storing/tracking packages
            $packages_array = array();
            $counter = 1;
            
            #uses foreach loop to store and track individual packages
            foreach($packages_results as $package) {
                
                #stores the packages in a specific array index
                $packages_array['package'.$counter] = $package;
                
                #increments the counter
                $counter++;
                
            }
            
            #stores the "packages_array" for use in the view
            $packages['packages'] = $packages_array;
            
            #views the "packages_list" view and passes in the packages' information
            $this->view('packages_list',$packages);
            
        }//end PackagesList Function
        
        public function checkPackageDetails($package_id) {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #gets the package details for the selected package, based on the package's packageId
            $package_details = $this->ssbw_model->getPackageDetails($package_id);
            
            #views the "admin_package_details" page and passes in the package-specific details
            $this->view('admin_package_details',$package_details);
            
        }//end CheckPackageDetails Function
        
        public function addPackage() {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #retrieves information for use in drop down menus
            $floral_arrangements = $this->ssbw_model->getFloralArrangementDropDown();
            $music_packages = $this->ssbw_model->getMusicDropDown();
            $photo_packages = $this->ssbw_model->getPhotoDropDown();
            
            #stores the drop down info in an array for use in the view
            $drop_down_array['floral_arrangements'] = $floral_arrangements;
            $drop_down_array['music_packages'] = $music_packages;
            $drop_down_array['photo_packages'] = $photo_packages;
            
            #views the "add_package" page and passes in the drop down data
            $this->view('add_package',$drop_down_array);
            
        }//end AddPackage Function
        
        public function createNewPackage() {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #stores the "posted" info from the form
            $post = $this->input->post(NULL,TRUE);
            
            #adds the new package to the database based on the "posted" information
            $this->ssbw_model->addPackage($post);
            
            #redirects the administrator back to the packagesList
            redirect(base_url('index.php/ssbw/packagesList'));
            
        }//end CreateNewPackage Function
        
        public function deletePackage($package_id) {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #deletes the selected package from the database based on the packageId value
            $this->ssbw_model->deletePackage($package_id);
            
            #redirects the administrator back to the packagesList
            redirect(base_url('index.php/ssbw/packagesList'));
            
        }//end DeletePackage Function
        
        public function dealsList() {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #retrieves deals from the database
            $deals_results = $this->ssbw_model->getDealsList();
            
            #creates array/counter to store/track the deals
            $deals_array = array();
            $counter = 1;
            
            #uses foreach loop to store/track individual deals
            foreach($deals_results as $deal) {
                
                #stores the current deal in a specific array index
                $deals_array['deal'.$counter] = $deal;
                
                #increments counter
                $counter++;
                
            }
            
            #stores the deals information for use in view
            $deals['deals'] = $deals_array;
            
            #views "deals_list" page and passes in the deals data
            $this->view('deals_list',$deals);
            
        }//end DealsList Function
        
        public function checkDealsDetails($package_id) {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #retrieves the packageDetails for the selected package based on it packageId
            $package_details = $this->ssbw_model->getPackageDetails($package_id);
            
            #views the "admin_deal_details" page and passes in selected package's details
            $this->view('admin_deal_details',$package_details);
            
        }//end CheckDealsDetails Function
        
        public function addDeal() {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #retrieves the data for use in drop down menus
            $packages = $this->ssbw_model->getPackageDropDown();
            $floral_arrangements = $this->ssbw_model->getFloralArrangementDropDown();
            $music_packages = $this->ssbw_model->getMusicDropDown();
            $photo_packages = $this->ssbw_model->getPhotoDropDown();
            
            #stores the drop down menus' data for use in the view
            $drop_down_array['packages'] = $packages;
            $drop_down_array['floral_arrangements'] = $floral_arrangements;
            $drop_down_array['music_packages'] = $music_packages;
            $drop_down_array['photo_packages'] = $photo_packages;
            
            #views the "add_deal" page and passes in the data for the drop downs
            $this->view('add_deal',$drop_down_array);
            
        }//end AddPackage Function
        
        public function createNewDeal() {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #stores the "posted" data from the form
            $post = $this->input->post(NULL,TRUE);
            
            #adds the new deal to the database using the "posted" information
            $this->ssbw_model->addDeal($post);
            
            #redirects the administrator back to the dealsList
            redirect(base_url('index.php/ssbw/dealsList'));
            
        }//end CreateNewDeal Function
        
        public function deleteDeal($package_id) {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #deletes the selected deal from the database based on its packageId
            $this->ssbw_model->deleteDeal($package_id);
            
            #redirects the administrator back to the dealsList
            redirect(base_url('index.php/ssbw/dealsList'));
            
        }//end DeleteDeal Function
        
        public function myWedding() {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #stores the current member's information from the session data
            $user_info = $this->session->all_userdata();
            
            #retrieves the member's wedding information from the database according to their userId
            $wedding_info = $this->ssbw_model->getWeddingInfoByUser($user_info);
            
            #stores the member's username for use in view
            $wedding_info['username'] = $user_info['username'];
            
            #views the "wedding_info" page and passes in the member-specific wedding info
            $this->view('wedding_info',$wedding_info);
            
        }//end MyWedding Function
        
        public function editWedding() {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #retrieves the information that will be used for drop down menu options
            $packages = $this->ssbw_model->getPackageDropDown();
            $primary_colors = $this->ssbw_model->getPrimaryColorsDropDown();
            $secondary_colors = $this->ssbw_model->getSecondaryColorsDropDown();
            $floral_arrangements = $this->ssbw_model->getFloralArrangementDropDown();
            $music_packages = $this->ssbw_model->getMusicDropDown();
            $photo_packages = $this->ssbw_model->getPhotoDropDown();
            
            #stores the drop down menu data for use in the view
            $drop_down_array['packages'] = $packages;
            $drop_down_array['primary_colors'] = $primary_colors;
            $drop_down_array['secondary_colors'] = $secondary_colors;
            $drop_down_array['floral_arrangements'] = $floral_arrangements;
            $drop_down_array['music_packages'] = $music_packages;
            $drop_down_array['photo_packages'] = $photo_packages;
            
            #views the "edit_wedding" page and passes in the drop down menu data
            $this->view('edit_wedding',$drop_down_array);
            
        }//end EditWedding Function
        
        public function submitWeddingChanges() {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #stores the "posted" data from the form
            $post = $this->input->post(NULL,TRUE);
            
            #stores the userId of the current member from the session data
            $user_id = $this->session->userdata('userId');
            
            #adds the requested wedding changes to the database according to the member's userId
            $this->ssbw_model->addWeddingChanges($user_id,$post);
            
            #redirects the member back to myWedding
            redirect(base_url('index.php/ssbw/myWedding'));
            
        }//end SubmitWeddingChanges Function
        
        public function myGallery() {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #stores the current member's information from the current session data
            $user_info = $this->session->all_userdata();
            
            #retrieves the member's gallery images from the database based on the current member's user info
            $gallery_info = $this->ssbw_model->getUserGallery($user_info);
            
            #stores the member's username
            $gallery_info['username'] = $user_info['username'];
            
            #views the "member_gallery" page and passes in the member-specific gallery data
            $this->view('member_gallery',$gallery_info);
            
        }//end MyGallery Function
        
        public function contactSSBW() {
            
            #loads the model for use in this function
            $this->load->model('ssbw_model');
            
            #stores the "posted" information from the form
            $post = $this->input->post(NULL,TRUE);
            
            #stores the "posted" information in individual objects for use in the mail() function
            $member_name = $post['member_name'];
            $email = $post['member_email'];
            $subject = $post['email_subject'];
            
            #sets parameters for the mail() function
            $to = "donaldsimmons@fullsail.edu";
            $from = "From: ".$email;
            $email_subject = $subject;
            
            $message = "Member Name: ".$member_name." \n \n
                ".$post['contact_ssbw_text'];   
                
                
            #sends the email based on the set parameters
            mail($to,$email_subject,$message,$from);
            
            #redirects the member back to the index page
            redirect(base_url('index.php'));
            
        }//end ContactSSBW Function
        
        private function updateSessionData($user_id) {
            
            #loads the model
            $this->load->model('ssbw_model');
            
            #retrieves the member's information from the database
            $user = $this->ssbw_model->getUserById($user_id);
            
            #gets the profile information from the database
            $profile_info = $this->ssbw_model->getUserInfo($user_id);
            
            #updates the session with the new user info
            $this->session->set_userdata($user);
            $this->session->set_userdata($profile_info);
            
        }//end UpdateSessionData Function
        
    }

?>