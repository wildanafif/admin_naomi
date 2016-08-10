
    $(document).ready(function(){
      $("#link_cari_judul").click(function(){
        $("#result_cari, #result_cari_judul, #result_cari_author, #result_cari_tahun").html('');
        $("#keyword_search, #judul_search, #author_search, #tahun_search").val('');

        $('#konten_cari_home').hide('slow');
        $('#konten_cari_keyword').hide('slow');
        $('#konten_cari_tahun').hide('slow');
        $('#konten_cari_author').hide('slow');
        $('#konten_cari_filter').hide('slow');
        $('#konten_cari_semua').hide('slow');
        $('#filter_tahun').val('');
        $('#filter_author').val('');
        $('#filter_keyword').val('');
        $('#filter_judul').val('');


         $("#active_class_keyword, #active_class_tahun, #active_class_author, #active_class_semua, #active_class_home").removeClass("active");
         $("#active_class_judul").addClass("active");

        $('#konten_cari_judul').show('slow');
      });

      $("#link_cari_keyword").click(function(){
        $("#result_cari, #result_cari_judul, #result_cari_author, #result_cari_tahun").html('');
        $("#keyword_search, #judul_search, #author_search, #tahun_search").val('');
        $("#konten_cari_judul, #konten_cari_tahun, #konten_cari_author, #konten_cari_filter, #konten_cari_semua, #konten_cari_home").hide("slow");
        $("#active_class_judul, #active_class_tahun, #active_class_author, #active_class_semua, #active_class_home").removeClass("active");
        $("#active_class_keyword").addClass("active");

        $('#konten_cari_keyword').show('slow');
        $('#filter_tahun').val('');
        $('#filter_author').val('');
        $('#filter_keyword').val('');
        $('#filter_judul').val('');
      });

      $("#link_cari_author").click(function(){
        $("#result_cari, #result_cari_judul, #result_cari_author, #result_cari_tahun").html('');
        $("#keyword_search, #judul_search, #author_search, #tahun_search").val('');
        $("#konten_cari_judul, #konten_cari_tahun, #konten_cari_keyword, #konten_cari_filter, #konten_cari_semua, #konten_cari_home").hide("slow");
        $("#active_class_judul, #active_class_tahun, #active_class_keyword, #active_class_semua, #active_class_home").removeClass("active");
        $("#active_class_author").addClass("active");

        $('#konten_cari_author').show('slow');
        $('#filter_tahun').val('');
        $('#filter_author').val('');
        $('#filter_keyword').val('');
        $('#filter_judul').val('');
      });

      $("#link_cari_tahun").click(function(){
        $("#result_cari, #result_cari_judul, #result_cari_author, #result_cari_tahun").html('');
        $("#keyword_search, #judul_search, #author_search, #tahun_search").val('');
        $("#konten_cari_judul, #konten_cari_author, #konten_cari_keyword, #konten_cari_filter, #konten_cari_semua, #konten_cari_home").hide("slow");
        $("#active_class_judul, #active_class_author, #active_class_keyword, #active_class_semua, #active_class_home").removeClass("active");
        $("#active_class_tahun").addClass("active");

        $('#konten_cari_tahun').show('slow');
        $('#filter_tahun').val('');
        $('#filter_author').val('');
        $('#filter_keyword').val('');
        $('#filter_judul').val('');
      });
      $("#link_cari_semua").click(function(){
        $("#result_cari, #result_cari_judul, #result_cari_author, #result_cari_tahun").html('');
        $("#keyword_search, #judul_search, #author_search, #tahun_search").val('');
        $("#konten_cari_judul, #konten_cari_author, #konten_cari_keyword, #konten_cari_filter, #konten_cari_tahun, #konten_cari_home").hide("slow");
        $("#active_class_judul, #active_class_author, #active_class_keyword, #active_class_tahun, #active_class_home").removeClass("active");
        $("#active_class_semua").addClass("active");

        $('#konten_cari_semua').show('slow');
        $('#filter_tahun').val('');
        $('#filter_author').val('');
        $('#filter_keyword').val('');
        $('#filter_judul').val('');
      });

      $("#link_cari_home").click(function(){
        $("#result_cari, #result_cari_judul, #result_cari_author, #result_cari_tahun").html('');
        $("#keyword_search, #judul_search, #author_search, #tahun_search").val('');
        $("#konten_cari_judul, #konten_cari_author, #konten_cari_keyword, #konten_cari_filter, #konten_cari_semua, #konten_cari_tahun").hide("slow");
        $("#active_class_judul, #active_class_author, #active_class_keyword, #active_class_semua, #active_class_tahun").removeClass("active");
        $("#active_class_home").addClass("active");

        $('#konten_cari_home ').show('slow');
        $('#filter_tahun').val('');
        $('#filter_author').val('');
        $('#filter_keyword').val('');
        $('#filter_judul').val('');
      });
     

    });



    var global_ipv4='localhost';
    var global_host='skripsi.server';


      function baca_abstract(id_skrispi){
         $.get("http://"+global_host+"/project/search_skripsi_server/skripsi/baca_abstract/"+id_skrispi, function(data, status){
            $('#konten_baca_abstract').html(data);
            $('#modal_baca_abstract').modal('show');
        });

      }
      function keyword(){
        $('#loader').show();
        $('#status').hide();
        $('#result_cari').html('');
        var text=$('#keyword_search').val();
        text = text.replace(/ /gi, "+");
        var ip='http://'+global_host+'/';
        var file="'SkripsiLaporan'";
        var no=1;
        
        $.getJSON(ip+'project/search_skripsi_server/cari/get/keyword/'+text, {
          format: "json"
        })
        .done(function( data ) {
          $.each(data, function(key, val) {
            $('#result_cari').append('<tr><td>'+no+'</td><td>'+val.judul+'</td><td>'+val.author+'</td><td>'+val.tahun+'</td><td>'+val.keyword+'</td><td><div class="btn-group" role="group"><button type="button" class="btn btn-primary" onclick=baca_abstract("'+val.id_skripsi+'");>Lihat Abstark</button><a href="#" onclick=show("'+val.lokasi_file+'"); type="button" class="btn btn-success">Baca Selengkapnya</a></div></td></tr>');
            no=no+1;
          });
          $('#loader').hide();
        })
        .fail(function() {
          $('#loader').hide();
          $('#status').show();     

        });        
      };

      function filter(){
       
        $('#modal_filter').modal('hide');
        $("#result_cari, #result_cari_judul, #result_cari_author, #result_cari_tahun").html('');
        $("#keyword_search, #judul_search, #author_search, #tahun_search").val('');
        $("#konten_cari_judul, #konten_cari_tahun, #konten_cari_keyword, #konten_cari_author, #konten_cari_semua").hide("slow");
        $("#active_class_judul, #active_class_tahun, #active_class_author, #active_class_keyword, #active_class_semua").removeClass("active");
        $("#konten_cari_filter").show('slow');
        var jdl=$("#filter_judul").val();
        if (jdl!='') {

        };
        var keyword=$("#filter_keyword").val();
        if (keyword!='') {
          if (jdl!='') {

            keyword=" "+keyword;
          };
        };
        var author=$("#filter_author").val();
        if (author!='') {
          if (jdl!='' || keyword!='') {

            author=" "+author;
        };
        };

        var isi=jdl+keyword+author;
        isi=isi.replace(/ /gi, "+");
        var url_json='';

        var tahun=$("#filter_tahun").val();

        if (tahun=='') {
          url_json="http://"+global_host+"/project/search_skripsi_server/cari/getFilter/isi/"+isi;
        }else if (tahun!='') {
          if (isi=='') {
            url_json='http://'+global_host+'/project/search_skripsi_server/cari/getTahun/'+tahun;
          }else{

            url_json="http://"+global_host+"/project/search_skripsi_server/cari/getFilter_tahun/"+tahun+"/"+isi;
          };
        };



        $('#loader_filter').show();
        $('#status_filter').hide();
        $('#result_cari_filter').html('');
        var text=$('#judul_search').val();
        text = text.replace(' ', '+');
        var ip='http://'+global_host+'/';
        var file="'SkripsiLaporan'";
        var no=1;
        
        $.getJSON(url_json, {
          format: "json"
        })
        .done(function( data ) {
          $.each(data, function(key, val) {
            $('#result_cari_filter').append('<tr><td>'+no+'</td><td>'+val.judul+'</td><td>'+val.author+'</td><td>'+val.tahun+'</td><td>'+val.keyword+'</td><td><div class="btn-group" role="group"><button type="button" class="btn btn-primary" onclick=baca_abstract("'+val.id_skripsi+'");>Lihat Abstark</button><a href="#" onclick=show("'+val.lokasi_file+'"); type="button" class="btn btn-success">Baca Selengkapnya</a></div></td></tr>');
            no=no+1;
          });

          $('#filter_tahun').val('');
          $('#filter_author').val('');
          $('#filter_keyword').val('');
          $('#filter_judul').val('');

          $('#loader_filter').hide();
        })
        .fail(function() {
          $('#loader_filter').hide();
          $('#status_filter').show();     

        });        
      };

      function judul(){
        $('#loader_judul').show();
        $('#status_judul').hide();
        $('#result_cari_judul').html('');
        var text=$('#judul_search').val();
        text = text.replace(/ /gi, "+");
        var ip='http://'+global_host+'/';
        var file="'SkripsiLaporan'";
        var no=1;
        
        $.getJSON(ip+'project/search_skripsi_server/cari/getJudul/judul/'+text, {
          format: "json"
        })
        .done(function( data ) {
          $.each(data, function(key, val) {
            $('#result_cari_judul').append('<tr><td>'+no+'</td><td>'+val.judul+'</td><td>'+val.author+'</td><td>'+val.tahun+'</td><td>'+val.keyword+'</td><td><div class="btn-group" role="group"><button type="button" class="btn btn-primary" onclick=baca_abstract("'+val.id_skripsi+'");>Lihat Abstark</button><a href="#" onclick=show("'+val.lokasi_file+'"); type="button" class="btn btn-success">Baca Selengkapnya</a></div></td></tr>');
            no=no+1;
          });
          $('#loader_judul').hide();
        })
        .fail(function() {
          $('#loader_judul').hide();
          $('#status_judul').show();     

        });        
      };

      function author(){
        $('#loader_author').show();
        $('#status_author').hide();
        $('#result_cari_author').html('');
        var text=$('#author_search').val();
        text = text.replace(/ /gi, "+");
        var ip='http://'+global_host+'/';
        var file="'SkripsiLaporan'";
        var no=1;
        
        $.getJSON(ip+'project/search_skripsi_server/cari/getAuthor/author/'+text, {
          format: "json"
        })
        .done(function( data ) {
          $.each(data, function(key, val) {
            $('#result_cari_author').append('<tr><td>'+no+'</td><td>'+val.judul+'</td><td>'+val.author+'</td><td>'+val.tahun+'</td><td>'+val.keyword+'</td><td><div class="btn-group" role="group"><button type="button" class="btn btn-primary" onclick=baca_abstract("'+val.id_skripsi+'");>Lihat Abstark</button><a href="#" onclick=show("'+val.lokasi_file+'"); type="button" class="btn btn-success">Baca Selengkapnya</a></div></td></tr>');
            no=no+1;
          });
          $('#loader_author').hide();
        })
        .fail(function() {
          $('#loader_author').hide();
          $('#status_author').show();     

        });        
      };


      function tahun(){
        $('#loader_tahun').show();
        $('#status_tahun').hide();
        $('#result_cari_tahun').html('');
        var text=$('#tahun_search').val();
        text = text.replace(/ /gi, "+");
        var ip='http://'+global_host+'/';
        var file="'SkripsiLaporan'";
        var no=1;
        
        $.getJSON(ip+'project/search_skripsi_server/cari/getTahun/'+text, {
          format: "json"
        })
        .done(function( data ) {
          $.each(data, function(key, val) {
            $('#result_cari_tahun').append('<tr><td>'+no+'</td><td>'+val.judul+'</td><td>'+val.author+'</td><td>'+val.tahun+'</td><td>'+val.keyword+'</td><td><div class="btn-group" role="group"><button type="button" class="btn btn-primary" onclick=baca_abstract("'+val.id_skripsi+'");>Lihat Abstark</button><a href="#" onclick=show("'+val.lokasi_file+'"); type="button" class="btn btn-success">Baca Selengkapnya</a></div></td></tr>');
            no=no+1;
          });
          $('#loader_tahun').hide();
        })
        .fail(function() {
          $('#loader_tahun').hide();
          $('#status_tahun').show();     

        });        
      };




      function show(val){
        var url_file="http://"+global_ipv4+"/project/search_skripsi_server/file_skripsi/"+val;
        document.getElementById("frame").setAttribute("src", "http://"+global_ipv4+"/referensi/pdfjs/web/er.php?url="+url_file);
        $("#myModal").modal();
      };
      document.getElementById('exit').onclick= function()
      {
        win.close();
      };
      
      $(document).bind('keydown', function(e) {
      if(e.ctrlKey && (e.which == 83)) {
        e.preventDefault();
        alert('Mohon maaf! Anda tidak di perkenankan untuk menyimpan file');
        return false;
      }
      });
      $(document).bind('keydown', function(e) {
      if(e.ctrlKey && (e.which == 80)) {
        e.preventDefault();
        alert('Mohon maaf! Anda tidak di perkenankan untuk mencetak file');
        return false;
      }
      });

      $.fn.enterKey = function (fnc) {
        return this.each(function () {
            $(this).keypress(function (ev) {
                var keycode = (ev.keyCode ? ev.keyCode : ev.which);
                if (keycode == '13') {
                    fnc.call(this, ev);
                }
            })
        })
    };
    $("#keyword_search").enterKey(function () {
        keyword();
    });

    $("#judul_search").enterKey(function () {
        judul();
    });
    $("#author_search").enterKey(function () {
        author();
    });
    $("#tahun_search").enterKey(function () {
        tahun();
    });

    function confirm_exit_window() {
        var txt;
        var r = confirm("Apakah anda ingin Keluar?");
        if (r == true) {
             win.close();
        } 
        document.getElementById("demo").innerHTML = txt;
    };
    function runningFormatter(value, row, index) {
        return index+1;
    }
    
    function bacaSelengkapnyaFormatter(value){
      return '<a href="#" onclick=show("'+value+'"); type="button" class="btn btn-success"><span class="glyphicon glyphicon glyphicon-eye-open" aria-hidden="true"></span> &nbsp;Baca Selengkapnya</a>';
    }
    function bacaAbstrakFormatter(value){
      return '<center><div class="btn-group" role="group" aria-label="..." style="text-align:center;" > <button type="button" class="btn btn-primary" title="Edit" onclick=show_edit_modal("'+value+'") ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>  <button type="button" onclick=show_confirm_delete("'+value+'") class="btn btn-danger" title="Hapus"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></div></center>';
      //<button type="button" class="btn btn-primary" onclick=baca_abstract("'+value+'");><span class="glyphicon glyphicon glyphicon-eye-open" aria-hidden="true"></span> &nbsp;Lihat Abstark</button>
    }
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
      
        //bootstrap WYSIHTML5 - text editor
        $("#abstract_add").wysihtml5();

      });

    function show_edit_modal(id){
      var ip='http://'+global_host+'/';


      
      $.getJSON(ip+'project/search_skripsi_server/skripsi/get_konten_edit/'+id, {
          format: "json"
        })
        .done(function( data ) {
          $('#modal_loader').modal('hide');
          $("#judul_edit").val(data.judul);
          $("#author_edit").val(data.author);
          $("#tahun_edit").val(data.tahun);
          $("#keyword_edit").html(data.keyword);          
          $("#abstract_edit").html(data.abstract);
          $("#id_skripsi_edit").val(data.id_skripsi);
          $("#lokasi_file_edit").val(data.lokasi_file);
          $("#modal_edit").modal('show');
         
        })
        .fail(function() {
          $("#info_status_modal_edit").html('gagal');
          $("#modal_loader").modal('show');    

        }); 
      //$("#modal_edit").modal('show');

    }

    function show_confirm_delete(id){
      $("#on_hapus").attr("onclick", "save_delete('"+id+"')");
      //$('#next').click(stopMoving);
      $("#konfirmasi_hapus").modal('show');

    }

    
    

      
  
 