<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Facade;
use App\Product;
use Session;
use App\Cart;

use Illuminate\Http\Request;
use App\Seo;
use App\QRCode;
use App\category;
use App\SubCategory;
use App\Brand;
use App\Slider;
use App\CustomerSupport;
use App\ContactDetail;
use App\Language;
use App\Currency;
use App\ProductReview;
use App\Shipping;
use App\Orders;
use App\Extrapage;
use App\OrdersItem;
use App\DeliveryAddress;
use App\PaymentMethod;
use App\ProductViewByIP;
use App\PaypalSetting;
use App\AcceptPayment;
use App\AppsSetting;
use App\WelcomeContent;
use Mpdf\Mpdf;
//MenuPageController::loggedUser('company_prefix')
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class MenuPageController extends Facade {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
/*    public function seoname(){ 
        $dataSit=Seo::find(1);
        $SiteURL = $dataSit->name;
        return $SiteURL;..
    }
*/
    public $SiteName="The Bombay Cottage";

    public $SiteURL="thebombaycottage.com";
    public $TableReservationAdminEmail="kamalhemel@gmail.com";
    public $ContactAdminEmail="kamalhemel@gmail.com";
    public $reply="kamalhemel@gmail.com";

    public $paypal_client_id="";
    public $paypal_secret="";

    public function __construct(){ 
        $dataSit=CustomerSupport::find(1);
        $this->TableReservationAdminEmail=$dataSit->reservation_email;
        // dd($this->TableReservationAdminEmail);
        $this->order_admin_email=$dataSit->order_admin_email;
        $this->ContactAdminEmail=$dataSit->contact_admin_email;
        $dataSit=Seo::find(1);
        $this->SiteName = $dataSit->name;
        $paypalSQL=PaypalSetting::find(1);
        $this->paypal_client_id = $paypalSQL->paypal_client_id;
        $this->paypal_secret = $paypalSQL->paypal_secret; 

    }

    protected static function getFacadeAccessor() {
        //what you want
        return $this;
    }
    
    
    public static function TableUserOrder($name='',$sitename='The Bombay Cottage')
    {
        return "Dear ".$name.", Thank you for ordering food at ".$sitename.". We hope you will enjoy your food! We have included your order receipt and details below:";
    }

    public static function TableAdminOrder($sitename='The Bombay Cottage')
    {
        // return "Dear Admin, New order has been arrived at ".$sitename.". We have included your order receipt and delivery details below:";
        return "";
    }

    public static function TableReservation($name='',$sitename='The Bombay Cottage')
    {
        return "Dear ".$name.", Thank you for table reservation at ".$sitename.". We will get back to you as soon as possible! We have included your Reservation details below:";
    }

    
    public static function ContactQueryHead($name='',$sitename='The Bombay Cottage')
    {
        return "Dear ".$name.", Thank you for contact query at ".$sitename.". We will get back to you as soon as possible! We have included your contact request info and datetime details below:";
    }
    public static function TableFeedback($name='',$sitename='The Bombay Cottage')
    {
        // return "Dear ".$name.", Thank you for feedback at ".$sitename.". We will get back to you as soon as possible! We have included your feedback info and datetime details below:";
    }
    public static function AdminTableFeedback($sitename='The Bombay Cottage')
    {
        // return "Dear Admin, Thank you for Feedback at ".$sitename.". We will get back to you as soon as possible! We have included your feedback info and datetime details below:";
    }

    public static function PDFLayout($report_name,$table='',$pageType=0)
    {
                if($pageType==1)
                {
                  $mpdf=new Mpdf;
                    /*$mpdf=new Mpdf([
                                        'mode' => '', 
                                        'format'               =>[80,210],
                                        'default_font_size'    => '8',
                                        'default_font'         => 'serif',
                                        'margin_left'          => 3,
                                        'margin_right'         => 3,
                                        'margin_top'           => 5,
                                        'margin_bottom'        => 0,
                                        'margin_header'        => 0,
                                        'margin_footer'        => 0,
                                        'orientation'          => 'P',
                                        'title'                => $report_name,
                                        'author'               => '',
                                        'watermark'            => 'ECOMPRINT',
                                        'show_watermark'       => true,
                                        'watermark_font'       => 'sans-serif',
                                        'display_mode'         => 'fullpage',
                                        'watermark_text_alpha' => 0.1
                                    ]);*/
                }
                else
                {
                    $mpdf=new Mpdf;
                }
                $pos_slip='POS_SLIP_' . time() . '.pdf';
                $mpdf->SetTitle($report_name);
                $stylesheet=file_get_contents(url('assets/css/bootstrap.min.css'));
                $stylesheet2=file_get_contents(url('assets/css/style.css'));
                $html='';
                
                $html.=$table;
                $mpdf->WriteHTML($stylesheet, 1);
                $mpdf->WriteHTML($stylesheet2, 1); // The parameter 1 tells that this is css/style only and no body/html/text
                $mpdf->WriteHTML($html, 2);
                $mpdf->Output('invoice/'.$pos_slip, 'F');

                //die();

                return $pos_slip;
    }
    

    public static function mainMenu()
    {
        $cat=category::all();
        return $cat;
    }
    

    public static function otherExtraPage()
    {
        $cat=Extrapage::where('isactive',1)->get();
        return $cat;
    }

    public static function CustomerSupport()
    {
        $cs = CustomerSupport::orderBy('id','DESC')->first();
        return $cs;
    }

    public static function ContactDetail()
    {
        $cs = ContactDetail::select('*',DB::Raw('(SELECT qrcode_link FROM q_r_codes ORDER BY id DESC LIMIT 1) as qrcode_link,(SELECT qrcode_section_title FROM q_r_codes ORDER BY id DESC LIMIT 1) as qrcode_section_title,(SELECT qrcode FROM q_r_codes ORDER BY id DESC LIMIT 1) as qr_code'),DB::Raw('(SELECT social_section_title FROM q_r_codes ORDER BY id DESC LIMIT 1) as social_section_title,(SELECT social FROM q_r_codes ORDER BY id DESC LIMIT 1) as social'),DB::Raw('(SELECT social_link FROM q_r_codes ORDER BY id DESC LIMIT 1) as social_link'))->orderBy('id','DESC')->first();
        //dd($cs);
        return $cs;
    }

    public static function Seo()
    {
        $cs = Seo::orderBy('id','DESC')->first();
        //dd($cs);
        return $cs;
    }
    public static function WelcomeContent()
    {
        $cs = WelcomeContent::where('isactive',1)->orderBy('id','DESC')->first();
        // dd($cs);
        return $cs;
    }
    public static function AcceptPayment()
    {
        $cs = AcceptPayment::orderBy('id','DESC')->first();
        //dd($cs);
        return $cs;
    }
    public static function AppsSetting(){
        $cs = AppsSetting::where('isactive',1)->orderBy('id','DESC')->get();
        //dd($cs);
        return $cs;
    }

    public static function SliderData()
    {
        $cs = Slider::where('isactive',1)->orderBy('id','DESC')->get();
        //dd($cs);
        return $cs;
    }

    public static function recentProduct() {
        $countProduct = Product::count();
        if ($countProduct != 0) {
            $sqlProduct = Product::where('isactive', '0')->where('parent_product',0)->orderBy('id','DESC')->take(2)->get();
            return $sqlProduct;
        }
    }
    
    public static function recentProductView($pid=0) {
        $tab=new ProductViewByIP();
        $tab->product_id=$pid;
        $tab->ip=$_SERVER["REMOTE_ADDR"];
        $tab->save();
    }
    
    public static function recentProductViewShow() {
        $countProduct = ProductViewByIP::where('ip',$_SERVER["REMOTE_ADDR"])->count();
        if ($countProduct != 0) {
            $sqlProduct =DB::table('product_view_by_i_ps')
                             ->where('product_view_by_i_ps.ip',$_SERVER["REMOTE_ADDR"])
                             ->join('products','product_view_by_i_ps.product_id','=','products.id')
                             ->select(DB::Raw('products.*'))
                             ->orderBy('product_view_by_i_ps.id','DESC')
                             ->groupBy('product_view_by_i_ps.product_id')
                             ->take(2)
                             ->get();
            
            
            ///$sqlProduct = Product::where('isactive', '0')->where('parent_product',0)->orderBy('id','DESC')->take(2)->get();
            $retArr=array('total'=>count($sqlProduct),'data'=>$sqlProduct);
            return $retArr;
        }
    }

    public static function CurrencyDetail() {
        $sqlProduct =Currency::where('isactive',1)->first();
        return $sqlProduct;
    }
    
    public static function QRCode() {
        $countProduct = QRCode::count();
        if ($countProduct != 0) {
            $sqlProduct = QRCode::find(1);
            return $sqlProduct;
        }
    }

    public static function shoppingCart() {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        
        $array=[
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
        ];
        
        if (isset($array)) {
            return $array;
        }
    }
    
    
    public static function siteBasic()
    {
            $language = Language::all();
            $currency = Currency::all();

            $cs = CustomerSupport::all();
            $cde = ContactDetail::all();

            //$subcat=SubCategory::all();
            $cat = category::take(2)->get();

            $cats = category::all();
            $brn = Brand::all();
            $seo = Seo::all();
        
        
            $arr=
            [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'seo' => $seo,
            'cat' => $cat,
            'brn' => $brn,
            'cats' => $cats
            ];
            
            return $arr;
    }
    
    public static function showSubCategory($cid=0)
    {
        $tab=SubCategory::where('category_id',$cid)->get();
        return $tab;
    }
    
    
    public function initMail(
        $to='',
        $reply='',
        $subject='',
        $body='',
        $bcc='',
        $AltBody='This is the body in plain text for non-HTML mail clients',
        $attachment='',
        $debug=0
    )
    {
          $mail = new PHPMailer(true);
          try {
              $mail->SMTPDebug = $debug;
              $mail->isSMTP(); 
              $mail->Host = 'secure227.servconfig.com';
              $mail->SMTPAuth = true;
              $mail->Username = 'noreply@tandoorimahalonline.co.uk';
              $mail->Password = 'zg3Sw.8kLJq?';

/*
              $mail->Host = 'mail.spxce.co';
              $mail->SMTPAuth = true;
              $mail->Username = 'simpleretailpos@spxce.co';
              $mail->Password = '@sdQwe123';*/

              $mail->SMTPSecure = 'tls';
              $mail->Port = 587;

              $mail->setFrom($reply, $this->SiteName);
              $mail->addReplyTo($reply);
              //$mail->addAddress($to, 'Fahad Bhuyian');
              $mail->addAddress($to);               // Name is optional
              // $mail->addReplyTo('info@'.$this->SiteURL, 'Reply - '.$this->SiteName);
              //$mail->addReplyTo($reply);
              $mail->addBCC('f.fahad.server@gmail.com');
             // $mail->addBCC('f.bhuyian@gmail.com');
              if(!empty($bcc))
              {
                 $mail->addBCC($bcc);
              }
              

              //Attachments
              if(!empty($attachment))
              {
                 $mail->addAttachment($attachment);
              }
              //$mail->addAttachment('/var/tmp/file.tar.gz');
              //$mail->addAttachment('/tmp/image.jpg', 'new.jpg'); 

              //Content
              $mail->isHTML(true);
              $mail->Subject = $subject;
              $mail->Body    = $body;
              $mail->AltBody = $AltBody;
              $mail->send();

              //die();

              return 1;
          } catch (Exception $e) {
              if($debug>0)
              {
                  return 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
              }
              else
              {
                  return 0;
              }
          }
    }
    
	public function PrinterinitMail(
        $to='',
        $subject='',
        $body='This is the body in plain text for non-HTML mail clients'
    )
    {
          $mail = new PHPMailer(true);
          try {
              $mail->SMTPDebug = 0;
              $mail->isSMTP(); 
              $mail->Host = 'secure227.servconfig.com';
              $mail->SMTPAuth = true;
              $mail->Username = 'noreply@tandoorimahalonline.co.uk';
              $mail->Password = 'zg3Sw.8kLJq?';

/*
              $mail->Host = 'mail.spxce.co';
              $mail->SMTPAuth = true;
              $mail->Username = 'simpleretailpos@spxce.co';
              $mail->Password = '@sdQwe123';*/

              $mail->SMTPSecure = 'tls';
              $mail->Port = 587;

              $mail->setFrom('noreply@tandoorimahalonline.co.uk', $this->SiteName);

              //$mail->addAddress($to, 'Fahad Bhuyian');
              $mail->addAddress($to);               // Name is optional
              // $mail->addReplyTo('info@'.$this->SiteURL, 'Reply - '.$this->SiteName);
              //$mail->addReplyTo($reply);
              //$mail->addCC('f.fahad.server@gmail.com');
              //$mail->addBCC('printorder@miahindian.co.uk');
			        //$mail->addBCC('f.fahad.server@gmail.com');
              

              //Attachments
              //$mail->addAttachment('/var/tmp/file.tar.gz');
              //$mail->addAttachment('/tmp/image.jpg', 'new.jpg'); 

              //Content
              $mail->isHTML(true);
              $mail->Subject = $subject;
              $mail->Body    = $body;
              $mail->AltBody = $body;
              $mail->send();
              return 1;
          } catch (Exception $e) {
                  return 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
          }
    }

}
