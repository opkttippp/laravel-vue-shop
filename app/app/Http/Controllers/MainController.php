<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidRequest;
use App\Models\ContactModal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function home()
    {
        return view('main.home', [
            'title' => 'home',
            'text' => 'home'
        ]);
    }

    public function green()
    {
        return view('main.green');
    }

    public function review()
    {
        $view = new ContactModal();

//        return view('review', ['rev' => $view->all()]);
        return view('main.review');
    }


    public function check(ValidRequest $request)
    {
//        $val = $request->validate([
//            'name' => 'required|min:3|max:20',
//            'subject' => 'required|min:3|max:30',
//            'review' => 'required|min:3|max:600',
//            'email' => 'max:27'
//        ]);

        $contact = new ContactModal();

        $contact->name = $request->input('name');
        $contact->subject = $request->input('subject');
        $contact->review = $request->input('review');
        $contact->email = $request->input('email');

        $contact->save();

//        dd($request->input('review'));
//        $name = DB::table('contact_modals')->select('name')->get();
//        return view('review')->with(compact('name'));

        return redirect()->route('message')->with(
            'success', 'Отзывы были добавлены'
        );
    }

    public function message()
    {
        $message = new ContactModal();
//        return view('message', ['rev' => ContactModal::all()]);
//        return view('message', ['rev' => $message->orderBy('id', 'asc')->skip(1)->take(1)->get()]);
//        return view('messageOne', ['rev' => $message->where('id', '=', $id)->get()]);
        return view('main.message', ['rev' => $message->get()]);
    }

    public function messageOne($id)
    {
        $message = new ContactModal();
        return view('main.messageOne', ['rev' => $message->find($id)]);
    }

    public function messageOneUpdate($id)
    {
        $message = new ContactModal();
        return view('main.messageOneUpdate', ['rev' => $message->find($id)]);
    }

    public function messOneUpSub($id, ValidRequest $request)
    {
        $contact = ContactModal::find($id);

        $contact->name = $request->input('name');
        $contact->subject = $request->input('subject');
        $contact->review = $request->input('review');
        $contact->email = $request->input('email');
        $contact->save();
        return redirect()->route('messageOne', $id)->with(
            'success', 'Уснешное обновление'
        );
    }

    public function messageOneDelete($id)
    {
        $contact = ContactModal::find($id)->delete();
        return redirect()->route('message', $id)->with(
            'success', 'Уснешное удаление'
        );
    }

}
