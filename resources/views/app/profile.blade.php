@extends("app.layout")


@section("content")

<div class="container">
    <div class="row">
        <div class="col-12">
            <p>
                <strong>First name:</strong> {{ Auth::user()->first_name }}
            </p>
            <p>
                <strong>Last name:</strong> {{ Auth::user()->last_name }}
            </p>
            <p>
                <strong>Email:</strong> {{ Auth::user()->email }}
            </p>
            <p>
                <strong>Created:</strong> {{ Auth::user()->created_at }}
            </p>
            <p>
                <strong>Updated:</strong> {{ Auth::user()->updated_at }}
            </p>
        </div>
    </div>
</div>

@endsection