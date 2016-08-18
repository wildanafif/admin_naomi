var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

function numberFormatter(value, row, index) {
    return index + 1;
}

function serviceAction(value, row, index) {
    var url = baseUrl + "/naomi/administrator_naomi/edit_layanan/" + row.id_layanan;
    return '<div class="btn-group" role="group" aria-label="...">  <a target="_blank" href="'+baseUrl+'/naomi/service/read/'+row.url+'/'+row.id_layanan+'" type="button" class="btn btn-success"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Lihat</a>  <button type="button" class="btn btn-danger" onclick="confirm_hapus(' + row.id_layanan + ')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</button>  <a href="' + url + '" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a></div>'
}

function confirm_hapus(value) {
    var getUrl = window.location;
    var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    var url = baseUrl + "/naomi/administrator_naomi/delete_layanan/" + value;
    $("#link_hapus").attr("href", url);
    $("#confirm_delete").modal('show');

    console.log(url);
}
function format_gambar_tabel(value) {
    var url = baseUrl + "/naomi/assets/images/layanan/" + value;
    return '<img src="' + url + '" height="50"  >';

}
function format_gambar_tabel_produk(value) {
    var url = baseUrl + "/naomi/assets/images/produk/" + value;
    return '<img src="' + url + '" height="50"  >';

}

function product_action(value, row, index) {
    var url = baseUrl + "/naomi/admin_produk/edit_produk/" + row.id_produk;
    return '<div class="btn-group" role="group" aria-label="...">  <a type="button" target="_BLANK" href="'+baseUrl+'/naomi/product/read/'+row.url+'/'+row.id_produk+'"  class="btn btn-success"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Lihat</a>  <button type="button" class="btn btn-danger" onclick="confirm_hapus_produk(' + row.id_produk + ')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</button>  <a href="' + url + '" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a></div>'
    console.log(row.id_produk);
}
function confirm_hapus_produk(value) {
    var getUrl = window.location;
    var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    var url = baseUrl + "/naomi/admin_produk/delete_produk/" + value;
    $("#link_hapus").attr("href", url);
    $("#confirm_delete").modal('show');
}

function promosi_action(value) {
    var url = baseUrl + "/naomi/admin_promosi/edit_promosi/" + value;
    return '<div class="btn-group" role="group" aria-label="...">  <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Lihat</button>  <button type="button" class="btn btn-danger" onclick="confirm_hapus_promosi(' + value + ')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</button>  <a href="' + url + '" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a></div>'
}

function confirm_hapus_promosi(value) {
    var getUrl = window.location;
    var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    var url = baseUrl + "/naomi/admin_promosi/delete_promosi/" + value;
    $("#link_hapus").attr("href", url);
    $("#confirm_delete").modal('show');
}

function format_gambar_tabel_promosi(value) {
    var url = baseUrl + "/naomi/assets/images/promosi/" + value;
    return '<img src="' + url + '" height="50"  >';

}

function format_gambar_tabel_artikel(value) {
    var url = baseUrl + "/naomi/assets/images/artikel/" + value;
    return '<img src="' + url + '" height="50"  >';

}
function artikel_action(value, row, index) {
    var url = baseUrl + "/naomi/admin_artikel/edit_artikel/" + row.id_artikel;
    return '<div class="btn-group" role="group" aria-label="...">  <a target="_BLANK" href="'+baseUrl+'/naomi/news/read/'+row.url+'/'+row.id_artikel+'" type="button" class="btn btn-success"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Lihat</a>  <button type="button" class="btn btn-danger" onclick="confirm_hapus_artikel(' + row.id_artikel + ')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</button>  <a href="' + url + '" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a></div>'
}

function confirm_hapus_artikel(value) {
    var getUrl = window.location;
    var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    var url = baseUrl + "/naomi/admin_artikel/delete_artikel/" + value;
    $("#link_hapus").attr("href", url);
    $("#confirm_delete").modal('show');
}

function confirm_hapus_galeri(value) {
    var getUrl = window.location;
    var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    var url = baseUrl + "/naomi/admin_galeri/delete_galeri/" + value;
    $("#link_hapus").attr("href", url);
    $("#confirm_delete").modal('show');
}

function confirm_hapus_foto_galeri(value) {
    var getUrl = window.location;
    var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    var url = baseUrl + "/naomi/admin_galeri/delete_foto_galeri/" + value;
    $("#link_hapus").attr("href", url);
    $("#confirm_delete").modal('show');
}
function confirm_hapus_slider(value) {
    var getUrl = window.location;
    var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    var url = baseUrl + "/naomi/admin_slider/delete_slider/" + value;
    $("#link_hapus").attr("href", url);
    $("#confirm_delete").modal('show');
}

function confirm_edit_slider(value) {
    var getUrl = window.location;
    var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    var url = baseUrl + "/naomi/admin_slider/getJson_edit/" + value;
    $.getJSON(url, {
        format: "json"
    })
            .done(function (data) {
                $("#judul_slider").val(data.title_slider);
                $("#id_slider").val(data.id_slider);
                $("#editor1_edit").html(data.deskripsi_slider);
                $("#modal_edit").modal('show');
                console.log(data.id_slider);

            })
            .fail(function () {


            });


}

function modal_tentang_kami(){
    $("#edit_tentang_kami").modal('show');
}

function modal_edit_header(){
     $("#edit_header").modal('show');
}
function modal_edit_why(){
     $("#modal_why").modal('show');
}


$('input[type="checkbox"]').bootstrapSwitch();
$('input[name="my-checkbox"]').on('switchChange.bootstrapSwitch', function(event, state) {
  
  console.log(state); // true | false
});


