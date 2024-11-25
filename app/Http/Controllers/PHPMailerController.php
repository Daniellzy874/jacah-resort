<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



class PHPMailerController extends Controller
{
    public function index(Request $request)
    {
        return view('sendemail');
    }

    public function store(Request $request)
    {



        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = env('MAIL_HOST');                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = env('MAIL_USERNAME');                     //SMTP username
            $mail->Password   = env('MAIL_PASSWORD');                               //SMTP password
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');            //Enable implicit TLS encryption
            $mail->Port       = env('MAIL_PORT');                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $mail->addAddress($request->email);     //Add a recipient


            //Content
            $mail->isHTML(true);

            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

            $mail->Subject = 'Email verification!';
            $mail->Body    = '<p>Your verification code is: <b style="font-size:30px;">' . $verification_code . '</b></p>';


            //    $sql = "INSERT INTO users(firstname, lastname, phone, email, password, picture) 
            //                      VALUES ($)"
        } catch (Exception $e) {
            return back()->with('error', 'Message could not be sent');
        }
    }
}
