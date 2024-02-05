<?php

namespace App\Http\Controllers\CustomerWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    
     public function checkoutAction()
    {
        $session_data = $this->session_data();
        $user_id = @$session_data['user_id'];
        $admin_model_obj = new Admin_Model_Admin();
        $this->_helper->getHelper('layout')->setLayoutPath(APPLICATION_PATH . '/layouts/scripts');

        if (!empty($user_id)) {
            $this->_helper->getHelper('layout')->setLayoutPath(APPLICATION_PATH . '/layouts/scripts');
            $this->_helper->getHelper('layout')->setLayout('dashboard');
            $result = $admin_model_obj->dashboard_data($user_id);
            $this->view->record = $result;
            $this->view->usrmakey = $user_id;
        } else {
            $this->_helper->getHelper('layout')->setLayout('inner');
        }

        $this->view->headTitle('Product Checkout');

        $request = $this->getRequest();

        //session_start();
        $ses_id = session_id();
        $_SESSION["REMOTE_ADDR"] = $ses_id;

        if (!empty($user_id)) {
            $cartdetail['user_id'] = $user_id;
        } else {
            $cartdetail['username'] = $_SESSION["REMOTE_ADDR"];
        }

        //$report = $admin_model_obj->featuredata("feature");
        //$reporthot = $admin_model_obj->featuredata("hotdeal");
        //$reportnew = $admin_model_obj->featuredata("new");
        $totaldata = $admin_model_obj->cart_total_amount($cartdetail);
        //echo "<pre>";print_r($totaldata);die;
        $totalcartdata = $admin_model_obj->select_cart_numericdata($cartdetail);

        $wishlistshow = $admin_model_obj->wishlist_cart($cartdetail);
        $wishlisttotaldata = count($wishlistshow);

        //$this->view->data = $report;
        //$this->view->datahot = $reporthot;
        //$this->view->datanew = $reportnew;
        $this->view->cartdata = $totaldata;
        $this->view->totalcartdata = $totalcartdata;
        $this->view->wishlistcartdata = $wishlisttotaldata;
        $this->view->wishcartdata = $wishlistshow;
        $this->view->usrmakey = $user_id;


        //$frontvendordata       = $admin_model_obj->getfrontvendorlist();
        //$this->view->vendorfrontdata = $frontvendordata;

        //$frontvendoraddress       = $admin_model_obj->getfrontvendoraddress();
        //$this->view->vendorfrontaddrss = $frontvendoraddress;

        //$maincatdata    =    $admin_model_obj->getmaincatdata();
        //$this->view->maincatdata    =    $maincatdata;

        //$subcatdata        =    $admin_model_obj->getsubcatdata();
        //$this->view->subcatdata    =    $subcatdata;

        //$subcatlastdata    =    $admin_model_obj->getsubcatlastdata();
        //$this->view->subcatlastdata    =    $subcatlastdata;

        //$getbranddata    =    $admin_model_obj->getbrandlist();
        //$this->view->branddata    =    $getbranddata;

        $country = $admin_model_obj->country_list();
        $this->view->countrylist = $country;

        $request = $this->getRequest();

        $udetail = array();
        $orderdetail = array();


        $msgText = '';
        $msg = base64_decode($this->_getParam('msg'));
        if ($msg != '') {
            if ($msg == 8) {
                $msgText = 'The credit card has expired.';
            } elseif ($msg == 6) {
                $msgText = 'The credit card number is invalid.';
            }
            $this->view->msg = $msgText;
        }
        $err = $this->_getParam('err');
        if ($err != '') {
            $this->view->err = 'Invalid Payment';
        }

        $orderdata = array();

        if ($request->isPost()) {

            //echo "<pre>";print_r($_POST);die;

            $contuseridata = $admin_model_obj->getuseridata($user_id);
            //print_r($contuseridata); die();
            $contid = $contuseridata[0]['user_countrykey']; //$this->_getParam('country');

            $statid = $contuseridata[0]['user_statekey'];  //$this->_getParam('state');
            $citid = $contuseridata[0]['user_citykey']; //$this->_getParam('city');

            $contstatcitidata = $admin_model_obj->getcontstatcitidata($contid, $statid, $citid);
            //print_r($contstatcitidata); die();
            $user_country = $contstatcitidata[0]['contname'];
            $user_state = $contstatcitidata[0]['statename'];
            $user_city = $contstatcitidata[0]['citiname'];
            $udetail['user_type'] = $contuseridata[0]['user_type'];
            $udetail['first_name'] = $contuseridata[0]['first_name'];//$request->getParam('first_name');
            $udetail['last_name'] = $contuseridata[0]['last_name']; //$request->getParam('last_name');
            //$udetail['cname'] = $request->getParam('company_name');
            $udetail['email'] = $contuseridata[0]['email']; //$request->getParam('email_address');

            $udetail['address'] = $contuseridata[0]['address']; //$request->getParam('address');
            $udetail['ucity'] = $user_city;
            $udetail['ustate'] = $user_state;
            $udetail['ucountry'] = $user_country;
            $udetail['user_citykey'] = $citid;
            $udetail['user_statekey'] = $statid;
            $udetail['user_countrykey'] = $contid;
            $udetail['uzip'] = $contuseridata[0]['zip_code']; //$request->getParam('postal_code');
            $udetail['mobile'] = $contuseridata[0]['mobile']; //$request->getParam('telephone');

            $ccname = $udetail['first_name'] . ' ' . $udetail['last_name'];

            $checkOutTotal = $request->getParam('overalltotal');

            $payment_type_check = $request->getParam('payment_type');

            /*Store User Address ForOrder*/

            $orderdetail['customer_id'] = $user_id;
            $orderdetail['first_name'] = $request->getParam('b_first_name');
            $orderdetail['last_name'] = $request->getParam('b_last_name');
            $orderdetail['cname'] = $request->getParam('b_first_name') . ' ' . $request->getParam('b_last_name');
            $orderdetail['email'] = $request->getParam('b_email_address');
            $orderdetail['address'] = $request->getParam('b_address');

            $b_country = $request->getParam('b_country');
            $b_state = $request->getParam('b_state');
            $b_city = $request->getParam('b_city');

            $getscountcitydataBill = $admin_model_obj->getcontstatcitidata($b_country, $b_state, $b_city);

            $orderdetail['ucity'] = $getscountcitydataBill[0]['citiname'];
            $orderdetail['ustate'] = $getscountcitydataBill[0]['statename'];
            $orderdetail['ucountry'] = $getscountcitydataBill[0]['contname'];

            $orderdetail['user_citykey'] = $b_city;
            $orderdetail['user_statekey'] = $b_state;
            $orderdetail['user_countrykey'] = $b_country;

            $orderdetail['uzip'] = $request->getParam('b_postal_code');
            $orderdetail['mobile'] = $request->getParam('b_telephone');
            $orderdetail['ufax'] = $request->getParam('b_fax');
            $sfirst_name = $request->getParam('sfirst_name');
            $slast_name = $request->getParam('slast_name');
            $semail_address = $request->getParam('semail_address');
            $saddress = $request->getParam('saddress');
            $scountry = $request->getParam('scountry');
            $sstate = $request->getParam('sstate');
            $scity = $request->getParam('scity');
            $spostal_code = $request->getParam('spostal_code');
            $stelephone = $request->getParam('stelephone');
            $sfax = $request->getParam('sfax');
            $orderdetail['sfirst_name'] = $sfirst_name;
            $orderdetail['slast_name'] = $slast_name;
            $orderdetail['scname'] = $ccname;
            $orderdetail['semail'] = $semail_address;
            $orderdetail['saddress'] = $saddress;
            $getscountcitydata = $admin_model_obj->getcontstatcitidata($scountry, $sstate, $scity);
            $suser_country = $getscountcitydata[0]['contname'];
            $suser_state = $getscountcitydata[0]['statename'];
            $suser_city = $getscountcitydata[0]['citiname'];
            $orderdetail['sucity'] = $suser_city;
            $orderdetail['sustate'] = $suser_state;
            $orderdetail['sucountry'] = $suser_country;
            $orderdetail['suser_citykey'] = $scity;
            $orderdetail['suser_statekey'] = $sstate;
            $orderdetail['suser_countrykey'] = $scountry;
            $orderdetail['suzip'] = $spostal_code;
            $orderdetail['smobile'] = $stelephone;
            $orderdetail['sufax'] = $sfax;


            if (!empty($payment_type_check) && $payment_type_check == 'by_stripe') {

                $OrdRandStr = $this->createrandomstring();
                $orderid = "AMPLI" . $OrdRandStr;

                $transaction_id = $orderid;

                $order_amt = number_format($checkOutTotal, 2, '.', '');

                // if(empty($valid)) {
                $first_name = $udetail['first_name'];
                $last_name = $udetail['last_name'];
                $email = $udetail['email'];
                //echo $email; die();
                $password = $udetail['password'];
                $mobile = $udetail['mobile'];
                $image = '';
                $zip_code = $udetail['uzip'];
                $birthdays = '';
                $educations = '';
                $incomes = '';
                $interestss = '';
                $user = 'User';

                $ustatus = $udetail['status'];
                $fulname = "$first_name" . "$last_name";
                $ucreated = date('Y-m-d H:i:s');
                if (!empty($fulname)) {
                    $n_ample = 5;
                } else {
                    $n_ample = 0;
                }
                if (!empty($mobile)) {
                    $m_ample = 4;
                } else {
                    $m_ample = 0;
                }
                if (!empty($email)) {
                    $e_ample = 5;

                } else {
                    $e_ample = 0;
                }
                if (!empty($image)) {
                    $i_ample = 4;
                } else {
                    $i_ample = 0;
                }
                if (!empty($zip_code)) {

                    $zip_ample = 5;
                } else {
                    $zip_ample = 0;
                }
                if (!empty($birthdays)) {

                    $b_ample = 5;
                } else {
                    $b_ample = 0;
                }
                if (!empty($educations)) {

                    $edu_ample = 5;
                } else {
                    $edu_ample = 0;
                }
                if (!empty($incomes)) {

                    $in_ample = 4;
                } else {
                    $in_ample = 0;
                }
                if (!empty($interestss)) {

                    $intest_ample = 5;
                } else {
                    $intest_ample = 0;
                }

                $default_ample = ($n_ample + $m_ample + $e_ample + $i_ample + $zip_ample + $b_ample + $edu_ample + $in_ample + $intest_ample);

                $userkey = $udetail['user_id'];


                /*NEW END CODE*/
                $address1 = $udetail['address'] . ',' . $user_city . ',' . $user_state . ',' . $user_country . '-' . $udetail['zip_code'];
                $deliverytype = $request->getParam('deliverytype');
                $orderdata['user_id'] = $user_id;
                $orderdata['order_date'] = date('Y-m-d H:i:s');
                $orderdata['total_price'] = $order_amt;
                $orderdata['shipping_price'] = '0';
                $orderdata['updated_date'] = date('Y-m-d H:i:s');
                $orderdata['order_status'] = 'In Process';
                $orderdata['payment_mode'] = 'stripe';
                $orderdata['account_number'] = '';
                $orderdata['card_type'] = '';
                $orderdata['retail_price'] = '0';
                $orderdata['buyer_comments'] = 'awesome product';
                $orderdata['order_id'] = $transaction_id;
                $orderdata['currency'] = 'USD';
                $orderdata['current_rate'] = '0';
                $orderdata['order_type'] = implode(',', $deliverytype);
                $orderdata['order_payment_status'] = 0;


                $insertorderdata = $admin_model_obj->userinsertorderdata($orderdata);

                $LastOrderInsert = $insertorderdata;

                $order_date = date('Y-m-d H:i:s');

                $orderdetail['order_id'] = $transaction_id;

                $insertorderadressdata = $admin_model_obj->userinsertorderaddressdata($orderdetail);

                $this->_redirect("/processcheckoutpayment/order_id/$transaction_id/user_id/$user_id");

            } else if (!empty($payment_type_check) && $payment_type_check == 'by_amplepoints') {


                $OrdRandStr = $this->createrandomstring();
                $orderid = "AMPLI" . $OrdRandStr;
                $transaction_id = $orderid;

                $address1 = $udetail['address'] . ',' . $user_city . ',' . $user_state . ',' . $user_country . '-' . $udetail['zip_code'];
                $deliverytype = $request->getParam('deliverytype');
                $orderdata['user_id'] = $user_id;
                $orderdata['order_date'] = date('Y-m-d H:i:s');
                $orderdata['total_price'] = 0.00;
                $orderdata['shipping_price'] = '0';
                $orderdata['updated_date'] = date('Y-m-d H:i:s');
                $orderdata['order_status'] = 'In Process';
                $orderdata['payment_mode'] = 'byamples';
                $orderdata['account_number'] = '';
                $orderdata['card_type'] = '';
                $orderdata['retail_price'] = '0';
                $orderdata['buyer_comments'] = 'awesome product';
                $orderdata['order_id'] = $transaction_id;
                $orderdata['currency'] = 'USD';
                $orderdata['current_rate'] = '0';
                $orderdata['order_type'] = implode(',', $deliverytype);
                $orderdata['order_payment_status'] = 1;
                // print_r($orderdata);die;

                /* if($deliverytype == 'PickUp'){

                    $orderdata['order_confirm_no'] = $this->createrandomstring();
                    }*/


                $insertorderdata = $admin_model_obj->userinsertorderdata($orderdata);

                $LastOrderInsert = $insertorderdata;

                $order_date = date('Y-m-d H:i:s');

                $resultupdateproductadded = $admin_model_obj->updateproductaddeddata($user_id, $transaction_id);

                $resultupdateproductpickup = $admin_model_obj->updatedeliverytypedata($user_id, $transaction_id);

                $resultupdateuseramples = $admin_model_obj->updateuseramplesdata($user_id, $transaction_id);

                $orderdetail['order_id'] = $transaction_id;

                $insertorderadressdata = $admin_model_obj->userinsertorderaddressdata($orderdetail);

                $this->updateGiftCardRelatedCheckoutData($transaction_id, $user_id);

                /* if($LastOrderInsert > 0){

                    $orderinfoData = $admin_model_obj->getorderdata($transaction_id);
                    $OrderVdrId = $orderinfoData[0]['vendor_id'];

                    if($OrderVdrId > 0){

                    $vendorTableDta = $admin_model_obj->getvendortabledata($OrderVdrId);

                    $vendor_unique_key = $vendorTableDta->vendor_qnique_id;

                    $updateOrder = $admin_model_obj->updateorderforvdrkey(array('confirm_vendor_id' => $vendor_unique_key),$LastOrderInsert);

                    }

                    }*/

                $this->customerdermail($transaction_id, $user_id);

                $this->ordermail($transaction_id, $user_id);

                $vendorData = $admin_model_obj->selectdistincOrderVendor($transaction_id);

                foreach ($vendorData as $vdata) {

                    $this->vendorordermail($transaction_id, $user_id, $vdata['vendor_id']);

                }

                $this->sendmessegeTocustomer($transaction_id);

                $giftCardToData = $admin_model_obj->getFullOrderDetailForGiftToUsers($transaction_id);

                if (!empty($giftCardToData)) {

                    foreach ($giftCardToData as $orderInfo) {

                        $gfOrderId = $orderInfo['orderid'];
                        $gfuserId = $orderInfo['customer_Id'];

                        $this->gifrcardOrderEmail($gfOrderId, $orderInfo, $gfuserId);

                        $this->sendGiftcardMsgTOUser($gfOrderId, $orderInfo);
                    }
                }

                $this->addUserPurchaseReward($user_id, $transaction_id);

                $this->UpdateProductQuantity($transaction_id);


                $this->_redirect("/ordersuccess/msg/1/order_id/$transaction_id/user_id/$user_id");

            } else {

                $this->_redirect("/ordersuccess/msg/2/");
            }


        }


    }
}
