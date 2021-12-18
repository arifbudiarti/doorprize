<?= $this->extend('theme/theme2'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h1><b><?= $child ?></b></h1>
                <button type="button" id="reset" class="btn btn-success btn-w-m" onclick="reset()">Reset</button>
                <button type="button" id="stop" class="btn btn-danger btn-w-m" onclick="stop()">Stop</button>
                <button type="button" id="start" class="btn btn-primary btn-w-m" onclick="start()">Start</button>
                <div class="ibox-tools">
                    <div id="info">
                        <h2></h2>
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <?php $no = 0; ?>
                    <?php for ($i = 0; $i < $count; $i++) : ?>
                        <?php $no++; ?>
                        <div class="col-lg-3">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <span class="label label-success float-right"><?= $no ?></span>
                                    <h5>Pemenang</h5>
                                </div>
                                <div class="ibox-content">
                                    <h1 class="no-margins" id="row_<?= $i ?>">--------------------------------------</h1>
                                    <input type="hidden" id="id_<?= $i ?>">
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Book Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_md_rubrik" />
                    <div class="form-body">
                        <div class="form-group row"><label class="col-lg-2 col-form-label">Prize</label>
                            <div class="col-lg-10">
                                <input type="text" placeholder="Blender" class="form-control" name="prize">
                                <input type="hidden" placeholder="1" class="form-control" name="id" value="<?= $id ?>">
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-2 col-form-label">Qty</label>
                            <div class="col-lg-10">
                                <input type="number" placeholder="1" class="form-control" name="qty">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<!-- Page-Level Scripts -->
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        //initial hide
        $("#stop").hide();
        $("#reset").hide();
    });
    var i, j, temp, pop, col, chunk = <?= $count ?>;
    var rand;
    var idx = [];
    var chosen = [];
    var res = [];

    function getCol(matrix, col) {
        var column = [];
        for (var i = 0; i < matrix.length; i++) {
            column.push(matrix[i][col]);
        }

        return column;
    }

    function chunkArray(myArray, chunk_size) {
        var index = 0;
        var arrayLength = myArray.length;
        var tempArray = [];
        var col = [];
        var res = new Array();

        for (index = 0; index < arrayLength; index += chunk_size) {
            myChunk = myArray.slice(index, index + chunk_size);
            // Do something if you want with the group
            tempArray.push(myChunk);
        }

        for (var i = 0; i < chunk_size; i++) {
            col[i] = getCol(tempArray, i);
        }

        return col;
    }

    function get_random(i) {
        return setInterval(function() {
            var id = Math.floor(Math.random() * pop[i].length);
            $("#row_" + i).html(pop[i][id]['name'] + ' (' + pop[i][id]['alias'] + ')');
            $("#id_" + i).val(pop[i][id]['id']);
        }, 10);
    }

    function start() {
        $("#start").hide();
        $("#stop").show();
        $("#info").html("<h2>PROCESSING ......</h2>");
        $.ajax({
            type: 'post',
            url: "<?php echo site_url('Action/getNomor') ?>",
            dataType: 'json',
            async: 'false',
            success: function(data) {
                temp = data;
                if (temp.length == 0) {
                    $("#stop").hide();
                    $("#start").show();
                    for (var i = 0; i < chunk; i++) {
                        $("#row_" + i).html('---------------------------------');
                        $("#id_" + i).val('');
                    }
                    $("#info").html("CLICK START TO BEGIN");
                    //alert('All data have been chosen!');
                } else {
                    pop = chunkArray(temp, chunk);
                    for (var i = 0; i <= chunk; i++) {
                        res[i] = get_random(i);
                    }
                }
            }
        })
    }

    function stop() {
        $("#stop").hide();
        $("#reset").show();

        var ids = new Array();
        for (var i = 0; i < chunk; i++) {
            clearInterval(res[i]);
            ids.push($("#id_" + i).val());
        }

        $.ajax({
            type: 'post',
            url: "<?php echo site_url('Action/pushNomor/' . $id) ?>",
            data: 'id=' + ids,
            success: function() {

            }
        })

        $("#info").html("<h2>SELAMAT KEPADA PEMENANG</h2>");
    }

    function reset() {
        $("#start").show();
        $("#reset").hide();

        $.ajax({
            type: 'post',
            url: "<?php echo site_url('Action/delNomor/' . $id) ?>",
            success: function(data) {
                for (var i = 0; i < chunk; i++) {
                    $("#row_" + i).html('-----------------------------');
                    $("#id_" + i).val('');
                }
            }
        })





        $("#info").html("START TO BEGIN");
    }
</script>
<?= $this->endSection(); ?>