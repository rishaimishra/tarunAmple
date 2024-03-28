<?php

namespace App\Http\Controllers\CustomerWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Mail;
use Auth;
use App\Mail\EmpRegisterMail;
use App\Models\HomeBrandSliderModel;
use App\Models\AdminModel;
use App\Models\VendorModel;
use DB;
use GuzzleHttp\Client;


class CustomerAuthController extends Controller
{


/*
  Index Page
  Jeet
*/
    public function indexPage(){
         // $user = Auth::guard('web')->user();
                      // $user2 = Auth::user();
                // dd('successful Customer Login done',$user,$user2);
        $allSlider=HomeBrandSliderModel::with('vendorDetails')->get();
        foreach($allSlider as $key=> $val){

            $tableName = 'products';
            // $condition='feature';

            // if ($condition == 'feature') {
            //     $whereCondition = 'is_featured';
            //     $whereValue = '1';
            // } elseif ($condition == 'hotdeal') {
            //     $whereCondition = 'is_featured';
            //     $whereValue = '0';
            // } else {
            //     $whereCondition = 'deal_type';
            //     $whereValue = '0';
            // }

            $products_under_a_brand = DB::table($tableName)
                ->select([
                    'id as pid',
                    'vendor_uid as vendor_key',
                    'product_type_key',
                    'product_name as pname',
                    'single_price as pprice',
                    'image as img_name',
                    'prod_front_fromdate as pfrmdate',
                    'prod_front_todate as ptodate',
                    'stock_availability as pstock',
                    'quantity',
                    'min_order_quantity as pminqty',
                    'deal_type as pdltype',
                    'product_discount as pdiscount',
                    'no_of_amples as pamples',
                    'free_with_amples as pfwamples',
                    'supplier_name as pvendor',
                    'discount_price as pdiscountprice',
                ])
                ->orderBy('single_price','asc')
                // ->where('status', '=', "1")
                ->whereIn('status', ["2","1"])
                ->where('is_free_product', '=', "0")
                ->where('vendor_uid', '=', $val->vendor_id)
                // ->where($whereCondition, '=', $whereValue)
                ->skip(0)->take($val->slider_no*5)
                ->get();

                if(count($products_under_a_brand)<1){
                  $allSlider[$key]['productAvailable']=false;
                }else{
                   $allSlider[$key]['productAvailable']=true;
                }
                $allSlider[$key]['products_under_a_brand']=$products_under_a_brand;
        }
         // return $allSlider;
         $data['datas']=$allSlider;
        return view('Layouts.home')->with($data);
    }
   





/*
 Member Login Page
 Jeet
*/
    public function memberLogin(){
       return view('member.auth.login');
    }



    public function passwordHashMember(){
         User::orderBy('user_id','desc')
            ->chunk(200, function ($users) {
                foreach ($users as $user) {
                    $user->password = Hash::make($user->password);
                    $user->save();
                }
            });
        return 'Passwords encrypted successfully for member.';
    }








/*
 Member Login post
 Jeet
*/
    public function memberLoginPost(Request $request){
          $userDataEmail=User::where('email',$request->email)->where("user_type",'User')->first();
            if ($userDataEmail) {
               if (!\Hash::check($request->password, $userDataEmail->password)) {
                    return redirect()->back()->with('error','Incorrect Password');
                }

                //check verified or not
                $chk=User::where('user_id',$userDataEmail->user_id)->whereNotNull('verification_link')->first();
                if($chk){
                     return back()->with("error","Verfication not done. Kindly verify the link given to your email to proceed");
                }

                  Auth::login($userDataEmail);
                Auth::guard('web')->login($userDataEmail);

                  // Access the authenticated admin user

                     $user = Auth::guard('web')->user();
                      $user2 = Auth::user();
                // dd('successful Customer Login done',$userDataEmail,$user,$user2);
                 // return redirect()->route('index.page');
                    return redirect()->route('member.dashboard');
            }else{
                 return back()->with("error","Customer Credential is wrong.");
            }
    }







/*
 Member Registration Page
 Jeet
*/
    public function memberSignup(){
      return view('member.auth.signup');
    }








/*
A common function 
Jeet
*/
public function userUniqueNo($len = 5)
    {

        $length = $len;

        $charactersSTR = 'AMPLEPOINTSabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($charactersSTR);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $charactersSTR[rand(0, $charactersLength - 1)];
        }
        $randomString .= uniqid();

