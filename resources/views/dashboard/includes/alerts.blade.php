@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p class="mb-0">
            {{ session()->pull('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </p>
    </div>
@endif

@if(session()->has('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <p class="mb-0">
            {{ session()->pull('info') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </p>
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p class="mb-0">
            {{ session()->pull('error') }}
{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
        </p>
    </div>
@endif


@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $error }}
{{--                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
                </li>
            @endforeach
        </ul>
    </div>
@endif
