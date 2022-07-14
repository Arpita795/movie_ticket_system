<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Movies;
use App\Models\BookedTickets;
use Redirect, Response;
use Illuminate\Support\Collection;
use Mail;


class MovieController extends Controller
{
        public function index()
        {
            return view('welcome');
        }

        public function displayTicket()
        {
            $tickets = BookedTickets::where('movie_id',1)->get()->toArray();
            
            $arr=array() ;    
            $r=array() ; 
            foreach($tickets as $k => $v)
            {
               $arr = explode(',',$v['selectd_seats']);
               $r = array_merge($r, $arr);
            }  
            return view('display_ticket',['data' => $r]);
        }

        public function movieTicket($id)
        {
            $tickets = BookedTickets::where('movie_id',$id)->get()->toArray();
            $arr=array() ;    
            $r=array() ; 
            foreach($tickets as $k => $v)
            {
               $arr = explode(',',$v['selectd_seats']);
               $r = array_merge($r, $arr);
            }  
            return Response::json($r);
            //return view('display_ticket',['data' => $r]);
        }
        public function bookTicket(Request $request)
        {
            $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'num_of_tickets'=> 'required',
            'total_amount'=> 'required',
            'selectd_seats'=> 'required',
         ]);

            $user=User::where('email',$request->email)->first();
            
            if(!$user){
                $user = new User();
                $user->name=$request->name;
                $user->email=$request->email;
                $user->save();
            }
            
            $seats = implode(',',$request->selectd_seats);
            $ticket_book = new BookedTickets();
            $ticket_book->user_id=$user->id;           
            $ticket_book->movie_id=$request->movie_id;           
            $ticket_book->num_of_tickets=$request->num_of_tickets;
            $ticket_book->total_amount=$request->total_amount;
            $ticket_book->selectd_seats=$seats;           
            $ticket_book->save(); 


            
        $data = ['seats' => $ticket_book->selectd_seats];
        $email = $user->email;
        Mail::send('emails.welcome', $data, function($message)use($email)
        {
            $message->to($email, 'test mail')->subject('Movie Ticket Details!');
        }); 
      
        
        return $this->displayTicket();
            
        }
}
