<div class="faq">
    <div class="" data-aos="fade-up">
        <div class="row">
            <div class="accordion accordion-flush" id="faqlist">
                <table class="table">
                    <thead class="table__thead">
                        <tr>
                            <th class="table__th">NAMA</th>
                            <th class="table__th">MARKETING PERUMAHAN</th>
                            <th class="table__th"></th>
                        </tr>
                    </thead>
                    <tbody class="table__tbody">
                        <?php
                        foreach ($data_marketing as $data) :
                            $id_marketing = $data->id_marketing;
                        ?>
                            <tr class="table-row table-row--chris">
                                <td class="table-row__td">
                                    <div class="table-row__img">
                                        <img src="<?php echo base_url('upload'); ?>/<?php echo $data->foto_marketing; ?>" class="img-fluid" alt="">
                                    </div>
                                    <div class="table-row__info">
                                        <p class="table-row__name"><?php echo $data->nm_marketing; ?></p>
                                    </div>
                                </td>
                                <td class="table-row__td">
                                    <?php
                                    $sql = "SELECT nm_perum, id_perum, id_market, status_marketperum, bitly FROM marketperum, perum WHERE marketperum.idmarketing = $id_marketing AND perum.id_perum = marketperum.id_marketperum";
                                    $query = $this->db->query($sql);
                                    if ($query->num_rows() > 0) {
                                        foreach ($query->result() as $perum) :
                                    ?>
                                            <p>
                                                <!-- <div class="custom-control custom-checkbox"> -->
                                                <input class="custom-control-input ceklis-aktif-marketperum" type="checkbox" id="ceklis-aktif-<?php echo $perum->id_market; ?>" data-id-market="<?php echo $perum->id_market; ?>" value="<?php echo $perum->status_marketperum; ?>">
                                                <a href="<?php echo $perum->bitly; ?>" class="">
                                                    <span style="padding: 4px;border: 1px solid;border-radius: 5px; margin-right: 8px;"><?php echo $perum->nm_perum; ?></span>
                                                </a>
                                                <button type="button" class="btn btn-outline-danger btn-delete-markerperum" value="" data-id-market="<?php echo $perum->id_market; ?>" style="padding: 0px 5px !important;"><i class="fa-regular fa-trash-can"></i></button>
                                                <!-- </div> -->
                                            </p>
                                            <script>
                                                if ($('#ceklis-aktif-<?php echo $perum->id_market; ?>').val() == 'aktif') {
                                                    $('#ceklis-aktif-<?php echo $perum->id_market; ?>').prop('checked', true);
                                                } else {
                                                    $('#ceklis-aktif-<?php echo $perum->id_market; ?>').prop('checked', false);
                                                }
                                            </script>

                                    <?php
                                        endforeach;
                                    }
                                    ?>
                                </td>
                                <td class="row-td-action">
                                    <a href="#" class="btn-add-marketperum" data-id-marketing="<?php echo $data->id_marketing; ?>">
                                        <i class="fa-regular fa-square-plus"></i>
                                    </a>
                                    <a href="#" class="btn-edit" data-id-marketing="<?php echo $data->id_marketing; ?>" data-nm-marketing="<?php echo $data->nm_marketing; ?>" data-foto-marketing="<?php echo $data->foto_marketing; ?>" data-foto-header="<?php echo $data->foto_header; ?>">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href="#" class="btn-delete" data-id-marketing="<?php echo $data->id_marketing; ?>" data-foto-marketing="<?php echo $data->foto_marketing; ?>" data-foto-header="<?php echo $data->foto_header; ?>">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
                <input type="text" id="id-marketing" value="" hidden>
            </div>
        </div>
    </div>
</div>
<script>
    $('.ceklis-aktif-marketperum').click(function(e) {
        if ($(this).is(":checked")) {
            // profesi.push($(this).val());
            var status = 'aktif';
        } else {
            var status = '';
        }
        let formData = new FormData();
        formData.append('id-market', $(this).data('id-market'));
        formData.append('status-marketperum', status);
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('marketing/switch_data_marketperum'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                // alert('berhasil')
                // form_default();
                // load_data_perum();
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    });
    $('.btn-add-marketperum').click(function(e) {
        $('#add-marketperum, #btn-simpan-marketing, #btn-batal-marketing').show();
        $('#btn-add-marketing, #add-marketing').hide();
        $('#btn-simpan-marketing').val('marketperum');
        $('#id-marketing').val($(this).data('id-marketing'));
    });
    $('.btn-edit').click(function(e) {
        $('#add-marketing, #btn-simpan-marketing, #btn-batal-marketing').show();
        $('#btn-add-marketing').hide();
        $('#btn-simpan-marketing').val('edit');
        $('#herf-batal, #ceklis-ubah-marketing').removeAttr('hidden', true);
        $('.btn-simpan-perum').val('edit');
        $('#nm-marketing').val($(this).data('nm-marketing'));
        $('#id-marketing').val($(this).data('id-marketing'));
        $('#foto-lama, #nm-foto-marketing').val($(this).data('foto-marketing'));
        $('#foto-lama-header, #nm-foto-marketing-header').val($(this).data('foto-header'));
        $('#preview-foto-marketing').attr({
            src: '<?php echo base_url('upload'); ?>/' + $(this).data('foto-marketing')
        });
        $('#preview-foto-marketing-header').attr({
            src: '<?php echo base_url('upload'); ?>/' + $(this).data('foto-header')
        });
    });

    $('.btn-delete-markerperum').click(function() {
        var el = this;
        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            alert($(this).data('id-market'))
            let formData = new FormData();
            formData.append('id-market', $(this).data('id-market'));
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('marketing/delete_data_marketperum') ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(msg) {
                    // alert('berhasil');
                    $(el).closest('p').css('background', 'tomato');
                    $(el).closest('p').fadeOut(300, function() {
                        $(this).remove();
                    });
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        }
    })
    $('.btn-delete').click(function() {
        var el = this;
        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            let formData = new FormData();
            formData.append('id-marketing', $(this).data('id-marketing'));
            formData.append('foto-lama', $(this).data('foto-marketing'));
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('marketing/delete_data_marketing') ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(msg) {
                    // alert('berhasil');
                    $(el).closest('tr').css('background', 'tomato');
                    $(el).closest('tr').fadeOut(300, function() {
                        $(this).remove();
                    });
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        }
    })
</script>