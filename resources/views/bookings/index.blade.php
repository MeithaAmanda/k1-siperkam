<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard SIPERKAM - ITG</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-600 p-2 rounded-lg">
                        <i class="fa-solid fa-building-columns text-white text-xl"></i>
                    </div>
                    <span class="text-xl font-bold text-slate-800 tracking-tight">SIPERKAM <span class="text-blue-600 text-sm font-medium">v1.0</span></span>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-right hidden sm:block">
                        <p class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Mahasiswa ITG</p>
                        <p class="text-sm font-bold text-slate-700">{{ Auth::user()->name }}</p>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-slate-100 text-slate-600 p-2 rounded-full hover:bg-red-50 hover:text-red-600 transition duration-300">
                            <i class="fa-solid fa-power-off"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-slate-900">Selamat Datang di SIPERKAM! 👋</h1>
            <p class="text-slate-500 mt-2">Sistem Peminjaman Ruangan Kampus Institut Teknologi Garut.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center space-x-4">
                <div class="p-4 bg-blue-50 rounded-xl text-blue-600">
                    <i class="fa-solid fa-calendar-check text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500 uppercase">Total Pinjam</p>
                    <p class="text-2xl font-bold text-slate-900">{{ $bookings->count() }}</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center space-x-4">
                <div class="p-4 bg-amber-50 rounded-xl text-amber-600">
                    <i class="fa-solid fa-clock text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500 uppercase">Status Pending</p>
                    <p class="text-2xl font-bold text-slate-900">{{ $bookings->where('status', 'Pending')->count() }}</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center space-x-4">
                <div class="p-4 bg-emerald-50 rounded-xl text-emerald-600">
                    <i class="fa-solid fa-door-open text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500 uppercase">Ruangan Tersedia</p>
                    <p class="text-2xl font-bold text-slate-900">12</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg shadow-slate-200/50 border border-slate-100 overflow-hidden">
            <div class="p-6 border-b border-slate-50 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <h3 class="text-lg font-bold text-slate-800">Riwayat Peminjaman Ruangan</h3>
                <a href="{{ route('bookings.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl font-bold text-sm transition shadow-lg shadow-blue-200 flex items-center justify-center">
                    <i class="fa-solid fa-plus mr-2"></i> Ajukan Pinjaman Baru
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50/50 text-slate-500 text-xs uppercase font-bold tracking-widest">
                        <tr>
                            <th class="px-6 py-4">Informasi Peminjam</th>
                            <th class="px-6 py-4">Lokasi Ruangan</th>
                            <th class="px-6 py-4 text-center">Jadwal Penggunaan</th>
                            <th class="px-6 py-4 text-center">Status</th>
                            <th class="px-6 py-4 text-right">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($bookings as $booking)
                        <tr class="hover:bg-slate-50/80 transition duration-200">
                            <td class="px-6 py-4">
                                <p class="font-bold text-slate-800">{{ $booking->nama_peminjam }}</p>
                                <p class="text-xs text-slate-400 font-medium tracking-tight">{{ $booking->nim }}</p>
                            </td>
                            <td class="px-6 py-4 font-medium text-slate-700 italic">
                                <i class="fa-solid fa-location-dot text-red-400 mr-1 text-xs"></i> {{ $booking->ruangan }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-sm font-semibold text-slate-600">
                                    {{ \Carbon\Carbon::parse($booking->tanggal_pinjam)->format('d/m/Y') }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center">
                                    @if($booking->status == 'Pending')
                                        <span class="bg-amber-100 text-amber-700 text-[10px] uppercase font-black px-3 py-1 rounded-full">Menunggu</span>
                                    @elseif($booking->status == 'Disetujui')
                                        <span class="bg-emerald-100 text-emerald-700 text-[10px] uppercase font-black px-3 py-1 rounded-full">Berhasil</span>
                                    @else
                                        <span class="bg-red-100 text-red-700 text-[10px] uppercase font-black px-3 py-1 rounded-full">Ditolak</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end items-center space-x-2">
                                    <a href="{{ route('bookings.edit', $booking->id) }}" class="p-2 bg-slate-100 text-slate-500 rounded-lg hover:bg-blue-100 hover:text-blue-600 transition">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('Hapus peminjaman ini?')" class="p-2 bg-slate-100 text-slate-500 rounded-lg hover:bg-red-100 hover:text-red-600 transition">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="opacity-20 mb-4">
                                    <i class="fa-solid fa-folder-open text-6xl"></i>
                                </div>
                                <p class="text-slate-400 font-medium">Belum ada data peminjaman di sistem.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>