<?php

namespace App\Http\Controllers\CustomerWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Pagination\Paginator;


class StoreCategoryController extends Controller
{
    

/*
  store Page
  Jeet
*/
    public function StorePage(Request $request){
        if (@Auth::user()->user_id) {
            $user_id=@Auth::user()->user_id;
            $cartdetail['user_id'] = $user_id;
        } else {
            $cartdetail['username'] = session('REMOTE_ADDR');
        }

      $admin_model_obj =  new \App\Models\AdminImpFunctionModel;
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

        $letter = @$request->input('filt');

        if (!empty($letter)) {
            // dd(1);
            $allvendorslistbyname = $admin_model_obj->FilterFrontVendorDataNew($letter);
            $data['allvendorslist'] = $allvendorslistbyname;
        } else {
            $allvendorslist = $admin_model_obj->getfrontvendorlistdata();
            $data['allvendorslist'] = $allvendorslist;
        }
        // dd($data);


        return view('member.storeAndCategory.store')->with($data);
    }











/*
  category Page
  Jeet
*/
    public function CategoryPage(){
         return view('member.storeAndCategory.category');
    }











    public function mall_page(){
         
        $admin_model_obj = new \App\Models\AdminImpFunctionModel;
        $user_id=@Auth::user()->user_id;

        if (!empty($user_id)) {
           
            $result = User::where('user_id',$user_id)->first();
            $data['record'] = $result;

            $amplesresult = $admin_model_obj->all_amples_data();
            $data['amplesdatas'] = $amplesresult;
            $data['myno'] = $user_id;
            $data['usrmakey'] = $user_id;
            $data['displaySideAdd'] = true;
        }
       

       if (@Auth::user()->user_id) {
            $user_id=@Auth::user()->user_id;
            $cartdetail['user_id'] = $user_id;
        } else {
            $cartdetail['username'] = session('REMOTE_ADDR');
        }


        $totaldata = $admin_model_obj->cart_total_amount($cartdetail);
        $totalcartdata = $admin_model_obj->select_cart_numericdata($cartdetail);

        $wishlistshow = $admin_model_obj->wishlist_cart($cartdetail);
        $wishlisttotaldata = count($wishlistshow);
        $resultdatapro = $admin_model_obj->gethomcatdata();
        $data['retdata'] = $resultdatapro;
        $resultdataspro = $admin_model_obj->gethomsubcatdata();
        $data['retsdata'] = $resultdataspro;


        $data['cartdata'] = $totaldata;
        $data['totalcartdata'] = $totalcartdata;
        $data['wishlistcartdata'] = $wishlisttotaldata;
        $data['wishcartdata'] = $wishlistshow;


        $frontallmalldata = $admin_model_obj->getfrontmainmallalldata();
        $data['mallfrontdata'] = $frontallmalldata;
        // dd($data['mallfrontdata']);
        return view('member.storeAndCategory.malls')->with($data);
    }


















    public function categorybymall($id){
        $mallid =$id;
        $admin_model_obj =  new \App\Models\AdminImpFunctionModel;

        $resultcatbymalllist = $admin_model_obj->getcategorybymall($mallid);
        $data['resultcatbymalllist'] = $resultcatbymalllist;
        $resultonecatbymalllist = $admin_model_obj->getonecategory($mallid);
        $data['resultonecatbymalllist'] = $resultonecatbymalllist;
        $resultcatmalllist = $admin_model_obj->getcatmallByMallId($mallid);
        $data['resultcatmalllist'] = $resultcatmalllist;
     
        $resultdatapro = $admin_model_obj->gethomcatdata();
        $data['retdata'] = $resultdatapro;
        $resultdataspro = $admin_model_obj->gethomsubcatdata();
        $data['retsdata'] = $resultdataspro;
        //dd($id,$data);
        return view('member.storeAndCategory.categorybymall')->with($data);
    }






















    public function productbyseller($vendorName1,$tbl_vndr_id,Request $request){
        // dd($vendorName1,$tbl_vndr_id);

        $user_id = @Auth::user()->user_id;
        $admin_model_obj = new \App\Models\AdminImpFunctionModel;

        if (!empty($user_id)) {
            $data['record'] = User::where('user_id',$user_id)->first();
            $amplesresult = $admin_model_obj->all_amples_data();
            $data['amplesdatas'] = $amplesresult;
            $data['myno'] = $user_id;
            $data['usrmakey'] = $user_id;
            $data['displaySideAdd ']= true;
        } 


        if (!empty($user_id)) {
            $cartdetail['user_id'] = $user_id;
        } else {
             $cartdetail['username'] = session('REMOTE_ADDR');
        }


        $selid = $tbl_vndr_id;
        $no_ample =@$request->query('no_ample');
        $free_products = @$request->query('free_products');
        // dd($no_ample,$free_products );
        $selid = intval($selid);
        $VendorMeta = $admin_model_obj->GetVendorMeta($selid);

        // dd($VendorMeta->meta_keyword);
            if (!empty($VendorMeta->meta_keyword)) {
                $data['SiteKeywords'] = $VendorMeta->meta_keyword;
            }

            if (!empty($VendorMeta->meta_description)) {
                $data['SiteDescription'] = $VendorMeta->meta_description;
            }

        


        $vendordata = $admin_model_obj->getvendorbykey($selid);
        // dd($vendordata[0]->storestatus);

        if ($vendordata[0]->storestatus != 1) {
           return back();
        }
        $data['is_free_vendor'] = 0;
        $data['portfolilink'] = '#videonew';



        if (isset($no_ample) && $no_ample == 'true') {
            $report = $admin_model_obj->productbysellerNoamples($selid);
        } else if (isset($free_products) && $free_products == 'true') {
            $report = $admin_model_obj->ProductBySellerFreeProducts($selid);
            $data['is_free_vendor'] = 1;
        } else {
            $report = $admin_model_obj->productbyseller('feature', $selid);
        }




        $totaldata = $admin_model_obj->cart_total_amount($cartdetail);
        $totalcartdata = $admin_model_obj->select_cart_numericdata($cartdetail);
        $resultdatapro = $admin_model_obj->gethomcatdata();
        $data['retdata'] = $resultdatapro;
        $resultdataspro = $admin_model_obj->gethomsubcatdata();
        $data['retsdata'] = $resultdataspro;
        $wishlistshow = $admin_model_obj->wishlist_cart($cartdetail);
        $wishlisttotaldata = count($wishlistshow);


        $headertitle = $admin_model_obj->getheadertitledata($cartdetail);

        //print_r($headertitle);die;
        $data['headtitle'] = $headertitle;

        $data['vdrid'] = $selid;
        $data['vendordata'] = $vendordata;

        $data['paginator'] = $report;
        $data['cartdata'] = $totaldata;
        $data['totalcartdata'] = $totalcartdata;
        $data['wishlistcartdata'] = $wishlisttotaldata;
        $data['wishcartdata'] = $wishlistshow;
        $data['usrmakey'] = $user_id;
        $data['currencySymbol']="$";
        

        $resultproductsubcat2list = $admin_model_obj->getproductsubcat2Idlistbyseller($selid);
        $data['resultproductsubcat2list'] = $resultproductsubcat2list;
        // dd(  $data['paginator'] );
        return view('member.storeAndCategory.productbyseller')->with($data);
    }














