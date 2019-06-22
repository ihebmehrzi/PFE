<?php

namespace App\Http\Controllers;

use App\CarAgency;
use App\Mail\SendEmail;
use App\Reservation;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class MailController extends Controller
{
    public function home() {

        return view('Mail/home');
    }

    public function sendMail(Request $request)
    {

        $data = array(
            'email'=> $request->email,
        );
        $files = $request->file('pdf');
        $data_1 = Reservation::where('email',$request->email)->first();
        $data_custom = $data['email'];
        Mail::send('Mail/home', compact('data'), function ($message) use($data_custom, $files){
        //    $message->from($data['email']);

               $message->from( 'emailtest73bn@gmail.com');
        //    $message->to($data)->subject('Contrat');
            //$data_1 = $data_1['email'];
            $message->to($data_custom)->subject('Contrat');
           var_dump($files);
           // $message->attach('http://127.0.0.1:8000/public/pdf/rapport-pfe1.pdf');

            /*  if(count($files > 0)) {
                  foreach($files as $file) {
                      $message->attach($file->getRealPath(), array(
                              'as' => $file->getClientOriginalName(), // If you want you can chnage original name to custom name
                              'mime' => $file->getMimeType())
                      );
                  }
              }*/
        });

//
//        $data = array(
//            'email'=> $request->email,
//        );
//        $files = $request->file('pdf');
//        Mail::send('AltHr/Portal/supportemail', compact('data'), function ($message) use($data, $files){
//            ///$message->from($data['email']);
//
//            echo $data['email'];
//
//            $message->from('emailtest73bn@gmail.com');
//
//            $message->to($data['email'])->subject('Contrat');
//
//            // $message->to('ouertanimene@gmail.com')->subject('Contrat');
//
//            if(count($files > 0)) {
//                foreach($files as $file) {
//                    $message->attach($file->getRealPath(), array(
//                            'as' => $file->getClientOriginalName(), // If you want you can chnage original name to custom name
//                            'mime' => $file->getMimeType())
//                    );
//                }
//            }
//        });

//        $emails = array("ouertanimene@gmail.com", "emailtest73bn@gmail.com");
//      //  $files = $request->file('pdf');
//        Mail::send(['text'=>'mail'],['name','Test'],function ($message)  use ($emails){
//            $message->from('emailtest73bn@gmail.com','Agence de location de voiture')-> subject('Confirmation de Réservation');
//           foreach ($emails as $email) {
//                $message->to($email);
//            }
//        });
    }
}