        $getstring = substr(str_shuffle($randomString), 0, $length);

        return strtoupper($getstring);

    }





  public function CreateVerificationLink()
    {

        $length = 15;

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $randomString .= uniqid();

        return substr(str_shuffle($randomString), 0, 15);

    }






/*
 Member Registration post
 Jeet
*/
    public function memberRegister(Request $request){
         // dd($request->all());
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile_no' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        //check Email
        $chk=User::where('email',$request->email)->first();
        if($chk){
             return back()->with('error','Email already exists');
        }

       

            $first_name = $request->first_name;
            $last_name = $request->last_name;
            $mobile = $request->mobile_no;
            $email = $request->email;
            $password = $request->password;
            $image = '';
            $zip_code = '';
            $birthdays = '';
            $educations = '';
            $incomes = '';
            $interestss = '';
            $cfollow = @$request->referral_no;
            $vendor_ref = @$request->store_referral_no;
            $user = 'User';


                // $ustatus = 1;

            $fulname = $request->first_name . $request->last_name;
            $n_ample = !empty($fulname) ? 5 : 0;
            $m_ample = !empty($mobile) ? 4 : 0;
            $e_ample = !empty($email) ? 0 : 0; 
            $i_ample = !empty($image) ? 4 : 0;
            $zip_ample = !empty($zip_code) ? 5 : 0;
            $b_ample = !empty($birthdays) ? 5 : 0;
            $edu_ample = !empty($educations) ? 5 : 0;
            $in_ample = !empty($incomes) ? 4 : 0;
            $intest_ample = !empty($interestss) ? 5 : 0;

            $default_ample = ($n_ample + $m_ample + $e_ample + $i_ample + $zip_ample + $b_ample + $edu_ample + $in_ample + $intest_ample);

            $rewardtime = 10.00;

            $is_driver = 0;
            $refer_by_code = '';

                if (!empty($cfollow)) {

                    $cfollow = trim($cfollow);

                    $checkCfollow = strtolower($cfollow);

                    $the_substringuber = 'uber';
                    $the_substringfyft = 'lyft';

                    if (strpos($checkCfollow, $the_substringuber) !== false || strpos($checkCfollow, $the_substringfyft) !== false) {

                        $is_driver = 1;

                        $cfollow = '';

                    } else {
                        $Custdata = User::where('referral_no', $cfollow)->where('status', '!=', '0')->get();

                        if (!empty($Custdata)) {
                            $cfollow = $Custdata[0]['email'];
                        } else {
                            $cfollow = '';
                        }
                    }

                }

                $reffralNo = $this->userUniqueNo(6);

                $follow_vendor = 0;


                if (!empty($vendor_ref)) {

                    $vendor_ref = trim($vendor_ref);

                    $vendorData =  $result = DB::table('tbl_vendor')->where('vendor_ref_code', $vendor_ref)->get();

                    if (!empty($vendorData)) {

                        $follow_vendor = $vendorData[0]['tbl_vndr_id'];
                    }
                }


              // now insert code in user table

               $user = new User([
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'password' => Hash::make($password),
                    'mobile' => $mobile,
                    'reward_time' => $rewardtime,
                    'follower_keyword' => $cfollow,
                    'status' => 1,
                    'added_date' => date('Y-m-d H:i:s'),
                    'register_date' => date('Y-m-d H:i:s'),
                    'user_type' => 'User',
                    'total_ample' => $default_ample,
                    'referral_no' => $reffralNo,
                    'is_driver' => $is_driver,
                    'ref_vendor_id' => $follow_vendor,
                ]);

               $user->save();
               $user['pass']=$password;

               $res=$this->registerTravelUser($user);
               // dd($res);



                $insertId = $user->user_id;
                // dd($user);

                if ($insertId > 0) {

                    $verificationLink = $this->CreateVerificationLink();

                    // update verification_link on that userId
                    $updateUserVerifyLink=User::where('user_id',$insertId)->update(['verification_link' => $verificationLink]);

                    $latestUser=User::where('user_id',$insertId)->first();

                   
                    // dd($latestUser);
                   // mail sent
                    $mailData = [
                        'title' => 'Mail from Amplepoint',
                        'body' => 'Verify to login in amplepoint.',
                        'userObject' =>$latestUser
                    ];

                   Mail::to($request->email)->send(new EmpRegisterMail($mailData));
                     
                     // sms sent
                    // $this->sendCustomerSignUpMsg($first_name, $email, $mobile, $password, $verificationLink);
                   dd($res);

                  return redirect()->route('index.page')->with('success', 'Registration Done Successfully, Kindly Verify the link given to email.');

                } 
                else {
                   // dd(1);
                return redirect()->route('index.page')->with('error', 'Registration process gone wrong.');
                }

    }











    public function registerTravelUser($user)
    {
        //this code is for register user from amplepoint project ==> to travel project user tbale using php core code

        // Specify API endpoint
        $url = 'http://127.0.0.1:8000/api/userInserFromAmplepoint';

        // Specify payload for POST request
        $payload = json_encode($user);

        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
            ],
            CURLOPT_RETURNTRANSFER => true,
        ]);

        // Execute cURL request
        $response = curl_exec($ch);

        // Check for cURL error
        if ($error = curl_error($ch)) {
            // Handle cURL error
            return response()->json(['error' => $error], 500);
        }

        // Close cURL session
        curl_close($ch);

        // Handle the response as needed
        return response()->json(['response' => $response]);
    }











    // public function registerTravelUser($user)
