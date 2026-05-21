<?php

namespace App\Traits\UserAuth;

use Illuminate\Http\Request;

/** ログイン試行回数の制限機能
 * 
 * ログイン試行回数の上限を超えた場合、一定時間ログインをロックアウトする機能。
 * ログイン試行回数の管理やロックアウトの処理は、実装クラスで実装。
 */
trait ThrottlesLogins
{
    /** ログイン試行回数が上限を超えているか
     * @param Request $request
     * @return bool
     */
    protected function hasTooManyLoginAttempts(Request $request)
    {
        return false;
    }

    /** ログイン試行回数をインクリメント
     * @param Request $request
     * @return void
     */
    protected function incrementLoginAttempts(Request $request)
    {
    }

    /** ログイン試行回数をリセット
     * @param Request $request
     * @return void
     */
    protected function clearLoginAttempts(Request $request)
    {
    }

    #region ロックアウト
    /** ロックアウトイベント発火
     * @param Request $request
     * @return void
     */
    protected function fireLockoutEvent(Request $request)
    {
    }

    /** ロックアウト時のレスポンス
     * @param Request $request
     * @return void
     */
    protected function sendLockoutResponse(Request $request)
    {
    }
    #endregion


}