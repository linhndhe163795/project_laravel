@include('clients.header')
<style>
    .form-control {
        width: 500px;
    }

    .form-group,
    .alert {
        margin-left: 300px;
        width: 500px;
    }

    .container .border {
        border-width: 10rem;

    }
</style>
<div class="container">
    <form action="{{route('employee.create_confirm')}}" method="POST"  enctype="multipart/form-data">
        <div class="border">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="id">Avatar *</label>
                <img style="max-height: 200px; max-width: 200px;" src="/storage/images/{{ $request['avatar'] }}" alt="Hình ảnh">
                </div>

            <div class="form-group">
                <label for="id">Team * </label>
                <input>
            </div>
            <div class="form-group">
                <label for="id">First Name *</label>
                <input type="text" class="form-control" name="first_name" placeholder="Input First Name" value=" ">
            </div>
            

            <div class="form-group">
                <label for="id">Last Name *</label>
                <input type="text" class="form-control" name="last_name" placeholder="Input Team Name" value=" ">
            </div>

            <div class="form-group">
                <label for="id">Gender *</label>
                &ensp;&ensp;
                <input name='gender' type="radio"> Male &ensp;&ensp;
                <input name='gender' type="radio"> Female
            </div>

            <div class="form-group">
                <label for="id">Birthday *</label>
                <input type="date" name='birthday' class="form-control">
            </div>

            <div class="form-group">
                <label for="id">Address *</label>
                <input type="text" class="form-control" name='address' placeholder="Input Address" value="">
            </div>

            <div class="form-group">
                <label for="id">Salary *</label>
                <input type="text" class="form-control" name='salary' placeholder="Input Team Name" value="">
            </div>

            <div class="form-group">
                <label for="id">Position *</label>
                <input>
            </div>

            <div class="form-group">
                <input>               
            </div>

            <div class="form-group">
                <label for="id">Status *</label>&ensp;&ensp;
                <input name='status' type="radio"> On Working&ensp;&ensp;
                <input name='status' type="radio"> Retired
            </div>

        </div>
        <button type="submit" class="btn btn-primary" name="save" value="search">Save</button>
        <button type="button" onclick="goBack()" class="btn btn-secondary">Back</button>
    </form>

</div>
</body>

</html>