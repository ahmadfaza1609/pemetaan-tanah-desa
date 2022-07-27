<div class="content">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data Lahan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <div class="card-body">
            <div class="row">
                <div class="col-sm-7">
                    <!-- peta -->
                    <div id="map" style="width: 100%; height: 600px;"></div>
                    <!-- end peta -->
                </div>

                <div class="col-sm-5">
                    <?php
                    // notifikasi form wajib diisi 
                    echo validation_errors('<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-ban"></i>', '</div>');

                    // notifikasi gagal upload
                    if (isset($error_upload)) {
                        echo '<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-exclamation-triangle"></i>' . $error_upload . '</div>';
                    };

                    // notifikaasi berhasil simpan 
                    if ($this->session->flashdata('sukses')) {
                        echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-check"></i>';
                        echo $this->session->flashdata('sukses');
                        echo '</div>';
                    }

                    echo form_open_multipart('lahan/edit/' . $lahan->id_lahan); ?>
                    <div class="form-group">
                        <label>Nama Lahan</label>
                        <input type="text" class="form-control" name="nama_lahan" value="<?= $lahan->nama_lahan ?>"
                            placeholder=" Nama Lahan">
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Luas Lahan</label>
                                <input type="text" class="form-control" name="luas_lahan"
                                    value="<?= $lahan->luas_lahan ?>" placeholder="Luas Lahan">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Isi Lahan</label>
                                <select name="isi_lahan" class="form-control">
                                    <option value="<?= $lahan->isi_lahan ?>"><?= $lahan->isi_lahan ?></option>
                                    <option value="Padi">Padi</option>
                                    <option value="Jagung">Jagung</option>
                                    <option value="Sawit">Sawit</option>
                                    <option value="Cabe">Cabe</option>
                                    <option value="Karet">Karet</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Pemilik Lahan</label>
                        <input type="text" class="form-control" name="pemilik_lahan"
                            value="<?= $lahan->pemilik_lahan ?>" placeholder="Pemilik Lahan">
                    </div>

                    <div class="form-group">
                        <label>Alamat Pemilik Lahan</label>
                        <input type="text" class="form-control" name="alamat_pemilik"
                            value="<?= $lahan->alamat_pemilik ?>" placeholder="Alamat Pemilik Lahan">
                    </div>

                    <div class="form-group">
                        <label>Denah GeoJSON</label>
                        <textarea class="form-control" name="denah_geojson"
                            rows="3"><?= $lahan->denah_geojson ?></textarea>
                    </div>

                    <div class="row">

                        <div class="col-sm-12">
                            <img src="<?= base_url('gambar/' . $lahan->gambar); ?>" width="100">
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Warna Lahan</label>
                                <div class="input-group my-colorpicker2">
                                    <input type="text" name="warna_lahan" class="form-control"
                                        value="<?= $lahan->warna_lahan ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-square"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" class="form-control" name="gambar">
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
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
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

// FeatureGroup is to store editable layers
var drawnItems = new L.geoJSON(<?= $lahan->denah_geojson ?>);
map.addLayer(drawnItems);
var drawControl = new L.Control.Draw({

    draw: {
        polygon: true,
        marker: false,
        polyline: true,
        circle: false,
        circlemarker: false,
        rectangle: false,
    },
    edit: {
        featureGroup: drawnItems
    }
});
map.addControl(drawControl);

// buaat draw
map.on('draw:created', function(event) {
    var layer = event.layer;
    var feature = layer.feature = layer.feature || {};
    feature.type = feature.type || 'Feature';
    var props = feature.properties = feature.properties || {};
    drawnItems.addLayer(layer);
    $("[name=denah_geojson]").html(JSON.stringify(drawnItems.toGeoJSON()));
});

// edit draw
map.on('draw:edited', function(event) {
    $("[name=denah_geojson]").html(JSON.stringify(drawnItems.toGeoJSON()));
});

// delet draw
map.on('draw:deleted', function(event) {
    $("[name=denah_geojson]").html(JSON.stringify(drawnItems.toGeoJSON()));
});

// peta ketengah
map.fitBounds(drawnItems.getBounds());
</script>


<!-- Page script -->
<script>
$(function() {

    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

})
</script>