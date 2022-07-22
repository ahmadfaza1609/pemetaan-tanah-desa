<div class="content">
    <div id="map" style="width: 100%; height: 600px;"></div>
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
    zoom: 17,
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
var lahan = L.geoJSON(<?= $value->denah_geojson; ?>, {
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
        "<p><img src='<?= base_url('gambar/' . $value->gambar); ?>' width=200/> </br>" +
        "Nama Lahan : <?= $value->nama_lahan; ?></br>" +
        "Isi Lahan : <?= $value->isi_lahan; ?></br>" +
        "Pemilik Lahan : <?= $value->pemilik_lahan; ?></br>" +
        "Alamat Lahan : <?= $value->alamat_pemilik; ?></br>" +
        "</br><a href='' class='btn btn-sm btn-block btn-default'>View Detail Lahan</a>" +
        "</p>");
});
<?php } ?>
</script>