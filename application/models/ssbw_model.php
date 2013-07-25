<?

    class SSBW_Model extends CI_Model {
        
        public function __construct() {
            
            #when the model is loaded, load the database so it can be queried
            $this->load->database();
            
        }//end __Construct Function
        
        public function getUserByPassword($username,$password) {
            
            #when the user attempts a login, uses CodeIgniter query syntax to access database
            
            #select user information from the database with SQL statement
            $sql = "SELECT userId AS userId,userName AS username,userPass AS password
            FROM users
            WHERE (userName = ?)
                AND (userPass = MD5(CONCAT(userSalt,?)))
            ";
            
            #query the database passing in sumbitted username/password values
            $statement = $this->db->query($sql,array($username,$password));
            
            #return and array consisting of user info
            return $statement->row_array();
            
        }//end GetUserByPassword Function
        
        public function getUserById($userId) {
            
            #creates a query to get user info based on id number
            $sql = "SELECT userId AS userId,userName AS username,userPass AS password
            FROM users
            WHERE (userId = ?)
            ";
            
            #queries database
            $statement = $this->db->query($sql,array($userId));
            
            #returns an array of user info 
            return $statement->row_array();
            
        }
        
        public function checkAdmin($user_info) {
            
            #stores the userId value from the $user_info parameter
            $user_id = $user_info['userId'];
            
            #creates MySQL query to check if member is an administrator
            $sql = "SELECT users.userId AS userId, admin.adminOption AS isAdmin
            FROM users
            INNER JOIN admin
            ON users.userIsAdmin = admin.adminId
            WHERE (users.userId = ?)
            ";
            
            #executes query passing in the user_id value cast as an integer
            $statement = $this->db->query($sql,array((int)$user_id));
            
            #returns the result value as a row_array
            return $statement->row_array();
            
        }//end checkAdmin Function
        
        public function getUserInfo($user_info) {
            
            #uses conditional to check if $user_info argument is an array or a single value
            if(is_array($user_info)) {
                #if the argument is an array
               
                #stores the 'userId' value of the $user_info argument
                $user_id = $user_info['userId'];
                
            }else{
                
                #if a single value, stores the value
                $user_id = $user_info;
                
            }
             
            #creates a request to the server for the pertinent user data
            $sql = "SELECT  userFirstName AS firstName, userFullName AS name, brideName AS bride, groomName AS groom,
                    weddingDate AS weddingDate, userAddress AS address, userState AS state, userZIP AS zipCode,
                    userPhone AS phoneNumber, userEmail AS email
                FROM users
                WHERE (userId = ?)
            ";
            
            #queries the database for the desired user info, passing in the userId string cast as an integer
            $statement = $this->db->query($sql,array((int)$user_id));
            
            #returns the array of results
            return $statement->row_array();
            
        }//end GetUserInfo Function
        
        public function updateUserProfile($update_info,$user_id) {
            
            #creates the prefix and suffix for all possible update requests
            $query_update_string = 'UPDATE users SET ';
            $query_where_string = ' WHERE (userId = ?)';
            
            #creates array to hold values for updated info (new username, new email, etc.)
            $query_values = array();
            #creates array to hold strings that will query approriate attributes in database
            $query_strings = array();
            
            #uses foreach loop to loop over the posted data from the update form
            foreach($update_info as $key=>&$field) {
                
                #if the field is empty isn't empty (the user submitted data in the current input field)
                if($field !== '') {
                    
                    #check for name of the current input field's key in the array
                    if($key == 'edit_username') {
                       
                        #create a variable to hold the new data
                        $userName = $field;
                        #add the data to the values array
                        $query_values[] = $userName;
                        #create a string that will query the database for the username attribute
                        $query_strings[] = 'userName = ?';
                        
                    }else if($key == 'edit_password'){
                        
                        #create a variable to hold new data
                        $password = $field;
                        #create a new salt to encode the updated password
                        $updated_salt = $this->generateSalt();
                        #encode the concatenated new salt and the new password with MD5
                        $query_values[] = MD5($updated_salt.$password);
                        #store the new in the array to update the database with the new salt
                        $query_values[] = $updated_salt;
                        #create a string to query the database for the userPass and userSalt attributes
                        $query_strings[] = 'userPass = ?, userSalt = ?';
                        
                    }else if($key == 'edit_first_name') {
                        
                        $first_name = $field;
                        $query_values[] = $first_name;
                        $query_strings[] = 'userFirstName = ?';
                        
                    }else if($key == 'edit_last_name') {
                        
                        $last_name = $field;
                        $query_values[] = $last_name;
                        $query_strings[] = 'userLastName = ?';
                        
                    }else if($key == 'edit_bride_name') {
                        
                        $bride_name = $field;
                        $query_values[] = $bride_name;
                        $query_strings[] = 'brideName = ?';
                        
                    }else if($key == 'edit_groom_name') {
                        
                        $groom_name = $field;
                        $query_values[] = $groom_name;
                        $query_strings[] = 'groomName = ?';
                        
                    }else if($key == 'edit_wedding_date') {
                        
                        $wedding_date = $field;
                        $query_values[] = $wedding_date;
                        $query_strings[] = 'weddingDate = ?';
                        
                    }else if($key == 'edit_address') {
                        
                        $user_address = $field;
                        $query_values[] = $user_address;
                        $query_strings[] = 'userAddress = ?';
                        
                    }else if($key == 'edit_state') {
                        
                        if($field != 'State') {
                            
                            $user_state = $field;
                            $query_values[] = $user_state;
                            $query_strings[] = 'userState = ?';
                            
                        }
                        
                    }else if($key == 'edit_zip_code') {
                        
                        $zip_code = $field;
                        $query_values[] = $zip_code;
                        $query_strings[] = 'userZIP = ?';
                        
                    }else if($key == 'edit_phone_number') {
                        
                        $phone_number = $field;
                        $query_values[] = $phone_number;
                        $query_strings[] = 'userPhone = ?';
                        
                    }else if($key == 'edit_email') {
                        
                        $email = $field;
                        $query_values[] = $email;
                        $query_strings[] = 'userEmail = ?';
                        
                    }
                    
                }
                
            }
            
            #reset the array counters, ensuring correct array counting after manipulation in foreach loop
            reset($query_values);
            reset($query_strings);
            
            /* use implode() to combine the $query_strings array, separating them with a comma and space
            makes a string of the required identifiers for the query (userName = ?, userPass = ?, userSalt = ?) */
            $query_identifiers = implode(', ',$query_strings);
            
            #creates the complete MySQL query by concatenating the three pieces of the query
            $sql = $query_update_string.$query_identifiers.$query_where_string;
            
            #adds the desired userId to the query_values to represent the selected user in the $query_where_string (WHERE userId = ?)
            $query_values[] = $user_id;
            
            #uses conditional to check if any updates were submitted (checks against "1" since, $user_id
            #is always added to the array)
            if(count($query_values) != 1) {
                
                #queries the database and updates the submitted values
                $statement = $this->db->query($sql,$query_values);
                
            }
            
        }//end UpdateUserProfile Function
        
        public function getDealOfMonth() {
            
            #creates MySQL query to retrieve data for Deal of The Month
            $sql = "SELECT deals.packageId AS packageId, deals.packageName AS packageName, deals.numberChairs AS chairs,
                    deals.numberGuests AS guests, musicPackages.musicPackageName AS music, photoPackages.photoPackageName AS photos,
                    deals.discount AS discount, deals.dealOfMonth, deals.packageDescription AS description
                FROM deals
                INNER JOIN musicPackages
                ON deals.musicPackage = musicPackages.musicPackageId
                INNER JOIN photoPackages
                ON deals.photoPackage = photoPackages.photoPackageId
                WHERE (deals.dealOfMonth = 1);
            ";
            
            #queries the database using the "$sql" query
            $statement = $this->db->query($sql);
            
            #returns the query results to the controller
            return $statement->row_array();
            
        }//end GetDealOfMonth Function
        
        public function getPackages() {
            
            #creates a MySQL to retrieve information on all packages in database 
            $sql = "SELECT packages.packageId AS packageId, packages.packageName AS packageName, packages.numberChairs AS chairs,
                    packages.numberGuests AS guests, musicPackages.musicPackageName AS music,
                    photoPackages.photoPackageName AS photos, packages.packageDescription AS description
                FROM packages
                INNER JOIN musicPackages
                ON packages.musicPackage = musicPackages.musicPackageId
                INNER JOIN photoPackages
                ON packages.photoPackage = photoPackages.photoPackageId
            ";
            
            #executes query using the "$sql" statement 
            $statement = $this->db->query($sql);
            
            #returns the query results
            return $statement->result_array();
            
        }//end GetPackages Function
        
        public function getDeals() {
            
            #creates a MySQL to retrieve information on all deals in database 
            $sql = "SELECT deals.packageId AS packageId, deals.packageName AS packageName, deals.numberChairs AS chairs,
                    deals.numberGuests AS guests, musicPackages.musicPackageName AS music, photoPackages.photoPackageName AS photos,
                    deals.discount AS discount, deals.packageDescription AS description
                FROM deals
                INNER JOIN musicPackages
                ON deals.musicPackage = musicPackages.musicPackageId
                INNER JOIN photoPackages
                ON deals.photoPackage = photoPackages.photoPackageId
            ";
            
            #executes query using constructed statement
            $statement = $this->db->query($sql);
            
            #return query results
            return $statement->result_array();
            
        }//end GetDeals Function
        
        public function getPackageDetails($package_id) {
            
            #creates a MySQL to retrieve information on package details
            $sql = "SELECT packages.packageId AS packageId, packages.packageName AS packageName, packages.numberChairs AS chairs,
                    floralOptions.floralOptionName AS floralOption, packages.numberGuests AS guests,
                    musicPackages.musicPackageName AS music, photoPackages.photoPackageName AS photos,
                    packages.packageDescription AS description
                FROM packages
                INNER JOIN floralOptions
                ON packages.floralArrangement = floralOptions.floralOptionId
                INNER JOIN musicPackages
                ON packages.musicPackage = musicPackages.musicPackageId
                INNER JOIN photoPackages
                ON packages.photoPackage = photoPackages.photoPackageId
                WHERE (packages.packageId = ?)
            ";
            
            #queries the database using the constructed statement and the selected package's packageId
            $statement = $this->db->query($sql,array((int)$package_id));
            
            #returns the query results
            return $statement->row_array();
            
        }//end GetPackageDetails
        
        public function getWeddingInfoByUser($user_info) {
            
            #uses conditional to check if argument is array
            if(is_array($user_info)) {
                #if argument is array
                
                #stores the 'userId' value of the $user_info argument
                $user_id = $user_info['userId'];
                
            }else{
                #if argument is a single value
                
                #stores the argument
                $user_id = $user_info;
                
            }
            
            ##creates a MySQL to retrieve information on member's wedding 
            $sql = "SELECT bookedWeddings.userId AS userId, packages.packageName AS package,
                    primaryColors.colorName AS primaryColor, secondaryColors.colorName AS secondaryColor,
                    bookedWeddings.numberChairs AS chairs, bookedWeddings.numberGuests AS guests,
                    floralOptions.floralOptionName AS floralOption, musicPackages.musicPackageName AS music,
                    photoPackages.photoPackageName AS photos, bookedWeddings.weddingNotes AS notes
                FROM bookedWeddings
                INNER JOIN packages
                ON bookedWeddings.packageId = packages.packageId
                INNER JOIN primaryColors
                ON bookedWeddings.primaryColor = primaryColors.colorId
                INNER JOIN secondaryColors
                ON bookedWeddings.secondaryColor = secondaryColors.colorId
                INNER JOIN floralOptions
                ON bookedWeddings.floralArrangement = floralOptions.floralOptionId
                INNER JOIN musicPackages
                ON bookedWeddings.musicPackage = musicPackages.musicPackageId
                INNER JOIN photoPackages
                ON bookedWeddings.photoPackage = photoPackages.photoPackageId
                WHERE (bookedWeddings.userId = ?);
            ";
            
            #queries the database for the desired user info, passing in the userId string cast as an integer
            $statement = $this->db->query($sql,array((int)$user_id));
            
            #returns the query result
            return $statement->row_array();
            
        }//end GetWeddingInfoByUser Function
        
        public function addWeddingChanges($user_id,$update_info) {
            
            #creates the prefix and suffix for all possible update requests
            $query_insert_string = 'INSERT INTO weddingChanges ';
            $query_set_string = ' SET ';
            
            #creates array to hold values for updated info (new username, new email, etc.)
            $query_values = array();
            #creates array to hold strings that will query approriate attributes in database
            $query_strings = array();
            
            $query_values[] = $user_id;
            $query_strings[] = 'userId = ?';
            
            #uses foreach loop to loop over the posted data from the update form
            foreach($update_info as $key=>&$field) {
                
                #if the field is empty isn't empty (the user submitted data in the current input field)
                if($field !== '') {
                    
                    #check for name of the current input field's key in the array
                    if($key == 'edit_package') {
                       
                        #create a variable to hold the new data
                        $package = $field;
                        #add the data to the values array
                        $query_values[] = $package;
                        #create a string that will query the database for the username attribute
                        $query_strings[] = 'packageId = ?';
                        
                    }else if($key == 'edit_primary_color'){
                        
                        $primary_color = $field;
                        $query_values[] = $primary_color;
                        $query_strings[] = 'primaryColor = ?';
                        
                    }else if($key == 'edit_secondary_color') {
                        
                        $secondary_color = $field;
                        $query_values[] = $secondary_color;
                        $query_strings[] = 'secondaryColor = ?';
                        
                    }else if($key == 'edit_number_chairs') {
                        
                        $number_chairs = $field;
                        $query_values[] = $number_chairs;
                        $query_strings[] = 'numberChairs = ?';
                        
                    }else if($key == 'edit_number_guests') {
                        
                        $number_guests = $field;
                        $query_values[] = $number_guests;
                        $query_strings[] = 'numberGuests = ?';
                        
                    }else if($key == 'edit_floral_arrangement') {
                        
                        $floral_arrangement = $field;
                        $query_values[] = $floral_arrangement;
                        $query_strings[] = 'floralArrangement = ?';
                        
                    }else if($key == 'edit_music_package') {
                        
                        $music_package = $field;
                        $query_values[] = $music_package;
                        $query_strings[] = 'musicPackage = ?';
                        
                    }else if($key == 'edit_photography_package') {
                        
                        $photo_package = $field;
                        $query_values[] = $photo_package;
                        $query_strings[] = 'photoPackage = ?';
                        
                    }else if($key == 'edit_wedding_notes') {
                        
                        $wedding_notes = $field;
                        $query_values[] = $wedding_notes;
                        $query_strings[] = 'weddingNotes = ?';
                        
                    }
                    
                }
                
            }
            
            #reset the array counters, ensuring correct array counting after manipulation in foreach loop
            reset($query_values);
            reset($query_strings);
            
            /* use implode() to combine the $query_strings array, separating them with a comma and space
            makes a string of the required identifiers for the query (userName = ?, userPass = ?, userSalt = ?) */
            $query_identifiers = implode(', ',$query_strings);
            
            #creates the complete MySQL query by concatenating the three pieces of the query
            $sql = $query_insert_string.$query_set_string.$query_identifiers;
            
            #adds the desired userId to the query_values to represent the selected user in the $query_where_string (WHERE userId = ?)
            $query_values[] = $user_id;
            
            #uses conditional to check if any updates were submitted (checks against "1" since, $user_id
            #is always added to the array)
            if(count($query_values) != 1) {
                
                #queries the database and updates the submitted values
                $statement = $this->db->query($sql,$query_values);
                
            }
            
        }//end SendWeddingChanges Function
        
        public function getWeddingChanges($user_id) {
            
            #creates a MySQL to retrieve information on wedding changes 
            $sql = "SELECT *
                FROM weddingChanges
                WHERE (userId = ?)
            ";
            
            #queries the database using the constructed MySQL statement and the selected member's userId
            $statement = $this->db->query($sql,$user_id);
            
            #returns the query results
            return $statement->result_array();
            
        }//end GetWeddingChanges Function
        
        public function getPackageDropDown() {
            
            #creates a MySQL statement to retrieve information on package options
            $sql = "SELECT packageName
            FROM packages
            ";
            
            #queries database using constructed statement
            $statement = $this->db->query($sql);
            
            #returns query results
            return $statement->result_array();
            
        }//end GetPackageDropDown Function
        
        public function getPrimaryColorsDropDown() {
            
            #creates a MySQL statement to retrieve information on primary color options
            $sql = "SELECT colorName
            FROM primaryColors
            ";
            
            #executes query using constructed statement
            $statement = $this->db->query($sql);
            
            #returns query results
            return $statement->result_array();
            
        }//end GetPrimaryColorsDropDown Function
        
        public function getSecondaryColorsDropDown() {
            
            #creates a MySQL statement to retrieve information on secondary options
            $sql = "SELECT colorName
            FROM secondaryColors
            ";
            
            #executes query using constructed statement
            $statement = $this->db->query($sql);
            
            #returns query results
            return $statement->result_array();
            
        }//end GetSecondaryColorsDropDown Function
        
        public function getFloralArrangementDropDown() {
            
            #creates a MySQL statement to retrieve information on floral arrangement options
            $sql = "SELECT floralOptionName
            FROM floralOptions
            ";
            
            #executes query using constructed statement
            $statement = $this->db->query($sql);
            
            #returns query results
            return $statement->result_array();
            
        }//end GetFloralArrangementDropDown Function
        
        public function getMusicDropDown() {
            
            #creates a MySQL statement to retrieve information on music package options
            $sql = "SELECT musicPackageName
            FROM musicPackages
            ";
            
            #executes query using constructed statement
            $statement = $this->db->query($sql);
            
            #returns query results
            return $statement->result_array();
            
        }//end GetMusicDropDown Function
        
        public function getPhotoDropDown() {
            
            #creates a MySQL statement to retrieve information on photo package options
            $sql = "SELECT photoPackageName
            FROM photoPackages
            ";
            
            #executes query using constructed statement
            $statement = $this->db->query($sql);
            
            #returns query results
            return $statement->result_array();
            
        }//end GetPhotoDropDown Function
        
        public function getUserGallery($user_info) {
            
            #uses conditional to check if argument is an array or single value
            if(is_array($user_info)) {
                #if argument is an array
                
                #stores the 'userId' value of the $user_info argument
                $user_id = $user_info['userId'];
                
            }else{
                #if argument is a single value
                
                #stores the argument
                $user_id = $user_info;
                
            }
            
            #creates a MySQL statement to retrieve member's gallery information
            $sql= "SELECT galleryId as galleryId, userId as userId, photoURL_1 AS url_1, photoURL_2 AS url_2,
                    photoURL_3 AS url_3, photoURL_4 AS url_4, photoURL_5 AS url_5, photoURL_6 AS url_6
                FROM galleries
                WHERE (userId = ?)
            ";
            
            #executes query using constructed statement and member's userId
            $statement = $this->db->query($sql,array((int)$user_id));
            
            #returns the query results
            return $statement->row_array();
            
        }//end GetUserGallery Function
        
        public function addGalleryImage($user_id,$image_url) {
            
            #retrieves the selected member's gallery information
            $gallery = $this->getUserGallery($user_id);
            
            #uses conditional to check number of gallery images and responda accordingly
            if(empty($gallery)) {
                #if the member's gallery is empty or doesn't exist
                
                #creates MySQL INSERT statement
                $sql = "INSERT INTO galleries
                    SET userId = ?,
                        photoURL_1 = ?
                ";
                
                #executes query using selected member's userId and the submitted imageURL
                $statement = $this->db->query($sql,array($user_id,$image_url));
                
            }else if($gallery['url_6']){
                #if the member's gallery is full, and the final imageURL column is occupied
                
                #return false
                return false;
                
            }else if(empty($gallery['url_2']) && !empty($gallery['url_1'])) {
                #if the only the first url column is occupied
                
                #creates MySQL UPDATE statement for second column
                $sql = "UPDATE galleries
                    SET photoURL_2 = ?
                    WHERE (userId = ?)
                ";
                
                #executes query using constructed statement, submitted image url, and selected member's userId
                $statement = $this->db->query($sql,array($image_url,$user_id));
                
            }else if(empty($gallery['url_3']) && !empty($gallery['url_2'])) {
                #if the second url column has data, but the third is empty
                
                #creates MySQL UPDATE statement for third column
                $sql = "UPDATE galleries
                    SET photoURL_3 = ?
                    WHERE (userId = ?)
                ";
                
                #executes query using constructed statement, submitted url, and selected member's userId
                $statement = $this->db->query($sql,array($image_url,$user_id));
                
            }else if(empty($gallery['url_4']) && !empty($gallery['url_3'])) {
                #if the third url column has data, and the fourth column is empty
                
                #creates MySQL UPDATE statement for fourth column
                $sql = "UPDATE galleries
                    SET photoURL_4 = ?
                    WHERE (userId = ?)
                ";
                
                #queries the database
                $statement = $this->db->query($sql,array($image_url,$user_id));
                
            }else if(empty($gallery['url_5']) && !empty($gallery['url_4'])) {
                #if the fourth url column has data, and the fifth is empty
                
                #creates MySQL UPDATE statement for fifth column
                $sql = "UPDATE galleries
                    SET photoURL_5 = ?
                    WHERE (userId = ?)
                ";
                
                #executes query
                $statement = $this->db->query($sql,array($image_url,$user_id));
                
            }else if(empty($gallery['url_6']) && !empty($gallery['url_5'])) {
                #if the fifth url column has data, but the sixth is empty
                
                #creates MySQL UPDATE statement for sixth column
                $sql = "UPDATE galleries
                    SET photoURL_6 = ?
                    WHERE (userId = ?)
                ";
                
                #executes query
                $statement = $this->db->query($sql,array($image_url,$user_id));
                
            }
            
        }//end AddGalleryImage Function
        
        public function getMemberList() {
            
            #creates MySQL statement to retrieve member information for populating members list
            $sql = "SELECT userId AS userId, userFullName AS fullName,
                    userLastName AS lastName, userIsAdmin AS userIsAdmin
                FROM users
                WHERE (userIsAdmin = 2)
                ORDER BY userLastName
            ";
            
            #executes query using constructed statement
            $statement = $this->db->query($sql);
           
            #returns query results
            return $statement->result_array();
        
        }//end GetMemberList Function
        
        public function addMember($user_info) {
            
            #creates a new salt to concatenate with user-created password (for encryption)
            $salt = $this->generateSalt();
            
            #stores submitted profile information for addition to database
            $username = $user_info['new_username'];
            $password = MD5($salt.$user_info['new_password']);
            $first_name = $user_info['new_first_name'];
            $last_name = $user_info['new_last_name'];
            $full_name = $first_name.' '.$last_name;
            $bride_name = $user_info['new_bride_name'];
            $groom_name = $user_info['new_groom_name'];
            $wedding_date = $user_info['new_wedding_date'];
            $address = $user_info['new_address'];
            $state = $user_info['new_state'];
            $zip_code = $user_info['new_zip_code'];
            $phone_number = $user_info['new_phone_number'];
            $email = $user_info['new_email'];
            
            #creates array of new member profile data for use in query
            $profile_data_array = array($username,$password,$salt,$first_name,$last_name,$full_name,
                                        $bride_name,$groom_name,$wedding_date,$address,$state,$zip_code,
                                        $phone_number,$email);
            
            #stores submitted wedding information for addition to database
            $package = $user_info['new_package'];
            $primary_color = $user_info['new_primary_color'];
            $secondary_color = $user_info['new_secondary_color'];
            $number_chairs = $user_info['new_number_chairs'];
            $number_guests = $user_info['new_number_guests'];
            $floral_arrangement = $user_info['new_floral_arrangement'];
            $music_package = $user_info['new_music_package'];
            $photo_package = $user_info['new_photo_package'];
            $wedding_notes = $user_info['new_wedding_notes'];
            
            #creates MySQL statement to insert new member into users table
            $profile_sql = "INSERT INTO users
                SET userName = ?,
                    userPass = ?,
                    userSalt = ?,
                    userFirstName = ?,
                    userLastName = ?,
                    userFullName = ?,
                    brideName = ?,
                    groomName = ?,
                    weddingDate = ?,
                    userAddress = ?,
                    userState = ?,
                    userZIP = ?,
                    userPhone = ?,
                    userEmail = ?,
                    userIsAdmin = 2
            ";
            
            #queries the database to execute the "users" table statement
            #uses the "profile_sql" statement and the array of submitted profile data 
            $profile_statement = $this->db->query($profile_sql,$profile_data_array);
            
            #creates a MySQL statement to select the newest member's userId
            #(created with "profile statement" query)
            $user_id_sql = "SELECT userId FROM users
                ORDER BY userId DESC
                LIMIT 1
            ";
            
            #executes query to retrieve newest member userId
            $user_id_query = $this->db->query($user_id_sql);
            #returns query results
            $user_id = $user_id_query->row_array();
            
            #creates array for use in query, consisting of submitted wedding information and the
            #userId of the created member
            $wedding_data_array = array($user_id['userId'],$package,$primary_color,$secondary_color,$number_chairs,
                                        $number_guests,$floral_arrangement,$music_package,$photo_package,
                                        $wedding_notes);
            
            #creates MySQL statment inserting a new wedding new member
            $wedding_sql = "INSERT INTO bookedWeddings
                SET userId = ?,
                    packageId = ?,
                    primaryColor = ?,
                    secondaryColor = ?,
                    numberChairs = ?,
                    numberGuests = ?,
                    floralArrangement = ?,
                    musicPackage = ?,
                    photoPackage = ?,
                    weddingNotes = ?
            ";
            
            #executes query using the constructed "wedding_sql" statement and the "wedding_data_array"
            $wedding_statement = $this->db->query($wedding_sql,$wedding_data_array);
            
        }//end AddMember Function
        
        public function deleteMember($user_id) {
            
            #creates an SQL query to delete the selected user
            $member_sql = "DELETE FROM users
                WHERE (userId = ?)
            ";
            
            #creates an SQL query to delete the selected user's wedding
            $wedding_sql = "DELETE FROM bookedWeddings
                WHERE (userId = ?)
            ";
            
            #stores the current user's userId
            $id = $user_id;
            
            #queries the database to remove the current user's wedding record
            $wedding_query = $this->db->query($wedding_sql,array($id));
            
            #queries the database to remove the current user's record
            $member_statement = $this->db->query($member_sql,array($id));
            
        }//end DeleteMember Function
        
        public function updateMemberWedding($update_info,$user_id) {
            
            #creates the prefix and suffix for all possible update requests
            $query_update_string = 'UPDATE bookedWeddings SET ';
            $query_where_string = ' WHERE (userId = ?)';
            
            #creates array to hold values for updated info (new username, new email, etc.)
            $query_values = array();
            #creates array to hold strings that will query approriate attributes in database
            $query_strings = array();
            
            #uses foreach loop to loop over the posted data from the update form
            foreach($update_info as $key=>&$field) {
                
                #if the field is empty isn't empty (the user submitted data in the current input field)
                if($field !== '') {
                    
                    #check for name of the current input field's key in the array
                    if($key == 'edit_package') {
                       
                        #create a variable to hold the new data
                        $package = $field;
                        #add the data to the values array
                        $query_values[] = $package;
                        #create a string that will query the database for the username attribute
                        $query_strings[] = 'packageId = ?';
                        
                    }else if($key == 'edit_primary_color'){
                        
                        $primary_color = $field;
                        $query_values[] = $primary_color;
                        $query_strings[] = 'primaryColor = ?';
                        
                    }else if($key == 'edit_secondary_color') {
                        
                        $secondary_color = $field;
                        $query_values[] = $secondary_color;
                        $query_strings[] = 'secondaryColor = ?';
                        
                    }else if($key == 'edit_number_chairs') {
                        
                        $number_chairs = $field;
                        $query_values[] = $number_chairs;
                        $query_strings[] = 'numberChairs = ?';
                        
                    }else if($key == 'edit_number_guests') {
                        
                        $number_guests = $field;
                        $query_values[] = $number_guests;
                        $query_strings[] = 'numberGuests = ?';
                        
                    }else if($key == 'edit_floral_arrangement') {
                        
                        $floral_arrangement = $field;
                        $query_values[] = $floral_arrangement;
                        $query_strings[] = 'floralArrangement = ?';
                        
                    }else if($key == 'edit_music_package') {
                        
                        $music_package = $field;
                        $query_values[] = $music_package;
                        $query_strings[] = 'musicPackage = ?';
                        
                    }else if($key == 'edit_photography_package') {
                        
                        $photo_package = $field;
                        $query_values[] = $photo_package;
                        $query_strings[] = 'photoPackage = ?';
                        
                    }else if($key == 'edit_wedding_notes') {
                        
                        $wedding_notes = $field;
                        $query_values[] = $wedding_notes;
                        $query_strings[] = 'weddingNotes = ?';
                        
                    }
                    
                }
                
            }
            
            #reset the array counters, ensuring correct array counting after manipulation in foreach loop
            reset($query_values);
            reset($query_strings);
            
            /* use implode() to combine the $query_strings array, separating them with a comma and space
            makes a string of the required identifiers for the query (userName = ?, userPass = ?, userSalt = ?) */
            $query_identifiers = implode(', ',$query_strings);
            
            #creates the complete MySQL query by concatenating the three pieces of the query
            $sql = $query_update_string.$query_identifiers.$query_where_string;
            
            #adds the desired userId to the query_values to represent the selected user in the $query_where_string (WHERE userId = ?)
            $query_values[] = $user_id;
            
            #uses conditional to check if any updates were submitted (checks against "1" since, $user_id
            #is always added to the array)
            if(count($query_values) != 1) {
                
                #queries the database and updates the submitted values
                $statement = $this->db->query($sql,$query_values);
                
            }
            
        }//end UpdateMemberWedding Function
        
        public function getUpcomingWeddings() {
            
            #create MySQL statement to retrieve upcoming weddings from database    
            $sql = "SELECT bookedWeddings.userId AS userID, users.userFullName as fullName,
                    users.weddingDate AS weddingDate
                FROM bookedWeddings
                INNER JOIN users
                ON bookedWeddings.userId = users.userId
            ";
            
            #executes query using constructed statement
            $statement = $this->db->query($sql);
            
            #returns the query results
            return $statement->result_array();
            
        }//end GetUpcomingWeddings Function
        
        public function getPackagesList() {
            
            #create MySQL statement retrieving data for populating the packages list
            $sql = "SELECT packageId AS packageId, packageName AS name
                FROM packages
            ";
            
            #executes query using the constructed statement
            $statement = $this->db->query($sql);
            
            #returns query results
            return $statement->result_array();
        
        }//end GetPackageList Function
        
        public function addPackage($package_info) {
            
            #stores submitted data for the new package
            $package_name = $package_info['new_package_name'];
            $number_chairs = $package_info['new_package_number_chairs'];
            $number_guests = $package_info['new_package_number_guests'];
            $floral_arrangement = $package_info['new_package_floral_arrangement'];
            $music_package = $package_info['new_package_music_package'];
            $photo_package = $package_info['new_package_photo_package'];
            $description = $package_info['new_package_description'];
            
            #creates an array to hold new package data for use in query
            $package_array = array($package_name,$number_chairs,$number_guests,$floral_arrangement,
                                   $music_package,$photo_package,$description);
            
            #creates MySQL statement to insert new package in packages table
            $sql = "INSERT INTO packages
                SET packageName = ?,
                    numberChairs = ?,
                    numberGuests = ?,
                    floralArrangement = ?,
                    musicPackage = ?,
                    photoPackage = ?,
                    packageDescription = ?
            ";
            
            #executes query using constructed statement and the array of submitted data
            $statement = $this->db->query($sql,$package_array);
            
        }//end AddPackage Function 
        
        public function deletePackage($package_id) {
            
            #creates MySQL statement to retrieve wedding and package info from booked weddings
            $package_check_sql = "SELECT weddingId, packageId
                FROM bookedWeddings
                WHERE (packageId = ?)
            ";
            
            #executes query using "package_check_sql" statement and the selected package's packageId
            $package_check = $this->db->query($package_check_sql,array($package_id));
            
            #uses conditional to check if selected package is currently booked
            if($package_check->result() == false) {
                #if the selected package is not present in the bookedWeddings table
                
                #creates MySQL delete statement to remove the selected package from the packages table
                $delete_sql = "DELETE FROM packages
                    WHERE (packageId = ?);
                ";
                
                #executes query using "delete_sql" statement and the selected package's packageId
                $delete_statement = $this->db->query($delete_sql,array($package_id));
                
            }
            
        }//end DeletePackage Function
        
        public function getDealsList() {
            
            #creates MySQL statement to retrieve deals information for use in deals list
            $sql = "SELECT packageId AS packageId, packageName AS name
                FROM deals
            ";
            
            #executes query using the constructed statement
            $statement = $this->db->query($sql);
            
            #returns query results
            return $statement->result_array();
            
        }
        
        public function addDeal($deal_info) {
            
            #stores submittes data for creation of new deal
            $package_name = $deal_info['new_deal_package_name'];
            $number_chairs = $deal_info['new_deal_number_chairs'];
            $number_guests = $deal_info['new_deal_number_guests'];
            $floral_arrangement = $deal_info['new_deal_floral_arrangement'];
            $music_package = $deal_info['new_deal_music_package'];
            $photo_package = $deal_info['new_deal_photo_package'];
            $discount = $deal_info['new_deal_discount'];
            $deal_of_month = $deal_info['new_deal_of_month'];
            $description = $deal_info['new_deal_description'];
            
            #creates an array to hold new deal information for use in query
            $deal_array = array($package_name,$number_chairs,$number_guests,$floral_arrangement,
                                   $music_package,$photo_package,$discount,$deal_of_month,
                                   $description);
            
            #creates MySQL statement to insert new deal information into deals table
            $sql = "INSERT INTO deals
                SET packageName = ?,
                    numberChairs = ?,
                    numberGuests = ?,
                    floralArrangement = ?,
                    musicPackage = ?,
                    photoPackage = ?,
                    discount = ?,
                    dealOfMonth = ?,
                    packageDescription = ?
            ";
            
            #executes the query using the constructed statement and the new deal data
            $statement = $this->db->query($sql,$deal_array);
            
        }//end AddDeal Function 
        
        public function deleteDeal($package_id) {
            
            ##creates MySQL statement to retrieve wedding and deal info from booked weddings
            $package_check_sql = "SELECT weddingId, packageId
                FROM bookedWeddings
                WHERE (packageId = ?)
            ";
            
            #executes query using "package_check_sql" statement and the selected package's packageId
            $package_check = $this->db->query($package_check_sql,array($package_id));
            
            #uses conditional to check if selected package is currently booked
            if($package_check->result() == false) {
                #if the selected package is not present in the bookedWeddings table
                
                #creates MySQL delete statement to remove the selected package from the packages table
                $delete_sql = "DELETE FROM deals
                    WHERE (packageId = ?);
                ";
                
                #executes query using "delete_sql" statement and the selected package's packageId
                $delete_statement = $this->db->query($delete_sql,array($package_id));
                
            }
            
        }//end DeleteDeal Function
        
        public function generateRandomPassword($user_email) {
            
            #creates a string of all possible lower-case letters
            $characters = 'abcdefghijklmnopqrstuvwxyz';
            #creates an empty string to hold completed salt
            $result = '';
            
            #uses for loop to create random password string
            for($i=0;$i<8;$i++) {
                
                /* loops over string 8 times and selects a random character index 0-25 each time
                then adds the selected character to the end of the $result string */
                $result .= $characters[mt_rand(0,25)];
                
            }
            
            #generates a random salt for use in the database
            $salt = $this->generateSalt();
            
            #combines the salt and random password, then uses and MD5 hash on result to create new password for database
            $password = MD5($salt.$result);
            
            #creates MySQL statement to update the user's profile with the new random password and salt
            $sql = "UPDATE users
                SET userPass = ?,
                    userSalt = ?
                WHERE (userEmail = ?)
            ";    
            
            #executes query using the constructed statement, the new password and salt, and matches the
            #user's email address to the submitted address
            $statement = $this->db->query($sql,array($password,$salt,$user_email));
            
            #returns the un-hashed new password
            return $result;
            
        }//end GenerateRandomPassword Function
        
        public function generateSalt() {
            #uses a for loop to create a salt for encoding user-created passwords
            
            #creates a string of all possible (lower- and upper-case) letters and numbers
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            #creates an empty string to hold completed salt
            $result = '';
            
            for($i=0;$i<8;$i++) {
                
                /* loops over string 8 times and selects a random character index 0-61 each time
                then adds the selected character to the end of the $result string */
                $result .= $characters[mt_rand(0,61)];
                
            }
            
            #returns the new randomly generated Salt
            return $result;
        
        }//end GenerateSalt Function
        
    }

?>