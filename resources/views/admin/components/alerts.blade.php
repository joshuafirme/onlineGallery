@if (\Session::has('success'))
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <div class="alert-message">
                    {{ \Session::get('success') }}
                </div>
            </div>
        </div>
    </div>
@elseif(\Session::has('danger'))
    <div class="row">
        <div class="col-sm-12">

            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <div class="alert-message">
                    {{ \Session::get('danger') }}
                </div>
            </div>
        </div>
    </div>
@endif
