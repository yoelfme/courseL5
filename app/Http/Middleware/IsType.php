<?php namespace CourseL5\Http\Middleware;

use Closure;
use Illuminate\Auth\Guard;
use Symfony\Component\HttpFoundation\Session\Session;

abstract class IsType {

    private $auth;
    private $session;
    protected $type;
    /**
     * @param Guard $auth
     * @param Guard $session
     */
    public function __construct(Guard $auth, Session $session)
    {
        $this->auth = $auth;
        $this->session = $session;
    }

    public abstract function getType();

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if(!$this->auth->user()->is($this->getType()))
        {
            // $this->auth->logout();

            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect()->to('auth/login');
            }

        }

		return $next($request);
	}

}
