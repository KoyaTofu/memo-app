<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Traits\UserAuth\AuthenticatesUsers;

/** ログインコントローラー
 * 
 * ユーザのログイン認証を担当するコントローラー。
 * AuthenticatesUsersトレイトを使用して、ログインフォームの表示やログイン処理を実装。
 */
class LoginController extends Controller
{
    use AuthenticatesUsers;

    /** ログインユーザ名用のフィールド名
     * @return string
     */
    protected function userName()
    {
        return 'email';
    }

    /** ログイン入力バリデーションルール
     * @param array $data
     * @return \Illuminate\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            $this->userName() => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
    }

    /** 認証に必要なユーザ情報
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only(
            $this->userName(), 
            'password'
            );
    }

    /** ログイン成功後のカスタム処理
     * @param Request $request
     * @param \App\Models\User $user
     * @return void
     */
    protected function authenticated(Request $request, $user)
    {
        // 
    }
}
