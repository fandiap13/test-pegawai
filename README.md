# Pegawai API

API untuk mengelola data pegawai.

<!-- Demo: http://testfandi.centraltech.my.id/ -->

## Prasyarat

-   PHP >= 8.1
-   Composer
-   Laravel

## Instalasi

1. Clone repositori

    ```bash
    git clone https://github.com/fandiap13/test-pegawai.git
    cd repository
    ```

2. Install dependensi
    ```
    composer install
    ```
3. Konfigurasi environment
    ```
    cp .env.example .env
    php artisan key:generate
    ```
4. Buat database `db_pegawai`
5. Migrasi database
    ```
    php artisan migrate --seed
    ```
6. Jalankan server lokal

    ```
    php artisan serve
    ```

7. Jika template tidak terdeteksi maka, Ekstrak file `template.zip` yang terletak pada direktori `public/template.zip`:

    - Buka file `template.zip` dan ekstrak isinya ke direktori `public/`.

# DOKUMENTASI API

## 1. GET /api/pegawai

Melihat semua list data pegawai.

### Request

-   **Metode:** GET
-   **Endpoint:** `/api/pegawai?per_page={jumlah_data}`

### Response

#### Sukses

```json
{
    "data": [
        {
            "success": true,
            "data": {
                "id": 21,
                "nik": "3473818379283013",
                "nama_karyawan": "Mala Rahimah",
                "tempat_lahir": "Tanjung Pinang",
                "tgl_lahir": "1986-01-28",
                "agama": "kristen",
                "status_nikah": "kawin",
                "alamat": "Ki. Basuki No. 336, Pangkal Pinang 52689, Sulbar",
                "no_telp": "62878017336851",
                "pendidikan": "S1",
                "profil": null,
                "tgl_diangkat": "2024-03-12",
                "id_jabatan": 1,
                "created_at": "2024-06-13 13:15:27",
                "updated_at": "2024-06-13 13:15:27",
                "jabatan": "Manager",
                "gaji_pokok": "10000000.00"
            }
        },
        {
            "success": true,
            "data": {
                "id": 24,
                "nik": "7074969630366504",
                "nama_karyawan": "Dimaz Bagya Widodo S.Sos",
                "tempat_lahir": "Malang",
                "tgl_lahir": "1999-04-22",
                "agama": "kristen",
                "status_nikah": "belum kawin",
                "alamat": "Jr. Ketandan No. 930, Padang 65292, Sulut",
                "no_telp": "62805598069139",
                "pendidikan": "D4",
                "profil": null,
                "tgl_diangkat": "2023-02-21",
                "id_jabatan": 1,
                "created_at": "2024-06-13 13:15:27",
                "updated_at": "2024-06-13 13:15:27",
                "jabatan": "Manager",
                "gaji_pokok": "10000000.00"
            }
        },
        {
            "success": true,
            "data": {
                "id": 28,
                "nik": "6019388335183978",
                "nama_karyawan": "Gaman Pardi Hidayat S.Farm",
                "tempat_lahir": "Banda Aceh",
                "tgl_lahir": "1994-07-12",
                "agama": "hindu",
                "status_nikah": "kawin",
                "alamat": "Psr. Abang No. 847, Jayapura 88739, Bali",
                "no_telp": "62810550532760",
                "pendidikan": "S1",
                "profil": null,
                "tgl_diangkat": "2022-08-06",
                "id_jabatan": 1,
                "created_at": "2024-06-13 13:15:27",
                "updated_at": "2024-06-13 13:15:27",
                "jabatan": "Manager",
                "gaji_pokok": "10000000.00"
            }
        },
        {
            "success": true,
            "data": {
                "id": 1,
                "nik": "3905079358779851",
                "nama_karyawan": "Manah Cahyanto Iswahyudi M.M.",
                "tempat_lahir": "Tual",
                "tgl_lahir": "1984-06-23",
                "agama": "budha",
                "status_nikah": "belum kawin",
                "alamat": "Psr. Ters. Kiaracondong No. 821, Administrasi Jakarta Selatan 46964, Kepri",
                "no_telp": "62898560729504",
                "pendidikan": "S3",
                "profil": null,
                "tgl_diangkat": "2024-05-16",
                "id_jabatan": 2,
                "created_at": "2024-06-13 13:15:27",
                "updated_at": "2024-06-13 13:15:27",
                "jabatan": "Supervisor",
                "gaji_pokok": "8000000.00"
            }
        },
        {
            "success": true,
            "data": {
                "id": 4,
                "nik": "8805731405520396",
                "nama_karyawan": "Darmana Najib Zulkarnain M.Ak",
                "tempat_lahir": "Bau-Bau",
                "tgl_lahir": "1998-12-03",
                "agama": "hindu",
                "status_nikah": "kawin",
                "alamat": "Jr. Cikutra Barat No. 104, Surabaya 84922, Jateng",
                "no_telp": "62887358881487",
                "pendidikan": "S3",
                "profil": null,
                "tgl_diangkat": "2023-04-15",
                "id_jabatan": 2,
                "created_at": "2024-06-13 13:15:27",
                "updated_at": "2024-06-13 13:15:27",
                "jabatan": "Supervisor",
                "gaji_pokok": "8000000.00"
            }
        },
        {
            "success": true,
            "data": {
                "id": 7,
                "nik": "5585039049191610",
                "nama_karyawan": "Zaenab Farida S.Kom",
                "tempat_lahir": "Bandung",
                "tgl_lahir": "1995-12-04",
                "agama": "kristen",
                "status_nikah": "kawin",
                "alamat": "Jln. Kartini No. 817, Kotamobagu 76089, Banten",
                "no_telp": "62806019356097",
                "pendidikan": "D4",
                "profil": null,
                "tgl_diangkat": "2023-10-14",
                "id_jabatan": 2,
                "created_at": "2024-06-13 13:15:27",
                "updated_at": "2024-06-13 13:15:27",
                "jabatan": "Supervisor",
                "gaji_pokok": "8000000.00"
            }
        },
        {
            "success": true,
            "data": {
                "id": 13,
                "nik": "3381549698041989",
                "nama_karyawan": "Mala Nasyiah",
                "tempat_lahir": "Sukabumi",
                "tgl_lahir": "1980-08-10",
                "agama": "islam",
                "status_nikah": "belum kawin",
                "alamat": "Ds. Rajawali Timur No. 87, Tangerang 26552, Sumsel",
                "no_telp": "62857583793616",
                "pendidikan": "S3",
                "profil": null,
                "tgl_diangkat": "2023-05-17",
                "id_jabatan": 2,
                "created_at": "2024-06-13 13:15:27",
                "updated_at": "2024-06-13 13:15:27",
                "jabatan": "Supervisor",
                "gaji_pokok": "8000000.00"
            }
        },
        {
            "success": true,
            "data": {
                "id": 14,
                "nik": "4757455721689771",
                "nama_karyawan": "Bajragin Marpaung",
                "tempat_lahir": "Padang",
                "tgl_lahir": "2001-07-10",
                "agama": "budha",
                "status_nikah": "kawin",
                "alamat": "Psr. Sugiyopranoto No. 880, Padangpanjang 82513, Malut",
                "no_telp": "62833495795243",
                "pendidikan": "D3",
                "profil": null,
                "tgl_diangkat": "2023-12-31",
                "id_jabatan": 2,
                "created_at": "2024-06-13 13:15:27",
                "updated_at": "2024-06-13 13:15:27",
                "jabatan": "Supervisor",
                "gaji_pokok": "8000000.00"
            }
        },
        {
            "success": true,
            "data": {
                "id": 25,
                "nik": "5546247285010729",
                "nama_karyawan": "Patricia Laksmiwati",
                "tempat_lahir": "Palopo",
                "tgl_lahir": "1998-09-28",
                "agama": "hindu",
                "status_nikah": "belum kawin",
                "alamat": "Psr. Suryo No. 129, Parepare 71291, Jabar",
                "no_telp": "62866583321198",
                "pendidikan": "S3",
                "profil": null,
                "tgl_diangkat": "2023-04-28",
                "id_jabatan": 2,
                "created_at": "2024-06-13 13:15:27",
                "updated_at": "2024-06-13 13:15:27",
                "jabatan": "Supervisor",
                "gaji_pokok": "8000000.00"
            }
        },
        {
            "success": true,
            "data": {
                "id": 34,
                "nik": "3313044444444444",
                "nama_karyawan": "Fandi",
                "tempat_lahir": "karanganyar",
                "tgl_lahir": "2024-06-12",
                "agama": "islam",
                "status_nikah": "kawin",
                "alamat": "Karanganyar",
                "no_telp": "623232323232",
                "pendidikan": "D4",
                "profil": null,
                "tgl_diangkat": "2024-06-14",
                "id_jabatan": 2,
                "created_at": "2024-06-14 03:02:29",
                "updated_at": "2024-06-14 03:02:29",
                "jabatan": "Supervisor",
                "gaji_pokok": "8000000.00"
            }
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/api/pegawai?page=1",
        "last": "http://127.0.0.1:8000/api/api/pegawai?page=3",
        "prev": null,
        "next": "http://127.0.0.1:8000/api/api/pegawai?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 3,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/api/pegawai?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": "http://127.0.0.1:8000/api/api/pegawai?page=2",
                "label": "2",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/api/pegawai?page=3",
                "label": "3",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/api/pegawai?page=2",
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/api/pegawai",
        "per_page": 10,
        "to": 10,
        "total": 26
    }
}
```

