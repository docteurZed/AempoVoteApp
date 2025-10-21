<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

<!-- JS jQuery (Summernote dépend de jQuery) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- JS Summernote -->
<script src="{{ asset('summernote/summernote-bs5.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
