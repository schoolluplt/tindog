<?php
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomEmail;
use App\User;

class EmailController extends Controller
{
    public function sendEmailToUsers()
    {
        $users = User::all();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new CustomEmail($user));
        }

        return redirect()->back()->with('success', 'Email sent to all users!');
    }
}
