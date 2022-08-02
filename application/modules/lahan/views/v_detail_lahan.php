<div class="content">
    <div class="row">

        <div class="col-sm-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Map Lahan</h3>
                </div>
                <div id="map" style="width: 100%; height: 400px;"></div>

            </div>
        </div>
        <div class="col-sm-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Detail Lahan</h3>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Nama Lahan</th>
                            <td>: <?= $lahan->nama_lahan ?></td>
                        </tr>
                        <tr>
                            <th>Luas Lahan</th>
                            <td>: <?= $lahan->luas_lahan ?></td>
                        </tr>
                        <tr>
                            <th>Pemilik Lahan</th>
                            <td>: <?= $lahan->pemilik_lahan ?></td>
                        </tr>
                        <tr>
                            <th>Alamat Pemilik</th>
                            <td>: <?= $lahan->pemilik_lahan ?></td>
                        </tr>
                        <tr>
                            <th>Isi Lahan</th>
                            <td>: <?= $lahan->isi_lahan ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div class="col-sm-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Foto</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2">
                        <a href="<?= base_url('gambar/' . $lahan->gambar) ?>" data-toggle="lightbox"
                            data-title="<?= $lahan->nama_lahan ?>" data-gallery="gallery">
                            <img src="<?= base_url('gambar/' . $lahan->gambar) ?>" class="img-fluid mb-2" width="100%"
                                height="200" />
                        </a>
                    </div>
                    <?php foreach ($foto as $key => $value) { ?>
                    <div class="col-sm-2">
                        <a href="<?= base_url('foto/' . $value->foto) ?>" data-toggle="lightbox"
                            data-title="<?= $value->ket ?>" data-gallery="gallery">
                            <img src="<?= base_url('foto/' . $value->foto) ?>" class="img-fluid mb-2" width="100%"
                                height="200" />
                        </a>
                    </div>
                    <?php } ?>
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

var lahan = L.geoJSON(<?= $lahan->denah_geojson; ?>, {
    style: {
        color: 'white',
        fillColor: '<?= $lahan->warna_lahan; ?>',
        fillOpacity: 0.3,
        dashArray: '3',
        lineCap: 'butt',
        lineJoin: 'miter'
    }
}).addTo(map);
lahan.eachLayer(function(layer) {
    layer.bindPopup(
        "<p><img src='<?= base_url('gambar/' . $lahan->gambar); ?>' width=200/> </br>" +
        "Nama Lahan : <?= $lahan->nama_lahan; ?></br>" +
        "Isi Lahan : <?= $lahan->isi_lahan; ?></br>" +
        "Pemilik Lahan : <?= $lahan->pemilik_lahan; ?></br>" +
        "Alamat Lahan : <?= $lahan->alamat_pemilik; ?></br>" +
        "</p>");
});

// peta ketengah
map.fitBounds(lahan.getBounds());
</script>


<!-- Page specific script -->
<script>
$(function() {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            alwaysShowClose: true,
        });
    });
})
</script>