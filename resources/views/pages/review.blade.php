@extends('layouts.account')

@section('title')
Store Review Page
@endsection

@section('content')
<div class="section-content section-account" data-aos="fade-up">
    <div class="container-fluid">
        <div class="account-heading">
            <h2 class="account-title">Review</h2>
            <h5 class="account-subtitle">
                Silakan berikan nilai dan ulasan terhadap
                pesanan Anda
            </h5>
            <hr />
        </div>
        <div class="account-content">
            <a href="{{route('account-transaction-details')}}" class="nav-back">
                <img src="/icons/chevron-left-sc50.svg" alt="" />
                Kembali
            </a>
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="card-account card-list d-block">
                        <div class="card-body card-status-orders">
                            <div class="row">
                                <div class="col-md-12">
                                    Review Produk
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-account card-list d-block">
                        <div class="card-body card-information-orders">
                            <div class="row">
                                <div class="col-auto">
                                    <img src="/images/bucket bunga.svg" alt="" />
                                </div>
                                <div class="col">
                                    <h2 class="account-card-title">
                                        Bucket Bunga
                                    </h2>
                                    <h5 class="account-card-subtitle">
                                        Rp 30.000
                                    </h5>
                                </div>
                                <div class="col-auto">
                                    <h5 class="account-card-subtitle">
                                        1x
                                    </h5>
                                </div>
                            </div>
                            <hr />
                            <div class="review-container">
                                <div class="review-rating">
                                    <span class="star" data-index="1">&#9734;</span>
                                    <span class="star" data-index="2">&#9734;</span>
                                    <span class="star" data-index="3">&#9734;</span>
                                    <span class="star" data-index="4">&#9734;</span>
                                    <span class="star" data-index="5">&#9734;</span>
                                    <!-- Bintang kosong -->
                                </div>

                                <div class="row review-actions">
                                    <div class="col-12">
                                        <input type="file" id="file" style="
                                                                    display: none;
                                                                " multiple />
                                        <button class="add-btn btn-block form-control" onclick="thisFileUpload()">
                                            <i class="icon-camera">
                                                <img src="/icons/camera-plus-pr50.svg" alt="" />
                                            </i>
                                            Tambah Foto &
                                            Video
                                        </button>
                                    </div>
                                </div>

                                <textarea name="editor" id="editor" rows="5" class="review-comment form-control"
                                    placeholder="Tulis komentar disini"></textarea>
                                <div class="review-submit text-center">
                                    <a href="{{route('account-transaction-details')}}" class="btn btn-success btn-block">
                                        Kirim
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script src="https://cdn.ckeditor.com/4.25.0-lts/standard/ckeditor.js"></script>
<script>
    function thisFileUpload() {
                document.getElementById("file").click();
            }
</script>
<script>
    CKEDITOR.replace("editor");
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
                const stars = document.querySelectorAll(".star");

                stars.forEach((star, index) => {
                    star.addEventListener("click", function () {
                        const rating = index + 1;

                        // Mengisi bintang berdasarkan rating yang dipilih
                        stars.forEach((s, i) => {
                            if (i < rating) {
                                s.innerHTML = "&#9733;"; // Mengganti dengan bintang penuh
                            } else {
                                s.innerHTML = "&#9734;"; // Mengganti dengan bintang kosong
                            }
                        });
                    });

                    // Efek hover untuk memberikan indikasi visual saat pengguna hover
                    star.addEventListener("mouseover", function () {
                        stars.forEach((s, i) => {
                            if (i <= index) {
                                s.innerHTML = "&#9733;"; // Mengganti dengan bintang penuh
                            } else {
                                s.innerHTML = "&#9734;"; // Mengganti dengan bintang kosong
                            }
                        });
                    });

                    // Mengembalikan tampilan ke state saat ini setelah hover
                    star.addEventListener("mouseout", function () {
                        const currentRating = [...stars].filter(
                            (s) => s.innerHTML === "&#9733;"
                        ).length;

                        stars.forEach((s, i) => {
                            if (i < currentRating) {
                                s.innerHTML = "&#9733;"; // Mengganti dengan bintang penuh
                            } else {
                                s.innerHTML = "&#9734;"; // Mengganti dengan bintang kosong
                            }
                        });
                    });
                });
            });
</script>
@endpush