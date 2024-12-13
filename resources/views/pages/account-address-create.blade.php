@extends('layouts.account')

@section('title')
Store Account Address New Page
@endsection

@section('content')
<div class="section-content section-account" data-aos="fade-up">
    <div class="container-fluid">
        <div class="account-heading">
            <h2 class="account-title">Alamat</h2>
            <h5 class="account-subtitle">
                Tambahkan alamat pengiriman untuk pesanan
                Anda
            </h5>
            <hr />
        </div>
        <div class="account-content">
            <a href="{{ route('account-address') }}" class="nav-back">
                <img src="/icons/chevron-left-sc50.svg" alt="" />
                Kembali
            </a>
            <div class="row mt-4">
                <div class="col-12">
                    <form action="{{ route('account-address-store') }}" id="locations" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-account">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Nama
                                                Lengkap</label>
                                            <input type="text" class="form-control" id="name" name="name" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Alamat
                                                Lengkap</label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="provinces_id">Provinsi</label>
                                            <select name="provinces_id" id="provinces_id" class="form-control"
                                                v-if="provinces" v-model="provinces_id" required>
                                                <option v-for="province in provinces" :value="province.id">
                                                    @{{ province.name }}
                                                </option>
                                            </select>
                                            <select v-else class="form-control"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="regencies_id">Kota</label>
                                            <select name="regencies_id" id="regencies_id" class="form-control"
                                                v-if="regencies" v-model="regencies_id" required>
                                                <option v-for="regency in regencies" :value="regency.id">
                                                    @{{ regency.name }}
                                                </option>
                                            </select>
                                            <select v-else class="form-control"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="zip_code">
                                                Kode Pos
                                            </label>
                                            <input type="text" class="form-control" id="zip_code" name="zip_code"
                                                required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Negara</label>
                                            <input type="text" class="form-control" id="country" name="country"
                                                required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone_number">No. HP</label>
                                            <input type="text" class="form-control" id="phone_number"
                                                name="phone_number" required />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" name="is_selected" value="1" {{
                                                    old('is_selected') ? 'checked' : '' }}>
                                                Jadikan sebagai alamat utama
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script src="https://unpkg.com/axios@1.6.7/dist/axios.min.js"></script>
<script>
    var locations = new Vue({
        el: "#locations",
        mounted() {
            AOS.init();
            this.getProvincesData();
        },
        data: {
            provinces: null,
            regencies: null,
            provinces_id: null,
            regencies_id: null
        },
        methods: {
            getProvincesData() {
                axios.get('{{ route('api-provinces') }}')
                    .then(response => this.provinces = response.data)
                    .catch(error => console.error(error));
            },
            getRegenciesData() {
                axios.get('{{ url('api/regencies') }}/' + this.provinces_id)
                    .then(response => this.regencies = response.data)
                    .catch(error => console.error(error));
            },
        },
        watch: {
            provinces_id(val) {
                this.regencies_id = null;
                this.getRegenciesData();
            }
        }
    });
</script>
@endpush