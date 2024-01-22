<?php
namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Group;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FaqController extends Controller
{
    public function groupIndex(Request $request)
    {
        if ($request->isMethod('post')) {

            $groupid = $request->groupid;
            if ($groupid != 0) {
                $group = Group::find($groupid);
            } else {
                $group = new Group();
            }

            $group->name = $request->name;
            $group->description = $request->description;
            $group->shop_id = auth()->user()->id;
            $group->status = 1;

            $group->save();
            $redirectUrl = getRedirectRoute('group.index');
            return redirect($redirectUrl);
        }

        $groups = Group::where('shop_id', auth()->user()->id)->get();
        return view('group.index', compact('groups'));
    }

    public function faqs(Request $request, $groupid)
    {
        $group = Group::findOrFail($groupid);
        $shop = $request->user();
        if ($group->shop_id != $request->user()->id) {
            return Redirect::tokenRedirect('group.index');
        }

        if ($request->isMethod('post')) {
            $faqid = $request->faqid;
            if ($faqid != 0) {
                $faq = Faq::find($faqid);
            } else {
                $faq = new Faq();
            }

            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->group_id = $group->id;
            $faq->shop_id = $shop->id;
            $faq->status = 1;

            $faq->save();

            $redirectUrl = getRedirectRoute('group.faqs', ['groupid' => $group->id]);
            return redirect($redirectUrl);

        }

        $faqs = Faq::where('group_id', $group->id)->get();
        return view('group.faqs', compact('faqs', 'group'));
    }
}
