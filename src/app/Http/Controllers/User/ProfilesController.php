<?php


namespace App\Http\Controllers\User;


use App\Events\newMemberInvitation;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfilesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }


    public function update(User $user): RedirectResponse
    {
        $user = User::find(Auth::id());

        if (request()->hasFile('avatar')) {

            request()->validate([
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $user->update([
                'avatar' => 'uploads/' . $imagePath = Storage::disk('uploads')->put('User_' . $user->id . '/avatar', request()->avatar )
            ]);
        }

        $user->update([
            'name' => request()->get('name'),
            'email' => request()->get('email')
        ]);

        if ($user->profile) {
            $user->profile()->update([
                'city' => request()->get('city'),
                'country' => request()->get('country'),
                'street' => request()->get('street'),
                'phone' => request()->get('phone'),
                'birthday' => request()->get('birthday')
            ]);
        } else {
            $user->profile()->create([
                'city' => request()->get('city'),
                'country' => request()->get('country'),
                'street' => request()->get('street'),
                'phone' => request()->get('phone'),
                'birthday' => request()->get('birthday')
            ]);
        }

        return back()
            ->with('success','vous avez modifier votre profile avec succes.');
    }

    public function password_index()
    {
        $user = Auth::user();

        return view('user.password', compact('user'));
    }

    /**
     * @param User $user
     * @param Request $request
     * @return RedirectResponse|string
     */
    public function password_update(User $user, Request $request)
    {
        $user = User::find(Auth::id());

        $request->validate([
            'password' => 'confirmed|min:6'
        ]);

        if(Hash::check($request->get('current_password'), Auth::user()->getAuthPassword())) {

            $user->update(['password' => Hash::make($request->get('password')) ]);

            return back()
                ->with('success','Mot de passe modifier.');
        }

        return back()
            ->with('success','Mot de passe modifier.');


    }

    public function travels()
    {
        $user = User::find(Auth::id());

        $posts = $user->posts->where('categorie_id', '2');

        return view('user.travels', compact('user','posts'));
    }

    public function packets()
    {
        $user = User::find(Auth::id());

        $posts = $user->posts->where('categorie_id', '1');

        return view('user.packs', compact('user','posts'));
    }

    public function reservations()
    {
        $reservations = Auth::user()->reservations;
        return view('user.reservations', compact('reservations'));
    }

    public function inviter()
    {
        $user = User::find(Auth::id());

        return view('user.invitation', compact('user'));
    }

    public function sendEmailInvitation(Request $request)
    {
        $to = [
            'name' => $request->get('name'),
            'email' => $request->get('email')
        ];

        $request->attributes->add(['from' => Auth::user(), 'to' => $to]);

        Event::dispatch(new newMemberInvitation($request->attributes->all()));

        return redirect()->back()->with(['success' => 'Un mail a ete envoyer a votre ami merci :)']);
    }

}
