<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailerAutoload;
use PHPMailer;
class EmailController extends Controller {

//    public function sendEmail($subject, $html_body, $recever_email, $recever_name) {
//        ini_set('max_execution_time', 300);
//        //$mail = new \PHPMailer;
//// notice the \ you have to use root namespace here
////        try {
////            $mail->isSMTP(); // tell to use smtp
////            $mail->CharSet = "utf-8"; // set charset to utf8
////            $mail->Host = "mail.skeletonit.com";
////            $mail->SMTPAuth = true;
////            $mail->SMTPSecure = 'tls';
////            $mail->Port = 587; // most likely something different for you. This is the mailtrap.io port i use for testing. 
////            $mail->Username = "info@skeletonit.com";
////            $mail->Password = "123456";
////            $mail->setFrom("info@skeletonit.com", "HiChoice");
////            $mail->Subject = $subject;
////            $mail->MsgHTML($html_body);
////            $mail->addAddress($recever_email, $recever_name);
////            $mail->addBCC("f.bhuyian@gmail.com", "FAHAD");
////            $mail->addReplyTo('cehfahad@gmail.com', 'HiChoice');
////            //$mail->addAttachment('/home/kundan/Desktop/abc.doc', 'abc.doc'); // Optional name
////            $mail->SMTPOptions = array(
////                'ssl' => array(
////                    'verify_peer' => false,
////                    ' verify_peer_name' => false,
////                    ' allow_self_signed' => true
////                )
////            );
////
////            $mail->send();
////        } catch (phpmailerException $e) {
////            dd($e);
////        } catch (Exception $e) {
////            dd($e);
////        }
////        dd('success');
//
//        date_default_timezone_set('Etc/UTC');
//        $mail = new \PHPMailer(true); // notice the \  you have to use root namespace here
//        try {
//            $mail->isSMTP(); // tell to use smtp
//            $mail->SMTPDebug = 2;
//            $mail->CharSet = "utf-8"; // set charset to utf8
//            $mail->IsSMTP();
//            $mail->SMTPAuth = true;
//            $mail->SMTPSecure = "tls"; // or ssl
//            $mail->SMTPAutoTLS = false;
//            //$mail->SMTPSecure = 'ssl';
//            $mail->Host = "mail.skeletonit.com";
//            $mail->Port = '587'; // most likely something different for you. This is the mailtrap.io port i use for testing. 
//            $mail->Username = "info@skeletonit.com";
//            $mail->Password = "123456";
//            $mail->setFrom("info@skeletonit.com", "HiChoice");
//            $mail->Subject = "Test";
//            $mail->IsHTML(true);
//            $mail->MsgHTML("This is a test");
//            $mail->addAddress("f.bhuyian@gmail.com", "FAHAD");
//            $mail->send();
//        } catch (phpmailerException $e) {
//            dd($e);
//        } catch (Exception $e) {
//            dd($e);
//        }
//        die('success');
//    }

    public function sendEmail($msg_subject, $msg_body, $recever_email, $recever_name) {
        $mail = new PHPMailer;

        // notice the \ you have to use root namespace here
        try {
            $mail->isSMTP(); // tell to use smtp
            $mail->CharSet = 'utf-8'; // set charset to utf8
            $mail->Host = 'mail.spxce.co';
            //$mail->SMTPDebug = 2;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587; // most likely something different for you. This is the mailtrap.io port i use for testing.
            $mail->Username = "info@spxce.co";
            $mail->Password = "3Rhl[rqTx*@.";
            $mail->setFrom("info@spxce.co", "HiChoice");
            $mail->Subject = $msg_subject;
            $mail->MsgHTML($msg_body);
            $mail->addAddress($recever_email, $recever_name);
            $mail->addBCC("f.bhuyian@gmail.com", "FAHAD");
            $mail->addReplyTo('info@spxce.co', 'HiChoice');
            //$mail->addBCC(‘examle@examle.net’);
            //$mail->addAttachment(‘/home/kundan/Desktop/abc.doc’, ‘abc.doc’); // Optional name
            $mail->AltBody = 'This is a plain-text message body';
            $mail->SMTPOptions = array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            );

            $mail->send();
        } catch (phpmailerException $e) {
            //dd($e);
            return $e;
        } catch (Exception $e) {
            //dd($e);
            return $e;
        }
        //dd('success');
        return 1;
    }


}
