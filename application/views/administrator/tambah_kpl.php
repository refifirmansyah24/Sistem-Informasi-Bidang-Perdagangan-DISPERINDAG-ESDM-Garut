<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <!-- Include Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <style>
    #mapid {
        height: 400px;
    }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
        </div>

        <div class="card" style="width: 60%">
            <div class="card-body">
                <!-- FORM INPUT DATA -->
                <?php echo form_open('administrator/kpl/tambah_data_aksi') ?>
                <div class="form-group">
                    <label>Nama KPL</label>
                    <input type="text" name="nama_kpl" class="form-control"
                        value="<?php echo set_value('nama_kpl'); ?>">
                    <?php echo form_error('nama_kpl', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Kode Kios</label>
                    <input type="text" name="kode_kios" class="form-control"
                        value="<?php echo set_value('kode_kios'); ?>">
                    <?php echo form_error('kode_kios', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Pemilik</label>
                    <input type="text" name="pemilik" class="form-control" value="<?php echo set_value('pemilik'); ?>">
                    <?php echo form_error('pemilik', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?php echo set_value('alamat'); ?>">
                    <?php echo form_error('alamat', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control"
                        value="<?php echo set_value('kecamatan'); ?>">
                    <?php echo form_error('kecamatan', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>No. HP</label>
                    <input type="text" name="no_hp" class="form-control" value="<?php echo set_value('no_hp'); ?>">
                    <?php echo form_error('no_hp', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Distributor PT. Pupuk Kujang </label>
                    <input type="text" name="dis_1" class="form-control" value="<?php echo set_value('dis_1'); ?>">
                    <?php echo form_error('dis_1', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Distributor PT. Petro Kimia Gresik</label>
                    <input type="text" name="dis_2" class="form-control" value="<?php echo set_value('dis_2'); ?>">
                    <?php echo form_error('dis_2', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <select name="keterangan" class="form-control">
                        <option value="" style="display:none;">Pilih Keterangan</option>
                        <option value="Baru">Baru</option>
                        <option value="Lama">Lama</option>
                        <option value="--">--</option>
                    </select>
                    <?php echo form_error('keterangan', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Latitude</label>
                    <input type="text" name="latitud" id="latitudeInput" class="form-control"
                        value="<?php echo set_value('latitud'); ?>">
                    <?php echo form_error('latitud', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Longitude</label>
                    <input type="text" name="longitud" id="longitudeInput" class="form-control"
                        value="<?php echo set_value('longitud'); ?>">
                    <?php echo form_error('longitud', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div id="mapid"></div>

                <div class="button-group">
                    <button id="updateMapButton" type="button" class="btn btn-primary">Update Map</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>

                <div id="mapid" style="height: 400px;"></div>

                <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
                <script>
                var map = L.map('mapid').setView([0, 0], 2);
                var marker;

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                function updateMap() {
                    var latitude = parseFloat(document.getElementById('latitudeInput').value);
                    var longitude = parseFloat(document.getElementById('longitudeInput').value);

                    if (!isNaN(latitude) && !isNaN(longitude)) {
                        if (marker) {
                            map.removeLayer(marker);
                        }
                        marker = L.marker([latitude, longitude]).addTo(map);
                        map.setView([latitude, longitude], 13);
                    } else {
                        alert('Latitude and Longitude must be valid numbers.');
                    }
                }

                document.getElementById('updateMapButton').addEventListener('click', updateMap);
                </script>
</body>

</html>