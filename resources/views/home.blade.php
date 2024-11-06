@extends('layout.template')

@section('content')
    <div class="jumbotron py-5 px-5" style="background: linear-gradient(135deg, #28a745, #218838); color: white; border-radius: 30px; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); position: relative; overflow: hidden; transition: all 0.3s ease-in-out;">
        
        @if (Session::get('failed'))
            <div class="alert alert-danger" style="font-size: 14px; background-color: #dc3545; color: white; border-radius: 12px; padding: 15px; margin-bottom: 30px; box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);">
                {{ Session::get('failed') }}
            </div>
        @endif

        @if (Session::get('login'))
            <div class="alert alert-warning" style="font-size: 14px; background-color: #ffc107; color: black; border-radius: 12px; padding: 15px; margin-bottom: 30px; box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);">
                {{ Session::get('login') }}
            </div>
        @endif
        
        <!-- Title with smooth animation -->
        <h1 class="display-4 text-center" style="font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 3.8rem; letter-spacing: 2px; color: white; text-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3); animation: fadeIn 1.5s ease-in-out;">
            Selamat Datang, {{ Auth::user()->name }}!
        </h1>

        <!-- Horizontal Line with smooth animation -->
        <hr class="my-4" style="border-color: #fff; width: 50%; margin: 20px auto; opacity: 0.6; transform: scaleX(0.8); animation: scaleLine 1.5s ease-in-out forwards;">
        
        <!-- Description with smooth fade-in -->
        <p style="font-size: 1.3rem; color: white; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.8; animation: fadeIn 2s ease-in-out;">
            Aplikasi ini digunakan hanya oleh pegawai administrator APOTEK. Digunakan untuk mengelola data obat, penyetokan, juga pembelian (kasir). Dengan tampilan yang bersih dan intuitif, nikmati pengalaman pengelolaan obat yang lebih cepat dan efisien.
        </p>

        <!-- Floating circles for added elegance -->
        <div class="floating-circle" style="position: absolute; bottom: -60px; left: -60px; width: 200px; height: 200px; background-color: rgba(255, 255, 255, 0.1); border-radius: 50%; box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2); animation: floatCircle 6s ease-in-out infinite;"></div>
        <div class="floating-circle" style="position: absolute; top: -60px; right: -60px; width: 250px; height: 250px; background-color: rgba(255, 255, 255, 0.1); border-radius: 50%; box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2); animation: floatCircle 6s ease-in-out infinite;"></div>
    </div>
    
    <!-- Stylish Section for Features -->
    <div class="container mt-5 text-center">
        <h2 style="font-family: 'Poppins', sans-serif; font-weight: 700; color: #28a745; font-size: 2.5rem; margin-bottom: 40px; text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.2);">
            Fitur Utama Aplikasi
        </h2>
        
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg rounded-lg border-0" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="card-body text-center" style="padding: 30px; background: #f8f9fa; border-radius: 20px; transition: all 0.3s ease;">
                        <i class="fas fa-capsules" style="font-size: 3.5rem; color: #28a745;"></i>
                        <h5 class="card-title mt-3" style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #333;">Pengelolaan Obat</h5>
                        <p class="card-text" style="color: #666;">Kelola data obat dengan mudah, mulai dari penyetokan hingga penghapusan, secara efisien dan akurat.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg rounded-lg border-0" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="card-body text-center" style="padding: 30px; background: #f8f9fa; border-radius: 20px; transition: all 0.3s ease;">
                        <i class="fas fa-box-open" style="font-size: 3.5rem; color: #28a745;"></i>
                        <h5 class="card-title mt-3" style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #333;">Penyetokan Obat</h5>
                        <p class="card-text" style="color: #666;">Pantau stok obat secara real-time, lakukan penyetokan dengan cepat dan tepat.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg rounded-lg border-0" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="card-body text-center" style="padding: 30px; background: #f8f9fa; border-radius: 20px; transition: all 0.3s ease;">
                        <i class="fas fa-cash-register" style="font-size: 3.5rem; color: #28a745;"></i>
                        <h5 class="card-title mt-3" style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #333;">Fitur Kasir</h5>
                        <p class="card-text" style="color: #666;">Lakukan transaksi pembelian dengan sistem kasir yang mudah digunakan dan terintegrasi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Animations -->
    <style>
        /* Animations */
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes scaleLine {
            0% { transform: scaleX(0); }
            100% { transform: scaleX(1); }
        }

        @keyframes floatCircle {
            0% { transform: translateY(0); opacity: 0.1; }
            50% { transform: translateY(-30px); opacity: 0.5; }
            100% { transform: translateY(0); opacity: 0.1; }
        }

        /* Hover Effects for Cards */
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }
    </style>
@endsection
