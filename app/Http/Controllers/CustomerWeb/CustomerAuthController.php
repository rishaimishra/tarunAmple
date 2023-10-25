<?php

namespace App\Http\Controllers\CustomerWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Mail;
use Auth;
use App\Mail\EmpRegisterMail;

class CustomerAuthController extends Controller
{


/*
  Index Page
  Jeet
*/
    public function indexPage(){
        return view('Layouts.home');
    }
   





/*
 Member Login Page
 Jeet
*/
    public function memberLogin(){
       return view('member.login');
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


                dd('successful Customer Login',$userDataEmail);
                // Auth::login($userDataEmail);
                 // return redirect()->route('cust.dashboard');
            }else{
                 return back()->with("error","Customer Credential is wrong.");
            }
    }







/*
 Member Registration Page
 Jeet
*/
    public function memberSignup(){
      return view('member.signup');
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

                  return redirect()->route('index.page')->with('success', 'Registration Done Successfully, Kindly Verify the link given to email.');

                } 
                else {
                   // dd(1);
                return redirect()->route('index.page')->with('error', 'Registration process gone wrong.');
                }

    }


   







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






  




}
