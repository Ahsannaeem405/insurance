<form method="post" action="{{url('import/data')}}" enctype="multipart/form-data">
    @csrf

    <input type="file" required name="file" >
    <input type="submit">
</form>
