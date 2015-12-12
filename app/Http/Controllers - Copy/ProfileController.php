<?php namespace App\Http\extend\sentinel;
use Sentinel\Controllers\ProfileController as SentinelProfile;

use Illuminate\Routing\Controller as BaseController;
use Sentinel\FormRequests\ChangePasswordRequest;
use Sentinel\FormRequests\UserUpdateRequest;
use Session, Input, Response, Redirect;
use Sentinel\Repositories\Group\SentinelGroupRepositoryInterface;
use Sentinel\Repositories\User\SentinelUserRepositoryInterface;
use Sentinel\Traits\SentinelRedirectionTrait;
use Sentinel\Traits\AchmadiRedirectionTrait;
use Sentinel\Traits\SentinelViewfinderTrait;

class ProfileController extends SentinelProfile {
	/**
	 * Traits
	 */
	// use SentinelRedirectionTrait;
	use AchmadiRedirectionTrait;
	use SentinelViewfinderTrait;

	/**
	 * Constructor
	 */
	public function __construct(
	    SentinelUserRepositoryInterface $userRepository,
	    SentinelGroupRepositoryInterface $groupRepository
	) {
	    // DI Member assignment
	    $this->userRepository  = $userRepository;
	    $this->groupRepository = $groupRepository;

	    // You must have an active session to proceed
	    $this->middleware('sentry.auth');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}
	
	public function editPass()
	{
	  $user = $this->userRepository->retrieveById(Session::get('userId'));

	    // Get all available groups
	    $groups = $this->groupRepository->all();

	    return $this->viewFinder('Sentinel::users.editPass', [
	        'user' => $user,
	        'groups' => $groups
	    ]);
	}


}
