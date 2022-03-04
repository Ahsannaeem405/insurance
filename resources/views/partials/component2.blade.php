@if (session()->has('success'))
<script>
    swal("Request Submitted Successfully", "", "success", {
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
