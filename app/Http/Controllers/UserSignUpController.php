<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\userlogin;


class UserSignUpController extends Controller
{
    public function makeSignUp(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);
        
        $tab=new userlogin;
        $tab->name=$request->name;
        $tab->email=$request->email;
        $tab->password=bcrypt($request->password);
        $tab->save();
        
        
        //c]N$0LBu#^?y
//        mail for email
        $mail = new EmailController();
        $subject = "Thank You, You are successfully registered with HiChoice.";
//        $htmlBody="Order Detail";
//        $htmlBody .="nextt dfdsf";
        
        $htmlBody = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
                        <html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
                        <head>
                          <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                          <meta name="viewport" content="width=device-width">
                        </head>
                        <body style="-moz-box-sizing:border-box;-ms-text-size-adjust:100%;-webkit-box-sizing:border-box;-webkit-text-size-adjust:100%;box-sizing:border-box;color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;min-width:100%;padding:0;text-align:left;width:100%!important; background-color: #ededed; padding-top:40px; padding-bottom:40px;">

     
                                  <table align="center" class="container booking-confirmation-payment" style="background:#fff;border-collapse:collapse;border-spacing:0;margin:0 auto;Margin:0 auto;padding:0;text-align:inherit;vertical-align:top;width:580px;">
                                    <tbody>
                                      <tr style="padding:0;text-align:left;vertical-align:top">
                                        <td style="-moz-hyphens:none;-webkit-hyphens:none;border-collapse:collapse!important;color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;hyphens:none;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left;vertical-align:top;word-break:normal;word-wrap:normal">
                                          
                                          <table class="row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
                                            <tbody>
                                              <tr style="padding:0;text-align:left;vertical-align:top">
                                                <th class="small-12 large-12 columns first last" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:50px;padding-right:50px;text-align:left;width:564px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <h4 style="color:#09f;font-family:Helvetica,Arial,sans-serif;font-size:11px;font-weight:700;letter-spacing:-.03px;line-height:1.3;margin:0;Margin:0;margin-bottom:8px;Margin-bottom:8px;margin-top:8px;Margin-top:8px;padding:0;text-align:left;word-wrap:normal" align="center">Congrasulation, '.$request->name.' You are successfully registered with HiChoice</h4>
                                                      </th>
                                                      <th class="expander" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0!important;text-align:left;visibility:hidden;width:0"></th>
                                                    </tr>
                                                  </table>
                                                </th>
                                              </tr>
                                            </tbody>
                                          </table>';
        
        
        $htmlBody .= '<table class="spacer" style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top">
                                            <tbody>
                                              <tr style="padding:0;text-align:left;vertical-align:top">
                                                <td height="16px" style="-moz-hyphens:none;-webkit-hyphens:none;border-collapse:collapse!important;color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;hyphens:none;line-height:16px;margin:0;Margin:0;padding:0;text-align:left;vertical-align:top;word-break:normal;word-wrap:normal">&#xA0;</td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          
                                          
                                          
                                          
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  


                          <!-- prevent Gmail on iOS font size manipulation -->
                          <div style="display:none;white-space:nowrap;font:15px courier;line-height:0; margin-bottom:20px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                         
                            </body>

                        </html>';
        $mail->sendEmail($subject, $htmlBody, $request->email, $request->name);
        
        
        
        return redirect(url('user-login'))->with('status','Thanks your registration successfully complete.Please login.');
        
    }
}
