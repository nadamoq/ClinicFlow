<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;

class ProfileController extends Controller
{
    //
    public function updateAvatar(UpdateAvatarRequest $request)
    {
        $user = auth()->user();

        // رفع الصورة (حسب اللوجيك الخاص بك)
        $result = $user->upload($request->file('image'), 'public');

        // التحديث أو الإنشاء
        $user->image()->updateOrCreate(
            ['imageable_id' => $user->id, 'imageable_type' => get_class($user)], // يفضل تحديدهم إذا كان Polymorphic
            ['path' => $result['path'], 'alt_txt' => $result['alt_txt']]
        );

        // إرجاع توجيه للويب بدلاً من API
        return redirect()->back()->with('success', "Your profile's avatar updated successfully.");
    }

    public function deleteAvatar()
    {
        $user = auth()->user();

        // ملاحظة: نستخدم $user->image كخاصية للتأكد من وجود الموديل وليس كدالة
        if ($user->image) {
            $user->deleteImage('public', $user->image->path);
            $user->image()->delete();

            return redirect()->back()->with('success', 'Profile avatar deleted successfully.');
        }

        return redirect()->back()->with('error', 'You do not have a profile image to delete.');
    }
}
