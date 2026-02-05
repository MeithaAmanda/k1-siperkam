<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Peminjaman - SIPERKAM ITG</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans min-h-screen flex items-center justify-center py-12 px-4">

    <div class="max-w-2xl w-full">
        <a href="{{ route('bookings.index') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-blue-600 mb-6 transition">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Dashboard
        </a>

        <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/60 border border-slate-100 overflow-hidden">
            <div class="bg-blue-600 p-8 text-white">
                <h2 class="text-2xl font-bold">Form Peminjaman Ruangan</h2>
                <p class="text-blue-100 text-sm mt-1">Lengkapi data di bawah untuk mengajukan izin penggunaan ruangan kampus.</p>
            </div>

            <form action="{{ route('bookings.store') }}" method="POST" class="p-8 space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <input type="text" name="nama_peminjam" value="{{ old('nama_peminjam') }}" 
                                class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" 
                                placeholder="Contoh: Meitha Amanda">
                        </div>
                        @error('nama_peminjam')
                            <p class="mt-1 text-xs text-red-500 font-medium italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">NIM</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                                <i class="fa-solid fa-id-card"></i>
                            </span>
                            <input type="text" name="nim" value="{{ old('nim') }}"
                                class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" 
                                placeholder="Masukkan NIM Anda">
                        </div>
                        @error('nim')
                            <p class="mt-1 text-xs text-red-500 font-medium italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Pilih Ruangan</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                                <i class="fa-solid fa-door-closed"></i>
                            </span>
                            <select name="ruangan" class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition appearance-none bg-white">
                                <option value="Aula ITG">Aula ITG</option>
                                <option value="Lab Komputer">Lab Komputer</option>
                                <option value="Ruang Kelas A1">Ruang Kelas A1</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Tanggal Pinjam</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                                <i class="fa-solid fa-calendar-day"></i>
                            </span>
                            <input type="date" name="tanggal_pinjam" value="{{ old('tanggal_pinjam') }}"
                                class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                        </div>
                        @error('tanggal_pinjam')
                            <p class="mt-1 text-xs text-red-500 font-medium italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Tujuan Penggunaan</label>
                    <textarea name="tujuan" rows="3" 
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" 
                        placeholder="Jelaskan secara singkat alasan peminjaman...">{{ old('tujuan') }}</textarea>
                    @error('tujuan')
                        <p class="mt-1 text-xs text-red-500 font-medium italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-2xl shadow-lg shadow-blue-200 transition transform hover:-translate-y-0.5 active:scale-95">
                        <i class="fa-solid fa-paper-plane mr-2"></i> Kirim Permohonan
                    </button>
                    <p class="text-center text-slate-400 text-xs mt-4 italic">Pastikan data yang Anda masukkan sudah benar sebelum mengirim.</p>
                </div>
            </form>
        </div>
    </div>

</body>
</html>