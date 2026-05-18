<?php

namespace App\Traits;

trait RedirectsUsers
{
    /** リダイレクト先ページ遷移パスを取得
     *
     * @return string
     */
    public function redirectPath()
    {
        if( method_exists( $this,'redirectTo') ) {
            return $this->redirectTo();
        }

        return property_exists( $this,'redirectTo') ? $this->redirectTo: '/';
    }
}