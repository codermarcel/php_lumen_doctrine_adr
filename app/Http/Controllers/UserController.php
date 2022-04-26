<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 12/13/2016
 * Time: 3:28 PM
 */

namespace App\Http\Controllers;

use App\Implementation\Validation\Validator;
use Domain\Actions\CreateUserAction;
use Domain\Contracts\Repository\UserRepository;
use Domain\Transformers\UserTransformer;
use Illuminate\Http\Request;
use League\Fractal;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends ApiController
{
    /**
     * @var UserRepository
     */
    private $users;

    /**
     * UserController constructor.
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        $data = $this->users->findAll();

        return $this->found($data, new UserTransformer, 'user');
    }

    /**
     * @param Request $request
     * @param $id
     * @return array
     */
    public function show(Request $request, $id)
    {
        $data = $this->users->find($id);

        return $this->found($data, new UserTransformer, 'user');
    }

    /**
     * @param Request $request
     * @param CreateUserAction $createUserAction
     * @param Validator $validator
     */
    public function store(Request $request, CreateUserAction $createUserAction, Validator $validator)
    {
        $data = $request->only(['username', 'password', 'email']);

        $rules = [
            'username' => 'required|min:4|max:20|unique:users,username',
            'password' => 'required|min:5|max:99',
            'email'    => 'required|email|min:8|max:30|unique:users,email'
        ];

        $validator->assertValid($data, $rules);

        $hasher = app(HasherInterface::class);
        $user = $createUserAction->fromArray($data, $hasher);

        dd($user);
    }
}