<li class="nav-item @if(url()->current() == url('dashboard')) active @endif ">
    <a href="{{url('dashboard')}}" class="nav-link">
        <i class="material-icons">dashboard</i>
        <p>{{__('admin.sidebar.home')}}</p>
    </a>
</li>
@foreach(\App\Models\Link::with('children')->whereNull('parent_id')->get() as $links)
    @if (auth('dashboard')->user()->can($links->permission->key))
        @if(count($links->children)>0)

            <li class="nav-item ">
                <a class="nav-link collapsed" data-toggle="collapse" href="#{{$links->url}}" aria-expanded="false">
                    <i class="material-icons">keyboard_arrow_down</i>
                    <p> {{$links->name}}</p>
                </a>
                <div class="collapse @if(strpos(url()->current() , url('dashboard/'.$links->url))===0) in @endif" id="{{$links->url}}" @if(strpos(url()->current() , url('dashboard/'.$links->url))===0) aria-expanded="true" @endif>
                    <ul class="nav">
                        @foreach($links->children as $link)
                            @if (auth('dashboard')->user()->can($link->permission->key))
                                <li class="nav-item @if(strpos(url()->current().'/' , url('dashboard/'.$links->url.'/'.$link->url).'/')===0) active @endif">
                                    <a href="{{url('dashboard/'.$links->url.'/'.$link->url)}}" class="nav-link">
                                        <i class="material-icons">{{$link->icon}}</i>
                                        <p>{{$link->name}}</p>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </li>
        @else
            <li class="nav-item @if(strpos(url()->current().'/' , url('dashboard/'.$links->url).'/')===0) active @endif">
                <a href="{{url('dashboard/'.$links->url)}}" class="nav-link">
                    <i class="material-icons">{{$links->icon}}</i>
                    <p>{{$links->name}}</p>
                </a>
            </li>
        @endif
    @endif
@endforeach
