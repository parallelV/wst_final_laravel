<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function index() { return view('staff.index', ['staff' => User::latest('created_at')->paginate(10)]); }
    public function create() { return view('staff.form', ['member' => new User(), 'heading' => 'Add staff member']); }
    public function store(Request $request) { $member = new User(); $this->save($request, $member); return redirect()->route('staff.index')->with('success', 'Staff member added.'); }
    public function edit(User $member) { return view('staff.form', ['member' => $member, 'heading' => 'Edit staff member']); }
    public function update(Request $request, User $member) { $this->save($request, $member); return redirect()->route('staff.index')->with('success', 'Staff member updated.'); }
    public function destroy(User $member) { if ($member->id === auth()->id()) return back()->with('error', 'You cannot delete your own account.'); if ($member->sales()->exists()) return back()->with('error', 'This staff member has sales and cannot be deleted.'); $this->deleteAvatar($member->avatar); $member->delete(); return back()->with('success', 'Staff member deleted.'); }
    private function save(Request $request, User $member): void
    {
        $rules = ['username'=>['required','string','max:50','unique:users,username,'.$member->id], 'full_name'=>['required','string','max:100'], 'avatar'=>['nullable','image','mimes:jpg,jpeg,png,webp','max:2048']];
        if (!$member->exists) $rules['password'] = ['required','string','min:8','confirmed']; else $rules['password'] = ['nullable','string','min:8','confirmed'];
        $data = $request->validate($rules); if (blank($data['password'] ?? null)) unset($data['password']); else $data['password'] = Hash::make($data['password']);
        if ($request->hasFile('avatar')) {
            $avatarDirectory = public_path('images/avatars');
            File::ensureDirectoryExists($avatarDirectory);

            $avatar = $request->file('avatar');
            $filename = $avatar->hashName();
            $avatar->move($avatarDirectory, $filename);

            $this->deleteAvatar($member->avatar);
            $data['avatar'] = 'images/avatars/' . $filename;
        }
        $member->fill($data)->save();
    }

    private function deleteAvatar(?string $avatar): void
    {
        if (!$avatar) return;

        if (str_starts_with($avatar, 'images/avatars/')) {
            File::delete(public_path($avatar));
            return;
        }

        // Remove avatars uploaded by the previous storage/app/public flow.
        Storage::disk('public')->delete($avatar);
    }
}
