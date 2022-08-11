<div class="tables-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30 overflow-auto">
                <div class="text-center mb-5">
                    <h2 class="title">Pemerintahan Desa Bantan Tengah Pemetaan </br> Tanah Warga Secara Digitalisasi
                    </h2>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="m-auto d-flex justify-content-center">
                            <img src="<?= base_url() ?>/style-admin/assets/images/logo/kompas.png" width="150"
                                class="justify-content-center m-auto" alt="">
                        </div>
                        <div class="table-wrapper table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <h3>Pemilik</h3>
                                        </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td>
                                        <p><?= $detail_tanah->nik ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Pemilik Surat</td>
                                    <td>:</td>
                                    <td>
                                        <p><?= $detail_tanah->nama ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $detail_tanah->alamat ?></td>
                                </tr>
                                <tr>
                                    <td>RT / RW</td>
                                    <td>:</td>
                                    <td><?= $detail_tanah->no_rt ?> / <?= $detail_tanah->no_rw ?></td>
                                </tr>
                                <tr>
                                    <td>Dusun</td>
                                    <td>:</td>
                                    <td><?= $detail_tanah->no_dusun ?></td>
                                </tr>
                                <tr>
                                    <td>Lebar</td>
                                    <td>:</td>
                                    <td><?= $detail_tanah->panjang ?></td>
                                </tr>
                                <tr>
                                    <td>Panjang</td>
                                    <td>:</td>
                                    <td><?= $detail_tanah->lebar ?></td>
                                </tr>
                                <tr>
                                    <td>Luas</td>
                                    <td>:</td>
                                    <td><?= $detail_tanah->luas ?></td>
                                </tr>
                                <thead>
                                    <tr>
                                        <th>
                                            <h3 class="pt-5">Perbatasan</h3>
                                        </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>Batas Barat</td>
                                    <td>:</td>
                                    <td><?= $detail_tanah->batas_barat ?></td>
                                </tr>
                                <tr>
                                    <td>Batas Selatan</td>
                                    <td>:</td>
                                    <td><?= $detail_tanah->batas_selatan ?></td>
                                </tr>
                                <tr>
                                    <td>Batas Timur</td>
                                    <td>:</td>
                                    <td><?= $detail_tanah->batas_timur ?></td>
                                </tr>
                                <tr>
                                    <td>Batas Utara</td>
                                    <td>:</td>
                                    <td><?= $detail_tanah->batas_utara ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div id="map" style="width: 100%; height: 980px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
var peta1 = L.tileLayer(
    'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
    });
var peta2 = L.tileLayer('http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}', {
    attribution: 'google'
});
var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
});
var map = L.map('map', {
    center: [1.528984, 102.209263],
    zoom: 16,
    layers: [peta2]
});
var baseLayers = {
    'OpenStreetMap': peta1,
    'Satelite': peta2,
    'Streets': peta3
};
var overlays = {

};
var layerControl = L.control.layers(baseLayers).addTo(map);
var lahan = L.geoJSON({
    "type": "FeatureCollection",
    "features": [{
        "type": "Feature",
        "properties": {},
        "geometry": {
            "type": "Polygon",
            "coordinates": [
                [<?= $detail_tanah->denah_tanah ?>]
            ]
        }
    }]
}, {
    style: {
        color: 'white',
        fillColor: '<?= $detail_tanah->warna_lahan; ?>',
        fillOpacity: 0.3,
        dashArray: '3',
        lineCap: 'butt',
        lineJoin: 'miter'
    }
}).addTo(map);
lahan.eachLayer(function(layer) {
    layer.bindPopup(
        "<p><img src='<?= base_url('gambar/' . $detail_tanah->file_gambar); ?>' width=200/> </br>" +
        "Nama Lahan : <?= $detail_tanah->nik; ?></br>" +
        "Isi Lahan : <?= $detail_tanah->nama; ?></br>" +
        "Pemilik Lahan : <?= $detail_tanah->batas_barat; ?></br>" +
        "Alamat Lahan : <?= $detail_tanah->batas_utara; ?></br>" +
        "</p>");
});
// peta ketengah
map.fitBounds(lahan.getBounds());
</script>