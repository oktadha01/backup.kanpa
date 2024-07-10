<script>
    $("#marketperum").select2({
        placeholder: "Select a programming language",
        allowClear: true
    });
    load_data_perum();
    form_default();
    load_data_foto_st();
    $('#btn-add-marketing').click(function(e) {
        $('#add-marketing, #btn-simpan-marketing, #btn-batal-marketing').show();
        $('#btn-add-marketing').hide();
        $('#btn-simpan-marketing').val('marketing');
    });
    $('#btn-batal-marketing').click(function(e) {
        form_default();
    });

    $('#btn-simpan-marketing').click(function(e) {
        var action = $('#btn-simpan-marketing').val();
        if (action == 'marketing') {
            const marketing = $('#file-foto-marketing').prop('files')[0];
            const foto_header = $('#file-foto-marketing-header').prop('files')[0];
            let formData = new FormData();
            formData.append('nm-marketing', $('#nm-marketing').val());
            formData.append('foto-marketing', marketing);
            formData.append('foto-header', foto_header);
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('marketing/simpan_data_marketing'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    // alert('berhasil')
                    form_default();
                    load_data_perum();
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });


        } else if (action == 'marketperum') {
            var perum = $("#marketperum").find(':selected').val();
            // alert(perum);
            let formData = new FormData();
            formData.append('id-marketing', $('#id-marketing').val());
            formData.append('bitly', $('#bitly').val());
            formData.append('id-perum', perum);
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('marketing/simpan_data_marketperum'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    // alert('berhasil')
                    form_default();
                    load_data_perum();
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        } else if (action == 'edit') {
            // alert('edit');
            // alert($('#nm-foto-marketing').val() + $('#foto-lama').val())
            const marketing = $('#file-foto-marketing').prop('files')[0];
            const foto_header = $('#file-foto-marketing-header').prop('files')[0];
            let formData = new FormData();
            formData.append('id-marketing', $('#id-marketing').val());
            formData.append('nm-marketing', $('#nm-marketing').val());
            formData.append('foto-lama-marketing', $('#foto-lama').val());
            formData.append('nm-foto-marketing', $('#nm-foto-marketing').val());
            formData.append('foto-lama-header', $('#foto-lama-header').val());
            formData.append('nm-foto-marketing-header', $('#nm-foto-marketing-header').val());
            formData.append('foto-marketing', marketing);
            formData.append('foto-header', foto_header);
            // formData.append('ceklis-ubah-foto-marketing', $('#ceklis-ubah-foto-marketing').val());
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('marketing/edit_data_marketing'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(msg) {
                    // alert(msg)

                    form_default();
                    load_data_perum();
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        }

    });
    $('#btn-simpan-foto').click(function(e) {
        var id_marketing = $("#select-marketing").find(':selected').val();
        const foto_st = $('#file-foto-st').prop('files')[0];
        let formData = new FormData();
        formData.append('id-marketing-st', id_marketing);
        formData.append('foto-st', foto_st);
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('marketing/simpan_data_foto_st'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                alert('Foto berhasil di simpan')
                form_default_st();
                load_data_foto_st();
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        })
    });

    $('#file-foto-marketing').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#nm-foto-marketing").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview-foto-marketing").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
    $(document).on("click", ".pilih-marketing", function() {
        var file = $(this).parents().find(".file-marketing");
        file.trigger("click");
    });
    $('#file-foto-marketing-header').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#nm-foto-marketing-header").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview-foto-marketing-header").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
    $(document).on("click", ".pilih-marketing-header", function() {
        var file = $(this).parents().find(".file-marketing-header");
        file.trigger("click");
    });

    $('#file-foto-st').change(function(e) {

        var fileName = e.target.files[0].name;
        $("#nm-foto-st").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview-foto-st").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

    $(document).on("click", ".pilih-foto-st", function() {
        var file = $(this).parents().find(".file-st");
        file.trigger("click");
    });

    $('#ceklis-ubah-foto-marketing').click(function(e) {
        if ($(this).is(":checked")) {
            $('#ceklis-ubah-foto-marketing').val('change-foto-marketing');
        } else {
            $('#ceklis-ubah-foto-marketing').val('');
        }
    });

    function form_default() {
        $('.btn-simpan-marketing').val('simpan');
        $('#add-marketing, #add-marketperum, #btn-simpan-marketing, #btn-batal-marketing').removeAttr('hidden', true).hide();
        $('#btn-add-marketing').show();

        $('#id-marketing,#nm-marketing').val('');
        $('#preview-foto-marketing').attr({
            src: ''
        });
        $('#ceklis-ubah-foto-marketing').prop('checked', false);
        $('.btn-batal-marketing').attr('hidden', true);
        $('#ceklis-ubah-marketing').attr('hidden', true);
    }

    function form_default_st() {
        $('#preview-foto-st').attr({
            src: ''
        });
    }

    function load_data_perum() {
        $.ajax({
            // type: 'POST',
            url: "<?php echo site_url('Marketing/data_marketing'); ?>",
            // data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#data-perum').html(data);

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }

    function load_data_foto_st() {
        $.ajax({
            // type: 'POST',
            url: "<?php echo site_url('Marketing/data_foto_st'); ?>",
            // data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#data-foto-st').html(data);

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }
</script>