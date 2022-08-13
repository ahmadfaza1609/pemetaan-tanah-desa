<div class="row">
    <div class="col-xl-4 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon purple">
                <i class="lni lni-layers"></i>
            </div>
            <div class="content">
                <h6 class="mb-10">Jumlah Arsip</h6>
                <h3 class="text-bold"><?= $jumlah_surat ?> Arsip</h3>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon success">
                <i class="lni lni-users"></i>
            </div>
            <div class="content">
                <h6 class="mb-10">Jumlah Penduduk</h6>
                <h3 class="text-bold"><?= $jumlah_penduduk ?> Penduduk</h3>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon primary">
                <i class="lni lni-map"></i>
            </div>
            <div class="content">
                <h6 class="mb-10">Jumlah Lahan</h6>
                <h3 class="text-bold"><?= $jumlah_lahan ?> Lahan</h3>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div id="map" style="width: 100%; height: 600px;" class="rounded-3"></div>
</div>

<script>
var groupLahan = L.layerGroup();
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
    zoom: 14,
    layers: [peta2, groupLahan]
});

var baseLayers = {
    'OpenStreetMap': peta1,
    'Satelite': peta2,
    'Streets': peta3
};

var overlays = {
    "lahan": groupLahan
};

var layerControl = L.control.layers(baseLayers, overlays).addTo(map);
<?php foreach ($lahan as $key => $value) { ?>
var lahan = L.geoJSON({
    "type": "FeatureCollection",
    "features": [{
        "type": "Feature",
        "properties": {},
        "geometry": {
            "type": "Polygon",
            "coordinates": [
                [<?= $value->denah_tanah ?>]
            ]
        }
    }]
}, {
    style: {
        color: 'white',
        fillColor: '<?= $value->warna_lahan; ?>',
        fillOpacity: 0.3,
        dashArray: '3',
        lineCap: 'butt',
        lineJoin: 'miter'
    }
}).addTo(groupLahan);
lahan.eachLayer(function(layer) {
    layer.bindPopup(
        "<p class='text-sm'><img src='<?= base_url('gambar/' . $value->file_gambar); ?>' width=200 height=130 class='justify-content-center d-flex m-auto' /> </br>" +
        "<pre>Pemilik            : <?= $value->nama; ?></br>" +
        "Panjang            : <?= $value->panjang; ?></br>" +
        "Lebar              : <?= $value->lebar; ?></br>" +
        "Luas               : <?= $value->luas; ?></br>" +
        "Batas Barat        : <?= $value->batas_barat; ?></br>" +
        "Batas Selatan      : <?= $value->batas_selatan; ?></br>" +
        "Batas Timur        : <?= $value->batas_timur; ?></br>" +
        "Batas Utara        : <?= $value->batas_utara; ?></br></pre>" +

        "</br><a href='<?= base_url('lahan/LahanTanah/detailLahanTanah/' . $value->id_lahan_warga) ?>' class='main-btn success-btn-outline btn-hover'>View Detail Lahan</a>" +
        "</p>");
});
<?php } ?>
</script>