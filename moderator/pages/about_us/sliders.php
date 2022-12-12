<div class="maincontent">
    <div class="some_input">
        <div class="wrap_form">
            <h4>Konten Slide</h4>
            <div class="wrapbutton alignright">
                <div class="new_row button" id="newrow" onClick="location.href='?page=about_us&section=new';">Tambah Konten</div>
            </div>
            <div class="row_group_input">
                <table class="dataTable" width="100%" border="1" id="dataTable_about">
                    <thead>
                        <tr>
                            <th scope="col" style="width:50px;">No</th>
                            <th scope="col" style="width:50px;">Judul</th>
                            <th scope="col" class="aligncenter" style="width:50px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tabslider = mysqli_query($dbconnect, "SELECT id,title FROM page_aboutus");
                        if ($tabslider && mysqli_num_rows($tabslider) > 0) {
                            $no = 1;
                            while ($dataslide = mysqli_fetch_assoc($tabslider)) {
                        ?>
                                <tr>
                                    <td class="aligncenter"><?php echo $no; ?></td>
                                    <td><?php echo $dataslide['title']; ?></td>
                                    <td class="aligncenter">
                                        <a href="?page=about_us&section=edit&id=<?php echo $dataslide["id"]; ?>" title="Edit">
                                            <img class="icon" src="themes/images/edit.png" width="16" height="16" alt="edit" />
                                        </a>
                                    </td>
                                </tr>
                        <?php $no++;
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
  $(document).ready(function() {
	$('#dataTable_about').DataTable({
		"pageLength": 10,
		"order": [[ 1, "asc" ]],
		"lengthChange": true,
		"searching": true,
		"paging": true,
		language: {
	    	"emptyTable":     "Tidak Ada Data",
	    	"info":           "Menampilkan _START_ sampai _END_ dari total _TOTAL_ Data",
	    	"infoEmpty":      "",
	    	"infoFiltered":   "Tampilkan _MAX_ total Data",
	    	"infoPostFix":    "",
	    	"thousands":      ",",
	    	"lengthMenu":     "Tampilkan _MENU_ Data",
	    	"loadingRecords": "Memuat...",
	    	"processing":     "Memproses...",
	   		 "search":         "",
	   		 "zeroRecords":    "Tidak Ditemukan",
	    	"paginate": {
	        	"first":      "Awal",
	        	"last":       "Akhir",
	        	"next":       "&raquo;",
	        	"previous":   "&laquo;"
	    	},
	    	"aria": {
	        	"sortAscending":  ": Urutkan secara menaik",
	        	"sortDescending": ": Urutkan secara menurun"
	    	}
	    }
	});
});
</script>
</script>
<script>
//  $(document).ready(function() {
//   if (window.File && window.FileList && window.FileReader) {
//     $("#myfile").on("change", function(e) {
//       var files = e.target.files,
//         filesLength = files.length;
//       for (var i = 0; i < filesLength; i++) {
//         var f = files[i]
//         var fileReader = new FileReader();
//         fileReader.onload = (function(e) {
//           var file = e.target;
//           $("<div class=\"pip\">" +
//             "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
//             "<br/><span class=\"removeimage\">Remove</span>" +
//             "</div>").insertAfter("#myfile");
//           $(".removeimage").click(function(){
//             $(this).parent(".pip").remove();
// 			$('#myfile').val("");
//           });
//         });
//         fileReader.readAsDataURL(f);
//       }
//     });
//   } else {
//     alert("Your browser doesn't support to File API")
//   }
// });
</script>


