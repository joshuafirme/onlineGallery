@if (session()->has('success'))
    <div class="successAlert" id="successAlert">
        <i class="bi bi-check-circle-fill"></i>
        <span class="success_msg">{{ session('success') }}</span>
        <script>
            setTimeout(function() {
                document.getElementById('successAlert').style.display = 'none';
            }, 5000);
        </script>
    </div>
@endif

@if (session()->has('error'))
    <div class="errorAlert" id="errorAlert">
        <i class="bi bi-exclamation-circle-fill"></i>
        <span class="error_msg">{{ session('error') }}</span>
        <script>
            setTimeout(function() {
                document.getElementById('errorAlert').style.display = 'none';
            }, 5000);
        </script>
    </div>
@endif


@if ($errors->any())
    <div class="errorAlert" id="errorAlert">
        <i class="bi bi-exclamation-circle-fill"></i>
        <span class="error_msg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </span>
        <script>
            setTimeout(function() {
                document.getElementById('errorAlert').style.display = 'none';
            }, 5000);
        </script>
    </div>
@endif
