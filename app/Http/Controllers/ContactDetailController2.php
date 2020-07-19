<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tableBooking;
use App\ContactDetail;
use DB;
class ContactDetailController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    private $moduleName="";
    private $sdc;
    public function __construct(){ 
        $this->sdc = new MenuPageController(); 
    }

    public function index() {
        $cat = ContactDetail::all();
        if (isset($cat)) {
            return view('contactdetail.index', ['data' => $cat]);
        } else {
            return view('contactdetail.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request) {
        $this->validate($request, [
            'contact_title' => 'required',
            'contact_address' => 'required',
            'contact_phone' => 'required',
            'contact_email' => 'required',
            'site_terms_condition'=>'required'
        ]);

        //echo $request->name;
        //exit();

        $cat = new ContactDetail;
        $cat->contact_title = $request->contact_title;
        $cat->contact_address = $request->contact_address;
        $cat->contact_phone = $request->contact_phone;
        $cat->contact_email = $request->contact_email;
        $cat->site_terms_condition = $request->site_terms_condition;
        $cat->save();

        return redirect()->action("ContactDetailController@index")->with('status', 'Contact detail info saved successfully!');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request) {
        $this->validate($request, [
            'id' => 'required',
            'contact_title' => 'required',
            'contact_address' => 'required',
            'contact_phone' => 'required',
            'contact_email' => 'required',
            'site_terms_condition'=>'required'
        ]);

        //echo $request->name;
        //exit();

        $cat =ContactDetail::find($request->id);
        $cat->contact_title = $request->contact_title;
        $cat->contact_address = $request->contact_address;
        $cat->contact_phone = $request->contact_phone;
        $cat->contact_email = $request->contact_email;
        $cat->site_terms_condition = $request->site_terms_condition;
        $cat->save();

        return redirect()->action("ContactDetailController@index")->with('status', 'Contact detail info updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

    // Site Contact Request

    public function contactRequest(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        // echo $request->name;
        // exit();
        $values = array(
            'name' => $request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'message'=>$request->message
        );
        
        $con = DB::table('contact_request')->insert($values);


        $siteMessage='<h2><strong><span style="color: #ff9900;">Contact Query</span></strong></h2>
                        <table style="border: 2px solid #000000; width: 436px;">
                        <tbody>
                        <tr style="height: 32px;">
                        <td style="width: 184px; height: 32px;">Contact Request Created</td>
                        <td style="width: 244px; height: 32px;">&nbsp;'.date('dS M Y, h:i A').'</td>
                        </tr>
                        <tr style="height: 46px;">
                        <td style="width: 428px; height: 46px;" colspan="2">
                        <h3 style="display: block; width: 80%; border-bottom: 3px #000 solid;"><strong>Contact Detail</strong></h3>
                        </td>
                        </tr>
                        <tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Name</td>
                        <td style="width: 244px; height: 18px;">'.$request->name.'</td>
                        </tr>
                        <tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Email&nbsp;</td>
                        <td style="width: 244px; height: 18px;">'.$request->email.'</td>
                        </tr>
                        <tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Phone&nbsp;</td>
                        <td style="width: 244px; height: 18px;">'.$request->phone.'</td>
                        </tr>
                        <tr>
                        <td>&nbsp;Your Message</td>
                        <td>'.$request->message.'</td>
                        </tr>
                        </tbody>
                        </table>';
          $siteRegards='<p>Kind Regards, '.$this->sdc->SiteName.'&nbsp;</p>
                        <p>&nbsp;</p>';
       
        $this->sdc->initMail(
            $request->email,
            $this->sdc->ContactAdminEmail,
            'Contact Query - '.$this->sdc->SiteName,
            $this->sdc->ContactQueryHead($request->name).'<br>'.$siteMessage,$this->sdc->ContactAdminEmail.$siteRegards);

        $this->sdc->initMail(
            $this->sdc->ContactAdminEmail,
            $request->email,
            'Admin Contact Query - '.$this->sdc->SiteName,
            $this->sdc->TableAdminOrder($this->sdc->SiteName).'<br>'.$siteMessage);
         return redirect()->action("IndexController@contactUS")->with('status', 'Your message has been sent successfully');
    }

    

    public function adminContactRequest() {
        return view('contact-pages.contact_request')->with('status', 'Contact detail info saved successfully!');
    }
    public function showContactRequest($id) {
        $json = DB::table('contact_request')
                ->where('id',$id)
                ->first();
                //dd($json);
        return view('contact-pages.edit_contact_request', ['data' => $json]);
    }
    public function showjson() {
        $json = DB::table('contact_request')->get();

        $retarray = array("data" => $json, "total" => count($json));

        return response()->json($retarray);
        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"
    }

    //Reservation Request
    public function reservationRequest(Request $request) {

        $this->validate($request, [
            'fullname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'number_of_person' => 'required',
            'reservation_date' => 'required',
            'reservation_time' => 'required',
        ]);

        $tb = new tableBooking;
        $tb->fullname = $request->fullname;
        $tb->email = $request->email;
        $tb->phone = $request->phone;
        $tb->number_of_person = $request->number_of_person;
        $tb->reservation_date = $request->reservation_date;
        $tb->reservation_time = $request->reservation_time;
        $tb->description = $request->description ? $request->description:0;
        $tb->save();

        //echo date('dS M Y, h:i A');
        //echo $this->sdc->TableReservationAdminEmail; die();
        //die();

        $siteMessage='<h2><strong><span style="color: #ff9900;">Reservation</span></strong></h2>
                        <table style="border: 2px solid #000000; width: 436px;">
                        <tbody>
                        <tr style="height: 32px;">
                        <td style="width: 184px; height: 32px;">Reservation Created</td>
                        <td style="width: 244px; height: 32px;">&nbsp;'.date('dS M Y, h:i A').'</td>
                        </tr>
                        <tr style="height: 46px;">
                        <td style="width: 428px; height: 46px;" colspan="2">
                        <h3 style="display: block; width: 80%; border-bottom: 3px #000 solid;"><strong>Reservation Detail</strong></h3>
                        </td>
                        </tr>
                        <tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Name</td>
                        <td style="width: 244px; height: 18px;">'.$request->fullname.'</td>
                        </tr>
                        <tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Email&nbsp;</td>
                        <td style="width: 244px; height: 18px;">'.$request->email.'</td>
                        </tr>
                        <tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Phone&nbsp;</td>
                        <td style="width: 244px; height: 18px;">'.$request->phone.'</td>
                        </tr>
                        <tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Number of person&nbsp;</td>
                        <td style="width: 244px; height: 18px;">'.$request->number_of_person.'</td>
                        </tr>
                        <tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Reservation Date</td>
                        <td style="width: 244px; height: 18px;">'.$request->reservation_date.'</td>
                        </tr>
                        <tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Reservation Time</td>
                        <td style="width: 244px; height: 18px;">'.$request->reservation_time.'</td>
                        </tr>
                        <tr>
                        <td>&nbsp;Your Message</td>
                        <td>'.$request->description.'</td>
                        </tr>
                        </tbody>
                        </table>
                        <p>Kind Regards, '.$this->sdc->SiteName.'&nbsp;</p>
                        <p>&nbsp;</p>';
       
        $this->sdc->initMail(
            $request->email,
            $this->sdc->order_admin_email,
            'Table Reservation - '.$this->sdc->SiteName,
            $this->sdc->TableReservation($request->fullname,$this->sdc->SiteName).'<br>'.$siteMessage);

            $this->sdc->initMail(
            $this->sdc->TableReservationAdminEmail,
            $request->email,
            'Admin Table Reservation - '.$this->sdc->SiteName,
            $this->sdc->TableAdminOrder($this->sdc->SiteName).'<br>'.$siteMessage);

        if($_SERVER['REMOTE_ADDR']=="103.57.42.222"){
                echo "Under Maintainence";
                die();
            
        }

        return redirect()->action("IndexController@tableBooking")->with('status', 'Your Booking has been confirmed');
    }
    // Site Review
    public function adminReviewRequest(Request $request) {

         return view('reviews.index')->with('status', 'Contact detail info saved successfully!');
    }
    public function adminReviewRequestshowjson() {
        $json = DB::table('contact_request')->get();

        $retarray = array("data" => $json, "total" => count($json));

        return response()->json($retarray);
        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"
    }

    //Gallery 
    public function galleryTitle(){
        return view('gallery.index');
    }
}
