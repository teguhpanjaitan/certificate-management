<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificate;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    //
    public function index()
    {
        $certificates = Certificate::where('deleted', '=', '0')->get();
        return view('pages.certificate.all', ['role' => Auth::user()->user_role, 'certificates' => $certificates]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            // $this->validate($request, [
            //     'title'    => 'required|max:255|unique:posts|string'
            // ]);

            Certificate::create([
                'cred_reference' => $request->certno,
                'awarded_date' => $request->dateawarded,
                'recipient' => $request->recipient,
                'name_of_award' => $request->awardname,
                'nature_of_award' => $request->natureofaward,
                'updated_by' => '1'
            ]);
            return redirect(route('certificate.all'));
        } else {
            return view('pages.certificate.add');
        }
    }

    public function edit($id)
    {

        $certificate = Certificate::findOrFail($id);
        return view('pages.certificate.edit', ['certificate' => $certificate]);
    }

    public function update(Request $request)
    {
        if ($request->isMethod('post')) {
            Certificate::where('id', $request->id)->update([
                'cred_reference' => $request->certno,
                'awarded_date' => $request->dateawarded,
                'recipient' => $request->recipient,
                'name_of_award' => $request->awardname,
                'nature_of_award' => $request->natureofaward,
                'updated_by' => '1'
            ]);
        }

        return redirect(route('certificate.all'));
    }

    public function delete($id)
    {
        Certificate::where('id', $id)->update([
            'deleted' => '1',
            'updated_by' => '1'
        ]);

        return redirect(route('certificate.all'));
    }
}
