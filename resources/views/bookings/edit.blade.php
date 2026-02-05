<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peminjaman - SIPERKAM ITG</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans min-h-screen flex items-center justify-center py-12 px-4">

    <div class="max-w-2xl w-full">
        <a href="{{ route('bookings.index') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-blue-600 mb-6 transition">
            <i class="fa-solid fa-arrow-left mr-2"></i> Batal dan Kembali
        </a>

        <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/60 border border-slate-100 overflow-hidden">
            <div class="bg-amber-500 p-8 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold">Edit Data Peminjaman</h2>
                        <p class="text-amber-100 text-sm mt-1">Perbarui informasi detail peminjaman ruangan di bawah ini.</p>
                    </div>
                    <i class="fa-solid fa-pen-to-square text-4xl opacity-30"></i>
                </div>
            </div>

            <form action="{{ route('bookings.update', $booking->id) }}" method="POST" class="p-8 space-y-6">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <input type="text" name="nama_peminjam" value="{{ old('nama_peminjam', $booking->nama_peminjam) }}" 
                                class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition" 
                                placeholder="Nama Peminjam">
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
                            <input type="text" name="nim" value="{{ old('nim', $booking->nim) }}"
                                class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition" 
                                placeholder="NIM">
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
                            <select name="ruangan" class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition appearance-none bg-white">
                                <option value="Aula Multimedia" {{ $booking->ruangan == 'Aula Multimedia' ? 'selected' : '' }}>Aula Multimedia</option>
                                <option value="Lab Komputer" {{ $booking->ruangan == 'Lab Komputer' ? 'selected' : '' }}>Lab Komputer</option>
                                <option value="Gedung D" {{ $booking->ruangan == 'Gedung D' ? 'selected' : '' }}>Gedung D</option>
                                <option value="Gedung F" {{ $booking->ruangan == 'Gedung F' ? 'selected' : '' }}>Gedung F</option>
                                <option value="Parkiran " {{ $booking->ruangan == 'Parkiran ' ? 'selected' : '' }}>Parkiran </option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Tanggal Pinjam</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                                <i class="fa-solid fa-calendar-day"></i>
                            </span>
                            <input type="date" name="tanggal_pinjam" value="{{ old('tanggal_pinjam', $booking->tanggal_pinjam) }}"
                                class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition">
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Tujuan Penggunaan</label>
                    <textarea name="tujuan" rows="3" 
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition" 
                        placeholder="Tujuan penggunaan ruangan...">{{ old('tujuan', $booking->tujuan) }}</textarea>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-amber-500 hover:bg-amber-600 text-white font-bold py-4 rounded-2xl shadow-lg shadow-amber-200 transition transform hover:-translate-y-0.5 active:scale-95">
                        <i class="fa-solid fa-save mr-2"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>