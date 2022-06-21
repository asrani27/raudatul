<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta content="en-us" http-equiv="Content-Language" />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>STMIK</title>
    {{-- <style type="text/css">
        .auto-style1 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: x-small;
        }
    </style> --}}
    <style>
        @page {
            margin-top: 80px;
            margin-left: 50px;
        }

        header {
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            height: 0px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            /** Extra personal styles **/
            /* background-color: #03a9f4;
            color: white;
            text-align: center; 
            line-height: 35px;*/
        }

        tr,
        th,
            {
            border: 2px solid #000;
            font-size: 10px;
            font-family: Arial, Helvetica, sans-serif;
        }

        td {
            font-weight: bold;
            border: 2px solid #000;
            font-size: 10px;
        }

        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;
            font-size: 8px;
            font-family: Arial, Helvetica, sans-serif;
            /** Extra personal styles **/
            /* background-color: #03a9f4;
            color: white;
            text-align: center;
            line-height: 35px; */
        }
    </style>
</head>

<body>
    <header>
        <table border="0" width="100%">
            <tr>
                <td style="border: 0px;" align="center" width="30%">
                    <img width="50px" height="50px" src="{{$logo}}">
                </td>
                <td style="border: 0px;" valign="top" align="center" width="100%">
                    <h2>YAYASAN PENDIDIKAN BISA ILMU<BR /> STMIK INDONESIA BANJARMASIN<br />
                    </h2>
                    JL. Pangeran Hidayatullahh (Samping Jembatan Banua Anyar) Banjarmasin Utara, Kota Banjarmasin,
                    Kalimantan Selatan

                </td>
                <td style="border: 0px;" align="center" width="30%">
                    <img width="50px" height="50px" src="{{$smk}}">
                </td>
            </tr>
        </table>
        <hr>
        <p><span class="auto-style1"><strong>LAPORAN DATA PENILAIAN STAKEHOLDER : {{strtoupper($st->nama)}}
                </strong></span>
        </p>
    </header>
    <footer>
        <hr>
        <p>Tanggal Cetak : {{\Carbon\Carbon::now()->format('d-m-Y H:i:s')}}
        </p>
    </footer>
    <br />
    <br />
    <br />
    <br />
    <main>
        <table cellpadding="5" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>PENILAI</th>
                    <th>INTEGRITAS</th>
                    <th>PROFESIONALITAS</th>
                    <th>KOMUNIKASI</th>
                    <th>KERJA SAMA</th>
                    <th>PENGEMBANGAN DIRI</th>
                    <th>PENGUASAAN TIK</th>
                    <th>BAHASA INGGRIS</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($data as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->alumni->nim}}</td>
                    <td>{{$item->alumni->nama}}</td>
                    <td>{{$item->penilai}}</td>
                    <td style="text-align: center">{{$item->integritas}}</td>
                    <td style="text-align: center">{{$item->profesionalitas}}</td>
                    <td style="text-align: center">{{$item->komunikasi}}</td>
                    <td style="text-align: center">{{$item->kerjasama}}</td>
                    <td style="text-align: center">{{$item->pengembangan_diri}}</td>
                    <td style="text-align: center">{{$item->penguasaan_tik}}</td>
                    <td style="text-align: center">{{$item->bahasa_inggris}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <br />
        <table width="100%" border="0">
            <tr style="border: 0px;">
                <td width="70%" style="border: 0px;"></td>
                <td width="30%" style="border: 0px; text-align:center">
                    Banjarmasin, {{\Carbon\Carbon::now()->translatedFormat('d F Y')}}<br />
                    Ketua,<br />
                    STMIK Indonesia Banjarmasin
                    <br />
                    <br />
                    <br />
                    <br />
                    (.............................)



                </td>
            </tr>
        </table>

    </main>
</body>

</html>