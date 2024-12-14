@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x
        </button>
    </div>
@elseif (Session::has('danger'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ Session::get('danger') }}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x
        </button>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        @foreach ($errors->all() as $item)
            <ul>
                <li>{{ $item }}</li>
            </ul>
        @endforeach
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x
        </button>
    </div>
@endif
