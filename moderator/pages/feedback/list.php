
<div class="maincontent">
	<div class="some_input">
        <div class="row_group_input">
            <table class="dataTable" width="100%" border="1" id="dataTable_career">
              <thead>
                  <tr>
                      <th scope="col" style="width:50px;">No</th>
                      <th scope="col" style="width:50px;">Tanggal</th>
					  <th scope="col" style="width:50px;">Nama</th>
					  <th scope="col" style="width:50px;">Email</th>
					  <th scope="col" style="width:50px;">Subjek</th>
                      <th scope="col" class="aligncenter" style="width:50px;">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                    $feedback = mysqli_query($dbconnect,"SELECT * FROM feedback");
                    if($feedback && mysqli_num_rows($feedback) > 0){
                      $no = 1;
                      while($assoc_feedback = mysqli_fetch_assoc($feedback)){
                ?>
                  <tr>
                    <td class="aligncenter"><?php echo $no++;?></td>
					<td class="aligncenter"><?php echo date('d F Y',$assoc_feedback['date']);?></td>
                    <td><?php echo $assoc_feedback['name'];?></td>
					<td><?php echo $assoc_feedback['email'];?></td>
					<td><?php echo $assoc_feedback['label'];?></td>
                    <td class="aligncenter">
                      <a href="?page=feedback&section=view&id=<?php echo $assoc_feedback["id"]; ?>" title="View">
                        <img class="icon" src="themes/images/edit.png" width="16" height="16" alt="view"/>
                      </a>
                    </td>
                  </tr>
                <?php } }?>
              </tbody>
            </table>  
        </div>
      </div>	
	</div>
</div>
<script>
  $(document).ready(function() {
	$('#dataTable_career').DataTable({
		"pageLength": 10,
		"order": [[ 1, "desc" ]],
		"lengthChange": true,
		"searching": true,
		"paging": true,
		"responsive": true,
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




