<div class="row justify-content-center">
    <!-- Earnings (Monthly) Card Example -->
    @foreach (App\Models\Kapal::where('id_user', Auth::id())->get() as $item)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item->nama_kapal }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-ship fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @if (App\Models\Kapal::where('id_user', Auth::id())->count() == 0)
        <div class="text-center">
            <div class="text-mutted">Anda belum menambahkan kapal</div>
        </div>
    @endif

</div>
