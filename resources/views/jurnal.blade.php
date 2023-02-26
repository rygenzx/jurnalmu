@extends('layouts.app')

{{-- GURU --}}

@if(auth()->user()->role == 'guru')
@section('main')
    <nav class="w-full z-40 py-2">
        <div class="flex justify-center">
            <div class="container max-w-6xl px-4">
                <div class="flex justify-between items-center">
                    <a href={{ route('home') }} class="text-xl font-semibold text-white lg:text-2xl">
                        SiMa-Ku
                    </a>
                    <button class="px-4 py-2 flex items-center text-base font-normal text-[#FDFDFD]">
                        <span class="mr-2">History</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m13 11.6l2.5 2.5q.275.275.275.7t-.275.7q-.275.275-.7.275t-.7-.275l-2.8-2.8q-.15-.15-.225-.337T11 11.975V8q0-.425.288-.713T12 7q.425 0 .713.288T13 8v3.6ZM12 21q-3.025 0-5.425-1.788T3.35 14.55q-.125-.45.088-.85t.662-.5q.425-.1.763.188t.462.712q.65 2.2 2.513 3.55T12 19q2.925 0 4.963-2.038T19 12q0-2.925-2.038-4.963T12 5q-1.725 0-3.225.8T6.25 8H8q.425 0 .713.288T9 9q0 .425-.288.713T8 10H4q-.425 0-.713-.288T3 9V5q0-.425.288-.713T4 4q.425 0 .713.288T5 5v1.35q1.275-1.6 3.113-2.475T12 3q1.875 0 3.513.713t2.85 1.924q1.212 1.213 1.925 2.85T21 12q0 1.875-.713 3.513t-1.924 2.85q-1.213 1.212-2.85 1.925T12 21Z"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <main class="-mt-[56px]">
        <div class="w-full h-80 bg-gradient-to-br from-blue-500 to-blue-700"></div>
        <div class="-mt-64 pb-24 flex justify-center md:-mt-56">
            <div class="container px-4 max-w-2xl">
                <div>
                    <div class="flex justify-start mb-4">
                        <a href={{ route('home') }} class="py-2 flex items-center text-base font-normal text-[#FDFDFD]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m12 20l-8-8l8-8l1.425 1.4l-5.6 5.6H20v2H7.825l5.6 5.6L12 20Z" class="text-white"/></svg>
                            <span class="ml-2">Kembali</span>
                        </a>
                    </div>
                    <form class="p-4 w-full max-w-2xl bg-white rounded-lg shadow-lg md:p-8" action="{{ route('jurnal.store')}}" method="post"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <h4 class="mb-2 text-3xl font-semibold text-gray-800">Jurnal Guru</h4>
                        <p class="mb-8 text-base font-normal text-gray-600">Semester {{ date('n') <= 6 ? 'Genap' : 'Ganjil' }} <br /> Tahun
                            Pelajaran @if(date('n')>= 1 && date('n') <= 6 ) {{ ( intval(date('Y')) - 1 ) . ' / ' . (
                                intval(date('Y')) ) }} @elseif(date('n')>= 6 &&
                                date('n') <= 12) {{intval(date('Y')) . ' / ' . ( intval(date('Y')) + 1)}} @endif</p>
                        {{-- <div class="w-full">
                            <div class="mb-2 flex flex-col md:mb-4">
                                <label class="mb-2 text-sm font-light text-gray-600" for="tanggal">
                                1. Tanggal <span class="text-red-600">*</span>
                                </label>
                                <input
                                    type="date"
                                    class="border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md"
                                    name="tanggal"
                                    required
                                />
                                <small class="mt-2 text-xs font-normal text-gray-400">Contoh Penulisan : 01-02-2023</small>
                            </div>
                            </div> --}}
                            <div class="w-full">
                                <div class="mb-2 flex flex-col md:mb-4">
                                    <label class="mb-2 text-sm font-light text-gray-600" to="kelas_container">
                                        1. Kelas <span class="text-red-600">*</span>
                                    </label>
                                    <select class="border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md" id="kelas_container"
                                    name="kelas_container" required>
                                        <option value="">-- Pilih --</option>
                                        <option>X</option>
                                        <option>XI</option>
                                        <option>XII</option>
                                    </select>
                                    <small class="mt-2 text-xs font-normal text-gray-400">Pilih Tingkat</small>
                                    <select class="mt-2 border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md" id="kelas" name="kelas">
                                        <option value="">-- Pilih --</option>
                                    </select>
                                    <small class="mt-2 text-xs font-normal text-gray-400">Pilih Kelas</small>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="mb-2 flex flex-col md:mb-4">
                                    <label class="mb-2 text-sm font-light text-gray-600" for="jam_ke">
                                        2. Mengajar Jam Ke-  <span class="text-red-600">*</span>
                                    </label>
                                    <select class="border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md" id="jam_ke" name="jam_ke" required>
                                        <option value="">-- Pilih --</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                    </select>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="mb-2 flex flex-col md:mb-4">
                                    <label class="mb-2 text-sm font-light text-gray-600" for="sampai_jam_ke">
                                        3. Sampai Jam Ke-  <span class="text-red-600">*</span>
                                    </label>
                                    <select class="border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md" id="sampai_jam_ke"
                                    name="sampai_jam_ke" required>
                                        <option value="">-- Pilih --</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                    </select>
                                    <small class="mt-2 text-xs font-normal text-gray-400">Pilih Jam yang sama jika hanya mengajar 1 Jam</small>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="mb-2 flex flex-col md:mb-4">
                                    <label class="mb-2 text-sm font-light text-gray-600" for="mata_pelajaran">
                                        4. Mata Pelajaran  <span class="text-red-600">*</span>
                                    </label>
                                    <select class="border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md" id="mata_pelajaran"
                                    name="mata_pelajaran" required>
                                        <option value="">-- Pilih --</option>
                                        @foreach($mata_pelajaran as $data)
                                        <option>{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="mb-2 flex flex-col md:mb-4">
                                    <label class="mb-2 text-sm font-light text-gray-600" for="deskripsi">
                                        5. Deskripsi kegiatan belajar mengajar <span class="text-red-600">*</span>
                                    </label>
                                    <input
                                    type="text"
                                    class="border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md"
                                    id="deskripsi"
                                    name="deskripsi"
                                    required
                                    />
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="mb-2 flex flex-col md:mb-4">
                                    <label class="mb-2 text-sm font-light text-gray-600" for="siswa">
                                        6. Absensi Siswa <span class="text-red-600">*</span>
                                    </label>
                                    <div id="siswa">
                                        <div class="flex justify-center">
                                            <p class="text-base font-normal text-gray-800 mx-4">Tidak Ada Data</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="mb-2 flex flex-col md:mb-4">
                                    <label class="mb-2 text-sm font-light text-gray-600" for="catatan_siswa">
                                        7. Catatan Khusus Siswa
                                    </label>
                                    <input
                                    type="text"
                                    class="border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md"
                                    id="catatan_siswa" name="catatan_siswa"
                                    />
                                    <small class="mt-2 text-xs font-normal text-gray-400">Contoh Penulisan : Siswa yang bernama Ahmad tidak masuk 3 kali berturut turut</small>
                                </div>
                            </div>
                            <div class="flex justify-end mt-8">
                                <button type="submit" class="min-w-[140px] bg-gradient-to-br from-blue-500 to-blue-700 px-2 py-2 text-base font-bold text-[#FDFDFD] rounded" >
                                    KIRIM
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
@endsection


@section('script')
    <script>
        // data from laravel
        const data = @json($siswa);
        
        // declare element variable
        let elKelasContainer = document.getElementById('kelas_container');
        let elKelas = document.getElementById('kelas');
        let elSiswa = document.getElementById('siswa');
        
        // data array
        let classX = [];
        let classXI = [];
        let classXII = [];

        // init kelas to array 
        const setKelas = () => {
            data.map((x, i) => {
                const kelas = x.kelas.split(' / ');

                if(kelas[0] == 'X') {
                    classX.push(x.kelas);
                } else if(kelas[0] == 'XI') {
                    classXI.push(x.kelas);
                } else if(kelas[0] == 'XII') {
                    classXII.push(x.kelas);
                }
            })
            
            const array_unnique = (value, index, self) => {
                return self.indexOf(value) === index;
            }

            classX = classX.filter(array_unnique);
            classXI = classXI.filter(array_unnique);
            classXII = classXII.filter(array_unnique);
        }

        // if kelas on change
        const changeKelas = (value) => {
            const kelasValue = elKelasContainer.value;

            elKelas.innerHTML = '';

            if(kelasValue == 'X') {
                classX.map((x) => {
                    elKelas.innerHTML += `<option>${x}</option>`
                })
            } else if(kelasValue == 'XI') {
                classXI.map((x) => {
                    elKelas.innerHTML += `<option>${x}</option>`
                })
            } else if(kelasValue == 'XII') {
                classXII.map((x) => {
                    elKelas.innerHTML += `<option>${x}</option>`
                })
            }

            changeSiswa();
        }

        // if siswa on change
        const changeSiswa = () => {
            let siswa = [];

            data.map((x, i) => {
                const kelas = x.kelas.split(' / ');
                
                if(elKelas.value == x.kelas) {
                    siswa.push(x);
                }
            })

            elSiswa.innerHTML = '';

            siswa.map((x) => {
                elSiswa.innerHTML += `<div class="mx-4 py-0.5 flex justify-between border-t-2 border-b-2 border-gray-50">
                                            <p class="mr-2 text-base font-normal text-gray-800">- ${x.nama}</p>
                                            <select class="px-2 py-0.5 text-base font-normal text-gray-800" id="siswa[]" name="siswa[]">
                                                <option value='${x.id}-Hadir'>Hadir</option>
                                                <option value='${x.id}-Izin'>Izin</option>
                                                <option value='${x.id}-Sakit'>Sakit</option>
                                                <option value='${x.id}-Alfa'>Alfa</option>
                                            </select>
                                        </div>`
            });
        }
        

        elKelasContainer.addEventListener('change', () => {
            changeKelas();
        })

        elKelas.addEventListener('change', () => {
            changeSiswa();
        })

        window.onload = () => {
            setKelas();
        }

    </script>
@endsection
@endif