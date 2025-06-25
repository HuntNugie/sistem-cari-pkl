@extends("layout.public.public")
@section("content")
    <!-- beranda Section -->
    <x-public.beranda/>
    <!-- /beranda Section -->

<!-- ======= About Section ======= -->
<x-public.tentang/>
<!-- End About Section -->


<!-- Layanan Section -->
<x-public.layanan/>

{{-- daftar section --}}
<x-public.daftar/>
{{-- end daftar section --}}


    <!-- Team Section -->
    <x-public.team/>
    <!-- /Team Section -->


    <!-- Contact Section -->
    <x-public.kontak/>
   <!-- /Contact Section -->
@endsection
