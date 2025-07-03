@extends("layout.perusahaan.perusahaan")

@section("content")
<div class="container mt-5">
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="bi bi-building"></i> Edit Profil Perusahaan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("perusahaan.myprofile.edit.aksi",auth()->guard("perusahaan")->user()->id) }}" method="post"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <!-- Upload Logo -->
                    <div class="col-md-12 text-center">
                        <img id="previewLogo" src="{{ asset("storage") }}/{{ auth()->guard("perusahaan")->user()->perusahaanProfile->logo }}" class="rounded-circle border shadow-sm mb-3" width="150" height="150" alt="Logo Perusahaan">
                        <div>
                            <label class="form-label">Logo Perusahaan</label>
                            <input type="file" name="logo" class="form-control w-50 mx-auto" id="logoInput" accept="image/*" >
                        </div>
                    </div>

                    <!-- Profil Info -->
                    <div class="col-md-6">
                        <label class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" name="nama_perusahaan" placeholder="Masukkan nama perusahaan" value="{{ auth()->guard("perusahaan")->user()->perusahaanProfile->nama_perusahaan }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Pemilik</label>
                        <input type="text" class="form-control" name="pemilik" placeholder="Masukkan nama pemilik" value="{{ auth()->guard("perusahaan")->user()->perusahaanProfile->pemilik  }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">telepon</label>
                        <input type="number" class="form-control" name="telepon" placeholder="Masukkan nama telepon" value="{{ auth()->guard("perusahaan")->user()->perusahaanProfile->telepon  }}">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat lengkap" value="{{ auth()->guard("perusahaan")->user()->perusahaanProfile->alamat  }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Website</label>
                        <input type="text" class="form-control"name="website" placeholder="Contoh: https://perusahaan.com" value="{{ auth()->guard("perusahaan")->user()->perusahaanProfile->website  }}">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" rows="3" placeholder="Deskripsikan perusahaan Anda..." name="deskripsi">{{ auth()->guard("perusahaan")->user()->perusahaanProfile->deskripsi  }}</textarea>
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-success px-4">
                        <i class="bi bi-save"></i> Simpan Profil
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
@push("script")
    <script>
    document.getElementById('logoInput').addEventListener('change', function (e) {
        const preview = document.getElementById('previewLogo');
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>

@endpush
