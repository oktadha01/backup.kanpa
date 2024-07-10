<div class="card-body p-0" style="overflow-x:auto;max-height: 23rem;">
    <table id="nilai" class="table table-head-fixed text-nowrap table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>FOTO</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($data_foto_st as $data) :
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td>
                        <img src="<?php echo base_url('upload'); ?>/<?php echo $data->foto_st; ?>" class="img-thumbnail img-fluid" style="max-height: 11rem;">
                    </td>
                    <td>
                        <button type="button" class="btn-delete-st btn btn-sm btn-outline-danger" data-id-st="<?php echo $data->id_st; ?>" data-foto-st="<?php echo $data->foto_st; ?>"><i class="fa-solid fa-delete-left"></i></button>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>
<input type="text" id="id-st" value="">
<script>
    $('.btn-delete-st').click(function() {
        var el = this;
        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            let formData = new FormData();
            formData.append('id-st', $(this).data('id-st'));
            formData.append('foto-st', $(this).data('foto-st'));
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('marketing/delete_data_st') ?>",
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
    });
</script>