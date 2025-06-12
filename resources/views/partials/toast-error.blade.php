@if ($errors->any())
    <div class="toast show align-items-center text-white bg-danger border-0 position-fixed top-0 end-0 m-3" role="alert"
        aria-live="assertive" aria-atomic="true" style="z-index: 9999;">
        <div class="d-flex">
            <div class="toast-body">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
@endif