#### Error

```json
{
    "success": false,
    "message": "Pegawai tidak ditemukan!"
}
```

## 2. GET /api/pegawai/{id}

Mengambil data pegawai berdasarkan ID.

### Request

-   **Metode:** GET
-   **Endpoint:** `/api/pegawai/{id}`
-   **Parameter Path:**
    -   `id` (integer) - ID pegawai yang ingin dilihat detailnya.

### Response

#### Sukses

```json
{
    "success": true,
    "data": {
        "id": 34,
        "nik": "3313044444444444",
        "nama_karyawan": "Fandi",
        "tempat_lahir": "karanganyar",
        "tgl_lahir": "2024-06-12",
        "agama": "islam",
        "status_nikah": "kawin",
        "alamat": "Karanganyar",
        "no_telp": "623232323232",
        "pendidikan": "D4",
        "profil": null,
        "tgl_diangkat": "2024-06-14",
        "id_jabatan": 2,
        "created_at": "2024-06-14 03:02:29",
        "updated_at": "2024-06-14 03:02:29",
        "jabatan": "Supervisor",
        "gaji_pokok": "8000000.00"
    }
}
```

#### Error

```json
{
    "success": false,
    "message": "Pegawai tidak ditemukan!"
}
```

## 3. POST /api/pegawai

