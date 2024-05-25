@extends('layouts.main')


@section('container')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card card-custom">
                <div class="card-body p-5 small-text">
                    <p class="lead fs-6">Sistem aplikasi berbasis website ini bertujuan melakukan prediksi menggunakan
                        algoritma K-Means untuk mengelompokkan santri dalam pembinaan Al-Qur'an di Pondok
                        Pesantren Nurul Jadid, Paiton, Probolinggo. Kebutuhan akan sistem ini didasari oleh pentingnya
                        efisiensi dan akurasi dalam menentukan kelompok pembinaan santri berdasarkan kemampuan mereka
                        dalam membaca Al-Qur'an, meliputi nilai tajwid, fashohah, dan hafalan.</p>
                    <p class="lead fs-6">Perhingan ini melibatkan analisis data dari 412 santri. Data tersebut
                        diproses menggunakan algoritma K-Means untuk mengelompokkan santri ke dalam tiga kategori
                        kemampuan: "Baik", "Cukup Baik", dan "Kurang Baik". Hasil pengelompokan ini memberikan panduan
                        yang objektif dan akurat dalam menentukan kelompok pembinaan yang sesuai bagi setiap santri.
                        Hasil penelitian menunjukkan bahwa algoritma K-Means efektif dalam mengelompokkan santri, yang
                        pada gilirannya meningkatkan efisiensi dan akurasi proses pembinaan.</p>
                    <p class="lead fs-6">Implementasi teknologi yang diterapkan melalui basis website ini memudahkan
                        akses dan penggunaan sistem oleh pengelola dan peserta pembinaan, memastikan proses
                        pengelompokan dan pembinaan menjadi lebih cepat, akurat, dan objektif. Kesimpulannya, penelitian
                        ini berhasil mengembangkan sistem
                        pembinaan Al-Qur'an yang lebih responsif dan efisien, yang tidak hanya memecahkan masalah
                        konkret di Pondok Pesantren Nurul Jadid, tetapi juga memberikan kontribusi signifikan bagi
                        pengembangan sistem serupa di lembaga pendidikan Islam lainnya.</p>
                </div>
                <div class="card-footer text-muted text-end text-body-secondary">
                    © 2024 Pondok Pesantren Nurul Jadid
                </div>
            </div>
        </div>
    </div>
</div>
@endsection