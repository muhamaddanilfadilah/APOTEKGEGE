@extends ('layout.template')

@section('content')
<form action="{{ route('kelola.update', $users['id']) }}" method="POST" class="card p-5">
    @csrf
    @method('PATCH')

    @if ($errors->any())
    <ul class="alert alert-danger p-3">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $users['nama'] }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Email :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" value="{{ $users['email'] }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="role" class="col-sm-2 col-form-label">Tipe Pengguna : </label>
        <div class="col-sm-10">
            <select class="form-select" id="role" name="role">
                <option selected disabled hidden>Pilih</option>
                <option value="admin" {{ $users['role'] == 'admin'? 'selected': ''}}>Admin</option>
                <option value="user" {{ $users['role'] =='user'? 'selected': ''}}>User</option>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
    <label for="password" class="col-sm-2 col-form-label">Ubah Password:</label>
    <div class="col-sm-10">
        <div class="input-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Ubah Password">
            <button class="btn btn-outline-secondary" type="button" id="password-show" onclick="showPassword('password')">
                <i class="bi bi-eye-slash-fill"></i>
            </button>
        </div>
    </div>
</div>

<script>
    function showPassword(id) {
        var x = document.getElementById(id);
        var button = document.getElementById('password-show');
        if (x.type === "password") {
            x.type = "password";
            button.innerHTML = '<i class="bi bi-eye-fill"></i>';
        } else {
            x.type = "text";
            button.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
        }
    }
</script>
    <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
    </form>
    @endsection