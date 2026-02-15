<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
Use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::all();    
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->all();
        $genders = [1 => '男性', 2 => '女性', 3 => 'その他'];
        $contact['gender_text'] = $genders[$request->gender] ?? '不明';
        $category = \App\Models\Category::find($request->category_id);
        $contact['category_content'] = $category ? $category->content : '選択なし';

        return view('confirm', compact('contact', 'genders'));
    }

    public function store(Request $request)
    {
        $contact = $request->all();
        $contact['tel'] = $request->tel1 . $request->tel2 . $request->tel3;
        if ($request->has('detail')) {
        $contact['detail'] = $request->detail;
        } elseif ($request->has('content')) {
        $contact['detail'] = $request->content;
        }
        Contact::create($contact);
        return view('thanks');
    }
}