    public function checksynergybalance(Request $request){
        $synergy_card_no = $request->input('synergy_card_no');

        $postParameters = [
            'userName' => 'amplepoints',
            'password' => '81qQPP472pn03svzH4',
            'merchantRockCommID' => 'GIFTTEST01',
            'customerCardNumber' => $synergy_card_no,
            'numPoints' => '0',
            'cardAction' => 'CardKeyed',
            'clerkID' => '',
            'checkNumber' => '',
            'accountType' => 'CardNumber',
            'ResponseFormat' => 'Json',
        ];

        $responseData = $this->synergyBalanceInquiry($postParameters);
        return response()->json($responseData);

    }













public function synergyBalanceInquiry($postParameters = [])
{
    $userName = $postParameters['userName'];
    $password = $postParameters['password'];
    $merchantRockCommID = $postParameters['merchantRockCommID'];
    $customerCardNumber = $postParameters['customerCardNumber'];
    $numPoints = $postParameters['numPoints'];
    $cardAction = $postParameters['cardAction'];
    $clerkID = $postParameters['clerkID'];
    $checkNumber = $postParameters['checkNumber'];
    $accountType = $postParameters['accountType'];
    $ResponseFormat = $postParameters['ResponseFormat'];

    $postFieldData = "<?xml version='1.0' encoding='utf-8'?>
        <soap12:Envelope xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xmlns:xsd='http://www.w3.org/2001/XMLSchema' xmlns:soap12='http://www.w3.org/2003/05/soap-envelope'>
            <soap12:Header>
                <UserCredentials xmlns='http://tempuri.org/'>
                    <userName>$userName</userName>
                    <password>$password</password>
                </UserCredentials>
            </soap12:Header>
            <soap12:Body>
                <BalanceInquiry xmlns='http://tempuri.org/'>
                    <MerchantRockCommID>$merchantRockCommID</MerchantRockCommID>
                    <CustomerCardNumber>$customerCardNumber</CustomerCardNumber>
                    <NumPoints>$numPoints</NumPoints>
                    <CardAction>$cardAction</CardAction>
                    <ClerkID>$clerkID</ClerkID>
                    <CheckNumber>$checkNumber</CheckNumber>
                    <AccountType>$accountType</AccountType>
                    <ResponseFormat>$ResponseFormat</ResponseFormat>
                </BalanceInquiry>
            </soap12:Body>
        </soap12:Envelope>";

    $response = Http::withHeaders([
        'Content-Type' => 'text/xml',
    ])->post('http://synergywebservice.com/SynergyWebX.asmx', $postFieldData);

    $responseData = json_decode($response->body(), true);

    return $responseData;
}











public function sendcontactmereqtovendor(Request $request){

    if ($request->isMethod('post')) {
        $returnResult = 'error';

        $senderFullName = $request->input('sender_full_name');
        $senderEmail = $request->input('sender_email');
        $senderPhone = $request->input('sender_phone');
        $msgSubject = $request->input('msgsubject');
        $msgDetail = $request->input('msgdetail');
        $vendorId = $request->input('vendor_id');

        $vendorDetails = DB::table('tbl_vendor')
            ->select('tbl_vndr_dispname', 'tbl_vndr_mail')
            ->where('tbl_vndr_id', $vendorId)
            ->first();

        if ($vendorDetails) {
            $tblVndrDispName = $vendorDetails->tbl_vndr_dispname;
            $tblVndrMail = $vendorDetails->tbl_vndr_mail;

            $emailData = [
                'tbl_vndr_dispname' => $tblVndrDispName,
                'tbl_vndr_mail' => $tblVndrMail,
                'sender_full_name' => $senderFullName,
                'sender_email' => $senderEmail,
                'sender_phone' => $senderPhone,
                'subject' => $msgSubject,
                'detail' => $msgDetail,
            ];

            $returnResult = 'done';

            // Assuming you have a method named sendVdrContactMeEmail in your controller
            //mail will go
            // $this->sendVdrContactMeEmail($emailData);
        }

        return response()->json(['result' => $returnResult]);
    }

}














}
