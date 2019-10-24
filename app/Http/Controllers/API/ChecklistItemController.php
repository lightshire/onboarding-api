<?php

namespace App\Http\Controllers\API;

use App\ChecklistItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChecklistItemController extends Controller
{
    public function saveChecklistItem(Request $request)
    {
        $checklist = ChecklistItem::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'deadline' => $request->get('deadline'),
            'is_required' => $request->get('is_required'),
            'organization_id' => auth()->user()->organization_id,
            'owner_id' => auth()->user()->id
        ]);

        return responder()->success($checklist)->respond();
    }

    public function getChecklists()
    {
        return responder()->success(
            auth()->user()->organization->checklists()->paginate(10)
        )->respond();
    }

    public function deleteItem($id)
    {
        ChecklistItem::where('id', $id)->delete();

        return [
            'status' => 'deleted'
        ];
    }
}
