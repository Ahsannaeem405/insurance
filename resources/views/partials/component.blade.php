<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
@if (session()->has('success'))
<script>
    swal("{{session()->get('success')}}", "", "success", {
        button: "Close",

    });
</script>
@endif

@if (session()->has('error'))
<script>
    swal("{{session()->get('error')}}", "", "error", {
        button: "Close",

    });
</script>
@endif
