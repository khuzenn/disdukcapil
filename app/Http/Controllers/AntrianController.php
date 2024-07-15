<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\Loket;
use App\Models\Purpose;
use App\Models\Antrian;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;

class AntrianController extends Controller
{
    public function index()
    {
        $data = Outlet::first();
        $lokets = Loket::all();
        return view('/antarmuka_display', compact('data', 'lokets'));
    }

    public function createAntrian(Request $request)
    {
        $validate = $request->validate([
            'id_antrian' => 'required|exists:lokets,id'
        ]);

        $loket = Loket::find($validate['id_antrian']);

        $antrian = Antrian::create([
            'loket_id' => $loket->id,
            'purpose_id' => $loket->purpose->id,
            'nama_outlet' => 'DISDUKCAPIL MARINGIN',
            'alamat_outlet' => 'Jl. Letjen S. Parman No.7 3, RT.3/RW.8, Tomang, Kec. Grogol petamburan, Kota Jakarta Barat',
            'no_telp' => '(021) 5662400',
            'nomor_antrian' => Antrian::where('loket_id', $loket->id)->count() + 1,
            'jenis_antrian' => $loket->purpose->jenis,
            'keterangan' => $loket->purpose->keterangan,
            'count' => Antrian::where('loket_id', $loket->id)->count() + 1,
            'hari' => now()->format('1'),
            'tanggal' => now()->toDateString()
        ]);

        return response()->json($antrian);
    }

        public function antrianAktif()
    {
        $user = Auth::user();
        $loketId = $user->loket_id;

        // Pastikan user memiliki akses ke loket
        if (!$loketId) {
            return response()->json(['message' => 'Anda tidak memiliki akses ke loket manapun'], 403);
        }

        $data = Antrian::where('status', 'called')
            ->where('loket_id', $loketId) // Filter berdasarkan loket operator
            ->join('lokets', 'antrians.loket_id', '=', 'lokets.id')
            ->join('purposes', 'antrians.purpose_id', '=', 'purposes.id')
            ->select([
                DB::raw('CONCAT(purposes.kode, LPAD(antrians.nomor_antrian, 3, "0")) as nomor_antrian'),
                'lokets.nomor as nomor_loket',
                'purposes.keterangan as jenis_transaksi',
                'antrians.called_count as called_count'
            ])
            ->orderBy('antrians.created_at', 'desc')
            ->get();

        return response()->json(['data' => $data]);
    }

    public function getAntrian()
    {
        $user = Auth::user();
        $loket = $user->loket;

        // Pastikan user memiliki akses ke loket
        if (!$loket) {
            return response()->json(['message' => 'Anda tidak memiliki akses ke loket manapun'], 403);
        }

        $data = Antrian::where('antrians.status', 'waiting')
            ->where('antrians.loket_id', $loket->id) // Filter berdasarkan loket operator
            ->join('lokets', 'antrians.loket_id', '=', 'lokets.id')
            ->join('purposes', 'antrians.purpose_id', '=', 'purposes.id')
            ->select([
                'purposes.keterangan as jenis_transaksi',
                'purposes.kode as kode_antrian',
                'antrians.purpose_id',
                'purposes.jenis',
                DB::raw('MAX(antrians.created_at) as created_at'),
                DB::raw('MAX(antrians.updated_at) as updated_at'),
                DB::raw('MAX(lokets.nomor) as nomor_loket'),
                DB::raw('count(antrians.loket_id) as jumlah_antrian')
            ])
            ->groupBy('purposes.keterangan', 'purposes.kode', 'antrians.purpose_id', 'purposes.jenis')
            ->get();

        return DataTables::of($data)->make(true);
    }


