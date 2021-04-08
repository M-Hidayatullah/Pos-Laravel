<body>
    <p><strong>Ilham Store</strong></p>
    <p>Lombok Tengah</p>
    <p>Kasir : {{$kasir->name}}</p>
    <p>Tanggal :{{$ambil->tanggal_beli}}</p>
    <p>====================================================</p>

    <table style="margin-top:-10px">
    @foreach($transaksi as $u)
        <tr>
            <td style="padding-right:50px">nama barang: {{$u->nama_barang}}</td>
            <td style="padding-right:50px">jumlah beli: {{$u->jumlah_beli}}</td>
            <td style="padding-right:50px">{{$u->harga_barang}}</td>
            <td style="padding-right:50px">{{$u->total_harga}}</td>
        </tr>
    @endforeach
        <tr>
            <td colspan="3" style="text-align:right;padding-right:50px">Total Harga</td>
            <td>{{$jumlah}}</td>
        </tr>
        <tr>
            <td colspan="3" style="text-align:right;padding-right:50px">Bayar</td>
            <td>{{$kembalian->bayar}}</td>
        </tr>
        <tr>
            <td colspan="3" style="text-align:right;padding-right:50px">Kembalian</td>
            <td>{{$kembalian->kembalian}}</td>
        </tr>
    </table>
    <p>====================================================</p>
    <p>Terimakasih Telah berbelanja di tempat kami <br>semoga hari anda menyenangkan!</p>
</body>