Menambah data pegawai.

### Request

-   **Metode:** POST
-   **Endpoint:** `/api/pegawai`

### Request body

```json
{
    "nik": "3313044444444444",
    "nama_karyawan": "Fandi",
    "tempat_lahir": "karanganyar",
    "tgl_lahir": "2024-06-12",
    "agama": "islam",
    "status_nikah": "kawin",
    "alamat": "Karanganyar",
    "no_telp": "623232323232",
    "pendidikan": "D4",
    "tgl_diangkat": "2024-06-14",
    "id_jabatan": 2
}
```

### Response

#### Sukses

```json
{
    "success": true,
    "message": "Data pegawai dengan nama Fandi berhasil ditambahkan.",
    "data": {
        "nik": "3313044444444444",
        "nama_karyawan": "Fandi",
        "tempat_lahir": "karanganyar",
        "tgl_lahir": "2024-06-12",
        "agama": "islam",
        "status_nikah": "kawin",
        "alamat": "Karanganyar",
        "no_telp": "623232323232",
        "pendidikan": "D4",
        "tgl_diangkat": "2024-06-14",
        "id_jabatan": 2,
        "updated_at": "2024-06-14T03:02:29.000000Z",
        "created_at": "2024-06-14T03:02:29.000000Z",
        "id": 34
    }
}
```

#### Error

```json
{
    "success": false,
    "message": "Validasi gagal! Periksa kembali data anda.",
    "errors": {
        "tempat_lahir": ["Tempat lahir tidak boleh kosong"]
    }
}
```

## 4. PUT /api/pegawai/{id}

Mengubah data pegawai berdasarkan ID.

### Request

-   **Metode:** PUT
-   **Endpoint:** `/api/pegawai/{id}`
-   **Parameter Path:**
    -   `id` (integer) - ID pegawai yang ingin dilihat detailnya.

### Request body

```json
{
    "nik": "3313044444444444",
    "nama_karyawan": "Fandi",
    "tempat_lahir": "karanganyar",
    "tgl_lahir": "2024-06-12",
    "agama": "islam",
    "status_nikah": "kawin",
    "alamat": "Karanganyar",
    "no_telp": "623232323232",
    "pendidikan": "D4",
    "tgl_diangkat": "2024-06-14",
    "id_jabatan": 2
}
```

### Response

#### Sukses

```json
{
    "success": true,
    "message": "Data pegawai berhasil diubah."
}
```

#### Error

```json
{
    "success": false,
    "message": "Validasi gagal! Periksa kembali data anda.",
    "errors": {
        "tempat_lahir": ["Tempat lahir tidak boleh kosong"]
    }
}
```

## 5. POST /api/pegawai/upload_image/{id}

Mengubah atau menambahkan gambar profil pegawai berdasarkan ID.

### Request

-   **Metode:** POST
-   **Endpoint:** `/api/pegawai/upload_image/{id}`
-   **Parameter Path:**
    -   `id` (integer) - ID pegawai yang ingin dilihat detailnya.

### Request body

| Parameter     | Tipe |
| :------------ | :--- |
| `file-profil` | File |

### Response

#### Sukses

```json
{
    "success": true,
    "message": "File uploaded successfully!",
    "path": "http://127.0.0.1:8000/uploads/images/1718335101.png"
}
```

#### Error

```json
{
    "success": false,
    "message": "Validasi gagal! Periksa kembali data anda.",
    "error": "File gambar harus diunggah."
}
```

## 6. DELETE /api/pegawai/{id}

Menghapus data pegawai berdasarkan ID.

### Request

-   **Metode:** DELETE
-   **Endpoint:** `/api/pegawai/{id}`
-   **Parameter Path:**
    -   `id` (integer) - ID pegawai yang ingin dilihat detailnya.

### Response

#### Sukses

```json
{
    "success": true,
    "message": "Data pegawai berhasil dihapus"
}
```

#### Error

```json
{
    "success": false,
    "message": "Pegawai tidak ditemukan!"
}
```