        public function panggilAntrian(Request $request)
        {
            $user = Auth::user();
            $loket = $user->loket;

            if (!$loket) {
                return response()->json(['message' => 'Anda tidak memiliki akses ke loket manapun'], 403);
            }

            // Temukan dan nonaktifkan semua antrian sebelumnya yang dipanggil
            Antrian::where('loket_id', $loket->id)
                ->where('status', 'called')
                ->update(['status' => 'finished']);

            // Ambil antrian berikutnya yang statusnya 'waiting' dan sesuai dengan purpose ID loket
            $antrian = Antrian::where('loket_id', $loket->id)
                            ->where('status', 'waiting')
                            ->orderBy('created_at')
                            ->first();

            if ($antrian) {
                // Perbarui status antrian menjadi 'called'
                $antrian->update([
                    'status' => 'called',
                    'nomor_loket' => $loket->nomor
                ]);

                // Dapatkan data antrian sebelumnya (yang statusnya 'finished')
                $antrian_sebelumnya = Antrian::where('loket_id', $loket->id)
                                            ->where('status', 'finished')
                                            ->orderBy('created_at', 'desc')
                                            ->first();

                $response_data = [
                    'user_id' => $user->id,
                    'user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'username' => $user->username,
                        'role_id' => $user->role_id,
                        'loket_id' => $user->loket_id,
                    ],
                    'antrian_panggil' => [
                        'id' => $antrian->id,
                        'nomor_antrian' => $antrian->nomor_antrian,
                        'purpose_id' => $antrian->purpose_id,
                        'nomor_loket' => $antrian->nomor_loket,
                        'created_at' => $antrian->created_at,
                        'updated_at' => $antrian->updated_at,
                        'purpose' => [
                            'id' => $antrian->purpose->id,
                            'kode' => $antrian->purpose->kode,
                            'jenis' => $antrian->purpose->jenis,
                            'keterangan' => $antrian->purpose->keterangan,
                            'created_at' => $antrian->purpose->created_at,
                            'updated_at' => $antrian->purpose->updated_at,
                        ],
                    ],
                    'antrian_sebelumnya' => $antrian_sebelumnya ? [
                        'id' => $antrian_sebelumnya->id,
                        'nomor_antrian' => $antrian_sebelumnya->nomor_antrian,
                        'purpose_id' => $antrian_sebelumnya->purpose_id,
                        'nomor_loket' => $antrian_sebelumnya->nomor_loket,
                        'created_at' => $antrian_sebelumnya->created_at,
                        'updated_at' => $antrian_sebelumnya->updated_at,
                        'purpose' => [
                            'id' => $antrian_sebelumnya->purpose->id,
                            'kode' => $antrian_sebelumnya->purpose->kode,
                            'jenis' => $antrian_sebelumnya->purpose->jenis,
                            'keterangan' => $antrian_sebelumnya->purpose->keterangan,
                            'created_at' => $antrian_sebelumnya->purpose->created_at,
                            'updated_at' => $antrian_sebelumnya->purpose->updated_at,
                        ],
                    ] : null
                ];

                return response()->json($response_data);
            } else {
                return response()->json(['message' => 'Tidak ada antrian yang tersedia'], 404);
            }
        }

    public function getLatestAntrian()
        {
            $settings = Setting::all();
            $antrians = [];

            foreach(range(1, 4) as $box) {
                $setting = $settings->firstWhere('box', 'box_' . $box);
                $antrian = $setting ? \App\Models\Antrian::where('status', 'called')->where('loket_id', $setting->loket_id)->first() : null;
                $formatted_nomor_antrian = $antrian ? $antrian->purpose->kode . str_pad($antrian->nomor_antrian, 3, '0', STR_PAD_LEFT) : '-';
                $antrians[] = [
                    'box' => $box,
                    'nomor_antrian' => $formatted_nomor_antrian,
                    'keterangan' => $antrian ? $antrian->keterangan : '-',
                    'nomor_loket' => $antrian ? $antrian->loket->nomor : '-',
                    'called_count' =>$antrian ? $antrian->called_count : '-'
                ];
            }

            return response()->json($antrians);
        }

        public function panggilUlang(Request $request)
        {
            $user = Auth::user();
            $loket = $user->loket;
        
            if (!$loket) {
                return response()->json(['success' => false, 'message' => 'Anda tidak memiliki akses ke loket manapun'], 403);
            }
        
            // Temukan antrian yang sebelumnya dipanggil
            $antrian = Antrian::where('loket_id', $loket->id)
                ->where('status', 'called')
                ->orderBy('created_at')
                ->first();
        
            if ($antrian) {
                // Perbarui status dan called_count
                $antrian->update([
                    'status' => 'called',
                    'called_count' => $antrian->called_count + 1
                ]);
        
                $response_data = [
                    'success' => true,
                    'antrian_panggil' => [
                        'id' => $antrian->id,
                        'nomor_antrian' => $antrian->nomor_antrian,
                        'purpose_id' => $antrian->purpose_id,
                        'nomor_loket' => $loket->nomor,
                        'created_at' => $antrian->created_at,
                        'updated_at' => $antrian->updated_at,
                        'purpose' => [
                            'id' => $antrian->purpose->id,
                            'kode' => $antrian->purpose->kode,
                            'jenis' => $antrian->purpose->jenis,
                            'keterangan' => $antrian->purpose->keterangan,
                            'created_at' => $antrian->purpose->created_at,
                            'updated_at' => $antrian->purpose->updated_at,
                        ],
                    ]
                ];
        
                return response()->json($response_data);
            } else {
                return response()->json(['success' => false, 'message' => 'Tidak ada antrian yang tersedia'], 404);
            }
        }

        // app/Http/Controllers/AntrianController.php

        public function deleteAll()
        {
            \App\Models\Antrian::query()->delete(); // This will delete all records in the 'antrians' table
            return redirect('admin.dashboard')->back()->with('success', 'All queues have been deleted.');
        }

                
}
