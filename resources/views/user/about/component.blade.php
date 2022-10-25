    <div class="card1 mosav">
        <img alt="{{$team->name}}" class="card1_img" src="{{is_file($team->pic)?url($team->pic):url('includes/asset/user/pic/user.png')}}">
        {{-- <img alt="{{$team->name}}" class="card1_img-sm border d-lg-none" src="{{is_file($team->pic)?url($team->pic):url('includes/asset/user/pic/user.png')}}"> --}}
        <div class="card1_in">
            <div class="card1_text">
                @if($team->email || $team->phone || $team->linkedin)
                    <div class="card1_social">
                        @if($team->email)
                            <a class="card1_social_a m-0 mx-lg-2" title="email" target="_blank"
                            href="mailto:{{$team->email}}">
                                <i class="fa fa-at"></i>
                            </a>
                        @endif
                        @if($team->phone)
                            <a class="card1_social_a m-0 mx-lg-2" title="phone" target="_blank"
                            href="tel:{{$team->phone}}">
                                <i class="fa fa-phone"></i>
                            </a>
                        @endif
                        @if($team->linkedin)
                            <a class="card1_social_a m-0 mx-lg-2" title="linkedin" target="_blank"
                            href="{{$team->linkedin}}">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        @endif
                    </div>
                @endif
                <h4 class="card1_name d-none d-lg-block">{{$team->name}}</h4>
                <h6 class="card1_name d-lg-none" style="font-size: 14px;">{{$team->name}}</h6>
                <h6 class="card1_job d-none d-lg-block">{{$team->job}}</h6>
                <h6 class="card1_job d-lg-none" style="font-size: 10px;">{{$team->job}}</h6>
            </div>
        </div>
    </div>