//     {
//         //this code is for register user from amplepoint project to travel project user tbale using php core code
//         // Database credentials
// $servername = "127.0.0.1";
// $username = "root";
// $password = "";
// $database = "ampletravel_travel";
// $db_port = 3007;

// // Create connection
// $conn =mysqli_connect($servername, $username, $password, $database,$db_port);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // SQL query to select data from the users table
// $sql = "SELECT * FROM users";

// // Execute the query
// $result = $conn->query($sql);

// // Check if there are any results
// if ($result->num_rows > 0) {
//     // Output data of each row
//     while ($row = $result->fetch_assoc()) {
//         echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " - Email: " . $row["email"] . "<br>";
//     }
// } else {
//     echo "0 results";
// }

// // Close the connection
// $conn->close();
        
//     }




   







   public function memberVerification($id,$link){
    // dd($id,$link);
    $findUser=User::where('user_id',$id)->where('verification_link',$link)->first();
    if(!$findUser){
       return redirect()->route('index.page')->with('error', 'Link is mismatched.');
    }
    //update
    $findUser=User::where('user_id',$id)->update(['verification_link' => null]);
    return redirect()->route('index.page')->with('success', 'Verfication Successfully done.');

   }

















   public function dashboard(){
    // dd(Auth::user());
        if (@Auth::user()->user_id) {
            $user_id=@Auth::user()->user_id;
            $session_data['user_id'] = $user_id;
            $cartdetail['user_id'] = $user_id;
        } else {
            $session_data['user_name'] = session('REMOTE_ADDR');
            $cartdetail['username'] = session('REMOTE_ADDR');
        }

        $user_email = @Auth::user()->email;
        $data['useremail'] = $user_email;



        if (@Auth::user()->user_type != 'User') {
            return back();
        } else {
           
            $admin_model_obj = new \App\Models\AdminImpFunctionModel;
            $data['myadminobj'] = $admin_model_obj;

            $result = User::where('user_id',$user_id)->first();
            $data['record'] = $result;

            $amplesresult = $admin_model_obj->all_amples_data();
            $data['amplesdatas'] = $amplesresult;

          

            $totaldata = $admin_model_obj->cart_total_amount($cartdetail);
            $totalcartdata = $admin_model_obj->select_cart_numericdata($cartdetail);

            $wishlistshow = $admin_model_obj->wishlist_cart($cartdetail);
            $wishlisttotaldata = count($wishlistshow);


            $data['cartdata'] = $totaldata;
            $data['totalcartdata'] = $totalcartdata;
            $data['wishlistcartdata'] = $wishlisttotaldata;
            $data['wishcartdata'] = $wishlistshow;
            $resultdatapro = $admin_model_obj->gethomcatdata();
            $data['retdata'] = $resultdatapro;
            $resultdataspro = $admin_model_obj->gethomsubcatdata();
            $data['retsdata'] = $resultdataspro;

            $progressresult = $admin_model_obj->user_profile_progressdata($user_id);
            $data['progressdata'] = $progressresult;

            // dd($data['progressdata'] );
        
            $gethistorylist = $admin_model_obj->Dashboardgethistorylist($user_id, 0, 5);
            $data['gethistorylist'] = $gethistorylist;

            $i = 0;
            // dd($progressresult);
            foreach ($progressresult as $keydata) {
                // dd($progressresult,$keydata);
                if ($keydata != '') {
                    $nonemptydatacount = count(array_filter((array)$keydata));
                }
                $i++;
            }
            $data['nonemptydatacount'] = $nonemptydatacount;



            $maincatdata = $admin_model_obj->getmaincatdata();
            $data['maincatdata'] = $maincatdata;

            $followerdata = $admin_model_obj->getfollowersdata($user_email);
            $data['followerdata'] = $followerdata;


            $followingdata = $admin_model_obj->getfollowingdata($user_email);
            $data['followingdata'] = $followingdata;

            $data['usrmakey'] = $user_id;

            /* $userblog = $admin_model_obj->getuserblogdata($user_id);
                $this->view->userblog = $userblog;*/

            //$userblog = $admin_model_obj->getsocialmediauserblogs($user_id);
            //$this->view->userblog = $userblog;

            //$userphoto = $admin_model_obj->getsocialmediauserphotos($user_id);
            //$this->view->userphotos = $userphoto;

            /*$uservideo = $admin_model_obj->getuservideodata($user_id);
                $this->view->uservideo = $uservideo;*/

            //$uservideo = $admin_model_obj->getsocialmediauservideo($user_id);
            //$this->view->uservideo = $uservideo;

            /* $uservideotv = $admin_model_obj->getuservideotvdata($user_id);
                $this->view->uservideotv = $uservideotv;*/

            //$uservideotv = $admin_model_obj->getsocialmediausermovietv($user_id);
            //$this->view->uservideotv = $uservideotv;


            $headertitle = $admin_model_obj->getheadertitledata($cartdetail);
            $data['headtitle'] = $headertitle;

            $country = $admin_model_obj->country_list();
            $data['countrylist'] = $country;

            $resultcravingdata = $admin_model_obj->getcravingdata($user_id);
            $data['cravingdatalist'] = $resultcravingdata;

            $data['userpurchased'] = [];

            //$resultuserpurchased =  $admin_model_obj->getusersAllLatestOrderDetail($user_id,0,5);
            //$this->view->userpurchased = $resultuserpurchased;

            //$LocalPurchase =  $admin_model_obj->UsersLatestLocalPurchaseData($user_id,0,5);
            //$this->view->LocalPurchased = $LocalPurchase;

            //$checkoutorders =  $admin_model_obj->ApiUsersLatestOrders($user_id,0,5);
            //$this->view->checkoutwithample = $checkoutorders;

            $userTotalPurchase = $admin_model_obj->custgetcustomertotalpurchase($user_id);

            if (!empty($userTotalPurchase)) {

                $TotalAmount = $userTotalPurchase[0]->totalpurchase;

                if ($TotalAmount >= 1 && $TotalAmount <= 500) {

                    $admin_model_obj->updateAmplePoints(array('member_status' => 'silver'), $user_id);

                } else if ($TotalAmount >= 501 && $TotalAmount <= 1000) {

                    $admin_model_obj->updateAmplePoints(array('member_status' => 'gold'), $user_id);

                } else if ($TotalAmount >= 1001) {

                    $admin_model_obj->updateAmplePoints(array('member_status' => 'platinum'), $user_id);

                }
            }

            $data['setOgUrl'] = True;
            //$this->view->ogUrl  = 'https://amplepoints.com/productdetail/'.$productid;
            $data['ogType'] = 'article';
            //$this->view->ogTitle  = $report[0]['product_name'];

            $OGDesc = '';
            $OGTitle = 'Registration - amplepoints.com';
            if (!empty($result->invite_text)) {

                $OGDesc = $result->invite_text;
                $OGTitle = $result->invite_text;
            } else {
                $OGDesc = "Today with online shopping, everything you need is right at your fingertips. On Ample Points you can shop the hottest brands, book hotels, find local deals, restaurants, properties and so much more. We reward our members for shopping, sharing and watching your favorite ads. Use your points at checkout towards free products and every time you shop you earn extra benefits. With Ample Points you can always rest assured about the quality of the products you are buying online at our website. Together with our trusted partners we promise to deliver only original and brand-new products.";

            }
            $data['ogDescription'] = $OGDesc;
            $data['ogTitle'] = $OGTitle;
            $data['ogImage'] = 'https://amplepoints.com/home_banners/AmplePoints_First_Banner.jpg';

        }

    return view('member.dashboard.dashboard')->with($data);
   }
















