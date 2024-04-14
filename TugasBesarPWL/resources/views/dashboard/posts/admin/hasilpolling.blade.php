@extends('dashboard.layouts.main')

@section('container')
    <div class="table-responsive wrap-form">
        <div class="nav-form">
            <p class="no-polling">Nomor Polling : 001</p>
            <button type="submit" class="btn-pol-delete">
                <i class="fa-solid del-btn fa-trash-can"></i>
            </button>
        </div>
        <div class="tab-polling">
            <table class="table">
                <thead>
                    <tr>
                        <th>Matakuliah</th>
                        <th>Prodi</th>
                        <th>Periode</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Kecerdasan Mesin</td>
                        <td>Teknik Informatika</td>
                        <td>14-04-2024 : 29-04-2024</td>
                        <td>Nonaktif</td>
                        <td>0</td>
                        <td>
                            {{-- Btn edit  --}}
                            <button class="btn-pol">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            {{-- Btn Delete  --}}
                            <button type="submit" class="btn-pol">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Statistika</td>
                        <td>Teknik Informatika</td>
                        <td>14-04-2024 : 29-04-2024</td>
                        <td>Aktif</td>
                        <td>2</td>
                        <td>
                            {{-- Btn edit  --}}
                            <button class="btn-pol">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            {{-- Btn Delete  --}}
                            <button type="submit" class="btn-pol">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Aljabar Linear</td>
                        <td>Teknik Informatika</td>
                        <td>14-04-2024 : 29-04-2024</td>
                        <td>Aktif</td>
                        <td>4</td>
                        <td>
                            {{-- Btn edit  --}}
                            <button class="btn-pol">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            {{-- Btn Delete  --}}
                            <button type="submit" class="btn-pol">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Aljabar Linear</td>
                        <td>Teknik Informatika</td>
                        <td>14-04-2024 : 29-04-2024</td>
                        <td>Aktif</td>
                        <td>4</td>
                        <td>
                            {{-- Btn edit  --}}
                            <button class="btn-pol">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            {{-- Btn Delete  --}}
                            <button type="submit" class="btn-pol">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="table-responsive wrap-form">
        <div class="nav-form">
            <p class="no-polling">Nomor Polling : 002</p>
            <button type="submit" class="btn-pol-delete">
                <i class="fa-solid del-btn fa-trash-can"></i>
            </button>
        </div>
        <div class="tab-polling">
            <table class="table">
                <thead>
                    <tr>
                        <th>Matakuliah</th>
                        <th>Prodi</th>
                        <th>Periode</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Kecerdasan Mesin</td>
                        <td>Teknik Informatika</td>
                        <td>14-04-2024 : 29-04-2024</td>
                        <td>Nonaktif</td>
                        <td>0</td>
                        <td>
                            {{-- Btn edit  --}}
                            <button class="btn-pol">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            {{-- Btn Delete  --}}
                            <button type="submit" class="btn-pol">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Statistika</td>
                        <td>Teknik Informatika</td>
                        <td>14-04-2024 : 29-04-2024</td>
                        <td>Aktif</td>
                        <td>2</td>
                        <td>
                            {{-- Btn edit  --}}
                            <button class="btn-pol">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            {{-- Btn Delete  --}}
                            <button type="submit" class="btn-pol">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Aljabar Linear</td>
                        <td>Teknik Informatika</td>
                        <td>14-04-2024 : 29-04-2024</td>
                        <td>Aktif</td>
                        <td>4</td>
                        <td>
                            {{-- Btn edit  --}}
                            <button class="btn-pol">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            {{-- Btn Delete  --}}
                            <button type="submit" class="btn-pol">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection