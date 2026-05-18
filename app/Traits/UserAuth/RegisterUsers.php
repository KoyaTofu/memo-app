<?php

namespace App\Traits\UserAuth;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

use App\Traits\RedirectsUsers;

trait RegisterUsers
{
    use RedirectsUsers;

    /** ユーザ登録画面表示
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        return view('user-auth.register');
    }

    /** 認証用ユーザ情報登録 一連処理
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register( Request $request )
    {
        // 入力チェック
        $this->validator($request->all())->validate();

        // ユーザ情報登録
        event(new Registered( $user = $this->create($request->all()) ));

        // ログイン
        $this->guard()->login($user);

        // 登録後処理
        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        // リダイレクト
        return $request->wantsJson()
            ? new JsonResponse( [], 201)
            : redirect($this->redirectPath());
    
    }

    /** 認証ガード取得
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /** 認証用ユーザ情報登録 後処理
     * @param Request $request
     * @param mixed $user
     * @return mixed
     */
    protected function registered( Request $request, $user)
    {
        // 
    }
}