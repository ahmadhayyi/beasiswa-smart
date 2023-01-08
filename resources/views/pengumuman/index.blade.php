<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/pengumuman/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>MASS Tebuireng</title>
</head>

<body>

    <main>
        <header class="mb-4 bg-dark">
            <div class="container py-4">
                <a href="/" class="d-flex align-items-center text-white text-decoration-none">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 118 94"
                        role="img">
                        <title>Bootstrap</title>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"
                            fill="currentColor"></path>
                    </svg> --}}
                    <span class="h3 fw-bold">MASS Tebuireng</span>
                </a>
                <p class="text-white text-sm">Jln. Terminal Makam Gusdur, Cukir GG 2 Kec. Diwek Kab. Jombang JATIM, 61471 Jombang, Jawa Timur, 61471 Indonesia</p>
            </div>
        </header>
        <div class="container py-4">
            <div class="p-4 pt-2 mb-4 border bg-light rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">Beasiswa Siswa Prestasi</h1>
                    <blockquote class="col-12 fs-5 mt-4">"Selamat kepada para penerima beasiswa bidikmisi yang terpilih!. Melalui kerja keras dan dedikasi yang tinggi, Anda telah berhasil meraih prestasi yang luar biasa dan
                    menjadi inspirasi bagi banyak orang. Kami yakin bahwa dengan beasiswa ini, Anda akan terus memberikan yang terbaik untuk
                    masa depan yang cerah. Selamat bergabung dengan kami dan semoga sukses selalu!"</blockquote>
                    {{-- <hr class="mt-5"> --}}
                    <p class="text-end fw-bold mt-5 mb-1">M. Harun Arrasyid S. Pd</p>
                    <span class="text-sm text-end d-block text-muted">Kepala Sekolah</span> 
                </div>

            </div>

            <p class="h4 my-5"><mark># Daftar Siswa Terpilih</mark></p>

            <div class="p-5 mb-4 mt-5 border bg-light rounded-3">
                <table class="table table-borderless">
                    <thead>
                        <tr class="">
                            <th scope="col">#</th>
                            <th scope="col">NISN</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">JENIS KELAMIN</th>
                            <th scope="col">ALAMAT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <th scope="row justify-content-center">{{ $loop->iteration }}</th>
                            <td>{{ $item->nisn }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->jenis_kelamin == 'pria' ? 'Laki-Laki' : 'Perempuan' }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td><i class="bi bi-check-circle-fill text-success"></i></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="row">#</th>
                            <th colspan="2">Jumlah Siswa : {{ $data->count() }}</th>
                            <th colspan="1">Laki-laki : {{ $data->where('jenis_kelamin', 'pria')->count() }}</th>
                            <th colspan="1">Perempuan : {{
                                $data->where('jenis_kelamin', 'wanita')->count() }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </main>
    <footer class="p-4 mt-4 text-center bg-dark text-white border-top">
        <div class="flex">
            <span>Mass Tebuireng Copyright &copy; 2022</span>
        </div>
        
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>