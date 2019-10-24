<?php

namespace App\Http\Controllers\API;

use App\ChecklistItem;
use App\Http\Controllers\Controller;
use App\User;
use App\UserChecklist;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser()
    {
        return responder()->success(auth()->user())->respond();
    }

    public function getAUser($id)
    {
        $user = User::withCount(['checklists', 'activeChecklists'])->find($id);

        return responder()->success($user)->respond();
    }

    public function saveUser(Request $request)
    {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => \Hash::make($request->get('password')),
            'type' => $request->get('type'),
            'hr_id' => auth()->user()->id,
            'organization_id' => auth()->user()->organization_id
        ]);

        if ($request->get('type') === 'employee') {
            $checklists = ChecklistItem::where('organization_id', $user->organization_id)->get();
            foreach ($checklists as $checklist) {
                UserChecklist::create([
                    'checklist_id' => $checklist->id,
                    'user_id' => $user->id,
                    'name' => $checklist->name,
                    'description' => $checklist->description,
                    'deadline_at' => Carbon::now()->addDays($checklist->deadline),
                    'is_required' => $checklist->is_required,
                    'status' => 'pending',
                    'is_completed' => false
                ]);
            }
        }

        return responder()->success($user)->respond();
    }

    public function getEmployees()
    {
        $users = User::where('type', 'employee')
            ->where('hr_id', auth()->user()->id)
            ->withCount('activeChecklists')
            ->withCount('checklists')
            ->paginate(20);

        return responder()->success($users)->respond();
    }
}