public function regFromTravel(Request $request){
  // return $request->all();
   //insert user data comming from travel project -> to ample point project


         // dd($request->all());
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        //check Email
        // $chk=User::where('email',$request->email)->first();
        // if($chk){
        //      return back()->with('error','Email already exists');
        // }

       

            $first_name = $request->first_name;
            $last_name = $request->last_name;
            $mobile = $request->phone;
            $email = $request->email;
            $password = $request->password;
            $image = '';
            $zip_code = '';
            $birthdays = '';
            $educations = '';
            $incomes = '';
            $interestss = '';
            $cfollow = @$request->referral_no;
            $vendor_ref = @$request->store_referral_no;
            $user = 'User';


                // $ustatus = 1;

            $fulname = $request->first_name . $request->last_name;
            $n_ample = !empty($fulname) ? 5 : 0;
            $m_ample = !empty($mobile) ? 4 : 0;
            $e_ample = !empty($email) ? 0 : 0; 
            $i_ample = !empty($image) ? 4 : 0;
            $zip_ample = !empty($zip_code) ? 5 : 0;
            $b_ample = !empty($birthdays) ? 5 : 0;
            $edu_ample = !empty($educations) ? 5 : 0;
            $in_ample = !empty($incomes) ? 4 : 0;
            $intest_ample = !empty($interestss) ? 5 : 0;

            $default_ample = ($n_ample + $m_ample + $e_ample + $i_ample + $zip_ample + $b_ample + $edu_ample + $in_ample + $intest_ample);

            $rewardtime = 10.00;

            $is_driver = 0;
            $refer_by_code = '';

                if (!empty($cfollow)) {

                    $cfollow = trim($cfollow);

                    $checkCfollow = strtolower($cfollow);

                    $the_substringuber = 'uber';
                    $the_substringfyft = 'lyft';

                    if (strpos($checkCfollow, $the_substringuber) !== false || strpos($checkCfollow, $the_substringfyft) !== false) {

                        $is_driver = 1;

                        $cfollow = '';

                    } else {
                        $Custdata = User::where('referral_no', $cfollow)->where('status', '!=', '0')->get();

                        if (!empty($Custdata)) {
                            $cfollow = $Custdata[0]['email'];
                        } else {
                            $cfollow = '';
                        }
                    }

                }

                $reffralNo = $this->userUniqueNo(6);

                $follow_vendor = 0;


                if (!empty($vendor_ref)) {

                    $vendor_ref = trim($vendor_ref);

                    $vendorData =  $result = DB::table('tbl_vendor')->where('vendor_ref_code', $vendor_ref)->get();

                    if (!empty($vendorData)) {

                        $follow_vendor = $vendorData[0]['tbl_vndr_id'];
                    }
                }


              // now insert code in user table

               $user = new User([
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'password' => Hash::make($password),
                    'mobile' => $mobile,
                    'reward_time' => $rewardtime,
                    'follower_keyword' => $cfollow,
                    'status' => 1,
                    'added_date' => date('Y-m-d H:i:s'),
                    'register_date' => date('Y-m-d H:i:s'),
                    'user_type' => 'User',
                    'total_ample' => $default_ample,
                    'referral_no' => $reffralNo,
                    'is_driver' => $is_driver,
                    'ref_vendor_id' => $follow_vendor,
                ]);

               $user->save();
               



                $insertId = $user->user_id;
                // dd($user);

                if ($insertId > 0) {

                    $verificationLink = $this->CreateVerificationLink();

                    // update verification_link on that userId
                    $updateUserVerifyLink=User::where('user_id',$insertId)->update(['verification_link' => $verificationLink]);

                    $latestUser=User::where('user_id',$insertId)->first();

                   
                    // dd($latestUser);
                   // mail sent
                    $mailData = [
                        'title' => 'Mail from Amplepoint',
                        'body' => 'Verify to login in amplepoint.',
                        'userObject' =>$latestUser
                    ];

                   Mail::to($request->email)->send(new EmpRegisterMail($mailData));
                     
                     // sms sent
                    // $this->sendCustomerSignUpMsg($first_name, $email, $mobile, $password, $verificationLink);
                  // dd($res);
                   return "Resgistraion to amplepoint project is successfull";


                } 
                else {
                    return "Resgistraion to amplepoint project is not successfull";

                   // dd(1);
                  //return redirect()->route('index.page')->with('error', 'Registration process gone wrong.');
                }



}



  




}
