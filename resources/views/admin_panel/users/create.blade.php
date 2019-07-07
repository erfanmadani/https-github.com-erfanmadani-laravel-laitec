@extends('admin_panel.layoutes')
@section('content')
    <div class="row">
        <div class="col-sm-6 offset-sm-3" >
            <form action="{{route ('users.store') }}" method="POST">
                @csrf
                <input type="number" name="id" class="form-control" placeholder="id">
                <input type="text" name="fname" class="form-control" placeholder="fname">
                <input type="text" name="lname" class="form-control" placeholder="lname">
                <input type="email" name="email" class="form-control" placeholder="email">
                <select name="gender" class="form-control" id="">
                    <option value="male">آقا</option>
                    <option value="female">خانم</option>
                    <option value="other">دیگر</option>
                </select>
                <input type="password" name="password" class="form-control" placeholder="password">
                <input type="password" name="password-confirmation" class="form-control" placeholder="confirmed">
                <button type="submit" class="btn btn-primary">save</button>
            </form>
        </div>
    </div>

    @endsection