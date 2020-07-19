<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Http\Request;
use DB;
class ReviewController extends Controller {

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

	public function index()
	{
		return view('review.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(request $request)
	{
		$this->validate($request, [
            'name' => 'required',
        ]);
        
        $isactive=$request->isactive?1:0;

        $review = new Review;
        $review->name = $request->name;
        $review->isactive = $isactive;
        $review->save();

        return redirect('admin-ecom/review-title')->with('status', 'Review Added Successfully!');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data=Review::all();
		$json=Review::find($id);
        return view('review.index',['edit'=>$json,'data'=>$data]);
	}
	public function showjson()
    {
        $json =Review::all();
        $retarray=array("data"=>$json,"total"=>count($json));

        return response()->json($retarray);
        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"
    }
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(request $request)
	{
		$this->validate($request,[
            'name'=>'required',
            
        ]);
        
        $isactive=$request->isactive?1:0;
        $id=$request->id;
        $review=Review::find($id);
        $review->name = $request->name;
        $review->isactive=$isactive;
        $review->save();

        //echo 1;

        //\Session::flash('message','Record Successfullu Updated.');
        //    return redirect()->action("ProjectController@index");

        return redirect('admin-ecom/review-title')->with('status', 'Review info Modified successfully!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$json=Review::find($id);
        $json->delete();
        return response()->json(1);
	}
	//review request
	public function ReviewRequest(Request $request) {
         $satisfaction = $request->satisfaction;
        $ids = array();
		foreach($satisfaction as $val)
		{
		$ids[] = (string) $val;
		}
       
        $sibs1 = implode(',', $ids);
        //dd($sibs1);
        $values = array(
            'name' => $request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'feedback'=>$request->feedback,
            'age'=>$request->age,
            'services'=>$request->services,
            'support'=>$request->support,
            'team'=>$request->team,
            'satisfaction'=>$sibs1
        );
        
        $con = DB::table('users_review')->insert($values);
       

        $siteMessage='<h2><strong><span style="color: #ff9900;">Feedback</span></strong></h2>
                        <table style="border: 2px solid #000000; width: 436px;">
                        <tbody>
                        <tr style="height: 32px;">
                        <td style="width: 184px; height: 32px;">Feedback Created</td>
                        <td style="width: 244px; height: 32px;">&nbsp;'.date('dS M Y, h:i A').'</td>
                        </tr>
                        <tr style="height: 46px;">
                        <td style="width: 428px; height: 46px;" colspan="2">
                        <h3 style="display: block; width: 80%; border-bottom: 3px #000 solid;"><strong>Feedback Detail</strong></h3>
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
                        <td style="width: 184px; height: 18px;">&nbsp;Subject&nbsp;</td>
                        <td style="width: 244px; height: 18px;">'.$request->subject.'</td>
                        </tr>
                        <tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Feedback&nbsp;</td>
                        <td style="width: 244px; height: 18px;">'.$request->feedback.'</td>
                        </tr>
                        <tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Age</td>
                        <td style="width: 244px; height: 18px;">'.$request->age.'</td>
                        </tr>
                        <tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Services</td>
                        <td style="width: 244px; height: 18px;">'.$request->services.'</td>
                        </tr>
                        <tr>
                        <tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Support</td>
                        <td style="width: 244px; height: 18px;">'.$request->support.'</td>
                        </tr>
                        <tr>
                        <tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Team</td>
                        <td style="width: 244px; height: 18px;">'.$request->team.'</td>
                        </tr>
                        <tr>
                        <tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Satisfaction</td>
                        <td style="width: 244px; height: 18px;">'.$sibs1.'</td>
                        </tr>
                        </tbody>
                        </table>
                        <p>Kind Regards, '.$this->sdc->SiteName.'&nbsp;</p>
                        <p>&nbsp;</p>';

        // $this->sdc->initMail(
        // $request->email,
        // 'Feedback   - '.$this->sdc->SiteName,
        // $this->sdc->TableFeedback($request->name,$this->sdc->SiteName).'<br>'.$siteMessage);

            $this->sdc->initMail(
            $this->sdc->TableReservationAdminEmail,
            $request->email,
            $this->sdc->SiteName,
            $this->sdc->AdminTableFeedback($this->sdc->SiteName));

         return redirect()->action("IndexController@reviews")->with('status', 'Your message sent successfully and Thanks for your time.');
    }
    public function adminReviewRequest() {
        return view('review.review_request')->with('status', 'Review info saved successfully!');
    }
    // public function ReviewEditshowjson($id) {
    //     $json = DB::table('users_review')
    //             ->where('id',$id)
    //             ->first();
    //             //dd($json);
    //     return view('review.review_request', ['data' => $json]);
    // }
    public function Reviewshowjson() {
        $json = DB::table('users_review')->get();

        $retarray = array("data" => $json, "total" => count($json));

        return response()->json($retarray);
        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"
    }
    public function Requestdestroy($id)
	{
		$json=DB::table('users_review')
                ->where('id',$id)
                ->delete();
        return response()->json(1);
	}
}
