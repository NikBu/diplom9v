<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Category;

class ProfileController extends Controller
{
    /**
     * Отображение формы профиля пользователя.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        // Получение категорий с дочерними элементами и передача их в представление
        $categories = Category::with('children')->whereNull('parent_id')->get();

        return view('profile.edit', [
            'user' => $user,
            'categories' => $categories, // Добавление категорий в данные представления
        ]);
    }

    /**
     * Обновление информации профиля пользователя.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'Профиль обновлен');
    }

    /**
     * Удаление учетной записи пользователя.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}