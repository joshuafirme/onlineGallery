@php
    $title = 'Pricing';
@endphp
@section('title', $title)

@include('admin.components.head')
@include('admin.components.sidenav')
@include('admin.components.topnav')


<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">{{ $title }}</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        @include('admin.components.alerts')

                        <form action="{{ url("/pricing/update/{$data->id}") }}" method="POST" class="row"
                            autocomplete="off">
                            @method('put')
                            @csrf

                            <div class="col-6 mb-3">
                                <label class="form-label">Price With</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">$</span>
                                    <input type="number" step="0.01" class="form-control" name="priceWith"
                                        value="{{ $data->priceWith }}" required>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Price Without</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">$</span>
                                    <input type="number" step="0.01" class="form-control" name="priceWithout"
                                        value="{{ $data->priceWithout }}" required>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Validity Days</label>
                                <input type="number" class="form-control" name="validityDays"
                                    value="{{ $data->validityDays }}" required>
                            </div>

                            <div class="col-12 mt-4">
                                <button class="btn btn-primary px-4" type="submit">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@include('admin.components.foot')

<script src="{{ asset('libs/js/shared/script.js') }}"></script>
