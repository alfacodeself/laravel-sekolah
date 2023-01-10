<div class="row">
    <div class="col-md-3 mb-2 mb-md-0" style="border-right: 3px solid rgb(116, 0, 0)">
        <strong>
            {{ \Carbon\Carbon::parse($announcement->tanggal_awal)->translatedFormat('d F Y') }}
            -
            {{ \Carbon\Carbon::parse($announcement->tanggal_akhir)->translatedFormat('d F Y') }}
        </strong>
    </div>
    <div class="col-md-3 mb-2 mb-md-0" style="border-right: 3px solid rgb(116, 0, 0)">
        {{ $announcement->catatan }}
    </div>
    <div class="col-md-6 mb-2 mb-md-0" style="border-right: 3px solid rgb(116, 0, 0)">
        {{ $announcement->deskripsi }}
    </div>
</div>
