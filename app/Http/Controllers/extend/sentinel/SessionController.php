<?php namespace App\Http\Controllers\extend\sentinel;

use Sentinel\Controllers\SessionController as SentilenSessionController;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Response;

use Sentinel\FormRequests\LoginRequest;
use Sentinel\Repositories\Session\SentinelSessionRepositoryInterface;
use Sentinel\Traits\SentinelRedirectionTrait;
    use Sentinel\Traits\AchmadiRedirectionTrait;
use Sentinel\Traits\SentinelViewfinderTrait;
use Sentry, View, Input, Event, Redirect, Session, Config;


// use Illuminate\Routing\Controller as BaseController;
use Illuminate\Pagination\Paginator;
use Sentinel\FormRequests\ChangePasswordRequest;
// use Sentinel\FormRequests\UserCreateRequest;
use App\FormRequests\UserCreateRequest;
// use Sentinel\FormRequests\UserUpdateRequest;
use App\FormRequests\UserUpdateRequest;
// use Sentinel\Repositories\Group\SentinelGroupRepositoryInterface;
// use Sentinel\Repositories\User\SentinelUserRepositoryInterface;
// use Sentinel\Traits\SentinelRedirectionTrait;
    // use App\Traits\AchmadiRedirectionTrait;
    // use Sentinel\Traits\AchmadiRedirectionTrait;
// use Sentinel\Traits\SentinelViewfinderTrait;
// use Vinkla\Hashids\HashidsManager;
// use View, Input, Event, Redirect, Session, Config;




class SessionController extends SentilenSessionController
{

    /**
     * Traits
     */
    use SentinelRedirectionTrait;
    // use AchmadiRedirectionTrait;
    use SentinelViewfinderTrait;

    /**
     * Constructor
     */
    public function __construct(SentinelSessionRepositoryInterface $sessionManager)
    {
        $this->session = $sessionManager;
    }

    /**
     * Show the login form
     */
    public function create()
    {
        // Is this user already signed in?
        if (Sentry::check()) {
            return $this->redirectTo('session_store');
        }
        // dd(Session::get('error'));
        // No - they are not signed in.  Show the login form.
        return $this->viewFinder('Sentinel::sessions.login');
    }

    /**
     * Attempt authenticate a user.
     *
     * @return Response
     */
    public function store(LoginRequest $request)
    {
        // Gather the input
        $data = Input::all();

        // Attempt the login
        $result = $this->session->store($data);
        // dd($result);

        // Did it work?
        if ($result->isSuccessful()) {
            // Login was successful.  Determine where we should go now.
            if (!config('sentinel.views_enabled')) {
                // Views are disabled - return json instead
                return Response::json('success', 200);
            }
            // Views are enabled, so go to the determined route
            $redirect_route = config('sentinel.routing.session_store');

            return Redirect::intended($this->generateUrl($redirect_route));
        } else {
            // There was a problem - unrelated to Form validation.
            if (!config('sentinel.views_enabled')) {
                // Views are disabled - return json instead
                return Response::json($result->getMessage(), 400);
            }
            // dd('sadada');
            Session::flash('error', $result->getMessage());

            return Redirect::route('sentinel.session.create')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy()
    {
        $this->session->destroy();

        return $this->redirectTo('session_destroy');
    }

}
