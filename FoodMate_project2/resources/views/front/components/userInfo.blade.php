<div class="user-info red-bg" style="padding: 35px 20px 30px">
    <img class="brd-rd50"
         src="images/user/{{\Illuminate\Support\Facades\Auth::user()->avatar ?? 'default-user-avt.png'}}"
         alt="user-avatar.jpg" itemprop="image" style="width: 82px; height: 82px">
    <div class="user-info-inner">
        <h5 itemprop="headline" style="text-align: left"><a href="#" title="" itemprop="url">{{\Illuminate\Support\Facades\Auth::user()->name}}</a></h5>
        <span><a href="#" title=""
                 itemprop="url">{{\Illuminate\Support\Facades\Auth::user()->email}}</a></span>
        <a class="brd-rd3 sign-out-btn yellow-bg" href="#" title=""
           itemprop="url" data-toggle="modal" data-target="#signout"><i
                class="fa fa-sign-out"></i> SIGN
            OUT</a>
    </div>
</div>
