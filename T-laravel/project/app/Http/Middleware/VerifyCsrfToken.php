<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        "Home/Index/ajax_checkUname",
        "Admin/Goods/ajaxGoodsDel",
        "Home/Goods/ajaxAddCart",
        "Home/Cate/ajaxPageData",
        "Home/Goods/ajaxSubmitOrder",
        "Admin/Cate/ajaxCateDel"
    ];
}
