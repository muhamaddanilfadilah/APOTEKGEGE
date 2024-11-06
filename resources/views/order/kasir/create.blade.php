@extends('layout.template')

@section('content')
<div class="container mt-5">
    <!-- Form Container -->
    <form action="{{route('pembelian.store')}}" method="POST" class="card m-auto p-5 shadow-lg rounded-lg" style="background: #ffffff; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">
        @csrf
        {{-- Validasi error --}}
        @if($errors->any())
        <div class="alert alert-danger" style="font-size: 16px; border-radius: 8px; background-color: #f8d7da; color: #721c24; padding: 12px;">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </div>
        @endif

        @if (Session::get('failed'))
            <div class="alert alert-danger" style="font-size: 16px; background-color: #f8d7da; color: #721c24; border-radius: 8px; padding: 12px;">
                {{ Session::get('failed') }}
            </div>
        @endif

        <!-- Penanggung Jawab -->
        <p class="mb-4" style="font-size: 18px; color: #333; font-weight: 600;">Penanggung Jawab: <b>{{ Auth::user()->name }}</b></p>

        <!-- Nama Pembeli -->
        <div class="mb-4 row">
            <label for="name_costumer" class="col-sm-3 col-form-label label-style">Nama Pembeli</label>
            <div class="col-sm-9">
                <input type="text" class="form-control form-control-lg" id="name_costumer" name="name_customer" required style="border-radius: 10px; padding: 14px; font-size: 16px; background-color: #f1f1f1; border: 1px solid #ddd;">
            </div>
        </div>

        <!-- Obat -->
        <div class="mb-4 row">
            <label for="medicines" class="col-sm-3 col-form-label label-style">Obat</label>
            <div class="col-sm-9">
                <select name="medicines[]" id="medicines" class="form-select form-select-lg" required style="border-radius: 10px; padding: 14px; font-size: 16px; background-color: #f1f1f1; border: 1px solid #ddd;">
                    <option selected hidden disabled>Pesanan 1</option>
                    @foreach ($medicines as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>
                <div id="medicines-wrap"></div>
                <br>
                <p class="text-primary" id="add-select" style="cursor: pointer; font-weight: 500; font-size: 16px; color: #28a745; transition: color 0.3s ease;">
                    + Tambah Obat
                </p>
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success btn-block" style="font-weight: 600; padding: 14px 0; font-size: 18px; border-radius: 10px; transition: all 0.3s ease;">
            Konfirmasi Pembelian
        </button>
    </form>
</div>
@endsection

@push('script')
<script>
    let no = 2;
    $("#add-select").on("click", function() {
        // Tag HTML yang ditambahkan/muncul
        let html = `<br><select name="medicines[]" class="form-select form-select-lg" style="border-radius: 10px; padding: 14px; font-size: 16px; background-color: #f1f1f1; border: 1px solid #ddd;">
            <option selected hidden disabled>Pesanan ${no}</option>
            @foreach ($medicines as $item)
                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
            @endforeach
        </select>`;

        $("#medicines-wrap").append(html);
        no++;
    });
</script>
@endpush

<style>
    /* Label styling */
    .label-style {
        font-size: 18px;
        font-weight: 600;
        color: #333;
        transition: color 0.3s ease, transform 0.3s ease;
    }

    /* Hover effect on labels */
    .label-style:hover {
        color: #28a745;
        transform: translateX(4px);
    }

    /* Hover effect for Add Select */
    #add-select:hover {
        color: #218838;
        text-decoration: underline;
    }

    /* Button hover effect */
    button:hover {
        background-color: #218838;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    /* Card Hover Effect */
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    /* Custom styling for alerts */
    .alert {
        margin-bottom: 15px;
        border-radius: 8px;
    }
</style>
