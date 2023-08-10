@extends('layout.layout')
@section('title', 'Tambah Data')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
    integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
    const grid = document.querySelector('.grid')
        const cardTemplate = document.getElementById('card-template')
        for (let i = 0; i < 10; i++) {
          grid.append(cardTemplate.content.cloneNode(true))
        }

        fetch("https://jsonplaceholder.typicode.com/posts")
          .then(res => res.json())
          .then(posts => {
            grid.innerHTML = ''
            posts.forEach(post => {
              const div = cardTemplate.content.cloneNode(true)
              div.querySelector('[data-title]').textContent = post.title
              div.querySelector('[data-body]').textContent = post.body
              grid.append(div)
            })
        })
</script>
<section class="tambah">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow border-0 rounded-2 mt-5">
                    <div class="card-header bg-primary">
                        <h3 class="text-center text-light">Tambah Data</h3>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="/home/tambah" method="post">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <label for="username">Username</label>
                                        <input class="form-control" type="text" name="username" id="username"
                                            placeholder="username..."><br>
                                        <label for="nama">Nama</label>
                                        <input class="form-control" type="text" name="nama" id="nama"
                                            placeholder="nama...">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="role">Role</label>
                                        <select class="form-select" name="role" id="role">
                                            <option value="Admin">Admin</option>
                                            <option value="user">User</option>
                                        </select><br>
                                        <label for="password">Password</label>
                                        <input class="form-control" type="text" name="password" id="password"
                                            placeholder="password..."><br>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-5">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" name="email" id="email"
                                            placeholder="email..."><br>
                                        <button class="btn btn-primary mb-3 mx-auto d-block" type="submit">Tambah
                                            Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-lg-8">
                    <div class="card border-0 shadow rounded-2">
                        <div class="card-body">
                            <table class="table table-responsive">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Password</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($user as $show): ?>
                                    <tr>
                                        <td>
                                            {{ $no++; }}
                                        </td>
                                        <td>{{ $show->name }}</td>
                                        <td>{{ $show->username }}</td>
                                        <td>{{ $show->email }}</td>
                                        <td>{{ $show->role }}</td>
                                        <td>{{ substr($show->password, 0, 10) }}</td>
                                        <td>
                                            <a class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal/home/edit/{{ $show->id }}">Edit</a>
                                            <a class="btn btn-danger" href="/home/hapus/{{ $show->id }}">Hapus</a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModal/home/edit/{{ $show->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="/home/edit/{{ $show->id }}" method="post">
                                                    <div class="modal-body">
                                                        @csrf
                                                        <label for="username">Username</label>
                                                        <input class="form-control" type="text" name="username"
                                                            id="username" placeholder="username..."
                                                            value="{{ $show->username }}"><br>
                                                        <label for="nama">Nama</label>
                                                        <input class="form-control" type="text" name="nama" id="nama"
                                                            placeholder="nama..." value="{{ $show->name }}"><br>
                                                        <label for="role">Role</label>
                                                        <select class="form-select" name="role" id="role">
                                                            <option value="{{ $show->role }}">{{ $show->role }}</option>
                                                            <option value="Admin">Admin</option>
                                                            <option value="user">User</option>
                                                        </select><br>
                                                        <label for="password">Password</label>
                                                        <input class="form-control" type="text" name="password"
                                                            id="password" placeholder="password..."
                                                            value="{{ $show->password }}"><br>
                                                        <label for="email">Email</label>
                                                        <input class="form-control" type="email" name="email" id="email"
                                                            placeholder="email..." value="{{ $show->email }}"><br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Update
                                                            Data</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
    integrity="sha512-OmBbzhZ6lgh87tQFDVBHtwfi6MS9raGmNvUNTjDIBb/cgv707v9OuBVpsN6tVVTLOehRFns+o14Nd0/If0lE/A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- @if(Session::has('success'))
<div class="alert alert-success">


</div>
@endif --}}
@if (Session::has('success'))
<script>
    iziToast.success({
        position: 'topRight',
        message: '{{ Session::get('success') }}',
    });
</script>
@endif
@endsection