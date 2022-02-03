@layout('layouts/master')
@section('content')

<div class="search-result-block">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <strong class="title">{{ _e( '404 page error' ) }}</strong>
            </div>
        </div>
    </div>
</div>
<main id="main">
    <section class="search-list-container">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="text-holder">
                        <p>{{ _e( 'Sorry, the page you are looking for might have been removed, had it’s name changed, or is temporarily unavailable.' ) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
