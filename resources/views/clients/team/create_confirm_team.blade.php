

@include('clients.header')
<form action="{{route('team.add_confirm')}}" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <label for="id">Name:</label>
        <input type="text" class="form-control" name="name" readonly value="{{$request->name}}">
    </div>

        <input type="hidden" class="form-control" name="ins_id" readonly value="{{session('profile')[0]['id']}}">
        <input type="hidden" class="form-control" name="upd_id" readonly value="{{session('profile')[0]['id']}}">
        <input type="hidden" class="form-control" name="del_flag" readonly value="{{del_flag_active}}">
        <input type="hidden" class="form-control" name="ins_datetime" readonly value="{{ins_datetime}}">
        <input type="hidden" class="form-control" name="upd_datetime" readonly value="{{ins_datetime}}">
    
    <button type="button" onclick="goBack()" name="reset" id='back' class="btn btn-secondary">Back</button></a>
    <button type="submit" name='save' class="btn btn-primary">Save</button></a>
</form>

</body>
<script>
    function goBack() {
        var nameInput = document.getElementById('back');
        var error = document.getElementById('back');
        nameInput.value = '{{ $request->name }}';
        error = '';
        alert(error);
        history.back();
        
    }
</script>
</html>