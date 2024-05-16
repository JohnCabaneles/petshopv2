<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplainController extends Controller
{
    public function index() {
        $complain = Complain::orderBy('created_at', 'desc')->get();

        return view('users.complain', [
            'complains' => $complain
        ]);
    }

    public function adminIndex() {
        $complain = Complain::orderBy('created_at', 'desc')->get();

        return view('adminComplain.index', [
            'complains' => $complain
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'subject' => 'required',
            'complaint' => 'required',
        ]);

        $formFields['user_id'] = auth()->id();

        Complain::create($formFields);

        return redirect()->back();
    }

    public function edit(Complain $complain) {
        return view('adminComplain.edit', [
            'complains' => $complain
        ]);
    }

    public function destroy(Complain $complain) {
        $complain->delete();

        return redirect('/admin/complains')->with('message', 'Complaint deleted successfully');
    }
}
