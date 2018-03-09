<?php

namespace App\Http\Controllers\Admin;

use Session;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\OrderDetailRepositoryInterface;


class UserController extends Controller
{
    protected $userRepository;
    protected $orderRepository;
    protected $orderDetailRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        OrderRepositoryInterface $orderRepository,
        OrderDetailRepositoryInterface $orderDetailRepository
    ) {
        $this->userRepository = $userRepository;
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users  = $this->userRepository->paginate();

        return view('admin.listUsers', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequest $request)
    {
        try
        {
            $user = $request->all();
            $this->userRepository->create($user);
            Session::flash('add_user_success', trans('label.add_user_success'));

            return redirect()->route('manage-user.index');
        } catch(\Exception $e) {
            Session::flash('add_user_fail', trans('label.add_user_fail'));

            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $user = $this->userRepository->findOrFail($id);

            return view('admin.editUser', compact('user'));

        } catch(Exception $e) {
            Session::flash('user_not_existed', trans('label.user_not_existed'));

            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, $id)
    {
        try
        {
            $gender = $request->gender == 'male' ? config('setting.male') : config('setting.female');
            $data = $request->only([
                'name',
                'email',
                'address',
                'phone',
            ]);
            $data['gender'] = $gender;

            if ($request->has('is_admin')) {
                $data['is_admin'] = config('setting.is_admin');
            } else {
                $data['is_admin'] = config('setting.not_admin');
            }

            $this->userRepository->update($id, $data);
            Session::flash('update_profile_success', trans('label.update_profile_success'));
        } catch(Exception $e) {
            Session::flash('update_profile_fail', trans('label.update_profile_fail'));
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
            try
            {
                    $order_ids = $this->orderRepository->where('user_id', $id)->get()->pluck('id');

                    if (count($order_ids)) {
                        $this->orderDetailRepository->whereIn('order_id', $order_ids)->delete();
                        $this->orderRepository->where('user_id', $id)->delete();
                    }

                    $this->userRepository->destroy($id);
                DB::commit();
                Session::flash('delete_user_success', trans('label.delete_user_success'));
            } catch(Exception $e) {
                DB::rollBack();
                Session::flash('delete_user_fail', trans('label.delete_user_fail'));
            }

        return back();
    }
}
