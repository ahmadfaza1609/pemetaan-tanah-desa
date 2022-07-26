<?php
// notifikasi form wajib diisi 
$this->session->flashdata('message');

// notifikasi gagal upload
if (isset($error_upload)) {
    echo '<div class="alert alert-warning alert-dismissible">' . $error_upload . '</div>';
};
?>
<div class="tables-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- peta -->
                        <div id="map" style="width: 100%; height: 1100px;"></div>
                        <!-- end peta -->
                    </div>

                    <div class="col-sm-6">
                        <?php
                        echo form_open_multipart('lahan/LahanJumlah/tambahTanahWarga/'); ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-style-1">
                                        <label>Panjang</label>
                                        <input type="text" class="form-control" name="panjang"
                                            value="<?= set_value('panjang') ?>" placeholder="Panjang Lahan">
                                        <?= form_error('panjang', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-style-1">
                                        <label>Lebar</label>
                                        <input type="text" class="form-control" name="lebar"
                                            value="<?= set_value('lebar') ?>" placeholder="Lebar Lahan">
                                        <?= form_error('lebar', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-style-1">
                                        <label>Luas</label>
                                        <input type="text" class="form-control" name="luas"
                                            value="<?= set_value('luas') ?>" placeholder="Luas Lahan">
                                        <?= form_error('luas', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-style-1">
                                        <label>Warna Lahan</label>
                                        <div class="input-group my-colorpicker2">
                                            <input type="text" name="warna_lahan" class="form-control"
                                                value="<?= set_value('warna_lahan') ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-square"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-style-1">
                                <div class="input-style-1">
                                    <label>Gambar Lahan</label>
                                    <input type="file" class="form-control" name="file_gambar"
                                        value="<?= set_value('file_gambar') ?>">
                                    <small class="text-small">format file : <small class="text-danger text-small">.jpg
                                            .jpeg .png .gif</small></small>
                                    <?= form_error('file_gambar', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-style-1">
                                <label>Titik Kordinat</label>
                                <textarea class="form-control" name="denah_tanah" rows="3"
                                    placeholder="Titik Kordinat"><?= set_value('denah_tanah') ?></textarea>
                                <?= form_error('denah_tanah', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-style-1">
                                <label>Batas Barat</label>
                                <input type="text" class="form-control" name="batas_barat"
                                    value="<?= set_value('batas_barat') ?>" placeholder="Batas Barat">
                                <?= form_error('batas_barat', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-style-1">
                                <label>Batas Selatan</label>
                                <input type="text" class="form-control" name="batas_selatan"
                                    value="<?= set_value('batas_selatan') ?>" placeholder="Batas Selatan">
                                <?= form_error('batas_selatan', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-style-1">
                                <label>Batas Utara</label>
                                <input type="text" class="form-control" name="batas_utara"
                                    value="<?= set_value('batas_utara') ?>" placeholder="Batas Utara">
                                <?= form_error('batas_utara', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-style-1">
                                <label>Batas Timur</label>
                                <input type="text" class="form-control" name="batas_timur"
                                    value="<?= set_value('batas_timur') ?>" placeholder="Batas Timur">
                                <?= form_error('batas_timur', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>



                        <div class="form-group ml-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
</div>

<script type="text/javascript">
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

// FeatureGroup is to store editable layers
var drawnItems = new L.FeatureGroup();
map.addLayer(drawnItems);
var drawControl = new L.Control.Draw({

    draw: {
        polygon: true,
        marker: false,
        polyline: false,
        circle: false,
        circlemarker: false,
        rectangle: false,
    },
    edit: {
        featureGroup: drawnItems
    }
});
map.addControl(drawControl);

map.on('draw:created', function(event) {
    var layer = event.layer;
    var feature = layer.feature = layer.feature || {};
    feature.type = feature.type || 'Feature';
    var props = feature.properties = feature.properties || {};
    drawnItems.addLayer(layer);
    $("[name=denah_tanah]").html(JSON.stringify(drawnItems.toGeoJSON()));
});

map.on('draw:edited', function(event) {
    $("[name=denah_tanah]").html(JSON.stringify(drawnItems.toGeoJSON()));
});

map.on('draw:deleted', function(event) {
    $("[name=denah_tanah]").html(JSON.stringify(drawnItems.toGeoJSON()));
});
</script>