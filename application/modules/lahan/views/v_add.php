<div class="tables-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- peta -->
                        <div id="map" style="width: 100%; height: 800px;"></div>
                        <!-- end peta -->
                    </div>

                    <div class="col-sm-6">
                        <?php

                        echo form_open_multipart('lahan/add'); ?>
                        <div class="form-group">
                            <div class="input-style-1">
                                <label>Pemilik Lahan</label>
                                <input type="text" class="form-control" name="pemilik_lahan" placeholder="Pemilik Lahan" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-style-1">
                                        <label>Luas Lahan</label>
                                        <input type="text" class="form-control" name="luas_lahan" placeholder="Luas Lahan">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="select-style-1">

                                        <label>Isi Lahan</label>
                                        <div class="select-position">
                                            <select name="isi_lahan" class="form-control">
                                                <option value="Padi">Padi</option>
                                                <option value="Jagung">Jagung</option>
                                                <option value="Sawit">Sawit</option>
                                                <option value="Cabe">Cabe</option>
                                                <option value="Karet">Karet</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-style-1">

                                <label>Nama Lahan</label>
                                <input type="text" class="form-control" name="nama_lahan" placeholder="Pemilik Lahan">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-style-1">

                                <label>Alamat Pemilik Lahan</label>
                                <input type="text" class="form-control" name="alamat_pemilik" placeholder="Alamat Pemilik Lahan">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-style-1">
                                <label>Denah GeoJSON</label>
                                <textarea class="form-control" name="denah_geojson" rows="3" placeholder="Denah GeoJSON"></textarea>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-style-1">

                                        <label>Warna Lahan</label>
                                        <div class="input-group my-colorpicker2">
                                            <input type="text" name="warna_lahan" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-square"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-style-1">
                                        <label>Gambar</label>
                                        <input type="file" class="form-control" name="gambar">
                                    </div>
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

    map.on('draw:created', function(event) {
        var layer = event.layer;
        var feature = layer.feature = layer.feature || {};
        feature.type = feature.type || 'Feature';
        var props = feature.properties = feature.properties || {};
        drawnItems.addLayer(layer);
        $("[name=denah_geojson]").html(JSON.stringify(drawnItems.toGeoJSON()));
    });

    map.on('draw:edited', function(event) {
        $("[name=denah_geojson]").html(JSON.stringify(drawnItems.toGeoJSON()));
    });

    map.on('draw:deleted', function(event) {
        $("[name=denah_geojson]").html(JSON.stringify(drawnItems.toGeoJSON()));
    });
</script>