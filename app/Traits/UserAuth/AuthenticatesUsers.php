<?php

namespace App\Traits\UserAuth;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use App\Traits\RedirectsUsers;
use App\Traits\UserAuth\ThrottlesLogins;


/** ユーザ認証機能
 * 
 * ユーザのログイン認証に必要な機能を提供するトレイト。
 * ログインフォームの表示、ログイン処理、レスポンスの生成などを実装。
 * ログイン試行回数の制限機能は、ThrottlesLoginsトレイトで提供。
 */
trait AuthenticatesUsers
{
    use RedirectsUsers, ThrottlesLogins;

    #region ログイン
    /** ログインフォーム表示
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view("user-auth.login");
    }

    /** ログイン処理
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // 入力チェック
        $this->validator($request->all())->validate();

        // ログイン試行回数が上限を超えているか
        if ($this->hasTooManyLoginAttempts($request)) {
            // ロックアウトイベント発火
            $this->fireLockoutEvent($request);

            // ロックアウトのレスポンス
            return $this->sendLockoutResponse($request);
        }

        // ログイン認証
        if ($this->attemptLogin($request)) {
            // 認証成功の場合

            if ($request->hasSession()) {
                // パスワード確認時間をセッション送信
                $request->session()->put('auth.password_confirmed_at', time());
            }

            // ログイン成功のレスポンス
            return $this->sendLoginResponse($request);
        }

        // 認証失敗の場合
        // ログイン試行回数をインクリメント
        $this->incrementLoginAttempts($request);

        // ログイン失敗のレスポンス
        return $this->sendFailedLoginResponse($request);
    }

    /** ログイン認証
     * @param Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }
    #endregion

    #region レスポンス
    /** ログイン成功のレスポンス
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        // セッション再生成 (セッション固定攻撃対策)
        $request->session()->regenerate();

        // ログイン試行回数をクリア
        $this->clearLoginAttempts($request);

        // 認証成功後のカスタム処理
        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        // デフォルトレスポンス
        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath());
    }

    /** ログイン失敗のレスポンス
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        // エクセプション発行
        throw ValidationException::withMessages([
            $this->userName() => [trans('auth.failed')],
        ]);
    }
    #endregion

    /** 認証ガード取得
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}